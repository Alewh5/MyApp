<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'nombre',
        'celular',
        'email',
        'email_2',
        // Otros campos del contacto
    ];

    /**
     * Define la relación inversa con la empresa asociada.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
