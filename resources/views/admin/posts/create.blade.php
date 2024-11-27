@php
    $image = $post->image;
@endphp

<x-layouts.admin title="Create Post">
    <x-slot:head>
        <script src="{{ asset("assets/tinymce/js/tinymce/tinymce.min.js") }}"></script>

        @vite("resources/js/app.js")
    </x-slot>

    <form
        class="form"
        action="{{ route("admin.posts.update", $post->id) }}"
        method="POST"
        id="create-form"
        enctype="multipart/form-data"
    >
        @csrf
        @method("PUT")

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
                <div
                    class="mx-auto max-w-[600px] transition-[padding-top] focus-within:pt-24"
                >
                    {{--
                        <div class="title mb-8">
                        <span class="mb-8 px-4 text-4xl font-medium text-white">
                        Post Title
                        </span>
                        </div>
                    --}}
                    <div
                        class="prose prose-xl prose-green prose-invert prose-a:text-primary prose-a:decoration-primary prose-strong:text-primary prose-li:marker:text-primary"
                    >
                        <div
                            class="min-h-[400px] rounded-xl border-2 border-surface p-4 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary"
                            id="editor"
                        >
                            {!! $post->content !!}
                        </div>

                        <small class="hidden text-right" id="save_status">
                            Post save at
                        </small>

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
                        id="title"
                        placeholder="Title"
                        value="{{ $post->title }}"
                    />
                    <span class="mb-2 block text-xl font-medium text-white">
                        Slug
                    </span>
                    <input
                        class="mb-4 block w-full rounded-xl border-2 border-gray-700 bg-background px-4 py-2.5 outline-none focus:ring-2 focus:ring-primary"
                        type="text"
                        name="slug"
                        id="slug"
                        placeholder="slug-title"
                        value="{{ $post->slug }}"
                    />

                    <span class="mb-2 block text-xl font-medium text-white">
                        Image
                    </span>

                    @if ($image)
                        <div class="mb-2">
                            <img
                                src="{{ route("uploads.view", $image->name) }}"
                                alt=""
                            />
                        </div>
                    @endif

                    <input
                        class="block w-full cursor-pointer rounded-xl border-2 border-gray-700 bg-background px-4 py-2.5 outline-none file:rounded-full file:border-0 file:bg-primary/20 file:px-4 file:py-2 file:text-primary focus:ring-2 focus:ring-primary"
                        accept="image/*"
                        type="file"
                        name="image"
                        id="image"
                        placeholder="Post Image"
                    />
                </div>
                <div class="mb-6 rounded-xl bg-surface p-6">
                    <div class="flex items-center justify-end gap-2">
                        <button
                            class="rounded-xl border-2 border-primary px-4 py-2 font-medium text-white hover:bg-primary hover:text-black"
                            name="status"
                            value="DRAFT"
                        >
                            Save Draft
                        </button>
                        <button
                            class="rounded-xl bg-primary px-4 py-2 font-medium text-black"
                            name="status"
                            value="PUBLISHED"
                        >
                            Publish
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
            const $title = $('#title');
            const $slug = $('#slug');
            const $editorTextare = $('#textarea-content');

            tinymce.init({
                selector: '#editor',
                inline: true,
                // menubar: false,
                plugins: ['save', 'image', 'link', 'code', 'lists'],
                // menubar: 'save',
                license_key: 'gpl',
                file_picker_types: 'file image media',
                toolbar: [
                    'undo redo | styles |  link image code',
                    ' bold italic underline striketrough | alignleft aligncenter alignright | numlist bullist | indent outdent',
                ],
                images_upload_handler: handleImageUpload,
            });

            $form.on('submit', function (e) {
                // e.preventDefault();
                const editorContent = tinymce.activeEditor.getContent();

                $editorTextare.val(editorContent);
            });

            $title.on('change', function (e) {
                const title = $title.val();

                // generate slug
                const path = '{{ route("api.generate_slug") }}';

                axios
                    .post(
                        path,
                        {
                            title: title,
                        },
                        {
                            headers: {
                                'Content-Type': 'application/json',
                                Accept: 'application/json',
                            },
                        },
                    )
                    .then(({ data }) => {
                        const { slug } = data;

                        $slug.val(slug);
                    })
                    .catch((err) => {
                        console.error(err);
                    });
            });
        });

        function handleImageUpload(e, progress) {
            const blob = e.blob();
            const upload_url = '{{ route("api.upload") }}';
            const upload_base = '{{ route("uploads.view", "REPLACE_URL") }}';

            return new Promise((resolve, reject) => {
                const formData = new FormData();
                formData.append('file', blob);

                axios
                    .post(upload_url, formData, {
                        headers: {
                            Accept: 'application/json',
                            'Content-Type': 'multipart/form-data',
                        },
                    })
                    .then((res) => {
                        const { data } = res;
                        console.log(data);

                        const location = upload_base.replace(
                            'REPLACE_URL',
                            data.name,
                        );

                        resolve(location);
                    })
                    .catch((err) => {
                        console.error(err);
                        reject({
                            message: err.response.data.message,
                            remove: true,
                        });
                    });
            });
        }
    </script>

    <script>
        // autosave post
        $(function () {
            const saveInterval = 30 * 1000; // every 30 sec
            const save_path = '{{ route("api.posts.autosave") }}';

            const $saveStatus = $('#save_status');

            const postId = $('[name="post_id"]').val();
            const $title = $('#title');
            const $slug = $('#slug');

            setInterval(() => {
                const title = $title.val();
                const slug = $slug.val();
                const content = tinymce.activeEditor.getContent();

                axios
                    .post(save_path, {
                        post_id: postId,
                        title: title,
                        slug: slug,
                        content: content,
                    })
                    .then((res) => {
                        const { data } = res;
                        const savedDate = new Date(data.updated_at);

                        const formattedDated = formatSavedPostDate(savedDate);

                        $saveStatus.removeClass('hidden');
                        $saveStatus.addClass('block');
                        $saveStatus.text('Saved at ' + formattedDated);
                    })
                    .catch((err) => {
                        console.error(err);
                    });
            }, saveInterval);
        });

        function formatSavedPostDate(date) {
            const dd = String(date.getDate()).padStart(2, '0');
            const mm = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const yyyy = date.getFullYear();
            const HH = String(date.getHours()).padStart(2, '0');
            const MM = String(date.getMinutes()).padStart(2, '0');
            const SS = String(date.getSeconds()).padStart(2, '0');

            return `${dd}/${mm}/${yyyy} ${HH}:${MM}:${SS}`;
        }
    </script>
    <style>
        .tox-promotion {
            display: none !important;
        }
    </style>
</x-layouts.admin>
