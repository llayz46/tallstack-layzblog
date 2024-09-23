<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Home')]
#[Layout('components.layouts.app')]
class Browse extends Component
{
    use WithPagination;

    public int $perPage = 10;

    public function loadMore() {
        $this->perPage += 10;
    }

    #[Computed()]
    public function articles()
    {
        return Article::paginate($this->perPage);
    }

//    public function render()
//    {
//        return view('livewire.browse');
//    }
}
