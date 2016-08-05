@extends('layout')

@section('content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<ul class="list-group">
			<h1>{{ $card->title }}</h1>
				@foreach ($card->notes as $note)
				<li class="list-group-item">{{$note->body}}
					<a href="#">{{$note->user->username}}</a>
					<a href="/notes/{{$note->id}}/edit">Edit</a> 
				</li>
				@endforeach
		</ul>

		<h3>Add a new note</h3>
		<form method="POST" action="/cards/{{$card->id}}/notes">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="form-group">
				<textarea name="body" class="form-control">{{old('body')}}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add note</button>
			</div>
		</form>

		@if (count($errors))
			<ul>
					@foreach ($erros->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
			</ul>
		@endif
	</div>
</div>


@stop
