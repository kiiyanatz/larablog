@extends('main')
@section('title')
  | Edit comment
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

          {{ Form::label('name', 'Name:') }}
          {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

          {{ Form::label('email', 'Email:') }}
          {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

          {{ Form::label('comment', 'Comment:') }}
          {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

          {{ Form::submit('Update Comment', ['class' => 'form-control btn btn-success', 'style' => 'margin-top: 10px;']) }}
        {{ Form::close() }}
      </div>
    </div>
  </div>
@endsection
