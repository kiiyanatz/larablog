@extends('main')
@section('title')
  | Dashboard
@endsection

@section('content')
  <div class="row">
    <div class="col-md-10">
      <h1>All posts</h1>
    </div>
    <div class="col-md-2">
      <a id="btn-space" href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Create new post</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created at</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <th>{{ $post->id }}</th>
              <td>{{ $post->title }}</td>
              <td>{{ substr($post->body, 0, 50) }} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
              <td>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</td>
              <td>
                {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-sm')) !!}
                {!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class'=>'btn btn-danger btn-sm')) !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
