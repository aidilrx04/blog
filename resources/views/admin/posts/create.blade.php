<x-layouts.admin title="Create Post">
    <x-slot:head>
        <script src="{{ asset("assets/tinymce/js/tinymce/tinymce.min.js") }}"></script>
    </x-slot>

    <form
        class="form"
        action="{{ route("admin.posts.store") }}"
        method="POST"
        id="create-form"
    >
        @csrf

        <input type="hidden" name="post_id" value="{{ $post->id }}" />

        {{-- {{ dump($errors) }} --}}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div
                    class="mb-4 flex items-center justify-start gap-2 rounded-lg border-2 border-red-900 bg-red-100/75 p-4 text-lg text-red-900"
                >
                    <i class="ph-bold ph-x"></i>
                    <span>
                        {{ $error }}
                    </span>
                </div>
            @endforeach
        @endif

        <div class="mb-4 flex gap-3 pt-8">
            <div class="flex-1">
                <div class="mx-auto max-w-[600px]">
                    <div class="title mb-8">
                        <span class="mb-8 px-4 text-4xl font-medium text-white">
                            Post Title
                        </span>
                    </div>
                    <div
                        class="prose prose-xl prose-green prose-invert prose-a:text-primary prose-a:decoration-primary prose-strong:text-primary prose-li:marker:text-primary"
                    >
                        <div
                            class="h-[400px] rounded-xl border-2 border-surface p-4"
                            id="editor"
                        ></div>

                        <textarea
                            name="content"
                            id="textarea-content"
                            class="hidden"
                        ></textarea>

                        {{--
                            <textarea
                            class="block w-full rounded-xl border-2 border-gray-700 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                            name="content"
                            id="editor"
                            cols="30"
                            rows="10"
                            ></textarea>
                        --}}
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="mb-6 w-[300px] rounded-xl bg-surface p-6">
                    <span class="mb-2 block text-xl font-medium text-white">
                        Title
                    </span>
                    <input
                        class="mb-4 block w-full rounded-xl border-2 border-gray-700 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                        type="text"
                        name="title"
                        placeholder="Title"
                    />
                    <span class="mb-2 block text-xl font-medium text-white">
                        Slug
                    </span>
                    <input
                        class="block w-full rounded-xl border-2 border-gray-700 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                        type="text"
                        name="slug"
                        placeholder="slug-title"
                    />
                </div>
                <div class="mb-6 rounded-xl bg-surface p-6">
                    <div class="flex items-center justify-end">
                        <button
                            class="rounded-xl bg-primary px-4 py-2 font-medium text-black"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(function () {
            const $form = $('#create-form');
            const $editorTextare = $('#textarea-content');

            tinymce.init({
                selector: '#editor',
                inline: true,
                // menubar: false,
                plugins: ['save'],
                // menubar: 'save',
                license_key: 'gpl',
            });

            $form.on('submit', function (e) {
                // e.preventDefault();
                const editorContent = tinymce.activeEditor.getContent();

                $editorTextare.val(editorContent);
            });
        });
    </script>
    <style>
        .tox-promotion {
            display: none !important;
        }
    </style>
</x-layouts.admin>
