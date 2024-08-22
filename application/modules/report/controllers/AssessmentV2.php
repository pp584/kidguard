<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : AssessmentV2.php ]
 */
class AssessmentV2 extends MEMBER_Controller
{
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 30;
		$this->num_links = 6;
		$this->uri_segment = 4;
		$this->load->model('report/Assessment_v2_model', 'AssessmentV2');
		$this->load->model('report/Assessment_v2_model', 'AssessmentV3');
		$this->AssessmentV2->session_name = 'report_assessment';

		$this->data['page_url'] = site_url('report/assessmentV2');

		$this->data['page_title'] = 'PHP CI MANIA';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/report/assessment_v2.js?ft=' . filemtime('assets/js_modules/report/assessment_v2.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	protected function render_view($path)
	{
		$this->data['top_navbar'] = $this->parser->parse('template/sb-admin-bs4/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		$this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		if ($this->session->userdata('login_validated') == false) {
			$this->data['page_content'] = $this->parser->parse_repeat('member_permission.php', $this->data, TRUE);
			$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$this->session->set_userdata('after_login_redirect', $current_url);
		} else {
			$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		}
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;
		$this->data['utilities_file_time'] = filemtime('assets/js/ci_utilities.js');
		$this->parser->parse('template/sb-admin-bs4/homepage_view', $this->data);
	}

	public function create_pagination($page_url, $total, $per_page = 10, $num_links = 2, $uri_segment = 4)
	{
		$this->load->library('pagination');
		$config['base_url'] = $page_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['num_links'] = $num_links;
		$config['uri_segment'] = $uri_segment;
		$config['use_page_numbers'] = TRUE;
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	// ------------------------------------------------------------------------
	public function index()
	{
	}

	public function import_excel()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำเข้าข้อมูลแบบประเมิน', 'class' => 'active', 'url' => '#'),
		);

		$this->data['importData'] = [];
		if (isset($_FILES['uploadFile'])) {
			require_once APPPATH . "/third_party/PHPExcel.php";

			$file = $_FILES['uploadFile']['tmp_name'];

			$inputFileType = PHPExcel_IOFactory::identify($file);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($file);

			$rawData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			$keyData = array_shift($rawData);

			$formatData = [];
			foreach ($rawData as $record => $data) {
				foreach ($keyData as $cell => $keyName) {
					$formatData[$record][$keyName] = $data[$cell];
				}
			}

			$this->data['importData'] = $formatData;
		}

		$this->data['templateFilePath'] = base_url('/assets/uploads/excel_template/template-import-2024.xlsx');
		$this->data['questionList'] = $this->AssessmentV2->getQuestionList();

		$this->render_view('report/assessment_v2/import_excel_view');
	}

	public function update_norm()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'ปรับปรุงค่า Norm', 'class' => 'active', 'url' => '#'),
		);

		$this->data['formEndpoint'] = site_url('api/graph/updateNorm');
		$this->data['graphList'] = $this->AssessmentV2->getGraphbarSetting();

		$this->render_view('report/assessment_v2/update_norm_view');
	}

	public function report_raw()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'รายงาน (แบบประเมิน)', 'class' => 'active', 'url' => '#'),
		);

		$this->data['page_url'] = site_url('report/assessmentV2/report_raw');
		$this->data['session_prefix'] = "report_raw_";

		$this->data['csrf_protection_field'] = insert_csrf_field(true);
		$pageURI = $this->uri->segment(4, 1);

		$formData = [];
		//Priority #1: Get from submit
		if (isset($_POST['submit'])) {
			$formData = [
				'start_date' => $this->input->post('start_date', TRUE),
				'end_date' => $this->input->post('end_date', TRUE),
				'order_by' => $this->input->post('order_by', TRUE),
				'page_size' => $this->input->post('page_size', TRUE)
			];

			$sessionKey = $this->data['session_prefix'] . "formData";
			$this->session->set_userdata([$sessionKey => $formData]);
		}
		//Priority #1: Get from session
		elseif ($this->session->userdata($this->data['session_prefix'] . 'formData') !== null) {
			$sessionData = $this->session->userdata($this->data['session_prefix'] . 'formData');

			$formData = [
				'start_date' => $sessionData['start_date'],
				'end_date' => $sessionData['end_date'],
				'order_by' => $sessionData['order_by'],
				'page_size' => $sessionData['page_size']
			];
		}
		//Priority #3: Get defaults 
		else {
			$formData = [
				'start_date' => "2024-01-01",
				'end_date' => date('Y-m-d'),
				'order_by' => "DESC",
				'page_size' => 10
			];
		}

		$formData['page'] = is_numeric($pageURI) ? $pageURI : 1;
		$this->data['formData'] = $formData;

		$this->data['data_header'] = $this->AssessmentV3->getQuestionList();
		$dataForTable = $this->AssessmentV2->getScore($formData);
		$this->data['data_table'] = $dataForTable['data'];
		$this->data['pagination_table'] = $dataForTable['pagination'];
		$this->data['pagination_link'] = $this->create_pagination($this->data['page_url'], $this->data['pagination_table']['total_item'], $formData['page_size']);

		$this->render_view('report/assessment_v2/report_raw_view');
	}

	public function report_average()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'รายงาน (คะแนนเฉลี่ย)', 'class' => 'active', 'url' => '#'),
		);

		$this->data['page_url'] = site_url('report/assessmentV2/report_average');
		$this->data['session_prefix'] = "report_average_";

		$this->data['csrf_protection_field'] = insert_csrf_field(true);
		$pageURI = $this->uri->segment(4, 1);

		$formData = [];
		//Priority #1: Get from submit
		if (isset($_POST['submit'])) {
			$formData = [
				'start_date' => $this->input->post('start_date', TRUE),
				'end_date' => $this->input->post('end_date', TRUE),
				'order_by' => $this->input->post('order_by', TRUE),
				'page_size' => $this->input->post('page_size', TRUE)
			];

			$sessionKey = $this->data['session_prefix'] . "formData";
			$this->session->set_userdata([$sessionKey => $formData]);
		}
		//Priority #1: Get from session
		elseif ($this->session->userdata($this->data['session_prefix'] . 'formData') !== null) {
			$sessionData = $this->session->userdata($this->data['session_prefix'] . 'formData');

			$formData = [
				'start_date' => $sessionData['start_date'],
				'end_date' => $sessionData['end_date'],
				'order_by' => $sessionData['order_by'],
				'page_size' => $sessionData['page_size']
			];
		}
		//Priority #3: Get defaults 
		else {
			$formData = [
				'start_date' => "2024-01-01",
				'end_date' => date('Y-m-d'),
				'order_by' => "DESC",
				'page_size' => 10
			];
		}

		$formData['page'] = is_numeric($pageURI) ? $pageURI : 1;
		$this->data['formData'] = $formData;

		$this->data['data_header'] = $this->AssessmentV3->getScoreAverageGraphBar();
		$dataForTable = $this->AssessmentV2->getScoreAverage($formData);
		$this->data['data_table'] = $dataForTable['data'];
		$this->data['pagination_table'] = $dataForTable['pagination'];
		$this->data['pagination_link'] = $this->create_pagination($this->data['page_url'], $this->data['pagination_table']['total_item'], $formData['page_size']);

		$this->render_view('report/assessment_v2/report_average_view');
	}

	public function sync_graph()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'ปรับปรุงข้อมูลกราฟ', 'class' => 'active', 'url' => '#'),
		);

		$this->data['formEndpoint'] = site_url('api/sync/syncYear');
		$this->data['selectYears'] = $this->AssessmentV2->getYearForSelectOption();
		$this->render_view('report/assessment_v2/sync_graph_view');
	}
}
/*---------------------------- END Controller Class --------------------------------*/
