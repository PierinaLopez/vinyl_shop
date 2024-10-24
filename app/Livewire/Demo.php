<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Record;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Demo extends Component
{
    use WithPagination;
    public $maxPrice = 100;
    public $perPage = 8;

    #[Layout('layouts.vinylshop', [
        'title' => 'Eloquent models',
        'subtitle' => 'Eloquent models: part 2',
        'description' => 'Eloquent models: part 2',
    ])]
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $records = Record::orderBy('artist')
            ->paginate($this->perPage);

        $genres = Genre::orderBy('name')
            ->with('records')
            ->has('records')
            ->get();
        return view('livewire.demo', compact('records','genres'));
    }
}
