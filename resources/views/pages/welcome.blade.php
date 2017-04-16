@extends('main')
@section('title')
| Home
@endsection
@section('stylesheets')
<link rel="stylesheet" href="/css/home.css">
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
        <div id="latest-blog" class="col-md-5 col-md-offset-1" style="box-shadow: 1px 1px 5px #000; height: 300px; margin-top: 10px;">
            <div class="post">
                <h3>{!! $post->title !!}</h3>
                <p>{!! substr($post->body, 0, 300) !!} {!! strlen($post->body) > 300 ? "..." : ""!!}</p>
                <a href="blog/{{ $post->slug }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
@endsection
