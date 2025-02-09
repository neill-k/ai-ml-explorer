<div>
    <flux:table :paginate="$this->models">
        <flux:columns>
            <flux:column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">Name</flux:column>
            <flux:column sortable :sorted="$sortBy === 'license'" :direction="$sortDirection" wire:click="sort('license')">License</flux:column>
            <flux:column sortable :sorted="$sortBy === 'date_updated'" :direction="$sortDirection" wire:click="sort('date_updated')">Last Updated</flux:column>
            <flux:column sortable :sorted="$sortBy === 'interpretability_score'" :direction="$sortDirection" wire:click="sort('interpretability_score')">Interpretability</flux:column>
            <flux:column>GPU Accelerated</flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($this->models as $model)
                <flux:row :key="$model->id">
                    <flux:cell class="font-medium">
                        <a href="{{ route('models.show', $model) }}" class="hover:text-primary-600">
                            {{ $model->name }}
                        </a>
                    </flux:cell>

                    <flux:cell>{{ $model->license }}</flux:cell>

                    <flux:cell class="whitespace-nowrap">{{ $model->date_updated?->diffForHumans() }}</flux:cell>

                    <flux:cell>
                        <flux:badge size="sm" :color="$model->interpretability_score >= 7 ? 'success' : ($model->interpretability_score >= 4 ? 'warning' : 'danger')" inset="top bottom">
                            {{ $model->interpretability_score }}/10
                        </flux:badge>
                    </flux:cell>

                    <flux:cell>
                        @if($model->is_gpu_accelerated)
                            <flux:badge size="sm" color="success" inset="top bottom">Yes</flux:badge>
                        @else
                            <flux:badge size="sm" color="gray" inset="top bottom">No</flux:badge>
                        @endif
                    </flux:cell>

                    <flux:cell>
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>
                    </flux:cell>
                </flux:row>
            @endforeach
        </flux:rows>
    </flux:table>
</div> 