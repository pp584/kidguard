<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Time_distance.php ]
 */
class Time_distance extends MEMBER_Controller
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
		$this->load->model('services/Time_distance_model', 'Time_distance');
		$this->Time_distance->session_name = 'services_time_distance';

		$this->data['page_url'] = site_url('services/time_distance');
		
		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/time_distance.js?ft='. filemtime('assets/js_modules/services/time_distance.js');
		$this->another_js .= '<script src="'. base_url($js_url) .'"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Time_distance', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Time_distance->session_name . '_search_field');
		$this->session->unset_userdata($this->Time_distance->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Time_distance', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Time_distance->session_name . '_search_field' => $search_field, $this->Time_distance->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Time_distance->session_name . '_search_field');
			$value = $this->session->userdata($this->Time_distance->session_name . '_value');
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
			$this->Time_distance->order_field = $field;
			$this->Time_distance->order_sort = $sort;
		}
		$results = $this->Time_distance->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/time_distance');
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

		$this->render_view('services/time_distance/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Time_distance', 'url' => site_url('services/time_distance')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Time_distance->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/time_distance/preview_view');
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
						array('title' => 'ข้อมูลเวลาและระยะทาง', 'url' => site_url('services/time_distance')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('services/time_distance/add_view');
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

		$frm->set_rules('incident_time', 'เวลาที่มีผู้พบเห็นเหตุการณ์ ', 'trim|required');
		$frm->set_rules('incident_time_recrive', 'เวลาที่ได้รับแจ้งเหตุ ', 'trim|required');
		$frm->set_rules('time_order', 'เวลาที่สั่งการ ', 'trim|required');
		$frm->set_rules('base_time_start', 'เวลาที่ออกจากฐาน', 'trim|required');
		$frm->set_rules('base_time_stop', 'เวลาที่ไปถึงที่เกิดเหตุ ', 'trim|required');
		$frm->set_rules('time_of_leaving', 'เวลาที่ออกจากที่เกิดเหตุ', 'trim|required');
		$frm->set_rules('time_to_hospital', 'เวลาที่ไปถึงโรงพยาบาล', 'trim|required');
		$frm->set_rules('base_time_finish', 'เวลาที่ถึงฐาน ', 'trim|required|is_natural');
		$frm->set_rules('distance_base_scene', 'ระยะทางจากฐานไปถึงที่เกิดเหตุ', 'trim|required');
		$frm->set_rules('distance_to_hospital', 'ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล ', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('incident_time');
			$message .= form_error('incident_time_recrive');
			$message .= form_error('time_order');
			$message .= form_error('base_time_start');
			$message .= form_error('base_time_stop');
			$message .= form_error('time_of_leaving');
			$message .= form_error('time_to_hospital');
			$message .= form_error('base_time_finish');
			$message .= form_error('distance_base_scene');
			$message .= form_error('distance_to_hospital');
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

		$frm->set_rules('incident_time', 'เวลาที่มีผู้พบเห็นเหตุการณ์ ', 'trim|required');
		$frm->set_rules('incident_time_recrive', 'เวลาที่ได้รับแจ้งเหตุ ', 'trim|required');
		$frm->set_rules('time_order', 'เวลาที่สั่งการ ', 'trim|required');
		$frm->set_rules('base_time_start', 'เวลาที่ออกจากฐาน', 'trim|required');
		$frm->set_rules('base_time_stop', 'เวลาที่ไปถึงที่เกิดเหตุ ', 'trim|required');
		$frm->set_rules('time_of_leaving', 'เวลาที่ออกจากที่เกิดเหตุ', 'trim|required');
		$frm->set_rules('time_to_hospital', 'เวลาที่ไปถึงโรงพยาบาล', 'trim|required');
		$frm->set_rules('base_time_finish', 'เวลาที่ถึงฐาน ', 'trim|required|is_natural');
		$frm->set_rules('distance_base_scene', 'ระยะทางจากฐานไปถึงที่เกิดเหตุ', 'trim|required');
		$frm->set_rules('distance_to_hospital', 'ระยะทางจากที่เกิดเหตุไปถึงโรงพยาบาล ', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('incident_time');
			$message .= form_error('incident_time_recrive');
			$message .= form_error('time_order');
			$message .= form_error('base_time_start');
			$message .= form_error('base_time_stop');
			$message .= form_error('time_of_leaving');
			$message .= form_error('time_to_hospital');
			$message .= form_error('base_time_finish');
			$message .= form_error('distance_base_scene');
			$message .= form_error('distance_to_hospital');
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
			$id = $this->Time_distance->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Time_distance->error_message;
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

	
	public function edit_data()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'ข้อมูลเวลาและระยะทาง', 'url' => site_url('services/time_distance')),
						array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		//$encrypt_id = urldecode($encrypt_id);
		//$id = ci_decrypt($encrypt_id);
		$id = $this->session->userdata('service_information_id');
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Time_distance->load_edit_data($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/time_distance/edit_view');
			}
		}
	}

	/**
	 * Load data to form
	 * @param String encrypt id
	 */
	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Time_distance', 'url' => site_url('services/time_distance')),
						array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Time_distance->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/time_distance/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$itme_distance_id = ci_decrypt($data['encrypt_itme_distance_id']);
		if($itme_distance_id==''){
			$error .= '- รหัส itme_distance_id';
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

				$post['service_information_id'] = $this->session->userdata('service_information_id');

			$result = $this->Time_distance->update($post);
			if($result == false){
				$message = $this->Time_distance->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Time_distance->error_message;
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
			$result = $this->Time_distance->delete($post);
			if($result == false){
				$message = $this->Time_distance->error_message;
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
			$pk1 = $data[$i]['itme_distance_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_itme_distance_id'] = $pk1;
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
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['itme_distance_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_itme_distance_id'] = $pk1;
		
		$this->data['record_hospital_to_base'] = $data['hospital_to_base'];
		$this->data['record_itme_distance_id'] = $data['itme_distance_id'];
		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['record_incident_time'] = $data['incident_time'];
		$this->data['record_incident_time_recrive'] = $data['incident_time_recrive'];
		$this->data['record_time_order'] = $data['time_order'];
		$this->data['record_base_time_start'] = $data['base_time_start'];
		$this->data['record_base_time_stop'] = $data['base_time_stop'];
		$this->data['record_time_of_leaving'] = $data['time_of_leaving'];
		$this->data['record_time_to_hospital'] = $data['time_to_hospital'];
		$this->data['record_base_time_finish'] = $data['base_time_finish'];
		$this->data['record_distance_base_scene'] = $data['distance_base_scene'];
		$this->data['record_distance_to_hospital'] = $data['distance_to_hospital'];


	}
}
/*---------------------------- END Controller Class --------------------------------*/
