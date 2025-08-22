<x-layouts.main>
    <div class="hero h-72 flex flex-col items-center justify-center -mt-8">
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
        <p class="mt-4 text-lg text-gray-500 max-w-2xl">
            Unlock learning without limits. Accessible, Inspiring, and Built for Everyone.
        </p>
    </div>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($posts as $post)
        @php
        $bg_image = $post->image ?? '/assets/default-post-background.svg';
        @endphp
        <li>
            <a
                href="{{ route('posts.show', $post->id) }}"
                class="block group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border-2 border-gray-800 hover:bg-gray-800/50">
                <div
                    class="w-full aspect-square flex items-end px-4 py-3 relative">
                    <img src="{{ asset('storage/'.$bg_image) }}" alt="" class="size-full absolute left-0 top-0 block object-cover group-hover:brightness-75">
                    <h2 class="relative font-semibold text-lg text-white group-hover:text-blue-400 line-clamp-2 h-[2lh] ">
                        {{ $post->title }}
                    </h2>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</x-layouts.main>