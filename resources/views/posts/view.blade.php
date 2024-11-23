@php
    use Carbon\Carbon;

    $image = $post->image;
    $published_date = Carbon::parse($post->updated_at)->format("d M Y");
@endphp

<x-layouts.front>
    <main
        class="mx-auto w-full max-w-full p-4 transition-all md:w-[600px] lg:w-[800px]"
    >
        <h1 class="mb-2 text-4xl font-medium capitalize text-white">
            {{ $post->title }}
        </h1>

        <div class="post-data mb-4 flex items-center justify-start">
            <span class="flex items-center gap-2">
                <i class="ph-bold ph-calendar-dots"></i>
                <span>{{ $published_date }}</span>
            </span>
        </div>

        <article
            class="prose prose-xl prose-green prose-invert prose-a:text-primary prose-a:decoration-primary prose-strong:text-primary prose-li:marker:text-primary"
        >
            @if ($image)
                <img src="{{ route("uploads.view", $image->name) }}" alt="" />
            @endif

            {!! $post->content !!}
        </article>
    </main>
</x-layouts.front>
