<x-layouts.admin>
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

</x-layouts.admin>
