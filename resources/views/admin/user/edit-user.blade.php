@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.user')}}">Thành viên</a>
      <span class="breadcrumb-item active">Sửa</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Sửa thành viên</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="post" action="{{ route('admin.user.edit',['id' => $user->id]) }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="name" value="{{ old('title',$user->name) }}" class="form-control" placeholder="Nhập tên thành viên">
			                    @if($errors->first('name'))
									<span class="text-danger">{{$errors->first('name')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mật khẩu</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="password" name="password" value="{{ old('title',$user->password) }}" class="form-control" placeholder="Nhập mật khẩu">
			                    @if($errors->first('password'))
									<span class="text-danger">{{$errors->first('password')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Ảnh đại diện</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="avatar" value="{{ old('title',$user->avatar) }}" class="form-control">
		                      	<img style="margin-top: 5px" id="imageTarget" src="{{asset('storage/users/' .$user->avatar)}}" width="150px" height="150px" class="img-responsive">
		                      	@if($errors->first('avatar'))
									<span class="text-danger">{{$errors->first('avatar')}}</span>
								@endif
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Email</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="email" value="{{ old('title',$user->email) }}">
								@if($errors->first('email'))
									<span class="text-danger">{{$errors->first('email')}}</span>
								@endif
			                </div>
		                </div>
		                {{-- <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Quản trị</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<select name="role_id" value="{{ old('title', $user->role_id) }}">
									<option value="900">Admin</option>
									<option value="300">Member</option>
								</select>
			                </div>
		                </div> --}}
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Kích hoạt</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<select name="active" value="{{ old('title', $user->active) }}">
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
	                	<a href="{{ route('admin.user') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
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