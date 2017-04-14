@extends('main') @section('title') | New Post @endsection @section('content')
@section('stylesheets')
  {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 col-offset-2">
        <h1>Create new post</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
          {{ Form::label('title', 'Title')}}
          {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'max-length' => '255')) }}

          {{ Form::label('body', "Post Body:") }}
          {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => ''))}}

          {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 10px')) }}
        {!! Form::close() !!}
    </div>
</div>
@endsection
@endsection
@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection
