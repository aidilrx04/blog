<x-layouts.admin>
    <form class="form" action="{{ route("admin.posts.store") }}" method="POST">
        @csrf

        <div class="mb-6 rounded-xl bg-surface p-6">
            <span class="text-white mb-2 block text-xl font-medium">Title</span>
            <input
                class="border-gray-700 block w-full rounded-xl border-2 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                type="text"
                name="title"
                placeholder="Title"
            />
        </div>

        <div class="mb-6 rounded-xl bg-surface p-6">
            <span class="text-white mb-2 block text-xl font-medium">Slug</span>
            <input
                class="border-gray-700 block w-full rounded-xl border-2 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                type="text"
                name="slug"
                placeholder="slug-title"
            />
        </div>
        <div class="mb-6 rounded-xl bg-surface p-6">
            <span class="text-white mb-2 block text-xl font-medium">
                Content
            </span>
            <textarea
                class="border-gray-700 block w-full rounded-xl border-2 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                name="content"
                id="content"
                cols="30"
                rows="10"
            ></textarea>
        </div>

        <div class="mb-6 rounded-xl bg-surface p-6">
            <div class="flex items-center justify-end">
                <button
                    class="text-black rounded-xl bg-primary px-4 py-2 font-medium"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>
</x-layouts.admin>
