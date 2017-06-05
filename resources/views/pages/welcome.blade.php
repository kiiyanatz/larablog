@extends('main')
@section('title')
| Home
@endsection
@section('stylesheets')
<link rel="stylesheet" href="/css/home.css">
    <style>
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

    </style>
@endsection

@section('content')
<section id="intro">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Welcome to LaraBlog</h1>
            <p class="lead">Thank you for visiting. This is a blog system built with laravel</p>
            <a href="#blogs" class="btn btn-primary btn-lg">Latest</a>
            &nbsp;
            <a href="/blog" class="btn btn-primary btn-lg">Archive</a>
        </div>
    </div>
</section>

<section id="blogs">
<div class="container">
    <div class="row">
        <h2 class="text-center">Top latest blog posts</h2>
        @foreach($posts as $post)
      <hr>
        <div class="row" id="post-this">
          <div class="col-md-8 col-md-offset-2">
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
        </div>
    @endforeach
    </div>
</div>
</section>
@endsection
