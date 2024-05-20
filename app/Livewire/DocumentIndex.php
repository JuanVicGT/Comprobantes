<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\Setting;
use Livewire\Component;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Livewire\Forms\DocumentForm;
use Luecano\NumeroALetras\NumeroALetras;

class DocumentIndex extends Component
{
    use Toast;
    use WithPagination;

    // Form to store a new document
    public DocumentForm $form;

    // Properties
    public array $expanded = [];
    public bool $docModal = false;

    // Filters
    public int $pagination = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'fecha', 'direction' => 'desc'];

    public function showModal()
    {
        $this->docModal = true;
    }

    public function save()
    {
        $this->form->store();

        $this->docModal = false;

        $this->success(
            title: __('saved-successfully'),
            icon: 'o-check-circle',
            position: 'toast-top toast-center'
        );
    }

    protected function getDocuments()
    {
        return Document::with('customer', 'lines')
            ->withAggregate('customer', 'nombre')
            ->orderBy(...array_values($this->sortBy))
            ->paginate($this->pagination);
    }

    public function render()
    {
        $hasEstablished = $this->form->setDefaultValues();

        if (!$hasEstablished) {
            $this->error(
                title: __('not-have-settings'),
                icon: 'o-x-circle',
                position: 'toast-top toast-center'
            );
        }

        $headers = [
            ['key' => 'id', 'label' => '#', 'class' => 'bg-red-500/20 w-1'],
            ['key' => 'customer.nombre', 'label' => __('customer'), 'sortBy' => 'customer_nombre'],
            ['key' => 'fecha', 'label' => __('date')],
            ['key' => 'total', 'label' => __('total')],
        ];

        return view(
            'livewire.document-index',
            [
                'documents' => $this->getDocuments(),
                'headers' => $headers
            ]
        );
    }

    public function exportPDF(int $id)
    {
        $formatter = new NumeroALetras();

        $setting = Setting::first();
        $document = Document::find($id)->load('customer', 'lines');

        $pdf = Pdf::loadView('exports.document-export', [
            'document' => $document,
            'setting' => $setting,
            'total_in_letters' => $formatter->toWords($document->total, 2)
        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo  $pdf->stream();
        }, "{$document->customer->nombre}-{$document->fecha}.pdf");
    }
}
