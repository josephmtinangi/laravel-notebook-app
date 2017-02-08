@extends('layouts.app')

@section('content')

<div class="jumbotron" style="background: {{ $notebook->color }}; color: #fff">
	<div class="container text-center">
		<h1>{{ $notebook->name }}</h1>
	</div>
</div>

<div class="container">
	@if(count($notebook->notes))
	<div class="row">
		@foreach($notebook->notes as $note)
		<div class="col-sm-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $note->title }}</h3>
				</div>
				<div class="panel-body">
					{{ str_limit($note->content, 10) }}
				</div>
				<div class="panel-footer">
					<a href="{{ url('notebooks/'.$notebook->id.'/notes/'.$note->id) }}"><i class="fa fa-eye"></i> Read</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
</div>

@endsection