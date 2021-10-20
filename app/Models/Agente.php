<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agente extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'agentes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'cargo',
        'correo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function quienLoRealizaMaintenances()
    {
        return $this->hasMany(Maintenance::class, 'quien_lo_realiza_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
