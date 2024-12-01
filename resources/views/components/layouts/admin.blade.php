@aware([
    "title" => null,
    "head" => null,
])

@php
    $user = request()->user();

    $sidebar_navs = collect([
        [
            "icon" => "ph-fill ph-house-simple",
            "label" => "Posts",
            "route" => route("admin.posts.index"),
        ],
        [
            "icon" => "ph-bold ph-plus",
            "label" => "Create Post",
            "route" => route("admin.posts.create"),
        ],
    ]);

    if (! function_exists("active_route")) {
        function active_route($url)
        {
            if (url()->current() === $url) {
                return "active";
            }

            return "";
        }
    }
@endphp

<x-layouts.base :$title :$head>
    <header class="fixed left-0 top-0 z-10 flex h-[96px] w-full">
        <div
            class="ml-[96px] flex flex-1 items-center justify-between bg-background px-4 transition-[margin-left] group-[.sidebar-show]/sidebar:ml-[300px]"
        >
            <button id="sidebar-toggle" class="sidebard-toggler">
                <i
                    class="ph-bold ph-text-indent cursor-pointer text-2xl text-white"
                ></i>
            </button>
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
        <div
            class="sidebar relative w-[96px] shrink-0 transition-[width] group-[.sidebar-show]/sidebar:w-[300px]"
        >
            <div
                class="fixed left-0 top-0 h-full w-[96px] border-r-[3px] border-r-surface group-[.sidebar-show]/sidebar:w-[300px]"
            >
                <div class="logo mb-4 h-[96px] w-full">
                    <div
                        class="fixed left-0 top-0 flex h-[96px] w-[96px] items-center justify-center bg-background p-4 transition-[width] group-[.sidebar-show]/sidebar:w-[300px]"
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
                        @foreach ($sidebar_navs as $nav)
                            <li
                                class="{{ active_route($nav["route"]) }} group/nav-link px-4"
                            >
                                <a
                                    class="flex items-center justify-center gap-2 overflow-hidden rounded-lg px-4 py-2 text-lg text-white/25 hover:bg-surface group-[.sidebar-show]/sidebar:justify-start group-[.active]/nav-link:bg-primary"
                                    href="{{ $nav["route"] }}"
                                >
                                    <i
                                        class="{{ $nav["icon"] }} text-4xl group-[.active]/nav-link:text-surface/50"
                                    ></i>
                                    <span
                                        class="hidden w-0 overflow-hidden text-xl text-white transition-[width] group-[.sidebar-show]/sidebar:visible group-[.sidebar-show]/sidebar:inline-block group-[.sidebar-show]/sidebar:w-auto group-[.active]/nav-link:text-surface"
                                    >
                                        {{ $nav["label"] }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    // handle sidebar toggle
    $(function () {
        const $sidebarToggler = $('#sidebar-toggle');

        $sidebarToggler.on('click', function () {
            $('body').toggleClass('sidebar-show');
        });
    });
</script>
