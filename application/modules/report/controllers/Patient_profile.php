<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Patient_profile.php ]
 */
class Patient_profile extends MEMBER_Controller
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
		$this->load->model('reports/Patient_profile_model', 'Patient_profile');
		$this->Patient_profile->session_name = 'reports_patient_profile';

		$this->data['page_url'] = site_url('reports/patient_profile');
		
		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/reports/patient_profile.js?ft='. filemtime('assets/js_modules/reports/patient_profile.js');
		$this->another_js .= '<script src="'. base_url($js_url) .'"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Patient_profile', 'class' => 'active', 'url' => '#'),
		);
		if($this->session->userdata('login_validated') == false){
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
		if($this->session->userdata('login_validated') == false){
			$this->data['page_content'] = $this->parser->parse_repeat('member_permission.php', $this->data, TRUE);
			$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$this->session->set_userdata('after_login_redirect', $current_url);
		}else{
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
		$this->session->unset_userdata($this->Patient_profile->session_name . '_search_field');
		$this->session->unset_userdata($this->Patient_profile->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Patient_profile', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Patient_profile->session_name . '_search_field' => $search_field, $this->Patient_profile->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Patient_profile->session_name . '_search_field');
			$value = $this->session->userdata($this->Patient_profile->session_name . '_value');
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
			$this->Patient_profile->order_field = $field;
			$this->Patient_profile->order_sort = $sort;
		}
		$results = $this->Patient_profile->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('reports/patient_profile');
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

		$this->render_view('reports/patient_profile/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Patient_profile', 'url' => site_url('reports/patient_profile')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Patient_profile->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('reports/patient_profile/preview_view');
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
						array('title' => 'Patient_profile', 'url' => site_url('reports/patient_profile')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['service_information_service_information_id_option_list'] = $this->Patient_profile->returnOptionList("service_information", "service_information_id", "CONCAT_WS(' - ', service_unit_name,operating_command)" );
		$this->render_view('reports/patient_profile/add_view');
	}

	// ------------------------------------------------------------------------


	public function multiple_select($value, $name)
	{
		$arr_choice = $this->input->post($name.'[]');
		if(!empty($arr_choice)){
			$arr_choice = array_filter($arr_choice, function($v){
				return $v !== '';
			});
		}
		if(empty($arr_choice)):
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

		$frm->set_rules('service_information_id', 'service_information_id', 'trim|required|is_natural');
		$frm->set_rules('ohac_id', 'รหัส OHAC-ID', 'trim|required');
		$frm->set_rules('patient_name', 'ชื่อผู้ป่วย ', 'trim|required');
		$frm->set_rules('age', 'อายุ', 'trim|required|is_natural');
		$frm->set_rules('sex', 'เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('right_medical', 'สิทธิการรักษา[1=ไม่มีสิทธิรักษาพยาบาล,2=หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง,3=สิทธิกรมบัญชีกลาง,4=ประกันสังคม ,5=อื่น ๆ]', 'trim|required|is_natural');
		$frm->set_rules('right_medical_remark', 'อื่นๆ ระบุ ', 'trim|required');
		$frm->set_rules('congenital_disease', 'โรคประจำตัว[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('congenital_disease_patient', 'โรคประจำตัว', 'trim|callback_multiple_select[congenital_disease_patient]');
		$frm->set_rules('congenital_disease_patient_remark', 'อื่นๆ ระบุ ', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('service_information_id');
			$message .= form_error('ohac_id');
			$message .= form_error('patient_name');
			$message .= form_error('age');
			$message .= form_error('sex');
			$message .= form_error('right_medical');
			$message .= form_error('right_medical_remark');
			$message .= form_error('congenital_disease');
			$message .= form_error('congenital_disease_patient');
			$message .= form_error('congenital_disease_patient_remark');
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

		$frm->set_rules('service_information_id', 'service_information_id', 'trim|required|is_natural');
		$frm->set_rules('ohac_id', 'รหัส OHAC-ID', 'trim|required');
		$frm->set_rules('patient_name', 'ชื่อผู้ป่วย ', 'trim|required');
		$frm->set_rules('age', 'อายุ', 'trim|required|is_natural');
		$frm->set_rules('sex', 'เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('right_medical', 'สิทธิการรักษา[1=ไม่มีสิทธิรักษาพยาบาล,2=หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง,3=สิทธิกรมบัญชีกลาง,4=ประกันสังคม ,5=อื่น ๆ]', 'trim|required|is_natural');
		$frm->set_rules('right_medical_remark', 'อื่นๆ ระบุ ', 'trim|required');
		$frm->set_rules('congenital_disease', 'โรคประจำตัว[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('congenital_disease_patient', 'โรคประจำตัว', 'trim|callback_multiple_select[congenital_disease_patient]');
		$frm->set_rules('congenital_disease_patient_remark', 'อื่นๆ ระบุ ', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('service_information_id');
			$message .= form_error('ohac_id');
			$message .= form_error('patient_name');
			$message .= form_error('age');
			$message .= form_error('sex');
			$message .= form_error('right_medical');
			$message .= form_error('right_medical_remark');
			$message .= form_error('congenital_disease');
			$message .= form_error('congenital_disease_patient');
			$message .= form_error('congenital_disease_patient_remark');
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
				$post['congenital_disease_patient'] = implode(',', $post['congenital_disease_patient']);
			$id = $this->Patient_profile->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Patient_profile->error_message;
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
						array('title' => 'Patient_profile', 'url' => site_url('reports/patient_profile')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Patient_profile->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['service_information_service_information_id_option_list'] = $this->Patient_profile->returnOptionList("service_information", "service_information_id", "CONCAT_WS(' - ', service_unit_name,operating_command)" );
				$this->render_view('reports/patient_profile/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$patient_profile_id = ci_decrypt($data['encrypt_patient_profile_id']);
		if($patient_profile_id==''){
			$error .= '- รหัส patient_profile_id';
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

				$post['congenital_disease_patient'] = implode(',', $post['congenital_disease_patient']);
			$result = $this->Patient_profile->update($post);
			if($result == false){
				$message = $this->Patient_profile->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Patient_profile->error_message;
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
			$result = $this->Patient_profile->delete($post);
			if($result == false){
				$message = $this->Patient_profile->error_message;
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
			$pk1 = $data[$i]['patient_profile_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_patient_profile_id'] = $pk1;
			$data[$i]['preview_sex'] = $this->setSexSubject($data[$i]['sex']);
			$data[$i]['preview_right_medical'] = $this->setRightMedicalSubject($data[$i]['right_medical']);
			$data[$i]['preview_congenital_disease'] = $this->setCongenitalDiseaseSubject($data[$i]['congenital_disease']);
			$data[$i]['preview_congenital_disease_patient'] = $this->setCongenitalDiseasePatientSubject($data[$i]['congenital_disease_patient']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setSexSubject($value)
	{
		$subject = '';
		switch($value){
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
	private function setRightMedicalSubject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่มีสิทธิรักษาพยาบาล';
				break;
			case 2:
				$subject = 'หลักประกันสุขภาพถ้วนหน้าหรือบัตรทอง';
				break;
			case 3:
				$subject = 'สิทธิกรมบัญชีกลาง';
				break;
			case 4:
				$subject = 'ประกันสังคม';
				break;
			case 5:
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setCongenitalDiseaseSubject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'มี';
				break;
			case 2:
				$subject = 'ไม่มี';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setCongenitalDiseasePatientSubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach($arr as $value){
			switch($value){
				case '1':
					$subject .= $comma .  'Diabetes (เบาหวาน)';
					break;
				case '2':
					$subject .= $comma .  'Hypertension (ความดันโลหิตสูง)';
					break;
				case '3':
					$subject .= $comma .  'Heart disease/Coronary artery disease (หัวใจ/หลอดเลือดหัวใจ)';
					break;
				case '4':
					$subject .= $comma .  'Respiratory disease (ระบบทางเดินหายใจ)';
					break;
				case '5':
					$subject .= $comma .  'Stroke/ CVA (หลอดเลือดในสมอง)';
					break;
				case '6':
					$subject .= $comma .  'Renal disease (ไต)';
					break;
				case '7':
					$subject .= $comma .  'Cancer (มะเร็ง)';
					break;
				case '8':
					$subject .= $comma .  'Dyslipidemia (ไขมันในเลือดสูง)';
					break;
				case '9':
					$subject .= $comma .  'อื่นๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['patient_profile_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_patient_profile_id'] = $pk1;


		$titleRow = $this->table('service_information')->get_array('service_unit_name, operating_command')->where("service_information_id = '$data[service_information_id]'");
		if(!empty($titleRow)){
			$serviceInformationIdServiceUnitName = $titleRow['service_unit_name'];
			$serviceInformationIdOperatingCommand = $titleRow['operating_command'];
		}else{
			$serviceInformationIdServiceUnitName = '';
			$serviceInformationIdOperatingCommand = '';
		}
		$this->data['serviceInformationIdServiceUnitName'] = $serviceInformationIdServiceUnitName;
		$this->data['serviceInformationIdOperatingCommand'] = $serviceInformationIdOperatingCommand;

		$this->data['record_patient_profile_id'] = $data['patient_profile_id'];
		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['record_ohac_id'] = $data['ohac_id'];
		$this->data['record_patient_name'] = $data['patient_name'];
		$this->data['record_age'] = $data['age'];
		$this->data['preview_sex'] = $this->setSexSubject($data['sex']);
		$this->data['record_sex'] = $data['sex'];
		$this->data['preview_right_medical'] = $this->setRightMedicalSubject($data['right_medical']);
		$this->data['record_right_medical'] = $data['right_medical'];
		$this->data['record_right_medical_remark'] = $data['right_medical_remark'];
		$this->data['preview_congenital_disease'] = $this->setCongenitalDiseaseSubject($data['congenital_disease']);
		$this->data['record_congenital_disease'] = $data['congenital_disease'];
		$this->data['preview_congenital_disease_patient'] = $this->setCongenitalDiseasePatientSubject($data['congenital_disease_patient']);
		$this->data['record_congenital_disease_patient'] = $data['congenital_disease_patient'];
		$this->data['record_congenital_disease_patient_remark'] = $data['congenital_disease_patient_remark'];


	}
}
/*---------------------------- END Controller Class --------------------------------*/
