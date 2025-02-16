<div>
    <flux:table :paginate="$this->tasks">
        <flux:columns>
            <flux:column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">Name</flux:column>
            <flux:column sortable :sorted="$sortBy === 'description'" :direction="$sortDirection" wire:click="sort('description')">Description</flux:column>
            <flux:column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">Created</flux:column>
            <flux:column sortable :sorted="$sortBy === 'updated_at'" :direction="$sortDirection" wire:click="sort('updated_at')">Last Updated</flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($this->tasks as $task)
                <flux:row :key="$task->id">
                    <flux:cell class="font-medium">
                        <a href="{{ route('tasks.show', $task) }}">
                            {{ $task->name }}
                        </a>
                    </flux:cell>

                    <flux:cell>
                        <div class="truncate max-w-md">
                            {{ $task->description }}
                        </div>
                    </flux:cell>

                    <flux:cell class="whitespace-nowrap">{{ $task->created_at->diffForHumans() }}</flux:cell>

                    <flux:cell class="whitespace-nowrap">{{ $task->updated_at->diffForHumans() }}</flux:cell>

                    <flux:cell>
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>
                    </flux:cell>
                </flux:row>
            @endforeach
        </flux:rows>
    </flux:table>
</div> 