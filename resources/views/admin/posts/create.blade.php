<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>

    @vite('resources/css/app.css')
</head>

<body>

    <header class="bg-gray-800 p-3">
        <h1 class="text-white font-semibold text-xl">Aidil's Blog</h1>
    </header>

    <main class="p-3">
        <form class="form" action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <input class="block mb-1 border rounded p-3" type="text" name="title" placeholder="Title">
            <input class="block mb-1 border rounded p-3" type="text" name="slug" placeholder="Slug">
            <textarea class="block mb-1 border rounded p-3" name="content" id="content" cols="30" rows="10"></textarea>
            <button class="block text-white bg-blue-600 rounded py-1.5 px-3.5">Submit</button>
        </form>
    </main>

    <footer class="text-center text-gray-500">
        &copy; 2024 @aidilrx04
    </footer>
</body>

</html>
