@php
    use Carbon\Carbon;
@endphp

<x-layouts.front>
    <main class="container mx-auto">
        <div class="posts rounded-xl bg-surface p-4">
            <h2 class="mb-8 text-2xl font-medium text-white">Latest Posts</h2>
            <ul class="grid grid-cols-3 gap-8">
                @foreach ($posts as $post)
                    @php
                        $image = $post->image;
                        $published_date = Carbon::parse($post->updated_at)->format("d M Y");
                    @endphp

                    <li>
                        <a
                            href="{{ route("view_post", $post->slug) }}"
                            class="flex aspect-square w-full flex-col overflow-hidden rounded-xl bg-background shadow transition-all hover:-translate-x-2 hover:-translate-y-2 hover:shadow-[4px_4px_1px_theme(colors.primary)]"
                        >
                            <div class="post-image flex-1 overflow-hidden">
                                <img
                                    src="{{ route("uploads.view", optional($image)->name ?? "sample-image.jpg") }}"
                                    alt=""
                                    class="h-full max-h-full w-full max-w-full object-cover"
                                />
                            </div>
                            <article class="post-details shrink-0 p-4">
                                <h1 class="mb-2 text-lg font-medium text-white">
                                    {{ $post->title }}
                                </h1>
                                <div
                                    class="flex items-center justify-start gap-1 text-sm"
                                >
                                    <i class="ph ph-calendar-dots"></i>
                                    <span>{{ $published_date }}</span>
                                </div>
                            </article>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
</x-layouts.front>
