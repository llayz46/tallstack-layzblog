<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-background scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ? $title . ' - LayzBlog' : 'LayzBlog' }}</title>
{{--    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon">--}}

{{--    <wireui:scripts />--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="ba">

{{ $slot }}

</body>
</html>
