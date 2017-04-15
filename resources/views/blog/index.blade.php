@extends('main')
@section('title')
| All Posts
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Blog Archive</h1>
        </div>
    </div>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{!! $post->title !!}</h2>
                <h5><b><i>Published: {{ date('M j, Y h:i a', strtotime($post->created_at)) }}</i></b></h5>

                <p>{!! substr($post->body, 0, 250) !!} {!! strlen($post->body) > 250 ? '...' : '' !!}</p>
                <a href="blog/{{ $post->slug }}">Read More</a>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection
