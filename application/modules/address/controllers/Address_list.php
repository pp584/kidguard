<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Address_list.php ]
 */
class Address_list extends CRUD_Controller
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
		$this->load->model('Address/Address_list_model', 'Address_list');

		$this->data['page_url'] = site_url('address/address_list');

		$js_url = 'assets/js_modules/Address/address_list.js';
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
		$this->session->unset_userdata($this->Address_list->session_name . '_search_field');
		$this->session->unset_userdata($this->Address_list->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Address_list', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field');
			$value = $this->input->post('txtSearch');
			$arr = array($this->Address_list->session_name . '_search_field' => $search_field, $this->Address_list->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Address_list->session_name . '_search_field');
			$value = $this->session->userdata($this->Address_list->session_name . '_value');
		}

		$start_row = $this->uri->segment(4 ,'0');
		if(!is_numeric($start_row)){
			$start_row = 0;
		}
		$per_page = $this->per_page;
		$results = $this->Address_list->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('address/address_list');
		$pagination = $this->create_pagination($page_url.'/index', $search_row);
		$end_row = $start_row + $per_page;
		if($search_row < $per_page){
			$end_row = $search_row;
		}

		$this->data['data_list']	= $list_data;
		$this->data['search_field']	= $search_field;
		$this->data['txt_search']	= $value;
		$this->data['current_page_offset'] = $start_row;
		$this->data['start_row']	= $start_row + 1;
		$this->data['end_row']	= $end_row;
		$this->data['total_row']	= $total_row;
		$this->data['search_row']	= $search_row;
		$this->data['page_url']	= $page_url;
		$this->data['pagination_link']	= $pagination;
		$this->data['csrf_protection_field']	= insert_csrf_field(true);

		$this->render_view('address/address_list/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Address_list', 'url' => site_url('address/address_list')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Address_list->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('address/address_list/preview_view');
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
						array('title' => 'Address_list', 'url' => site_url('address/address_list')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['tb_student_option_list'] = $this->Address_list->returnOptionList("tb_student", "id", "CONCAT_WS(' - ', firstname,lastname)");
		$this->data['tb_addr_geography_option_list'] = $this->Address_list->returnOptionList("tb_addr_geography", "GEO_ID", "GEO_NAME");
		$this->render_view('address/address_list/add_view'); 
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

		$frm->set_rules('ref_student_id', 'ไอดีอ้างอิง นักเรียน', 'trim|required|is_natural');
		$frm->set_rules('ref_geo_id', 'ไอดีภาค', 'trim|required|is_natural');
		$frm->set_rules('ref_province_id', 'ไอดีจังหวัด', 'trim|required|is_natural');
		$frm->set_rules('ref_amphur_id', 'ไอดีอำเภอ', 'trim|required|is_natural');
		$frm->set_rules('ref_district_id', 'ไอดีตำบล', 'trim|required|is_natural');
		$frm->set_rules('zip_code', 'รหัสไปรษณีย์', 'trim|required');
		$frm->set_rules('address', 'เลขที่,หมู่ที่,หมู่บ้าน,อาคาร,ถนน,ซอย,อื่นๆ', 'trim|required');
		$frm->set_rules('remark', 'คำอธิบายเพิ่มเติม', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('ref_student_id');
			$message .= form_error('ref_geo_id');
			$message .= form_error('ref_province_id');
			$message .= form_error('ref_amphur_id');
			$message .= form_error('ref_district_id');
			$message .= form_error('zip_code');
			$message .= form_error('address');
			$message .= form_error('remark');
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

		$frm->set_rules('ref_student_id', 'ไอดีอ้างอิง นักเรียน', 'trim|required|is_natural');
		$frm->set_rules('ref_geo_id', 'ไอดีภาค', 'trim|required|is_natural');
		$frm->set_rules('ref_province_id', 'ไอดีจังหวัด', 'trim|required|is_natural');
		$frm->set_rules('ref_amphur_id', 'ไอดีอำเภอ', 'trim|required|is_natural');
		$frm->set_rules('ref_district_id', 'ไอดีตำบล', 'trim|required|is_natural');
		$frm->set_rules('zip_code', 'รหัสไปรษณีย์', 'trim|required');
		$frm->set_rules('address', 'เลขที่,หมู่ที่,หมู่บ้าน,อาคาร,ถนน,ซอย,อื่นๆ', 'trim|required');
		$frm->set_rules('remark', 'คำอธิบายเพิ่มเติม', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('ref_student_id');
			$message .= form_error('ref_geo_id');
			$message .= form_error('ref_province_id');
			$message .= form_error('ref_amphur_id');
			$message .= form_error('ref_district_id');
			$message .= form_error('zip_code');
			$message .= form_error('address');
			$message .= form_error('remark');
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

			$id = $this->Address_list->create($post);
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
						array('title' => 'Address_list', 'url' => site_url('address/address_list')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Address_list->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);
				$this->setPreviewFormat($results);
				$this->data['tb_student_option_list'] = $this->Address_list->returnOptionList("tb_student", "id", "CONCAT_WS(' - ', firstname,lastname)");
				$this->data['tb_addr_geography_option_list'] = $this->Address_list->returnOptionList("tb_addr_geography", "GEO_ID", "GEO_NAME");
				$this->render_view('address/address_list/edit_view');
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

			$result = $this->Address_list->update($post);
			if($result == false){
				$message = $this->Address_list->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Address_list->error_message;
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
			$result = $this->Address_list->delete($post);
			if($result == false){
				$message = $this->Address_list->error_message;
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
			$data[$i]['preview_ref_province_id'] = $this->setRefProvinceIdSubject($data[$i]['ref_province_id']);
			$data[$i]['preview_ref_amphur_id'] = $this->setRefAmphurIdSubject($data[$i]['ref_amphur_id']);
			$data[$i]['preview_ref_district_id'] = $this->setRefDistrictIdSubject($data[$i]['ref_district_id']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setRefProvinceIdSubject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'Choice 1';
				break;
			case 2:
				$subject = 'Choice 2';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRefAmphurIdSubject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'Choice 1';
				break;
			case 2:
				$subject = 'Choice 2';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRefDistrictIdSubject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'Choice 1';
				break;
			case 2:
				$subject = 'Choice 2';
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

		if($pk1 != ''){
			$pk1 = encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;


		$titleRow = $this->Address_list->getRowOf('tb_student', 'firstname, lastname', "id = '$data[ref_student_id]'", $this->db);
		$refStudentIdFirstname = $titleRow['firstname'];
		$refStudentIdLastname = $titleRow['lastname'];
		$this->data['refStudentIdFirstname'] = $refStudentIdFirstname;
		$this->data['refStudentIdLastname'] = $refStudentIdLastname;


		$refGeoIdGEONAME = $this->Address_list->getValueOf('tb_addr_geography', 'GEO_NAME', "GEO_ID = '$data[ref_geo_id]'");
		$this->data['refGeoIdGEONAME'] = $refGeoIdGEONAME;

		$this->data['record_id'] = $data['id'];
		$this->data['record_ref_student_id'] = $data['ref_student_id'];
		$this->data['record_ref_geo_id'] = $data['ref_geo_id'];
		$this->data['preview_ref_province_id'] = $this->setRefProvinceIdSubject($data['ref_province_id']);
		$this->data['record_ref_province_id'] = $data['ref_province_id'];
		$this->data['preview_ref_amphur_id'] = $this->setRefAmphurIdSubject($data['ref_amphur_id']);
		$this->data['record_ref_amphur_id'] = $data['ref_amphur_id'];
		$this->data['preview_ref_district_id'] = $this->setRefDistrictIdSubject($data['ref_district_id']);
		$this->data['record_ref_district_id'] = $data['ref_district_id'];
		$this->data['record_zip_code'] = $data['zip_code'];
		$this->data['record_address'] = $data['address'];
		$this->data['record_remark'] = $data['remark'];


	}
	
	public function get_province_list()
	{
		$list = array();
		
		$geo_id = $this->input->post('geo_id', TRUE);
		if($geo_id != ''){
			$list = $this->Address_list->province_list($geo_id);
			//echo '<pre>', print_r($list, true),'</pre>';
		}
		$data['province_list'] = $list;
		
		$this->parser->parse_repeat('address/address_list/province_option_list_view', $data);
	}
	
	public function get_amphur_list()
	{
		$list = array();
		
		$province_id = $this->input->post('province_id', TRUE);
		if($province_id != ''){
			$list = $this->Address_list->amphur_list($province_id);
			//echo '<pre>', print_r($list, true),'</pre>';
		}
		$data['amphur_list'] = $list;
		
		$this->parser->parse_repeat('address/address_list/amphur_option_list_view', $data);
	}
}
/*---------------------------- END Controller Class --------------------------------*/
