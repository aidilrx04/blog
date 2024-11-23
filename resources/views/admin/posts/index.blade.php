<x-layouts.admin title="Posts | Aidil">
    <div class="rounded-xl bg-surface p-6">
        <h1 class="mb-4 text-2xl font-medium text-white">Posts</h1>

        <ul class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <li>
                    <a
                        class="flex aspect-square h-full w-full flex-col overflow-hidden rounded-xl bg-background shadow-sm transition-all hover:-translate-x-2 hover:-translate-y-2 hover:shadow-[4px_4px_1px_theme(colors.primary)]"
                        href="{{ route("admin.posts.edit", $post->slug) }}"
                    >
                        <div class="img flex-1 overflow-hidden bg-background">
                            <img
                                src="{{ route("uploads.view", optional($post->image)->name ?? "sample-image.jpg") }}"
                                alt=""
                                class="size-full max-h-full max-w-full object-cover"
                            />
                        </div>
                        <div class="p-4 font-medium capitalize text-white">
                            <span>
                                {{ empty(trim($post->title)) === false ? $post->title : "(no title)" }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.admin>
