<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DocumentForm extends Form
{
    //
    public float $cantidad = 1;
    public float $monto = 150;
    public string $descripcion = 'SUBSIDIO MUNICIPAL PROGRAMA APOYO AL AGRICULTOR CHIQUIMULTECO';
    public string $codigo = 'C01';
}
