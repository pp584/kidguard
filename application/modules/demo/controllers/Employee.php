<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Employee.php ]
 */
class Employee extends CRUD_Controller
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
		$this->load->model('demo/Employee_model', 'Employee');
		$this->data['page_url'] = site_url('demo/employee');
		
		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/demo/employee.js?ft='. filemtime('assets/js_modules/demo/employee.js');
		$this->another_js .= '<script src="'. base_url($js_url) .'"></script>';
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
	public function create_pagination($page_url, $total) {
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
	public function list_all() {
		$this->session->unset_userdata($this->Employee->session_name . '_search_field');
		$this->session->unset_userdata($this->Employee->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Employee', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Employee->session_name . '_search_field' => $search_field, $this->Employee->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Employee->session_name . '_search_field');
			$value = $this->session->userdata($this->Employee->session_name . '_value');
		}

		$start_row = $this->uri->segment($this->uri_segment ,'0');
		if(!is_numeric($start_row)){
			$start_row = 0;
		}
		$per_page = $this->per_page;
		$order_by =  $this->input->post('order_by', TRUE);
		if ($order_by != '') {
			$arr = explode('|', $order_by);
			$field = $arr[0];
			$sort = $arr[1];
			switch($sort){
				case 'asc':$sort = 'ASC';break;
				case 'desc':$sort = 'DESC';break;
				default:$sort = 'DESC';break;
			}
			$this->Employee->order_field = $field;
			$this->Employee->order_sort = $sort;
		}
		$results = $this->Employee->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('demo/employee');
		$pagination = $this->create_pagination($page_url.'/search', $search_row);
		$end_row = $start_row + $per_page;
		if($search_row < $per_page){
			$end_row = $search_row;
		}

		if($end_row > $search_row){
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

		$this->render_view('demo/employee/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Employee', 'url' => site_url('demo/employee')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Employee->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('demo/employee/preview_view');
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
						array('title' => 'Employee', 'url' => site_url('demo/employee')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->render_view('demo/employee/add_view');
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

		$frm->set_rules('name_id', 'รหัสPR', 'trim|required');
		$frm->set_rules('code_id', 'code_id', 'trim|required');
		$frm->set_rules('emp_barcode', 'รหัสลงเวลา', 'trim|required');
		$frm->set_rules('rf_branch_id', 'สาขา', 'trim|required');
		$frm->set_rules('rf_company', 'บริษัท', 'trim|required');
		$frm->set_rules('rf_pre_id', 'คำนำหน้า', 'trim|required');
		$frm->set_rules('emp_name', 'ชื่อ', 'trim|required');
		$frm->set_rules('emp_surname', 'นามสกุล', 'trim|required');
		$frm->set_rules('birthday', 'วันเกิด', 'trim|required');
		$frm->set_rules('start_date', 'วันที่ทำงาน', 'trim|required');
		$frm->set_rules('quit_date', 'วันที่ลาออก', 'trim|required');
		$frm->set_rules('year_experience', 'อายุงาน', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('name_id');
			$message .= form_error('code_id');
			$message .= form_error('emp_barcode');
			$message .= form_error('rf_branch_id');
			$message .= form_error('rf_company');
			$message .= form_error('rf_pre_id');
			$message .= form_error('emp_name');
			$message .= form_error('emp_surname');
			$message .= form_error('birthday');
			$message .= form_error('start_date');
			$message .= form_error('quit_date');
			$message .= form_error('year_experience');
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

		$frm->set_rules('name_id', 'รหัสPR', 'trim|required');
		$frm->set_rules('code_id', 'code_id', 'trim|required');
		$frm->set_rules('emp_barcode', 'รหัสลงเวลา', 'trim|required');
		$frm->set_rules('rf_branch_id', 'สาขา', 'trim|required');
		$frm->set_rules('rf_company', 'บริษัท', 'trim|required');
		$frm->set_rules('rf_pre_id', 'คำนำหน้า', 'trim|required');
		$frm->set_rules('emp_name', 'ชื่อ', 'trim|required');
		$frm->set_rules('emp_surname', 'นามสกุล', 'trim|required');
		$frm->set_rules('birthday', 'วันเกิด', 'trim|required');
		$frm->set_rules('start_date', 'วันที่ทำงาน', 'trim|required');
		$frm->set_rules('quit_date', 'วันที่ลาออก', 'trim|required');
		$frm->set_rules('year_experience', 'อายุงาน', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('name_id');
			$message .= form_error('code_id');
			$message .= form_error('emp_barcode');
			$message .= form_error('rf_branch_id');
			$message .= form_error('rf_company');
			$message .= form_error('rf_pre_id');
			$message .= form_error('emp_name');
			$message .= form_error('emp_surname');
			$message .= form_error('birthday');
			$message .= form_error('start_date');
			$message .= form_error('quit_date');
			$message .= form_error('year_experience');
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
			$id = $this->Employee->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Employee->error_message;
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
						array('title' => 'Employee', 'url' => site_url('demo/employee')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Employee->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_birthday'] = setThaiDate($results['birthday']);
				$this->data['record_start_date'] = setThaiDate($results['start_date']);
				$this->data['record_quit_date'] = setThaiDate($results['quit_date']);

				$this->render_view('demo/employee/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$emp_id = ci_decrypt($data['encrypt_emp_id']);
		if($emp_id==''){
			$error .= '- รหัส emp_id';
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

			$result = $this->Employee->update($post);
			if($result == false){
				$message = $this->Employee->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Employee->error_message;
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
		}else{
			$result = $this->Employee->delete($post);
			if($result == false){
				$message = $this->Employee->error_message;
				$ok = FALSE;
			}else{
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
	private function setDataListFormat($lists_data, $start_row=0)
	{
		$data = $lists_data;
		$count = count($lists_data);
		for($i=0;$i<$count;$i++){
			$start_row++;
			$data[$i]['record_number'] = $start_row;
			$pk1 = $data[$i]['emp_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_emp_id'] = $pk1;
			$data[$i]['birthday'] = setThaiDate($data[$i]['birthday']);
			$data[$i]['start_date'] = setThaiDate($data[$i]['start_date']);
			$data[$i]['quit_date'] = setThaiDate($data[$i]['quit_date']);
		}
		return $data;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['emp_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_emp_id'] = $pk1;

		$this->data['record_emp_id'] = $data['emp_id'];
		$this->data['record_name_id'] = $data['name_id'];
		$this->data['record_code_id'] = $data['code_id'];
		$this->data['record_emp_barcode'] = $data['emp_barcode'];
		$this->data['record_rf_branch_id'] = $data['rf_branch_id'];
		$this->data['record_rf_company'] = $data['rf_company'];
		$this->data['record_rf_pre_id'] = $data['rf_pre_id'];
		$this->data['record_emp_name'] = $data['emp_name'];
		$this->data['record_emp_surname'] = $data['emp_surname'];
		$this->data['record_birthday'] = $data['birthday'];
		$this->data['record_start_date'] = $data['start_date'];
		$this->data['record_quit_date'] = $data['quit_date'];
		$this->data['record_year_experience'] = $data['year_experience'];

		$this->data['record_birthday'] = setThaiDate($data['birthday']);
		$this->data['record_start_date'] = setThaiDate($data['start_date']);
		$this->data['record_quit_date'] = setThaiDate($data['quit_date']);

	}
	
	 public function get_year_experience()
	 {
		$start_date = $this->input->post('start_date', TRUE);
		if($start_date){
			$start_date = setDateToStandard($start_date);
			
			$end_date = $this->input->post('quit_date', TRUE);
			
			if(!$end_date){
				$end_date = date('Y-m-d');
			}else{
				$end_date = setDateToStandard($end_date);
			}
			

			$arr = ci_date_diff($start_date, $end_date);
			echo "$arr[year] ปี $arr[month] เดือน $arr[day] วัน";
		}
	 }
	
}
/*---------------------------- END Controller Class --------------------------------*/
