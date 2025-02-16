<div>
    <flux:table :paginate="$this->modelFamilies">
        <flux:columns>
            <flux:column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">Name</flux:column>
            <flux:column sortable :sorted="$sortBy === 'description'" :direction="$sortDirection" wire:click="sort('description')">Description</flux:column>
            <flux:column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">Created</flux:column>
            <flux:column sortable :sorted="$sortBy === 'updated_at'" :direction="$sortDirection" wire:click="sort('updated_at')">Last Updated</flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($this->modelFamilies as $family)
                <flux:row :key="$family->id">
                    <flux:cell class="font-medium">
                        <a href="{{ route('model-families.show', $family) }}">
                            {{ $family->name }}
                        </a>
                    </flux:cell>

                    <flux:cell>
                        <div class="truncate max-w-md">
                            {{ $family->description }}
                        </div>
                    </flux:cell>

                    <flux:cell class="whitespace-nowrap">{{ $family->created_at->diffForHumans() }}</flux:cell>

                    <flux:cell class="whitespace-nowrap">{{ $family->updated_at->diffForHumans() }}</flux:cell>

                    <flux:cell>
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>
                    </flux:cell>
                </flux:row>
            @endforeach
        </flux:rows>
    </flux:table>
</div> 