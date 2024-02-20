<div>
    @foreach ($posts as $post)
        <a href="{{ $post->path() }}">{{ $post->title }}</a>
    @endforeach
</div>

{{--{{ $posts->links() }}--}}
