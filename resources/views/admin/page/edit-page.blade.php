@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.page')}}">Trang</a>
      <span class="breadcrumb-item active">Sửa trang</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Sửa trang</h4>
</div>
<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.page.edit',['id' => $pag->id]) }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		            	<div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên trang</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="{{ old('title',$pag->name) }}" class="form-control" placeholder="Nhập tiêu đề trang">
			                    @if($errors->first('name'))
									<span class="text-danger">{{$errors->first('name')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tiêu đề</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="title" value="{{ old('pag',$pag->title) }}" class="form-control" placeholder="Nhập tiêu đề bài viết">
			                    @if($errors->first('title'))
									<span class="text-danger">{{$errors->first('title')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Link</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="link" value="{{ old('pag',$pag->link) }}" class="form-control" placeholder="">
			                    @if($errors->first('link'))
									<span class="text-danger">{{$errors->first('link')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mô tả</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="content" class="form-control " id="editor1">{{ $pag->content }}</textarea>
			                    @if($errors->first('content'))
									<span class="text-danger">{{$errors->first('content')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Vị trí</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    	<select name="type" id="" value="{{ $pag->type }}">
		                    		<option value="2">Footer</option>
									<option value="1">Header</option>
								</select>
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Kích hoạt</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    	<select name="active" id="" value="{{ $pag->active }}">
									<option value="1">Kích hoạt</option>
									<option value="2">Tạm dừng</option>
								</select>
			                </div>
		                </div>

		                <hr style="margin-bottom: 15px">
		                <h1>Cấu hình SEO</h1>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Meta title</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="meta_title" value="{{ $pag->meta_title }}">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Meta description</label>
		                     <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <textarea class="form-control" name="meta_description">{{ $pag->meta_description }}</textarea>
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
	                	<a href="{{ route('admin.page') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
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
	<script> CKEDITOR.replace('editor2'); </script>
@endsection