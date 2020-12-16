@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.setting')}}">Cấu hình chung</a>
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
            <form role="form" method="post" action="{{ route('admin.setting.edit',['id' => $set->id]) }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên công ty</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="{{ $set->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Logo</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="logo" value="{{ $set->logo }}" class="form-control">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Địa chỉ 1</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="address" value="{{ $set->address1 }}">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Địa chỉ 2</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="address" value="{{ $set->address2 }}">
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Địa chỉ 3</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="address" value="{{ $set->address3 }}">
			                </div>
		                </div>
		                {{-- <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Hotline</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="hotline" value="{{ $set->hotline }}">
			                </div>
		                </div> --}}
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">SĐT hỗ trợ</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="sup_telephone1" value="{{ $set->sup_telephone1 }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">SĐT hỗ trợ</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="sup_telephone2" value="{{ $set->sup_telephone2 }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">SĐT hỗ trợ</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="sup_telephone3" value="{{ $set->sup_telephone3 }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Email</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="email" value="{{ $set->email }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Link Facebook</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="link_fb" value="{{ $set->link_fb }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Link Youtube</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="link_yt" value="{{ $set->link_yt }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Link Twitter</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="link_tt" value="{{ $set->link_tt }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Link Pinterest</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <input type="text" class="form-control" name="link_pin" value="{{ $set->link_pin }}">
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Kích hoạt</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<select name="active" value="{{ $set->active }}">
									<option value="1">Kích hoạt</option>
									<option value="2">Tạm dừng</option>
								</select>
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