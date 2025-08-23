@php
$post_image = $post->image ?? "assets/default-post-background.svg";
@endphp

<x-layouts.main>
	<article class="max-w-[75ch] mx-auto">
		<h1 class="text-4xl mb-12 font-semibold ">{{$post->title}}</h1>

		<img src="{{ asset("$post_image") }}" alt="" class="block aspect-video w-full h-auto object-contain">

		<div class="prose prose-xl text-justify dark:prose-invert max-w-none text-gray-400
		prose-h2:font-semibold prose-h2:text-3xl prose-h3:font-2xl prose-a:text-teal-500 prose-a:bg-clip-text prose-a:bg-gradient-to-r prose-a:from-blue-400 prose-a:to-teal-600
		prose-img:block prose-img:mx-auto">
			<p>
				{!! $post->content !!}
			</p>
		</div>
	</article>
</x-layouts.main>