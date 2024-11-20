<x-layouts.base>
    {{-- Navbar --}}

    <header class="sticky left-0 top-0 z-10 h-[96px] bg-background">
        <div
            class="container mx-auto flex items-center justify-start gap-4 px-4"
        >
            <a
                href="{{ route("index") }}"
                class="py-4 text-4xl font-black text-primary"
            >
                Aidil
            </a>
            <nav>
                <ul
                    class="flex items-center gap-4 text-xl font-medium uppercase tracking-wider text-white"
                >
                    <li class="px-4">
                        <a
                            href="{{ route("index") }}"
                            class="block rounded-xl p-4 text-primary underline underline-offset-8 hover:text-primary hover:underline"
                        >
                            Posts
                        </a>
                    </li>
                    <li>
                        <a
                            href="#project"
                            class="block underline-offset-8 hover:text-primary hover:underline"
                        >
                            Project
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mx-auto">
        <div class="posts rounded-xl bg-surface p-4">
            <h2 class="mb-8 text-2xl font-medium text-white">Latest Posts</h2>
            <ul class="grid grid-cols-3 gap-8">
                @foreach ($posts as $post)
                    <li>
                        <a
                            href="{{ route("view_post", $post->slug) }}"
                            class="flex aspect-square w-full flex-col overflow-hidden rounded-xl bg-background shadow transition-all hover:-translate-x-2 hover:-translate-y-2 hover:shadow-[4px_4px_1px_theme(colors.primary)]"
                        >
                            <div class="post-image flex-1"></div>
                            <div class="post-details bg-surface p-4">
                                <span class="text-lg font-medium text-white">
                                    {{ $post->title }}
                                </span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>
</x-layouts.base>
