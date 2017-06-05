@extends('main')
@section('title')
  | Dashboard
@endsection

@section('content')
<div class="container">
<form class="form-horizontal" role="form" method="POST" action="{{ route('logout') }}">
{{ csrf_field() }}
<button type="text" type="submit">logout</button>
</form>
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
              <td>{{ strip_tags(substr($post->body, 0, 100)) }} {{ strlen($post->body) > 100 ? "..." : "" }}</td>
              <td>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</td>
              <td>
                {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-sm')) !!}
                {!! Html::linkRoute('posts.show', 'View', array($post->id), array('class'=>'btn btn-success btn-sm')) !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    </div>
  </div>
</div>
@endsection
