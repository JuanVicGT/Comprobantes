<?php

namespace App\Livewire;

use Mary\Traits\Toast;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingEdit extends Component
{
    use Toast;
    use WithFileUploads;

    public Setting $setting;

    public $id;
    public $codigo;
    public $precio;
    public $cantidad;
    public $concepto;
    public $img_logo;
    public $img_icono;
    public $nombre_compania;
    public $nombre_representante;

    public function mount(Setting $setting)
    {
        $this->id = $setting->id;
        $this->codigo = $setting->codigo;
        $this->precio = $setting->precio;
        $this->cantidad = $setting->cantidad;
        $this->concepto = $setting->concepto;
        $this->img_logo = $setting->img_logo;
        $this->img_icono = $setting->img_icono;
        $this->nombre_compania = $setting->nombre_compania;
        $this->nombre_representante = $setting->nombre_representante;
    }

    public function render()
    {
        return view('livewire.setting-edit');
    }

    public function save()
    {
        $this->img_icono->store('img');
        $this->success(
            title: __('saved-successfully'),
            icon: 'o-check-circle',
            position: 'toast-top toast-center'
        );
    }
}
