<div x-data="{ search: false }">
    <button @keydown.window.prevent.ctrl.k="search = true; $nextTick(() => $refs.searchInput.focus())" @click="search = true; $nextTick(() => $refs.searchInput.focus())" class="flex my-auto group">
        <span class="sr-only">Rechercher</span>
        <svg class="min-w-6 size-6 group-hover:scale-105 group-hover:stroke-primary-400 transition stroke-primary-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
    </button>

    <div class="relative z-10" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-background bg-opacity-50 transition-opacity"
             x-show="search" x-cloak
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto p-4 sm:p-6 md:p-20" x-show="search" x-cloak>

            <div class="mt-16 mx-auto max-w-2xl transform divide-y divide-gray-700/50 overflow-hidden rounded-xl bg-gray-700/25 shadow-2xl ring-1 ring-black ring-opacity-5 backdrop-blur backdrop-filter transition-all"
                 @click.outside="search = false"
                 @keydown.escape.window="search = false"
                 x-show="search" x-cloak
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">
                <div class="relative">
                    <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-white/40" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                    </svg>
                    <input type="search" wire:model.live.debounce.150ms="search" x-ref="searchInput" autofocus class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-300 placeholder:text-white/40 focus:ring-0 sm:text-sm" placeholder="Rechercher..." role="combobox" aria-expanded="false" aria-controls="options">
                </div>

                @if($posts->count() > 0)
                    <div class="w-full max-h-80 scroll-py-2 divide-y divide-gray-500 divide-opacity-10 overflow-y-auto">
                        <div class="p-2">
                            <ul class="text-sm text-gray-300">
                                @foreach($posts as $post)
                                    <x-search.results href="#" :$post/>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div wire:loading.remove class="px-6 py-14 text-center sm:px-14">
                        <p class="mt-4 text-sm text-gray-300">Désolé, aucun article ne correspond à votre recherche.</p>
                    </div>
                @endif

                @if($posts->count() === 0)
                    <div wire:loading class="p-2 w-full">
                        <div class="bg-shimmer animate-shimmer bg-[length:200%_100%] flex select-none items-center rounded-md px-3 h-6 bg-gray-700/15"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
