@props(['article'])

<li>
    <a {{ $attributes->class(['group flex select-none items-center rounded-md px-3 py-2 hover:bg-gray-700/15']) }}>
        <span class="flex-auto truncate">{{ $article->title }}</span>
    </a>
</li>
