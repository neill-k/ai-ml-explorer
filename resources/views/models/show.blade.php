<x-main-layout>
<flux:card class="drop-shadow-lg">

    <div class="flex justify-between items-center">
        <flux:heading size="xl" level="1">
            {{ $model->name }}
        </flux:heading>

        <flux:button href="{{ route('models.index') }}">
            {{ __('Back to List') }}
        </flux:button>
    </div>

    <div class="mt-8">
        <flux:tab.group>
            <flux:tabs class="px-4">
                <flux:tab name="overview" icon="document-text">Overview</flux:tab>
                @if($model->tasks && $model->tasks->count() > 0)
                    <flux:tab name="tasks" icon="check-circle">Tasks</flux:tab>
                @endif
                @if($model->useCases && $model->useCases->count() > 0)
                    <flux:tab name="use-cases" icon="light-bulb">Use Cases</flux:tab>
                @endif
                @if($model->researchPapers && $model->researchPapers->count() > 0)
                    <flux:tab name="papers" icon="academic-cap">Research Papers</flux:tab>
                @endif
            </flux:tabs>

            <flux:tab.panel name="overview">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <flux:container>
                            <flux:heading level="2" size="lg" class="mb-4">
                                {{ __('Description') }}
                            </flux:heading>
                            {!! Str::markdown($model->markdown_description) !!}
                        </flux:container>

                       
                    </div>

                    <div class="space-y-6">
                        <flux:container>
                            <flux:heading level="2" size="lg" class="mb-4">
                                {{ __('Model Details') }}
                            </flux:heading>
                            
                            <dl class="divide-y">
                                <div class="py-4">
                                    <dt>{{ __('License') }}</dt>
                                    <dd class="mt-1">{{ $model->license }}</dd>
                                </div>


                                <div class="py-4">
                                    <dt>{{ __('Maintainers/Authors') }}</dt>
                                    <dd class="mt-1">{{ $model->maintainers_authors }}</dd>
                                </div>


                                <div class="py-4">
                                    <dt>{{ __('Last Updated') }}</dt>
                                    <dd class="mt-1">{{ $model->date_updated?->diffForHumans() }}</dd>
                                </div>

                                <div class="py-4">
                                    <dt>{{ __('GPU Accelerated') }}</dt>
                                    <dd class="mt-1">
                                        @if($model->is_gpu_accelerated)
                                            <flux:badge color="success">Yes</flux:badge>
                                        @else
                                            <flux:badge color="gray">No</flux:badge>
                                        @endif
                                    </dd>
                                </div>

                                <div class="py-4">
                                    <dt>{{ __('Interpretability Score') }}</dt>
                                    <dd class="mt-1">
                                        <flux:badge :color="$model->interpretability_score >= 7 ? 'success' : ($model->interpretability_score >= 4 ? 'warning' : 'danger')">
                                            {{ $model->interpretability_score }}/10

                                        </flux:badge>
                                    </dd>
                                </div>
                            </dl>
                        </flux:container>
                    </div>
                </div>
            </flux:tab.panel>

            @if($model->tasks && $model->tasks->count() > 0)
                <flux:tab.panel name="tasks">
                    <flux:container>
                        <ul class="divide-y">
                            @foreach($model->tasks as $task)
                                <li class="py-4">
                                    <div class="flex items-start gap-4">
                                        <flux:icon name="check-circle" class="shrink-0" />
                                        <div>
                                            <div class="font-medium">
                                                <a href="{{ route('tasks.show', $task) }}" class="hover:text-primary-600">
                                                    {{ $task->name }}
                                                </a>
                                            </div>
                                            @if($task->description)
                                                <div class="mt-1 text-sm">{{ $task->description }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </flux:container>
                </flux:tab.panel>
            @endif

            @if($model->useCases && $model->useCases->count() > 0)
                <flux:tab.panel name="use-cases">
                    <flux:container>
                        <ul class="divide-y">
                            @foreach($model->useCases as $useCase)
                                <li class="py-4">
                                    <div class="flex items-start gap-4">
                                        <flux:icon name="light-bulb" class="shrink-0" />
                                        <div>
                                            <div class="font-medium">{{ $useCase->name }}</div>
                                            @if($useCase->description)
                                                <div class="mt-1 text-sm">{{ $useCase->description }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </flux:container>
                </flux:tab.panel>
            @endif

            @if($model->researchPapers && $model->researchPapers->count() > 0)
                <flux:tab.panel name="papers">
                    <flux:container>
                        <ul class="divide-y">
                            @foreach($model->researchPapers as $paper)
                                <li class="py-4">
                                    <div class="flex items-start gap-4">
                                        <flux:icon name="academic-cap" class="shrink-0" />
                                        <div>
                                            <div class="font-medium">
                                                @if($paper->url)
                                                    <a href="{{ $paper->url }}" target="_blank" class="text-primary-600 hover:text-primary-500">
                                                        {{ $paper->title }}
                                                    </a>
                                                @else
                                                    {{ $paper->title }}
                                                @endif
                                            </div>
                                            <div class="mt-1 text-sm text-gray-600">
                                                {{ $paper->authors }}
                                                @if($paper->publication_date)
                                                    <span class="text-gray-400"> · {{ $paper->publication_date->format('Y') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </flux:container>
                </flux:tab.panel>
            @endif
        </flux:tab.group>
    </div>
</flux:card>
</x-main-layout> 