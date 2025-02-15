<?php

namespace App\Livewire;

use App\Models\AiModel;
use Livewire\Component;
use Livewire\WithPagination;

class AiModelList extends Component
{
    use WithPagination;

    public $sortBy = 'name';
    public $sortDirection = 'desc';

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[\Livewire\Attributes\Computed]
    public function models()
    {
        return AiModel::query()
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.ai-model-list');
    }
} 