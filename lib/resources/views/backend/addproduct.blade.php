@extends('backend.master')
@section('title','Add Product')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Products</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Add Products</div>
					<div class="panel-body">
						@include('error.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Name</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Price</label>
										<input required type="number" name="price" class="form-control">
									</div>
									<div class="form-group" >
										<label>Image</label>
										<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
									</div>
									<div class="form-group" >
										<label>Accessories</label>
										<input required type="text" name="accessories" class="form-control">
									</div>
									<div class="form-group" >
										<label>Warranty</label>
										<input required type="text" name="warranty" class="form-control">
									</div>
									<div class="form-group" >
										<label>Promotion</label>
										<input required type="text" name="promotion" class="form-control">
									</div>
									<div class="form-group" >
										<label>Condition</label>
										<input required type="text" name="condition" class="form-control">
									</div>
									<div class="form-group" >
										<label>Status</label>
										<select required name="status" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Description</label>
										<textarea class="ckeditor" required name="description"></textarea>
									<script type="text/javascript">
										var editor= CKEDITOR.replace('description',{
										language:'vi',											     
										filebrowserImageBrowseUrl:'../../editor/ckfinder/ckfinder.html?Type=Images', 
										filebrowserFlashBrowseUrl:'../../editor/ckfinder/ckfinder.html?Type=Flash', 
										filebrowserImageUploadUrl:'../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images', 
										filebrowserFlashUploadUrl:'../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash' ,
										});
									</script>
									</div>
									<div class="form-group" >
										<label>Categories</label>
										<select required name="cate" class="form-control">
											@foreach($catelist as $cate)
											<option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Featured</label><br>
										Yes: <input type="radio" name="featured" value="1">
										No: <input type="radio" checked name="featured" value="0">
									</div>
									<input type="submit" name="submit" value="Add" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Cancel</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop