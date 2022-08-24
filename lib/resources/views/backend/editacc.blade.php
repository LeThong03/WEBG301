@extends('backend.master')
@section('title','Change Accessories')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Accessories</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Change Accessories
						</div>
						<div class="panel-body">
						@include('error.note')
							<form method="post">
								<div class="form-group">
									<label>Accessories Name:</label>
    								<input type="text" name="name" class="form-control" placeholder="Accessories Name..." value="{{$acc->acc_name}}">
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Accessories name..." value="Change">
								</div>	
								<div class="form-group">
								<a href="{{asset('admin/accessories')}}" class="form-control btn btn-danger">Cancel</a>
								</div>
								{{csrf_field()}}
							</form>	
						</div>
					</div>
			</div>
		</div><!--/.row-->
</div>	<!--/.main-->	
@stop	