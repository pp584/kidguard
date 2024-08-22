
var ServiceTimeDistance = {

	current_page : 0,
	current_path : '',

	// load preview to modal
	loadPreview: function(id){
		$.ajax({
			method: 'GET',
			url: site_url('services/service_time_distance/preview/'+ id),
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
		var frm_action = site_url('services/service_time_distance/save');
		var obj = $('#btnConfirmSave');
		if(loading_on(obj) == true){


			var frm_data = $('#formAdd').serializeObject();
			frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data : frm_data,
				success: function (results) {

					if(results.is_successful){
						alert_type = 'success';
					}else{
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if(results.is_successful){
						$("#frmUploadDetail").attr('title', '');
						$("#frmUploadDetail").css('background-color', '');
						$('#btnConfirmSave').removeClass('btn-primary ').addClass('btn-light success-save');
						$('#add_encrypt_id').val(results.encrypt_id);

						$('#detail_ref_service_information_id').val(results.service_information_id_encrypt_id);
						$('#detail_service_information_id').val(results.service_information_id_encrypt_id);

						$('#btnGotoEdit').attr('href', site_url('services/service_time_distance/edit/'+ encodeURIComponent(results.encrypt_id)));
						$('#btnGotoEdit, #btnAddListDialog, #btnImportListDialog').show();

						$('#btnConfirmSave').hide().removeClass('btn-primary ').addClass('btn-light success-save');
					}
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
		var frm_action = site_url('services/service_time_distance/update');

		var frm_data = $('#formEdit').serializeObject();
		frm_data['edit_remark'] = $('#edit_remark').val();
		frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);

		var obj = $('#btnSaveEdit');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data : frm_data,
			success: function (results) {

				if(results.is_successful){
					alert_type = 'success';
				}else{
					alert_type = 'danger';
				}

				notify('บันทึกข้อมูล', results.message, alert_type, 'center');
				loading_on_remove(obj);

				if(results.is_successful){
					$("#frmUploadDetail").attr('title', '');
					$("#frmUploadDetail").css('background-color', '');
					$('#btnConfirmSave').removeClass('btn-primary ').addClass('btn-light success-save');
					$('#add_encrypt_id').val(results.encrypt_id);
					$('#btnGotoEdit').attr('href', site_url('services/service_time_distance/edit/'+ encodeURIComponent(results.encrypt_id)));
					$('#btnGotoEdit, #btnAddListDialog, #btnImportListDialog').show();

					$('#btnConfirmSave').hide().removeClass('btn-primary ').addClass('btn-light success-save');
				}
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
				loading_on_remove(obj);
			}
		});
	},

	confirmDelete: function (pServiceInformationId,  irow){
		$('[name="encrypt_service_information_id"]').val(pServiceInformationId);

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
		var frm_action = site_url('services/service_time_distance/del');
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
						$(window.location).attr('href', site_url(ServiceTimeDistance.current_path));
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


	openAddListDialog: function(){
		$('#formAddList').attr('action', site_url('services/service_time_distance/save_detail_list'));
		ServiceTimeDistance.resetAddFormList();

		$('#addListModal').modal('show');
	},

	resetAddFormList: function(){
		$('#detail_encrypt_id').val(''); 
		$('#detail_incident_time').val('').attr('value','');
		$('#detail_incident_time_recrive').val('').attr('value','');
		$('#detail_time_order').val('').attr('value','');
		$('#detail_base_time_start').val('').attr('value','');
		$('#detail_base_time_stop').val('').attr('value','');
		$('#detail_time_of_leaving').val('').attr('value','');
		$('#detail_time_to_hospital').val('').attr('value','');
		$('#detail_base_time_finish').val('').attr('value','');
		$('#detail_distance_base_scene').val('').attr('value','');
		$('#detail_distance_to_hospital').val('').attr('value','');


	},

	saveDetailList: function(){
		var obj = $('#btnConfirmSaveList');
		if(loading_on(obj) == true){

		var frm_action = $('#formAddList').attr('action');
		var frm_data = $('#formAddList').serializeObject();
		frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data : frm_data,
				success: function (results) {

					if(results.is_successful){
						alert_type = 'success';

						ServiceTimeDistance.loadDetailList($('[name="encrypt_service_information_id"]').val());

						$('#formAddList')[0].reset();
						$('#addListModal').modal('hide');
					}else{
						alert_type = 'danger';
					}
					notify('เพิ่มรายการ', results.message, alert_type, 'center');
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

	confirmDeleteList: function (pItmeDistanceId,  irow){
		$('#detail_del_encrypt_itme_distance_id').val(pItmeDistanceId);

		$('#xrow').text('['+ irow +']');
		var my_thead = $('#list_row_' + irow).closest('table').find('th:not(:first-child):not(:last-child)');
		var th = [];
		my_thead.each (function(index) {
			th.push($(this).text());
		});

		var active_row = $('#list_row_' + irow).find('td:not(:first-child):not(:last-child)');
		var detail = '<table class="table table-striped">';
		active_row.each (function(index) {
				detail += '<tr><td align="right"><b>' + th[index] + ' : </b></td><td> ' + $(this).html() + '</td></tr>';
		});
		detail += '</table>';
		$('#div_del_list_detail').html(detail);

		$('#confirmDelListModal').modal('show');
	},

	// delete by ajax jquery
	deleteRecordList: function(){
		var frm_action = site_url('services/service_time_distance/del_list');
		var frm_data = $('#formDeleteList').serialize();
		frm_data += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		var obj = $('#btn_confirm_delete_list');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data : frm_data,
			success: function (results) {
				if(results.is_successful){
					alert_type = 'success';
					$('#confirmDelListModal').modal('hide');
					ServiceTimeDistance.loadDetailList($('[name="encrypt_service_information_id"]').val());
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

	previewDetailRecord: function (pItmeDistanceId,  irow){
		$('[name="encrypt_itme_distance_id"]').val(pItmeDistanceId);

		$('#detailPreviewModal').modal('show');
	},

	editDetailRecord: function (pItmeDistanceId,  irow, url_encrypt_id){
		$('#formAddList')[0].reset();
		$.ajax({
			method: 'GET',
			url: site_url('services/service_time_distance/edit_list/'+ url_encrypt_id),
			success: function (json_string) {
				try
				{
					var results = jQuery.parseJSON( json_string );
					if(results.is_successful){
						var data = results.data;
						$('#detail_encrypt_itme_distance_id').val(data.detail_encrypt_itme_distance_id);
						$('#detail_service_information_id').val(data.detail_encrypt_service_information_id);
						$('#detail_incident_time').val(data.detail_record_incident_time);
						$('#detail_incident_time_recrive').val(data.detail_record_incident_time_recrive);
						$('#detail_time_order').val(data.detail_record_time_order);
						$('#detail_base_time_start').val(data.detail_record_base_time_start);
						$('#detail_base_time_stop').val(data.detail_record_base_time_stop);
						$('#detail_time_of_leaving').val(data.detail_record_time_of_leaving);
						$('#detail_time_to_hospital').val(data.detail_record_time_to_hospital);
						$('#detail_base_time_finish').val(data.detail_record_base_time_finish);
						$('#detail_distance_base_scene').val(data.detail_record_distance_base_scene);
						$('#detail_distance_to_hospital').val(data.detail_record_distance_to_hospital);


						$('#addListModal').modal('show');
						$('#formAddList').attr('action', site_url('services/service_time_distance/update_list'));
						setDatePicker('.datepicker');

					}
				}
				catch(err)
				{
					alert('Invalid json : ' + err + "\n\n" + json_string);
				}
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	},

	loadDetailList: function(ref_encrypt_id){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: site_url('services/service_time_distance/load_detail/'+ ref_encrypt_id),
			success: function (results) {
	
				var decoded = $("<div/>").html(results.tbody).text();
				$('#tbody_detail_list').html(decoded);
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	},

}

$(document).ready(function() {

	$(document).on('change','#set_order_by',function(){
		$('input[name="order_by"]').val($(this).val());
		$('button[name="submit"]').click();
	});

	$('#editModal').on('shown.bs.modal', function () {
		$('#edit_remark').focus();
	});

	$('#btnSave').click(function() {
		$('#addModal').modal('hide');
		ServiceTimeDistance.saveFormData();
		return false;
	});//click

	$('#btnSaveEdit').click(function() {
		return ServiceTimeDistance.validateFormEdit();
	});//click

	$(document).on('keypress','#edit_remark',function(e) {
	if(isEnter(e)) {
        return ServiceTimeDistance.validateFormEdit();
    }
	});//click

	//List view
	if(typeof param_search_field != 'undefined'){
		$('select[name="search_field"] option[value="'+ param_search_field +'"]').attr('selected','selected');
	}

	if(typeof param_current_page != 'undefined'){
		ServiceTimeDistance.current_page = Math.abs(param_current_page);
	}

	if(typeof param_current_path != 'undefined'){
		ServiceTimeDistance.current_path = param_current_path;
	}

	$(document).on('click','.btn-delete-row', function(){
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pServiceInformationId = $(this).attr('data-service_information_id');

		ServiceTimeDistance.confirmDelete(pServiceInformationId,  row_num);
	});//click

	$(document).on('click','#btn_confirm_delete', function(){
		ServiceTimeDistance.deleteRecord();
	});

	$(document).on('click','#btnConfirmSaveList', function(){
		ServiceTimeDistance.saveDetailList();
		return false;
	});//click
	
	$(document).on('click','.btn-delete-list-row', function(){
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pItmeDistanceId = $(this).attr('data-itme_distance_id');

		ServiceTimeDistance.confirmDeleteList(pItmeDistanceId,  row_num);
	});//click

	$(document).on('click','#btn_confirm_delete_list', function(){
		ServiceTimeDistance.deleteRecordList();
	});

	$(document).on('click','#btnAddListDialog', function(){
		ServiceTimeDistance.openAddListDialog();
		$('#detail_service_information_id').val($('#detail_ref_service_information_id').val());
	});

	$(document).on('click','.btn-preview-list-row', function(){
		var row_num = $(this).attr('data-row-number');
		var pItmeDistanceId = $(this).attr('data-itme_distance_id');

		ServiceTimeDistance.previewDetailRecord(pItmeDistanceId,  row_num);
	});

	$(document).on('click','.btn-edit-list-row', function(){
		var row_num = $(this).data('row-number');
		var url_encrypt_id = $(this).data('url-encrypt-id');
		var pItmeDistanceId = $(this).attr('data-itme_distance_id');

		ServiceTimeDistance.editDetailRecord(pItmeDistanceId,  row_num, url_encrypt_id);
	});

	setDropdownList('#service_unit_name');
	setDropdownList('#create_by_userid');
	$('#create_by_userid').select2("readonly", true);

	//Set default value
	var order_by = $('#set_order_by').attr('value');
	$('#set_order_by option[value="'+order_by+'"]').prop('selected', true);
	
	//Set default selected
	$("input[type='radio']").prop( "checked", function() {
		return $(this).val() == $(this).data('record-value');
	});
	setDatePicker('.datepicker');

});
