@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.comment')}}">Bình luận</a>
      <span class="breadcrumb-item active">Thêm mới</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Thêm mới bình luận</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.comment.add') }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Họ và tên</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="" class="form-control" placeholder="Nhập tên họ và tên">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Email</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="email" value="" class="form-control" placeholder="Nhập địa chỉ email">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Số điện thoại</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="telephone" value="" class="form-control" placeholder="Nhập địa số điện thoại">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Nội dung</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="content" class="form-control " id="editor1"></textarea>
			                </div>
		                </div>
		            	<div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Sản phẩm</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <select class="form-control" name="pro_id">
		                            @foreach($product as $item)
                    					<option value="{{$item->id}}">{{$item->name}}</option>
                    				@endforeach
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Bài viết</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <select class="form-control" name="new_id">
		                            @foreach($news as $item)
                    					<option value="{{$item->id}}">{{$item->title}}</option>
                    				@endforeach
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Ngày đăng</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="date" class="form-control" name="date" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label">Kích hoạt</label>
		                	<div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <div class="custom-control custom-checkbox">
			                        <input class="custom-control-input" type="checkbox" id="cat_active" name="active" checked="checked" value="1">
			                        <label class="col-sm-4 form-control-label custom-control-label" for="cat_active"></label>
			                    </div>
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
	                	<a href="{{ route('admin.comment') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
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