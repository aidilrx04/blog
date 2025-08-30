@php
    use Illuminate\Support\Carbon;
@endphp

<?xml version="1.0" encoding="UTF-8" ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('posts.index') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <priority>1.0</priority>
    </url>
    @foreach($posts as $post)
    <url>
        <loc>{{ route('posts.show', ['post' => $post->id]) }}</loc>
        <lastmod>{{ $post->updated_at->toDateString() }}</lastmod>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>