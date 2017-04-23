@extends('main')
@section('title')
| Edit Tag
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) }}
				{{ Form::label('name', 'Tag NameTitle') }}
				{{ Form::text('name', null, ['class' => 'form-control'])}}
				{{ Form::submit('Save changes', ['class' => 'btn btn-success', 'style' => 'margin-top: 20px']) }}
			{{ Form::close() }}
		</div>
		<div class="col-md-4">
			<a href="" style="margin-top: 20px;" class="btn btn-primary pull-right">Edit</a>
		</div>
	</div>
</div>
@stop