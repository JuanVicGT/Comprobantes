<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use App\Models\Document;
use App\Models\DocumentLine;
use Illuminate\Validation\Rule;
use Livewire\Form;

class DocumentForm extends Form
{
    public ?Customer $document;

    // Customer fields
    public $nombre;
    public $dpi;

    // Document header and document lines
    public $cantidad;
    public $total;
    public $descripcion;
    public $codigo;
    public $fecha;
    public $monto; // Solo para la vista

    public function setDefaultValues()
    {
        $this->total = 150;
        $this->cantidad = 1;
        $this->codigo = 'C01';
        $this->descripcion = 'SUBSIDIO MUNICIPAL PROGRAMA APOYO AL AGRICULTOR CHIQUIMULTECO';
        $this->monto = 'Q ' . number_format($this->total, 2);
        $this->fecha = date('d-m-Y');
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
                Rule::unique('customers'),
            ],
        ];
    }

    public function store()
    {
        $this->validate();

        $customer = Customer::create([
            'nombre' => $this->nombre,
            'dpi' => $this->dpi
        ]);

        $lastNumber = Document::select('numero')->orderBy('numero', 'desc')->first()->numero ?? 0;

        $doc = Document::create([
            'customer_id' => $customer->id,
            'numero' => ++$lastNumber,
            'total' => $this->total,
            'fecha' => date('Y-m-d', strtotime($this->fecha))
        ]);

        DocumentLine::create(
            [
                'doc_id' => $doc->id,
                'price' => $this->total,
                'cantidad' => $this->cantidad,
                'codigo' => $this->codigo,
                'descripcion' => $this->descripcion
            ]
        );

        $this->reset();
    }
}
