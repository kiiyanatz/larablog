@extends('main') @section('title') | New Post @endsection @section('content')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-offset-2">
      <h1>Create new post</h1>
      <hr>
      {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
      {{ Form::label('title', 'Title:')}}
      {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'max-length' => '255')) }}
      {{ Form::label('slug', 'Slug:')}}
      {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'max-length' => '255', 'min-length' => '5')) }}

      {{ Form::label('category', 'Category:') }}
      <select name="category" id="" class="form-control">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      {{ Form::label('tags', 'Tags:') }}
      <select name="tags[]" class="form-control select2-multi" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
      </select>

      {{ Form::label('featured_image', 'Upload featured image:') }}
      {{ Form::file('featured_image') }}

      {{ Form::label('body', "Post Body:") }}
      {{ Form::textarea('body', null, array('class' => 'form-control'))}}
      {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 10px', 'id' => 'input-blog')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
@endsection
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script>
  $('.select2-multi').select2();
</script>

<script>
tinymce.init({
  selector:'textarea',
  height: 500,
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste imagetools"
  ],

  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample",
  imagetools_cors_hosts: [
    'www.tinymce.com',
    'codepen.io'
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
@endsection
