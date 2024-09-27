<div>
    <div class="flex flex-col gap-8">
        @if($posts->count())
            @foreach($posts as $post)
                <article>
                    <a href="{{ route('show', $post->slug) }}" class="flex flex-col gap-2 text-white/50 duration-75 group-hover:text-white/70 group">
                        <div class="flex w-full items-center justify-between">
                            <h2 class="text-xl md:text-2xl w-full max-w-2xl truncate whitespace-nowrap pr-4 font-medium text-white/80 group-hover:underline md:w-auto md:flex-none md:pr-0">
                                {{ $post->title }}
                            </h2>
                            <span role="separator" class="mx-2 h-px w-full bg-primary-500 hidden md:block"></span>
                            <time datetime="{{ $post->date }}" class="w-max whitespace-nowrap text-sm">
                                <span class="block md:hidden">{{ $post->date->format('d/m/y') }}</span>
                                <span class="hidden md:block">{{ ucfirst($post->date->translatedFormat('l')) }} {{ $post->date->translatedFormat('j, M Y') }}</span>
                            </time>
                        </div>
                        <p class="clamp-3 md:max-w-[80%]">{{ $post->teaser }}</p>
                    </a>
                    <div class="flex gap-2 mt-2">
                        @foreach($post->tags as $tag)
                            <span wire:click="filterPostsByTag('{{ $tag }}')" class="cursor-pointer w-fit inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-gray-700/25 hover:bg-gray-700/10">{{ $tag }}</span>
                        @endforeach
                    </div>
                </article>

                @if(!$loop->last)
                    <span class="h-px w-full bg-stripe"></span>
                @endif
            @endforeach
        @else
            <p>No posts found</p>
        @endif
    </div>

    <div x-intersect.full="$wire.loadMore()">
        <div class="sr-only" wire:loading>Loading more</div>
    </div>
</div>
