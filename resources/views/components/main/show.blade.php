<x-layouts.main>
	<div class="max-w-[75ch] mx-auto">
		<h1 class="text-4xl mb-12 font-semibold ">{{$post->title}}</h1>

		<article class="prose prose-xl text-justify dark:prose-invert max-w-none text-gray-400
		prose-h2:font-semibold prose-h2:text-3xl prose-h3:font-2xl prose-a:text-teal-500 prose-a:bg-clip-text prose-a:bg-gradient-to-r prose-a:from-blue-400 prose-a:to-teal-600">
			<p>
				{!! $post->content !!}
			</p>
		</article>
	</div>
</x-layouts.main>