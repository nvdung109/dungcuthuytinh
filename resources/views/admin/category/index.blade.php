@extends('admin.layouts')
@section('CONTAINER')
@if(session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
</div>
@endif
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.category')}}">Danh mục sản phẩm</a>
    </nav>
</div>
<div class="br-pagetitle" style="justify-content: space-between;">
	<h4>Danh mục sản phẩm</h4>
	<div class=""><a href="{{ route('admin.category.add') }}" class="btn btn-success">Thêm mới danh mục</a></div>
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
		            	<button type="submit" class="btn btn-primary btn-block mg-b-10"><i class="fa fa-send mg-r-10"></i>Search</button>
		            </div>
		        </div>
  	    	</form>

		  	<div class="bd rounded table-responsive">
		  	  	<table class="table table-bordered table-striped mg-b-0">
		  	  		<tbody class="">
		                <tr class="thead-colored thead-light">
		                	<td class="wd-5p">STT</td>
		                	<td class="wd-10p">Tên</td>
		                	<td class="wd-10p">Ảnh</td>
		                	<td class="wd-10p">Đường dẫn</td>
							<td class="wd-5p">Ngày tạo</td>
							<td class="wd-5p">Kích hoạt</td>
							<td class="wd-5p text-center">Sửa</td>
							<td class="wd-5p text-center">Xóa</td>
		                </tr>
				      	@foreach ($listCate as $item)
							<tr id="record_5">
								<td>{{ $item->id }}</td>
					          	<td>{{ $item->name }}</td>
					          	<td><img width="100" height="100" src="{{ asset('storage/category/' . $item->image) }}" ></td>
					          	<td>{{ $item->link }}</td>
					          	<td class="text-center">{{ $item->date }}</td>
					          	<td>{{ $item->active }}</td>
					          	<td class="text-center">
					          		<a href="{{route('admin.category.edit', ['id' => $item->id])}}" class=""><i class="fas fa-edit"></i> Sửa</a>
					          	</td>
					          	<td class="text-center">
									<a style="font-size: 15px; color: red" class="buttonDelteRecord" href="{{route('admin.category.remove', ['id' => $item->id])}}"><i class="fa fa-times-circle"></i> Xóa</a>
					          	</td>
					        </tr>
				      	@endforeach
		      		</tbody>
		  	  	</table>
		  	</div>
		  	<nav style="margin-top: 30px" class="tg-pagination">
		       	{{ $cate->links() }}
		    </nav>
        </div>
    </section>
    @include("admin.pagination")
</div>
@endsection

