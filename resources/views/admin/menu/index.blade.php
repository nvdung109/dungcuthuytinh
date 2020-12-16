@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.menu')}}">Menu</a>
      <span class="breadcrumb-item active">Danh sách menu</span>
    </nav>
</div>
<div class="br-pagetitle" style="justify-content: space-between;">
	<h4>Danh sách menu</h4>
	<div class=""><a href="{{ route('admin.menu_add') }}" class="btn btn-success">Thêm mới</a></div>
</div>
<div class="br-pagebody">
	<section class="listing-container">
        <div class="br-section-wrapper container-fluid">
			<h6 class="br-section-label">Tìm kiếm</h6>
  	  		<form method="GET" action="">
  	  			<div class="row">
		            <div class="col-lg-2">
		              <input class="form-control" name="keyword" placeholder="Tên" type="text" value="{{ isset($dataSearch['title']) ? $dataSearch['title'] : '' }}">
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
							<td class="wd-10p">Tên</td>
							<td class="wd-10p">Vị trí</td>
							<td class="wd-10p">Link</td>
							<td class="wd-10p">Mở ra</td>
							<td class="wd-10p text-center">Kích hoạt</td>
							<td class="wd-10p text-center">Ngày tạo</td>
							<td class="wd-10p text-center">Sửa</td>
							<td class="wd-10p text-center">Xóa</td>
		                </tr>
				      	@foreach ($menus as $item)
							<tr id="record_{{ $item->mnu_id }}">
					          	<td class="text-center">{{ $loop->index + 1 }}</td>
					          	<td>{{ $item->mnu_name }}</td>
					          	<td>{{ $item->mnu_link }}</td>
					          	<td>@isset($arrPosition[$item->mnu_position]) {{ $arrPosition[$item->mnu_position] }} @endisset</td>
					          	<td>@isset($arrTarget[$item->mnu_target]) {{ $arrTarget[$item->mnu_target] }} @endisset</td>
					          	<td class="text-center">
									<a href="javascript:;" class="box_active" onclick="changeActive('{{ route('admin.menu_status')}}', '{{ $item->mnu_id }}', 'active')">
										@if($item->mnu_active == 1)
											<i class="far fa-check-square" style="font-size: 14px;"></i>
										@else
											<i class="far fa-square" style="font-size: 14px;"></i>
										@endif
									</a>
								</td>
					          	<td class="text-center">{{ date("d/m/y H:i",$item->mnu_create_time) }}</td>
					          	<td class="text-center">
					          		<a href="{{ route('admin.menu_add', ['id' => $item->mnu_id])}}" class=""><i class="fas fa-edit"></i> Sửa</a>
					          	</td>
					          	<td class="text-center">
									<a style="font-size: 15px; color: red" class="buttonDelteRecord" href="{{ route('admin.menu_delete', ['id' => $item->mnu_id]) }}" ><i class="fa fa-times-circle"></i> Xóa</a>
					          	</td>
					        </tr>
				      	@endforeach

		      		</tbody>
		  	  	</table>
		  	</div>

        </div>
    </section>
</div>
@endsection

