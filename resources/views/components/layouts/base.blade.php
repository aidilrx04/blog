@props([
    "title" => null,
    "head" => null,
    "body_class" => null,
])

<!DOCTYPE html>
<html lang="en" class="min-h-screen">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ $title ?? "Aidil Blog" }}</title>
        <script src="https://unpkg.com/@phosphor-icons/web"></script>

        @vite("resources/css/app.css")

        {{ $head }}
    </head>

    <body
        class="{{ $body_class }} group/sidebar sidebar-show relative min-h-screen bg-background text-default"
    >
        {{ $slot }}
    </body>
</html>
