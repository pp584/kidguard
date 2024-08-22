
var Assessment = {

	current_page: 0,
	current_path: '',

	// load preview to modal
	loadPreview: function (id) {
		$.ajax({
			method: 'GET',
			url: site_url('report/assessment/preview/' + id),
			success: function (results) {
				$('#divPreview').html(results);
			},
			error: function (jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
			}
		});
		$('#modalPreview').modal('show');
	},



	validateFormEdit: function () {
		if ($('#edit_remark').val().length < 5) {
			notify('กรุณาระบุเหตุผล', 'เหตุผลการแก้ไขจะต้องระบุให้ชัดเจน', 'warning', 'center', 'bottom');
		} else {
			this.saveEditForm();
		}
		return false;
	},

	saveFormData: function () {
		var frm_action = site_url('report/assessment/save');
		var obj = $('#btnConfirmSave');
		if (loading_on(obj) == true) {


			var self_management_score = removeComma($('#self_management_score').val());
			$('#self_management_score').val(self_management_score);

			var psychological_capital_score = removeComma($('#psychological_capital_score').val());
			$('#psychological_capital_score').val(psychological_capital_score);

			var self_esteem_score = removeComma($('#self_esteem_score').val());
			$('#self_esteem_score').val(self_esteem_score);

			var identity_power_score = removeComma($('#identity_power_score').val());
			$('#identity_power_score').val(identity_power_score);

			var compliance_score = removeComma($('#compliance_score').val());
			$('#compliance_score').val(compliance_score);

			var domestic_violence_score = removeComma($('#domestic_violence_score').val());
			$('#domestic_violence_score').val(domestic_violence_score);

			var exemplary_score = removeComma($('#exemplary_score').val());
			$('#exemplary_score').val(exemplary_score);

			var media_exposure_score = removeComma($('#media_exposure_score').val());
			$('#media_exposure_score').val(media_exposure_score);

			var attitude_score = removeComma($('#attitude_score').val());
			$('#attitude_score').val(attitude_score);

			var source_purchase_score = removeComma($('#source_purchase_score').val());
			$('#source_purchase_score').val(source_purchase_score);

			var family_power_score = removeComma($('#family_power_score').val());
			$('#family_power_score').val(family_power_score);

			var school_power_score = removeComma($('#school_power_score').val());
			$('#school_power_score').val(school_power_score);

			var friend_power_score = removeComma($('#friend_power_score').val());
			$('#friend_power_score').val(friend_power_score);

			var community_power_score = removeComma($('#community_power_score').val());
			$('#community_power_score').val(community_power_score);

			var frm_data = $('#formAdd').serializeObject();
			frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data: frm_data,
				success: function (results) {

					var self_management_score = formatNumber($('#self_management_score').val(), 2);
					$('#self_management_score').val(self_management_score);

					var psychological_capital_score = formatNumber($('#psychological_capital_score').val(), 2);
					$('#psychological_capital_score').val(psychological_capital_score);

					var self_esteem_score = formatNumber($('#self_esteem_score').val(), 2);
					$('#self_esteem_score').val(self_esteem_score);

					var identity_power_score = formatNumber($('#identity_power_score').val(), 2);
					$('#identity_power_score').val(identity_power_score);

					var compliance_score = formatNumber($('#compliance_score').val(), 2);
					$('#compliance_score').val(compliance_score);

					var domestic_violence_score = formatNumber($('#domestic_violence_score').val(), 2);
					$('#domestic_violence_score').val(domestic_violence_score);

					var exemplary_score = formatNumber($('#exemplary_score').val(), 2);
					$('#exemplary_score').val(exemplary_score);

					var media_exposure_score = formatNumber($('#media_exposure_score').val(), 2);
					$('#media_exposure_score').val(media_exposure_score);

					var attitude_score = formatNumber($('#attitude_score').val(), 2);
					$('#attitude_score').val(attitude_score);

					var source_purchase_score = formatNumber($('#source_purchase_score').val(), 2);
					$('#source_purchase_score').val(source_purchase_score);

					var family_power_score = formatNumber($('#family_power_score').val(), 2);
					$('#family_power_score').val(family_power_score);

					var school_power_score = formatNumber($('#school_power_score').val(), 2);
					$('#school_power_score').val(school_power_score);

					var friend_power_score = formatNumber($('#friend_power_score').val(), 2);
					$('#friend_power_score').val(friend_power_score);

					var community_power_score = formatNumber($('#community_power_score').val(), 2);
					$('#community_power_score').val(community_power_score);

					if (results.is_successful) {
						alert_type = 'success';
					} else {
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if (results.is_successful) {
						window.location = site_url('report/assessment');
					}
				},
				error: function (jqXHR, exception) {
					ajaxErrorMessage(jqXHR, exception);
					loading_on_remove(obj);
				}
			});
		}
		return false;
	},

	saveEditForm: function () {
		$('#editModal').modal('hide');
		var frm_action = site_url('report/assessment/update');

		var self_management_score = removeComma($('#self_management_score').val());
		$('#self_management_score').val(self_management_score);

		var psychological_capital_score = removeComma($('#psychological_capital_score').val());
		$('#psychological_capital_score').val(psychological_capital_score);

		var self_esteem_score = removeComma($('#self_esteem_score').val());
		$('#self_esteem_score').val(self_esteem_score);

		var identity_power_score = removeComma($('#identity_power_score').val());
		$('#identity_power_score').val(identity_power_score);

		var compliance_score = removeComma($('#compliance_score').val());
		$('#compliance_score').val(compliance_score);

		var domestic_violence_score = removeComma($('#domestic_violence_score').val());
		$('#domestic_violence_score').val(domestic_violence_score);

		var exemplary_score = removeComma($('#exemplary_score').val());
		$('#exemplary_score').val(exemplary_score);

		var media_exposure_score = removeComma($('#media_exposure_score').val());
		$('#media_exposure_score').val(media_exposure_score);

		var attitude_score = removeComma($('#attitude_score').val());
		$('#attitude_score').val(attitude_score);

		var source_purchase_score = removeComma($('#source_purchase_score').val());
		$('#source_purchase_score').val(source_purchase_score);

		var family_power_score = removeComma($('#family_power_score').val());
		$('#family_power_score').val(family_power_score);

		var school_power_score = removeComma($('#school_power_score').val());
		$('#school_power_score').val(school_power_score);

		var friend_power_score = removeComma($('#friend_power_score').val());
		$('#friend_power_score').val(friend_power_score);

		var community_power_score = removeComma($('#community_power_score').val());
		$('#community_power_score').val(community_power_score);

		var frm_data = $('#formEdit').serializeObject();
		frm_data['edit_remark'] = $('#edit_remark').val();
		frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);

		var obj = $('#btnSaveEdit');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data: frm_data,
			success: function (results) {

				var self_management_score = formatNumber($('#self_management_score').val(), 2);
				$('#self_management_score').val(self_management_score);

				var psychological_capital_score = formatNumber($('#psychological_capital_score').val(), 2);
				$('#psychological_capital_score').val(psychological_capital_score);

				var self_esteem_score = formatNumber($('#self_esteem_score').val(), 2);
				$('#self_esteem_score').val(self_esteem_score);

				var identity_power_score = formatNumber($('#identity_power_score').val(), 2);
				$('#identity_power_score').val(identity_power_score);

				var compliance_score = formatNumber($('#compliance_score').val(), 2);
				$('#compliance_score').val(compliance_score);

				var domestic_violence_score = formatNumber($('#domestic_violence_score').val(), 2);
				$('#domestic_violence_score').val(domestic_violence_score);

				var exemplary_score = formatNumber($('#exemplary_score').val(), 2);
				$('#exemplary_score').val(exemplary_score);

				var media_exposure_score = formatNumber($('#media_exposure_score').val(), 2);
				$('#media_exposure_score').val(media_exposure_score);

				var attitude_score = formatNumber($('#attitude_score').val(), 2);
				$('#attitude_score').val(attitude_score);

				var source_purchase_score = formatNumber($('#source_purchase_score').val(), 2);
				$('#source_purchase_score').val(source_purchase_score);

				var family_power_score = formatNumber($('#family_power_score').val(), 2);
				$('#family_power_score').val(family_power_score);

				var school_power_score = formatNumber($('#school_power_score').val(), 2);
				$('#school_power_score').val(school_power_score);

				var friend_power_score = formatNumber($('#friend_power_score').val(), 2);
				$('#friend_power_score').val(friend_power_score);

				var community_power_score = formatNumber($('#community_power_score').val(), 2);
				$('#community_power_score').val(community_power_score);

				if (results.is_successful) {
					alert_type = 'success';
				} else {
					alert_type = 'danger';
				}

				notify('บันทึกข้อมูล', results.message, alert_type, 'center');
				loading_on_remove(obj);

				if (results.is_successful) {
				}
			},
			error: function (jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
				loading_on_remove(obj);
			}
		});
	},

	confirmDelete: function (pId, irow) {
		$('[name="encrypt_id"]').val(pId);

		$('#xrow').text('[' + irow + ']');
		var my_thead = $('#row_' + irow).closest('table').find('th:not(:first-child):not(:last-child)');
		var th = [];
		my_thead.each(function (index) {
			th.push($(this).text());
		});

		var active_row = $('#row_' + irow).find('td:not(:first-child):not(:last-child)');
		var detail = '<table class="table table-striped">';
		active_row.each(function (index) {
			detail += '<tr><td align="right"><b>' + th[index] + ' : </b></td><td> ' + $(this).html() + '</td></tr>';
		});
		detail += '</table>';
		$('#div_del_detail').html(detail);

		$('#confirmDelModal').modal('show');
	},

	// delete by ajax jquery
	deleteRecord: function () {
		var frm_action = site_url('report/assessment/del');
		var frm_data = $('#formDelete').serialize();
		frm_data += '&' + csrf_token_name + '=' + $.cookie(csrf_cookie_name);
		var obj = $('#btn_confirm_delete');
		loading_on(obj);
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data: frm_data,
			success: function (results) {
				if (results.is_successful) {
					alert_type = 'success';
					setTimeout(function () {
						$(window.location).attr('href', site_url(Assessment.current_path));
					}, 500);
				} else {
					alert_type = 'danger';
				}
				notify('ลบรายการ', results.message, alert_type, 'center');
				loading_on_remove(obj);
			},
			error: function (jqXHR, exception) {
				loading_on_remove(obj);
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	},

}

$(document).ready(function () {

	$(document).on('change', '#set_order_by', function () {
		$('input[name="order_by"]').val($(this).val());
		$('button[name="submit"]').click();
	});

	$('#editModal').on('shown.bs.modal', function () {
		$('#edit_remark').focus();
	});

	$('#btnSave').click(function () {
		$('#addModal').modal('hide');
		Assessment.saveFormData();
		return false;
	});//click

	$('#btnSaveEdit').click(function () {
		return Assessment.validateFormEdit();
	});//click

	$(document).on('keypress', '#edit_remark', function (e) {
		if (isEnter(e)) {
			return Assessment.validateFormEdit();
		}
	});//click

	//List view
	if (typeof param_search_field != 'undefined') {
		$('select[name="search_field"] option[value="' + param_search_field + '"]').attr('selected', 'selected');
	}

	if (typeof param_current_page != 'undefined') {
		Assessment.current_page = Math.abs(param_current_page);
	}

	if (typeof param_current_path != 'undefined') {
		Assessment.current_path = param_current_path;
	}

	$(document).on('click', '.btn-delete-row', function () {
		$('.btn-delete-row').removeClass('active_del');
		$(this).addClass('active_del');
		var row_num = $(this).attr('data-row-number');
		var pId = $(this).attr('data-id');

		Assessment.confirmDelete(pId, row_num);
	});//click

	$(document).on('click', '#btn_confirm_delete', function () {
		Assessment.deleteRecord();
	});

	//Set default value
	var order_by = $('#set_order_by').attr('value');
	$('#set_order_by option[value="' + order_by + '"]').prop('selected', true);

	//Set default selected
	setDatePicker('.datepicker');

	//table2excel.js
	;
	(function ($, window, document, undefined) {
		var pluginName = "table2excel",

			defaults = {
				exclude: ".noExl",
				name: "Table2Excel"
			};

		// The actual plugin constructor
		function Plugin(element, options) {
			this.element = element;
			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			//
			this.settings = $.extend({}, defaults, options);
			this._defaults = defaults;
			this._name = pluginName;
			this.init();
		}

		Plugin.prototype = {
			init: function () {
				var e = this;

				var utf8Heading = "<meta http-equiv=\"content-type\" content=\"application/vnd.ms-excel; charset=utf-8\">";
				e.template = {
					head: "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">" + utf8Heading + "<head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>",
					sheet: {
						head: "<x:ExcelWorksheet><x:Name>",
						tail: "</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"
					},
					mid: "</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>",
					table: {
						head: "<table>",
						tail: "</table>"
					},
					foot: "</body></html>"
				};

				e.tableRows = [];

				// get contents of table except for exclude
				$(e.element).each(function (i, o) {
					var tempRows = "";
					$(o).find("tr").not(e.settings.exclude).each(function (i, o) {
						tempRows += "<tr>" + $(o).html() + "</tr>";
					});
					e.tableRows.push(tempRows);
				});

				e.tableToExcel(e.tableRows, e.settings.name, e.settings.sheetName);
			},

			tableToExcel: function (table, name, sheetName) {
				var e = this, fullTemplate = "", i, link, a;

				e.uri = "data:application/vnd.ms-excel;base64,";
				e.base64 = function (s) {
					return window.btoa(unescape(encodeURIComponent(s)));
				};
				e.format = function (s, c) {
					return s.replace(/{(\w+)}/g, function (m, p) {
						return c[p];
					});
				};

				sheetName = typeof sheetName === "undefined" ? "Sheet" : sheetName;

				e.ctx = {
					worksheet: name || "Worksheet",
					table: table,
					sheetName: sheetName,
				};

				fullTemplate = e.template.head;

				if ($.isArray(table)) {
					for (i in table) {
						//fullTemplate += e.template.sheet.head + "{worksheet" + i + "}" + e.template.sheet.tail;
						fullTemplate += e.template.sheet.head + sheetName + i + e.template.sheet.tail;
					}
				}

				fullTemplate += e.template.mid;

				if ($.isArray(table)) {
					for (i in table) {
						fullTemplate += e.template.table.head + "{table" + i + "}" + e.template.table.tail;
					}
				}

				fullTemplate += e.template.foot;

				for (i in table) {
					e.ctx["table" + i] = table[i];
				}
				delete e.ctx.table;

				if (typeof msie !== "undefined" && msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
				{
					if (typeof Blob !== "undefined") {
						//use blobs if we can
						fullTemplate = [fullTemplate];
						//convert to array
						var blob1 = new Blob(fullTemplate, { type: "text/html" });
						window.navigator.msSaveBlob(blob1, getFileName(e.settings));
					} else {
						//otherwise use the iframe and save
						//requires a blank iframe on page called txtArea1
						txtArea1.document.open("text/html", "replace");
						txtArea1.document.write(e.format(fullTemplate, e.ctx));
						txtArea1.document.close();
						txtArea1.focus();
						sa = txtArea1.document.execCommand("SaveAs", true, getFileName(e.settings));
					}

				} else {
					link = e.uri + e.base64(e.format(fullTemplate, e.ctx));
					a = document.createElement("a");
					a.download = getFileName(e.settings);
					a.href = link;

					document.body.appendChild(a);

					a.click();

					document.body.removeChild(a);
				}

				return true;
			}
		};

		function getFileName(settings) {
			return (settings.filename ? settings.filename : "table2excel") +
				(settings.fileext ? settings.fileext : ".xlsx");
		}

		$.fn[pluginName] = function (options) {
			var e = this;
			e.each(function () {
				if (!$.data(e, "plugin_" + pluginName)) {
					$.data(e, "plugin_" + pluginName, new Plugin(this, options));
				}
			});

			// chain jQuery functions
			return e;
		};

	})(jQuery, window, document);

	$('#exportExcelClick').click(function () {
		var title = $('#table-title').text();
		console.log('kkk');
		$(function () {
			$("#export-summary").table2excel({
				exclude: ".noExl",
				name: "Excel Document Name",
				filename: title,
				fileext: ".xls",
				exclude_img: true,
				exclude_links: true,
				exclude_inputs: true
			});
		});
	});
});
