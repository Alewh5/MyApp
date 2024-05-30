<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = ['nombre', 'direccion', 'telefono', 'sitio_web'];

    /**
     * Define la relación con los contactos de la empresa.
     */

    public function crearEmpresa(array $data)
    {
        return static::create($data);
        
    }
    
    public function contactos()
    {
        return $this->hasMany(Contacto::class);
    }
}
