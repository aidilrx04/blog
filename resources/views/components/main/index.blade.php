<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Some Title</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div id="app" class="bg-gray-800 text-white bg-radial-[at_50%_75%] from-gray-800 to-gray-900">

        <header class="flex px-3 py-2.5 items-center justify-between">
            <h1 class="font-semibold text-xl">Blog</h1>
            <nav>
                <ul>
                    <li>
                        <a href="/admin/login">Sign In</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="px-3 py-2.5">
            <ul class="grid grid-cols-3 gap-4">
                @foreach ($posts as $post)
                <li>
                    <a href="posts/{{ $post->id }}">
                        <div class="w-full aspect-square flex items-end justify-start px-3 py-2.5 rounded bg-gray-700">
                            <h2 class="font-semibold text-lg ">{{ $post->title }}</h2>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </main>
    </div>
</body>

</html>