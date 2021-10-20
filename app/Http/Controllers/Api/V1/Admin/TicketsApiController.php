<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\Admin\TicketResource;
use App\Models\Ticket;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TicketResource(Ticket::with(['id_incidente', 'id_prioridad', 'id_sede', 'id_asignado', 'created_by'])->get());
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create($request->all());

        if ($request->input('adjuntar_archivo', false)) {
            $ticket->addMedia(storage_path('tmp/uploads/' . basename($request->input('adjuntar_archivo'))))->toMediaCollection('adjuntar_archivo');
        }

        return (new TicketResource($ticket))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TicketResource($ticket->load(['id_incidente', 'id_prioridad', 'id_sede', 'id_asignado', 'created_by']));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        if ($request->input('adjuntar_archivo', false)) {
            if (!$ticket->adjuntar_archivo || $request->input('adjuntar_archivo') !== $ticket->adjuntar_archivo->file_name) {
                if ($ticket->adjuntar_archivo) {
                    $ticket->adjuntar_archivo->delete();
                }
                $ticket->addMedia(storage_path('tmp/uploads/' . basename($request->input('adjuntar_archivo'))))->toMediaCollection('adjuntar_archivo');
            }
        } elseif ($ticket->adjuntar_archivo) {
            $ticket->adjuntar_archivo->delete();
        }

        return (new TicketResource($ticket))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
