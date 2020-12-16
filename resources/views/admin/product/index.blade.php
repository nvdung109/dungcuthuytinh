@extends('admin.layouts')
@section('CONTAINER')
@if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
</div>
@endif
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.product')}}">Danh mục</a>
      <span class="breadcrumb-item active">Danh sách sản phẩm</span>
    </nav>
</div>
<div class="br-pagetitle" style="justify-content: space-between;">
	<h4>Danh sách sản phẩm và dịch vụ</h4>
	<div class=""><a href="{{ route('admin.product.add') }}" class="btn btn-success">Thêm mới sản phẩm</a></div>
</div>
<div class="br-pagebody">
	<section class="listing-container">
        <div class="br-section-wrapper container-fluid">
			<h6 class="br-section-label">Tìm kiếm</h6>
  	  		<form method="get" action="" enctype="multipart/form-data" novalidate>
  	  			<div class="row">
		            <div class="col-lg-2">
		              <input class="form-control" name="keyword" placeholder="Tên" type="text" value="">
		            </div>
		            <div class="col-lg-2 mg-t-10 mg-lg-t-0">
		            	<button type="submit" class="btn btn-primary btn-block mg-b-10"><i class="fa fa-send mg-r-10"></i>Search</button>
		            </div>
		        </div>
  	    	</form>

		  	<div class="bd rounded table-responsive">
		  	  	<table class="table table-bordered table-striped mg-b-0">
		  	  		<tbody class="">
		                <tr class="thead-colored thead-light">
		                	<td class="wd-5p">STT</td>
		                	<td class="wd-5p">Tên</td>
		                	<td class="wd-5p">Mã sản phẩm</td>
		                	<td class="wd-10p">Ảnh</td>
							<td class="wd-5p">Giá</td>
							<td class="wd-5p">Danh mục</td>
							{{-- <td class="wd-5p">Người đăng</td> --}}
							<td class="wd-5p">Thương hiệu</td>
							{{-- <td class="wd-5p">View</td> --}}
							<td class="wd-5p text-center">Ngày tạo</td>
							<td class="wd-5p text-center">Kích hoạt</td>
							<td class="wd-5p text-center">Sửa</td>
							<td class="wd-5p text-center">Xóa</td>
		                </tr>
				      	@foreach ($listProduct as $item)
							<tr id="record_5">
								<td>{{ $item->id }}</td>
					          	<td>{{ $item->name }}</td>
					          	<td>{{ $item->masp }}</td>
					          	<td><img width="100" height="100" src="{{ asset('storage/products/' . $item->image) }}" ></td>
					          	<td>{{ number_format($item->price) }}</td>
					          	{{-- <td>{!! $item->description !!}</td> --}}
					          	<td>{{ $item->category->name }}</td>
{{-- 					          	<td>{{ $item->user->user_name }}</td> --}}
					          	<td>{{ $item->brand->name }}</td>
					          	{{-- <td class="text-center">{{ $item->view }}</td> --}}
					          	<td class="text-center">{{ $item->date }}</td>
					          	<td class="text-center">{{ $item->active }}</td>
					          	<td class="text-center">
					          		<a href="{{route('admin.product.edit', ['id' => $item->id])}}" class=""><i class="fas fa-edit"></i> Sửa</a>
					          	</td>
					          	<td class="text-center">
									<a style="font-size: 15px; color: red" class="buttonDelteRecord" href="{{route('admin.product.remove', ['id' => $item->id])}}"><i class="fa fa-times-circle"></i> Xóa</a>
					          	</td>
					        </tr>
				      	@endforeach
		      		</tbody>
		  	  	</table>
		  	</div>
		  	<nav style="margin-top: 30px" class="tg-pagination">
		       	{{ $product->links() }}
		    </nav>
        </div>
    </section>
    {{-- @include("admin.pagination") --}}
</div>
@endsection


