<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-background scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ? $title . ' - LayzBlog' : 'LayzBlog' }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

{{--    <wireui:scripts />--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-svh">
    <div class="app-background"></div>
    <main class="flex flex-col w-full min-h-svh 3xl:mx-auto max-w-5xl border-x border-x-gray-700/25 p-10 py-20 md:p-20">
        <div class="flex justify-between items-center gap-3 w-full pb-12">
            <a href="{{ route('browse') }}" class="group" wire:navigate.hover>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="min-w-6 size-6 group-hover:scale-105 group-hover:stroke-primary-400 transition stroke-primary-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>

            <div class="3xl:hidden block">
                <livewire:search/>
            </div>

            <span role="separator" class="h-px w-full bg-primary-500"></span>

            <h1 class="text-white font-serif text-lg md:text-4xl">LayzBlog</h1>

            <span role="separator" class="hidden 3xl:block h-px w-full bg-primary-500"></span>

            <div class="hidden 3xl:block">
                <livewire:search/>
            </div>
        </div>

        {{ $slot }}
    </main>
</body>
</html>
