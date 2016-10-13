@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-sm-offset-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">

					@include('common.errors')

					<form method="post" action="{{ url('login') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email Address">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
							<p class="help-block">
								<a href="{{ url('password/reset') }}">Forgot password?</a>
							</p>
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember"> Remember Me
								</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					</form>
				</div>
				<div class="panel-footer">
					Don't have an account? <a href="{{ url('register') }}">Create One</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
