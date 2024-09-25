<div>
    <div class="flex flex-col gap-8">
        @foreach($this->articles as $article)
            <a class="group" href="{{ route('show', $article->slug) }}">
                <article class="flex flex-col gap-2 text-white/50 duration-75 group-hover:text-white/70">
                    <div class="flex w-full items-center justify-between">
                        <h2 class="text-xl md:text-2xl w-full max-w-2xl truncate whitespace-nowrap pr-4 font-medium text-white/80 group-hover:underline md:w-auto md:flex-none md:pr-0">
                            {{ $article->title }}
                        </h2>
                        <span role="separator" class="mx-2 h-px w-full bg-primary-500 hidden md:block"></span>
                        <time datetime="{{ $article->created_at }}" class="w-max whitespace-nowrap text-sm">
                            <span class="block md:hidden">{{ $article->created_at->format('d/m/y') }}</span>
                            <span class="hidden md:block">{{ ucfirst($article->created_at->translatedFormat('l')) }} {{ $article->created_at->translatedFormat('j, Y') }}</span>
                        </time>
                    </div>
                    <p class="clamp-3 md:max-w-[80%]">{{ $article->resume }}</p>
                    <div class="flex gap-2">
                        @foreach($article->tags as $tag)
                            <span class="w-fit inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-gray-700/25">{{ $tag->title }}</span>
                        @endforeach
                    </div>
                </article>
            </a>

            @if(!$loop->last)
                <span class="h-px w-full bg-stripe"></span>
            @endif
        @endforeach
    </div>

    <div x-intersect.full="$wire.loadMore()">
        <div class="sr-only" wire:loading>Loading more</div>
    </div>
</div>
