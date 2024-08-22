<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Result_data.php ]
 */
class Result_data extends MEMBER_Controller
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
		$this->load->model('services/Result_data_model', 'Result_data');
		$this->Result_data->session_name = 'services_result_data';

		$this->data['page_url'] = site_url('services/result_data');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/result_data.js?ft=' . filemtime('assets/js_modules/services/result_data.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Result_data', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Result_data->session_name . '_search_field');
		$this->session->unset_userdata($this->Result_data->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Result_data', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Result_data->session_name . '_search_field' => $search_field, $this->Result_data->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Result_data->session_name . '_search_field');
			$value = $this->session->userdata($this->Result_data->session_name . '_value');
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
			$this->Result_data->order_field = $field;
			$this->Result_data->order_sort = $sort;
		}
		$results = $this->Result_data->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/result_data');
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

		$this->render_view('services/result_data/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Result_data', 'url' => site_url('services/result_data')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Result_data->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/result_data/preview_view');
			}
		}
	}


	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	/**
	 * set default input for add form
	 */
	public function setFormAddData()
	{
		$service_information_id = $this->session->userdata('service_information_id');
		$this->data['source_service_information_id'] = $service_information_id;
	}

	/**
	 * Add form
	 */
	public function add()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Result_data', 'url' => site_url('services/result_data')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('services/result_data/add_view');
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

		$frm->set_rules('patient_status', 'สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต[1=มีชีวิต รักษาในโรงพยาบาล,2=เสียชีวิต]	', 'trim|required|is_natural');
		$frm->set_rules('patient_status_dead', 'เสียชีวิต[1=เสียชีวิตก่อนถึงโรงพยาบาล,2=เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน,3=เสียชีวิตระหว่างนอนโรงพยาบาล,4=กลับไปเสียชีวิตที่บ้าน]', 'trim|required|is_natural');
		$frm->set_rules('department', 'แผนกที่ผู้ป่วยเข้ารับการรักษา[1=หอผู้ป่วยหนัก,2=หอผู้ป่วยสามัญ]	', 'trim|required|is_natural');
		$frm->set_rules('survival', 'การรอดชีวิต จำหน่ายออกจากโรงพยาบาล[1=ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล,2=มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง,3=มี Neuro deficit  ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent)]', 'trim|required|is_natural');
		$frm->set_rules('days_admitted', 'จำนวนวันที่รับไว้รักษาในโรงพยาบาล', 'trim|required|is_natural');
		$frm->set_rules('date_out', 'วันเวลาที่จำหน่าย', 'trim|required');
		$frm->set_rules('date_out_course', 'เหตุผลในการจำหน่าย[1=ญาติปฏิเสธการรักษา,2=มีชีวิต,3=เสียชีวิต]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('patient_status');
			$message .= form_error('patient_status_dead');
			$message .= form_error('department');
			$message .= form_error('survival');
			$message .= form_error('days_admitted');
			$message .= form_error('date_out');
			$message .= form_error('date_out_course');
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

		$frm->set_rules('patient_status', 'สถานภาพผู้ป่วยภายหลังทำการช่วยชีวิต[1=มีชีวิต รักษาในโรงพยาบาล,2=เสียชีวิต]	', 'trim|required|is_natural');
		$frm->set_rules('patient_status_dead', 'เสียชีวิต[1=เสียชีวิตก่อนถึงโรงพยาบาล,2=เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน,3=เสียชีวิตระหว่างนอนโรงพยาบาล,4=กลับไปเสียชีวิตที่บ้าน]', 'trim|required|is_natural');
		$frm->set_rules('department', 'แผนกที่ผู้ป่วยเข้ารับการรักษา[1=หอผู้ป่วยหนัก,2=หอผู้ป่วยสามัญ]	', 'trim|required|is_natural');
		$frm->set_rules('survival', 'การรอดชีวิต จำหน่ายออกจากโรงพยาบาล[1=ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล,2=มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง,3=มี Neuro deficit  ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent)]', 'trim|required|is_natural');
		$frm->set_rules('days_admitted', 'จำนวนวันที่รับไว้รักษาในโรงพยาบาล', 'trim|required|is_natural');
		$frm->set_rules('date_out', 'วันเวลาที่จำหน่าย', 'trim|required');
		$frm->set_rules('date_out_course', 'เหตุผลในการจำหน่าย[1=ญาติปฏิเสธการรักษา,2=มีชีวิต,3=เสียชีวิต]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('patient_status');
			$message .= form_error('patient_status_dead');
			$message .= form_error('department');
			$message .= form_error('survival');
			$message .= form_error('days_admitted');
			$message .= form_error('date_out');
			$message .= form_error('date_out_course');
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

			$post['service_information_id'] = $this->session->userdata('service_information_id');

			$encrypt_id = '';
			$id = $this->Result_data->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Result_data->error_message;
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


	public function edit_data($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'ผลลัพธ์', 'url' => site_url('services/result_data')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = $this->session->userdata('service_information_id');

		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Result_data->load_edit_data($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->data['record_date_out'] = setThaiDate($results['date_out']);

				$this->render_view('services/result_data/edit_view');
			}
		}
	}


	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Result_data', 'url' => site_url('services/result_data')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Result_data->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->data['record_date_out'] = setThaiDate($results['date_out']);

				$this->render_view('services/result_data/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$result_data_id = ci_decrypt($data['encrypt_result_data_id']);
		if ($result_data_id == '') {
			$error .= '- รหัส result_data_id';
		}
		return $error;
	}

	/**
	 * Update Record
	 */
	public function update()
	{
		$message = '';
		// $message .= $this->formValidateUpdate();
		// $edit_remark = $this->input->post('edit_remark', TRUE);
		// if ($edit_remark == '') {
		// 	$message .= 'ระบุเหตุผล';
		// }

		$post = $this->input->post(NULL, TRUE);
		$error_pk_id = $this->checkRecordKey($post);
		if ($error_pk_id != '') {
			$message .= "รหัสอ้างอิงที่ใช้สำหรับอัพเดตข้อมูลไม่ถูกต้อง";
		}
		// if ($message != '') {
		// 	$json = json_encode(array(
		// 				'is_successful' => FALSE,
		// 				'message' => $message
		// 	));
		// 	 echo $json;
		// } else {

		$post['service_information_id'] = $this->session->userdata('service_information_id');

		$result = $this->Result_data->update($post);
		if ($result == false) {
			$message = $this->Result_data->error_message;
			$ok = FALSE;
		} else {
			$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Result_data->error_message;
			$ok = TRUE;
		}
		$json = json_encode(array(
			'is_successful' => $ok,
			'message' => $message
		));

		echo $json;
		// }
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
			$result = $this->Result_data->delete($post);
			if ($result == false) {
				$message = $this->Result_data->error_message;
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
			$pk1 = $data[$i]['result_data_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_result_data_id'] = $pk1;
			$data[$i]['preview_patient_status'] = $this->setPatientStatusSubject($data[$i]['patient_status']);
			$data[$i]['preview_patient_status_dead'] = $this->setPatientStatusDeadSubject($data[$i]['patient_status_dead']);
			$data[$i]['preview_department'] = $this->setDepartmentSubject($data[$i]['department']);
			$data[$i]['preview_survival'] = $this->setSurvivalSubject($data[$i]['survival']);
			$data[$i]['preview_date_out_course'] = $this->setDateOutCourseSubject($data[$i]['date_out_course']);
			$data[$i]['date_out'] = setThaiDate($data[$i]['date_out']);
		}
		return $data;
	}

	/**
	 * SET array data for add form 
	 */
	private function setAddFormat($row_data)
	{
	}

	/**
	 * SET choice subject
	 */
	private function setPatientStatusSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'มีชีวิต รักษาในโรงพยาบาล';
				break;
			case 2:
				$subject = 'เสียชีวิต';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setPatientStatusDeadSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เสียชีวิตก่อนถึงโรงพยาบาล';
				break;
			case 2:
				$subject = 'เสียชีวิตที่แผนกอุบัติเหตุและฉุกเฉิน';
				break;
			case 3:
				$subject = 'เสียชีวิตระหว่างนอนโรงพยาบาล';
				break;
			case 4:
				$subject = 'กลับไปเสียชีวิตที่บ้าน';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDepartmentSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'หอผู้ป่วยหนัก';
				break;
			case 2:
				$subject = 'หอผู้ป่วยสามัญ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setSurvivalSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่มี Neuro deficit สามารถกลับไปใช้ชีวิตได้ตามปกติ จำหน่ายออกจากโรงพยาบาล';
				break;
			case 2:
				$subject = 'มี Neuro deficit แต่ยังสามารถช่วยเหลือตัวเองได้บ้าง';
				break;
			case 3:
				$subject = 'มี Neuro deficit  ไม่สามารถช่วยเหลือตนเองได้เลย (Fully dependent)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDateOutCourseSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ญาติปฏิเสธการรักษา';
				break;
			case 2:
				$subject = 'มีชีวิต';
				break;
			case 3:
				$subject = 'เสียชีวิต';
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

		$pk1 = $data['result_data_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_result_data_id'] = $pk1;

		$this->data['record_result_data_id'] = $data['result_data_id'];
		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['preview_patient_status'] = $this->setPatientStatusSubject($data['patient_status']);
		$this->data['record_patient_status'] = $data['patient_status'];
		$this->data['preview_patient_status_dead'] = $this->setPatientStatusDeadSubject($data['patient_status_dead']);
		$this->data['record_patient_status_dead'] = $data['patient_status_dead'];
		$this->data['preview_department'] = $this->setDepartmentSubject($data['department']);
		$this->data['record_department'] = $data['department'];
		$this->data['preview_survival'] = $this->setSurvivalSubject($data['survival']);
		$this->data['record_survival'] = $data['survival'];
		$this->data['record_days_admitted'] = $data['days_admitted'];
		$this->data['record_date_out'] = $data['date_out'];
		$this->data['preview_date_out_course'] = $this->setDateOutCourseSubject($data['date_out_course']);
		$this->data['record_date_out_course'] = $data['date_out_course'];

		$this->data['record_date_out'] = setThaiDate($data['date_out']);
	}
}
/*---------------------------- END Controller Class --------------------------------*/
