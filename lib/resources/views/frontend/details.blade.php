@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">

<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->prod_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img width="200px" src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Price: <span class="price">{{number_format($item->prod_price,0,',','.')}}</span></p>
									<p>Warranty: {{$item->prod_warranty}}</p> 
									<p>Accessories: {{$item->prod_accessories}}</p>
									<p>Condition: {{$item->prod_condition}}</p>
									<p>Promotion: {{$item->prod_promotion}}</p>
									<p>Status: @if($item->prod_status==1) Còn Hàng @else Hết Hàng @endif</p>
									<p class="add-cart text-center"><a href="#">Orders Product online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Products Description</h3>
							<p class="text-justify">{!!$item->prod_description!!}</p>
						</div>
						<div id="comment">
							<h3>Comment</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Name:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Comment:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Send</button>
									</div>
									{{csrf_field()}}
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comments as $comment)
							<ul>
								<li class="com-title">
									{{$comment->com_name}}
									<br>
									<span>{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>	
								</li>
								<li class="com-details">
									{{$comment->com_content}}
								</li>
							</ul>
							@endforeach
						</div>
					</div>					
					<!-- end main -->
</div>
@stop