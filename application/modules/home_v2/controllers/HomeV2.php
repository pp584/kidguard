<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : evaluation_create.php ]
 */
class HomeV2 extends CRUD_Controller
{
	private $per_page;
	private $another_js;
	private $another_js_v2;
	private $another_css;

	public $list_graph = [];

	public function __construct()
	{
		parent::__construct();

		$this->another_js .= 'assets/js_modules/cadiac_arrest/cms_ca_basic_info.js?ft=' . filemtime('assets/js_modules/cadiac_arrest/cms_ca_basic_info.js');
		$this->another_js .= '<script src="' . base_url('assets/themes/sb-admin/vendor/chart.js/Chart.min.js') . '"></script>';
		$this->another_js .= '<script src="' . base_url('assets/themes/sb-admin/js/sb-admin-charts.min.js') . '"></script>';

		$this->load->model('cadiac_arrest/Cms_ca_basic_info_model', 'Cms_ca_basic_info');

		$this->load->model('Globalmodel', 'modeldb');

		$this->load->model('home_v2/home_model', 'HomeV2');
		$this->HomeV2->session_name = 'HomeV2';
		// HomeV2_model
		// $js_url = 'assets/js_modules/home_v2/home_v2.js?ft=' . filemtime('assets/js_modules/home_v2/home_v2.js');
		// $this->another_js_v2 = '<script src="' . base_url($js_url) . '"></script>';

		// echo $this->another_js;
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		// $this->load->helper('url');
		// redirect('home_v2', 'refresh');
		// return;
		$this->dashboard();
	}

	// ------------------------------------------------------------------------

	/**
	 * Render this controller page
	 * @param String path of controller
	 * @param Integer total record
	 */
	private function render_view($path)
	{

		// $this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['top_navbar'] = $this->parser->parse('template/front-end-v2/utils/top_navbar_view', $this->top_navbar_data, TRUE);
		//$this->data['left_sidebar'] = $this->parser->parse('template/front-end/left_sidebar_view', $this->left_sidebar_data, TRUE);
		//$this->data['breadcrumb_list'] = $this->parser->parse('template/front-end/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;

		$this->data['list_data_cardiac_arrest']	=  $this->cms_ca_basic_info();
		$this->data['list_data_cms_slide']	= $this->cms_slide();
		$this->data['list_data_cms_ca_symptoms']	= $this->cms_ca_symptoms();
		$this->data['cms_cardiac_arrest_slide']	= $this->cms_cardiac_arrest_slide();
		$this->data['cms_ca_resuscitation']	= $this->cms_ca_resuscitation();

		// custome year 
		$date = date('Y') + 542;
		// $date1 = $date - 1;
		// $date2 = $date - 2;
		$date1 = "2564";
		$date2 = "2562";

		// กราฟที่ 1
		$this->data['date0']	= $date;
		$this->data['date1']	= $date1;
		$this->data['date2']	= $date2;

		$self_management_score_1 = $this->QuestionAVG_l3("self_management_score", "$date2");
		$self_management_score_2 = $this->QuestionAVG_l3("self_management_score", "$date1");
		$self_management_score_3 = $this->QuestionAVG_l3("self_management_score", "$date");

		$this->data['self_management_score_3'] = ($self_management_score_1 + $self_management_score_2 + $self_management_score_3) / 3;

		$psychological_capital_score_1 = $this->QuestionAVG_l3("psychological_capital_score", "$date2");
		$psychological_capital_score_2 = $this->QuestionAVG_l3("psychological_capital_score", "$date1");
		$psychological_capital_score_3 = $this->QuestionAVG_l3("psychological_capital_score", "$date");

		$this->data['psychological_capital_score_3'] = ($psychological_capital_score_1 + $psychological_capital_score_2 + $psychological_capital_score_3) / 3;

		$self_esteem_score_1 = $this->QuestionAVG_l3("self_esteem_score", "$date2");
		$self_esteem_score_2 = $this->QuestionAVG_l3("self_esteem_score", "$date1");
		$self_esteem_score_3 = $this->QuestionAVG_l3("self_esteem_score", "$date");
		$this->data['self_esteem_score_3'] = ($self_esteem_score_1 + $self_esteem_score_2 + $self_esteem_score_3) / 3;

		$identity_power_score_1 = $this->QuestionAVG_l3("identity_power_score", "$date2");
		$identity_power_score_2 = $this->QuestionAVG_l3("identity_power_score", "$date1");
		$identity_power_score_3 = $this->QuestionAVG_l3("identity_power_score", "$date");
		$this->data['identity_power_score_3'] = ($identity_power_score_1 + $identity_power_score_2 + $identity_power_score_3) / 3;



		// กราฟที่ 2
		$compliance_score_1 = $this->QuestionAVG_l3("compliance_score", "$date2");
		$compliance_score_2 = $this->QuestionAVG_l3("compliance_score", "$date1");
		$compliance_score_3 = $this->QuestionAVG_l3("compliance_score", "$date");
		$this->data['compliance_score_3'] = ($compliance_score_1 + $compliance_score_2 + $compliance_score_3) / 3;

		$domestic_violence_score_1 = $this->QuestionAVG_l3("domestic_violence_score", "$date2");
		$domestic_violence_score_2 = $this->QuestionAVG_l3("domestic_violence_score", "$date1");
		$domestic_violence_score_3 = $this->QuestionAVG_l3("domestic_violence_score", "$date");
		$this->data['domestic_violence_score_3'] = ($domestic_violence_score_1 + $domestic_violence_score_2 + $domestic_violence_score_3) / 3;


		$exemplary_score_1 = $this->QuestionAVG_l3("exemplary_score", "$date2");
		$exemplary_score_2 = $this->QuestionAVG_l3("exemplary_score", "$date1");
		$exemplary_score_3 = $this->QuestionAVG_l3("exemplary_score", "$date");
		$this->data['exemplary_score_3'] = ($exemplary_score_1 + $exemplary_score_2 + $exemplary_score_3) / 3;


		$media_exposure_score_1 = $this->QuestionAVG_l3("media_exposure_score", "$date2");
		$media_exposure_score_2 = $this->QuestionAVG_l3("media_exposure_score", "$date1");
		$media_exposure_score_3 = $this->QuestionAVG_l3("media_exposure_score", "$date");
		$this->data['media_exposure_score_3'] = ($media_exposure_score_1 + $media_exposure_score_2 + $media_exposure_score_3) / 3;


		$attitude_score_1 = $this->QuestionAVG_l3("attitude_score", "$date2");
		$attitude_score_2 = $this->QuestionAVG_l3("attitude_score", "$date1");
		$attitude_score_3 = $this->QuestionAVG_l3("attitude_score", "$date");
		$this->data['attitude_score_3'] = ($attitude_score_1 + $attitude_score_2 + $attitude_score_3) / 3;


		$source_purchase_score_1 = $this->QuestionAVG_l3("source_purchase_score", "$date2");
		$source_purchase_score_2 = $this->QuestionAVG_l3("source_purchase_score", "$date1");
		$source_purchase_score_3 = $this->QuestionAVG_l3("source_purchase_score", "$date");

		$this->data['source_purchase_score_3'] = ($source_purchase_score_1 + $source_purchase_score_2 + $source_purchase_score_3) / 3;


		// กราฟที่3
		$family_power_score_1 = $this->QuestionAVG_l3("family_power_score", "$date2");
		$family_power_score_2 = $this->QuestionAVG_l3("family_power_score", "$date1");
		$family_power_score_3 = $this->QuestionAVG_l3("family_power_score", "$date");
		$this->data['family_power_score_3'] = ($family_power_score_1 + $family_power_score_2 + $family_power_score_3) / 3;

		$school_power_score_1 = $this->QuestionAVG_l3("school_power_score", "$date2");
		$school_power_score_2 = $this->QuestionAVG_l3("school_power_score", "$date1");
		$school_power_score_3 = $this->QuestionAVG_l3("school_power_score", "$date");
		$this->data['school_power_score_3'] = ($school_power_score_1 + $school_power_score_2 + $school_power_score_3) / 3;



		$friend_power_score_1 = $this->QuestionAVG_l3("friend_power_score", "$date2");
		$friend_power_score_2 = $this->QuestionAVG_l3("friend_power_score", "$date1");
		$friend_power_score_3 = $this->QuestionAVG_l3("friend_power_score", "$date");

		$this->data['friend_power_score_3'] = ($friend_power_score_1 + $friend_power_score_2 + $friend_power_score_3) / 3;


		$community_power_score_1 = $this->QuestionAVG_l3("community_power_score", "$date2");
		$community_power_score_2 = $this->QuestionAVG_l3("community_power_score", "$date1");
		$community_power_score_3 = $this->QuestionAVG_l3("community_power_score", "$date");
		$this->data['community_power_score_3'] = ($community_power_score_1 + $community_power_score_2 + $community_power_score_3) / 3;


		$this->data['another_js'] = $this->another_js;
		$this->data['another_js_v2'] = $this->another_js_v2;

		// $this->data['stats'] = $this->HomeV2->getStats();
		$this->data['count_stats'] = $this->HomeV2->getCountStats();

		// echo '<pre>';
		// print_r($this->HomeV2->getCountStats());
		// echo '</pre>';
		// die();

		echo ($this->data['another_js_v2']);
		// $this->parser->parse('template/front-end/homepage_view', $this->data);
		$this->parser->parse('template/front-end-v2/home_view', $this->data);
	}


	public function QuestionAVG_l3($select, $education_year)
	{

		$query = $this->db->query("SELECT avg($select) as  $select
		FROM dashboard_data
		where data_year = '$education_year'");

		$row = $query->row();

		if (isset($row)) {
			return $row->$select;
		} else {
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
		} else {
			return 0;
		}
	}


	public function cms_ca_resuscitation()
	{
		$data_cms_ca_resuscitation = $this->modeldb->get_list("cms_ca_resuscitation");
		return $data_cms_ca_resuscitation;
	}

	public function cms_cardiac_arrest_slide()
	{
		$data_cms_cardiac_arrest_slide = $this->modeldb->get_list("cms_cardiac_arrest_slide");
		return $data_cms_cardiac_arrest_slide;
	}

	public function cms_ca_basic_info()
	{
		$data_cms_ca_basic_info = $this->modeldb->get_list("cms_ca_basic_info");
		return $data_cms_ca_basic_info;
	}

	public function cms_ca_symptoms()
	{
		$data_ca_symptoms = $this->modeldb->get_list("ca_symptoms");
		return $data_ca_symptoms;
	}

	public function cms_slide()
	{
		$data_cms_slide = $this->modeldb->get_list("cms_slide");
		return $data_cms_slide;
	}

	public function dashboard()
	{
		$this->breadcrumb_data['breadcrumb'] = array();

		$this->data['total_student'] = $this->get_total_student();
		$this->data['self_management'] = $this->get_self_management();
		$this->data['psychological_capital'] = $this->get_psychological_capital();
		$this->data['self_esteem'] = $this->get_self_esteem();
		$this->data['identity_power'] = $this->get_identity_power();

		$this->render_view('dashboard_zone');
		// $this->render_view('home_v2/home_view');
	}


	function get_total_student()
	{

		$year = date('Y') + 543;
		$total = $this->db->query("select count(*) as total from assessment_form where import_year_data = $year ")->row()->total;
		return $total;
	}


	function get_self_management()
	{

		$year = date('Y') + 543;
		$total = $this->db->query("select sum(self_management_score) as total from dashboard_data where data_year = $year ")->row()->total;
		if (!empty($total)) {
			return number_format($total, 2);
		} else {
			return 0;
		}
	}

	function get_psychological_capital()
	{

		$year = date('Y') + 543;
		$total = $this->db->query("select sum(psychological_capital_score) as total from dashboard_data where data_year = $year ")->row()->total;
		if (!empty($total)) {
			return number_format($total, 2);
		} else {
			return 0;
		}
	}

	function get_self_esteem()
	{

		$year = date('Y') + 543;
		$total = $this->db->query("select sum(self_esteem_score) as total from dashboard_data where data_year = $year ")->row()->total;
		if (!empty($total)) {
			return number_format($total, 2);
		} else {
			return 0;
		}
	}

	function get_identity_power()
	{

		$year = date('Y') + 543;
		$total = $this->db->query("select sum(identity_power_score) as total from dashboard_data where data_year = $year ")->row()->total;
		if (!empty($total)) {
			return number_format($total, 2);
		} else {
			return 0;
		}
	}

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function ca_preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'News', 'url' => site_url('website/news')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;

		//$encrypt_id = urldecode($encrypt_id);
		$id = $encrypt_id;
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$cms_about_us = $this->modeldb->get_list("ca_symptoms", "ca_symptoms_id=$id");
			$this->data['results'] = $cms_about_us;

			$this->parser->parse('template/front-end/ca_view_detail', $this->data);
		}
	}



	/**
	 * SET array data list
	 */
	private function setDataListFormat_cms_ca_basic_info($lists_data, $start_row = 0)
	{
		$data = $lists_data;
		$count = count($lists_data);
		for ($i = 0; $i < $count; $i++) {
			$start_row++;
			$data[$i]['record_number'] = $start_row;
			$pk1 = $data[$i]['ca_basic_info'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_ca_basic_info'] = $pk1;
			$data[$i]['create_date'] = setThaiDate($data[$i]['create_date']);
			$arr = explode('/', $data[$i]['images']);
			$encrypt_file_name = end($arr);
			$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_file_name'");
			$data[$i]['preview_images'] = setAttachLink('images', $data[$i]['images'], $filename);
			$arr = explode('/', $data[$i]['files']);
			$encrypt_file_name = end($arr);
			$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_file_name'");
			$data[$i]['preview_files'] = setAttachLink('files', $data[$i]['files'], $filename);
		}
		return $data;
	}

	/*
	*-----------------------------------------------
	* START _____Function Handle Or Submit view of controller
	*/

	public function getGraph()
	{
		$message = '';
		$this->list_graph = $this->HomeV2->getYearSummaryGraph();
		// $this->list_graph = $this->HomeV2->getLastThreeYearGraph();
		// echo $this->list_graph;
		$success = TRUE;
		$json = json_encode(array(
			'is_successful' => $success,
			'message' => $message,
			'data' => $this->list_graph
		));

		echo $json;
	}
	// public function risky_save()
	// {
	// 	$message = '';
	// 	$post = $this->input->post(NULL, TRUE);
	// 	$this->session->set_userdata('risky_save_form_data', $post);
	// 	$this->session->set_userdata('complete_qt_risky', true);

	// 	$this->complete_qt_risky = true;
	// 	$success = TRUE;

	// 	$json = json_encode(array(
	// 		'is_successful' => $success,
	// 		'message' => $message,
	// 		'complete_qt_risky' => $this->session->userdata('complete_qt_risky')
	// 	));

	// 	echo $json;
	// }
	/*
	*-----------------------------------------------
	* START _____Utility of controller
	*/
}
