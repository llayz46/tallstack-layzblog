<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    public function render()
    {
        $articles = collect();

        if (strlen($this->search) > 2) {
            $articles = Article::where('title', 'like', "%{$this->search}%")->get();
        }

        return view('livewire.search', [
            'articles' => $articles
        ]);
    }
}
