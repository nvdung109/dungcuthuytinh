@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.product')}}">Sản phẩm</a>
      <span class="breadcrumb-item active">Thêm mới</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Thêm mới sản phẩm</h4>
</div>
<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.product.edit',['id' => $product->id]) }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên sản phẩm</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="{{ old('title',$product->name) }}" class="form-control" placeholder="Nhập tên sản phẩm">
			                    @if($errors->first('name'))
									<span class="text-danger">{{$errors->first('name')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mã sản phẩm</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="masp" value="{{ old('title',$product->masp) }}" class="form-control" placeholder="Nhập đường dẫn">
			                    @if($errors->first('masp'))
									<span class="text-danger">{{$errors->first('masp')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Đường dẫn</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="url" value="{{ old('title',$product->url) }}" class="form-control" placeholder="Nhập đường dẫn">
			                    @if($errors->first('url'))
									<span class="text-danger">{{$errors->first('url')}}</span>
								@endif
			                </div>
		                </div>
		            	<div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Danh mục</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <select class="form-control" name="cate_id">
		                            @foreach($cates as $item)
                    					<option value="{{$item->id}}"
                    						@if($item->id == $product->cate_id)
						                		selected
					                		@endif>
	    									{{$item->name}}
	    								</option>
                    				@endforeach
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Ảnh đại diện</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="image" value="{{ old('title', $product->image) }}" class="form-control">
		                      	<img style="margin-top: 5px" id="imageTarget" src="{{asset('storage/products/' .$product->image)}}" width="150px" height="150px" class="img-responsive">
		                      	@if($errors->first('image'))
									<span class="text-danger">{{$errors->first('image')}}</span>
								@endif
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Giá sản phẩm</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="price" value="{{ old('title',$product->price) }}">
								@if($errors->first('price'))
									<span class="text-danger">{{$errors->first('price')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Thương hiệu</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <select class="form-control" name="brand_id">
		                            @foreach($brand as $item)
                    					<option value="{{$item->id}}"
                    						@if($item->id == $product->brand_id)
						                		selected
					                		@endif>
					                		{{$item->name}}
					                	</option>
                    				@endforeach
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mô tả ngắn</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="description_en" class="form-control " id="editor2">{{ $product->description_en }}</textarea>
			                    @if($errors->first('description_en'))
									<span class="text-danger">{{$errors->first('description_en')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mô tả</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="description" class="form-control " id="editor1">{{ $product->description }}</textarea>
			                    @if($errors->first('description'))
									<span class="text-danger">{{$errors->first('description')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Kích hoạt</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    	<select name="active" value="{{ old('title', $product->active) }}">
									<option value="1">Kích hoạt</option>
									<option value="2">Tạm dừng</option>
								</select>
								@if($errors->first('active'))
									<span class="text-danger">{{$errors->first('active')}}</span>
								@endif
			                </div>
		                </div>

		                <hr style="margin-bottom: 15px">
		                <h1>Cấu hình SEO</h1>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Meta title</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="meta_title" value="{{ old('title', $product->meta_title) }}">
								@if($errors->first('meta_title'))
									<span class="text-danger">{{$errors->first('meta_title')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Meta description</label>
		                     <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <textarea class="form-control" name="meta_description">{{ $product->meta_description }}</textarea>
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
	                	<a href="{{ route('admin.product') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
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
    <script type="text/javascript">
        function loadParent($val){
            $.ajax({
                url: '/admin/category/ajax-load-parent',
                method: 'POST',
                data: {
                    typeID: $val
                },
                success: function (data) {
                    $('#parentBox').html(data);
                }
            });
        }
    </script>
@endsection