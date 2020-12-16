@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.user')}}">Thành viên</a>
      <span class="breadcrumb-item active">Thêm mới</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Thêm mới thành viên</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            <form role="form" method="post" action="{{ route('admin.user.add') }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="" class="form-control" placeholder="Nhập tên thành viên">
			                    {{old('name')}}
			                    @if($errors->first('name'))
									<span class="text-danger">{{$errors->first('name')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mật khẩu</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="password" name="password" value="" class="form-control" placeholder="Mật khẩu từ 6-32 kí tự">
			                    {{old('password')}}
			                    @if($errors->first('password'))
									<span class="text-danger">{{$errors->first('password')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Ảnh đại diện</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="avatar" value="{{old('image')}}" class="form-control">
		                      	@if($errors->first('image'))
									<span class="text-danger">{{$errors->first('image')}}</span>
								@endif
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Email</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="email" value="">
			                </div>
			                {{old('email')}}
		                    @if($errors->first('email'))
								<span class="text-danger">{{$errors->first('email')}}</span>
							@endif
		                </div>
		                {{-- <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Quyền quản trị</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<select name="role_id" value="">
									<option value="900">Admin</option>
									<option value="300">Member</option>
								</select>
			                </div>
		                </div> --}}
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
	                	<a href="{{ route('admin.user') }}"><button type="reset" class="btn btn-danger mg-r-20">Hủy</button></a>
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