
var Teacher = {

	current_page : 0,

	// load preview to modal
	loadPreview: function(id){
		$.ajax({
			method: 'GET',
			url: site_url('demo/teacher/preview/'+ id),
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
		var frm_action = site_url('demo/teacher/save');
		var obj = $('#btnConfirmSave');
		if(loading_on(obj) == true){


			var fdata = $('#formAdd').serialize();
			fdata += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data : fdata,
				success: function (results) {

					if(results.is_successful){
						alert_type = 'success';
						$('#formAdd')[0].reset();
					}else{
						alert_type = 'danger';
					}
						notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
						loading_on_remove(obj);
					},
				error : function(jqXHR, exception){
					ajaxErrorMessage(jqXHR, exception);
						loading_on_remove(obj);
				}
			});
		}
		return false;
	},

	saveEditForm: function(){
		$('#editModal').modal('hide');
		var frm_action = site_url('demo/teacher/update');

		var fdata = $('#formEdit').serialize();
		fdata += '&edit_remark=' + $('#edit_remark').val();
		fdata += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);

		var obj = $('#btnSaveEdit');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data : fdata,
			success: function (results) {

				if(results.is_successful){
					alert_type = 'success';
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
	},

	confirmDelete: function (pId,  irow){
		$('[name="encrypt_id"]').val(pId);

		var my_thead = $('#row_' + irow).closest('table').find('th:not(:first-child):not(:last-child)');
		var th = [];
		my_thead.each (function(index) {
			th.push($(this).text());
		});

		var active_row = $('#row_' + irow).find('td:not(:first-child):not(:last-child)');
		var detail = '<table class="table table-striped">';
		active_row.each (function(index) {
				detail += '<tr><td align="right"><b>' + th[index] + ' : </b></td><td> ' + $(this).text() + '</td></tr>';
		});
		detail += '</table>';
		$('#div_del_detail').html(detail);

		$('#confirmDelModal').modal('show');
	},

	// delete by ajax jquery
	deleteRecord: function(){
		var frm_action = site_url('demo/teacher/del');
		var fdata = $('#formDelete').serialize();
		fdata += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		var obj = $('#btn_confirm_delete');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data : fdata,
			success: function (results) {
				if(results.is_successful){
					alert_type = 'success';
					setTimeout(function(){
						$(window.location).attr('href', site_url('demo/teacher/index/'+ this.current_page));
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

}

$(document).ready(function() {

	$('#btnSave').click(function() {
		$('#addModal').modal('hide');
		Teacher.saveFormData();
		return false;
	});//click

	$('#btnSaveEdit').click(function() {
		return Teacher.validateFormEdit();
	});//click

	//List view
	if(typeof param_search_field != 'undefined'){
		$('select[name="search_field"] option[value="'+ param_search_field +'"]').attr('selected','selected');
	}

	if(typeof param_current_page != 'undefined'){
		Teacher.current_page = Math.abs(param_current_page);
	}


	$(document).on('click','.btn-delete-row', function(){
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pId = $(this).attr('data-id');

		Teacher.confirmDelete(pId,  row_num);
	});//click

	$(document).on('click','#btn_confirm_delete', function(){
		Teacher.deleteRecord();
	});

	//Set default selected
	$("input[type='radio']").prop( "checked", function() {
		return $(this).val() == $(this).data('record-value');
	});
});
