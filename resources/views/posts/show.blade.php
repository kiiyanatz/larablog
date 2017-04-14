@extends('main')
@section('title')
  | View Post
@endsection
@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->body }}</p>
    </div>

    <div class="col-md-4 well">
      <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-4">
          {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
        </div>
        <div class="col-sm-4">
          {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
          {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}
          {!! Form::close() !!}
        </div>
        <div class="col-sm-4">
          {!! Html::linkRoute('posts.create', 'New Post', null, array('class'=>'btn btn-primary btn-block')) !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row"><a href="/posts" class="btn btn-primary btn-block">Posts</a></div>
    </div>
  </div>
@endsection
