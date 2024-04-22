<?php

namespace App\Livewire;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class CustomerIndex extends Component
{
    use Toast;
    use WithPagination;

    // Form to store a new customer
    public CustomerForm $form;

    // Properties
    public bool $customerModal = false;
    public bool $deleteModal = false;
    public bool $editMode = false;

    // Filters
    public int $pagination = 10;
    public string $search = '';
    public array $sortBy = ['column' => 'nombre', 'direction' => 'asc'];

    public function showDeleteModal($id)
    {
        // Limpiamos el formulario
        $this->form->reset();

        $customer = Customer::find($id);
        $this->form->setCustomer($customer);
        $this->deleteModal = true;
    }

    public function showModal()
    {
        $this->form->reset();
        $this->editMode = false;
        $this->customerModal = true;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        // Limpiamos el formulario
        $this->form->reset();

        $customer = Customer::find($id);
        $this->form->setCustomer($customer);
        $this->editMode = true;
        $this->customerModal = true;
    }

    public function save()
    {
        if ($this->editMode)
            $this->form->update();
        else
            $this->form->store();

        $this->customerModal = false;

        $this->success(
            title: __('saved-successfully'),
            icon: 'o-check-circle',
            position: 'toast-top toast-center'
        );
    }

    public function delete()
    {
        $this->form->delete();
        $this->deleteModal = false;
        $this->form->reset();

        $this->success(
            title: __('deleted-successfully'),
            icon: 'o-check-circle',
            position: 'toast-top toast-center'
        );
    }

    protected function getCustomers()
    {
        return Customer::when(
            $this->search,

            fn ($query) =>
            $query->where('nombre', 'like', "%{$this->search}%")
                ->orWhere('dpi', 'like', "%{$this->search}%")
        )
            ->orderBy(...array_values($this->sortBy))
            ->paginate($this->pagination);
    }

    public function render()
    {
        $headers = [
            ['key' => 'id', 'label' => '#', 'class' => 'bg-red-500/20 w-1'],
            ['key' => 'nombre', 'label' => __('name')],
            ['key' => 'dpi', 'label' => __('dpi')]
        ];

        return view('livewire.customer-index', [
            'customers' => $this->getCustomers(),
            'headers' => $headers
        ]);
    }
}
