<div class="card">
	<div class="card-header bg-success">
		<h3 class="card-title">
			<i class="fa fa-list-alt me-2"></i>
			<span id="table-title">ปรับปรุงข้อมูลกราฟ</span>
		</h3>
	</div>
	<div class="card-body">
		<form action="{formEndpoint}" method="get" id="syncYear">
			<div class="d-flex justify-content-center justify-content-md-start align-items-center mb-2">
				<span>เลือกปี </span>
				<select class="form-control ml-2" style="width: 100px;" name="year" required>
					<?php echo count($selectYears);
					if (count($selectYears) > 0) : ?>
						<?php foreach ($selectYears as $year) : ?>
							<option value="<?= $year['year'] ?>"><?= $year['year'] + 543 ?></option>
						<?php endforeach ?>
					<?php else : ?>
						<option value="" disabled selected>-</option>
					<?php endif ?>
				</select>
				<input type="hidden" hidden name="submitSyncYear">
				<button class="btn btn-info ml-2" type="button" data-toggle="modal" data-target="#confirmSaveModal" <?php if (!(count($selectYears) > 0)) echo 'disabled' ?>>
					ยืนยัน
				</button>
			</div>
		</form>
		<div class="chart-card row mt-3"></div>
	</div>
</div>

<div class="modal fade" id="confirmSaveModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-warning">
				<h5 class="modal-title">บันทึกข้อมูล</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				ยืนยันการปรับปรุงข้อมูล ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submitForm()">บันทึก</button>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
	function submitForm() {
		const formElement = document.getElementById('syncYear');
		const year = formElement.year.value;
		console.log(year);

		$.ajax({
			method: formElement.method,
			url: formElement.action + `/${year}`,
			contentType: false,
			processData: false,
			success: function(results) {
				$('#confirmSaveModal').modal('hide');

				const alertType = results.status ? 'success' : 'warning';
				notify('แจ้งเตือน', results.message, alertType, 'center');

				setTimeout(() => {
					window.location.reload();
				}, 2000);
			},
			error: function(jqXHR, exception) {
				ajaxErrorMessage(jqXHR, exception);
			}
		});
	}

	var sync_graph = {
		getGraph: function() {
			var frm_graph = site_url('api/graph/getYearSummary');

			$.ajax({
				method: 'GET',
				url: frm_graph,
				dataType: 'json',
				data: '',
				success: async function(results) {
					if (results.status == "true") {
						var cardBody = document.querySelector('.chart-card');
						var graph = results.data;
						// Iterate over the graph array
						graph.forEach(function(graphData, index) {
							// Extract graph details
							var graphId = graphData.graph_id;
							var graphName = graphData.graph_name + '( 3 ปีย้อนหลัง)';
							var bars = graphData.bars;

							// Create container element for the chart
							var container = document.createElement('div');
							container.setAttribute('id', graphId);
							if (index === graph.length - 1) {
								container.setAttribute('class', 'col-md-6 mb-3'); // Optionally, add a class for styling
							} else {
								container.setAttribute('class', 'col-md-6 mb-3'); // Optionally, add a class for styling
							}
							// container.appendChild(tableElement);
							container.style.background = '#fff';
							container.style.borderRadius = '5px';
							container.style.padding = '10px 0px';

							var space = document.createElement('hr');

							// Append the container to the card-body element
							cardBody.appendChild(container);

							// Extract bar data
							var categories = [];
							var values = [];
							var point = [];
							var headerTable = '';
							var bodyDrugTable = '';
							var bodyNoneDrugTable = '';
							bars.forEach(function(bar) {

								headerTable += `<td>${bar.bar_name}</td>`;
								bodyDrugTable += `<td class="text-center">
                                <span class="rounded" 
								style="background-color:
								${(bar.norm_drug > 3.50) ? '#005ED1' :
									(bar.norm_drug >= 3.00 && bar.norm_drug < 3.50) ? '#4CBB17' :
										(bar.norm_drug >= 2.00 && bar.norm_drug < 3.00) ? '#FFC000' :
											'#DC143C'
								}
								;color:${(bar.norm_drug >= 2.00 && bar.norm_drug < 3.00) ? 'black' : 'white'};padding: 4px;">${parseFloat(bar.norm_drug).toFixed(2)}</span>
                            </td>`;
								bodyNoneDrugTable += `<td class="text-center">
                                <span class="rounded" 
								style="background-color:
								${(bar.norm_none_drug > 3.50) ? '#005ED1'
									: (bar.norm_none_drug >= 3.00 && bar.norm_none_drug < 3.50) ? '#4CBB17'
										: (bar.norm_none_drug >= 2.00 && bar.norm_none_drug < 3.00) ? '#FFC000'
											: '#DC143C'
								}
								;color:${(bar.norm_none_drug >= 2.00 && bar.norm_none_drug < 3.00) ? 'black' : 'white'};padding: 4px;">${parseFloat(bar.norm_none_drug).toFixed(2)}</span>
                            </td>`;

								categories.push(bar.bar_name);
								values.push({
									x: bar.bar_name,
									y: bar.bar_value,
									goals: [{
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
											strokeColor: "#FF4560",
										}
									]
								});

								point.push({
									x: bar.bar_name,
									y: bar.norm_drug,
									marker: {
										size: 0,
										fillColor: '#fff',
										strokeColor: 'red',
										radius: 2,
										enabled: false // Disable the marker
									},
									label: {
										borderColor: '#FF4560',
										offsetY: 8,
										style: {
											color: '#fff',
											background: '#FF4560',
											fontSize: '8px'
										},

										text: parseFloat(bar.norm_drug).toFixed(2),
									}
								}, {
									x: bar.bar_name,
									y: bar.norm_none_drug,
									marker: {
										size: 0,
										fillColor: '#fff',
										strokeColor: 'red',
										radius: 2,
										enabled: false // Disable the marker
									},
									label: {
										borderColor: '#34A853',
										offsetY: 8,
										style: {
											color: '#fff',
											background: '#34A853',
											fontSize: '8px'
										},

										text: parseFloat(bar.norm_none_drug).toFixed(2),
									}
								});


								// parseFloat(bar.bar_value)
							});

							var colors = getGraphBarColor();

							var options = {
								chart: {
									type: 'bar',
									height: 500,
									width: '100%',
									toolbar: {
										show: true,
									},
								},
								// colors: ["#4CBFF4"],
								colors: colors,
								// fill: {
								// 	colors: '#FBBC05',
								// 	opacity: 0.8
								// },
								plotOptions: {
									bar: {
										horizontal: false,
										borderRadius: 10, // Set border-radius for the bars
										distributed: true,
										columnWidth: '40%',
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
									customLegendItems: ["PR50 กลุ่มเคยลอง", "PR50 กลุ่มไม่เคยลอง"],
									markers: {
										fillColors: ["#FF4560", "#34A853"]
									}
								},
								annotations: {
									points: point
								}
							};

							var tableHTML = `<div class="col-md-12 mb-3"><table class="table" style="width:100%;">
                    <tr>
                        <th></th>` +
								headerTable +
								`</tr>
                    <tr>
                        <td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
						` + bodyDrugTable + `
                    </tr>
                    <tr>
                        <td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
						` + bodyNoneDrugTable + `
                    </tr>
                </table></div>`;

							var tableElement = document.createElement('div');
							tableElement.innerHTML = tableHTML;

							// Create a new chart instance
							var chart = new ApexCharts(container, options);
							// Render the chart
							chart.render();
							container.appendChild(tableElement);
							// Add divider between graphs, except for the last one
							if (index < graph.length - 1) {
								var divider = document.createElement('hr');
								cardBody.appendChild(divider);
							}
						});
					}
				},
				error: function(jqXHR, exception) {
					ajaxErrorMessage(jqXHR, exception);
					// loading_on_remove(obj);
				}
			});
			return false;
		}
	};

	document.addEventListener('DOMContentLoaded', function() {
		sync_graph.getGraph();
	});
</script>