@extends('backend.master')
@section('title','Add Categories')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Categories</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Add Categories
						</div>
						<div class="panel-body">
						@include('error.note')
						<form method="post">
								<div class="form-group">
									<label>Categories:</label>
    								<input type="text" name="name" class="form-control" placeholder="Categories Name...">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Categories Name..." value="Add">
							</div>
							{{csrf_field()}}
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Categories List</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Categories Name</th>
					                  <th style="width:30%">Options</th>
					                </tr>
				              	</thead>
				              	<tbody>
								@foreach($catelist as $cate)
								<tr>
									<td>{{$cate->cate_name}}</td>
									<td>
			                    		<a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Change</a>
			                    		<a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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