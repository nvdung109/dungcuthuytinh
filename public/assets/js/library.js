function trim(sString)
{
	while (sString.substring(0,1) == ' ')
	{
	sString = sString.substring(1, sString.length);
	}
	while (sString.substring(sString.length-1, sString.length) == ' ')
	{
	sString = sString.substring(0,sString.length-1);
	}
	return sString;
}
function checkblank(str)
{
	if (trim(str)=='')
		return true;
	else
		return false;
}

function formatCurrency(div_id, str_number){
	document.getElementById(div_id).innerHTML = addCommas(str_number);
}
function addCommas(nStr){
	nStr += ''; x = nStr.split(',');	x1 = x[0]; x2 = ""; x2 = x.length > 1 ? ',' + x[1] : ''; var rgx = /(\d+)(\d{3})/; while (rgx.test(x1)) { x1 = x1.replace(rgx, '$1' + '.' + '$2'); } return x1 + x2;
}

function changeActive(url, record_id, type){
	if(url == "" || record_id <= 0 || type == "") return false;
	var html 	= $("#record_" + record_id + " .box_" + type).html();
	$("#record_" + record_id + " .box_" + type).html('<i class="fas fa-spinner fa-spin"></i>');
	$.ajax({
		url: url,
		type: 'POST',
		data: {record_id: record_id, type: type},
		success: function(data){
			if(data.status == true){
				if(data.data == 1){
					html = '<i class="far fa-check-square" style="font-size: 14px;"></i>';
				}else{
					html = '<i class="far fa-square" style="font-size: 14px;"></i>';
				}
				$("#record_" + record_id + " .box_" + type).html(html);
			}else{
				$("#record_" + record_id + " .box_" + type).html(html);
				alert(data.msg);
			}
		},
		dataType: 'json'
	})
}


function setAvatar(id_upload, picture, width, height){
	var item_upload = $("#" + id_upload).attr('itemUpload');
	$('#' + item_upload).val(picture);
}
// Drag images
// Function upload file
function sendFileToServer(id_upload, formData, status, name_data){

	uploadURL 		= urlUpload;
	var maxUpload 	= $("#" + id_upload).attr('maxUpload');
	if(maxUpload > 1){
		if($("#" + id_upload + " .listimg li").length >= maxUpload){
			alert('Đã vượt quá số lượng ảnh tối đa: ' + maxUpload);
			return false;
		}
	}
	var jqXHR		= $.ajax({
								xhr: function() {
					            var xhrobj = $.ajaxSettings.xhr();
					            if (xhrobj.upload) {
										xhrobj.upload.addEventListener('progress', function(event) {
											var percent		= 0;
											var position	= event.loaded || event.position;
											var total		= event.total;
										   if (event.lengthComputable) {
										      percent	= Math.ceil(position / total * 100);
										   }
										   //Set progress
										   status.setProgress(percent);
										}, false);
									}
					            return xhrobj;
					        	},
								url			: uploadURL,
								type			: "POST",
								processData	: false,
								contentType: false,
								cache			: false,
								data			: formData,
								success		: function(data){

									if(data.status == true && data.filename != ""){
										status.setProgress(100);
										setTimeout(function(){
										   status.statusbar.hide();
										}, 2000);

										var classAdd = '';
										var item_upload = $("#" + id_upload).attr('itemUpload');
										var item_upload_val = $('#' + item_upload).val();

										if(maxUpload == 1 || item_upload_val == '') setAvatar(id_upload, data.filename);
										if(item_upload_val == ''){
											if(maxUpload > 1) classAdd	= "active";
										}

										if(maxUpload <= 1){
											$("#" + id_upload + " .listimg").html("<li class='" + classAdd + "'><span class='delete' title='Xóa ảnh' onclick='deleteGallery(\"" + id_upload + "\", this)'>x</span><input type='hidden' name='" + name_data + "[]' value='"+data.filename+"' /><img src='" + data.url + "' title='Chọn làm ảnh đại diện' onclick='setAvatar(\"" + id_upload + "\", \"" + data.filename + "\",\"" + data.width + "\",\"" + data.height + "\")'></li>");
										}else{
											$("#" + id_upload + " .listimg").append("<li class='" + classAdd + "'><span class='delete' title='Xóa ảnh' onclick='deleteGallery(\"" + id_upload + "\", this)'>x</span><input type='hidden' name='" + name_data + "[]' value='"+data.filename+"' /><img src='" + data.url + "' title='Chọn làm ảnh đại diện' onclick='setAvatar(\"" + id_upload + "\", \"" + data.filename + "\",\"" + data.width + "\",\"" + data.height + "\")'></li>");
										}

										$("#" + id_upload + " .listimg li").click(function(){
											$("#" + id_upload + " .listimg li").removeClass('active');
											$(this).addClass('active');
										});
									}else{
										if(data.msg != ""){
											$("#" + id_upload + " .error_msg").append(data.msg);
										}
									}
					        	},
					        	dataType: "json"
					    });
}

function createStatusbar(id_upload){

	this.statusbar		= $("<div class='status_bar'></div>");
	//this.filename		= $("<div class='filename'></div>").appendTo(this.statusbar);
	//this.size			= $("<div class='filesize'></div>").appendTo(this.statusbar);
	//this.progressBar	= $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);

	$("#" + id_upload + " .status_upload").append(this.statusbar);
	this.setFileNameSize   = function(name,size){
		var sizeStr	="";
		var sizeKB	= size / 1024;
		if(parseInt(sizeKB) > 1024){
			var sizeMB	= sizeKB/1024;
			sizeStr		= sizeMB.toFixed(2) + " MB";
		}else{
			sizeStr	= sizeKB.toFixed(2) + " KB";
		}

		//this.filename.html("<b>File name:</b> " + name);
		//this.size.html("<b>File size:</b> " + sizeStr);
	}

	this.setProgress = function(progress){
		//var progressBarWidth	= progress*this.progressBar.width()/ 100;
		//this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "%&nbsp;&nbsp;");
	}
	this.setAbort = function(jqxhr){
		var sb = this.statusbar;
		this.abort.click(function(){
			jqxhr.abort();
			sb.hide();
		});
	}
}

function handleFileUpload(id_upload, files, obj, uploadType, name_data){
	imgUploaded 		= 0;
	imgFirstUpload 	= 0;
	var stt 	= 0;
	var _length_file	= files.length;
	if(_length_file > 10) _length_file = 10;

	$("#" + id_upload + " .error_msg").html("");
	for (var i = 0; i < _length_file; i++){
		var fd 	= new FormData();
		fd.append('Filedata', files[i]);
		fd.append('uploadType', uploadType);
		var status 	= new createStatusbar(id_upload); //Using this we can set progress.
		status.setFileNameSize(files[i].name,files[i].size);
		sendFileToServer(id_upload, fd,status,name_data);
   }
}


function deleteGallery(id_upload, item){
	// Nếu trùng với cái đã chọn thì xóa nốt
	var item_upload 	= $("#" + id_upload).attr('itemUpload');
	var data_item 		= $(item).parent().find('input').val();
	if(data_item == $("#" + item_upload).val()) $("#" + item_upload).val('');

	$(item).parent().hide(300).remove();
}