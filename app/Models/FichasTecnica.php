<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FichasTecnica extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const ESTADO_DEL_ACTIVO_RADIO = [
        'activo'   => 'Activo',
        'inactivo' => 'Inactivo',
    ];

    public $table = 'fichas_tecnicas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'encargado',
        'nombre_del_equipo',
        'modelo',
        'serial',
        'sede_id',
        'teclado',
        'mouse',
        'parlantes',
        'camara',
        'telefono_ip',
        'observaciones',
        'estado_del_activo',
        'created_at',
        'created_by_id',
        'updated_at',
        'deleted_at',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
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
