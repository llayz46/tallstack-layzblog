<div>
    @foreach($this->articles as $article)
        <div class="flex flex-col w-full p-8 bg-gray-800/50 rounded-lg mb-8">
            <h2 class="text-white font-serif text-2xl">{{ $article->title }}</h2>
        </div>
    @endforeach
    <div x-intersect.full="$wire.loadMore()">
        <div wire:loading>Loading more</div>
    </div>
</div>
