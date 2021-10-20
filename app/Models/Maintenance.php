<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintenance extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const TIPO_SELECT = [
        'correctivo' => 'Correctivo',
        'predictivo' => 'Predictivo',
        'preventivo' => 'Preventivo',
    ];

    public $table = 'maintenances';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'area_id',
        'tipo',
        'quien_lo_realiza_id',
        'fecha',
        'created_at',
        'descripcion',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function area()
    {
        return $this->belongsTo(FichasTecnica::class, 'area_id');
    }

    public function quien_lo_realiza()
    {
        return $this->belongsTo(Agente::class, 'quien_lo_realiza_id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
