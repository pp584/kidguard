<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Verify_information.php ]
 */
class Verify_information extends MEMBER_Controller
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
		$this->load->model('services/Verify_information_model', 'Verify_information');
		$this->Verify_information->session_name = 'services_verify_information';

		$this->data['page_url'] = site_url('services/verify_information');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/verify_information.js?ft=' . filemtime('assets/js_modules/services/verify_information.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Verify_information', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Verify_information->session_name . '_search_field');
		$this->session->unset_userdata($this->Verify_information->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Verify_information', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Verify_information->session_name . '_search_field' => $search_field, $this->Verify_information->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Verify_information->session_name . '_search_field');
			$value = $this->session->userdata($this->Verify_information->session_name . '_value');
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
			$this->Verify_information->order_field = $field;
			$this->Verify_information->order_sort = $sort;
		}
		$results = $this->Verify_information->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/verify_information');
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

		$this->render_view('services/verify_information/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Verify_information', 'url' => site_url('services/verify_information')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Verify_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/verify_information/preview_view');
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
			array('title' => 'Verify_information', 'url' => site_url('services/verify_information')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['service_information_service_unit_name_option_list'] = $this->Verify_information->returnOptionList("service_information", "service_unit_name", "service_unit_name");
		$this->data['tb_members_create_by_userid_option_list'] = $this->Verify_information->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)");
		$this->render_view('services/verify_information/add_view');
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

		// $frm->set_rules('master_ohca_id', 'master_ohca_id', 'trim|required');
		// $frm->set_rules('service_unit_name', 'หน่วยบริการ   ', 'trim|required');
		// $frm->set_rules('operating_command', 'ปฏิบัติการที่', 'trim|required');
		// $frm->set_rules('zone_area', 'พื้นที่โซน', 'trim|required');
		// $frm->set_rules('police_station', 'สน', 'trim|required');
		// $frm->set_rules('operating_number', 'เลขที่ปฏิบัติการ', 'trim|required');
		// $frm->set_rules('regis_date', 'วันที่', 'trim|required');
		// $frm->set_rules('performance', 'ผลการปฏิบัติ[1=พบเหตุ,2=ไม่พบเหตุ,3=ปฏิบัติการ,4=ในพื้นที่,5=นอกพื้นที่]', 'trim|required|is_natural');
		// $frm->set_rules('locale', 'สถานที่เกิดเหตุ', 'trim|required');
		// $frm->set_rules('event', 'เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)', 'trim|required');
		// $frm->set_rules('create_by_userid', 'สร้างโดย', 'trim|required|is_natural');
		$frm->set_rules('status', 'สถานะ [0=ฉบับร่าง,1=เผยแพร่]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			// $message .= form_error('master_ohca_id');
			// $message .= form_error('service_unit_name');
			// $message .= form_error('operating_command');
			// $message .= form_error('zone_area');
			// $message .= form_error('police_station');
			// $message .= form_error('operating_number');
			// $message .= form_error('regis_date');
			// $message .= form_error('performance');
			// $message .= form_error('locale');
			// $message .= form_error('event');
			// $message .= form_error('create_by_userid');
			$message .= form_error('status');
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

		// $frm->set_rules('master_ohca_id', 'master_ohca_id', 'trim|required');
		// $frm->set_rules('service_unit_name', 'หน่วยบริการ   ', 'trim|required');
		// $frm->set_rules('operating_command', 'ปฏิบัติการที่', 'trim|required');
		// $frm->set_rules('zone_area', 'พื้นที่โซน', 'trim|required');
		// $frm->set_rules('police_station', 'สน', 'trim|required');
		// $frm->set_rules('operating_number', 'เลขที่ปฏิบัติการ', 'trim|required');
		// $frm->set_rules('regis_date', 'วันที่', 'trim|required');
		// $frm->set_rules('performance', 'ผลการปฏิบัติ[1=พบเหตุ,2=ไม่พบเหตุ,3=ปฏิบัติการ,4=ในพื้นที่,5=นอกพื้นที่]', 'trim|required|is_natural');
		// $frm->set_rules('locale', 'สถานที่เกิดเหตุ', 'trim|required');
		// $frm->set_rules('event', 'เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)', 'trim|required');
		// $frm->set_rules('create_by_userid', 'สร้างโดย', 'trim|required|is_natural');
		$frm->set_rules('status', 'สถานะ [0=ฉบับร่าง,1=เผยแพร่]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			// $message .= form_error('master_ohca_id');
			// $message .= form_error('service_unit_name');
			// $message .= form_error('operating_command');
			// $message .= form_error('zone_area');
			// $message .= form_error('police_station');
			// $message .= form_error('operating_number');
			// $message .= form_error('regis_date');
			// $message .= form_error('performance');
			// $message .= form_error('locale');
			// $message .= form_error('event');
			// $message .= form_error('create_by_userid');
			$message .= form_error('status');
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
			$id = $this->Verify_information->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Verify_information->error_message;
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
			array('title' => 'ยืนยันเผยแพร่ข้อมูล', 'url' => site_url('services/verify_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = $this->session->userdata('service_information_id');
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Verify_information->load_edit_data($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);
				$this->setPreviewFormat($results);

				$this->data['record_regis_date'] = setThaiDate($results['regis_date']);
				$this->data['record_create_date'] = setThaiDate($results['create_date']);

				$this->data['service_information_service_unit_name_option_list'] = $this->Verify_information->returnOptionList("service_information", "service_unit_name", "service_unit_name");
				$this->data['tb_members_create_by_userid_option_list'] = $this->Verify_information->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)");
				$this->render_view('services/verify_information/edit_view');
			}
		}
	}


	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Verify_information', 'url' => site_url('services/verify_information')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Verify_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_regis_date'] = setThaiDate($results['regis_date']);
				$this->data['record_create_date'] = setThaiDate($results['create_date']);

				$this->data['service_information_service_unit_name_option_list'] = $this->Verify_information->returnOptionList("service_information", "service_unit_name", "service_unit_name");
				$this->data['tb_members_create_by_userid_option_list'] = $this->Verify_information->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)");
				$this->render_view('services/verify_information/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$service_information_id = ci_decrypt($data['encrypt_service_information_id']);
		if ($service_information_id == '') {
			$error .= '- รหัส service_information_id';
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

			$result = $this->Verify_information->update($post);
			if ($result == false) {
				$message = $this->Verify_information->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Verify_information->error_message;
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
			$result = $this->Verify_information->delete($post);
			if ($result == false) {
				$message = $this->Verify_information->error_message;
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
			$pk1 = $data[$i]['service_information_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_service_information_id'] = $pk1;
			$data[$i]['preview_performance'] = $this->setPerformanceSubject($data[$i]['performance']);
			$data[$i]['preview_event'] = $this->setEventSubject($data[$i]['event']);
			$data[$i]['preview_status'] = $this->setStatusSubject($data[$i]['status']);
			$data[$i]['regis_date'] = setThaiDate($data[$i]['regis_date']);
			$data[$i]['create_date'] = setThaiDate($data[$i]['create_date']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setPerformanceSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'พบเหตุ';
				break;
			case 2:
				$subject = 'ไม่พบเหตุ';
				break;
			case 3:
				$subject = 'ปฏิบัติการ';
				break;
			case 4:
				$subject = 'ในพื้นที่';
				break;
			case 5:
				$subject = 'นอกพื้นที่';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setEventSubject($value)
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
	private function setStatusSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 0:
				$subject = 'ฉบับร่าง';
				break;
			case 1:
				$subject = 'เผยแพร่';
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

		$pk1 = $data['service_information_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_service_information_id'] = $pk1;


		$serviceUnitNameServiceUnitName = $this->table('service_information')->get_value('service_unit_name')->where("service_unit_name = '$data[service_unit_name]'");
		$this->data['serviceUnitNameServiceUnitName'] = $serviceUnitNameServiceUnitName;


		$titleRow = $this->table('tb_members')->get_array('firstname, lastname')->where("userid = '$data[create_by_userid]'");
		if (!empty($titleRow)) {
			$createByUseridFirstname = $titleRow['firstname'];
			$createByUseridLastname = $titleRow['lastname'];
		} else {
			$createByUseridFirstname = '';
			$createByUseridLastname = '';
		}
		$this->data['createByUseridFirstname'] = $createByUseridFirstname;
		$this->data['createByUseridLastname'] = $createByUseridLastname;

		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['record_master_ohca_id'] = $data['master_ohca_id'];
		$this->data['record_service_unit_name'] = $data['service_unit_name'];
		$this->data['record_operating_command'] = $data['operating_command'];
		$this->data['record_zone_area'] = $data['zone_area'];
		$this->data['record_police_station'] = $data['police_station'];
		$this->data['record_operating_number'] = $data['operating_number'];
		$this->data['record_regis_date'] = $data['regis_date'];
		$this->data['preview_performance'] = $this->setPerformanceSubject($data['performance']);
		$this->data['record_performance'] = $data['performance'];
		$this->data['record_locale'] = $data['locale'];
		$this->data['preview_event'] = $this->setEventSubject($data['event']);
		$this->data['record_event'] = $data['event'];
		$this->data['record_create_by_userid'] = $data['create_by_userid'];
		$this->data['record_create_date'] = $data['create_date'];
		$this->data['preview_status'] = $this->setStatusSubject($data['status']);
		$this->data['record_status'] = $data['status'];

		$this->data['record_regis_date'] = setThaiDate($data['regis_date']);
		$this->data['record_create_date'] = setThaiDate($data['create_date']);
	}
}
/*---------------------------- END Controller Class --------------------------------*/
