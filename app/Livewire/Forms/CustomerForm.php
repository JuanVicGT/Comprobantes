<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Livewire\Form;

class CustomerForm extends Form
{
    public ?Customer $customer;

    public $nombre;

    public $dpi;

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

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->nombre = $customer->nombre;
        $this->dpi = $customer->dpi;
    }

    public function update()
    {
        $this->validate();

        $this->customer->update($this->all());

        $this->reset();
    }

    public function store()
    {
        $this->validate();

        Customer::create([
            'nombre' => $this->nombre,
            'dpi' => $this->dpi
        ]);

        $this->reset();
    }

    public function delete()
    {
        $this->customer->delete();
    }
}
