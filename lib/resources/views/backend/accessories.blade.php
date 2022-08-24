@extends('backend.master')
@section('title','Add Accessories')
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
							Add Accessories
						</div>
						<div class="panel-body">
						@include('error.note')
						<form method="post">
								<div class="form-group">
									<label>Accessories Name:</label>
    								<input type="text" name="name" class="form-control" placeholder="Accessories Name...">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Accessories Name..." value="Add New">
							</div>
							{{csrf_field()}}
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Accessories List</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Accessories Name</th>
					                  <th style="width:30%">Option</th>
					                </tr>
				              	</thead>
				              	<tbody>
								@foreach($acclist as $acc)
								<tr>
									<td>{{$acc->acc_name}}</td>
									<td>
			                    		<a href="{{asset('admin/accessories/edit/'.$acc->acc_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Change</a>
			                    		<a href="{{asset('admin/accessories/delete/'.$acc->acc_id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</a>
			                  		</td>
			                  	</tr>
								@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
</div>	<!--/.main-->
@stop