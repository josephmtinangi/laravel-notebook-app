@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-sm-offset-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Register</h3>
				</div>
				<div class="panel-body">

					@include('common.errors')

					<form method="post" action="{{ url('register') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Name">
						</div>						
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email Address">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
						</div>
						<button type="submit" class="btn btn-primary btn-block">Register</button>
					</form>
				</div>
				<div class="panel-footer">
					Have an account? <a href="{{ url('login') }}">Login</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
