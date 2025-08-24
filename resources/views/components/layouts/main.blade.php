@props([
'title' => null,
'head' => null
])

<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#" class="bg-radial-[at_50%_80%] from-gray-800 to-gray-900 bg-fixed">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $title ?? '' }} {{ $title ? '/' : '' }}
        &lt;Blog /&gt;
    </title>

    <!-- Fav Icons -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicons/favicon-16x16.png">
    <link rel="icon" type="image/svg+xml" href="assets/favicons/favicon-16x16.svg">
    <!-- iPhone/iPad home screen icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/favicon-180x180.png">

    <!-- iOS Safari configuration -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <!-- Android home screen icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicons/favicon-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="/assets/favicons/favicon-512x512.png">

    <!-- Android theme integration -->
    <meta name="theme-color" content="#1e2939">

    <!-- Windows Metro tiles -->
    <meta name="msapplication-TileImage" content="assets/favicons/favicon-180x180.png">
    <meta name="msapplication-TileColor" content="#1e2939">

    <!-- Windows configuration file -->
    <meta name="msapplication-config" content="">


    @vite(['resources/css/app.css'])

    {{ $head }}
</head>

<body class="bg-radial-[at_50%_80%] from-gray-800 to-gray-900 bg-fixed">
    <div id="app" class="min-h-dvh bg-radial-[at_50%_80%] from-gray-800 to-gray-900 bg-fixed text-gray-200 relative"
        style="--background-path: url('{{ asset('assets/background.svg') }}')">

        <div class="z-0 absolute size-full left-0 top-0 bg-(image:--background-path) bg-fixed bg-repeat-x bg-bottom-left"></div>

        <div class="content relative z-10 flex flex-col min-h-dvh">
            <div id="header" class="container mx-auto max-w-4xl px-3 py-3.5 flex items-baseline gap-16">
                <div id="logo">
                    <a href="/">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-teal-600 text-4xl font-semibold">Blog</span>
                    </a>
                </div>
                <nav id="nav">
                    <ul class="flex items-baseline justify-center gap-8 text-xl uppercase text-gray-300">
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

            <main id="main" class="container flex-1 max-w-4xl mx-auto px-3 py-8 h-full">
                {{ $slot }}
            </main>

            <footer class="px-3 pt-3.5 pb-16">
                <p class="text-center">
                    &copy; {{ date('Y') }} <a href="https://aidil.dev" class="font-semibold hover:cursor-pointer">aidil.dev</a>
                </p>
            </footer>
        </div>
    </div>

</body>

</html>