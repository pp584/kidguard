<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Academic_year.php ]
 */
class Academic_year extends CRUD_Controller
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
		$this->load->model('demo/Academic_year_model', 'Academic_year');
		
		$this->data['page_url'] = site_url('demo/academic_year');
		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/demo/academic_year.js?ft='. filemtime('assets/js_modules/demo/academic_year.js');
		$this->another_js = '<script src="'. base_url($js_url) .'"></script>';
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
	private function render_view($path)
	{
		$this->data['top_navbar'] = $this->parser->parse('template/sb-admin-bs4/top_navbar_view', $this->left_sidebar_data, TRUE);
		$this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		$this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;
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
		$this->session->unset_userdata($this->Academic_year->session_name . '_search_field');
		$this->session->unset_userdata($this->Academic_year->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Academic_year', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Academic_year->session_name . '_search_field' => $search_field, $this->Academic_year->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Academic_year->session_name . '_search_field');
			$value = $this->session->userdata($this->Academic_year->session_name . '_value');
		}

		$start_row = $this->uri->segment(4 ,'0');
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
			}
			$this->Academic_year->order_field = $field;
			$this->Academic_year->order_sort = $sort;
		}
		$results = $this->Academic_year->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('demo/academic_year');
		$pagination = $this->create_pagination($page_url.'/index', $search_row);
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
		$this->data['current_page_offset'] = $start_row;
		$this->data['start_row']	= $start_row + 1;
		$this->data['end_row']	= $end_row;
		$this->data['order_by']	= $order_by;
		$this->data['total_row']	= $total_row;
		$this->data['search_row']	= $search_row;
		$this->data['page_url']	= $page_url;
		$this->data['pagination_link']	= $pagination;
		$this->data['csrf_protection_field']	= insert_csrf_field(true);

		$this->render_view('demo/academic_year/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Academic_year', 'url' => site_url('demo/academic_year')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Academic_year->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('demo/academic_year/preview_view');
			}
		}
	}


	// ------------------------------------------------------------------------
	/**
	 * Add form
	 */
	public function add()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Academic_year', 'url' => site_url('demo/academic_year')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['tb_year_option_list'] = $this->Academic_year->returnOptionList("tb_year", "year_num", "year_num");
		$this->data['tb_room_option_list'] = $this->Academic_year->returnOptionList("tb_room", "id", "room_name");
		$this->data['tb_student_option_list'] = $this->Academic_year->returnOptionList("tb_student", "id", "CONCAT_WS(' - ', prefix_name,firstname,lastname)");
		$this->render_view('demo/academic_year/add_view'); 
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

		$frm->set_rules('thai_year', 'ปีการศึกษา', 'trim|required|is_natural');
		$frm->set_rules('term', 'เทอม', 'trim|required|is_natural');
		$frm->set_rules('class_room', 'รหัสอ้างอิง ตารางห้อง', 'trim|required|is_natural');
		$frm->set_rules('ref_student_id', 'รหัสอ้างอิง ตารางนักเรียน', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('thai_year');
			$message .= form_error('term');
			$message .= form_error('class_room');
			$message .= form_error('ref_student_id');
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

		$frm->set_rules('thai_year', 'ปีการศึกษา', 'trim|required|is_natural');
		$frm->set_rules('term', 'เทอม', 'trim|required|is_natural');
		$frm->set_rules('class_room', 'รหัสอ้างอิง ตารางห้อง', 'trim|required|is_natural');
		$frm->set_rules('ref_student_id', 'รหัสอ้างอิง ตารางนักเรียน', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('thai_year');
			$message .= form_error('term');
			$message .= form_error('class_room');
			$message .= form_error('ref_student_id');
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

			$id = $this->Academic_year->create($post);
			$encrypt_id = encrypt($id);
			$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';

			$json = json_encode(array(
						'is_successful' => TRUE,
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
						array('title' => 'Academic_year', 'url' => site_url('demo/academic_year')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Academic_year->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);
				$this->setPreviewFormat($results);
				$this->data['tb_year_option_list'] = $this->Academic_year->returnOptionList("tb_year", "year_num", "year_num");
				$this->data['tb_room_option_list'] = $this->Academic_year->returnOptionList("tb_room", "id", "room_name");
				$this->data['tb_student_option_list'] = $this->Academic_year->returnOptionList("tb_student", "id", "CONCAT_WS(' - ', prefix_name,firstname,lastname)");
				$this->render_view('demo/academic_year/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$id = checkEncryptData($data['encrypt_id']);
		if($id==''){
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

			$result = $this->Academic_year->update($post);
			if($result == false){
				$message = $this->Academic_year->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Academic_year->error_message;
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
			$result = $this->Academic_year->delete($post);
			if($result == false){
				$message = $this->Academic_year->error_message;
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
			$pk1 = $data[$i]['id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = encrypt($pk1);
			}
			$data[$i]['encrypt_id'] = $pk1;
		}
		return $data;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;


		$thaiYearYearNum = $this->Academic_year->getValueOf('tb_year', 'year_num', "year_num = '$data[thai_year]'");
		$this->data['thaiYearYearNum'] = $thaiYearYearNum;


		$classRoomRoomName = $this->Academic_year->getValueOf('tb_room', 'room_name', "id = '$data[class_room]'");
		$this->data['classRoomRoomName'] = $classRoomRoomName;


		$titleRow = $this->Academic_year->getRowOf('tb_student', 'prefix_name, firstname, lastname', "id = '$data[ref_student_id]'", $this->db);
		$refStudentIdPrefixName = $titleRow['prefix_name'];
		$refStudentIdFirstname = $titleRow['firstname'];
		$refStudentIdLastname = $titleRow['lastname'];
		$this->data['refStudentIdPrefixName'] = $refStudentIdPrefixName;
		$this->data['refStudentIdFirstname'] = $refStudentIdFirstname;
		$this->data['refStudentIdLastname'] = $refStudentIdLastname;

		$this->data['record_id'] = $data['id'];
		$this->data['record_thai_year'] = $data['thai_year'];
		$this->data['record_term'] = $data['term'];
		$this->data['record_class_room'] = $data['class_room'];
		$this->data['record_ref_student_id'] = $data['ref_student_id'];


	}
}
/*---------------------------- END Controller Class --------------------------------*/
