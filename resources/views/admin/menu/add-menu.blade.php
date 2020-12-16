@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.menu')}}">Menu</a>
      <span class="breadcrumb-item active">Thêm mới</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Thêm mới Menu</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            @include("admin.error")
            <form role="form" method="post" action="" enctype="multipart/form-data">
            	@csrf
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	                <div class="row">
	                    <label class="col-sm-2 form-control-label" for="InputParent">Vị trí</label>
	                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
	                        <select class="form-control" name="position" id="position" onchange="window.location.href='{{ route('admin.menu_add') }}?position='+this.value" @if($data['id'] > 0) disabled="disabled" @endif>
								<option value="">--Chọn vị trí menu--</option>
								@foreach($arrPosition as $key => $value)
									<option value="{{ $key }}" @if($data['position'] == $key) selected="selected" @endif>{{ $value }}</option>
								@endforeach
							</select>
	                    </div>
	                </div>
	                <div class="row">
	                    <label class="col-sm-2 form-control-label" for="InputUsername">Tên (*)</label>
	                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    <input type="text" name="name" value="{{ $data['name'] }}" class="form-control" placeholder="Nhập tên">
		                </div>
	                </div>

	                <div class="row">
	                    <label class="col-sm-2 form-control-label" for="InputUsername">Link menu (*)</label>
	                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    <input type="text" name="link" value="{{ $data['link'] }}" class="form-control" placeholder="Nhập link">
		                </div>
	                </div>
	                <div class="row">
	                    <label class="col-sm-2 form-control-label" for="InputUsername">Mở ra</label>
	                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                   <select class="form-control" name="target" id="target">
							@foreach($arrTarget as $key => $value)
								<option value="{{ $key }}" @if($data['target'] == $key) selected="selected" @endif>{{ $value }}</option>
							@endforeach
						</select>
		                </div>
	                </div>
	                <div class="row">
	                    <label class="col-sm-2 form-control-label" for="InputUsername">Menu cha</label>
	                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                   <select class="form-control" name="parent_id" id="parent_id">
								<option value="">--Chọn menu cha--</option>
								@foreach($allMenu as $key => $value)
									<option value="{{ $key }}" @if($data['id'] == $key) disabled="disabled" @endif @if($data['parent_id'] == $key) selected="selected" @endif>
										@for ($i = 0; $i < $value['level']; $i++)
											---
										@endfor
										{{ $value['mnu_name'] }}
									</option>
								@endforeach
							</select>
		                </div>
	                </div>
	                <div class="row">
	                    <label class="col-sm-2 form-control-label" for="InputUsername">Order</label>
	                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
							<input type="text" class="form-control" name="order" value="{{ $data['order'] }}">
		                </div>
	                </div>
	                <div class="row">
	                    <label class="col-sm-2 form-control-label">Kích hoạt</label>
	                	<div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                    <div class="custom-control custom-checkbox">
		                        <input class="custom-control-input" type="checkbox" id="cat_active" name="active" @if($data['active'] == 1) checked="checked" @endif value="1">
		                        <label class="col-sm-4 form-control-label custom-control-label" for="cat_active"></label>
		                    </div>
		                </div>
	                </div>
	            </div>

                <!-- /.card-body -->
                <div class="row mg-t-20">
                	<div class="col-sm-2 mg-b-10"></div>
                	<div class="col-sm-5 mg-b-10 mg-sm-b-10">
                		<input type="hidden" name="action" value="execute">
	                	<button type="reset" class="btn btn-warning mg-r-20">Làm lại</button>
	                    <button type="submit" class="btn btn-primary">@if($data['id'] > 0) Cập nhật @else Thêm mới @endif</button>
	                </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection