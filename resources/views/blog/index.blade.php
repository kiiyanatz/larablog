@extends('main')
@section('title')
| All Posts
@endsection
@section('stylesheets')
{{--     <style>
      #left {
        position: relative;
        font-size: 20px;
      }

      .post-title {
        color: black;
        font-family: monospace;
      }

      .post-detail {
        font-size: 10px;
        color: #ccc;
      }

      .post-brief {
        color: #aaa;
        font-size: 15px;
        font-family: monospace;
      }

      #more {
        color: black;
        text-transform: uppercase;
        font-size: .65em;
        font-weight: 700;
        text-decoration: underline;
      }

    </style> --}}
    <link rel="stylesheet" href="/css/home.css">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Blog Archive</h1>
        </div>
    </div>
{{--     @foreach($posts as $post)
      <hr>
        <div class="row" id="post-this">
          <div class="col-md-5" id="right">
            <img src="{!! asset('imgs/uploads/' . $post->image) !!}" alt="" width="100%">
          </div>
            <div class="col-md-7" id="left">
                <h2 class="post-title">{!! $post->title !!}</h2>
                <h5 class="post-detail"><b>Published: {{ date('M j, Y h:i a', strtotime($post->created_at)) }}</b></h5>
                <p class="post-brief">
                    {!! strip_tags(substr($post->body, 0, 250)) !!}
                {!! strip_tags(strlen($post->body)) > 250 ? '...' : '' !!}
                </p>
                <a href="blog/{{ $post->slug }}" id="more">Read More</a>
            </div>
        </div>
    @endforeach --}}
    <div class="row">
        @foreach($posts as $post)
        <div id="latest-blog" class="col-md-3">
            <div class="post">
                <h3 class="post-title">{!! $post->title !!}</h3>
                <img src="{!! asset('imgs/uploads/' . $post->image) !!}" alt="">
                <p class="post-desc">{!! substr(strip_tags($post->body), 0, 300) !!} {!! strlen(strip_tags($post->body)) > 300 ? "..." : ""!!}</p>
                <a href="blog/{{ $post->slug }}" class="more">Read more</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
