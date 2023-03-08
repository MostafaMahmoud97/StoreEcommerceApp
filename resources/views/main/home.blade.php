@extends('layouts.user.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
						<div class="card">
							<div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category</div>
                            <form role="form product-form" action="{{route('home.filter')}}" method="post">
                                @csrf
                            <div class="card-body pb-0">
                                @foreach($Categories as $Category)
                                    <div class="form-group">
                                        <label class="form-label">{{$Category->name}}</label>
                                        <select name="categories[]" id="select-beast" class="form-control  nice-select  custom-select">
                                            <option value="0">--Select--</option>
                                            @foreach($Category->children as $child)
                                                <option value="{{$child->id}}">{{$child->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach


							</div>

							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Filter</div>
							<div class="card-body">
									<div class="form-group">
										<label>Brand</label>
										<select class="form-control nice-select">
											<option>Wallmart</option>
											<option>Catseye</option>
											<option>Moonsoon</option>
											<option>Textmart</option>
										</select>
									</div>
									<div class="form-group">
										<label>Type</label>
										<select name="size" class="form-control nice-select">
                                            <option value="0">--Select--</option>
                                            @foreach($Sizes as $size)
                                                <option value="{{$size->id}}">{{$size->size}}</option>
                                            @endforeach
										</select>
									</div>

							</div>

							<div class="card-header border-bottom border-top pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Rating</div>
							<div class="py-2 px-3">
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="check-box mb-0">
										<span class="ckbox"><input checked="" type="checkbox"><span></span></span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox"><span></span></span>
										</span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<label class="p-1 mt-2 d-flex align-items-center">
									<span class="checkbox mb-0">
										<span class="check-box">
											<span class="ckbox"><input type="checkbox"><span></span></span>
										</span>
									</span>
									<span class="ml-3 tx-16 my-auto">
										<i class="ion ion-md-star  text-warning"></i>
									</span>
								</label>
								<button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
							</div>
                            </form>
						</div>
					</div>
					<div class="col-xl-9 col-lg-9 col-md-12">
                        <form role="form product-form" action="{{route('home')}}" method="get">
						<div class="card">
							<div class="card-body p-2">
								<div class="input-group">
									<input type="text" name="search" class="form-control" placeholder="Search ...">
									<span class="input-group-append">
										<button class="btn btn-primary" type="submit">Search</button>
									</span>
								</div>
							</div>
						</div>
                        </form>
						<div class="row row-sm">
                            @foreach($Products->items() as $Product)
                                <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="pro-img-box">
                                                <div class="d-flex product-sale">
                                                    @if(\Carbon\Carbon::parse(date('Y-m-d'))->diffInDays(\Carbon\Carbon::parse($Product->created_at)) < 1)
                                                        <div class="badge bg-pink">New</div>
                                                    @endif
                                                    <i class="mdi mdi-heart-outline ml-auto wishlist"></i>
                                                </div>
                                                <img class="w-100" style="height: 218px;" src="{{asset('file/ImageProduct/'.$Product->image)}}" alt="product-image">
                                                <a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
                                                </a>
                                            </div>
                                            <div class="text-center pt-3">
                                                <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$Product->name}}</h3>
                                                <span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
                                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">£{{$Product->price - $Product->discount_price}} <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">£{{$Product->price}}</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

							<ul class="pagination product-pagination mr-auto float-left">
								<li class="page-item page-prev {{$Products->CurrentPage() == 1 ? 'disabled' : ''}} ">
									<a class="page-link" href="/home?page={{$Products->CurrentPage() == 1 ? : $Products->CurrentPage() - 1}}" tabindex="-1">Prev</a>
								</li>
                                @for($count = 1;$count <= $Products->LastPage();$count++)
                                    @if($count == $Products->CurrentPage())
                                        <li class="page-item active"><a class="page-link" href="/home?page={{$count}}">{{$count}}</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="/home?page={{$count}}">{{$count}}</a></li>
                                    @endif
                                @endfor
								<li class="page-item page-next {{$Products->CurrentPage() == $Products->LastPage() ? 'disabled' : ''}}">
									<a class="page-link" href="/home?page={{$Products->CurrentPage() + 1}}" tabindex="+1">Next</a>
								</li>
							</ul>
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
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
