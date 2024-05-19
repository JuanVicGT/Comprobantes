<div>
    <x-mary-form wire:submit.prevent="save">
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
            {{-- Company Section --}}
            <div class="col-span-2">
                <div class="flex">
                    <x-mary-icon name="m-building-office" class="w-8 h-8 text-primary" />
                    <h2 class="text-2xl px-2">{{ __('Company Section') }}</h2>
                </div>
            </div>

            <div class="col-span-1">
                <x-mary-input label="{{ __('Company Name') }}" wire:model="nombre_compania" autofocus />
            </div>
            <div class="col-span-1">
                <x-mary-input label="{{ __('Representative Name') }}" wire:model="nombre_representante" />
            </div>

            <div class="col-span-1 flex justify-center">
                <x-mary-file label="{{ __('Image Icon') }}" wire:model="icono" :preview="$img_icono"
                    accept="image/png, image/jpeg, image/jpg" hint="{{ __('Only PNG, JPG') }}">
                    @if ($setting->img_icono)
                        <img src="{{ asset('storage/' . $setting->img_icono) }}" class="h-40 rounded-lg" />
                    @else
                        <img src="{{ asset('assets/img/no_image.jpg') }}" class="h-40 rounded-lg" />
                    @endif
                </x-mary-file>
            </div>
            <div class="col-span-1 flex justify-center">
                <x-mary-file label="{{ __('Image Logo') }}" wire:model="logo" :preview="$img_logo"
                    accept="image/png, image/jpeg, image/jpg" hint="{{ __('Only PNG, JPG') }}">
                    @if ($setting->img_logo)
                        <img src="{{ asset('storage/' . $setting->img_logo) }}" class="h-40 rounded-lg" />
                    @else
                        <img src="{{ asset('assets/img/no_image.jpg') }}" class="h-40 rounded-lg" />
                    @endif
                </x-mary-file>
            </div>
            {{-- Item Section --}}
            <div class="col-span-2">
                <div class="flex">
                    <x-mary-icon name="s-tag" class="w-8 h-8 text-primary" />
                    <h2 class="text-2xl px-2">{{ __('Item Section') }}</h2>
                </div>
            </div>

            <div class="col-span-1 sm:col-span-2">
                <x-mary-input label="{{ __('Concept') }}" wire:model="concepto" />
            </div>

            <div class="col-span-1 sm:col-span-2">
                <x-mary-input label="{{ __('Code') }}" wire:model="codigo" />
            </div>

            <div class="col-span-1">
                <x-mary-input label="{{ __('Amount') }}" wire:model="precio" prefix="Q" type="number"
                    step="0.01" />
            </div>

            <div class="col-span-1">
                <x-mary-input label="{{ __('Quantity') }}" wire:model="cantidad" type="number" step="1" />
            </div>

            <x-slot:actions>
                <x-mary-button label="{{ __('Save') }}" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </div>
    </x-mary-form>
</div>
