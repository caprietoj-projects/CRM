<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidato extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const GRADUADO_SELECT = [
        'si' => 'Si',
        'no' => 'No',
    ];

    public const OFIMATICA_SELECT = [
        'si' => 'Si',
        'no' => 'No',
    ];

    public const DOCUMENTO_DE_IDENTIDAD_RADIO = [
        'cc' => 'C.C',
        'ce' => 'C.E',
    ];

    public const HABLA_SELECT = [
        'regular'  => 'Regular',
        'bien'     => 'Bien',
        'muy bien' => 'Muy Bien',
    ];

    public const LECTURA_SELECT = [
        'regular'  => 'Regular',
        'bien'     => 'Bien',
        'muy bien' => 'Muy Bien',
    ];

    public const ESCRITURA_SELECT = [
        'regular'  => 'Regular',
        'bien'     => 'Bien',
        'muy bien' => 'Muy Bien',
    ];

    public const IDIOMA_SELECT = [
        'ingles'    => 'Ingles',
        'frances'   => 'Frances',
        'portugues' => 'Portugués',
        'aleman'    => 'Alemán',
        'otro'      => 'Otro',
    ];

    public const NIVEL_ACADEMICO_SELECT = [
        'tecnico'         => 'Técnico',
        'pregrado'        => 'Pregrado',
        'diplomado'       => 'Diplomado',
        'especializacion' => 'Especialización',
        'maestria'        => 'Maestría',
        'doctorado'       => 'Doctorado',
    ];

    public $table = 'candidatos';

    protected $dates = [
        'fecha_de_expedicion_del_documento',
        'fecha_de_nacimiento',
        'fecha_de_graduacion',
        'fecha_de_grado_superior',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'primer_apellido',
        'segundo_apellido',
        'nombres',
        'documento_de_identidad',
        'no_de_identificacion',
        'fecha_de_expedicion_del_documento',
        'fecha_de_nacimiento',
        'departamento',
        'ciudad',
        'direccion',
        'departamento_de_nacimiento',
        'ciudad_de_nacimiento',
        'telefono_personal',
        'celular_personal',
        'email_personal',
        'email_familiar',
        'telefono_familiar',
        'celular_familiar',
        'secundaria',
        'media',
        'titulo_obtenido',
        'fecha_de_graduacion',
        'nivel_academico',
        'no_de_semestres',
        'graduado',
        'titulo_obtenido_superior',
        'fecha_de_grado_superior',
        'idioma',
        'otro_idioma',
        'habla',
        'lectura',
        'escritura',
        'ofimatica',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function getFechaDeExpedicionDelDocumentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeExpedicionDelDocumentoAttribute($value)
    {
        $this->attributes['fecha_de_expedicion_del_documento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeNacimientoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeNacimientoAttribute($value)
    {
        $this->attributes['fecha_de_nacimiento'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeGraduacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeGraduacionAttribute($value)
    {
        $this->attributes['fecha_de_graduacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeGradoSuperiorAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeGradoSuperiorAttribute($value)
    {
        $this->attributes['fecha_de_grado_superior'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
