
var Employee = {

	current_page : 0,
	current_path : '',

	// load preview to modal
	loadPreview: function(id){
		$.ajax({
			method: 'GET',
			url: site_url('demo/employee/preview/'+ id),
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
		var frm_action = site_url('demo/employee/save');
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
					$('#formAdd')[0].reset();
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
		var frm_action = site_url('demo/employee/update');

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
				}
			},
			error : function(jqXHR, exception){
				ajaxErrorMessage(jqXHR, exception);
				loading_on_remove(obj);
			}
		});
	},

	confirmDelete: function (pEmpId,  irow){
		$('[name="encrypt_emp_id"]').val(pEmpId);

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
		var frm_action = site_url('demo/employee/del');
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
						$(window.location).attr('href', site_url(Employee.current_path));
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

	getYearExperience: function(elem_date, elem_loading){
		var obj_loading = $(elem_loading);
		loading_on(obj_loading);
		var frm_action = site_url('demo/employee/get_year_experience');
		var frm_data = 'start_date=' + $(elem_date).val();
		frm_data += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		$.ajax({
		   method: 'POST',
		   url: frm_action,
		   data : frm_data,
		   success: function (results) {
				$(obj_loading).html(results);
		   },
		   error : function(jqXHR, exception){
				loading_on_remove(obj_loading);
				ajaxErrorMessage(jqXHR, exception);
		   }
	  });
   },
   
   getYearExperienceQuit: function(elem_start_date, elem_quit_date, elem_loading){
		var obj_loading = $(elem_loading);
		loading_on(obj_loading);
		var frm_action = site_url('demo/employee/get_year_experience');
		var frm_data = 'start_date=' + $(elem_start_date).val();
		frm_data += '&quit_date=' + $(elem_quit_date).val();
		frm_data += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		$.ajax({
		   method: 'POST',
		   url: frm_action,
		   data : frm_data,
		   success: function (results) {
				$(obj_loading).val(results);
		   },
		   error : function(jqXHR, exception){
				loading_on_remove(obj_loading);
				ajaxErrorMessage(jqXHR, exception);
		   }
	  });
   }
   
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
		Employee.saveFormData();
		return false;
	});//click

	$('#btnSaveEdit').click(function() {
		return Employee.validateFormEdit();
	});//click

	$(document).on('keypress','#edit_remark',function(e) {
	if(isEnter(e)) {
        return Employee.validateFormEdit();
    }
	});//click

	//List view
	if(typeof param_search_field != 'undefined'){
		$('select[name="search_field"] option[value="'+ param_search_field +'"]').attr('selected','selected');
	}

	if(typeof param_current_page != 'undefined'){
		Employee.current_page = Math.abs(param_current_page);
	}

	if(typeof param_current_path != 'undefined'){
		Employee.current_path = param_current_path;
	}

	$(document).on('click','.btn-delete-row', function(){
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pEmpId = $(this).attr('data-emp_id');

		Employee.confirmDelete(pEmpId,  row_num);
	});//click

	$(document).on('click','#btn_confirm_delete', function(){
		Employee.deleteRecord();
	});

	//Set default value
	var order_by = $('#set_order_by').attr('value');
	$('#set_order_by option[value="'+order_by+'"]').prop('selected', true);
	
	//Set default selected
	
	 // คำนวณอายุผ่าน AJAX (ต้องเอาไว้ก่อน setDatePicker() ทั่วไป )
	 setDatePicker('#start_date', {
		yearRange : "-100:+0",
		onSelect : Employee.getYearExperience('#start_date', '#display_year_experience')
	 });
	 
	 // Event On Change
	 $(document).on('change','#start_date', function(){
		Employee.getYearExperience('#start_date', '#display_year_experience') // <-- มีผลเมื่อมีการเปลี่ยนแปลง
	 });
	 
	setDatePicker('#quit_date', {
		yearRange : "-100:+0",
		onSelect : Employee.getYearExperienceQuit('#start_date', '#quit_date', '#year_experience')
	 });
	 
	 // Event On Change
	 $(document).on('change','#quit_date', function(){
		Employee.getYearExperienceQuit('#start_date', '#quit_date', '#year_experience') // <-- มีผลเมื่อมีการเปลี่ยนแปลง
	 });
	
	setDatePicker('.datepicker');

});
