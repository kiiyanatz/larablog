@extends('main')
@section('title')
| Tags
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td> <a href="{{ route('tags.show', $tag->id) }}"> {{ $tag->name }} </a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $tags->links() }}
		</div>
		<div class="col-md-3">
			<div class="well">
				{!! Form::open(['route' => 'tags.store']) !!}
				<h2>New Tag</h2>
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control'])}}
				{{ Form::submit('Create new Tag', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 10px'])}}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop
