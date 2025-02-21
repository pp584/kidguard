<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Service_time_distance.php ]
 */
class Service_time_distance extends MEMBER_Controller
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
		$this->load->model('services/Service_time_distance_model', 'Service_time_distance');
		$this->Service_time_distance->session_name = 'services_service_time_distance';

		$this->data['page_url'] = site_url('services/service_time_distance');
		
		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/service_time_distance.js?ft='. filemtime('assets/js_modules/services/service_time_distance.js');
		$this->another_js .= '<script src="'. base_url($js_url) .'"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Service_time_distance', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Service_time_distance->session_name . '_search_field');
		$this->session->unset_userdata($this->Service_time_distance->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Service_time_distance', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Service_time_distance->session_name . '_search_field' => $search_field, $this->Service_time_distance->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Service_time_distance->session_name . '_search_field');
			$value = $this->session->userdata($this->Service_time_distance->session_name . '_value');
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
			$this->Service_time_distance->order_field = $field;
			$this->Service_time_distance->order_sort = $sort;
		}
		$results = $this->Service_time_distance->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/service_time_distance');
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

		$this->render_view('services/service_time_distance/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Service_time_distance', 'url' => site_url('services/service_time_distance')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Service_time_distance->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);

				$detail_list = $this->Service_time_distance->loadDetailList($results['service_information_id']);
				$this->data['detail_list'] = $this->setDetailDataListFormat($detail_list);
				$this->render_view('services/service_time_distance/preview_view');
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
		$create_by_userid = $this->session->userdata('user_id');
		$titleRow = $this->table('tb_members')->get_array('firstname, lastname')->where("userid = '$create_by_userid'");
		if(!empty($titleRow)){
		$this->data['source_create_by_userid_title'] = $titleRow['firstname']. ' ' .$titleRow['lastname'];
		}else{
		$this->data['source_create_by_userid_title'] = '';
		}
		$this->data['source_create_by_userid'] = $create_by_userid;

	}

	/**
	 * Add form
	 */
	public function add()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Service_time_distance', 'url' => site_url('services/service_time_distance')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['services_service_unit_name_option_list'] = $this->Service_time_distance->returnOptionList("services", "services_name", "services_name" );
		$this->data['tb_members_create_by_userid_option_list'] = $this->Service_time_distance->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)" );
		$this->setFormAddData();
		$this->render_view('services/service_time_distance/add_view');
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

		$frm->set_rules('service_unit_name', 'หน่วยบริการ   ', 'trim|required');
		$frm->set_rules('operating_command', 'ปฏิบัติการที่', 'trim|required');
		$frm->set_rules('zone_area', 'พื้นที่โซน', 'trim|required');
		$frm->set_rules('police_station', 'สน', 'trim|required');
		$frm->set_rules('operating_number', 'เลขที่ปฏิบัติการ', 'trim|required');
		$frm->set_rules('regis_date', 'วันที่', 'trim|required');
		$frm->set_rules('performance', 'ผลการปฏิบัติ[1=พบเหตุ,2=ไม่พบเหตุ,3=ปฏิบัติการ,4=ในพื้นที่,5=นอกพื้นที่]', 'trim|required|is_natural');
		$frm->set_rules('locale', 'สถานที่เกิดเหตุ', 'trim|required');
		$frm->set_rules('event', 'เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('service_unit_name');
			$message .= form_error('operating_command');
			$message .= form_error('zone_area');
			$message .= form_error('police_station');
			$message .= form_error('operating_number');
			$message .= form_error('regis_date');
			$message .= form_error('performance');
			$message .= form_error('locale');
			$message .= form_error('event');
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

		$frm->set_rules('service_unit_name', 'หน่วยบริการ   ', 'trim|required');
		$frm->set_rules('operating_command', 'ปฏิบัติการที่', 'trim|required');
		$frm->set_rules('zone_area', 'พื้นที่โซน', 'trim|required');
		$frm->set_rules('police_station', 'สน', 'trim|required');
		$frm->set_rules('operating_number', 'เลขที่ปฏิบัติการ', 'trim|required');
		$frm->set_rules('regis_date', 'วันที่', 'trim|required');
		$frm->set_rules('performance', 'ผลการปฏิบัติ[1=พบเหตุ,2=ไม่พบเหตุ,3=ปฏิบัติการ,4=ในพื้นที่,5=นอกพื้นที่]', 'trim|required|is_natural');
		$frm->set_rules('locale', 'สถานที่เกิดเหตุ', 'trim|required');
		$frm->set_rules('event', 'เหตุการณ์ (รหัสความรุนแรง ณ จุดเกิดเหตุ: RC)', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('service_unit_name');
			$message .= form_error('operating_command');
			$message .= form_error('zone_area');
			$message .= form_error('police_station');
			$message .= form_error('operating_number');
			$message .= form_error('regis_date');
			$message .= form_error('performance');
			$message .= form_error('locale');
			$message .= form_error('event');
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

			$post['create_by_userid'] = $this->session->userdata('user_id');

			$encrypt_id = '';
			$id = $this->Service_time_distance->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Service_time_distance->error_message;
			}

			$json = json_encode(array(
						'is_successful' => $success,
						'encrypt_id' =>  $encrypt_id,
						'service_information_id_encrypt_id' =>  $encrypt_id,
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
						array('title' => 'Service_time_distance', 'url' => site_url('services/service_time_distance')),
						array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Service_time_distance->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$create_by_userid = $this->session->userdata('user_id');
				$titleRow = $this->table('tb_members')->get_array('firstname, lastname')->where("userid = '$create_by_userid'");
				$this->data['source_create_by_userid'] = $titleRow['firstname']. ' ' .$titleRow['lastname'];

				$this->setPreviewFormat($results);

				$this->data['record_regis_date'] = setThaiDate($results['regis_date']);
				$this->data['record_create_date'] = setThaiDate($results['create_date']);

				$this->data['services_service_unit_name_option_list'] = $this->Service_time_distance->returnOptionList("services", "services_name", "services_name" );
				$this->data['tb_members_create_by_userid_option_list'] = $this->Service_time_distance->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)" );

				$this->data['detail_record_service_information_id'] = ci_encrypt($results['service_information_id']);

				$detail_list = $this->Service_time_distance->loadDetailList($results['service_information_id']);
				$this->data['detail_list'] = $this->setDetailDataListFormat($detail_list);
				$this->render_view('services/service_time_distance/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$service_information_id = ci_decrypt($data['encrypt_service_information_id']);
		if($service_information_id==''){
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

				$post['create_by_userid'] = $this->session->userdata('user_id');

			$result = $this->Service_time_distance->update($post);
			if($result == false){
				$message = $this->Service_time_distance->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Service_time_distance->error_message;
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
			$result = $this->Service_time_distance->delete($post);
			if($result == false){
				$message = $this->Service_time_distance->error_message;
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
	 * Detail List Default Validation
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidateDetail()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('service_information_id', 'service_information_id', 'trim|required');
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
			$message .= form_error('service_information_id');
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
	public function formValidateDetailUpdate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('service_information_id', 'service_information_id', 'trim|required');
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
			$message .= form_error('service_information_id');
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
	 * Create new detail list record
	 */
	public function save_detail_list()
	{

		$message = '';
		$message .= $this->formValidateDetail();

		$post = $this->input->post(NULL, TRUE);
		$ref_field = ci_decrypt($post['service_information_id']);
		if ($ref_field == '') {
			$message .= "- รหัสเชื่อมโยงตารางที่ใช้สำหรับเพิ่มรายการไม่ถูกต้อง";
		} else {
			$post['service_information_id'] = $ref_field;
		}

		if ($message != '') {
			$json = json_encode(array(
						'is_successful' => FALSE,
						'message' => $message
			));
			echo $json;
		} else {

			$id = $this->Service_time_distance->save_detail_list($post);
			$encrypt_id = ci_encrypt($id);
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
	 * Load Detail List data to form
	 * @param String encrypt id
	 */
	public function edit_list($encrypt_id = '')
	{
		$items = array();
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$message = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$success = false;
		} else {
			$results = $this->Service_time_distance->load_detail_record($id);
			if (empty($results)) {
				$message = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$success = false;
			} else {
				$success = true;
				$message = '';
				$items = $this->setPreviewFormatDetail($results);
				$items['csrf_field'] = insert_csrf_field(true);
			}
		}
		$json = json_encode(array(
						'is_successful' => $success,
						'message' => $message,
						'data' => $items
		));

		echo $json;

	}

	public function checkDetailRecordKey($data)
	{
		$error = '';
		$itme_distance_id = ci_decrypt($data['encrypt_itme_distance_id']);
		if($itme_distance_id==''){
			$error .= '- รหัส itme_distance_id';
		}
		return $error;
	}

	// ------------------------------------------------------------------------

	/**
	 * Update Detail List Record
	 */
	public function update_list()
	{
		$message = '';
		$message .= $this->formValidateDetailUpdate();
		$post = $this->input->post(NULL, TRUE);
		$ref_field = ci_decrypt($post['service_information_id']);
		if ($ref_field == '') {
			$message .= "- รหัสเชื่อมโยงตารางที่ใช้สำหรับเพิ่มรายการไม่ถูกต้อง";
		} else {
			$post['service_information_id'] = $ref_field;
		}

		$error_pk_id = $this->checkDetailRecordKey($post);
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

			$result = $this->Service_time_distance->save_detail_list($post);
			if($result == false){
				$message = $this->Service_time_distance->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Service_time_distance->error_message;
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
	 * Delete Detail List Record
	 */
	public function del_list()
	{
		$delete_remark = $this->input->post('delete_remark', TRUE);
			$message = '';
		if ($delete_remark == '') {
			$message .= 'ระบุเหตุผล';
		}
		
		$post = $this->input->post(NULL, TRUE);
		$error_pk_id = $this->checkDetailRecordKey($post);
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
			$result = $this->Service_time_distance->delete_list($post);
			if($result == false){
				$message = $this->Service_time_distance->error_message;
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
	 * Load Detail List
	 */
	public function load_detail($encrypt_id)
	{

		$tbody = '';
		$ref_id = ci_decrypt($encrypt_id);
		$data = $this->Service_time_distance->loadDetailList($ref_id);
		if(!empty($data)){
			$data['detail_list'] = $this->setDetailDataListFormat($data);
			$template = '{detail_list}
					<tr id="list_row_{record_number}">
						<td style="text-align:center;">[{record_number}]</td>
						<td>{detail_itme_distance_id}</td>
						<td>{detail_service_information_id}</td>
						<td>{detail_incident_time}</td>
						<td>{detail_incident_time_recrive}</td>
						<td>{detail_time_order}</td>
						<td>{detail_base_time_start}</td>
						<td>{detail_base_time_stop}</td>
						<td>{detail_time_of_leaving}</td>
						<td>{detail_time_to_hospital}</td>
						<td>{detail_base_time_finish}</td>
						<td>{detail_distance_base_scene}</td>
						<td>{detail_distance_to_hospital}</td>
						<td>
							<div class="btn-group pull-right">
								<button 
									class="btn-edit-list-row my-tooltip btn btn-warning btn-sm" 
									data-toggle="tooltip" title="บันทึกข้อมูล" 
									data-url-encrypt-id="{detail_url_encrypt_id}" 
									 data-itme_distance_id = "{detail_encrypt_itme_distance_id}" data-row-number="{record_number}">
									<i class="fa fa-edit"></i> แก้ไข
								</button>
								<a href="javascript:void(0);" class="btn-delete-list-row my-tooltip btn btn-danger btn-sm"
									data-toggle="tooltip" title="ลบรายการนี้"
									 data-itme_distance_id = "{detail_encrypt_itme_distance_id}" data-row-number="{record_number}">
									<i class="fa fa-trash"></i> ลบ
								</a>
							</div>
					</tr>
					{/detail_list}';
			$tbody = $this->parser->parse_string($template, $data, TRUE);

			$tbody = htmlspecialchars($tbody);
		}

		$json = json_encode(array(
					'is_successful' => TRUE,
					'tbody' => $tbody
		));
		echo $json;

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
			$pk1 = $data[$i]['service_information_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_service_information_id'] = $pk1;
			$data[$i]['preview_performance'] = $this->setPerformanceSubject($data[$i]['performance']);
			$data[$i]['regis_date'] = setThaiDate($data[$i]['regis_date']);
			$data[$i]['create_date'] = setThaiDate($data[$i]['create_date']);
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
	private function setPerformanceSubject($value)
	{
		$subject = '';
		switch($value){
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
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['service_information_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_service_information_id'] = $pk1;


		$serviceUnitNameServicesName = $this->table('services')->get_value('services_name')->where("services_name = '$data[service_unit_name]'");
		$this->data['serviceUnitNameServicesName'] = $serviceUnitNameServicesName;


		$titleRow = $this->table('tb_members')->get_array('firstname, lastname')->where("userid = '$data[create_by_userid]'");
		if(!empty($titleRow)){
			$createByUseridFirstname = $titleRow['firstname'];
			$createByUseridLastname = $titleRow['lastname'];
		}else{
			$createByUseridFirstname = '';
			$createByUseridLastname = '';
		}
		$this->data['createByUseridFirstname'] = $createByUseridFirstname;
		$this->data['createByUseridLastname'] = $createByUseridLastname;

		$this->data['detail_service_information_id'] = urlencode(encrypt($data['service_information_id']));

		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['record_service_unit_name'] = $data['service_unit_name'];
		$this->data['record_operating_command'] = $data['operating_command'];
		$this->data['record_zone_area'] = $data['zone_area'];
		$this->data['record_police_station'] = $data['police_station'];
		$this->data['record_operating_number'] = $data['operating_number'];
		$this->data['record_regis_date'] = $data['regis_date'];
		$this->data['preview_performance'] = $this->setPerformanceSubject($data['performance']);
		$this->data['record_performance'] = $data['performance'];
		$this->data['record_locale'] = $data['locale'];
		$this->data['record_event'] = $data['event'];
		$this->data['record_create_by_userid'] = $data['create_by_userid'];
		$this->data['record_create_date'] = $data['create_date'];

		$this->data['record_regis_date'] = setThaiDate($data['regis_date']);
		$this->data['record_create_date'] = setThaiDate($data['create_date']);

	}

	/**
	 * SET array data of detail table list
	 */
	private function setDetailDataListFormat($lists_data, $start_row=0)
	{
		$data = $lists_data;
		$count = count($lists_data);
		for($i=0;$i<$count;$i++){
			$start_row++;
			$data[$i]['record_number'] = $start_row;
			$pk1 = $data[$i]['itme_distance_id'];
			$data[$i]['detail_url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['detail_encrypt_itme_distance_id'] = $pk1;

			$data[$i]['detail_itme_distance_id'] = $data[$i]['itme_distance_id'];
			$data[$i]['detail_service_information_id'] = $data[$i]['service_information_id'];
			$data[$i]['detail_incident_time'] = $data[$i]['incident_time'];
			$data[$i]['detail_incident_time_recrive'] = $data[$i]['incident_time_recrive'];
			$data[$i]['detail_time_order'] = $data[$i]['time_order'];
			$data[$i]['detail_base_time_start'] = $data[$i]['base_time_start'];
			$data[$i]['detail_base_time_stop'] = $data[$i]['base_time_stop'];
			$data[$i]['detail_time_of_leaving'] = $data[$i]['time_of_leaving'];
			$data[$i]['detail_time_to_hospital'] = $data[$i]['time_to_hospital'];
			$data[$i]['detail_base_time_finish'] = $data[$i]['base_time_finish'];
			$data[$i]['detail_distance_base_scene'] = $data[$i]['distance_base_scene'];
			$data[$i]['detail_distance_to_hospital'] = $data[$i]['distance_to_hospital'];

			//FUNCTION
		}
		return $data;
	}

	/**
	 * SET array detail list
	 */
	private function setPreviewFormatDetail($row_data)
	{
		$data = $row_data;

		$pk1 = $data['itme_distance_id'];
		$data['detail_recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$data['detail_encrypt_itme_distance_id'] = $pk1;
		$data['detail_encrypt_service_information_id'] = urlencode(encrypt($data['service_information_id']));

		$data['detail_record_itme_distance_id'] = $data['itme_distance_id'];
		$data['detail_record_service_information_id'] = $data['service_information_id'];
		$data['detail_encrypt_service_information_id'] = ci_encrypt($data['service_information_id']);
		$data['detail_record_incident_time'] = $data['incident_time'];
		$data['detail_record_incident_time_recrive'] = $data['incident_time_recrive'];
		$data['detail_record_time_order'] = $data['time_order'];
		$data['detail_record_base_time_start'] = $data['base_time_start'];
		$data['detail_record_base_time_stop'] = $data['base_time_stop'];
		$data['detail_record_time_of_leaving'] = $data['time_of_leaving'];
		$data['detail_record_time_to_hospital'] = $data['time_to_hospital'];
		$data['detail_record_base_time_finish'] = $data['base_time_finish'];
		$data['detail_record_distance_base_scene'] = $data['distance_base_scene'];
		$data['detail_record_distance_to_hospital'] = $data['distance_to_hospital'];



		return $data;
	}
}
/*---------------------------- END Controller Class --------------------------------*/
