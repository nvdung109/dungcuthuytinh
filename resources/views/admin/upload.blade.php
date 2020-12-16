<div id="{{ $id_upload }}" maxUpload="{{ $max_upload }}" itemUpload="{{ $item_upload }}" class="gallery_upload_file @isset($class_add) {{  $class_add }} @endisset fl">
	<div class="dragandrophandler" style="padding: 5px; border: 2px dashed #ddd;">
		<div class="error_msg" style="padding: 5px 10px; overflow: hidden; text-align: left; color: #FF0001; font-size: 12px; font-style: italic;"></div>
		<div class="d-flex" style="justify-content: center">
			<i class="fas fa-cloud-upload-alt" style="font-size: 40px; color: #24b909;"></i>
			<div style="margin-left: 10px;">
				<h4>Kéo ảnh vào đây hoặc</h4>
				<div style="margin: 0 auto; text-align: center; line-height: 25px; position: relative; background: #efefef; width: 120px; height: 30px; border: 1px solid #ddd; cursor: pointer;">
					<span style="font-size: 13px;">Chọn tệp</span>
					<input type="file" class="chose_file_upload" @isset($multiple) multiple="multiple" @endisset size="1" class="btn btn-success" style="position: absolute; top :0px; width: 100%; height: 100%; opacity: 0; font-size: 0px;" style="display: block; cursor: pointer;">
				</div>
			</div>
		</div>
		<div class="status_upload"></div>
	</div>
	<ul class="listimg">
		@isset($arrGallery)
			@foreach ($arrGallery as $key => $value)
				<li class='@isset($value["is_main"]) @if($value["is_main"]==1) active @endif @endisset' >
					<span class="delete" title="Xóa ảnh" onclick="deleteGallery('{{ $id_upload }}', this)">x</span>
					<input type="hidden" name="{{ $name_data }}[]" value="{{ $value['filename'] }}" />
					<img src="{{ $value['url'] }}" title="Chọn làm ảnh đại diện" onclick="setAvatar('{{ $id_upload }}', '{{ $value['filename'] }}')">
				</li>
			@endforeach
		@endisset
	</ul>
</div>
<style type="text/css">
	.gallery_upload_file.d-flex .listimg{
		padding-left: 10px;
	}
	.listimg{
		margin: 10px 0px;
		padding: 0px;
	}
	.listimg li{
		position: relative;
		list-style: none;
		display: inline-block;
		padding: 4px;
		border: 1px solid #dcdcdc;
		margin-right: 15px;
	}
	.listimg li.active{
		border: 2px solid #00af0d;
	}
	.listimg li img{
		height: 50px;
	}
	.listimg li input[type=checkbox]{
		position: absolute;
		top: -10px;
		right: -5px;
	}
	.dragandrophandler{
		width: 350px;
		border: 1px dotted #0B85A1;
		color: #92AAB0;
		vertical-align:middle;
		padding:10px 10px 10 10px;
		margin-bottom:10px;
		font-size: 100%;
		position: relative;
		cursor: pointer;
	}
	.dragandrophandler h4{
		font-size: 13px;
		margin-bottom: 5px;
	}
	.dragandrophandler input[type="file"]{
		width: 80px;
		height: 30px;
		position: absolute;
		top: 0px;
		left: 0px;
		display: block;
		opacity: 0;
		z-index: 10;
		cursor: pointer;
	}
	.dragandrophandler span{
		height: 30px;
		line-height: 30px;
		text-align: center;
	}
	.progressBar {
		width: 100%;
		height: 10px;
		border: 1px solid #ddd;
		border-radius: 5px;
		overflow: hidden;
		display:inline-block;
		margin: 0px;
		vertical-align: middle;
		margin-right: 5px;
	}

	.progressBar div {
		height: 100%;
		color: #fff;
		text-align: right;
		line-height: 10px; /* same as #progressBar height if we want text middle aligned */
		width: 0;
		background-color: #0ba1b5;
		border-radius: 3px;
		font-size: 9px;
	}
	.statusbar{
	    border-top:1px solid #A9CCD1;
	    min-height: 25px;
	    width: 320px;
	    padding: 5px 5px 0px 5px;
	    vertical-align:top;
	}
	.statusbar:nth-child(odd){
	    background:#EBEFF0;
	}
	.filename{
		vertical-align:top;
		width: 300px;
		font-size: 11px;
	}
	.filesize{
		font-size: 11px;
		vertical-align:top;
		color:#30693D;
		width:300px;
	}
	.abort{
		background-color:#A8352F;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
		border-radius: 4px;
		display:inline-block;
		color: #fff;
		font-size:12px;font-weight:normal;
		padding: 0px 15px;
		cursor:pointer;
		height: 18px;
		line-height: 18px;
		font-size: 11px;
	}
	.listimg li .delete{
		position: absolute;
		top: -7px;
		left: -6px;
		z-index: 10;
		background: red;
		padding: 0px 4px;
		display: block;
		color: #FFFFFF;
		font-size: 10px;
		border-radius: 3px;
		cursor: pointer;
	}
</style>
@section('JS_FOOTER')
	@parent
	<script type="text/javascript">
		$(function(){

			$("#{{ $id_upload }} .listimg li img").click(function(){
				$("#{{ $id_upload }} .listimg li").removeClass('active');
				$(this).parent().addClass('active');
			});

			var obj = $("#{{ $id_upload }} .dragandrophandler");
			// Khi kéo file vào (chưa thả)
			obj.on('dragenter', function (e){
				e.stopPropagation();
				e.preventDefault();
				$(this).css('border', '2px dashed #3be314');
			});

			obj.on('dragover', function (e){
				e.stopPropagation();
				e.preventDefault();
			});

			// Khi thả file vào
			obj.on('drop', function (e){
				$(this).css('border', '2px dashed #dcdcdc');
				e.preventDefault();
				var files = e.originalEvent.dataTransfer.files;
				//We need to send dropped files to Server
				handleFileUpload('{{ $id_upload }}', files, obj, '{{ $type_upload }}');
			});

			$(document).on('dragenter', function (e){
				e.stopPropagation();
				e.preventDefault();
			});

			$(document).on('dragover', function (e){
				e.stopPropagation();
				e.preventDefault();
				obj.css('border', '2px dashed red');
			});

			$(document).on('drop', function (e){
			    e.stopPropagation();
			    e.preventDefault();
			});

			$("#{{ $id_upload }} .chose_file_upload").on("change", function(e){
				var files 	= this.files;
				//We need to send dropped files to Server
				handleFileUpload('{{ $id_upload }}', files, obj, '{{ $type_upload }}', '{{ $name_data }}');
			});
		});
	</script>
@endsection