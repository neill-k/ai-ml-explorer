<x-main-layout>
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('AI Models') }}
                </h2>
                @auth
                    <x-button href="{{ route('models.create') }}" class="bg-primary-600 hover:bg-primary-700">
                        {{ __('Add Model') }}
                    </x-button>
                @endauth
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <livewire:a-i-model-list />
                </div>
            </div>
        </div>
    </div>
</x-main-layout> 