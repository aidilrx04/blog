<x-layouts.main>

    <x-slot:head>
        <meta name="description" content="Knowledge for All, Unlock learning without limits. Accessible, Inspiring and Built for everyone">
        <meta name="keywords" content="blog, aidil.dev, aidil blog, knowledge">
        <meta name="og:title" content="<Blog/> Aidil">
        <meta name="og:description" content="Knowledge for All, Unlock learning without limits. Accessible, Inspiring and Built for everyone">
        <meta name="og:url" content="{{ route('posts.index') }}">
        <meta name="og:type" content="website">
        <meta name="og:image" content="{{ asset("assets/default-post-background.svg") }}">
        <meta name="og:image:alt" content="Aidil's Blog Logo">
        <meta name="og:site_name" content="Aidil's Blog">
        <meta name="og:locale" content="en_US">
        <link rel="canonical" href="{{ route('posts.index') }}">
    </x-slot:head>

    <div class="hero h-72 flex flex-col items-center justify-center -mt-8 text-center">
        <!-- <h1 class="font-semibold text-5xl"><span class="text-blue-400">Knowledge</span> for <span class="text-teal-600">All</span></h1> -->
        <h1 class="font-black text-6xl leading-tight tracking-tight text-gray-900">
            <span class="bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">
                Knowledge
            </span>
            <span class="text-gray-600">for</span>
            <span class="bg-gradient-to-r from-teal-400 to-teal-600 bg-clip-text text-transparent">
                All
            </span>
        </h1>
        <p class="mt-4 text-xl text-gray-500 max-w-2xl">
            Unlock learning without limits. Accessible, Inspiring, and Built for Everyone.
        </p>
    </div>
    <ul class="grid grid-cols-1 md:grid-cols-2  gap-6">
        @foreach ($posts as $post)
        @php
        $bg_image = $post->image ?? '/assets/default-post-background.svg';
        @endphp
        <li>
            <article>

                <a
                    href="{{ $post->getUrl() }}"
                    class="block group">
                    <div
                        class="w-full rounded-2xl overflow-hidden aspect-4/3 flex items-end px-4 py-3 relative shadow-md hover:shadow-xl transition-shadow duration-300 border-2 border-gray-800 hover:bg-gray-800/50">
                        <img src="{{ asset($bg_image) }}" alt="" class="size-full absolute left-0 top-0 block object-cover group-hover:brightness-75">

                    </div>
                    <h2 class="font-semibold box-content text-lg text-white group-hover:text-blue-400 line-clamp-2 my-3.5 ">
                        {{ $post->title }}
                    </h2>
                </a>
            </article>
        </li>
        @endforeach
    </ul>

    <div class="paginator py-3.5">
        {{ $posts->links() }}
    </div>
</x-layouts.main>