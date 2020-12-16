
@extends('admin.layouts')
@section('CONTAINER')
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
	</div>
@endif
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.contact')}}">Liên hệ</a>
      <span class="breadcrumb-item active">Danh sách liên hệ</span>
    </nav>
</div>
<div class="br-pagetitle" style="justify-content: space-between;">
	<h4>Danh sách liên hệ</h4>
	<div class=""><a href="{{ route('admin.contact.add') }}" class="btn btn-success">Thêm mới liên hệ</a></div>
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
		            	<button type="" class="btn btn-primary btn-block mg-b-10"><i class="fa fa-send mg-r-10"></i>Search</button>
		            </div>
		        </div>
  	    	</form>

		  	<div class="bd rounded table-responsive">
		  	  	<table class="table table-bordered table-striped mg-b-0">
		  	  		<tbody class="">
		                <tr class="thead-colored thead-light">
		                	<td class="wd-5p">STT</td>
		                	<td class="wd-10p">Tên</td>
		                	<td class="wd-10p">Email</td>
		                	<td class="wd-10p">Số điện thoại</td>
		                	<td class="wd-10p">Tiêu đề</td>
							<td class="wd-15p">Nội dung</td>
							<td class="wd-5p text-center">Ngày tạo</td>
							<td class="wd-5p text-center">Xóa</td>
		                </tr>
				      	@foreach ($listContact as $item)
							<tr id="record_5">
								<td>{{ $item->id }}</td>
					          	<td>{{ $item->name }}</td>
					          	<td>{{ $item->email }}</td>
					          	<td>{{ $item->telephone }}</td>
					          	<td>{{ $item->title }}</td>
					          	<td>{!! $item->content !!}</td>
					          	<td class="text-center">{{ $item->date }}</td>
					          	<td class="text-center">
									<a style="font-size: 15px; color: red" class="buttonDelteRecord" onclick="" href="{{route('admin.contact.remove', ['id' => $item->id])}}"><i class="fa fa-times-circle"></i> Xóa</a>
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

