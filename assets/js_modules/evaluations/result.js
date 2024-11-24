const _serviceEndpoint = base_url();
const _chartColorSet = ["#300240", "#7238C9", "#D806DD", "#EFCD4A", "#0B7EF3", "#FF6FB1"];
const _normColorSet = { positive: "#34A853", negative: "#FF4560" };
let summaryData = [];

//Utilities
function getUriParam(key) {
	const url = new URL(window.location.href);
	const params = new URLSearchParams(url.search);
	const value = params.get(key);

	return value;
}

function sharePage(url = window.location.href) {
	navigator.share({ url: url });
}

//API Service
async function getSummary(userId) {
	console.log("Request sending");
	const response = await $.ajax({
		method: 'GET',
		url: `${_serviceEndpoint}api/graph/getSummary/${userId}`,
		dataType: 'json',
		data: null,
		success: function (response) {
			if (response.status === 'true') {
				console.log('Response => ', response.data);
			} else {
				notify('เกิดข้อผิดพลาด', response.message, 'danger', 'center');
			}
		},
		error: function (jqXHR, exception, responseText) {
			console.log("Request error : ", responseText);
		}, complete: function () {
			console.log("Request end");
		}
	});

	return response.data;
}

async function getAdvice(id) {
	console.log("Request sending");
	const response = await $.ajax({
		method: 'GET',
		url: `${_serviceEndpoint}api/advice/getText/${id}`,
		dataType: 'json',
		data: null,
		success: function (response) {
			if (response.status === 'true') {
				console.log('Response => ', response.data);
			} else {
				notify('เกิดข้อผิดพลาด', response.message, 'danger', 'center');
			}
		},
		error: function (jqXHR, exception, responseText) {
			console.log("Request error : ", responseText);
		}, complete: function () {
			console.log("Request complete");
		}
	});

	return response.data;
}

//Main
$(document).ready(function () {
	initView();
});

async function initView() {
	const userId = getUriParam('id') ?? getUriParam('web_id');
	if (!userId) return;

	summaryData = await getSummary(userId);

	renderNavigateTab();
	renderTabContent();
}

function renderNavigateTab() {
	const navigateTabContainerEl = $("#navigate-tab-container");

	summaryData.forEach((item, index) => {
		const template = `
		<div class="col-12 col-md-6 p-1">
			<div class="cs-navigate-tab p-1" onclick="renderTabContent(${index})">
				<div class="cs-power-chart-container">
					<div class="power-chart" data-graph-id="${item.graph_id}"></div>
				</div>
				<div class="cs-navigate-content">
					${item.graph_name}
				</div>
			</div>
		</div>`;

		navigateTabContainerEl.append(template);
		renderPowerChart(`.power-chart[data-graph-id="${item.graph_id}"]`, +item.graph_power);
	});
}

async function renderTabContent(tabIndex = 0) {
	const titleSelector = "#title";
	const scoreChartSelector = "#score-chart";
	const resultListSelector = "#result-list";

	const graphData = summaryData[tabIndex];
	console.log("selected graph => ", graphData);

	//Set title
	$(titleSelector).text(graphData.graph_name);

	//Render score chart
	renderScoreChart(scoreChartSelector, graphData.bars);

	//Render result list
	const allowAdivceCondition = graphData.advice_send_type === 'send_true';
	$(resultListSelector).data('advice-condition', allowAdivceCondition);
	renderResultList(resultListSelector, graphData.advice_list);

	//Set active navigate tab
	setActiveNavigateTab(tabIndex);
}

function renderPowerChart(selector, power) {
	const options = {
		chart: {
			type: 'radialBar',
			height: '100%',
			width: '100%'
		},
		colors: [_normColorSet['positive']],
		plotOptions: {
			radialBar: {
				hollow: { size: "50%" },
				dataLabels: {
					showOn: "always",
					name: {
						offsetY: '6rem',
						show: true,
						color: _normColorSet['positive'],
						fontSize: "1rem"
					},
					value: { show: false }
				}
			}
		},
		stroke: { lineCap: "round", },
		noData: {
			text: 'N/A',
			align: 'center',
			verticalAlign: 'middle'
		},
		series: [power],
		labels: [power]
	};

	$(selector).html("");
	const chart = new ApexCharts(document.querySelector(selector), options);
	chart.render();
}

function renderScoreChart(selector, data) {
	const createAnnotationPoint = (x, y, type) => ({
		x,
		y: +y,
		marker: { size: 0 },
		label: {
			borderColor: _normColorSet[type],
			offsetY: 8,
			style: {
				color: '#fff',
				background: _normColorSet[type],
				fontSize: '8px'
			},
			text: parseFloat(y).toFixed(2),
		}
	});

	const createGoal = (name, value, type) => ({
		name,
		value: +value,
		strokeHeight: 5,
		strokeColor: _normColorSet[type],
	});

	const annotationPoints = data.flatMap(item => [
		createAnnotationPoint(item.bar_name, item.norm_none_drug, 'positive'),
		createAnnotationPoint(item.bar_name, item.norm_drug, 'negative')

	]);

	const seriesData = data.map(item => ({
		x: item.bar_name,
		y: +item.bar_value,
		goals: [
			createGoal('กลุ่มไม่เคยลอง', item.norm_none_drug, 'positive'),
			createGoal('กลุ่มเคยลอง', item.norm_drug, 'negative')
		]
	}));

	const options = {
		chart: {
			type: 'bar',
			height: 450,
			width: '100%',
			toolbar: { show: false },
		},
		colors: _chartColorSet,
		plotOptions: {
			bar: {
				borderRadius: 10,
				distributed: true,
				columnWidth: '45%',
			}
		},
		dataLabels: { enabled: false },
		legend: { show: false },
		annotations: { points: annotationPoints },
		series: [{
			name: 'POWER',
			data: seriesData
		}]
	};

	$(selector).html("");
	const chart = new ApexCharts(document.querySelector(selector), options);
	chart.render();
}

function renderResultList(selector, data) {
	const resultItemsContainerEl = $(selector);
	const adviceCondition = $(selector).data('advice-condition');

	resultItemsContainerEl.html("");
	data.forEach(item => {
		const template = `
		<div class="cs-result-item mb-1 ${item.status ? '' : 'checked'} ${item.status === adviceCondition ? 'clickable' : ''}" onclick="showAdviceModal('${item.id}')">
			<div class="cs-result-item-icon">
				<i class="fas ${item.status ? 'fa-check' : 'fa-exclamation'}"></i>
			</div>
			<div class="d-flex flex-column">
			${item.condition_name}
			${item.status === adviceCondition ? '<div class="text-muted text-small">คลิกเพื่อดูคำแนะนำ</div>' : ''}
			</div>
		</div>`;

		resultItemsContainerEl.append(template);
	});
};

async function showAdviceModal(adviceItemId) {
	const adviceModalSelector = "#adviceModal";
	const adviceModalTitleSelector = "#adviceModalLabel";
	const adviceListSelector = "#advice-list";

	const adviceData = await getAdvice(adviceItemId);

	$(adviceModalTitleSelector).text(adviceData.advice_title);
	renderAdviceList(adviceListSelector, adviceData.advice_detail);
	$(adviceModalSelector).modal('show');
}

function renderAdviceList(selector, data) {
	$(selector).html("");
	data.forEach(item => {
		const template = `
		<div class="cs-advice-item mb-2">
			<div class="cs-advice-title">${item.title}</div>
			<hr class="cs-divider">
			<p class="cs-advice-content m-0">${item.text}</p>
		</div>`;

		$(selector).append(template);
	});
}

function setActiveNavigateTab(tabIndex = 0) {
	const navigateTabsSelector = ".cs-navigate-tab";

	const navigateTabs = $(navigateTabsSelector);
	const tagetTabEl = $(navigateTabsSelector)[tabIndex];
	$(navigateTabs).removeClass('active');
	$(tagetTabEl).addClass('active');
}
