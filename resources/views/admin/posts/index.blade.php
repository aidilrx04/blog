<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>

    @vite('resources/css/app.css')
</head>

<body>

    <header class="bg-gray-800 p-3">
        <h1 class="text-white font-semibold text-xl">Aidil's Blog</h1>
    </header>

    <main class="p-3">
        <h1>Posts</h1>

        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('view_post', $post->slug) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </main>

    <footer class="text-center text-gray-500">
        &copy; 2024 @aidilrx04
    </footer>
</body>

</html>
