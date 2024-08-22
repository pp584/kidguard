
var Users = {

	current_page : 0,
	current_path : '',

	// load preview to modal
	loadPreview: function(id){
		$.ajax({
			method: 'GET',
			url: site_url('users/users/preview/'+ id),
			success: function (results) {
				$('#divPreview').html(results);
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
			}
		});
		$('#modalPreview').modal('show');
	},



	validateFormEdit: function(){
		if($('#edit_remark').val().length < 5){
				notify('กรุณาระบุเหตุผล', 'เหตุผลการแก้ไขจะต้องระบุให้ชัดเจน', 'warning', 'center', 'bottom');
		}else{
				this.saveEditForm();
		}
		return false;
	},

	saveFormData: function(){
		var frm_action = site_url('users/users/save');
		var obj = $('#btnConfirmSave');
		if(loading_on(obj) == true){

			if(!$('#post_iframe').attr('id')){
				var iframe = $('<iframe name="post_iframe" id="post_iframe" style="display: none"></iframe>');
				$("body").append(iframe);
			}

			var form = $('#formAdd');

			form.attr("action", frm_action);
			form.attr("method", "post");

			form.attr("encoding", "multipart/form-data");
			form.attr("enctype", "multipart/form-data");

			form.attr("target", "post_iframe");

			$('[name="'+ csrf_token_name +'"]').val($.cookie(csrf_cookie_name));


			form.submit();

			var c = 0;
			$("#post_iframe").on('load',function() {
				c++;
				if(c==1){

					iframeContents = this.contentWindow.document.body.innerHTML;
					var json_string = iframeContents.toString();
					if(json_string != ""){
						json_string = $("<div/>").html(json_string).text();
						try
						{
							var results = jQuery.parseJSON( json_string );
							if(results.is_successful){
								notify('แจ้งเตือน', 'บันทึกข้อมูลหลักเรียบร้อย ดำเนินการในขั้นตอนต่อไป', 'success', 'center');
								$("#frmUploadDetail :input").attr("disabled", false);

							}else{
								notify('เพิ่มข้อมูล', results.message, 'danger', 'center');
							}

							loading_on_remove(obj);

						}
						catch(err)
						{
							alert('Invalid json : ' + err + "\n\n" + json_string);
							loading_on_remove(obj);
						}
					}else{
						alert('การดำเนินการล้มเหลว กรุณาลองใหม่อีกครั้ง');
						loading_on_remove(obj);
					}
				}
			});
		}
		return false;
	},

	saveEditForm: function(){
		$('#editModal').modal('hide');
		var frm_action = site_url('users/users/update');

		if(!$('#post_iframe').attr('id')){
			var iframe = $('<iframe name="post_iframe" id="post_iframe" style="display: none"></iframe>');
			$("body").append(iframe);
		}

		var obj = $('#btnSaveEdit');
		if(loading_on(obj) == true){

			if(!$('#temp_edit_remark').attr('id')){
				$('<input />').attr('type', 'hidden')
								.attr('id', 'temp_edit_remark')
								.attr('name', 'edit_remark')
								.attr('value', $('#edit_remark').val())
								.appendTo('#formEdit');
			}else{
					$('#temp_edit_remark').val($('#edit_remark').val());
			}

			var form = $('#formEdit');

			form.attr("action", frm_action);
			form.attr("method", "post");

			form.attr("encoding", "multipart/form-data");
			form.attr("enctype", "multipart/form-data");

			form.attr("target", "post_iframe");

			$('[name="'+ csrf_token_name +'"]').val($.cookie(csrf_cookie_name));

			form.submit();

			var c = 0;
			$("#post_iframe").on('load',function() {
				c++;
				if(c==1){

					iframeContents = this.contentWindow.document.body.innerHTML;
					var json_string = iframeContents.toString();
					if(json_string != ""){
						json_string = $("<div/>").html(json_string).text();
						try
						{
							var results = jQuery.parseJSON( json_string );
							if(results.is_successful){
								notify('แจ้งเตือน', 'บันทึกข้อมูลหลักเรียบร้อย ดำเนินการในขั้นตอนต่อไป', 'success', 'center');
								$("#frmUploadDetail :input").attr("disabled", false);

							}else{
								notify('เพิ่มข้อมูล', results.message, 'danger', 'center');
							}

							loading_on_remove(obj);

						}
						catch(err)
						{
							alert('Invalid json : ' + err + "\n\n" + json_string);
						}
					}else{
						alert('การดำเนินการล้มเหลว กรุณาลองใหม่อีกครั้ง');
						loading_on_remove(obj);
					}
				}
			});
		}
		return false;
	},

	confirmDelete: function (pUserid,  irow){
		$('[name="encrypt_userid"]').val(pUserid);

		$('#xrow').text('['+ irow +']');
		var my_thead = $('#row_' + irow).closest('table').find('th:not(:first-child):not(:last-child)');
		var th = [];
		my_thead.each (function(index) {
			th.push($(this).text());
		});

		var active_row = $('#row_' + irow).find('td:not(:first-child):not(:last-child)');
		var detail = '<table class="table table-striped">';
		active_row.each (function(index) {
				detail += '<tr><td align="right"><b>' + th[index] + ' : </b></td><td> ' + $(this).html() + '</td></tr>';
		});
		detail += '</table>';
		$('#div_del_detail').html(detail);

		$('#confirmDelModal').modal('show');
	},

	// delete by ajax jquery
	deleteRecord: function(){
		var frm_action = site_url('users/users/del');
		var frm_data = $('#formDelete').serialize();
		frm_data += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		var obj = $('#btn_confirm_delete');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data : frm_data,
			success: function (results) {
				if(results.is_successful){
					alert_type = 'success';
					setTimeout(function(){
						$(window.location).attr('href', site_url(Users.current_path));
					}, 500);
				}else{
					alert_type = 'danger';
				}
				notify('ลบรายการ', results.message, alert_type, 'center');
				loading_on_remove(obj);
			},
				error : function(jqXHR, exception){
				loading_on_remove(obj);
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	},

	readExcel: function(){
		var frm_action = site_url('users/users/read_excel');
		var obj = $('#btnReadExcel');
		if(loading_on(obj) == true){

			if(!$('#post_iframe_import').attr('id')){
				var iframe = $('<iframe name="post_iframe_import" id="post_iframe_import" style="display: none"></iframe>');
				$("body").append(iframe);
			}

			var form = $('#formImport');

			form.attr("action", frm_action);
			form.attr("method", "post");

			form.attr("encoding", "multipart/form-data");
			form.attr("enctype", "multipart/form-data");

			form.attr("target", "post_iframe_import");

			$('[name="'+ csrf_token_name +'"]').val($.cookie(csrf_cookie_name));

			form.submit();

			var c = 0;
			$("#post_iframe_import").on('load',function() {
				c++;
				if(c==1){

					iframeContents = this.contentWindow.document.body.innerHTML;
					var json_string = iframeContents.toString();
					if(json_string != ""){
						json_string = $("<div/>").html(json_string).text();
						try
						{
							var results = jQuery.parseJSON( json_string );
							if(results.is_successful){
								notify('การนำเข้าข้อมูล Excel', 'ดำเนินการในขั้นตอนต่อไป', 'info', 'center');
								
								var decoded = $("<div/>").html(results.table_list).text();
								$('#tbody_import_list').html(decoded);
								
								jumpto('#tbody_import_list');
								$('#btnSaveExcel').removeClass('d-none').show();
							}else{
								notify('นำเข้าข้อมูล Excel ผิดพลาด', results.message, 'danger', 'center');
							}

							loading_on_remove(obj);

						}
						catch(err)
						{
							alert('Invalid json : ' + err + "\n\n" + json_string);
							loading_on_remove(obj);
						}
					}else{
						alert('การดำเนินการล้มเหลว กรุณาลองใหม่อีกครั้ง');
						loading_on_remove(obj);
					}
				}
			});
		}
		return false;
	},
	
	saveExcel: function(){
		var frm_action = site_url('users/users/save_excel_data');
		var obj = $('#btnSaveExcel');
		if(loading_on(obj) == true){
		
			var frm_data = $('#frmImportList').serializeObject();
			frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);
			
			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data : frm_data,
				success: function (results) {

					if(results.is_successful){
						alert_type = 'success';
						goto_page('users/users');
					}else{
						alert_type = 'danger';
					}
					notify('บันทึกข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);
				},
				error : function(jqXHR, exception){
					ajaxErrorMessage(jqXHR, exception);
						loading_on_remove(obj);
				}
			});
		}
	},
	
		
	validateSaveExcel: function(){
		var message = '';
		
		
			var count_prefix = $('#frmImportList input[name^="prefix["]').filter(function(){
				return !$(this).val();
			}).length;
			
			if(count_prefix > 0){
				message += "- ไม่พบรหัสอ้างอิง คำนำหน้า " + count_prefix + " รายการ \n";
			}
				
			var count_level = $('#frmImportList input[name^="level["]').filter(function(){
				return !$(this).val();
			}).length;
			
			if(count_level > 0){
				message += "- ไม่พบรหัสอ้างอิง สิทธิ์การใช้งาน " + count_level + " รายการ \n";
			}
				
			var count_username = $('#frmImportList input[name^="username["]').filter(function(){
				return !$(this).val();
			}).length;
			
			if(count_username > 0){
				message += "<br/>- ข้อมูล ชื่อผู้ใช้งาน ซ้ำกัน " + count_username + " รายการ \n";
			}
				
			var count_email = $('#frmImportList input[name^="email["]').filter(function(){
				return !$(this).val();
			}).length;
			
			if(count_email > 0){
				message += "<br/>- ข้อมูล อีเมล ซ้ำกัน " + count_email + " รายการ \n";
			}
				
		
		if(message == ''){
			this.saveExcel();
		}else{
			notify('กรุณาตรวจสอบข้อมูล', message, 'danger', 'center', 'bottom');
		}
		return false;
	},
			
}

$(document).ready(function() {

	$(document).on('change','#set_order_by',function(){
		$('input[name="order_by"]').val($(this).val());
		$('button[name="submit"]').click();
	});

	$(document).on('click', '#btnReadExcel', function() {
		Users.readExcel();
	});
		
	$(document).on('change', '#FileUpload', function() {
		$('#btnSaveExcel').hide();
		$('#tbody_import_list').html('');
	});
		
	$(document).on('click', '#btnSaveExcel', function() {
		return Users.validateSaveExcel();
	});
		
	$('#photo').change(function(){
		var msg = '';
		var elem_preview = $(this).data('elem-preview');
		var elem_label = $(this).data('elem-label');
		if(this.value == ''){
			msg = 'กรุณาเลือกไฟล์ที่ต้องการอัพโหลด';
		}else{
			msg = this.value;
			previewPicture(this, '#' + elem_preview);
		}
		$('#' + elem_label).val(msg);
	});

	$('#FileUpload').change(function(){
		var msg = '';
		var elem_preview = $(this).data('elem-preview');
		var elem_label = $(this).data('elem-label');
		if(this.value == ''){
			msg = 'กรุณาเลือกไฟล์ที่ต้องการอัพโหลด';
		}else{
			msg = this.value;
			previewPicture(this, '#' + elem_preview);
		}
		$('#' + elem_label).val(msg);
	});

	$('#editModal').on('shown.bs.modal', function () {
		$('#edit_remark').focus();
	});

	$('#btnSave').click(function() {
		$('#addModal').modal('hide');
		Users.saveFormData();
		return false;
	});//click

	$('#btnSaveEdit').click(function() {
		return Users.validateFormEdit();
	});//click

	$(document).on('keypress','#edit_remark',function(e) {
	if(isEnter(e)) {
        return Users.validateFormEdit();
    }
	});//click

	//List view
	if(typeof param_search_field != 'undefined'){
		$('select[name="search_field"] option[value="'+ param_search_field +'"]').attr('selected','selected');
	}

	if(typeof param_current_page != 'undefined'){
		Users.current_page = Math.abs(param_current_page);
	}

	if(typeof param_current_path != 'undefined'){
		Users.current_path = param_current_path;
	}

	$(document).on('click','.btn-delete-row', function(){
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pUserid = $(this).attr('data-userid');

		Users.confirmDelete(pUserid,  row_num);
	});//click

	$(document).on('click','#btn_confirm_delete', function(){
		Users.deleteRecord();
	});
	setDropdownList('#prefix');
	setDropdownList('#level');
	setDropdownList('#department_id');
	setDropdownList('#province_id');
	

	//Set default value
	var order_by = $('#set_order_by').attr('value');
	$('#set_order_by option[value="'+order_by+'"]').prop('selected', true);
	
	//Set default selected
	$("input[type='radio']").prop( "checked", function() {
		return $(this).val() == $(this).data('record-value');
	});
	setDatePicker('.datepicker');

});
