<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title">
			<i class="fas fa-chart-bar me-2"></i>
			<span id="table-title">ระดับภาคทั่วประเทศ</span>
		</h3>
	</div>
	<div class="card-body">
		<div class="d-flex justify-content-center justify-content-md-start align-items-center mb-2">
			<span>เลือกปี </span>
			<select class="form-control ml-2" style="width: 100px;" name="year" id="year" required>
				<?php echo count($selectYears);
				if (count($selectYears) > 0) : ?>
					<?php foreach ($selectYears as $year) : ?>
						<option value="<?= $year['year'] ?>"><?= $year['year'] + 543 ?></option>
					<?php endforeach ?>
				<?php else : ?>
					<option value="" disabled selected>-</option>
				<?php endif ?>
			</select>

			<button class="btn btn-info ml-2" type="button" onclick="search()" <?php if (!(count($selectYears) > 0)) echo 'disabled' ?>>
				ยืนยัน
			</button>
		</div>
		<div class="chart-card row mt-3"></div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
	function search() {
		const formElement = document.getElementById('year');
		const year = formElement.value;
		graph.getGraph(year);
	}

	var graph = {
		getGraph: function(year) {
			var api_url = site_url('api/graph/getYearSummarySection/' + (year ? year : ''));
			$.ajax({
				method: 'GET',
				url: api_url,
				dataType: 'json',
				data: '',
				success: async function(results) {
					if (results.status == "true") {
						var cardBody = document.querySelector('.chart-card');
						cardBody.innerHTML = "";
						var graph = results.data;
						graph.forEach(function(graphData, index) {
							var graphId = graphData.graph_id;
							var graphName = graphData.graph_name;
							var bars = graphData.bars;

							var container = document.createElement('div');
							container.setAttribute('id', graphId);
							container.setAttribute('class', 'col-md-12 mb-3');

							container.style.background = '#fff';
							container.style.borderRadius = '5px';
							container.style.padding = '10px 0px';

							var space = document.createElement('hr');

							cardBody.appendChild(container);
							var serieValues = [];
							var categories = [];
							var point = [];
							var headerTable = '';
							var bodyDrugTable = '';
							var bodyNoneDrugTable = '';
							bars.forEach(function(bar) {
								categories = [];
								var values = [];
								var scores = bar.values;
								scores.forEach(function(score) {
									var section = score.section_name;
									var average_score = score.average_score;
									values.push(average_score);
									categories.push(section);
									parseFloat(average_score)
								});

								serieValues.push({
									name: bar.graph_bar_name,
									data: values
								});
								headerTable += `<td class="text-center">${bar.graph_bar_name}</td>`;
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
							});

							const colors = ['#484e60', '#9499b7', '#fef8ca', '#d7cbe4', '#5c99c4', '#3b5b8b'];

							var options = {
								chart: {
									type: 'bar',
									height: 450,
									width: '100%',
									toolbar: {
										show: true,
									},
								},
								colors: colors,
								plotOptions: {
									bar: {
										horizontal: false,
										borderRadius: 5,
										columnWidth: '60%',
									}
								},
								dataLabels: {
									enabled: false
								},
								series: serieValues,
								xaxis: {
									categories: categories,
								},
								title: {
									text: graphName,
									align: 'center'
								},
							};

							var tableHTML = `
							<div class="col-md-12 mb-5 mt-3">
								<table class="table" style="width:100%;">
									<tr>
										<th></th>
										${headerTable}
									</tr>
									<tr>
										<td><i class='fas fa-smoking-ban' style="color: green;"></i> PR50 กลุ่มไม่เคยลอง</td>
										${bodyDrugTable}
									</tr>
									<tr>
										<td><i class='fas fa-pills' style="color: red;"></i> PR50 กลุ่มเคยลอง</td>
										${bodyNoneDrugTable}
									</tr>
								</table>
							</div>`;

							var tableElement = document.createElement('div');
							tableElement.innerHTML = tableHTML;

							var chart = new ApexCharts(container, options);
							chart.render();
							container.appendChild(tableElement);
							if (index < graph.length - 1) {
								var divider = document.createElement('hr');
								cardBody.appendChild(divider);
							}
						});
					}
				},
				error: function(jqXHR, exception) {
					ajaxErrorMessage(jqXHR, exception);
				}
			});
			return false;
		}
	};

	document.addEventListener('DOMContentLoaded', function() {
		graph.getGraph();
	});
</script>