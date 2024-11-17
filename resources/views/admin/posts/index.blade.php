<x-layouts.admin title="Posts | Aidil">
    <div class="rounded-xl bg-surface p-6">
        <h1 class="text-white mb-4 text-2xl font-medium">Posts</h1>

        <ul class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <li>
                    <a
                        class="flex aspect-square h-full w-full flex-col overflow-hidden rounded-xl bg-background shadow-sm transition-all hover:-translate-x-2 hover:-translate-y-2 hover:shadow-[4px_4px_1px_theme(colors.primary)]"
                        href="{{ route("view_post", $post->slug) }}"
                    >
                        <div class="img flex-1 bg-background"></div>
                        <div class="text-white p-4 font-medium capitalize">
                            <span>
                                {{ $post->title }}
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.admin>
