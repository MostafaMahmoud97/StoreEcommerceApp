@extends('layouts.user.master')
@section('css')
<!--Internal  Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Product-details</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body h-100">
								<div class="row row-sm ">
									<div class=" col-xl-5 col-lg-12 col-md-12">
										<div class="preview-pic tab-content">
										  <div class="tab-pane active" id="pic-temp"><img src="{{asset('file/ImageProduct/'.$Product->image)}}" style="width: 100%; height: 400px" alt="image"/></div>
                                            @foreach($Product->images as $Image)
                                                <div class="tab-pane" id="pic-{{$Image->id}}"><img src="{{asset('file/Images_Product/'.$Image->image)}}" style="width: 100%; height: 400px" alt="image"/></div>
                                            @endforeach
										</div>
										<ul class="preview-thumbnail nav nav-tabs">
										  <li class="active"><a data-target="#pic-temp" data-toggle="tab"><img src="{{asset('file/ImageProduct/'.$Product->image)}}" style="width: 100%; height: 100px" alt="image"/></a></li>
                                            @foreach($Product->images as $Image)
                                                <li><a data-target="#pic-{{$Image->id}}" data-toggle="tab"><img src="{{asset('file/Images_Product/'.$Image->image)}}" style="width: 100%; height: 100px" alt="image"/></a></li>
                                            @endforeach
										</ul>
									</div>
									<div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
										<h4 class="product-title mb-1">{{$Product->name}}</h4>
										<p class="text-muted tx-13 mb-1">Men red & Grey Checked Casual Shirt</p>
										<div class="rating mb-1">
											<div class="stars">
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star checked"></span>
												<span class="fa fa-star text-muted"></span>
												<span class="fa fa-star text-muted"></span>
											</div>
											<span class="review-no">41 reviews</span>
										</div>
										<h6 class="price">current price: <span class="h3 ml-2">£{{$Product->price - $Product->discount_price}}</span></h6>
										<p class="product-description">{{$Product->description}}</p>
										<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
										<div class="sizes d-flex">sizes:
                                            @foreach($Product->ProductSizes as $size)
                                                <span class="size d-flex"  data-toggle="tooltip" title="{{$size->ProductSize->size}}"><label class="rdiobox mb-0"><input name="rdio" type="radio"> <span>{{$size->ProductSize->size}}</span></label></span>
                                            @endforeach
										</div>
										<div class="colors d-flex mr-3 mt-2">
											<span class="mt-2">colors:</span>
											<div class="row gutters-xs mr-4">
												@foreach($Product->ProductColors as $color)
                                                    <div class="mr-2">
                                                        <label class="colorinput">
                                                            <input name="color" type="radio" value="{{$color->ProductColor->id}}" class="colorinput-input">
                                                            <span class="colorinput-color" data-toggle="tooltip" title="{{$color->ProductColor->color_name}}" style="background-color: {{$color->ProductColor->color}}"></span>
                                                        </label>
                                                    </div>
                                                @endforeach
											</div>
										</div>
										<div class="d-flex  mt-2">
											<div class="mt-2 product-title">Quantity:</div>
											<div class="d-flex ml-2">
												<ul class=" mb-0 qunatity-list">
													<li>
														<div class="form-group">
															<select name="quantity" id="select-countries17" class="form-control nice-select wd-100">
																<option value="1" selected="">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
															</select>
														</div>
													</li>
												</ul>
											</div>
                                            <form class="rating-stars block" method="post" action="{{route("rate.product")}}">
                                                @csrf
                                            <div class="rating-stars block" id="rating">
                                                    <input hidden type="number" value="{{$Product->id}}" name="product_id">
                                                    <input type="number" hidden readonly="readonly" class="rating-value" name="rating_stars" id="rating-stars-value" value="1">
                                                    <div class="rating-stars-container" style="display: inline">
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <div class="rating-star">
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <input class="btn btn-outline-primary" type="submit" value="Rate" style="display: inline">

                                            </div>
                                            </form>
										</div>
										<div class="action">
											<button class="add-to-cart btn btn-danger" type="button">ADD TO WISHLIST</button>
											<button class="add-to-cart btn btn-success" type="button">ADD TO CART</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
                    @foreach($LastProducts as $lasProduct)
                        <div class="col-lg-3">
                            <div class="card item-card">
                                <div class="card-body pb-0 h-100">
                                    <div class="text-center">
                                        <img src="{{asset('file/ImageProduct/'.$lasProduct->image)}}" style="width: 100%; height: 280px" alt="img" class="img-fluid">
                                    </div>
                                    <div class="card-body cardbody relative">
                                        <div class="cardtitle">
                                            <span>{{$lasProduct->Category->name}}</span>
                                            <a>{{$lasProduct->name}}</a>
                                        </div>
                                        <div class="cardprice">
                                            <span class="type--strikethrough">{{$lasProduct->price}}</span>
                                            <span>{{$lasProduct->price - $lasProduct->discount_price}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center border-top pt-3 pb-3 pl-2 pr-2 ">
                                    <a href="{{route('home')}}" class="btn btn-primary"> View More</a>
                                    <a href="{{route('user.product.details',$lasProduct->id)}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="feature2">
									<i class="mdi mdi-airplane-takeoff bg-purple ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">Free Shipping</h5>
								<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="feature2">
									<i class="mdi mdi-headset bg-pink  ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<h5 class="mb-2 tx-16">Customer Support</h5>
								<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-4 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="feature2">
									<i class="mdi mdi-refresh bg-teal ht-50 wd-50 text-center brround text-white"></i>
								</div>
								<div class="icon-return"></div>
								<h5 class="mb-2  tx-16">30 days money back</h5>
								<span class="fs-14 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua domenus orioneu.</span>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection