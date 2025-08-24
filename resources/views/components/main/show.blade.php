@php
$post_image = $post->image ?? "assets/default-post-background.svg";
@endphp

<x-layouts.main :title="$post->title">
	<x-slot:head>
		<meta name="description" content="{{ str($post->content)->take(200) }}">
		<meta name="og:title" content="{{ $post->title }}">
		<meta name="og:description" content="{{ str($post->content)->take(200) }}">
		<meta name="og:url" content="{{ route('posts.show', ['post' => $post->id]) }}">
		<meta name="og:type" content="article">
		<meta name="og:image" content="{{ asset($post_image) }}">
		<meta name="og:image:alt" content="{{ $post->title . ' article image' }}">
		<meta name="og:site_name" content="Aidil's Blog">
		<meta name="og:locale" content="en_US">
		<link rel="canonical" href="{{ route('posts.show', ['post' => $post->id]) }}">
	</x-slot:head>

	<article class=" max-w-[75ch] mx-auto">
		<h1 class="text-4xl mb-12 font-semibold ">{{$post->title}}</h1>

		<img src=" {{ asset("$post_image") }}" alt="" class="block aspect-video w-full h-auto object-contain">

		<div class="prose prose-xl text-justify dark:prose-invert max-w-none text-gray-400
		prose-h2:font-semibold prose-h2:text-3xl prose-h3:font-2xl prose-a:text-teal-500 prose-a:bg-clip-text prose-a:bg-gradient-to-r prose-a:from-blue-400 prose-a:to-teal-600
		prose-img:block prose-img:mx-auto">
			<p>
				{!! $post->content !!}
			</p>
		</div>
	</article>
</x-layouts.main>