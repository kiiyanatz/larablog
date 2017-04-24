@extends('main')
@section('title')
| Edit post
@endsection
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
<div class="container">
  {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
  <div class="row">
    <div class="col-md-8">

      {{ Form::label('title', 'Title')}}
      {{ Form::text('title', null, ["class" => 'form-control input-lg', 'id' => 'post-title'])}}
      {{ Form::label('slug', 'Slug')}}
      {{ Form::text('slug', null, ["class" => 'form-control input-lg'])}}
      {{ Form::label('category', 'Category')}}
      <select name="category" id="" class="form-control">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      <hr>
      {{ Form::label('tags', 'Tags:') }}
      <select name="tags[]" id="" class="form-control select2-multi" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
      </select>
      {{ Form::label('body', 'Body', ["class" => 'form-spacing-top'])}}
      {{ Form::textarea('body', null, ["class" => 'form-control', 'style'=>'margin-top:10px', 'id' => 'editor'])}}
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
      <dl class="dl-horizontal">
        <dt>Category:</dt>
        <dd>{{ $post->category->name }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
        </div>
        <div class="col-sm-6">
          {{ Form::submit('Save Changes', array('class'=>'btn btn-success btn-block')) }}
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script>
$('.select2-multi').select2();
$('.select2-multi').select2().val({!! json_encode($post->tags()->pluck('tags.id')) !!}).trigger('change');
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
