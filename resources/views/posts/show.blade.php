@extends('main')
@section('title')
  | View Post
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <img src="{{ asset('imgs/uploads/' . $post->image) }}" alt="" width="100%">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
        <hr>
        <div class="tags">
          <h5>Tags</h5>
          @foreach($post->tags as $tag)
            <span class="label label-default">{{ $tag->name }}</span>
          @endforeach
        </div>
        <div id="backend-comments" style="margin-top: 50px;">
          <h3>Comments <small>{{ $post->comments()->count() }}</small></h3>

          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($post->comments as $comment)
                <tr>
                  <td>{{ $comment->name }}</td>
                  <td>{{ $comment->email }}</td>
                  <td>{{ $comment->comment }}</td>
                  <td>
                    <a href="{{ route('comments.edit', [$comment->id]) }}" class="btn btn-xs btn-primary">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ route('comments.delete', [$comment->id]) }}" class="btn btn-xs btn-danger">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
        <dl class="dl-horizontal">
          <label>Category:</label>
          <p>{{ $post->category->name }}</p>
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
