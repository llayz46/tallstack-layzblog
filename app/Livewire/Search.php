<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Sheets\Facades\Sheets;

class Search extends Component
{
    public string $search = '';

    public function render()
    {
        $posts = collect();
        if (strlen($this->search) > 2) {
            $posts = Sheets::collection('posts')->all()->filter(function ($post) {
                return str_contains(strtolower($post->title), strtolower($this->search));
            });
        }

        return view('livewire.search', [
            'posts' => $posts
        ]);
    }
}
