@props(['post'])

<li>
    <a href="{{ route('show', $post->slug) }}" {{ $attributes->class(['group flex select-none items-center rounded-md px-3 py-2 hover:bg-gray-700/15']) }}>
        <span class="flex-auto truncate">{{ $post->title }}</span>
    </a>
</li>
