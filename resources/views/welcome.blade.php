<x-main-layout>
    <div class="space-y-8">
        <div>
            <flux:heading size="xl" level="1">AI/ML Explorer</flux:heading>
            <flux:text>
                AI/ML Explorer is a platform for exploring AI/ML models, tasks, and applications.
            </flux:text>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <flux:card>
                <flux:heading size="lg" level="2">Models</flux:heading>
                <flux:text>
                    Explore AI/ML models and their capabilities.
                </flux:text>
                <div class="mt-4">
                    <flux:button href="{{ route('models.index') }}">
                        View Models
                    </flux:button>
                </div>
            </flux:card>

            <flux:card>
                <flux:heading size="lg" level="2">Tasks</flux:heading>
                <flux:text>
                    Discover tasks that can be solved with AI/ML models.
                </flux:text>
                <div class="mt-4">
                    <flux:button href="{{ route('tasks.index') }}">
                        View Tasks
                    </flux:button>
                </div>
            </flux:card>

            <flux:card>
                <flux:heading size="lg" level="2">Model Families</flux:heading>
                <flux:text>
                    Browse collections of related AI/ML models.
                </flux:text>
                <div class="mt-4">
                    <flux:button href="{{ route('model-families.index') }}">
                        View Families
                    </flux:button>
                </div>
            </flux:card>
        </div>
    </div>
</x-main-layout>

