@extends('layouts.app')

@section('content')

<div class="container">
@if(count($notebooks))

	@foreach($notebooks->chunk(3) as $notebookSet)
		<div class="row">
			@foreach($notebookSet as $notebook)
				<div class="col-sm-4">
					 <div class="panel panel-default" style="border-color: {{ $notebook->color }}">
					 	<div class="panel-heading" style="background: {{ $notebook->color }}; color: #fff">
					 		<h3 class="panel-title">{{ $notebook->name }} <a href="{{ url('notebooks/'.$notebook->id.'/edit') }}"><i class="fa fa-edit"></i></a> </h3>
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
			@endforeach

				@if($loop->last)
					<div class="col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">#</h3>
							</div>
							<div class="panel-body text-center">
								<a href="{{ url('notebooks/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
							</div>
						</div>
					</div>
				@endif

		</div>
	@endforeach

@else

@endif	
</div>

@endsection
