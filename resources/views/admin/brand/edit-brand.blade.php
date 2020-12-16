@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.brand')}}">Danh mục</a>
      <span class="breadcrumb-item active">Sửa danh mục</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Sửa danh mục</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.brand.edit', ['id' => $brand->id]) }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên danh mục</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="{{ old('title',$brand->name) }}" class="form-control" placeholder="Nhập tên thương hiệu">
			                    @if($errors->first('name'))
									<span class="text-danger">{{$errors->first('name')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mô tả</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="description" class="form-control " id="editor1">{{ $brand->description }}</textarea>
			                    @if($errors->first('description'))
									<span class="text-danger">{{$errors->first('description')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Kích hoạt</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    	<select name="active" value="{{ old('title', $brand->active) }}">
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
	                	<a href="{{ route('admin.brand') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
	                </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@section('JS_FOOTER')
	<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
	<script> CKEDITOR.replace('editor1'); </script>
	{{-- <script> CKEDITOR.replace('editor2'); </script> --}}
@endsection