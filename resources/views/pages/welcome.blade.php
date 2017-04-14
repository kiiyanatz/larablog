@extends('main')
@section('title')
| Home
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Welcome to LaraBlog</h1>
            <p class="lead">Thank you for visiting. This is a blog system built with laravel</p>
            <a href="" class="btn btn-primary btn-lg">Popular Post</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8" style="">
    @foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? "..." : ""}}</p>
            <a href="" class="btn btn-primary">Read more</a>
        </div>
        <hr>
    @endforeach
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
    </div>
</div>
@endsection
