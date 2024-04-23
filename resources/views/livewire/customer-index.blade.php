<div>
    <x-mary-header title="{{ __('customers') }}">
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-magnifying-glass" wire:model.live='search' placeholder="{{ __('search') }}..."
                class="border-gray-500" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-success" wire:click="showModal()" spinner />
        </x-slot:actions>
    </x-mary-header>

    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-mary-table :headers="$headers" :rows="$customers" striped with-pagination :sort-by="$sortBy"
        @row-click="$wire.edit($event.detail.id)">

        {{-- Overrides `name` header --}}
        @scope('header_id', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope
        @scope('header_nombre', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope
        @scope('header_dpi', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope

        @scope('actions', $customer)
            <x-mary-button icon="o-trash" spinner class="btn-sm btn-error"
                wire:click="showDeleteModal({{ $customer->id }})" />
        @endscope
    </x-mary-table>

    <x-mary-modal wire:model="customerModal" class="backdrop-blur">
        <x-mary-form wire:submit="save">
            <x-mary-input label="{{ __('name') }}" wire:model="form.nombre" />
            <x-mary-input label="{{ __('dpi') }}" wire:model="form.dpi" icon="o-identification" />

            <x-slot:actions>
                <x-mary-button label="{{ __('cancel') }}" @click="$wire.customerModal = false" />
                <x-mary-button label="{{ __('confirm') }}" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>

    <x-mary-modal wire:model="deleteModal" class="backdrop-blur">
        <x-mary-header title="{{ __('are-you-sure?') }}" subtitle="{{ __('press-confirm-to-delete') }}" separator class="mb-0  pb-0"/>
        <x-mary-form wire:submit="delete">
            <x-mary-input label="{{ __('name') }}" wire:model="form.nombre" readonly />
            <x-slot:actions>
                <x-mary-button label="{{ __('cancel') }}" @click="$wire.deleteModal = false" />
                <x-mary-button label="{{ __('confirm') }}" class="btn-primary" type="submit" spinner="delete" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
