<x-layouts.base>
    <main class="mx-auto w-[600px] max-w-full p-4 pt-24">
        <h1 class="mb-8 text-4xl font-medium capitalize text-white">
            {{ $post->title }}
        </h1>

        <p class="">{!! $post->content !!}</p>
    </main>
</x-layouts.base>
