@extends('main')
@section('title')
  | View Post
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>{!! $post->title !!}</h1>
        <p>{!! $post->body !!}</p>
      </div>

      <div class="col-md-4 well">
      <dl class="dl-horizontal">
          <label>Url slug:</label>
          <p>{!! Html::linkRoute('blog.single', $post->slug, [$post->slug]) !!}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Created At:</label>
          <p>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</p>
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
        <div class="row" id="all-btn">
            <div class="col-md-12">
              <a href="/posts" class="btn btn-default btn-block"><< See all posts</a>
            </div>
          </div>
       
      </div>
    </div>
  </div>
@endsection

