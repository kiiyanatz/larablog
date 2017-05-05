@extends('main')
@section('title')
| All Posts
@endsection
@section('stylesheets')
    <style>
      #left {
        text-align: center;
        font-size: 20px;
      }

      img {
        border-radius: 10px;
      }

    </style>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Blog Archive</h1>
        </div>
    </div>
    @foreach($posts as $post)
      <hr>
        <div class="row" id="post-this">
          <div class="col-md-5" id="right">
            <img src="{!! asset('imgs/uploads/' . $post->image) !!}" alt="" width="100%">
          </div>
            <div class="col-md-7" id="left">
                <h2>{!! $post->title !!}</h2>
                <h5><b><i>Published: {{ date('M j, Y h:i a', strtotime($post->created_at)) }}</i></b></h5>
                {!! strip_tags(substr($post->body, 0, 250)) !!}
                {!! strip_tags(strlen($post->body)) > 250 ? '...' : '' !!} <br />
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
