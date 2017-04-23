@extends('main')
@section('title')
| Tag - {!! $tag->name !!}
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1> {{ $tag->name }} tag <small>{{$tag->posts()->count()}} Posts</small></h1>
			<table class="table">
				<thead>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($tag->posts as $post)
					<tr>
						<td>{{ $post->title }}</td>
						<td>
							@foreach($post->tags as $ptag)
								 <span class="label label-default" style="margin: 1px; margin-bottom: 5px; display: inline-block;">{{ $ptag->name }}</span>
							@endforeach
						</td>
						<td><a href="{{route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">View</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" style="margin-top: 20px;" class="btn btn-primary pull-right">Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => "margin-top: 20px;"]) }}
			{{ Form::close() }} 
		</div>
	</div>
</div>
@stop