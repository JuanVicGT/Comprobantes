<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string nombre_compania
 * @property string nombre_representante
 * @property string concepto
 * @property string codigo
 * @property float precio
 * @property float cantidad
 * 
 * @property mixed img_logo
 * @property mixed img_icono
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_compania', 'nombre_representante', 'concepto', 'codigo', 'precio', 'img_logo', 'img_icono'];

    public function clear()
    {
        $this->nombre_compania = '';
        $this->nombre_representante = '';
        $this->concepto = '';
        $this->codigo = '';
        $this->precio = 0;
        $this->cantidad = 0;
        $this->img_logo = '';
        $this->img_icono = '';
    }
}
