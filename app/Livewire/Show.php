<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('PAS LA HOME PAGE')]
#[Layout('components.layouts.app')]
// Faire un nouveau layout pour la page show
class Show extends Component
{
    public Article $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.show', [
            'article' => $this->article,
        ]);
    }
}
