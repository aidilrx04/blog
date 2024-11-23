@props([
    "title" => null,
    "head" => null,
])

<x-layouts.base {{ $attributes }}>
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

    {{ $slot }}

    <footer class="mt-4 px-4 py-8 text-center font-medium text-white">
        <span>&copy;</span>
        <span>Aidil</span>
        <span>{{ now()->format("Y") }}</span>
    </footer>
</x-layouts.base>
