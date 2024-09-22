<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
#[Layout('components.layouts.app')]
class Browse extends Component
{
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
