<x-layouts.app title="{{ $post->title }}">
    <article class="prose-sm mx-auto w-full max-w-2xl py-6 md:prose md:prose-invert md:py-8">
        <div class="md:mb-6">
            <time datetime="{{ $post->time }}" class="mb-1 text-xs opacity-50">{{ ucfirst($post->date->translatedFormat('F')) }} {{ $post->date->translatedFormat('j, Y') }}</time>
            <h1 class="text-2xl md:text-3xl font-bold">{{ $post->title }}</h1>
        </div>
        <x-markdown>
            {{ $post->contents }}
        </x-markdown>
    </article>
</x-layouts.app>
