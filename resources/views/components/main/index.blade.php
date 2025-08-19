<x-layouts.main>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($posts as $post)
        <li>
            <a
                href="{{ route('posts.show', $post->id) }}"
                class="block group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                <div
                    class="w-full aspect-square flex items-end px-4 py-3 
                               bg-gradient-to-t from-gray-900/80 to-gray-700/40 
                               group-hover:from-gray-800/90 group-hover:to-gray-600/40 
                               transition-colors duration-300">
                    <h2 class="font-semibold text-lg text-white group-hover:text-gray-100 truncate">
                        {{ $post->title }}
                    </h2>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</x-layouts.main>