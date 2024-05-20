<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use App\Models\Document;
use App\Models\DocumentLine;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
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

    public function setDefaultValues(): bool
    {
        $setting = Setting::first();
        if (empty($setting->id))
            return false;

        $this->cantidad = $setting->cantidad;
        $this->codigo = $setting->codigo;
        $this->descripcion = $setting->concepto;
        $this->monto = 'Q ' . number_format($setting->precio, 2);
        $this->fecha = date('d-m-Y');
        $this->total = bcmul($setting->precio, $setting->cantidad, 2);

        return true;
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
            'descripcion' => [
                'string',
                'required',
            ],
            'monto' => [
                'required',
            ],
            'cantidad' => [
                'integer',
                'required',
            ],
            'codigo' => [
                'string',
                'required',
            ],
            'fecha' => [
                'required',
            ],
        ];
    }

    public function store()
    {
        $this->validate();
        DB::beginTransaction();

        $customer = Customer::create([
            'nombre' => $this->nombre,
            'dpi' => $this->dpi
        ]);

        if (!$customer->id) {
            DB::rollBack();
            return;
        }

        $lastNumber = Document::select('numero')->orderBy('numero', 'desc')->first()->numero ?? 0;

        $doc = Document::create([
            'customer_id' => $customer->id,
            'numero' => ++$lastNumber,
            'total' => $this->total,
            'fecha' => date('Y-m-d', strtotime($this->fecha))
        ]);

        if (!$doc->id) {
            DB::rollBack();
            return;
        }

        $docLine = DocumentLine::create(
            [
                'doc_id' => $doc->id,
                'precio' => $this->total,
                'cantidad' => $this->cantidad,
                'codigo' => $this->codigo,
                'descripcion' => $this->descripcion
            ]
        );

        if (!$docLine->id) {
            DB::rollBack();
            return;
        }

        DB::commit();
        $this->reset();
    }
}
