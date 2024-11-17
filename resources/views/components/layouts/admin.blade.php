@aware([
    "title" => null,
])

<x-layouts.base>
    <header class="fixed left-0 top-0 z-10 flex h-[96px] w-full">
        <div
            class="ml-[196px] flex flex-1 items-center justify-between bg-background px-4"
        >
            <div class="sidebard-toggler">
                <i
                    class="ph-bold ph-text-indent text-white cursor-pointer text-2xl"
                ></i>
            </div>
            <div class="profile">
                <div class="size-14 rounded-full bg-surface"></div>
            </div>
        </div>
    </header>
    <div class="relative flex h-full min-h-screen w-full">
        <div class="sidebar relative w-[196px] shrink-0">
            <div
                class="fixed left-0 top-0 h-full w-[196px] border-r-[3px] border-r-surface"
            >
                <div class="logo mb-4 h-[96px] w-full">
                    <div
                        class="fixed left-0 top-0 flex h-[96px] w-[196px] items-center justify-center bg-background p-4"
                    >
                        <img
                            class="h-full w-full object-contain"
                            src="https://aidilrx04.vercel.app/favicon.ico"
                            alt=""
                        />
                    </div>
                </div>
                <nav class="overflow-y-auto">
                    <ul class="flex flex-col gap-4">
                        <li class="border-r-[3px]as border-r-primary px-4">
                            <a
                                class="flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-lg text-background"
                                href="{{ route("admin.posts.index") }}"
                            >
                                <i class="ph-fill ph-house-simple"></i>
                                <span>Posts</span>
                            </a>
                        </li>
                        <li class="border-r-[3px] border-r-surface px-4">
                            <a
                                class="flex items-center gap-2 rounded-lg bg-background px-4 py-2 text-lg text-default"
                                href="{{ route("admin.posts.create") }}"
                            >
                                <i class="ph-bold ph-plus"></i>
                                <span>Create Post</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <main class="main flex-1 p-4">
            <div class="mb-[96px]"></div>
            {{ $slot }}
        </main>
    </div>
</x-layouts.base>
