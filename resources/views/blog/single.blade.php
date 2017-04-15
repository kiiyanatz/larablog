@extends('main')
@section('title')
| {{ $post->title }}
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->title }}</h1>
			<p>{{ $post->body }}</p>		
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