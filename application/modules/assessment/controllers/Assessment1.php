<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Assessment1.php ]
 */
class Assessment1 extends CRUD_Controller
{

	private $per_page;
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 30;
		$this->num_links = 6;
		$this->uri_segment = 4;
		$this->load->model('assessment/Assessment1_model', 'Assessment1');
		$this->Assessment1->session_name = 'assessment_assessment1';
		$this->data['page_url'] = site_url('assessment/assessment1');

		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/assessment/assessment1.js?ft=' . filemtime('assets/js_modules/assessment/assessment1.js');
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
		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		// $this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		// $this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;
		$this->data['utilities_file_time'] = filemtime('assets/js/ci_utilities.js');
		$this->data['provinces_province_id_option_list'] = $this->Assessment1->returnOptionList("provinces", "id", "name_th");

		$results = $this->Assessment1->load();
		$this->setPreviewFormat($results);
		$this->parser->parse('template/front-end/assessment_view', $this->data);
	}


	public function edit_data($assessment_id_by_user)
	{
		$_SESSION["assessment_id"] = $assessment_id_by_user;
		$this->list_all();
	}

	

	public function setPreviewFormat($row_data)
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
		$this->session->unset_userdata($this->Assessment1->session_name . '_search_field');
		$this->session->unset_userdata($this->Assessment1->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment1', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Assessment1->session_name . '_search_field' => $search_field, $this->Assessment1->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Assessment1->session_name . '_search_field');
			$value = $this->session->userdata($this->Assessment1->session_name . '_value');
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
			$this->Assessment1->order_field = $field;
			$this->Assessment1->order_sort = $sort;
		}
		$results = $this->Assessment1->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('assessment/assessment1');
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

		$this->render_view('assessment/assessment1/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment1', 'url' => site_url('assessment/assessment1')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment1->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('assessment/assessment1/preview_view');
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
			array('title' => 'Assessment1', 'url' => site_url('assessment/assessment1')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['provinces_province_id_option_list'] = $this->Assessment1->returnOptionList("provinces", "id", "name_th");
		// $this->render_view('assessment/assessment1/add_view');
		$this->render_view('assessment/assessment1/add_view');
	}

	// ------------------------------------------------------------------------


	public function multiple_select($value, $name)
	{
		$arr_choice = $this->input->post($name . '[]');
		if (!empty($arr_choice)) {
			$arr_choice = array_filter($arr_choice, function ($v) {
				return $v !== '';
			});
		}
		if (empty($arr_choice)) :
			return false;
		endif;
	}

	/**
	 * Default Validation
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$post = $this->input->post(NULL, TRUE);

		$encrypt_id = '';
		$question_15 = $post['question_15'];


		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', 'เพศ', 'trim|required|is_natural');
		$frm->set_rules('question_2', 'อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', 'สถานภาพการศึกษา', 'trim|required|is_natural');
		// $frm->set_rules('question_4', 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่ ', 'trim|required|is_natural');
		$frm->set_rules('question_5', 'จำนวนพี่น้อง', 'trim|required|is_natural');
		$question_5 = $post['question_5'];
		if ($question_5 == 2) {
			$question_6 = $post['question_6'];
			if($question_6 == ''){
				$frm->set_rules('question_6', 'จำนวนพี่น้อง', 'trim|required');
			}
			
		}


		$frm->set_rules('question_7', 'สถานภาพทางครอบครัว', 'trim|required|is_natural');
		$frm->set_rules('question_8', 'อาชีพของบิดา', 'trim|required|is_natural');
		$frm->set_rules('question_10', 'อาชีพของมารดา', 'trim|required|is_natural');
		$frm->set_rules('question_12', 'รายได้ของครอบครัว (เฉลี่ยต่อเดือน) ', 'trim|required|is_natural');
		$frm->set_rules('question_15', 'ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่ ', 'trim|required|is_natural');

		// 1= เคย ,2 ช= ไม่เคย  
		// if ($question_15 == 1) {
		// 	$frm->set_rules('question_16', 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|required|is_natural');
		// }

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province_id');
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			// $message .= form_error('question_4');
			$message .= form_error('question_5');
			$question_5 = $post['question_5'];
		if ($question_5 == 2) {
			$question_6 = $post['question_6'];
			if($question_6 == ''){
				$message .= form_error('question_6');
			}
			
		}


			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_10');
			$message .= form_error('question_12');
			$message .= form_error('question_15');

			// if ($question_15 == 1) {
			// 	$message .= form_error('question_16');
			// }

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
		$frm->set_rules('question_1', 'เพศ', 'trim|required|is_natural');
		$frm->set_rules('question_2', 'อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', 'สถานภาพการศึกษา', 'trim|required|is_natural');
		$frm->set_rules('question_4', 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่', 'trim|required|is_natural');
		$frm->set_rules('question_5', 'จำนวนพี่น้อง', 'trim|required|is_natural');
		$frm->set_rules('question_6', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_7', 'สถานภาพทางครอบครัว', 'trim|required|is_natural');
		$frm->set_rules('question_8', 'อาชีพของบิดา', 'trim|required|is_natural');
		$frm->set_rules('question_9', 'อาชีพของมารดา', 'trim|required|is_natural');
		$frm->set_rules('question_10', 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง', 'trim|callback_multiple_select[question_10]');
		$frm->set_rules('question_11', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_12', 'ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่', 'trim|required|is_natural');
		$frm->set_rules('question_13', 'ท่านเคยลองใช้สารเสพติดใดบ้าง', 'trim|required');
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
			$post['question_13'] = implode(',', $post['question_13']);

			$question_15 = $post['question_15'];
			if ($question_15 == 1) {
				$post['question_16'] = implode(',', $post['question_16']);
			} else {
				$post['question_16'] = '';
				$post['question_17'] = '';
			}


			$question_3 = $post['question_3'];


			if ($question_3  == 1) {
				$post['question_4'] = $post['question_4'];
			} else {
				$post['question_4'] = '';
			}

			$question_5 = $post['question_5'];
			if ($question_5  == 2) {
				$post['question_6'] = $post['question_6'];
			} else {
				$post['question_6'] = '';
			}

			$question_8 = $post['question_8'];
			if ($question_8  == 7) {
				$post['question_9'] = $post['question_9'];
			} else {
				$post['question_9'] = '';
			}

			$question_10 = $post['question_10'];
			if ($question_10  == 6) {
				$post['question_11'] = implode(',', $post['question_11']);
			} else {
				$post['question_11'] = '';
			}




			$id = $this->Assessment1->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Assessment1->error_message;
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
			$result = $this->Assessment1->update($post);
			if ($result == false) {
				$message = $this->Assessment1->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Assessment1->error_message;
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
			$result = $this->Assessment1->delete($post);
			if ($result == false) {
				$message = $this->Assessment1->error_message;
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
			$data[$i]['preview_question_1'] = $this->setQuestion1Subject($data[$i]['question_1']);
			$data[$i]['preview_question_3'] = $this->setQuestion3Subject($data[$i]['question_3']);
			$data[$i]['preview_question_5'] = $this->setQuestion5Subject($data[$i]['question_5']);
			$data[$i]['preview_question_6'] = $this->setQuestion6Subject($data[$i]['question_6']);
			$data[$i]['preview_question_7'] = $this->setQuestion7Subject($data[$i]['question_7']);
			$data[$i]['preview_question_8'] = $this->setQuestion8Subject($data[$i]['question_8']);
			$data[$i]['preview_question_9'] = $this->setQuestion9Subject($data[$i]['question_9']);
			$data[$i]['preview_question_10'] = $this->setQuestion10Subject($data[$i]['question_10']);
			$data[$i]['preview_question_12'] = $this->setQuestion12Subject($data[$i]['question_12']);
			$data[$i]['preview_question_13'] = $this->setQuestion13Subject($data[$i]['question_13']);
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
				$subject = '1.ศึกษาอยู่';
				break;
			case 2:
				$subject = '2. ไม่ได้ศึกษา';
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
				$subject = '1. เป็นลูกคนเดียว';
				break;
			case 2:
				$subject = '2. มีพี่น้องรวมทั้งหมด';
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
				$subject = 'Choice 1';
				break;
			case '2':
				$subject = 'Choice 2';
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
				$subject = '1. บิดามารดาอยู่ด้วยกัน';
				break;
			case 2:
				$subject = '2. บิดามารดาแยกกันอยู่';
				break;
			case 3:
				$subject = '3. บิดาเสียชีวิตแล้ว';
				break;
			case 4:
				$subject = '4. มารดาเสียชีวิตแล้ว';
				break;
			case 5:
				$subject = '5. บิดาและมารดาเสียชีวิตแล้ว';
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
				$subject = '1';
				break;
			case 2:
				$subject = '2';
				break;
			case 3:
				$subject = '3';
				break;
			case 4:
				$subject = '4';
				break;
			case 5:
				$subject = '5';
				break;
			case 6:
				$subject = '6';
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
			case 1:
				$subject = '1';
				break;
			case 2:
				$subject = '2';
				break;
			case 3:
				$subject = '3';
				break;
			case 4:
				$subject = '4';
				break;
			case 5:
				$subject = '5';
				break;
			case 6:
				$subject = '6';
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
}
/*---------------------------- END Controller Class --------------------------------*/
