@extends('admin.layouts')
@section('CONTAINER')

<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="{{route('admin.news')}}">Tin tức</a>
      <span class="breadcrumb-item active">Thêm mới</span>
    </nav>
</div>
<div class="br-pagetitle">
	<h4>Thêm mới bài viết</h4>
</div>

<div class="br-pagebody">
	<section class="listing-container">
	    <div class="br-section-wrapper container-fluid">
            {{-- @include("admin.error") --}}
            <form role="form" method="POST" action="{{ route('admin.news.add') }}" enctype="multipart/form-data">
            	@csrf
				<div id="myTabContent">
		            <div id="orther">
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Tiêu đề</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Nhập tiêu đề bài viết">
			                    @if($errors->first('title'))
									<span class="text-danger">{{$errors->first('title')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">URL</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <input type="text" name="url" id="slug" value="{{old('url')}}" class="form-control" placeholder="">
			                    @if($errors->first('url'))
									<span class="text-danger">{{$errors->first('url')}}</span>
								@endif
			                </div>
		                </div>
		            	<div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputParent">Danh mục</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                        <select class="form-control" name="new_id">
		                            @foreach($newcate as $item)
                    					<option value="{{$item->id}}">{{$item->name}}</option>
                    				@endforeach
		                        </select>
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="exampleInputFile">Ảnh đại diện</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
		                      	<input type="file" name="image" value="{{old('image')}}" class="form-control">
		                      	@if($errors->first('image'))
									<span class="text-danger">{{$errors->first('image')}}</span>
								@endif
		                    </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mô tả ngắn</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="desc_en" class="form-control " id="editor2">{{old('desc_en')}}</textarea>
			                    @if($errors->first('desc_en'))
									<span class="text-danger">{{$errors->first('desc_en')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Mô tả</label>
		                     <div class="col-sm-10 mg-b-10 mg-sm-b-10">
			                    <textarea name="description" class="form-control " id="editor1">{{old('description')}}</textarea>
			                    @if($errors->first('description'))
									<span class="text-danger">{{$errors->first('description')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label">Kích hoạt</label>
		                	<div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <div class="custom-control custom-checkbox">
			                        <input class="custom-control-input" type="checkbox" id="cat_active" name="active" checked="checked" value="1">
			                        <label class="col-sm-4 form-control-label custom-control-label" for="cat_active"></label>
			                    </div>
			                </div>
		                </div>

		                <hr style="margin-bottom: 15px">
		                <h1>Cấu hình SEO</h1>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Meta title</label>
		                    <div class="col-sm-5 mg-b-10 mg-sm-b-10">
								<input type="text" class="form-control" name="meta_title" value="">
								{{old('meta_title')}}
			                    @if($errors->first('meta_title'))
									<span class="text-danger">{{$errors->first('meta_title')}}</span>
								@endif
			                </div>
		                </div>
		                <div class="row">
		                    <label class="col-sm-2 form-control-label" for="InputUsername">Meta description</label>
		                     <div class="col-sm-5 mg-b-10 mg-sm-b-10">
			                    <textarea class="form-control" name="meta_description"></textarea>
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
	                	<a href="{{ route('admin.news') }}"><button type="" class="btn btn-danger mg-r-20">Hủy</button></a>
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
	<script> CKEDITOR.replace('editor2'); </script>
{{-- 	<script>
        $(document).ready(function(){
            $('.slug-title').on("change",function(){
                var field = $(this).attr('data-slug');
                var title = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    type:'post',
                    url:'/admin/ajax/get-slug',
                    data:{'_token':token,title:title},
                    success:function(html){
                        $('#'+field).val(html);
                        $('.preview_snippet_link span').val(html);
                    }
                })
            });
        });
        $('#status').on('click',function(){
            if($(this).prop('checked')){
              $(this).parent().removeClass('fa-square-o');
              $(this).parent().addClass('fa-check-square-o');       
            }else{
              $(this).parent().addClass('fa-square-o');
              $(this).parent().removeClass('fa-check-square-o');       
            }
        });
    </script> --}}
@endsection