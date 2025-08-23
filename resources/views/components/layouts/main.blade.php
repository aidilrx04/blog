@props([
'title' => null,
'head' => null
])

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $title ?? '' }} {{ $title ? '/' : '' }}
        &lt;Blog /&gt;
    </title>

    @vite(['resources/css/app.css'])

    {{ $head }}
</head>

<body>
    <div id="app" class="min-h-dvh bg-radial-[at_50%_80%] from-gray-800 to-gray-900 bg-fixed text-gray-200 relative"
        style="--background-path: url('{{ asset('assets/background.svg') }}')">

        <div class="z-0 absolute size-full left-0 top-0 bg-(image:--background-path) bg-fixed bg-repeat-x bg-bottom-left"></div>

        <div class="content relative z-10">
            <div id="header" class="container mx-auto max-w-4xl px-3 py-3.5 flex items-baseline gap-16">
                <div id="logo">
                    <a href="/">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-teal-600 text-4xl font-semibold">Blog</span>
                    </a>
                </div>
                <nav id="nav">
                    <ul class="flex items-baseline justify-center gap-8 text-2xl text-gray-300">
                        <!-- <li>
                            <a href="/posts" class="hover:text-gray-50 transition">
                                Posts
                            </a>
                        </li> -->
                        <li>
                            <a href="/admin/login" class="hover:text-gray-50 transition">
                                Sign In
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div id="main" class="container max-w-4xl mx-auto px-3 py-8">
                {{ $slot }}
            </div>
        </div>
    </div>

</body>

</html>