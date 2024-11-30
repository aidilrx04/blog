@aware([
    "title" => null,
    "head" => null,
])

@php
    $user = request()->user();
@endphp

<x-layouts.base :$title :$head>
    <header class="fixed left-0 top-0 z-10 flex h-[96px] w-full">
        <div
            class="ml-[196px] flex flex-1 items-center justify-between bg-background px-4"
        >
            <div class="sidebard-toggler">
                <i
                    class="ph-bold ph-text-indent cursor-pointer text-2xl text-white"
                ></i>
            </div>
            <button
                class="profile group relative flex h-full items-center justify-center"
            >
                {{-- <div class="size-14 rounded-full bg-surface"></div> --}}
                <span class="text-xl font-medium uppercase text-white">
                    {{ $user->name }}
                </span>

                <div
                    class="absolute right-0 top-full hidden min-w-[300px] overflow-hidden rounded-lg bg-surface shadow-xl group-focus-within:block group-hover:block group-focus:block"
                >
                    <ul
                        class="flex flex-col items-stretch justify-center py-4 text-lg font-medium text-white"
                    >
                        <li>
                            <a
                                href="{{ route("auth.logout") }}"
                                class="flex w-full flex-1 items-center justify-start gap-3 px-4 py-2 hover:bg-background/25"
                            >
                                <i
                                    class="ph-bold ph-sign-out text-white/75"
                                ></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </button>
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
