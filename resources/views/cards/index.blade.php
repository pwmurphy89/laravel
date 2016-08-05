@extends ('layout')


@section('content')
	ALL CARDS


	@foreach ($cards as $card) 
	<div>
			<a href="/cards/{{$card->id}}">{{$card->title}}</a>
	</div>
	@endforeach

