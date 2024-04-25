<div>
    <x-mary-header title="{{ __('documents') }}">
        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-magnifying-glass" wire:model.live='search' placeholder="{{ __('search') }}..."
                class="border-gray-500" />
        </x-slot:middle>
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="btn-success" wire:click="showModal()" spinner />
        </x-slot:actions>
    </x-mary-header>

    {{-- You can use any `$wire.METHOD` on `@row-click` --}}
    <x-mary-table :headers="$headers" :rows="$documents" with-pagination :sort-by="$sortBy" wire:model="expanded" expandable>
        {{-- Overrides headers --}}
        @scope('header_id', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope
        @scope('header_customer.nombre', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope
        @scope('header_fecha', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope
        @scope('header_total', $header)
            <h2 class="text-xl font-bold inline">
                {{ $header['label'] }}
            </h2>
        @endscope

        @scope('cell_total', $document)
            Q {{ number_format($document->total, 2) }}
        @endscope

        {{-- Special `expansion` slot --}}
        @scope('expansion', $document)
            <div class="px-8 font-bold">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="col-span-1 sm:col-span-6 sm:grid sm:grid-cols-6 sm:gap-5 sm:space-y-0">
                        <div class="col-span-1 sm:col-span-2">
                            <x-mary-input label="{{ __('code') }}" readonly value="{{ $document->lines[0]->codigo }}" />
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <x-mary-input label="{{ __('qty') }}" readonly
                                value="{{ $document->lines[0]->cantidad }}" />
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <x-mary-input label="{{ __('number') }}" readonly class="col-span-1"
                                value="{{ str_pad($document->numero, 4, '0', STR_PAD_LEFT) }}" />
                        </div>
                    </div>
                    <div class="col-span-1 sm:col-span-6">
                        <x-mary-textarea label="{{ __('description') }}" wire:model="form.descripcion" rows="3"
                            inline readonly />
                    </div>
                </div>
            </div>
        @endscope
    </x-mary-table>

    {{-- Modal to create new doc --}}
    <x-mary-modal wire:model="docModal" class="backdrop-blur">
        <x-mary-form wire:submit="save">
            <x-mary-input label="{{ __('name') }}" wire:model="form.nombre" required />
            <x-mary-input label="{{ __('dpi') }}" wire:model="form.dpi" icon="o-identification" required />

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="col-span-1 space-y-6 sm:col-span-2 sm:grid sm:grid-cols-7 sm:gap-5 sm:space-y-0">
                    <div class="col-span-1 sm:col-span-2">
                        <x-mary-input label="{{ __('code') }}" wire:model="form.codigo" readonly />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-mary-input label="{{ __('qty') }}" wire:model="form.cantidad" readonly
                            class="col-span-1" />
                    </div>
                    <div class="col-span-1 sm:col-span-3">
                        <x-mary-input label="{{ __('amount') }}" wire:model="form.monto" readonly
                            class="col-span-1" />
                    </div>
                </div>
            </div>
            <x-mary-input label="{{ __('date') }}" wire:model="form.fecha" readonly />
            <x-mary-textarea label="{{ __('description') }}" wire:model="form.descripcion" rows="3" inline
                readonly />

            <x-slot:actions>
                <x-mary-button label="{{ __('cancel') }}" @click="$wire.docModal = false" />
                <x-mary-button label="{{ __('confirm') }}" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
