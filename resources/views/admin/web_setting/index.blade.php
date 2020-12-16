
@extends('admin.layouts')
@section('CONTAINER')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.setting')}}">Cấu hình</a>
    </nav>
</div>
<div class="br-pagetitle" style="justify-content: space-between;">
	<h4>Cấu hình chung</h4>
	<div class=""><a href="{{ route('admin.setting.add') }}" class="btn btn-success">Thêm mới</a></div>
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
		                	<td class="wd-10p">Logo</td>
							<td class="wd-5p">Địa chỉ 1</td>
							<td class="wd-5p">Địa chỉ 2</td>
							<td class="wd-5p">Địa chỉ 3</td>
							<td class="wd-5p">Hỗ trợ 1</td>
							<td class="wd-5p">Hỗ trợ 2</td>
							<td class="wd-5p">Hỗ trợ 3</td>
							<td class="wd-5p">Email</td>
							<td class="wd-5p">Facebook</td>
							<td class="wd-5p">Youtube</td>
							<td class="wd-5p">Twitter</td>
							<td class="wd-5p">Pinterest</td>
							<td class="wd-5p">Kích hoạt</td>
							<td class="wd-5p text-center">Sửa</td>
							<td class="wd-5p text-center">Xóa</td>
		                </tr>
				      	@foreach ($listSetting as $item)
							<tr id="record_5">
								<td>{{ $item->id }}</td>
					          	<td style="word-break: break-word;">{{ $item->name }}</td>
					          	<td><img width="100" height="100" src="{{ asset('storage/setting/' . $item->logo) }}" ></td>
					          	<td>{{ $item->address1 }}</td>
					          	<td>{{ $item->address2 }}</td>
					          	<td>{{ $item->address3 }}</td>
					          	<td>{{ $item->sup_telephone1 }}</td>
					          	<td>{{ $item->sup_telephone2 }}</td>
					          	<td>{{ $item->sup_telephone3 }}</td>
					          	<td style="word-break: break-word;">{{ $item->email }}</td>
					          	<td style="word-break: break-word;">{{ $item->link_fb }}</td>
					          	<td style="word-break: break-word;">{{ $item->link_yt }}</td>
					          	<td style="word-break: break-word;">{{ $item->link_tt }}</td>
					          	<td style="word-break: break-word;">{{ $item->link_pin }}</td>
					          	<td class="text-center">{{ $item->active }}</td>
					          	<td class="text-center">
					          		<a href="{{route('admin.setting.edit', ['id' => $item->id])}}" class=""><i class="fas fa-edit"></i> Sửa</a>
					          	</td>
					          	<td class="text-center">
									<a style="font-size: 15px; color: red" class="buttonDelteRecord" href="{{route('admin.setting.remove', ['id' => $item->id])}}"><i class="fa fa-times-circle"></i> Xóa</a>
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

