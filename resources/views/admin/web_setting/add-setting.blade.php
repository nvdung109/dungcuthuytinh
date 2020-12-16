@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.setting')}}">Sản phẩm</a>
      <span class="breadcrumb-item active">Thêm mới</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Thêm mới</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.setting.add') }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên công ty</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="" class="form-control" placeholder="Nhập tên công ty">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Logo</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="logo" value="" class="form-control" placeholder="Logo công ty">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Địa chỉ 1</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="address1" value="" placeholder="Nhập địa chỉ">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Địa chỉ 2</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="address2" value="" placeholder="Nhập địa chỉ">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Địa chỉ 3</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="address3" value="" placeholder="Nhập địa chỉ">
			                </div>
		                </div>
		                {{-- <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Hotline</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="hotline" value="">
			                </div>
		                </div> --}}
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">SĐT hỗ trợ 1</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="sup_telephone1" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">SĐT hỗ trợ 2</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="sup_telephone2" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">SĐT hỗ trợ 3</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="sup_telephone3" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Email</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="email" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Link Facebook</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="link_fb" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Link Youtube</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="link_yt" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Link Twitter</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="link_tt" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Link Pinterest</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="link_pin" value="">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label">Kích hoạt</label>
		                	<div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <div class="custom-control custom-checkbox">
			                        <input class="custom-control-input" type="checkbox" id="" name="active") checked="checked" value="1">
			                        <label class="col-sm-4 form-control-label custom-control-label" for=""></label>
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
	                	<a href="{{ route('admin.setting') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
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