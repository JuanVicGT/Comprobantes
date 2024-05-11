<div>
    <x-mary-form wire:submit="save">
        <x-mary-input label="Name" wire:model="name" />
        <x-mary-input label="Amount" wire:model="amount" prefix="USD" hint="It submits an unmasked value" />
        
        <x-mary-file wire:model="file" label="Receipt" hint="Only PDF" accept="application/jpg" :preview="$file"/>
        
        <x-mary-file wire:model="photo" accept="image/png, image/jpeg, image/jpg" :preview="$photo">
            <img src="{{ $user->avatar ?? asset('assets/img/no_image.jpg') }}" class="h-40 rounded-lg" />
        </x-mary-file>

        <x-slot:actions>
            <x-mary-button label="Cancel" />
            <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
</div>
