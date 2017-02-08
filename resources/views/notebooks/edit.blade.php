@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit {{ $notebook->name }}</h3>
				</div>
				<div class="panel-body">

					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<form action="{{ url('notebooks/'.$notebook->id) }}" method="POST" role="form">

								{{ method_field('patch') }}

								{{ csrf_field() }}

								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" value="{{ $notebook->name }}" class="form-control" id="" placeholder="Name">
								</div> 
								<div class="form-group">
									<label for="name">Description (Option)</label>
									<textarea name="description" id="description" class="form-control" rows="5">{{ $notebook->description }}</textarea>
								</div>
								<div class="form-group">
									<label for="color">Color (Option)</label>
									<input type="color" name="color" value="{{ $notebook->color }}" id="color" class="form-control">
								</div>								
								<button type="submit" class="btn btn-primary">Update</button>
							</form>							
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Danger zone</h3>
				</div>
				<div class="panel-body">
					<form action="{{ url('notebooks/'.$notebook
					->id) }}" method="POST">
						{{ method_field('delete') }}
						{{ csrf_field() }}

						<div class="form-group">
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
						</div>

					</form>
				</div>
			</div>			
		</div>
	</div>
</div>

@endsection
