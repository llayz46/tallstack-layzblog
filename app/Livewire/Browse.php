<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Sheets\Facades\Sheets;

#[Title('Home')]
#[Layout('components.layouts.app')]
class Browse extends Component
{
    use WithPagination;

    public int $perPage = 10;

    public ?string $selectedTag = null;

    public function loadMore() {
        $this->perPage += 10;
    }

    public function filterPostsByTag($tag = null)
    {
        $this->selectedTag = $tag;
    }

    public function render()
    {
        $posts = $this->selectedTag
            ? Sheets::collection('posts')->all()->filter(fn($post) => in_array($this->selectedTag, $post->tags))->sortByDesc('date')->paginate($this->perPage)
            : Sheets::collection('posts')->all()->sortByDesc('date')->paginate($this->perPage);

        return view('livewire.browse', [
            'posts' => $posts,
        ]);
    }
}
