
var AddressList = {

	current_page : 0,

	// load preview to modal
	loadPreview: function(id){
		$.ajax({
			method: 'GET',
			url: site_url('address/address_list/preview/'+ id),
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
		var frm_action = site_url('address/address_list/save');
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
		var frm_action = site_url('address/address_list/update');

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
		var frm_action = site_url('address/address_list/del');
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
						$(window.location).attr('href', site_url('address/address_list/index/'+ this.current_page));
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

	getProvinceOptionList: function(param_geo_id){
		var frm_action = site_url('address/address_list/get_province_list');
		var fdata = 'geo_id=' + param_geo_id
		fdata += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		$.ajax({
			method: 'POST',
			url: frm_action,
			data : fdata,
			success: function (results) {
				$('#ref_province_id').html(results);
				setDropdownList('#ref_province_id');
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	},
	
	getAmphurOptionList: function(param_province_id){
		var frm_action = site_url('address/address_list/get_amphur_list');
		var fdata = 'province_id=' + param_province_id
		fdata += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		$.ajax({
			method: 'POST',
			url: frm_action,
			data : fdata,
			success: function (results) {
				$('#ref_amphur_id').html(results);
				setDropdownList('#ref_amphur_id');
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	}
}

$(document).ready(function() {
	
	//On Geo drop-down change
	$(document).on('change','#ref_geo_id', function(){
		AddressList.getProvinceOptionList(this.value);
	});
	
	$(document).on('change','#ref_province_id', function(){
		AddressList.getAmphurOptionList(this.value);
	});

	$('#btnSave').click(function() {
		$('#addModal').modal('hide');
		AddressList.saveFormData();
		return false;
	});//click

	$('#btnSaveEdit').click(function() {
		return AddressList.validateFormEdit();
	});//click

	//List view
	if(typeof param_search_field != 'undefined'){
		$('select[name="search_field"] option[value="'+ param_search_field +'"]').attr('selected','selected');
	}

	if(typeof param_current_page != 'undefined'){
		AddressList.current_page = Math.abs(param_current_page);
	}


	$(document).on('click','.btn-delete-row', function(){
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pId = $(this).attr('data-id');

		AddressList.confirmDelete(pId,  row_num);
	});//click

	$(document).on('click','#btn_confirm_delete', function(){
		AddressList.deleteRecord();
	});
	setDropdownList('#ref_student_id');
	setDropdownList('#ref_geo_id');
	setDropdownList('#ref_province_id');
	setDropdownList('#ref_amphur_id');
	setDropdownList('#ref_district_id');

	//Set default selected
});
