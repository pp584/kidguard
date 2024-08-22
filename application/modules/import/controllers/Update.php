<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Update.php ]
 */
class Update extends CRUD_Controller
{

	private $per_page;
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 1000;

		$this->import_year = 0;

		$this->num_links = 6;
		$this->uri_segment = 4;
		$this->load->model('import/Update_model', 'Assessment');
		$this->Assessment->session_name = 'import_assessment';

		$this->data['page_url'] = site_url('import/assessment');

		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/import/assessment.js?ft=' . filemtime('assets/js_modules/import/assessment.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
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
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
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
		$this->session->unset_userdata($this->Assessment->session_name . '_search_field');
		$this->session->unset_userdata($this->Assessment->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำเข้าไฟล์ข้อมูล', 'class' => 'active', 'url' => '#'),
		);

		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Assessment->session_name . '_search_field' => $search_field, $this->Assessment->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Assessment->session_name . '_search_field');
			$value = $this->session->userdata($this->Assessment->session_name . '_value');
		}

		$start_row = $this->uri->segment($this->uri_segment, '0');
		if (!is_numeric($start_row)) {
			$start_row = 0;
		}
		$per_page = $this->per_page;
		$order_by =  $this->input->post('order_by', TRUE);
		if ($order_by != '') {
			$arr = explode('|', $order_by);
			$field = $arr[0];
			$sort = $arr[1];
			switch ($sort) {
				case 'asc':
					$sort = 'ASC';
					break;
				case 'desc':
					$sort = 'DESC';
					break;
				default:
					$sort = 'DESC';
					break;
			}
			$this->Assessment->order_field = $field;
			$this->Assessment->order_sort = $sort;
		}
		$results = $this->Assessment->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('import/assessment');
		$pagination = $this->create_pagination($page_url . '/search', $search_row);
		$end_row = $start_row + $per_page;
		if ($search_row < $per_page) {
			$end_row = $search_row;
		}

		if ($end_row > $search_row) {
			$end_row = $search_row;
		}

		$this->data['data_list']	= $list_data;
		$this->data['search_field']	= $search_field;
		$this->data['txt_search']	= $value;
		$this->data['current_path_uri'] = uri_string();
		$this->data['current_page_offset'] = $start_row;
		$this->data['start_row']	= $start_row + 1;
		$this->data['end_row']	= $end_row;
		$this->data['order_by']	= $order_by;
		$this->data['total_row']	= $total_row;
		$this->data['search_row']	= $search_row;
		$this->data['page_url']	= $page_url;
		$this->data['pagination_link']	= $pagination;
		$this->data['csrf_protection_field']	= insert_csrf_field(true);

		$this->render_view('import/assessment/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment', 'url' => site_url('import/assessment')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('import/assessment/preview_view');
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
			array('title' => 'Assessment', 'url' => site_url('import/assessment')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['provinces_province_id_option_list'] = $this->Assessment->returnOptionList("provinces", "id", "name_th");
		$this->render_view('import/assessment/add_view');
	}

	// ------------------------------------------------------------------------



	// update report data 
	function update_report_data()
	{


		$message = '';


		// if (isset($_POST['submit'])) {
		$import_year =  $this->input->post('import_year', TRUE);
		// echo $import_year ;
		$arr = array($this->Assessment->session_name . '_import_year' => $import_year);
		$this->session->set_userdata($arr);

		$result = $this->data_group1();
		$result = $this->data_group2();

		if ($result == false) {
			$message = "";
			$ok = FALSE;
		} else {
			$message = 'Update ข้อมูลเรียบร้อยแล้ว' . $this->Assessment->error_message;
			$ok = TRUE;
		}

		$json = json_encode(array(
			'is_successful' => $ok,
			'message' => $message
		));

		echo $json;
	}


	public function data_group1()
	{

		$import_year  = '';

		$post = $this->input->post(NULL, TRUE);
		$import_year = $this->session->userdata($this->Assessment->session_name . '_import_year');

		// // getarea for section 


		$section_label =  array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");


		foreach ($section_label as $section) {

			$self_management = $this->self_management($section, $import_year, 1);

			// echo 	$self_management;

			$psychological_capital =  $this->Psychological_capital($section, $import_year, 1);
			$self_esteem =  $this->Self_esteem($section, $import_year, 1);
			$identity_power =  $this->Identity_power($section, $import_year, 1);
			$compliance =  $this->Compliance($section, $import_year, 1);
			$domestic_violence =  $this->Domestic_violence($section, $import_year, 1);
			$exemplary =  $this->Exemplary($section, $import_year, 1);
			$media_exposure =  $this->Media_exposure($section, $import_year, 1);
			$attitude =  $this->Attitude($section, $import_year, 1);
			$source_purchase =  $this->Source_purchase($section, $import_year, 1);
			$family_power =  $this->Family_power($section, $import_year, 1);
			$school_power =  $this->School_power($section, $import_year, 1);
			$friend_power =  $this->Friend_power($section, $import_year, 1);
			$community_power =  $this->Community_power($section, $import_year, 1);

			$post['self_management_score'] = $self_management;
			$post['psychological_capital_score'] = $psychological_capital;
			$post['self_esteem_score'] = $self_esteem;
			$post['identity_power_score'] = $identity_power;
			$post['compliance_score'] = $compliance;
			$post['domestic_violence_score'] = $domestic_violence;
			$post['exemplary_score'] = $exemplary;
			$post['media_exposure_score'] = $media_exposure;
			$post['attitude_score'] = $attitude;
			$post['source_purchase_score'] = $source_purchase;
			$post['family_power_score'] = $family_power;
			$post['school_power_score'] = $school_power;
			$post['friend_power_score'] = $friend_power;
			$post['community_power_score'] = $community_power;
			$post['data_year'] = $import_year;
			$post['group_type_id'] = 1;
			$post['section'] = $section;

			$result = $this->Assessment->update($post);
		}

		return  "" ;//$result;
	}

	public function data_group2()
	{

		$import_year  = '';

		$post = $this->input->post(NULL, TRUE);
		$import_year = $this->session->userdata($this->Assessment->session_name . '_import_year');

		$section_label =  array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");


		foreach ($section_label as $section) {

			$self_management = $this->self_management($section, $import_year, 2);
			$psychological_capital =  $this->Psychological_capital($section, $import_year, 2);
			$self_esteem =  $this->Self_esteem($section, $import_year, 2);
			$identity_power =  $this->Identity_power($section, $import_year, 2);
			$compliance =  $this->Compliance($section, $import_year, 2);
			$domestic_violence =  $this->Domestic_violence($section, $import_year, 2);
			$exemplary =  $this->Exemplary($section, $import_year, 2);
			$media_exposure =  $this->Media_exposure($section, $import_year, 2);
			$attitude =  $this->Attitude($section, $import_year, 2);
			$source_purchase =  $this->Source_purchase($section, $import_year, 2);
			$family_power =  $this->Family_power($section, $import_year, 2);
			$school_power =  $this->School_power($section, $import_year, 2);
			$friend_power =  $this->Friend_power($section, $import_year, 2);
			$community_power =  $this->Community_power($section, $import_year, 2);

			$post['self_management_score'] = $self_management;
			$post['psychological_capital_score'] = $psychological_capital;
			$post['self_esteem_score'] = $self_esteem;
			$post['identity_power_score'] = $identity_power;
			$post['compliance_score'] = $compliance;
			$post['domestic_violence_score'] = $domestic_violence;
			$post['exemplary_score'] = $exemplary;
			$post['media_exposure_score'] = $media_exposure;
			$post['attitude_score'] = $attitude;
			$post['source_purchase_score'] = $source_purchase;
			$post['family_power_score'] = $family_power;
			$post['school_power_score'] = $school_power;
			$post['friend_power_score'] = $friend_power;
			$post['community_power_score'] = $community_power;
			$post['data_year'] = $import_year;
			$post['group_type_id'] = 2;
			$post['section'] = $section;
			$result = $this->Assessment->update($post);
		}
		return $result;
	}

	function Community_power($section, $import_year = null, $group_id = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(76, 77, 78, 79, 80, 81, 82, 83);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 

		$result_total_row = 0;
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 
		FROM assessment_form af 
		inner join assessment1 a1  on af.id = a1.ref_assessment_id
		INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id 
		where a1.section = $section and  a1.question_15 = $group_id and af.import_year_data  =  $import_year  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}


		$sum = $sum_score5 / $sum_total_row;


		$result_total_row  = count($assessment1_1_query_result->result());

		if($result_total_row > 0){
			return $sum  / $result_total_row;
		}else{
			
			return 0;
		}

		
	}

	function Friend_power($section, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(70, 71, 72, 37, 74, 75);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score5 = null;



		// ผู้ประเมิน 
		// 1. เคย
		// 2. ไม่เคย 
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 
		FROM assessment_form af 
		inner join assessment1 a1 on af.id = a1.ref_assessment_id
		INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id 
		where a1.section = $section and a1.question_15 = $group and  af.import_year_data  =  $import_year  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}


		$sum = $sum_score5 / 	$sum_total_row ;
		

		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);
		// $net_sum_score4 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);

		// $this->data['friend_power_score1'] = $net_sum_score1;
		// $this->data['friend_power_score2'] = $net_sum_score2;
		// $this->data['friend_power_score3'] = $net_sum_score3;
		$result_total_row  = count($assessment1_1_query_result->result());

		if($result_total_row  > 0){
			return 	$sum;
		}else{
			return 0 ;
		}
		
	}


	function School_power($section  = null, $import_year = null, $group = null)
	{
		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);
		$ass1 = array(59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;





		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 
		FROM assessment_form af 
		inner join assessment1 a1  on af.id = a1.ref_assessment_id
		INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id 
		where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}




		$sum = $sum_score5 / $sum_total_row;
		
		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		// $this->data['school_power_score1'] = $net_sum_score1;
		// $this->data['school_power_score2'] = $net_sum_score2;
		$result_total_row  = count($assessment1_1_query_result->result());

		if($result_total_row > 0){
			return $sum;
		}else{
			return 0;
		}
		
	}

	function Family_power($section = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(51, 52, 53, 54, 55, 56, 57, 58);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;




		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af
		 inner join assessment1 a1 on af.id = a1.ref_assessment_id
		 INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id 
		 where a1.section = $section  and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}


		$sum = $sum_score5 / $sum_total_row;
		
		$result_total_row  = count($assessment1_1_query_result->result());

		if($result_total_row > 0){
			return $sum / $result_total_row;
		}else{

			return 0 ;
		}
		
	}

	function Source_purchase($section = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		// $ass1 = array();
		$ass2 = array(92, 93, 94, 95, 96, 97, 98);

		// $select1 = '';
		$select2 = '';

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		// $total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row =  $total_row2;



		// $select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

	

		$sum_score5 = null;
		$sum_score6 = null;

		// $assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af 
		inner join assessment1 a1  on af.id = a1.ref_assessment_id
		INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id 
		where a1.section= $section and  a1.question_15 = $group and   af.import_year_data  =  $import_year ");
		
		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score5 += $row->$field;
				}
			}
		}


		$sum = $sum_score5;
		
		$result_total_row  = count($assessment1_2_query_result->result());

		if ($result_total_row > 0) {
			return $sum/ $sum_total_row ;
		} else {
			return 0;
		}
	}


	function Attitude($section  = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(84, 88, 89);
		$ass2 = array(85, 86, 87, 90, 91);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}


		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;

		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;




		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af 
		inner join assessment1 a1 on af.id = a1.ref_assessment_id  
		 INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id
		  where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year  ");

		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af 
		inner join assessment1 a1 on af.id = a1.ref_assessment_id   
		INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id
		 where  a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}



		$sum = $sum_score5 + $sum_score6;
		
		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());

		if ($result_total_row > 0) {
			return ($sum / $sum_total_row ) / $result_total_row;
		} else {
			return 0;
		}
	}

	function Media_exposure($section  = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(22);
		$ass2 = array(47, 48, 49, 50);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}


		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;





		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id   INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and a1.question_15 = $group and   af.import_year_data  =  $import_year ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id   INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}


		$sum = $sum_score5 + $sum_score6;
		

		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());

		if ($result_total_row > 0) {
			return ($sum / $sum_total_row) / $result_total_row;
		} else {
			return 0;
		}
	}

	function Exemplary($section = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(22);
		$ass2 = array(31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;




		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id   INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.section = $section and a1.question_15 = $group and  af.import_year_data  =  $import_year  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}


		$sum = $sum_score5 + $sum_score6;
		// if($sum > 0){
		// 	$net_sum_score3 = number_format( $sum / $sum_total_row, 2);
		// }

		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		// $this->data['exemplary_score1'] = $net_sum_score1;
		// $this->data['exemplary_score2'] = $net_sum_score2;

		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());

		if ($result_total_row > 0) {
			return ($sum / $sum_total_row) / $result_total_row;
		} else {
			return 0;
		}
	}

	function Domestic_violence($section = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(22);
		$ass2 = array(9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 27, 28, 29, 30);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}

		$sum = $sum_score5 + $sum_score6;
		// if($sum > 0){
		// 	$net_sum_score3 = number_format( $sum / $sum_total_row, 2);
		// }


		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		// $this->data['domestic_violence_score1'] = $net_sum_score1;
		// $this->data['domestic_violence_score2'] = $net_sum_score2;

		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());


		if ($result_total_row) {
			return ($sum / $sum_total_row) / $result_total_row ;
		} else {
			return 0;
		}
	}

	function Compliance($section  = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(4, 8);
		$ass2 = array(1, 2, 3, 5, 6, 7);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section  =  $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section  =  $section and  a1.question_15 = $group and   af.import_year_data  =  $import_year ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}


		$sum = $sum_score5 + $sum_score6;
		// if($sum > 0){
		// 	$net_sum_score3 = number_format( $sum / $sum_total_row, 2);
		// }


		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		// $this->data['compliance_score1'] = $net_sum_score1;
		// $this->data['compliance_score2'] = $net_sum_score2;
		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());

		if ($result_total_row > 0) {
			return $sum  / $sum_total_row;
		} else {
			return 0;
		}
	}

	function Self_esteem($section  = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(75, 76, 77, 78, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99);
		$ass2 = array(79, 80);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;


		// ผู้ประเมิน 

		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM  assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where   a1.section  =  $section and a1.question_15 = $group and  af.import_year_data  =  $import_year");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM  assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.section  =  $section and a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}


		$sum = $sum_score5 + $sum_score6;
		// if($sum > 0){
		// 	$net_sum_score3 = number_format( $sum / $sum_total_row, 2);
		// }


		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		// $this->data['self_esteem_score1'] = $net_sum_score1;
		// $this->data['self_esteem_score2'] = $net_sum_score2;

		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());
		if ($result_total_row  > 0) {
			return $sum / $sum_total_row;
		} else {
			return 0;
		}
	}

	function Identity_power($section  = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114);
		$ass2 = array();

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}


		$sum = $sum_score5;
		if($sum > 0){
			$net_sum_score3 = number_format( $sum / $sum_total_row, 2);
		}


		// $net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		// $net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		// $net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		// $this->data['identity_power_score1'] = $net_sum_score1;
		// $this->data['identity_power_score2'] = $net_sum_score2;
		$result_total_row  = count($assessment1_1_query_result->result());

		if ($result_total_row   > 0) {
			return $sum_score5 / $sum_total_row;
		} else {
			return 0;
		}
	}

	function Psychological_capital($section  = null, $import_year = null, $group = null)
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);

		$ass1 = array(49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 63, 63, 64, 65, 66, 68);
		$ass2 = array(51, 61, 67, 70);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;




		// ผู้ประเมิน 
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment_form af inner join assessment1 a1 on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score6 += $row->$field;
				}
			}
		}


		$sum = $sum_score5 + $sum_score6;

		$result_total_row  = count($assessment1_1_query_result->result());
		$result_total_row  += count($assessment1_2_query_result->result());

		if ($result_total_row  > 0) {
			return $sum  / ($sum_total_row);
		} else {
			return 0;
		}

	}

	function self_management($section  = null, $import_year = null, $group = null)
	{
		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1);
		$sum_score1_1 = null;
		$sum_score1_2 = null;
		$sum_score2_1 = null;
		$sum_score2_2 = null;
		$sum_score3_1 = null;
		$sum_score3_2 = null;

		$net_sum_score1 = null;
		$net_sum_score2 = null;
		$net_sum_score3 = null;

		// คะแนนปกติ การบริหารจัดการตน  PR50 กลุ่มไม่เคยลอง  
		$select_ass1_1 = '';
		$select_ass1_2 = '';

		$select_ass2_1 = '';
		$select_ass2_2 = '';


		$ass1 = array(1, 2, 8, 9, 11, 12, 15, 16, 20, 21, 23, 24, 25, 26, 27, 28, 31, 34, 36, 40, 42, 43, 44, 54, 46, 47);
		$ass2 = array(3, 4, 5, 6, 7, 10, 13, 14, 10, 17, 18, 19, 22, 29, 30, 32, 33, 35, 37, 38, 39, 48);


		foreach ($ass1 as $key => $value) {

			$select_ass1_1 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ' ,';
		}

		foreach ($ass2 as $key => $value) {

			$select_ass1_2 .= 'avg(a2.quest_' . $value . ') as quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;

		$select_ass1 = substr($select_ass1_1, 0, -1);
		$select_ass2 = substr($select_ass1_2, 0, -1);


		$assessment3_1_query_result = $this->db->query("SELECT  $select_ass1 FROM assessment_form af inner join  assessment1 a1  on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data  =  $import_year ");
		
		// echo $this->db->last_query();
		$assessment3_2_query_result = $this->db->query("SELECT  $select_ass2 FROM assessment_form af inner join  assessment1 a1  on af.id = a1.ref_assessment_id  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.section = $section and  a1.question_15 = $group and  af.import_year_data   =  $import_year ");
		foreach ($assessment3_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score3_1 += $row->$field;
			}
		}

		foreach ($assessment3_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if ($row->$field != '') {
					$sum_score3_2 +=  $row->$field;
				}
			}
		}

		$sum = $sum_score3_1 + $sum_score3_2;

		$result_total_row1  = count($assessment3_1_query_result->result());
		$result_total_row2  = count($assessment3_2_query_result->result());
		$total = $result_total_row1 + $result_total_row2;
		if ($total > 0) {
			return  $sum / $sum_total_row;
		} else {
			return 0;
		}
		
	}

	public function update_view()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำเข้าไฟล์ข้อมูล (Import)', 'url' => site_url('import/assessment')),
			array('title' => 'อัปเดตฐานข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['start_row'] = 2;

		$start_row = $this->uri->segment($this->uri_segment, '0');
		if (!is_numeric($start_row)) {
			$start_row = 0;
		}

		$per_page = $this->per_page;
		$order_by =  $this->input->post('order_by', TRUE);
		if ($order_by != '') {
			$arr = explode('|', $order_by);
			$field = $arr[0];
			$sort = $arr[1];
			switch ($sort) {
				case 'asc':
					$sort = 'ASC';
					break;
				case 'desc':
					$sort = 'DESC';
					break;
				default:
					$sort = 'DESC';
					break;
			}
			$this->Assessment->order_field = $field;
			$this->Assessment->order_sort = $sort;
		}
		$results = $this->Assessment->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('import/assessment');
		$pagination = $this->create_pagination($page_url . '/search', $search_row);
		$end_row = $start_row + $per_page;
		if ($search_row < $per_page) {
			$end_row = $search_row;
		}

		if ($end_row > $search_row) {
			$end_row = $search_row;
		}

		$this->data['data_list']	= $list_data;
		$this->data['current_path_uri'] = uri_string();
		$this->data['current_page_offset'] = $start_row;
		$this->data['start_row']	= $start_row + 1;
		$this->data['end_row']	= $end_row;
		$this->data['order_by']	= $order_by;
		$this->data['total_row']	= $total_row;
		$this->data['search_row']	= $search_row;
		$this->data['page_url']	= $page_url;
		$this->data['pagination_link']	= $pagination;
		$this->data['csrf_protection_field']	= insert_csrf_field(true);
		$this->render_view('import/assessment/update_form');
	}

	/**
	 * Default Validation
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', '1.เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('question_2', '2.อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', '3.สถานภาพการศึกษา[1=1.ศึกษาอยู่,2=2. ไม่ได้ศึกษา]', 'trim|required|is_natural');
		$frm->set_rules('question_4', '4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่', 'trim|required|is_natural');
		$frm->set_rules('question_5', '5.จำนวนพี่น้อง[1=1. เป็นลูกคนเดียว,2=2. มีพี่น้องรวมทั้งหมด]', 'trim|required|is_natural');
		$frm->set_rules('question_6', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_7', '6.สถานภาพทางครอบครัว[1=1. บิดามารดาอยู่ด้วยกัน,2=2. บิดามารดาแยกกันอยู่,3=3. บิดาเสียชีวิตแล้ว,4=4. มารดาเสียชีวิตแล้ว,5=5. บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required|is_natural');
		$frm->set_rules('question_8', '7.อาชีพของบิดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required|is_natural');
		$frm->set_rules('question_9', '8. อาชีพของมารดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required');
		$frm->set_rules('question_10', '10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[question_10]');
		$frm->set_rules('question_11', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_12', '11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required|is_natural');
		$frm->set_rules('question_13', '12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=7,8=8,9=9,10=10,11=11,12=อื่น ๆ โปรดระบุ]', 'trim|required');
		$frm->set_rules('question_14', 'กรุณากรอก', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province_id');
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			$message .= form_error('question_4');
			$message .= form_error('question_5');
			$message .= form_error('question_6');
			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_9');
			$message .= form_error('question_10');
			$message .= form_error('question_11');
			$message .= form_error('question_12');
			$message .= form_error('question_13');
			$message .= form_error('question_14');
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

		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', '1.เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('question_2', '2.อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', '3.สถานภาพการศึกษา[1=1.ศึกษาอยู่,2=2. ไม่ได้ศึกษา]', 'trim|required|is_natural');
		$frm->set_rules('question_4', '4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่', 'trim|required|is_natural');
		$frm->set_rules('question_5', '5.จำนวนพี่น้อง[1=1. เป็นลูกคนเดียว,2=2. มีพี่น้องรวมทั้งหมด]', 'trim|required|is_natural');
		$frm->set_rules('question_6', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_7', '6.สถานภาพทางครอบครัว[1=1. บิดามารดาอยู่ด้วยกัน,2=2. บิดามารดาแยกกันอยู่,3=3. บิดาเสียชีวิตแล้ว,4=4. มารดาเสียชีวิตแล้ว,5=5. บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required|is_natural');
		$frm->set_rules('question_8', '7.อาชีพของบิดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required|is_natural');
		$frm->set_rules('question_9', '8. อาชีพของมารดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required');
		$frm->set_rules('question_10', '10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[question_10]');
		$frm->set_rules('question_11', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_12', '11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required|is_natural');
		$frm->set_rules('question_13', '12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=7,8=8,9=9,10=10,11=11,12=อื่น ๆ โปรดระบุ]', 'trim|required');
		$frm->set_rules('question_14', 'กรุณากรอก', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province_id');
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			$message .= form_error('question_4');
			$message .= form_error('question_5');
			$message .= form_error('question_6');
			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_9');
			$message .= form_error('question_10');
			$message .= form_error('question_11');
			$message .= form_error('question_12');
			$message .= form_error('question_13');
			$message .= form_error('question_14');
			return $message;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Create new record
	 */
	public function save()
	{

		$message = '';
		$message .= $this->formValidate();
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$post = $this->input->post(NULL, TRUE);

			$encrypt_id = '';
			$post['question_10'] = implode(',', $post['question_10']);
			$id = $this->Assessment->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Assessment->error_message;
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
			array('title' => 'Assessment', 'url' => site_url('import/assessment')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_create_datetime'] = setThaiDate($results['create_datetime']);

				$this->data['provinces_province_id_option_list'] = $this->Assessment->returnOptionList("provinces", "id", "name_th");
				$this->render_view('import/assessment/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$id = ci_decrypt($data['encrypt_id']);
		if ($id == '') {
			$error .= '- รหัส id';
		}
		return $error;
	}

	/**
	 * Update Record
	 */
	public function update()
	{
		$message = '';
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

			$post['question_10'] = implode(',', $post['question_10']);
			$result = $this->Assessment->update($post);
			if ($result == false) {
				$message = $this->Assessment->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Assessment->error_message;
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
			$result = $this->Assessment->delete($post);
			if ($result == false) {
				$message = $this->Assessment->error_message;
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
			$pk1 = $data[$i]['id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_id'] = $pk1;


			$group_type_id = $data[$i]['group_type_id'];
			if ($group_type_id == 1) {
				$data[$i]['preview_group_type_id'] = 'กลุ่มเสพ';
			} else {
				$data[$i]['preview_group_type_id'] = 'กลุ่มไม่เสพ';
			}


			$section = $data[$i]['section'];
			if ($section == 0) {
				$data[$i]['preview_section'] = 'กทม';
			} else {
				$data[$i]['preview_section'] = $section;
			}
			
			$data[$i]['preview_self_management_score'] = number_format($data[$i]['self_management_score'], 2);
			$data[$i]['preview_psychological_capital_score'] = number_format($data[$i]['psychological_capital_score'], 2);
			$data[$i]['preview_self_esteem_score'] = number_format($data[$i]['self_esteem_score'], 2);
			$data[$i]['preview_identity_power_score'] = number_format($data[$i]['identity_power_score'], 2);
			$data[$i]['preview_compliance_score'] = number_format($data[$i]['compliance_score'], 2);
			$data[$i]['preview_domestic_violence_score'] = number_format($data[$i]['domestic_violence_score'], 2);
			$data[$i]['preview_exemplary_score'] = number_format($data[$i]['exemplary_score'], 2);
			$data[$i]['preview_media_exposure_score'] = number_format($data[$i]['media_exposure_score'], 2);
			$data[$i]['preview_attitude_score'] = number_format($data[$i]['attitude_score'], 2);
			$data[$i]['preview_family_power_score'] = number_format($data[$i]['family_power_score'], 2);
			$data[$i]['preview_source_purchase_score'] = number_format($data[$i]['source_purchase_score'], 2);
			$data[$i]['preview_school_power_score'] = number_format($data[$i]['school_power_score'], 2);
			$data[$i]['preview_friend_power_score'] = number_format($data[$i]['friend_power_score'], 2);
			$data[$i]['preview_community_power_score'] = number_format($data[$i]['community_power_score'], 2);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion1Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ชาย';
				break;
			case 2:
				$subject = 'หญิง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion3Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ศึกษาอยู่';
				break;
			case 2:
				$subject = 'ไม่ได้ศึกษา';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion5Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เป็นลูกคนเดียว';
				break;
			case 2:
				$subject = 'มีพี่น้องรวมทั้งหมด';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion6Subject($value)
	{

		$subject = '';
		switch ($value) {
			case '1':
				$subject = 'บิดามารดาอยู่ด้วยกัน';
				break;
			case '2':
				$subject = 'บิดามารดาแยกกันอยู่';
				break;
		}

		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion7Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'บิดามารดาอยู่ด้วยกัน';
				break;
			case 2:
				$subject = 'บิดามารดาแยกกันอยู่';
				break;
			case 3:
				$subject = 'บิดาเสียชีวิตแล้ว';
				break;
			case 4:
				$subject = ' มารดาเสียชีวิตแล้ว';
				break;
			case 5:
				$subject = 'บิดาและมารดาเสียชีวิตแล้ว';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion8Subject($value)
	{



		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เกษตร';
				break;
			case 2:
				$subject = 'รับราชการ / พนักงานราชการ';
				break;
			case 3:
				$subject = 'พนักงานเอกชน';
				break;
			case 4:
				$subject = 'รัฐวิสาหกิจ';
				break;
			case 5:
				$subject = 'รับจ้างทั่วไป';
				break;
			case 6:
				$subject = 'ธุรกิจส่วนตัว';
				break;
			case 7:
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion9Subject($value)
	{

		$subject = '';
		switch ($value) {
			case '1':
				$subject = 'บิดา';
				break;
			case '2':
				$subject = 'มารดา';
				break;
			case '3':
				$subject = 'ญาติ';
				break;
			case '4':
				$subject = 'เพื่อน';
				break;
			case '5':
				$subject = 'ครู';
				break;
			case '6':
				$subject = 'คนรัก';
				break;
			case '7':
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion10Subject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  '1';
					break;
				case '2':
					$subject .= $comma .  '2';
					break;
				case '3':
					$subject .= $comma .  '3';
					break;
				case '4':
					$subject .= $comma .  '4';
					break;
				case '5':
					$subject .= $comma .  '5';
					break;
				case '6':
					$subject .= $comma .  '6';
					break;
				case '7':
					$subject .= $comma .  'อื่น ๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion12Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เคย';
				break;
			case 2:
				$subject = 'ไม่เคย';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion13Subject($value)
	{
		$subject = '';
		switch ($value) {
			case '1':
				$subject = '1';
				break;
			case '2':
				$subject = '2';
				break;
			case '3':
				$subject = '3';
				break;
			case '4':
				$subject = '4';
				break;
			case '5':
				$subject = '5';
				break;
			case '6':
				$subject = '6';
				break;
			case '7':
				$subject = '7';
				break;
			case '8':
				$subject = '8';
				break;
			case '9':
				$subject = '9';
				break;
			case '10':
				$subject = '10';
				break;
			case '11':
				$subject = '11';
				break;
			case '12':
				$subject = 'อื่น ๆ โปรดระบุ';
				break;
		}
		return $subject;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;


		$provinceIdNameTh = $this->table('provinces')->get_value('name_th')->where("id = '$data[province_id]'");
		$this->data['provinceIdNameTh'] = $provinceIdNameTh;

		$this->data['record_id'] = $data['id'];
		$this->data['record_ref_assessment_id'] = $data['ref_assessment_id'];
		$this->data['record_province_id'] = $data['province_id'];
		$this->data['preview_question_1'] = $this->setQuestion1Subject($data['question_1']);
		$this->data['record_question_1'] = $data['question_1'];
		$this->data['record_question_2'] = $data['question_2'];
		$this->data['preview_question_3'] = $this->setQuestion3Subject($data['question_3']);
		$this->data['record_question_3'] = $data['question_3'];
		$this->data['record_question_4'] = $data['question_4'];
		$this->data['preview_question_5'] = $this->setQuestion5Subject($data['question_5']);
		$this->data['record_question_5'] = $data['question_5'];
		$this->data['preview_question_6'] = $this->setQuestion6Subject($data['question_6']);
		$this->data['record_question_6'] = $data['question_6'];
		$this->data['preview_question_7'] = $this->setQuestion7Subject($data['question_7']);
		$this->data['record_question_7'] = $data['question_7'];
		$this->data['preview_question_8'] = $this->setQuestion8Subject($data['question_8']);
		$this->data['record_question_8'] = $data['question_8'];
		$this->data['preview_question_9'] = $this->setQuestion9Subject($data['question_9']);
		$this->data['record_question_9'] = $data['question_9'];
		$this->data['preview_question_10'] = $this->setQuestion10Subject($data['question_10']);
		$this->data['record_question_10'] = $data['question_10'];
		$this->data['record_question_11'] = $data['question_11'];
		$this->data['preview_question_12'] = $this->setQuestion12Subject($data['question_12']);
		$this->data['record_question_12'] = $data['question_12'];
		$this->data['preview_question_13'] = $this->setQuestion13Subject($data['question_13']);
		$this->data['record_question_13'] = $data['question_13'];
		$this->data['record_question_14'] = $data['question_14'];
		$this->data['record_question_15'] = $data['question_15'];
		$this->data['record_question_16'] = $data['question_16'];
		$this->data['record_question_17'] = $data['question_17'];
		$this->data['record_create_datetime'] = $data['create_datetime'];

		$this->data['record_create_datetime'] = setThaiDate($data['create_datetime']);
	}

	public function export_excel()
	{
		// load excel library
		$this->load->library('import/Excel');

		$results = $this->Assessment->read();
		$data_lists = $this->setDataListFormat($results['list_data'], 0);

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		// set Header ***** SECTION 1 ***** 
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'จังหวัด');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', '1.เพศ');

		// END SECTION 1

		// set header bold
		$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);

		// set Row
		$rowCount = 2;
		foreach ($data_lists as $row) {

			// ***** SECTION 2 *****

			$sheet = $objPHPExcel->getActiveSheet();
			$sheet->SetCellValue('A' . $rowCount, $row['provinceIdNameTh']);
			$sheet->SetCellValue('B' . $rowCount, $row['preview_question_1']);


			$rowCount++;
		}

		foreach (range('A', 'C') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}


		$filename = "Assessment_list" . date("Y-m-d-H-i-s") . ".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		$objWriter->save('php://output');
	}
}
/*---------------------------- END Controller Class --------------------------------*/
