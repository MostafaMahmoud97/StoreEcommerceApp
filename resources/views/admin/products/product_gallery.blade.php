@extends('layouts.admin.master')
@section('css')
<!-- Internal Gallery css -->
<link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Product</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Gallery</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- Gallery -->
				<div class="demo-gallery">
					<ul id="lightgallery" class="list-unstyled row row-sm pr-0">
                        @foreach($ProductImages as $ProductImage)
                            <li class="col-sm-6 col-lg-4" data-responsive="{{asset('file/Images_Product/'.$ProductImage->image)}}" data-src="{{asset('file/Images_Product/'.$ProductImage->image)}}" data-sub-html="<h4>Gallery Image {{$ProductImage->id}}</h4>" >
                                <a href="">
                                    <img class="img-responsive" src="{{asset('file/Images_Product/'.$ProductImage->image)}}" alt="Thumb-1" style="width: 200px; height: 200px">
                                </a>
                            </li>
                        @endforeach


					</ul>
					<!-- /Gallery -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Gallery js -->
<script src="{{URL::asset('assets/plugins/gallery/lightgallery-all.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/gallery/jquery.mousewheel.min.js')}}"></script>
<script src="{{URL::asset('assets/js/gallery.js')}}"></script>
@endsection
