<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Cms_cardiac_arrest_slide.php ]
 */
class DashboardHistorical extends MEMBER_Controller
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
		$this->data['page_url'] = site_url('cms_cardiac_arrest_slide/cms_cardiac_arrest_slide');

		$this->data['page_title'] = 'ONCB';
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
		$this->breadcrumb_data['breadcrumb'] = array(array('title' => 'dashboard', 'class' => 'active', 'url' => '#'),);
		$level_user =  $this->session->userdata("user_level");

		$test_label =  array(
			"2564 กลุ่มไม่เคยลอง",
			"2564 กลุ่มเคยลอง",
			"2565 กลุ่มไม่เคยลอง",
			"2565 กลุ่มเคยลอง",
			"2566 กลุ่มไม่เคยลอง",
			"2566 กลุ่มเคยลอง"
		);

		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$data_summary_g3 = array();
		$data_summary_g4 = array();

		//การบริหารจัดการตน
		//กลุ่มไม่เคยลอง
		
		$data_summary_g1['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_management_score",2564,1);
		$data_summary_g1['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("self_management_score",2564,2);
		$data_summary_g1['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_management_score",2565,1);
		$data_summary_g1['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("self_management_score",2565,2);
		$data_summary_g1['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_management_score",2566,1);
		$data_summary_g1['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("self_management_score",2566,2);


		// ทุนทางจิตวิทยา

		$data_summary_g2['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("psychological_capital_score",2564,1);
		$data_summary_g2['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("psychological_capital_score",2564,2);
		$data_summary_g2['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("psychological_capital_score",2565,1);
		$data_summary_g2['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("psychological_capital_score",2565,2);
		$data_summary_g2['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("psychological_capital_score",2566,1);
		$data_summary_g2['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("psychological_capital_score",2566,2);
		

		// การเห็นคุณค่าในตนเอง
		// กลุ่มเคยลอง 
		$data_summary_g3['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_esteem_score",2564,1);
		$data_summary_g3['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("self_esteem_score",2564,2);
		$data_summary_g3['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_esteem_score",2565,1);
		$data_summary_g3['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("self_esteem_score",2565,2);
		$data_summary_g3['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_esteem_score",2566,1);
		$data_summary_g3['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("self_esteem_score",2566,2);
		
		// พลังตัวตน
		// กลุ่มเคยลอง 
		$data_summary_g4['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("identity_power_score",2564,1);
		$data_summary_g4['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("identity_power_score",2564,2);
		$data_summary_g4['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("identity_power_score",2565,1);
		$data_summary_g4['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("identity_power_score",2565,2);
		$data_summary_g4['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("identity_power_score",2566,1);
		$data_summary_g4['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("identity_power_score",2566,2);
		
		
		$this->data['self_management_g1'] =  json_encode($data_summary_g1);
		$this->data['self_management_g1_label'] =  json_encode($test_label);
		$this->data['self_management_g2'] =  json_encode($data_summary_g2);
		$this->data['self_management_g3'] =  json_encode($data_summary_g3);
		$this->data['self_management_g4'] =  json_encode($data_summary_g4);

		// end of chart 1 
		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$data_summary_g3 = array();
		$data_summary_g4 = array();
		$data_summary_g5 = array();
		$data_summary_g6 = array();

		//การคล้อยตามกลุ่มคนใช้สารเสพติด
		//กลุ่มไม่เคยลอง

		$data_summary_g1['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2564,1);
		$data_summary_g1['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2564,2);
		$data_summary_g1['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2565,1);
		$data_summary_g1['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2565,2);
		$data_summary_g1['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2566,1);
		$data_summary_g1['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2566,2);


		// ความรุนแรงในครอบครัว
		// กลุ่มเคยลอง 
		$data_summary_g2['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("family_power_score",2564,1);
		$data_summary_g2['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("family_power_score",2564,2);
		$data_summary_g2['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("family_power_score",2565,1);
		$data_summary_g2['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("family_power_score",2565,2);
		$data_summary_g2['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("family_power_score",2566,1);
		$data_summary_g2['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("family_power_score",2566,2);


		// การเป็นแบบอย่างในการใช้สารเสพติด
		// กลุ่มเคยลอง 

		$data_summary_g3['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("exemplary_score",2564,1);
		$data_summary_g3['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("exemplary_score",2564,2);
		$data_summary_g3['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("exemplary_score",2565,1);
		$data_summary_g3['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("exemplary_score",2565,2);
		$data_summary_g3['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("exemplary_score",2566,1);
		$data_summary_g3['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("exemplary_score",2566,2);
		
		// การเปิดรับเกี่ยวกับบ่อสารเสพติด
		// กลุ่มเคยลอง 
		$data_summary_g4['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("media_exposure_score",2564,1);
		$data_summary_g4['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("media_exposure_score",2564,2);
		$data_summary_g4['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("media_exposure_score",2565,1);
		$data_summary_g4['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("media_exposure_score",2565,2);
		$data_summary_g4['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("media_exposure_score",2566,1);
		$data_summary_g4['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("media_exposure_score",2566,2);
		
		// เจตคติทางบวกต่อการใช้สารเสพติด
		$data_summary_g5['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2564,1);
		$data_summary_g5['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2564,2);
		$data_summary_g5['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2565,1);
		$data_summary_g5['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2565,2);
		$data_summary_g5['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2566,1);
		$data_summary_g5['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2566,2);

		// เจตคติทางบวกต่อการใช้สารเสพติด
		$data_summary_g6['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2564,1);
		$data_summary_g6['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2564,2);
		$data_summary_g6['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2565,1);
		$data_summary_g6['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2565,2);
		$data_summary_g6['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("attitude_score",2566,1);
		$data_summary_g6['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("attitude_score",2566,2);

		$this->data['self_chart2_g1'] =  json_encode($data_summary_g1);
		$this->data['self_chart2_g2'] =  json_encode($data_summary_g2);
		$this->data['self_chart2_g3'] =  json_encode($data_summary_g3);
		$this->data['self_chart2_g4'] =  json_encode($data_summary_g4);
		$this->data['self_chart2_g5'] =  json_encode($data_summary_g5);
		$this->data['self_chart2_g6'] =  json_encode($data_summary_g6);


		// end chart2 

		$data_summary_g1 = array();
		$data_summary_g2 = array();
		$data_summary_g3 = array();
		$data_summary_g4 = array();

		//พลังครอบครัว
		//กลุ่มไม่เคยลอง
		// กลุ่มเคยลอง 

		$data_summary_g1['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("family_power_score",2564,1);
		$data_summary_g1['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("family_power_score",2564,2);
		$data_summary_g1['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("family_power_score",2565,1);
		$data_summary_g1['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("family_power_score",2565,2);
		$data_summary_g1['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("family_power_score",2566,1);
		$data_summary_g1['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("family_power_score",2566,2);

		// การบริหารจัดการตน
		$data_summary_g2['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_management_score",2564,1);
		$data_summary_g2['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("self_management_score",2564,2);
		$data_summary_g2['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_management_score",2565,1);
		$data_summary_g2['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("self_management_score",2565,2);
		$data_summary_g2['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("self_management_score",2566,1);
		$data_summary_g2['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("self_management_score",2566,2);

		

		// พลังเพื่อนและกิจกรรม 70-75
		$data_summary_g3['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("friend_power_score",2564,1);
		$data_summary_g3['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("friend_power_score",2564,2);
		$data_summary_g3['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("friend_power_score",2565,1);
		$data_summary_g3['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("friend_power_score",2565,2);
		$data_summary_g3['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("friend_power_score",2566,1);
		$data_summary_g3['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("friend_power_score",2566,2);

		// พลังชุมชน 76-83

		$data_summary_g4['2564 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("community_power_score",2564,1);
		$data_summary_g4['2564 กลุ่มเคยลอง'] = $this->QuestionAVG("community_power_score",2564,2);
		$data_summary_g4['2565 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("community_power_score",2565,1);
		$data_summary_g4['2565 กลุ่มเคยลอง'] = $this->QuestionAVG("community_power_score",2565,2);
		$data_summary_g4['2566 กลุ่มไม่เคยลอง'] = $this->QuestionAVG("community_power_score",2566,1);
		$data_summary_g4['2566 กลุ่มเคยลอง'] = $this->QuestionAVG("community_power_score",2566,2);
		

		$this->data['self_chart3_g1'] =  json_encode($data_summary_g1);
		$this->data['self_chart3_g2'] =  json_encode($data_summary_g2);
		$this->data['self_chart3_g3'] =  json_encode($data_summary_g3);
		$this->data['self_chart3_g4'] =  json_encode($data_summary_g4);


		if ($level_user == 3) {
			
			// กราฟที่ 1
		$this->data['self_management_score_1'] = $this->QuestionAVG_l3("self_management_score","2562");
		$this->data['self_management_score_2'] = $this->QuestionAVG_l3("self_management_score","2564");
		$this->data['self_management_score_3'] = $this->QuestionAVG_l3("self_management_score","2566");

		$this->data['psychological_capital_score_1'] = $this->QuestionAVG_l3("psychological_capital_score","2562");
		$this->data['psychological_capital_score_2'] = $this->QuestionAVG_l3("psychological_capital_score","2564");
		$this->data['psychological_capital_score_3'] = $this->QuestionAVG_l3("psychological_capital_score","2566");

		$this->data['self_esteem_score_1'] = $this->QuestionAVG_l3("self_esteem_score","2562");
		$this->data['self_esteem_score_2'] = $this->QuestionAVG_l3("self_esteem_score","2564");
		$this->data['self_esteem_score_3'] = $this->QuestionAVG_l3("self_esteem_score","2566");


		$this->data['identity_power_score_1'] = $this->QuestionAVG_l3("identity_power_score","2562");
		$this->data['identity_power_score_2'] = $this->QuestionAVG_l3("identity_power_score","2564");
		$this->data['identity_power_score_3'] = $this->QuestionAVG_l3("identity_power_score","2566");


		// กราฟที่ 2
		$this->data['compliance_score_1'] = $this->QuestionAVG_l3("compliance_score","2562");
		$this->data['compliance_score_2'] = $this->QuestionAVG_l3("compliance_score","2564");
		$this->data['compliance_score_3'] = $this->QuestionAVG_l3("compliance_score","2566");

		
		$this->data['domestic_violence_score_1'] = $this->QuestionAVG_l3("domestic_violence_score","2562");
		$this->data['domestic_violence_score_2'] = $this->QuestionAVG_l3("domestic_violence_score","2564");
		$this->data['domestic_violence_score_3'] = $this->QuestionAVG_l3("domestic_violence_score","2566");

		$this->data['exemplary_score_1'] = $this->QuestionAVG_l3("exemplary_score","2562");
		$this->data['exemplary_score_2'] = $this->QuestionAVG_l3("exemplary_score","2564");
		$this->data['exemplary_score_3'] = $this->QuestionAVG_l3("exemplary_score","2566");


		$this->data['media_exposure_score_1'] = $this->QuestionAVG_l3("media_exposure_score","2562");
		$this->data['media_exposure_score_2'] = $this->QuestionAVG_l3("media_exposure_score","2564");
		$this->data['media_exposure_score_3'] = $this->QuestionAVG_l3("media_exposure_score","2566");


		$this->data['attitude_score_1'] = $this->QuestionAVG_l3("attitude_score","2562");
		$this->data['attitude_score_2'] = $this->QuestionAVG_l3("attitude_score","2564");
		$this->data['attitude_score_3'] = $this->QuestionAVG_l3("attitude_score","2566");

		$this->data['source_purchase_score_1'] = $this->QuestionAVG_l3("source_purchase_score","2562");
		$this->data['source_purchase_score_2'] = $this->QuestionAVG_l3("source_purchase_score","2564");
		$this->data['source_purchase_score_3'] = $this->QuestionAVG_l3("source_purchase_score","2566");


		// กราฟที่3
		$this->data['family_power_score_1'] = $this->QuestionAVG_l3("family_power_score","2562");
		$this->data['family_power_score_2'] = $this->QuestionAVG_l3("family_power_score","2564");
		$this->data['family_power_score_3'] = $this->QuestionAVG_l3("family_power_score","2566");
		
		$this->data['school_power_score_1'] = $this->QuestionAVG_l3("school_power_score","2562");
		$this->data['school_power_score_2'] = $this->QuestionAVG_l3("school_power_score","2564");
		$this->data['school_power_score_3'] = $this->QuestionAVG_l3("school_power_score","2566");

		$this->data['friend_power_score_1'] = $this->QuestionAVG_l3("friend_power_score","2562");
		$this->data['friend_power_score_2'] = $this->QuestionAVG_l3("friend_power_score","2564");
		$this->data['friend_power_score_3'] = $this->QuestionAVG_l3("friend_power_score","2566");

		$this->data['community_power_score_1'] = $this->QuestionAVG_l3("community_power_score","2562");
		$this->data['community_power_score_2'] = $this->QuestionAVG_l3("community_power_score","2564");
		$this->data['community_power_score_3'] = $this->QuestionAVG_l3("community_power_score","2566");
		

			$this->render_view('dashboard/dashboard_historical_level3');
		} else {
			$this->render_view('dashboard/dashboard_historical_level4');
		}
	}


	public function QuestionAVG_l3($select, $education_year)
	{
		
		$query = $this->db->query("SELECT avg($select) as  $select
		FROM dashboard_data
		where data_year = '$education_year'");

		$row = $query->row();

		if (isset($row)) {
			return $row->$select;
		}else{
			return 0;
		}

	}

	public function QuestionAVG($select, $education_year, $group_type_id)
	{
		
		$query = $this->db->query("SELECT avg($select) as  $select
		FROM dashboard_data
		where data_year = '$education_year' 
		and group_type_id = $group_type_id
		");

		$row = $query->row();

		if (isset($row)) {
			return $row->$select;
		}else{
			return 0;
		}

	}


	// ------------------------------------------------------------------------

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
