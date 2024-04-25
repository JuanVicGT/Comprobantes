<?php

namespace App\Livewire\Forms;

use App\Models\Document;
use App\Models\DocumentLine;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DocumentForm extends Form
{
    //
    public float $cantidad;
    public float $total;
    public string $descripcion;
    public string $codigo;
    public string $monto; // Solo para la vista

    public function __construct()
    {
        $this->total = 150;
        $this->cantidad = 1;
        $this->codigo = 'C01';
        $this->descripcion = 'SUBSIDIO MUNICIPAL PROGRAMA APOYO AL AGRICULTOR CHIQUIMULTECO';
        $this->monto = 'Q ' . number_format($this->total, 2);
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'dpi' => [
                'string',
                'required',
                'size:13',
                !empty($this->customer) ? Rule::unique('customers')->ignore($this->customer) : Rule::unique('customers'),
            ],
        ];
    }

    public function store()
    {
        $this->validate();

        Document::create([
            'customer_id' => 1,
            'numero' => 1,
            'total' => $this->monto,
            'fecha' => $this->fecha
        ]);

        DocumentLine::create(
            [
                'doc_id' => '',
                'price' => '',
                'cantidad' => '',
                'codigo' => '',
                'descripcion' => ''
            ]
        );
    }
}
