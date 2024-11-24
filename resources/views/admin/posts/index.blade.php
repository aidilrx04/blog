@php
    use Carbon\Carbon;
@endphp

<x-layouts.admin title="Posts | Aidil">
    <div class="rounded-xl bg-surface p-6">
        <h1 class="mb-4 text-2xl font-medium text-white">Posts</h1>

        <ul class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                @php
                    $last_updated_at = Carbon::parse($post->updated_at)->format("d/m/Y \a\\t g:i a");
                @endphp

                <li>
                    <a
                        class="group relative flex aspect-square h-full w-full flex-col overflow-hidden rounded-xl bg-background shadow-sm transition-all hover:-translate-x-2 hover:-translate-y-2 hover:shadow-[4px_4px_1px_theme(colors.primary)]"
                        href="{{ route("admin.posts.edit", $post->id) }}"
                    >
                        <div class="img flex-1 overflow-hidden bg-background">
                            <img
                                src="{{ route("uploads.view", optional($post->image)->name ?? "sample-image.jpg") }}"
                                alt=""
                                class="size-full max-h-full max-w-full object-cover"
                            />
                        </div>
                        <div class="p-4">
                            <span
                                class="mb-2 block font-medium capitalize text-white"
                            >
                                {{ empty(trim($post->title)) === false ? $post->title : "(no title)" }}
                            </span>

                            <div class="flex items-center gap-2 text-sm">
                                <i class="ph ph-clock"></i>
                                <span>{{ $last_updated_at }}</span>
                            </div>
                        </div>
                        <div
                            class="absolute right-0 top-0 hidden group-hover:block"
                        >
                            <form
                                action="{{ route("admin.posts.destroy", $post->id) }}"
                                method="POST"
                                onsubmit="return confirm('Confirm delete this post?')"
                            >
                                @csrf
                                @method("DELETE")

                                <button
                                    type="submit"
                                    class="flex size-12 items-center justify-center rounded-bl-xl bg-red-500 text-white"
                                >
                                    <i class="ph ph-trash text-xl"></i>
                                </button>
                            </form>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layouts.admin>
