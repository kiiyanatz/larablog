@extends('main') @section('title') | {{ $post->title }} @endsection @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{!! $post->title !!}</h1>
			<p>{!! $post->body !!}</p>
			<h2>Please comment below:</h2>
		</div>
		<h5>Tags</h5> @foreach($post->tags as $tag)
		<span class="label label-default">{{ $tag->name }}</span> @endforeach
		<div class="col-md-2">
			<h4>Category: {{ $post->category->name }}</h4>
		</div>
	</div>
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', 'Name:') }} {{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', 'Email:')}}
					{{ Form::text('email', null, ['class' => 'form-control'])}}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment', "Comment:") }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

					{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 10px; margin-bottom: 10px;']) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="row">
	  <div class="col-md-8 col-md-offset-2">
			<h3>Comments:</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<a href="#">{{ $comment->name }}</a>
					<p class="well">{{ $comment->comment }}</p>
				</div>
			@endforeach

	  </div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="text-center">
				<a href="{{ route('blog.index') }}" class="btn btn-primary">Back</a>
			</div>
		</div>
	</div>
</div>
@stop
