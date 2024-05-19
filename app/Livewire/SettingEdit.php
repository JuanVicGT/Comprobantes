<?php

namespace App\Livewire;

use App\Lib\FileTools;
use Mary\Traits\Toast;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
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

    public $logo;
    public $icono;

    public function mount(Setting $setting)
    {
        $this->setting = $setting;

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

    public function rules()
    {
        return [
            'codigo' =>  ['string', 'required'],
            'precio' => ['numeric', 'required'],
            'logo' => ['image', 'max:2048', 'nullable'],
            'icono' => ['image', 'max:2048', 'nullable'],
            'concepto' => ['string', 'required'],
            'cantidad' => ['integer', 'required'],
            'nombre_compania' => ['string', 'required'],
            'nombre_representante' => ['string', 'required'],
        ];
    }

    public function render()
    {
        return view('livewire.setting-edit');
    }

    public function save()
    {
        $this->validate();
        $logo_path = $this->img_logo ?? null;
        $icon_path = $this->img_icono ?? null;

        if ($this->logo)
            $logo_path = $this->logo->storeAs('images', 'logo.png');

        if ($this->icono)
            $icon_path = $this->icono->storeAs('images', 'icono.png');

        if (empty($this->id))
            $this->createSetting($icon_path, $logo_path);
        else
            $this->updateSetting($icon_path, $logo_path);

        FileTools::clearTempFiles();

        $this->success(
            title: __('saved-successfully'),
            icon: 'o-check-circle',
            position: 'toast-top toast-center'
        );

        return redirect(route('edit.setting'));
    }

    protected function createSetting(?string $icon_path, ?string $logo_path)
    {
        $this->validate([
            'logo' => ['image', 'max:2048'],
            'icono' => ['image', 'max:2048'],
        ]);

        $this->setting = Setting::create([
            'id' => $this->id,
            'codigo' => $this->codigo,
            'precio' => $this->precio,
            'img_logo' => $logo_path,
            'img_icono' => $icon_path,
            'concepto' => $this->concepto,
            'cantidad' => $this->cantidad,
            'nombre_compania' => $this->nombre_compania,
            'nombre_representante' => $this->nombre_representante,
        ]);
    }

    protected function updateSetting(?string $icon_path, ?string $logo_path)
    {
        $this->setting->update([
            'codigo' => $this->codigo,
            'precio' => $this->precio,
            'img_logo' => $logo_path,
            'img_icono' => $icon_path,
            'concepto' => $this->concepto,
            'cantidad' => $this->cantidad,
            'nombre_compania' => $this->nombre_compania,
            'nombre_representante' => $this->nombre_representante,
        ]);
    }
}
