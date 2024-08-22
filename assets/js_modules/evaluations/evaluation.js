var evaluation_form = {
	saveFormData: function () {
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/basic_save';
		var obj = $('#btnConfirmSave');

		if (loading_on(obj)) {
			var frm_data = $('#formEvaluationBasic').serializeObject(); // Assuming serializeObject correctly serializes the form data

			// Handle specific input values manually
			var drug = document.getElementById('other_drug_input').value;
			var consult = document.getElementById('other_consult_people_input').value;
			var mother_o = document.getElementById('other_mother_occupation_input').value;
			var father_o = document.getElementById('other_father_occupation_input').value;
			var family_status_o = document.getElementById('other_family_status_input').value;
			var num_siblings_o = document.getElementById('other_num_siblings_input').value;

			// Update serialized data with manual input values if necessary
			if (frm_data) {

				console.log('frm_data >> ', frm_data);
				if (frm_data.family_status === 'other') {
					frm_data.family_status = family_status_o;
				}
				if (frm_data.num_siblings === 'other') {
					frm_data.num_siblings = num_siblings_o;
				}
				if (frm_data.father_occupation === 'other') {
					frm_data.father_occupation = father_o;
				}
				if (frm_data.mother_occupation === 'other') {
					frm_data.mother_occupation = mother_o;
				}

				if (frm_data['consult_people[]']) {
					var consultIndex = frm_data['consult_people[]'].indexOf('');
					if (consultIndex !== -1) {
						frm_data['consult_people[]'][consultIndex] = consult;
					}
				}
				if (frm_data['type_of_drugs[]']) {
					var drugIndex = frm_data['type_of_drugs[]'].indexOf('');
					if (drugIndex !== -1) {
						frm_data['type_of_drugs[]'][drugIndex] = drug;
					}
				}

				frm_data[csrf_token_name] = $.cookie(csrf_cookie_name);
			}

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data: frm_data,
				success: function (results) {
					if (results.is_successful) {
						alert_type = 'success';
					} else {
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if (results.is_successful) {
						console.log('Pass');
						// window.location = site_url('evaluation_form/evaluationExplanation/question_basic');
						window.location.reload;
						window.location.href = 'question_immune';
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
	saveFormImmuneData: function () {
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/immune_save';
		var obj = $('#btnSaveImmune');
		if (loading_on(obj)) {
			var frm_data = $('#immuneForm').serializeObject(); // Assuming serializeObject correctly serializes the form data
			var totalCount = parseInt($('#countImmune').attr('data-count')); // Ensure totalCount is an integer

			if (frm_data) {
				console.log(frm_data);
				var count = Object.keys(frm_data).length;
				console.log("totalCount: " + totalCount);
				console.log("Number of form fields: " + count);
				loading_on_remove(obj); // Assuming this function is defined elsewhere
				$('body').css('padding', '0');
				if (count !== totalCount) { // Compare count and totalCount
					$('.modal-backdrop').remove(); // Remove any existing backdrops
					$('#validateForm').modal('show');
					$('#required-count').html(totalCount - count);
					return false;
				}
				$('.modal-backdrop').remove();
			}

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data: frm_data,
				success: function (results) {
					if (results.is_successful) {
						alert_type = 'success';
					} else {
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if (results.is_successful) {
						console.log('Pass');
						window.location.reload;
						window.location.href = 'question_contextual';
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
	saveFormContextualData: function () {
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/contextual_save';
		var obj = $('#btnSaveContextual');
		if (loading_on(obj)) {
			var frm_data = $('#contextualForm').serializeObject(); // Assuming serializeObject correctly serializes the form data
			var totalCount = parseInt($('#countContextual').attr('data-count')); // Ensure totalCount is an integer

			if (frm_data) {
				console.log(frm_data);
				var count = Object.keys(frm_data).length;
				console.log("totalCount: " + totalCount);
				console.log("Number of form fields: " + count);
				$('body').css('padding', '0');
				loading_on_remove(obj); // Assuming this function is defined elsewhere
				if (count !== totalCount) { // Compare count and totalCount
					$('.modal-backdrop').remove(); // Remove any existing backdrops
					$('#validateForm').modal('show');
					$('#required-count').html(totalCount - count);
					return false;
				}
				$('.modal-backdrop').remove();
			}

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data: frm_data,
				success: function (results) {
					if (results.is_successful) {
						alert_type = 'success';
					} else {
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if (results.is_successful) {
						console.log('Pass');
						window.location.reload;
						window.location.href = 'question_risky';
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
	saveFormRiskyData: function () {
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/risky_save';
		var obj = $('#btnSaveRisky');
		if (loading_on(obj)) {
			var frm_data = $('#riskyForm').serializeObject(); // Assuming serializeObject correctly serializes the form data
			var totalCount = parseInt($('#countRisky').attr('data-count')); // Ensure totalCount is an integer

			if (frm_data) {
				console.log(frm_data);
				var count = Object.keys(frm_data).length;
				console.log("totalCount: " + totalCount);
				console.log("Number of form fields: " + count);
				$('body').css('padding', '0');
				loading_on_remove(obj); // Assuming this function is defined elsewhere
				if (count !== totalCount) { // Compare count and totalCount
					$('.modal-backdrop').remove(); // Remove any existing backdrops
					$('#validateForm').modal('show');
					$('#required-count').html(totalCount - count);
					return false;
				}
				$('.modal-backdrop').remove();
			}

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data: frm_data,
				success: function (results) {
					if (results.is_successful) {
						alert_type = 'success';
					} else {
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if (results.is_successful) {
						console.log('Pass');
						window.location.reload;
						window.location.href = 'question_immune';
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

	submitForm: function () {
		var self = this;
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/submit_form';
		var obj = $('#btnSaveRisky');
		if (loading_on(obj)) {

			$.ajax({
				method: 'POST',
				url: frm_action,
				dataType: 'json',
				data: '',
				success: async function (results) {
					if (results.is_successful) {
						alert_type = 'success';
					} else {
						alert_type = 'danger';
					}
					notify('เพิ่มข้อมูล', results.message, alert_type, 'center');
					loading_on_remove(obj);

					if (results.is_successful) {
						console.log('results', results.data);
						window.location.href = 'question_graph?web_id=' + results.data;
						// await self.getGraph(results.data)
						// return true;
					}
				},
				error: function (jqXHR, exception) {
					ajaxErrorMessage(jqXHR, exception);
					loading_on_remove(obj);
					return false;
				}
			});
		}
		// return success;
	},
	getGraph: async function (id) {

		var frm_graph = siteURL + `evaluation_form/evaluationExplanation/getGraph?id=${id ? id : ''}`;
		// $.ajax({
		// 	method: 'GET',
		// 	url: frm_graph,
		// 	dataType: 'json',
		// 	data: '',
		// 	success: async function (results) {
		// 		if (results.is_successful) {
		// 			alert_type = 'success';
		// 		} else {
		// 			alert_type = 'danger';
		// 		}
		// 		if (results.is_successful) {
		// 			setWithExpiry('user_graph', results.data, 86400);
		// 			if (!id) {
		// 				window.location.href = 'question_graph';
		// 			}
		// 		}
		// 	},
		// 	error: function (jqXHR, exception) {
		// 		ajaxErrorMessage(jqXHR, exception);
		// 		// loading_on_remove(obj);
		// 	}
		// });
		try {
			let response = await fetch(frm_graph, {
				method: 'GET',
				headers: {
					'Content-Type': 'application/json'
				}
			});

			let results = await response.json();

			if (results.is_successful) {
				setWithExpiry('user_graph', results.data, 86400);
				if (!id) {
					window.location.href = 'question_graph';
				}
				return results.data;
			} else {
				console.error('Failed to fetch graph data');
				return null;
			}
		} catch (error) {
			console.error('Error:', error);
			return null;
		}
		return false;
	},

	selectProvince: function (province, userDistrict) {
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/filter_amphures';
		$.ajax({
			method: 'POST',
			url: frm_action,
			data: { province: province },
			success: function (response) {
				var districtSelect = $('#district_id');
				districtSelect.empty();
				var districts = JSON.parse(response);
				if (districts.length > 0) {
					$.each(districts, function (index, district) {
						var option = $('<option></option>').attr('value', district.nameTH).text(district.nameTH);
						districtSelect.append(option);
					});
					if (userDistrict) {
						districtSelect.val(userDistrict);
					}
				} else {
					var option = $('<option></option>').attr('value', '').text('- ไม่พบอำเภอ -');
					districtSelect.append(option);
				}
			},
			error: function (jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
				return false;
			}
		});
	},
	clear() {
		var frm_action = siteURL + 'evaluation_form/evaluationExplanation/clear';
		$.ajax({
			method: 'POST',
			url: frm_action,
			dataType: 'json',
			data: '',
			success: function (results) {
				if (results.is_successful) {
					alert_type = 'success';
				} else {
					alert_type = 'danger';
				}
				notify('เพิ่มข้อมูล', results.message, alert_type, 'center');

				if (results.is_successful) {
					console.log('Clear!');
				}
			},
			error: function (jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
			}
		});
		return false;
	}


};


// function

function toggleTextInput(checkbox, inputId) {
	var textInput = document.getElementById(inputId);
	var btnConfirmSave = document.getElementById('btnConfirmSave');
	var sectionDrugHistory = document.getElementById('section_drug_history');

	if (!textInput) {
		console.error('TextInput not found.');
		return;
	}

	if (checkbox.checked) {
		console.log('check');
		textInput.style.display = 'block';
		textInput.style.marginTop = '40px';
		btnConfirmSave.style.marginTop = '15px';
		sectionDrugHistory.style.marginTop = '30px';
		checkbox.value = textInput.value;
	} else {
		console.log('not check');
		textInput.style.marginTop = '0px';
		btnConfirmSave.style.marginTop = '0px';
		sectionDrugHistory.style.marginTop = '0px';
		textInput.style.display = 'none';
	}
}

window.onload = function () {
	var otherDrugCheckbox = document.getElementById('other_drug_input_val');
	if (otherDrugCheckbox) {
		toggleTextInput(otherDrugCheckbox, 'other_drug_input');
	}
	var otherConsultCheckbox2 = document.getElementById('other_consult_people_input_val');
	if (otherConsultCheckbox2) {
		toggleTextInput(otherConsultCheckbox2, 'other_consult_people_input');
	}
	if (localStorage.getItem('user_graph')) {
		clearExpiredItemsOnLoad();
	}
};
function getWithExpiry(key) {
	const itemStr = localStorage.getItem(key);
	if (!itemStr) {
		return null;
	}
	const item = JSON.parse(itemStr);
	const now = new Date();
	if (now.getTime() > item.expiry) {
		localStorage.removeItem(key);
		return null;
	}
	return item.value;
}

function setWithExpiry(key, value, expiryInSeconds) {
	const now = new Date();
	const item = {
		value: value,
		expiry: now.getTime() + (expiryInSeconds * 1000)
	};
	localStorage.setItem(key, JSON.stringify(item));
}

function setWithExpiryOneDay(key, value) {
	const oneDayInSeconds = 86400;
	setWithExpiry(key, value, oneDayInSeconds);
}

function clearExpiredItemsOnLoad() {
	Object.keys(localStorage).forEach(function (key) {
		getWithExpiry(key);
	});
}

// window.onload = clearExpiredItemsOnLoad;


$(document).ready(async function () {
	let windowWidth = window.innerWidth;
	var fetchGraph = $('#fetchGraph').val();
	var fetchGraphType = $('#fetchGraph').attr('type');
	var complete_qt_basic = $('#complete_qt_basic').val();
	var complete_qt_immune = $('#complete_qt_immune').val();
	var complete_qt_contextual = $('#complete_qt_contextual').val();
	var complete_qt_risky = $('#complete_qt_risky').val();
	var currentUrl = window.location.href;
	var graphIndex = 0;
	var tableGraph = document.getElementById('table-graph');

	if (fetchGraph) {
		await evaluation_form.getGraph(fetchGraph);
		var graph = getWithExpiry('user_graph');
		var cardBody = document.querySelector('.grapher');
		if (fetchGraphType == 'web') {
			renderGraph();
			return;
		}
		renderGraph2(windowWidth);
	}

	function renderGraph(windowWidth) {
		tableGraph.innerHTML = '';
		var graphData = graph[graphIndex];

		// Reference the card-body element
		var cardBody = document.querySelector('.grapher');
		cardBody.innerHTML = '';
		// Extract graph details
		var graphId = graphData.graph_id;
		var graphName = graphData.graph_name;
		var bars = graphData.bars;

		var container = document.createElement('div');
		container.setAttribute('id', graphId);
		container.setAttribute('class', 'graph-container'); // Optionally, add a class for styling
		container.style.paddingRight = '10px';
		cardBody.appendChild(container);
		var power = document.getElementById('power-graph');
		var nameGraph = document.getElementById('name-graph');
		var titleGraph = document.getElementById('title-graph');
		power.innerHTML = graph[graphIndex].graph_power + '%';
		nameGraph.innerHTML = graph[graphIndex].graph_name;
		if (graphIndex == 0) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-1">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#19d1ff"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">บริหารจัดการตน</span>
								</div>
								<div class="flex flex-start mt-2">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FFD65F"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">ทุนทางจิตวิทยา</span>
								</div>
								<div class="flex flex-start mt-2">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FDA0B4"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">คุณค่าในตนเอง</span>
								</div>
								<div class="flex flex-start mt-2">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#81EEEB"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังตัวตน</span>
								</div>
			`;
		}
		if (graphIndex == 1) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#19d1ff"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังครอบครัว</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FFD65F"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังสถานศึกษา</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FDA0B4"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังเพื่อนและกิจกรรม</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#81EEEB"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังชุมชน</span>
              </div>
			`;
		}
		if (graphIndex == 2) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#19d1ff"></div>
                <span class="ml-0 text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">การคล้อยตาม</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#FFD65F"></div>
                <span class="ml-0 text-shadow-1 text-left" style="${windowWidth < 500 ? 'font-size:10px' : ''}">ความรุนแรงในครอบครัว</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#FDA0B4"></div>
                <span class="ml-0 text-shadow-1 text-left" style="${windowWidth < 500 ? 'font-size:10px' : ''}">การเป็นแบบอย่าง</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#81EEEB"></div>
                <span class="ml-0 text-shadow-1 text-left" style="${windowWidth < 500 ? 'font-size:10px' : ''}">การเปิดรับ</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#EC623C"></div>
                <span class="ml-0 text-shadow-1 text-left" style="${windowWidth < 500 ? 'font-size:10px' : ''}">เจตคติทางบวก</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#B2DE82"></div>
                <span class="ml-0 text-shadow-1 text-left" style="${windowWidth < 500 ? 'font-size:10px' : ''}">รับรู้แหล่งซื้อสารเสพติด</span>
              </div>
			`;
		}
		if (graphIndex == 3) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#19d1ff"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">ของตน</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FFD65F"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">กลุ่มเคยลอง</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FDA0B4"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">กลุ่มไม่เคยลอง</span>
              </div>
			`;
		}

		var headerTable = '';
		var bodyDrugTable = '';
		var bodyNoneDrugTable = '';
		var tableElement = document.createElement('div');
		const dataSet = graph[graphIndex].bars.map((ga) => {
			headerTable += `<td>${ga.bar_name}</td>`;
			bodyDrugTable += `<td class="text-center">
                                <span class="rounded" 
								style="background-color:
								${(ga.norm_drug > 3.50) ? '#005ED1' :
					(ga.norm_drug >= 3.00 && ga.norm_drug < 3.50) ? '#4CBB17' :
						(ga.norm_drug >= 2.00 && ga.norm_drug < 3.00) ? '#FFC000' :
							'#DC143C'
				}
								;color:${(ga.norm_drug >= 2.00 && ga.norm_drug < 3.00) ? 'black' : 'white'};padding: 4px;">${parseFloat(ga.norm_drug).toFixed(2)}</span>
                            </td>`;
			bodyNoneDrugTable += `<td class="text-center">
                                <span class="rounded" 
								style="background-color:
								${(ga.norm_none_drug > 3.50) ? '#005ED1'
					: (ga.norm_none_drug >= 3.00 && ga.norm_none_drug < 3.50) ? '#4CBB17'
						: (ga.norm_none_drug >= 2.00 && ga.norm_none_drug < 3.00) ? '#FFC000'
							: '#DC143C'
				}
								;color:${(ga.norm_none_drug >= 2.00 && ga.norm_none_drug < 3.00) ? 'black' : 'white'};padding: 4px;">${parseFloat(ga.norm_none_drug).toFixed(2)}</span>
                            </td>`;
			return {
				x: ga.bar_name,
				y: Number(ga.bar_value).toFixed(2),
				goals: [
					{
						name: `PR50 กลุ่มเคยลอง`,
						value: ga.norm_drug,
						strokeWidth: this.indexGraph !== 2 ? 10 : 5,
						strokeColor: "#D05D5D",
						markers: {
							size: 100,
							shape: "circle"
						}
					},
					{
						name: `PR50 กลุ่มไม่เคยลอง`,
						value: ga.norm_none_drug,
						strokeWidth: this.indexGraph !== 2 ? 10 : 5,
						strokeColor: "#5DD063",
						markers: {
							size: 15,
						}
					}
				]
			};
		});

		var tableHTML = `<div class="col-md-12 mb-3"><table class="table" id="tableH" style="width:100%;">
                    <tr>
                        <th></th>`+
			headerTable +
			`</tr>
                    <tr>
                        <td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
						`+ bodyDrugTable + `
                    </tr>
                    <tr>
                        <td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
						`+ bodyNoneDrugTable + `
                    </tr>
                </table></div>`;

		tableElement.innerHTML = tableHTML;
		var heightG = 150;
		if (windowWidth > 500) {
			tableGraph.style.backgroundColor = '#fff';
			tableGraph.style.borderRadius = '5px';
			tableGraph.style.marginLeft = '10px';
			tableGraph.style.width = '63%';
			tableGraph.appendChild(tableElement);
			nameGraph.style.fontSize = '25px';
			nameGraph.style.fontWeight = 'bold';
			heightG = tableGraph.clientHeight;
		} else {
			nameGraph.style.fontSize = '20px';
			nameGraph.style.fontWeight = 'bold';
		}
		const colors = ['#19d1ff', '#FFD65F', '#FDA0B4', '#81EEEB', '#EC623C', '#B2DE82'];
		let currentTooltip = null;
		var options = {
			series: [
				{
					name: "",
					data: dataSet
				}
			],
			chart: {
				height: heightG - 15,
				width: 150,
				type: "bar",
				background: 'transparent', // Set background to white
				dropShadow: {
					enabled: true,
					top: 2,
					left: 2,
					blur: 4,
					opacity: 0.2 // Add shadow to the graph
				},
				toolbar: {
					show: false
				},
				// events: {
				// 	dataPointSelection: function (event, chartContext, config) {
				// 		const { dataPointIndex, seriesIndex } = config;

				// 		// Remove the previous tooltip if it exists
				// 		if (currentTooltip) {
				// 			console.log('case #1');
				// 			currentTooltip.remove();
				// 			currentTooltip = null;
				// 		}

				// 		if (dataPointIndex !== -1) {
				// 			console.log('case #2');
				// 			const data = chartContext.w.globals.series[seriesIndex][dataPointIndex];
				// 			const header = chartContext.w.globals.labels[dataPointIndex];
				// 			const color = chartContext.w.globals.colors[dataPointIndex];
				// 			const goal = dataSet[dataPointIndex];

				// 			const tooltip = document.createElement('div');
				// 			tooltip.className = 'custom-tooltip-2';
				// 			tooltip.style.left = `${event.clientX + 100}px`;
				// 			tooltip.style.top = `${event.clientY + 50}px`;

				// 			let tooltipContent = `
				// 			<div class="pt-10 pb-10 pl-10 pr-10" style="background:#EDEDED;padding:10px 10px 5px 10px">${header}</div>
				// 			<div class="flex align-center pl-10 pr-10" style="padding-left:10;padding-right:10">
				// 			  <div style="background:${color};width:10px;height:10px;border-radius:50%;"></div>
				// 			  <div style="margin-left: 10px;">${data}</div>
				// 			</div>
				// 		  `;

				// 			if (goal && goal.goals && goal.goals.length > 0) {
				// 				tooltipContent += goal.goals.map((item) => `
				// 			  <div class="flex align-center pl-10 pr-10" style="padding-left:10;padding-right:10">
				// 				<div style="background:${item.strokeColor};width:10px;height:5px;"></div>
				// 				<div style="margin-left: 10px;">${item.name}</div>
				// 				<div style="margin-left: 10px;">${item.value}</div>
				// 			  </div>
				// 			`).join('');
				// 			}

				// 			tooltip.innerHTML = tooltipContent;
				// 			document.body.appendChild(tooltip);

				// 			// Store the current tooltip reference
				// 			currentTooltip = tooltip;

				// 			setTimeout(() => {
				// 				tooltip.remove();
				// 			}, 10000);
				// 		}
				// 	},
				// }
			},
			plotOptions: {
				bar: {
					horizontal: false,
					borderRadius: 10, // Set border-radius for the bars
					distributed: true
				}
			},
			colors: colors,
			dataLabels: {
				enabled: false // Disable data labels
			},
			legend: {
				show: false // Hide the legend
			},
			xaxis: {
				labels: {
					show: false // Hide x-axis labels
				}
			},
			yaxis: {
				labels: {
					show: false // Hide y-axis labels
				}
			},
			annotations: {
				// points: annotations
			},
			tooltip: {
				cssClass: 'custom-apex-tooltip', // Apply custom CSS class
				enabled: true,
				theme: 'light',
				style: {
					fontSize: '12px',
					fontFamily: 'Arial, sans-serif'
				},
				marker: {
					show: false,
				},
				items: {
					display: 'flex'
				},
				fixed: {
					enabled: true,
					position: 'topRight',
					offsetX: 50,
					offsetY: -80,
				},
				custom: function ({ series, seriesIndex, dataPointIndex, w }) {
					const data = w.globals.series[seriesIndex][dataPointIndex];
					const header = w.globals.labels[dataPointIndex];
					const color = w.globals.colors[dataPointIndex];
					const goal = dataSet[dataPointIndex]; // Assuming dataSet is defined somewhere

					let tooltipContent = `
					<div class="custom-tooltip">
					  <div class="text-dark text-center" style="padding:10px 10px 5px 10px;background:#EDEDED">${header}</div>
					  <div class="flex align-center" style="padding-left:10;padding-right:10px">
						<div class="text-dark" style="background:${color};width:10px;height:10px;border-radius:50%;"></div>
						<div class="text-dark" style="margin-left: 10px;">${data}</div>
					  </div>
				  `;

					if (goal && goal.goals && goal.goals.length > 0) {
						tooltipContent += goal.goals.map((item, i) => `
					  <div class="flex align-center pl-10 pr-10 " style="padding-left:10;padding-right:10px;${i == goal.goals.length - 1 ? 'padding-bottom:10;' : ''}">
						<div style="background:${item.strokeColor};width:10px;height:5px;"></div>
						<div class="text-dark" style="margin-left: 10px;">${item.name}</div>
						<div class="text-dark" style="margin-left: 10px;"">${item.value}</div>
					  </div>
					`).join('');
					}

					tooltipContent += `</div>`;

					return tooltipContent;
				}
			}
		};

		// Create a new chart instance
		var chart = new ApexCharts(container, options);

		// Render the chart
		chart.render();

	}

	function renderGraph2(windowWidth) {
		$('#immune_click').css('box-shadow', 'inset rgba(70, 70, 70, 0.5) 2px 0px 7px 5px');
		var graphData = graph[graphIndex];

		// Reference the card-body element
		var cardBody = document.querySelector('.grapher');
		cardBody.innerHTML = '';
		// Extract graph details
		var graphId = graphData.graph_id;
		var graphName = graphData.graph_name;
		var bars = graphData.bars;

		var container = document.createElement('div');
		container.setAttribute('id', graphId);
		container.setAttribute('class', 'graph-container'); // Optionally, add a class for styling
		container.style.paddingRight = '10px';
		cardBody.appendChild(container);
		var power = document.getElementById('power-graph');
		var nameGraph = document.getElementById('name-graph');
		var titleGraph = document.getElementById('title-graph');
		power.innerHTML = graph[graphIndex].graph_power + '%';
		nameGraph.innerHTML = graph[graphIndex].graph_name;
		if (graphIndex == 0) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-1">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#19d1ff"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">บริหารจัดการตน</span>
								</div>
								<div class="flex flex-start mt-2">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FFD65F"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">ทุนทางจิตวิทยา</span>
								</div>
								<div class="flex flex-start mt-2">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FDA0B4"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">คุณค่าในตนเอง</span>
								</div>
								<div class="flex flex-start mt-2">
									<div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#81EEEB"></div>
									<span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังตัวตน</span>
								</div>
			`;
		}
		if (graphIndex == 1) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#19d1ff"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังครอบครัว</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FFD65F"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังสถานศึกษา</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FDA0B4"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังเพื่อนและกิจกรรม</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#81EEEB"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">พลังชุมชน</span>
              </div>
			`;
		}
		if (graphIndex == 2) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#19d1ff"></div>
                <span class="ml-0 text-shadow-1 f-observe" style="${windowWidth < 500 ? 'font-size:10px' : ''}">การคล้อยตาม</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#FFD65F"></div>
                <span class="ml-0 text-shadow-1 text-left f-observe" style="${windowWidth < 500 ? 'font-size:10px' : ''}">ความรุนแรงในครอบครัว</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#FDA0B4"></div>
                <span class="ml-0 text-shadow-1 text-left f-observe" style="${windowWidth < 500 ? 'font-size:10px' : ''}">การเป็นแบบอย่าง</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#81EEEB"></div>
                <span class="ml-0 text-shadow-1 text-left f-observe" style="${windowWidth < 500 ? 'font-size:10px' : ''}">การเปิดรับ</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#EC623C"></div>
                <span class="ml-0 text-shadow-1 text-left f-observe" style="${windowWidth < 500 ? 'font-size:10px' : ''}">เจตคติทางบวก</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="    min-width: 25px;background:#B2DE82"></div>
                <span class="ml-0 text-shadow-1 text-left f-observe" style="${windowWidth < 500 ? 'font-size:10px' : ''}">รับรู้แหล่งซื้อสารเสพติด</span>
              </div>
			`;
		}
		if (graphIndex == 3) {
			titleGraph.innerHTML = `
			<div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#19d1ff"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">ของตน</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FFD65F"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">กลุ่มเคยลอง</span>
              </div>
              <div class="flex flex-start mt-2">
                <div class="label-graph mr-2 shadow-2" style="min-width: 25px;background:#FDA0B4"></div>
                <span class="ml-0 text-left text-shadow-1" style="${windowWidth < 500 ? 'font-size:10px' : ''}">กลุ่มไม่เคยลอง</span>
              </div>
			`;
		}
		var headerTable = '';
		var bodyDrugTable = '';
		var bodyNoneDrugTable = '';
		var tableElement = document.createElement('div');
		const dataSet = graph[graphIndex].bars.map((ga) => {
			headerTable += `<td>${ga.bar_name}</td>`;
			bodyDrugTable += `<td class="text-center">
                                <span class="rounded" 
								style="background-color:
								${(ga.norm_drug > 3.50) ? '#005ED1' :
					(ga.norm_drug >= 3.00 && ga.norm_drug < 3.50) ? '#4CBB17' :
						(ga.norm_drug >= 2.00 && ga.norm_drug < 3.00) ? '#FFC000' :
							'#DC143C'
				}
								;color:${(ga.norm_drug >= 2.00 && ga.norm_drug < 3.00) ? 'black' : 'white'};padding: 4px;">${parseFloat(ga.norm_drug).toFixed(2)}</span>
                            </td>`;
			bodyNoneDrugTable += `<td class="text-center">
                                <span class="rounded" 
								style="background-color:
								${(ga.norm_none_drug > 3.50) ? '#005ED1'
					: (ga.norm_none_drug >= 3.00 && ga.norm_none_drug < 3.50) ? '#4CBB17'
						: (ga.norm_none_drug >= 2.00 && ga.norm_none_drug < 3.00) ? '#FFC000'
							: '#DC143C'
				}
								;color:${(ga.norm_none_drug >= 2.00 && ga.norm_none_drug < 3.00) ? 'black' : 'white'};padding: 4px;">${parseFloat(ga.norm_none_drug).toFixed(2)}</span>
                            </td>`;
			return {
				x: ga.bar_name,
				y: Number(ga.bar_value).toFixed(2),
				goals: [
					{
						name: `PR50 กลุ่มเคยลอง`,
						value: ga.norm_drug,
						strokeWidth: this.indexGraph !== 2 ? 10 : 5,
						strokeColor: "#D05D5D",
						markers: {
							size: 100,
							shape: "circle"
						}
					},
					{
						name: `PR50 กลุ่มไม่เคยลอง`,
						value: ga.norm_none_drug,
						strokeWidth: this.indexGraph !== 2 ? 10 : 5,
						strokeColor: "#5DD063",
						markers: {
							size: 15,
						}
					}
				]
			};
		});

		var tableHTML = `<div class="col-md-12 mb-3"><table class="table" style="width:100%;">
		<tr>
			<th></th>`+
			headerTable +
			`</tr>
		<tr>
			<td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
			`+ bodyDrugTable + `
		</tr>
		<tr>
			<td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
			`+ bodyNoneDrugTable + `
		</tr>
	</table></div>`;

		tableElement.innerHTML = tableHTML;

		var heightG = 150;
		if (windowWidth > 500) {
			tableGraph.style.backgroundColor = '#fff';
			tableGraph.style.borderRadius = '5px';
			tableGraph.style.marginLeft = '10px';
			tableGraph.style.width = '63%';
			tableGraph.appendChild(tableElement);
			heightG = tableGraph.clientHeight;
			nameGraph.style.fontSize = '25px';
			nameGraph.style.fontWeight = 'bold';
			console.log('heightG >> ', tableGraph);
		} else {
			nameGraph.style.fontSize = '20px';
			nameGraph.style.fontWeight = 'bold';
		}

		const colors = ['#19d1ff', '#FFD65F', '#FDA0B4', '#81EEEB', '#EC623C', '#B2DE82'];
		let currentTooltip = null;
		var options = {
			series: [
				{
					name: "",
					data: dataSet
				}
			],
			chart: {
				height: heightG,
				width: 150,
				type: "bar",
				background: 'transparent', // Set background to white
				dropShadow: {
					enabled: true,
					top: 2,
					left: 2,
					blur: 4,
					opacity: 0.2 // Add shadow to the graph
				},
				toolbar: {
					show: false
				},
				events: {
					dataPointSelection: function (event, chartContext, config) {
						const { dataPointIndex, seriesIndex } = config;

						// Remove the previous tooltip if it exists
						if (currentTooltip) {
							console.log('case #1');
							currentTooltip.remove();
							currentTooltip = null;
						}

						if (dataPointIndex !== -1) {
							console.log('case #2');
							const data = chartContext.w.globals.series[seriesIndex][dataPointIndex];
							const header = chartContext.w.globals.labels[dataPointIndex];
							const color = chartContext.w.globals.colors[dataPointIndex];
							const goal = dataSet[dataPointIndex];

							const tooltip = document.createElement('div');
							tooltip.className = 'custom-tooltip-2';
							tooltip.style.left = `${200}px`;
							tooltip.style.top = `${500}px`;

							let tooltipContent = `
							<div class="pt-10 pb-10 pl-10 pr-10" style="background:#EDEDED;padding:10px 10px 5px 10px">${header}</div>
							<div class="flex align-center pl-10 pr-10" style="padding-left:10;padding-right:10">
							  <div style="background:${color};width:10px;height:10px;border-radius:50%;"></div>
							  <div style="margin-left: 10px;">${data}</div>
							</div>
						  `;

							if (goal && goal.goals && goal.goals.length > 0) {
								tooltipContent += goal.goals.map((item) => `
							  <div class="flex align-center pl-10 pr-10" style="padding-left:10;padding-right:10">
								<div style="background:${item.strokeColor};width:10px;height:5px;"></div>
								<div style="margin-left: 10px;">${item.name}</div>
								<div style="margin-left: 10px;">${item.value}</div>
							  </div>
							`).join('');
							}

							tooltip.innerHTML = tooltipContent;
							document.body.appendChild(tooltip);

							// Store the current tooltip reference
							currentTooltip = tooltip;

							setTimeout(() => {
								tooltip.remove();
							}, 5000);
						}
					},
				}
			},
			plotOptions: {
				bar: {
					horizontal: false,
					borderRadius: 10, // Set border-radius for the bars
					distributed: true
				}
			},
			colors: colors,
			dataLabels: {
				enabled: false // Disable data labels
			},
			legend: {
				show: false // Hide the legend
			},
			xaxis: {
				labels: {
					show: false // Hide x-axis labels
				}
			},
			yaxis: {
				labels: {
					show: false // Hide y-axis labels
				}
			},
			annotations: {
				// points: annotations
			},
			tooltip: {
				cssClass: 'custom-apex-tooltip', // Apply custom CSS class
				enabled: false,
				theme: 'light',
				style: {
					fontSize: '12px',
					fontFamily: 'Arial, sans-serif'
				},
				marker: {
					show: false,
				},
				items: {
					display: 'flex'
				},
				fixed: {
					enabled: true,
					position: 'topRight',
					offsetX: 50,
					offsetY: -80,
				},
				custom: function ({ series, seriesIndex, dataPointIndex, w }) {
					const data = w.globals.series[seriesIndex][dataPointIndex];
					const header = w.globals.labels[dataPointIndex];
					const color = w.globals.colors[dataPointIndex];
					const goal = dataSet[dataPointIndex]; // Assuming dataSet is defined somewhere

					let tooltipContent = `
					<div class="custom-tooltip">
					  <div class="text-dark text-center" style="padding:10px 10px 5px 10px;background:#EDEDED">${header}</div>
					  <div class="flex align-center" style="padding-left:10;padding-right:10px">
						<div class="text-dark" style="background:${color};width:10px;height:10px;border-radius:50%;"></div>
						<div class="text-dark" style="margin-left: 10px;">${data}</div>
					  </div>
				  `;

					if (goal && goal.goals && goal.goals.length > 0) {
						tooltipContent += goal.goals.map((item, i) => `
					  <div class="flex align-center pl-10 pr-10 " style="padding-left:10;padding-right:10px;${i == goal.goals.length - 1 ? 'padding-bottom:10;' : ''}">
						<div style="background:${item.strokeColor};width:10px;height:5px;"></div>
						<div class="text-dark" style="margin-left: 10px;">${item.name}</div>
						<div class="text-dark" style="margin-left: 10px;"">${item.value}</div>
					  </div>
					`).join('');
					}

					tooltipContent += `</div>`;

					return tooltipContent;
				}
			}
		};
		// Create a new chart instance
		var chart = new ApexCharts(container, options);

		// Render the chart
		chart.render();
		// if (windowWidth > 500) {
		// 	tableGraph.style.backgroundColor = '#fff';
		// 	tableGraph.style.borderRadius = '5px';
		// 	tableGraph.style.marginLeft = '10px';
		// 	tableGraph.style.width = '63%';
		// 	tableGraph.appendChild(tableElement);
		// }
	}

	if (currentUrl.endsWith("evaluation_form/evaluationExplanation")) {
		if (localStorage.getItem('user_graph')) {
			evaluation_form.clear();
		}
		localStorage.removeItem('user_graph');
	}

	if (currentUrl.endsWith("evaluation_form/evaluationExplanation/question_basic") || currentUrl.endsWith("evaluation_form/evaluationExplanation/question_immune") || currentUrl.endsWith("evaluation_form/evaluationExplanation/question_contextual") || currentUrl.endsWith("evaluation_form/evaluationExplanation/question_risky")) {
		if (complete_qt_basic && complete_qt_immune && complete_qt_contextual && complete_qt_risky) {
			console.log('pass in', complete_qt_basic, complete_qt_immune, complete_qt_contextual, complete_qt_risky);
			evaluation_form.submitForm();
		} else {
			console.log('not ready');
		}
	}

	if (currentUrl.endsWith("evaluation_form/evaluationExplanation/question_graph")) {

		var graph = getWithExpiry('user_graph');
		// Reference the card-body element
		var cardBody = document.querySelector('.card-body');

		// Iterate over the graph array
		graph.forEach(function (graphData, index) {
			// Extract graph details
			var graphId = graphData.graph_id;
			var graphName = graphData.graph_name;
			var bars = graphData.bars;

			// Create container element for the chart
			var container = document.createElement('div');
			container.setAttribute('id', graphId);
			container.setAttribute('class', 'graph-container'); // Optionally, add a class for styling

			// Append the container to the card-body element
			cardBody.appendChild(container);

			// Extract bar data
			var categories = [];
			var values = [];
			bars.forEach(function (bar) {
				categories.push(bar.bar_name);
				values.push(
					{
						x: bar.bar_name,
						y: bar.bar_value,
						goals: [
							{
								name: `PR50 กลุ่มไม่เคยลอง`,
								value: bar.norm_none_drug,
								strokeHeight: 4,
								strokeDashArray: 0,
								strokeColor: "#34A853",
							},
							{
								name: `PR50 กลุ่มเคยลอง`,
								value: bar.norm_drug,
								strokeHeight: 3,
								strokeDashArray: 0,
								strokeColor: "red",
							}
						]
					}
				);

				console.log(bar);

				// parseFloat(bar.bar_value)
			});

			// การันตี สี by ปอนด์
			var options = {
				chart: {
					type: 'bar',
					height: 350,
					width: '100%',
					toolbar: {
						show: true,
					}
				},
				// colors: ["#4CBFF4"],

				fill: {
					colors: '#FBBC05',
					opacity: 0.8
				},
				plotOptions: {
					bar: {
						horizontal: false,
						columnWidth: '40%'
					}
				},
				dataLabels: {
					enabled: false
				},
				series: [{
					name: 'ผลลัพธ์',
					data: values
				}],
				xaxis: {
					categories: categories,
					title: {
						text: 'Bars'
					}
				},
				yaxis: {
					title: {
						text: 'Values'
					}
				},
				title: {
					text: graphName,
					align: 'center'
				},
				legend: {
					show: true,
					showForSingleSeries: true,
					customLegendItems: ["ผลสำรวจ", "PR50 กลุ่มเคยลอง", "PR50 กลุ่มไม่เคยลอง"],
					markers: {
						fillColors: ["#FBBC05", "#D05D5D", "#34A853"]
					}
				}
			};

			// Create a new chart instance
			var chart = new ApexCharts(container, options);

			// Render the chart
			chart.render();

			// Add divider between graphs, except for the last one
			if (index < graph.length - 1) {
				var divider = document.createElement('hr');
				cardBody.appendChild(divider);
			}
		});
	}

	if (windowWidth < 500) {
		$('.recommence-body').css('font-size', '0.8rem');
	}

	$('#btnConfirmEvaluate').click(() => {
		$('#addModal').modal('show');
	});

	$('#drug_history-1').on('change', function (e) {
		console.log(e.target.value);
		$('#type_of_drugs_select').css('display', 'block');
	});
	$('#drug_history-2').on('change', function (e) {
		console.log(e.target.value);
		$('#type_of_drugs_select').css('display', 'none');
	});

	function handleChange(name, input) {
		const selectedOption = document.querySelector(`input[name="${name}"]:checked`);
		if (selectedOption && selectedOption.value === 'other') {
			$(`#${input}`).css('display', 'block');
		} else {
			$(`#${input}`).css('display', 'none'); // Corrected to hide the input
		}
	}

	if (!$('#other_num_siblings_input').val()) {
		$('#other_num_siblings_input_val').prop('checked', false);
		$('#other_num_siblings_input').css('display', 'none');
	}

	if (!$('#other_family_status_input').val()) {
		$('#othamily_status_input_val').prop('checked', false);
		$('#other_family_status_input').css('display', 'none');
	}

	if (!$('#other_father_occupation_input').val()) {
		$('#other_father_occupation_input_val').prop('checked', false);
		$('#other_father_occupation_input').css('display', 'none');
	}

	if (!$('#other_mother_occupation_input').val()) {
		$('#other_mother_occupation_input_val').prop('checked', false);
		$('#other_mother_occupation_input').css('display', 'none');
	}

	document.querySelectorAll(`input[name="num_siblings"]`).forEach(radio => {
		radio.addEventListener('change', () => handleChange('num_siblings', 'other_num_siblings_input'));
	});
	document.querySelectorAll(`input[name="family_status"]`).forEach(radio => {
		radio.addEventListener('change', () => handleChange('family_status', 'other_family_status_input'));
	});
	document.querySelectorAll(`input[name="father_occupation"]`).forEach(radio => {
		radio.addEventListener('change', () => handleChange('father_occupation', 'other_father_occupation_input'));
	});
	document.querySelectorAll(`input[name="mother_occupation"]`).forEach(radio => {
		radio.addEventListener('change', () => handleChange('mother_occupation', 'other_mother_occupation_input'));
	});

	$(document).on('change', '#set_order_by', function () {
		$('input[name="order_by"]').val($(this).val());
		$('button[name="submit"]').click();
	});

	$('#share-event').on('click', function () {
		$('#share-list').toggle();
	});
	$('#immune_click').on('click', function () {
		graphIndex = 0;
		// $(this).css('background', '#B19644');
		$(this).css('box-shadow', 'inset rgba(70, 70, 70, 0.5) 2px 0px 7px 5px');
		$('#negative_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#risky_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#positive_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		renderGraph(windowWidth);
	});
	$('#positive_click').on('click', function () {
		// $(this).css('background', '#AA6F7B');
		$(this).css('box-shadow', 'inset rgba(70, 70, 70, 0.5) 2px 0px 7px 5px');
		$('#immune_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#negative_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#risky_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		graphIndex = 1;
		renderGraph(windowWidth);
	});
	$('#negative_click').on('click', function () {
		// $(this).css('background', '#5BA4A2');
		$(this).css('box-shadow', 'inset rgba(70, 70, 70, 0.5) 2px 0px 7px 5px');
		$('#immune_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#risky_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#positive_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		graphIndex = 2;
		renderGraph(windowWidth);
	});
	$('#risky_click').on('click', function () {
		// $(this).css('background', '#9B434A');
		$(this).css('box-shadow', 'inset rgba(70, 70, 70, 0.5) 2px 0px 7px 5px');
		$('#immune_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#negative_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		$('#positive_click').css('box-shadow', 'rgba(70, 70, 70, 0.53) -1px 6px 3px 2px');
		graphIndex = 3;
		renderGraph(windowWidth);
	});

	$('#editModal').on('shown.bs.modal', function () {
		$('#edit_remark').focus();
	});


	$('#btnSave').click(function () {
		$('#addModal2').modal('hide');
		$('#addModal').modal('hide');
		$('.modal-backdrop').removeClass('show').addClass('d-none');

		var frm_data = $('#formEvaluationBasic').serializeObject();
		var customFields = {
			'family_status': 'other_family_status_input',
			'num_siblings': 'other_num_siblings_input',
			'father_occupation': 'other_father_occupation_input',
			'mother_occupation': 'other_mother_occupation_input',
			'consult_people': 'other_consult_people_input',
			'drug_history': 'other_drug_input'
		};

		var requiredFields = ['province', 'district', 'age', 'gender', 'education_status', 'family_income', 'drug_history'];
		var isValid = true;
		var hasScrolled = false;

		// Check required fields
		requiredFields.forEach(function (field) {
			var validateElement = $('#' + field + '_validate');
			var fieldElement = $('#' + field + '_id');
			if (!frm_data[field]) {
				validateElement.removeClass('d-none');
				if (fieldElement) {
					fieldElement.addClass('border border-danger');
				}
				console.log(field + ' NULL');
				console.log(validateElement, '<ID:', fieldElement);
				if (!hasScrolled) {
					var offset = validateElement.offset();
					if (offset) {
						$('html, body').animate({
							scrollTop: offset.top
						}, 1000);
						hasScrolled = true;
					}
				}
				isValid = false;
			} else {
				validateElement.addClass('d-none');
				fieldElement.removeClass('border border-danger');
			}
		});

		// Check custom fields
		$.each(customFields, function (key, inputId) {
			var inputElement = $('#' + inputId);
			console.log('inputElement > ', inputElement);
			if (frm_data[key] == 'other' && !inputElement.val()) {
				console.log(key + ' NULL');
				isValid = false;
				$('#' + key + '_validate').removeClass('d-none');
				inputElement.addClass('border border-danger');
				if (!hasScrolled) {
					var offset = inputElement.offset();
					if (offset) {
						$('html, body').animate({
							scrollTop: offset.top
						}, 1000);
						hasScrolled = true;
					}
				}
			} else {
				$('#' + key + '_validate').addClass('d-none');
				inputElement.removeClass('border border-danger');
			}
		});

		// Special case for `consult_people` as it is an array
		if (frm_data['consult_people[]'].length === 0) {
			$('#consult_people_validate').removeClass('d-none');
			$('#consult_people_id').addClass('border border-danger');
			console.log('consult_people NULL');
			if (!hasScrolled) {
				var offset = $('#consult_people_validate').offset();
				if (offset) {
					$('html, body').animate({
						scrollTop: offset.top
					}, 1000);
					hasScrolled = true;
				}
			}
			isValid = false;
		} else {
			$('#consult_people_validate').addClass('d-none');
			$('#consult_people_id').removeClass('border border-danger');
		}

		if (isValid) {
			evaluation_form.saveFormData();
		}
		return isValid;
	});

	$('#btnSaveToForm').click(function () {
		$('#addModal').modal('hide');
		window.location = site_url('evaluation_form/evaluationExplanation/question_basic');
		return false;
	});//click

	$('#btnSaveImmune').click(() => {
		$('#addModal').modal('hide');
		evaluation_form.saveFormImmuneData();
		return false;
	});
	$('#btnSaveContextual').click(() => {
		$('#addModal').modal('hide');
		evaluation_form.saveFormContextualData();
		return false;
	});
	$('#btnSaveRisky').click(() => {
		$('#addModal').modal('hide');
		evaluation_form.saveFormRiskyData();
		return false;
	});

	if (window.location == site_url('evaluation_form/evaluationExplanation/question_basic')) {
		if ($('#province_id').val() != '') {
			// console.log('$().val()', userDistrict);
			if (userDistrict) {
				evaluation_form.selectProvince($('#province_id').val(), userDistrict);
			} else {
				evaluation_form.selectProvince($('#province_id').val());
			}
		}
	}

	$('#province_id').change(function () {
		var province = $(this).val();
		evaluation_form.selectProvince(province);
	});
});


