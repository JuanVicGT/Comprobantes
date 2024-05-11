<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class SettingEdit extends Component
{
    use WithFileUploads;
    
    public $photo;
    public $file;
    public function render()
    {
        return view('livewire.setting-edit');
    }
}
