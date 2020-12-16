
@extends('admin.layouts')
@section('CONTAINER')
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
	</div>
@endif
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.user')}}">Thành viên</a>
      <span class="breadcrumb-item active">Danh sách thành viên</span>
    </nav>
</div>
<div class="br-pagetitle" style="justify-content: space-between;">
	<h4>Danh sách thành viên</h4>
	<div class=""><a href="{{ route('admin.user.add') }}" class="btn btn-success">Thêm mới thành viên</a></div>
</div>
<div class="br-pagebody">
	<section class="listing-container">
        <div class="br-section-wrapper container-fluid">
			<h6 class="br-section-label">Tìm kiếm</h6>
  	  		<form method="GET" action="">
  	  			<div class="row">
		            <div class="col-lg-2">
		              <input class="form-control" name="keyword" placeholder="Tên" type="text" value="">
		            </div>
		            <div class="col-lg-2 mg-t-10 mg-lg-t-0">
		            	<button class="btn btn-primary btn-block mg-b-10"><i class="fa fa-send mg-r-10"></i>Search</button>
		            </div>
		        </div>
  	    	</form>

		  	<div class="bd rounded table-responsive">
		  	  	<table class="table table-bordered table-striped mg-b-0">
		  	  		<tbody class="">
		                <tr class="thead-colored thead-light">
		                	<td class="wd-5p">STT</td>
		                	<td class="wd-5p">Tên</td>
		                	<td class="wd-5p">Ảnh đại diện</td>
							<td class="wd-5p">Email</td>
							<td class="wd-5p text-center">Ngày tạo</td>
{{-- 							<td class="wd-5p text-center">Quản trị</td> --}}
							<td class="wd-5p text-center">Kích hoạt</td>
							<td class="wd-5p text-center">Sửa</td>
							<td class="wd-5p text-center">Xóa</td>
		                </tr>
				      	@foreach ($listUser as $item)
							<tr id="record_5">
								<td>{{ $item->id }}</td>
					          	<td>{{ $item->name }}</td>
					          	<td><img width="100" height="100" src="{{ asset('storage/users/' . $item->avatar) }}" ></td>
					          	<td class="text-center">{{ $item->email }}</td>
					          	<td class="text-center">{{ $item->date }}</td>
					          	{{-- <td class="text-center">{{ $item->role_id }}</td> --}}
					          	<td class="text-center">{{ $item->active }}</td>
					          	<td class="text-center">
					          		<a href="{{route('admin.user.edit', ['id' => $item->id])}}" class=""><i class="fas fa-edit"></i> Sửa</a>
					          	</td>
					          	<td class="text-center">
									<a style="font-size: 15px; color: red" class="buttonDelteRecord" href="{{route('admin.user.remove', ['id' => $item->id])}}"><i class="fa fa-times-circle"></i> Xóa</a>
					          	</td>
					        </tr>
				      	@endforeach
		      		</tbody>
		  	  	</table>
		  	</div>

        </div>
    </section>
    @include("admin.pagination")
</div>
@endsection

