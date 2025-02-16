<x-main-layout>
    <flux:card class="drop-shadow-lg">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" level="1">
                {{ $task->name }}
            </flux:heading>

            <flux:button href="{{ route('tasks.index') }}">
                {{ __('Back to List') }}
            </flux:button>
        </div>

        <div class="mt-8">
            <flux:tab.group>
                <flux:tabs class="px-4">
                    <flux:tab name="overview" icon="document-text">Overview</flux:tab>
                    @if($task->models && $task->models->count() > 0)
                        <flux:tab name="models" icon="cube">AI Models</flux:tab>
                    @endif
                </flux:tabs>

                    <flux:tab.panel name="overview">
                        <flux:container>
                            <div class="prose max-w-none">
                                <div class="mb-8">
                                    <h2 class="text-lg font-semibold mb-2">Description</h2>
                                    <p>{{ $task->description }}</p>
                                </div>

                                <div class="mb-8">
                                    <h2 class="text-lg font-semibold mb-2">Created</h2>
                                    <p>{{ $task->created_at->format('F j, Y') }}</p>
                                </div>

                                <div class="mb-8">
                                    <h2 class="text-lg font-semibold mb-2">Last Updated</h2>
                                    <p>{{ $task->updated_at->format('F j, Y') }}</p>
                                </div>
                            </div>
                        </flux:container>
                    </flux:tab.panel>

                    @if($task->models && $task->models->count() > 0)
                        <flux:tab.panel name="models">
                            <flux:container>
                                <ul class="divide-y">
                                    @foreach($task->models as $model)
                                        <li class="py-4">
                                            <div class="flex items-start gap-4">
                                                <flux:icon name="cube" class="shrink-0" />
                                                <div>
                                                    <div class="font-medium">
                                                        <a href="{{ route('models.show', $model) }}" class="hover:text-primary-600">
                                                            {{ $model->name }}
                                                        </a>
                                                    </div>
                                                    @if($model->markdown_description)
                                                        <div class="mt-1 text-sm">
                                                            {{ Str::limit(strip_tags($model->markdown_description), 200) }}
                                                        </div>
                                                    @endif
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