@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Create notebook</h3>
				</div>
				<div class="panel-body">

					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<form action="{{ url('notebooks') }}" method="POST" role="form">

								{{ csrf_field() }}

								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" class="form-control" id="" placeholder="Name">
								</div> 
								<div class="form-group">
									<label for="name">Description (Option)</label>
									<textarea name="description" id="description" class="form-control" rows="5"></textarea>
								</div>
								<div class="form-group">
									<label for="color">Color (Option)</label>
									<input type="color" name="color" id="color" class="form-control">
								</div>								
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>							
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
