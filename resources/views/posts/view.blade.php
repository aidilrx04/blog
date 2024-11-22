@php
    $image = $post->image;
@endphp

<x-layouts.base>
    <main
        class="mx-auto w-full max-w-full p-4 pt-24 transition-all md:w-[600px] lg:w-[800px]"
    >
        <h1 class="mb-8 text-4xl font-medium capitalize text-white">
            {{ $post->title }}
        </h1>

        <article
            class="prose prose-xl prose-green prose-invert prose-a:text-primary prose-a:decoration-primary prose-strong:text-primary prose-li:marker:text-primary"
        >
            <img src="{{ route("uploads.view", $image->name) }}" alt="" />

            {!! $post->content !!}
        </article>
    </main>
</x-layouts.base>
