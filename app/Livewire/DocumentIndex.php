<?php

namespace App\Livewire;

use App\Livewire\Forms\DocumentForm;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

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
        $this->form->setDefaultValues();

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
}
