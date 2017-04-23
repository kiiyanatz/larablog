@extends('main')
@section('title')
  | Delete comment
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1>ARE YOU SURE YOU WANT TO DELETE</h1>
        <p>
          <strong>Name:</strong> {{ $comment->name }} <br>
          <strong>Email:</strong> {{ $comment->email }} <br>
          <strong>Comment:</strong> {{ $comment->comment }} <br>
        </p>
        {{ Form::open(['route' => ['comments.destroy',  $comment->id], 'method' => 'DELETE']) }}
          {{ Form::submit('DELETE THIS COMMENT', ['class' => 'btn btn-danger btn-block btn-lg']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection
