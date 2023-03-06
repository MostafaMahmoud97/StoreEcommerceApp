@extends('layouts.admin.master')
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ index/ update</span>
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
            <strong>Well done!</strong> {{session()->get('message')}}
        </div>
    @endif
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mg-b-0">Update Category</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{route('admin.category.edit',$Category->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name" name="name" value="{{$Category->name}}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="parent_id">
                                                <option label="Choose Parent Category" value="0">
                                                </option>
                                                @foreach($Categories as $CategoryTemp)
                                                    @if($CategoryTemp->id == $Category->id)
                                                        @continue
                                                    @endif
                                                    @if($Category->parent != null && $CategoryTemp->id == $Category->parent->id)
                                                    <option value="{{$CategoryTemp->id}}" selected>
                                                        {{$CategoryTemp->name}}
                                                    </option>
                                                    @else
                                                        <option value="{{$CategoryTemp->id}}">
                                                            {{$CategoryTemp->name}}
                                                        </option>
                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>

                                        <img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-100" src="{{asset('file/ImageCategory/'.$Category->img)}}">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="customFile" name="img_val" type="file"> <label class="custom-file-label" for="customFile">Image file</label>
                                        </div>
                                        <div class="form-group mb-0 mt-3 justify-content-end">
                                            <div class="modal-footer justify-content-center">
                                                <button class="btn ripple btn-primary" type="submit">Update</button>
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
@endsection
