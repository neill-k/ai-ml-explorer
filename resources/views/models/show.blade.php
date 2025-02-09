<x-main-layout>
    <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $model->name }}
                </h2>
                <div class="flex gap-4">
                    @auth
                        <x-button href="{{ route('models.edit', $model) }}" class="bg-primary-600 hover:bg-primary-700">
                            {{ __('Edit') }}
                        </x-button>
                    @endauth
                    <x-button href="{{ route('models.index') }}" class="bg-gray-500 hover:bg-gray-600">
                        {{ __('Back to List') }}
                    </x-button>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Model Details') }}</h3>
                            <dl class="grid grid-cols-1 gap-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('License') }}</dt>
                                    <dd class="mt-1">{{ $model->license }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Maintainers/Authors') }}</dt>
                                    <dd class="mt-1">{{ $model->maintainers_authors }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Last Updated') }}</dt>
                                    <dd class="mt-1">{{ $model->date_updated?->diffForHumans() }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('GPU Accelerated') }}</dt>
                                    <dd class="mt-1">
                                        @if($model->is_gpu_accelerated)
                                            <x-badge color="success">Yes</x-badge>
                                        @else
                                            <x-badge color="gray">No</x-badge>
                                        @endif
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">{{ __('Interpretability Score') }}</dt>
                                    <dd class="mt-1">
                                        <x-badge :color="$model->interpretability_score >= 7 ? 'success' : ($model->interpretability_score >= 4 ? 'warning' : 'danger')">
                                            {{ $model->interpretability_score }}/10
                                        </x-badge>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-4">{{ __('Description') }}</h3>
                            <div class="prose max-w-none">
                                {!! Str::markdown($model->markdown_description) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout> 