<?php
<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Cms_cardiac_arrest_slide.php ]
 */
class DashboardOverview extends MEMBER_Controller
{

	private $per_page;
	private $another_js;
	private $another_css;
	private $upload_store_path;
	private $file_allow;
	private $file_allow_type;
	private $file_allow_mime;
	private $file_check_name;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 30;
		$this->num_links = 6;
		$this->uri_segment = 4;
		$this->load->model('cms_cardiac_arrest_slide/Cms_cardiac_arrest_slide_model', 'Cms_cardiac_arrest_slide');
		$this->Cms_cardiac_arrest_slide->session_name = 'cms_cardiac_arrest_slide_cms_cardiac_arrest_slide';

		$this->load->model('FileUpload_model', 'FileUpload');
		$this->data['page_url'] = site_url('dashboard/DashboardOverview');

		$this->data['page_title'] = 'DashboardOverview';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');
		$this->upload_store_path = './assets/uploads/cms_cardiac_arrest_slide/';
		$this->file_allow = array(
			'application/pdf' => 'pdf',
			'application/msword' => 'doc',
			'application/vnd.ms-msword' => 'doc',
			'application/vnd.ms-excel' => 'xls',
			'application/powerpoint' => 'ppt',
			'application/vnd.ms-powerpoint' => 'ppt',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
			'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
			'application/vnd.oasis.opendocument.text' => 'odt',
			'application/vnd.oasis.opendocument.spreadsheet' => 'ods',
			'application/vnd.oasis.opendocument.presentation' => 'odp',
			'image/bmp' => 'bmp',
			'image/png' => 'png',
			'image/pjpeg' => 'jpeg',
			'image/jpeg' => 'jpg'
		);
		$this->file_allow_type = array_values($this->file_allow);
		$this->file_allow_mime = array_keys($this->file_allow);
		$this->file_check_name = '';

		$js_url = 'assets/js_modules/cms_cardiac_arrest_slide/cms_cardiac_arrest_slide.js?ft=' . filemtime('assets/js_modules/cms_cardiac_arrest_slide/cms_cardiac_arrest_slide.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'slide สื่อความรู้', 'class' => 'active', 'url' => '#'),
		);
		if ($this->session->userdata('login_validated') == false) {
			$this->render_view('');
			return;
		}
		$this->list_all();
	}

	// ------------------------------------------------------------------------

	/**
	 * Render this controller page
	 * @param String path of controller
	 * @param Integer total record
	 */
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

	/**
	 * Set up pagination config
	 * @param String path of controller
	 * @param Integer total record
	 */
	public function create_pagination($page_url, $total)
	{
		$this->load->library('pagination');
		$config['base_url'] = $page_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $this->per_page;
		$config['num_links'] = $this->num_links;
		$config['uri_segment'] = $this->uri_segment;
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	// ------------------------------------------------------------------------

	/**
	 * List all record 
	 */
	public function list_all()
	{
		$this->session->unset_userdata($this->Cms_cardiac_arrest_slide->session_name . '_search_field');
		$this->session->unset_userdata($this->Cms_cardiac_arrest_slide->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'dashboard', 'class' => 'active', 'url' => '#'),
		);

		if (isset($_POST['submit'])) {
			$education_year =  $this->input->post('education_year', TRUE);
			$arr = array('dashboard_overview_education_year' => $education_year);
			$this->session->set_userdata($arr);
		} else {
			$education_year = $this->session->userdata('dashboard_overview_education_year');
		}

		if ($education_year == '') {
			$education_year  = date('Y') + 543;
		}


		// echo $education_year;
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");

		// กลุ่มเคยลอง 
		$ass1 = array(1, 2, 8, 9, 11, 12, 15, 16, 20, 21, 23, 24, 25, 26, 27, 28, 31, 34, 36, 40, 42, 43, 44, 54, 46, 47);
		// กลุ่มไม่เคยลอง
		$ass2 = array(3, 4, 5, 6, 7, 10, 13, 14, 10, 17, 18, 19, 22, 29, 30, 32, 33, 35, 37, 38, 39, 48);

		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}

			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG($ass1, $section);
			$data_summary_g2[$test_label[$i]] = $this->QuestionAVG($ass2, $section);
		}

		$this->data['self_management_g1'] =  json_encode($data_summary_g1);
		$this->data['self_management_g2'] =  json_encode($data_summary_g2);

		// ทุนทางจิตวิทยา
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array(49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 63, 63, 64, 65, 66, 68);
		// กลุ่มไม่เคยลอง
		$ass2 = array(51, 61, 67, 70);
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}

			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG($ass1, $section);
			$data_summary_g2[$test_label[$i]] = $this->QuestionAVG($ass2, $section);
		}

		$this->data['psychological_g1'] =  json_encode($data_summary_g1);
		$this->data['psychological_g2'] =  json_encode($data_summary_g2);


		// การเห็นคุณค่าในตนเอง
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array(75, 76, 77, 78, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99);
		// กลุ่มไม่เคยลอง
		$ass2 = array(79, 80);
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}

			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG($ass1, $section);
			$data_summary_g2[$test_label[$i]] = $this->QuestionAVG($ass2, $section);
		}
		$this->data['self_esteem_g1'] =  json_encode($data_summary_g1);
		$this->data['self_esteem_g2'] =  json_encode($data_summary_g2);


		// พลังตัวตน
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array(100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114);
		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}

			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG($ass2,$section);
		}
		$this->data['identity_power_g1'] =  json_encode($data_summary_g1);
		// $this->data['identity_power_g2'] =  json_encode($data_summary_g2);

		// การคล้อยตาม 
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array(1, 2, 3, 4, 5, 6, 7, 8);
		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}

			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG3($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG3($ass2,$section);
		}
		$this->data['conformity_g1'] =  json_encode($data_summary_g1);
		$this->data['conformity_g2'] =  json_encode($data_summary_g2);

		// ความรุนแรงในครอบครัว
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array();
		$row = 0;
		for ($i = 9; $i <= 30; $i++) {
			$ass1[$row] = $i;
			$row = $row + 1;
		}
		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}

			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG3($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG3($ass2,$section);
		}

		$this->data['violence_g1'] =  json_encode($data_summary_g1);
		$this->data['violence_g2'] =  json_encode($data_summary_g2);

		// การเป็นแบบอย่าง
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array();
		$row = 0;
		for ($i = 31; $i <= 46; $i++) {
			$ass1[$row] = $i;
			$row = $row + 1;
		}
		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}
			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG3($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG3($ass2,$section);
		}
		$this->data['example_g1'] =  json_encode($data_summary_g1);
		$this->data['example_g2'] =  json_encode($data_summary_g2);

		// การเปิดรับสื่อ
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array();
		$row = 0;
		for ($i = 47; $i <= 50; $i++) {
			$ass1[$row] = $i;
			$row = $row + 1;
		}
		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}
			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG3($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG3($ass2,$section);
		}
		$this->data['media_exposure_g1'] =  json_encode($data_summary_g1);
		$this->data['media_exposure_g2'] =  json_encode($data_summary_g2);

		// พลังครอบครัว
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array();
		$row = 0;
		for ($i = 84; $i <= 98; $i++) {
			$ass1[$row] = $i;
			$row = $row + 1;
		}
		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}
			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG3($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG3($ass2,$section);
		}
		$this->data['attitude_g1'] =  json_encode($data_summary_g1);
		$this->data['attitude_g2'] =  json_encode($data_summary_g2);

		// การบริหารจัดการตน
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$test_number  = array(3.04, 2.88, 3.05, 2.60, 3.10, 2.90, 2.90, 2.90, 2.90, 2.90);
		$test_label =  array("กทม", "1", "2", "3", "4", "5", "6", "7", "8", "9");
		// กลุ่มเคยลอง 
		$ass1 = array();
		$row = 0;
		for ($i = 1; $i <= 48; $i++) {
			$ass1[$row] = $i;
			$row = $row + 1;
		}

		// กลุ่มไม่เคยลอง
		$ass2 = array();
		// เอาข้อมูลไปใส่
		for ($i = 0; $i < count($test_label); $i++) {
			$section = $test_label[$i];
			if ($section == 'กทม') {
				$section = 0;
			} else {
				$section = $test_label[$i];
			}
			$data_summary_g1[$test_label[$i]] = $this->QuestionAVG($ass1, $section);
			// $data_summary_g2[$test_label[$i]] = $this->QuestionAVG3($ass2,$section);
		}
		
		$this->data['self_management_g1'] =  json_encode($data_summary_g1);
		$this->data['self_management_g2'] =  json_encode($data_summary_g2);


		$this->data['education_year'] = $education_year;
		$this->render_view('dashboard/dashboard_overview');
	}

	// ------------------------------------------------------------------------
	// เอาไว้หาค่าเฉลี่ย assessment2
	public function QuestionAVG($ass1, $section)
	{
		$select = '';
		$total_row1 = count($ass1);

		foreach ($ass1 as $key => $value) {

			$select .= 'a2.quest_' . $value . ',';
		}


		$select = substr($select, 0, -1);
		$sum_score1 = 0;
		$education_year = $this->session->userdata('dashboard_overview_education_year');
		$assessment1_1_query_result = $this->db->query("
		SELECT  $select 
		FROM assessment_form af 
		inner join assessment1 a1 on af.id = a1.ref_assessment_id
		inner join assessment2 a2 on af.id = a2.ref_assessment_id
		inner JOIN assessment3 a3 on af.id = a3.ref_assessment_id
		where a1.section = $section  and af.import_year_data = '$education_year' ");

		$total_row = count($assessment1_1_query_result->result());
		$avg_col = 0;
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score1 += $row->$field;
			}

			$avg_col  = $sum_score1 / $total_row1;

		}

		if ($total_row <= 0) {
			$total_row = 1;
		}

		return $avg_col / $total_row;
	}

	// เอาไว้หาค่าเฉลี่ย assessment3
	public function QuestionAVG3($ass1, $section)
	{
		$select = '';
		$total_row1 = count($ass1);

		foreach ($ass1 as $key => $value) {

			$select .= 'a3.quest_' . $value . ',';
		}

		$select = substr($select, 0, -1);
		$sum_score1 = 0;
		$education_year = $this->session->userdata('dashboard_overview_education_year');
		$assessment1_1_query_result = $this->db->query("
		SELECT  $select 
		FROM assessment_form af 
		inner join assessment1 a1 on af.id = a1.ref_assessment_id
		inner join assessment2 a2 on af.id = a2.ref_assessment_id
		inner JOIN assessment3 a3 on af.id = a3.ref_assessment_id
		where a1.section = $section  and af.import_year_data = '$education_year' ");
		
		$total_row = count($assessment1_1_query_result->result());
		$avg_col = 0;
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score1 += $row->$field;
			}

			$avg_col  = $sum_score1 / $total_row1;

		}

		if ($total_row <= 0) {
			$total_row = 1;
		}

		return $avg_col / $total_row;

	}

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'slide สื่อความรู้', 'url' => site_url('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Cms_cardiac_arrest_slide->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide/preview_view');
			}
		}
	}


	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	/**
	 * Add form
	 */
	public function add()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'slide สื่อความรู้', 'url' => site_url('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['preview_image'] = '<div id="div_preview_image" class="py-3 div_file_preview" style="clear:both"><img id="image_preview" height="300"/></div>';
		$this->data['record_image_label'] = '';
		$this->render_view('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide/add_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Default Validation
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		//file upload
		$check_file = FALSE;
		if ($this->input->post('image_label') == '') {
			$check_file = TRUE;
		}
		if ($check_file == TRUE) {
			if (empty($_FILES['image']['name'])) {
				$frm->set_rules('image', 'image', 'trim|required');
			}
		}

		$frm->set_message('required', '- กรุณากรอก %s');


		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('image');
			return $message;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Default Validation for Update
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidateUpdate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		//file upload
		$check_file = FALSE;
		if ($this->input->post('image_label') == '') {
			$check_file = TRUE;
		}
		if ($check_file == TRUE) {
			if (empty($_FILES['image']['name'])) {
				$frm->set_rules('image', 'image', 'trim|required');
			}
		}

		$frm->set_message('required', '- กรุณากรอก %s');


		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('image');
			return $message;
		}
	}

	// ------------------------------------------------------------------------

	public function formValidateWithFile()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;
		$message = '';
		if (!empty($_FILES['image']['name'])) {
			$this->file_check_name = 'image';
			$frm->set_rules('image', 'image', 'callback_file_check');
			if ($frm->run() == FALSE) {
				$message .= form_error('image');
			}
		}
		return $message;
	}
	public function file_check()
	{
		$allowed_mime_type_arr = $this->file_allow_mime;
		$mime = get_mime_by_extension($_FILES[$this->file_check_name]['name']);
		if (isset($_FILES[$this->file_check_name]['name']) && $_FILES[$this->file_check_name]['name'] != '') {
			if (in_array($mime, $allowed_mime_type_arr)) {
				return true;
			} else {
				$this->form_validation->set_message('file_check', '- กรุณาเลือกประเภทไฟล์  ' . implode(" | ", $this->file_allow_type) . ' เท่านั้นครับ');
				return false;
			}
		} else {
			$this->form_validation->set_message('file_check', '- กรุณาเลือกไฟล์ %s');
			return false;
		}
	}
	private function uploadFile($file_name, $dir = '')
	{
		if ($dir != '' && substr($dir, 0, 1) != '/') {
			$dir = '/' . $dir;
		}
		$path = $this->upload_store_path . (date('Y') + 543) . $dir;
		//เปิดคอนฟิก Auto ชื่อไฟล์ใหม่ด้วย
		$config['upload_path']          = $path;
		$config['allowed_types']        = $this->file_allow_type;
		$config['encrypt_name']		= TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($file_name)) {
			$encrypt_name = $this->upload->file_name;
			$orig_name = $this->upload->orig_name;
			$this->FileUpload->create($encrypt_name, $orig_name);
			$file_path = $path . '/' . $encrypt_name; //ไม่ต้องใช้ Path เต็ม
			$data = array(
				'result' => TRUE,
				'file_path' => $file_path,
				'error' => ''
			);
		} else {
			$data = array(
				'result' => FALSE,
				'error' => $this->upload->display_errors()
			);
		}
		return $data;
	}
	private function removeFile($file_path)
	{
		if ($file_path != '') {
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
	}
	/**
	 * Create new record
	 */
	public function save()
	{

		$message = '';
		$message .= $this->formValidateWithFile();
		$message .= $this->formValidate();
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$post = $this->input->post(NULL, TRUE);

			$upload_error = 0;
			$upload_error_msg = '';
			$post['image'] = '';
			if (!empty($_FILES['image']['name'])) {
				$arr = $this->uploadFile('image');
				if ($arr['result'] == TRUE) {
					$post['image'] = $arr['file_path'];
				} else {
					$upload_error++;
					$upload_error_msg .= '<br/>' . print_r($arr['error'], TRUE);
				}
			}
			$encrypt_id = '';
			if ($upload_error == 0) {
				$success = TRUE;
				$id = $this->Cms_cardiac_arrest_slide->create($post);
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = $upload_error_msg;
			}

			$json = json_encode(array(
				'is_successful' => $success,
				'encrypt_id' =>  $encrypt_id,
				'message' => $message
			));
			echo $json;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Load data to form
	 * @param String encrypt id
	 */
	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'slide สื่อความรู้', 'url' => site_url('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Cms_cardiac_arrest_slide->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->render_view('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$cms_cardiac_arrest_id = ci_decrypt($data['encrypt_cms_cardiac_arrest_id']);
		if ($cms_cardiac_arrest_id == '') {
			$error .= '- รหัส cms_cardiac_arrest_id';
		}
		return $error;
	}

	/**
	 * Update Record
	 */
	public function update()
	{
		$message = '';
		$message .= $this->formValidateWithFile();
		$message .= $this->formValidateUpdate();
		$edit_remark = $this->input->post('edit_remark', TRUE);
		if ($edit_remark == '') {
			$message .= 'ระบุเหตุผล';
		}

		$post = $this->input->post(NULL, TRUE);
		$error_pk_id = $this->checkRecordKey($post);
		if ($error_pk_id != '') {
			$message .= "รหัสอ้างอิงที่ใช้สำหรับอัพเดตข้อมูลไม่ถูกต้อง";
		}
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$upload_error = 0;
			$upload_error_msg = '';
			if (!empty($_FILES['image']['name'])) {
				$arr = $this->uploadFile('image');
				if ($arr['result'] == TRUE) {
					$post['image'] = $arr['file_path'];
					$this->removeFile($post['image_old_path']);
					$arr = explode('/', $post['image_old_path']);
					$encrypt_name = end($arr);
					$this->FileUpload->delete($encrypt_name);
				} else {
					$upload_error++;
					$upload_error_msg .= '<br/>' . print_r($arr['error'], TRUE);
				}
			}

			if ($upload_error == 0) {
				$result = $this->Cms_cardiac_arrest_slide->update($post);
				if ($result == false) {
					$message = $this->Cms_cardiac_arrest_slide->error_message;
					$ok = FALSE;
				} else {
					$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Cms_cardiac_arrest_slide->error_message;
					$ok = TRUE;
				}
			} else {
				$ok = FALSE;
				$message = $upload_error_msg;
			}
			$json = json_encode(array(
				'is_successful' => $ok,
				'message' => $message
			));

			echo $json;
		}
	}

	/**
	 * Delete Record
	 */
	public function del()
	{
		$delete_remark = $this->input->post('delete_remark', TRUE);
		$message = '';
		if ($delete_remark == '') {
			$message .= 'ระบุเหตุผล';
		}

		$post = $this->input->post(NULL, TRUE);
		$error_pk_id = $this->checkRecordKey($post);
		if ($error_pk_id != '') {
			$message .= "รหัสอ้างอิงที่ใช้สำหรับลบข้อมูลไม่ถูกต้อง";
		}
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {
			$result = $this->Cms_cardiac_arrest_slide->delete($post);
			if ($result == false) {
				$message = $this->Cms_cardiac_arrest_slide->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>ลบข้อมูลเรียบร้อย</strong>';
				$ok = TRUE;
			}
			$json = json_encode(array(
				'is_successful' => $ok,
				'message' => $message
			));
			echo $json;
		}
	}


	/**
	 * SET array data list
	 */
	private function setDataListFormat($lists_data, $start_row = 0)
	{
		$data = $lists_data;
		$count = count($lists_data);
		for ($i = 0; $i < $count; $i++) {
			$start_row++;
			$data[$i]['record_number'] = $start_row;
			$pk1 = $data[$i]['cms_cardiac_arrest_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_cms_cardiac_arrest_id'] = $pk1;
			$arr = explode('/', $data[$i]['image']);
			$encrypt_file_name = end($arr);
			$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_file_name'");
			$data[$i]['preview_image'] = setAttachLink('image', $data[$i]['image'], $filename);
		}
		return $data;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['cms_cardiac_arrest_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_cms_cardiac_arrest_id'] = $pk1;

		$this->data['record_cms_cardiac_arrest_id'] = $data['cms_cardiac_arrest_id'];
		$this->data['record_image'] = $data['image'];

		$arr = explode('/', $data['image']);
		$encrypt_name = end($arr);
		$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_name'");
		$this->data['record_image_label'] = $filename;

		$this->data['preview_image'] = setAttachPreview('image', $data['image'], $filename);
	}
}
/*---------------------------- END Controller Class --------------------------------*/