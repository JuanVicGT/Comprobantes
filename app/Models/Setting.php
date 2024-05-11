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
 */
class Setting extends Model
{
    use HasFactory;
}
