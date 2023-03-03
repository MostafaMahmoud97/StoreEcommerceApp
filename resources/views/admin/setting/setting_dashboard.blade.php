@extends('layouts.admin.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Datetimepicker-slider css -->
<link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- Internal Spectrum-colorpicker css -->
<link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Settings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Setting site</span>
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
        <div class="alert alert-error" role="alert">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{session()->get('message')}}
        </div>
    @endif
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Setting
								</div>
								<div class="pd-30 pd-sm-40 bg-gray-200">
                                    <form class="form-horizontal" action="{{route('admin.setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$setting->name}}" id="inputName" placeholder="Name" name="name">
                                        </div>

                                        <div class="form-group has-success mg-b-0 needs-validation was-validated">
                                            <textarea class="form-control mg-t-20" placeholder="Textarea (success state)" required="" rows="3" name="description">{{$setting->description}}</textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$setting->address}}" id="inputName" placeholder="Address" name="address">
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Phone:
                                                </div>
                                            </div><!-- input-group-prepend -->
                                            <input class="form-control" id="phoneMask" value="{{$setting->phone}}" placeholder="(000) 000-0000" type="text" name="phone">
                                        </div><!-- input-group -->
                                        <br>
                                        <img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-200" src="{{$setting->logo}}">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="customFile" name="logo_val" value="{{$setting->logo}}" type="file"> <label class="custom-file-label" for="customFile">Logo file</label>
                                        </div>
                                        <br><br>
                                        <img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-200" src="{{$setting->favicon}}">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="customFile" name="favicon_val" value="{{$setting->favicon}}" type="file"> <label class="custom-file-label" for="customFile">Favicon file</label>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="inputName" value="{{$setting->email}}" placeholder="Email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputName" value="{{$setting->facebook}}" placeholder="Facebook" name="facebook">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputName" value="{{$setting->twitter}}" placeholder="Twitter" name="twitter">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputName" value="{{$setting->instagram}}" placeholder="Instagram" name="instagram">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputName" value="{{$setting->youtube}}" placeholder="Youtube" name="youtube">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputName" value="{{$setting->tiktok}}" placeholder="Tiktok" name="tiktok">
                                        </div>
                                        <div class="form-group mb-0 mt-3 justify-content-end">
                                            <div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
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
@endsection
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('assets/js/form-layouts.js')}}"></script>


<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection
