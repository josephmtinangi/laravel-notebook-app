@extends('layouts.app')

@section('content')

<div class="container">
@if(count($notebooks))

	@foreach($notebooks->chunk(3) as $notebookSet)
		<div class="row">
			@foreach($notebookSet as $notebook)
				<div class="col-sm-4">
					 <div class="panel panel-default">
					 	<div class="panel-heading">
					 		<h3 class="panel-title">{{ $notebook->name }}</h3>
					 	</div>
					 	<div class="panel-body">
					 		<strong>Description</strong> <br>
					 		{{ $notebook->description }}
					 	</div>
					 	<div class="panel-footer">
					 		<span class="badge">{{ $notebook->notes()->count() }}</span> <strong>Notes</strong>
					 	</div>
					 </div>
				</div>
				@if( ! $loop->remaining)
				<div class="col-sm-4">
					<div class="panel panel-default">
						<div class="panel-body text-center">
							<a href="{{ url('notebooks/create') }}" class="btn btn-link"><i class="fa fa-plus fa-3x"></i></a>
						</div>
					</div>
				</div>
				@endif
			@endforeach
		</div>
	@endforeach

@else

@endif	
</div>

@endsection
