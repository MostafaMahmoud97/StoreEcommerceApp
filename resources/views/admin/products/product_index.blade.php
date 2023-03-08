@extends('layouts.admin.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!---Internal Owl Carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ index</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
    @if(session()->has('status') && session()->get('status') == "success" )
        <div class="alert alert-success" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{session()->get('message')}}
        </div>
    @elseif(session()->has('status') && session()->get('status') == "error")
        <div class="alert alert-danger" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong> {{session()->get('message')}}
        </div>
    @endif
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">Products</h4>
                                        <a class="mdi mdi-horizontal btn ripple btn-primary" data-target="#modaldemo2" data-toggle="modal" href="">Add New Product</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">Product Name</th>
                                                <th class="wd-20p border-bottom-0">Category</th>
                                                <th class="wd-15p border-bottom-0">Image</th>
                                                <th class="wd-15p border-bottom-0">Price</th>
                                                <th class="wd-15p border-bottom-0">Discount</th>
                                                <th class="wd-15p border-bottom-0">Number Colors</th>
                                                <th class="wd-20p border-bottom-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 1
                                                ?>
                                            @foreach($Products as $Product)
                                                <tr>
                                                    <td>{{$count}}</td>
                                                    <td>{{$Product->name}}</td>
                                                    <td>{{$Product->Category->name}}</td>
                                                    <td>
                                                        <img alt="Responsive image" class="img-thumbnail wd-50p wd-sm-50" src="{{asset('file/ImageProduct/'.$Product->image)}}">
                                                    </td>
                                                    <td>{{$Product->price}}</td>
                                                    <td>{{$Product->discount_price}}</td>
                                                    <td>{{$Product->count_color}}</td>
                                                    <td>
                                                        <a class="dropdown-item" href="{{route('admin.product.details',$Product->id)}}"><i class="text-danger fas fa-trash"></i> &nbsp;&nbsp;Delete</a>
                                                        <a class="dropdown-item" href="{{route('admin.product.details',$Product->id)}}"><i class="text-primary fas fa-edit"></i> &nbsp;&nbsp;Details</a>
                                                        <a class="dropdown-item" href="{{route('admin.product.gallery',$Product->id)}}"><i class="text-secondary fas fa-image"></i> &nbsp;&nbsp;Gallery</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    $count++
                                                    ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->

    <!-- Small modal -->
    <div class="modal" id="modaldemo2">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" action="{{route("admin.product.store")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="inputName" placeholder="Description" name="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="custom-file">
                            <input class="custom-file-input @error('image_val') is-invalid @enderror" id="customFile" name="image_val" type="file"> <label class="custom-file-label" for="customFile">Image file</label>
                            @error('image_val')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br><br>
                        <div class="form-group">
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputName" placeholder="Price" name="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control @error('discount_price') is-invalid @enderror" id="inputName" placeholder="Discount" name="discount_price">
                        </div>
                        @error('discount_price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option label="Choose Category" >
                                </option>
                                @foreach($Categories as $Category)
                                    <option value="{{$Category->id}}">
                                        {{$Category->name}}
                                    </option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                            <select class="form-control select2 @error('colors') is-invalid @enderror" style="width: 100%" multiple="multiple" name="colors[]">
                                @foreach($Colors as $color)
                                    <option selected value="{{$color->id}}">
                                        {{$color->color_name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('colors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">
                            <select class="form-control select2 @error('sizes') is-invalid @enderror" style="width: 100%" multiple="multiple" name="sizes[]">
                                @foreach($Sizes as $size)
                                    <option selected value="{{$size->id}}">
                                        {{$size->size}}
                                    </option>
                                @endforeach
                            </select>
                            @error('sizes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="custom-file">
                            <input class="custom-file-input @error('images') is-invalid @enderror" id="customFile" name="images[]" type="file" multiple> <label class="custom-file-label" for="customFile">Image files</label>
                            @error('images')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div class="modal-footer justify-content-center">
                                <button class="btn ripple btn-primary" type="submit">Save</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Small Modal -->

@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('assets/js/form-layouts.js')}}"></script>

<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection
