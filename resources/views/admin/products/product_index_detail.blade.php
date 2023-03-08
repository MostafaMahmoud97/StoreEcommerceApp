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
							<h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ index/ index detail</span>
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
                                        <h4 class="card-title mg-b-0">Products Detail : <span style="color: grey">{{$Product->name}}</span></h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th class="wd-15p border-bottom-0">#</th>
                                                <th class="wd-20p border-bottom-0">Color</th>
                                                <th class="wd-15p border-bottom-0">Size</th>
                                                <th class="wd-15p border-bottom-0">Quantity</th>
                                                <th class="wd-15p border-bottom-0">In Stock</th>
                                                <th class="wd-15p border-bottom-0">Price</th>
                                                <th class="wd-15p border-bottom-0">Discount Price</th>
                                                <th class="wd-15p border-bottom-0">Status</th>
                                                <th class="wd-20p border-bottom-0">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 1
                                                ?>
                                            @foreach($Product->ProductColorSizes as $ProductColor)
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$ProductColor->ProductColor->color_name}}</td>
                                                        <td>{{$ProductColor->ProductSize->size}}</td>
                                                        <td>{{$ProductColor->quantity}}</td>
                                                        <td>{{$ProductColor->in_stock}}</td>
                                                        <td>{{$ProductColor->price}}</td>
                                                        <td>{{$ProductColor->discount_price}}</td>
                                                        <td>
                                                            <div class="checkbox">
                                                                <div class="custom-checkbox custom-control">
                                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" name="status" @if($ProductColor->status == 1) checked @endif disabled>
                                                                    <label for="checkbox-1" class="custom-control-label mt-1">Availability</label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a class="dropdown-item modal-effect"
                                                               data-id="{{$ProductColor->id}}"
                                                               data-quantity="{{$ProductColor->quantity}}"
                                                               data-price="{{$ProductColor->price}}"
                                                               data-discount="{{$ProductColor->discount_price}}"
                                                               data-status="{{$ProductColor->status}}"
                                                               data-in_stock="{{$ProductColor->in_stock}}"
                                                               data-toggle="modal" data-effect="effect-scale"
                                                               href="#exampleModal2"><i class="text-primary fas fa-edit"></i> &nbsp;&nbsp;Edit</a>
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

    <!-- Edit Product Color Size modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{route('admin.product.detail.update')}}" method="post">
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="col-lg">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" class="form-control" placeholder="Quantity" type="number" name="quantity">
                        </div>
                        <br>
                        <div class="col-lg">
                            <label for="price">Price</label>
                            <input id="price" class="form-control" placeholder="Price" type="number" name="price">
                        </div>
                        <br>
                        <div class="col-lg">
                            <label for="discount">Discount Price</label>
                            <input id="discount" class="form-control" placeholder="Discount Price" type="number" name="discount_price">
                        </div>
                        <br>
                        <div class="col-lg">
                            <label for="in_stock">In Stock</label>
                            <input id="in_stock" class="form-control" placeholder="In Stock" type="number" name="in_stock">
                        </div>
                        <br>
                        <div class="checkbox">
                            <div class="custom-checkbox custom-control">
                                <label>Status</label>
                                <br>
                                <input id="status" type="checkbox" data-checkboxes="mygroup" class="custom-control-input" name="status">
                                <label for="status" class="custom-control-label mt-1">Availability</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Small modal -->
{{--    <div class="modal" id="modaldemo2">--}}
{{--        <div class="modal-dialog modal-md" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h6 class="modal-title">Add New Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}

{{--                    <form class="form-horizontal" action="{{route("admin.product.store")}}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name" name="name">--}}
{{--                            @error('name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="inputName" placeholder="Description" name="description">--}}
{{--                        </div>--}}
{{--                        @error('description')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                        <div class="custom-file">--}}
{{--                            <input class="custom-file-input @error('image_val') is-invalid @enderror" id="customFile" name="image_val" type="file"> <label class="custom-file-label" for="customFile">Image file</label>--}}
{{--                            @error('image_val')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br><br>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputName" placeholder="Price" name="price">--}}
{{--                            @error('price')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="number" class="form-control @error('discount_price') is-invalid @enderror" id="inputName" placeholder="Discount" name="discount_price">--}}
{{--                        </div>--}}
{{--                        @error('discount_price')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                        <div class="form-group">--}}
{{--                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">--}}
{{--                                <option label="Choose Category" >--}}
{{--                                </option>--}}
{{--                                @foreach($Categories as $Category)--}}
{{--                                    <option value="{{$Category->id}}">--}}
{{--                                        {{$Category->name}}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}

{{--                            </select>--}}
{{--                            @error('category_id')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">--}}
{{--                            <select class="form-control select2 @error('colors') is-invalid @enderror" style="width: 100%" multiple="multiple" name="colors[]">--}}
{{--                                <option selected value="#e2062c">--}}
{{--                                    Red--}}
{{--                                </option>--}}
{{--                                <option value="#0fc163">--}}
{{--                                    Green--}}
{{--                                </option>--}}
{{--                                <option value="#5865f2">--}}
{{--                                    Blue--}}
{{--                                </option>--}}
{{--                                <option value="#f1c232">--}}
{{--                                    Yellow--}}
{{--                                </option>--}}
{{--                                <option value="#ce7e00">--}}
{{--                                    Orange--}}
{{--                                </option>--}}
{{--                                <option value="#999999">--}}
{{--                                    Gray--}}
{{--                                </option>--}}
{{--                            </select>--}}
{{--                            @error('colors')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <div class="col-lg-12 mg-b-20 mg-lg-b-0">--}}
{{--                            <select class="form-control select2 @error('sizes') is-invalid @enderror" style="width: 100%" multiple="multiple" name="sizes[]">--}}
{{--                                <option selected value="Small">--}}
{{--                                    Small--}}
{{--                                </option>--}}
{{--                                <option value="Medium">--}}
{{--                                    Medium--}}
{{--                                </option>--}}
{{--                                <option value="Large">--}}
{{--                                    Large--}}
{{--                                </option>--}}
{{--                                <option value="X Large">--}}
{{--                                    X Large--}}
{{--                                </option>--}}
{{--                            </select>--}}
{{--                            @error('sizes')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}


{{--                        <div class="form-group mb-0 mt-3 justify-content-end">--}}
{{--                            <div class="modal-footer justify-content-center">--}}
{{--                                <button class="btn ripple btn-primary" type="submit">Save</button>--}}
{{--                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
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
<script>
    $('#exampleModal2').on('show.bs.modal',function (event){
        var btn = $(event.relatedTarget);
        var id = btn.data('id');
        var quantity = btn.data('quantity');
        var price = btn.data('price');
        var discount = btn.data('discount');
        var status = btn.data('status');
        var in_stock = btn.data('in_stock');
        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #quantity').val(quantity);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #discount').val(discount);
        modal.find('.modal-body #in_stock').val(in_stock);
        if (status == 1){
            modal.find('.modal-body #status').prop("checked",true);
        }

    })
</script>
@endsection
