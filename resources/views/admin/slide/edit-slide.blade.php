@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.slider')}}">Danh mục</a>
      <span class="breadcrumb-item active">Sửa slides</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Sửa slides</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.slider.edit', ['id' => $slide->id]) }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tiêu đề</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="title" value="{{ $slide->title }}" class="form-control" placeholder="Nhập tiêu đề ảnh">
			                    @if($errors->first('title'))
									<span class="text-danger">{{$errors->first('title')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Ảnh slides</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="image" value="{{ old('title',$slide->image) }}" class="form-control">
		                      	<img style="margin-top: 5px" id="imageTarget" src="{{asset('storage/slider/' .$slide->image)}}" width="150px" height="150px" class="img-responsive">
		                      	@if($errors->first('image'))
									<span class="text-danger">{{$errors->first('image')}}</span>
								@endif
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Link</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="text" name="link" value="{{ $slide->link }}" class="form-control">
		                      	@if($errors->first('link'))
									<span class="text-danger">{{$errors->first('link')}}</span>
								@endif
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Vị trí</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="text" name="position" value="{{ $slide->position }}" class="form-control">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Kích hoạt</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<select name="active" value="{{ old('title', $slide->active) }}">
									<option value="1">Kích hoạt</option>
									<option value="2">Tạm dừng</option>
								</select>
								@if($errors->first('active'))
									<span class="text-danger">{{$errors->first('active')}}</span>
								@endif
		                    </div>
		                </div>
					</div>
	            </div>

                <!-- /.card-body -->
                <div class="row mg-t-20">
                	<div class="col-sm-2 mg-b-10"></div>
                	<div class="col-sm-5 mg-b-10 mg-sm-b-10">
                		<input type="hidden" name="action" value="execute">
	                    <button type="submit" class="btn btn-success"> Lưu</button>
	                	<a href="{{ route('admin.slider') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
	                </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@section('JS_FOOTER')
	<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
@endsection