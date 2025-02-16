<x-main-layout>
    <flux:card class="drop-shadow-lg">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" level="1">
                {{ __('Model Families') }}
            </flux:heading>
        </div>

        <div class="mt-8">
            <livewire:model-family-list />
        </div>
    </flux:card>
</x-main-layout> 