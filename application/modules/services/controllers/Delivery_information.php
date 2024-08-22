<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Delivery_information.php ]
 */
class Delivery_information extends MEMBER_Controller
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
		$this->load->model('services/Delivery_information_model', 'Delivery_information');
		$this->Delivery_information->session_name = 'services_delivery_information';

		$this->data['page_url'] = site_url('services/delivery_information');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/delivery_information.js?ft=' . filemtime('assets/js_modules/services/delivery_information.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Delivery_information', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Delivery_information->session_name . '_search_field');
		$this->session->unset_userdata($this->Delivery_information->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Delivery_information', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Delivery_information->session_name . '_search_field' => $search_field, $this->Delivery_information->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Delivery_information->session_name . '_search_field');
			$value = $this->session->userdata($this->Delivery_information->session_name . '_value');
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
			$this->Delivery_information->order_field = $field;
			$this->Delivery_information->order_sort = $sort;
		}
		$results = $this->Delivery_information->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/delivery_information');
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

		$this->render_view('services/delivery_information/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Delivery_information', 'url' => site_url('services/delivery_information')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Delivery_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/delivery_information/preview_view');
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
			array('title' => 'Delivery_information', 'url' => site_url('services/delivery_information')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('services/delivery_information/add_view');
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

		$frm->set_rules('delivery_hospital', 'โรงพยาบาลที่นำส่ง[1=รัฐบาล,2=เอกชน]', 'trim|required|is_natural');
		$frm->set_rules('delivery_hospital_course', 'เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[delivery_hospital_course]');
		// $frm->set_rules('screening_level', 'ระดับการคัดกรอง[1=สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation),2=สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency),3=สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency),4=สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency),5=สีขาว ผู้ป่วยทั่วไป (Non-Urgency)]', 'trim|required|is_natural');
		$frm->set_rules('resuscitation', 'การ Resuscitation  ณ แผนกอุบัติเหตุและฉุกเฉิน[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('respiratory_system', 'ระบบทางเดินหายใจ[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]	', 'trim|required|is_natural');
		$frm->set_rules('water_supply', 'การให้สารน้ำ[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]	', 'trim|required|is_natural');
		$frm->set_rules('hemostasis', 'การห้ามเลือด[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]', 'trim|required|is_natural');
		$frm->set_rules('splint', 'การดามกระดูก[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('delivery_hospital');
			$message .= form_error('delivery_hospital_course');
			// $message .= form_error('screening_level');
			$message .= form_error('resuscitation');
			$message .= form_error('respiratory_system');
			$message .= form_error('water_supply');
			$message .= form_error('hemostasis');
			$message .= form_error('splint');
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

		$frm->set_rules('delivery_hospital', 'โรงพยาบาลที่นำส่ง[1=รัฐบาล,2=เอกชน]', 'trim|required|is_natural');
		$frm->set_rules('delivery_hospital_course', 'เหตุผลในการเลือกโรงพยาบาล (เลือกได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[delivery_hospital_course]');
		// $frm->set_rules('screening_level', 'ระดับการคัดกรอง[1=สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation),2=สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency),3=สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency),4=สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency),5=สีขาว ผู้ป่วยทั่วไป (Non-Urgency)]', 'trim|required|is_natural');
		$frm->set_rules('resuscitation', 'การ Resuscitation  ณ แผนกอุบัติเหตุและฉุกเฉิน[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('respiratory_system', 'ระบบทางเดินหายใจ[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]	', 'trim|required|is_natural');
		$frm->set_rules('water_supply', 'การให้สารน้ำ[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]	', 'trim|required|is_natural');
		$frm->set_rules('hemostasis', 'การห้ามเลือด[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]', 'trim|required|is_natural');
		$frm->set_rules('splint', 'การดามกระดูก[1=ไม่จำเป็น,2=ไม่ได้ทำ,3=ทำและเหมาะสม,4=ทำแต่ไม่เหมาะสม(ระบุ……)]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('delivery_hospital');
			$message .= form_error('delivery_hospital_course');
			// $message .= form_error('screening_level');
			$message .= form_error('resuscitation');
			$message .= form_error('respiratory_system');
			$message .= form_error('water_supply');
			$message .= form_error('hemostasis');
			$message .= form_error('splint');
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
			$post['delivery_hospital_course'] = implode(',', $post['delivery_hospital_course']);
			$id = $this->Delivery_information->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Delivery_information->error_message;
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



	public function edit_data()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำส่งแผนกอุบัติเหตุ', 'url' => site_url('services/delivery_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		//$encrypt_id = urldecode($encrypt_id);
		//$id = $this->session->userdata('service_information_id');
		$id = $this->session->userdata('service_information_id');

		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Delivery_information->load_edit_data($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/delivery_information/edit_view');
			}
		}
	}

	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Delivery_information', 'url' => site_url('services/delivery_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Delivery_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/delivery_information/edit_view');
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
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$post['service_information_id'] = $this->session->userdata('service_information_id');

			$post['delivery_hospital_course'] = implode(',', $post['delivery_hospital_course']);
			$result = $this->Delivery_information->update($post);
			if ($result == false) {
				$message = $this->Delivery_information->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Delivery_information->error_message;
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
			$result = $this->Delivery_information->delete($post);
			if ($result == false) {
				$message = $this->Delivery_information->error_message;
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
			$data[$i]['encrypt_id'] = $pk1;
			$data[$i]['preview_delivery_hospital'] = $this->setDeliveryHospitalSubject($data[$i]['delivery_hospital']);
			$data[$i]['preview_delivery_hospital_course'] = $this->setDeliveryHospitalCourseSubject($data[$i]['delivery_hospital_course']);
			$data[$i]['preview_screening_level'] = $this->setScreeningLevelSubject($data[$i]['screening_level']);
			$data[$i]['preview_resuscitation'] = $this->setResuscitationSubject($data[$i]['resuscitation']);
			$data[$i]['preview_respiratory_system'] = $this->setRespiratorySystemSubject($data[$i]['respiratory_system']);
			$data[$i]['preview_water_supply'] = $this->setWaterSupplySubject($data[$i]['water_supply']);
			$data[$i]['preview_hemostasis'] = $this->setHemostasisSubject($data[$i]['hemostasis']);
			$data[$i]['preview_splint'] = $this->setSplintSubject($data[$i]['splint']);
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
	private function setDeliveryHospitalSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'รัฐบาล';
				break;
			case 2:
				$subject = 'เอกชน';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDeliveryHospitalCourseSubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  'เหมาะสม สามารถให้การรักษาได้';
					break;
				case '2':
					$subject .= $comma .  'อยู่ใกล้';
					break;
				case '3':
					$subject .= $comma .  'มีสิทธิการรักษา';
					break;
				case '4':
					$subject .= $comma .  'เป็นผู้ป่วยเก่า';
					break;
				case '5':
					$subject .= $comma .  'เป็นความต้องการของญาติ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setScreeningLevelSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation)';
				break;
			case 2:
				$subject = 'สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency)';
				break;
			case 3:
				$subject = 'สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency)';
				break;
			case 4:
				$subject = 'สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency)';
				break;
			case 5:
				$subject = 'สีขาว ผู้ป่วยทั่วไป (Non-Urgency)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setResuscitationSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่ทำ';
				break;
			case 2:
				$subject = 'ทำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRespiratorySystemSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่จำเป็น';
				break;
			case 2:
				$subject = 'ไม่ได้ทำ';
				break;
			case 3:
				$subject = 'ทำและเหมาะสม';
				break;
			case 4:
				$subject = 'ทำแต่ไม่เหมาะสม(ระบุ……)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setWaterSupplySubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่จำเป็น';
				break;
			case 2:
				$subject = 'ไม่ได้ทำ';
				break;
			case 3:
				$subject = 'ทำและเหมาะสม';
				break;
			case 4:
				$subject = 'ทำแต่ไม่เหมาะสม(ระบุ……)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setHemostasisSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่จำเป็น';
				break;
			case 2:
				$subject = 'ไม่ได้ทำ';
				break;
			case 3:
				$subject = 'ทำและเหมาะสม';
				break;
			case 4:
				$subject = 'ทำแต่ไม่เหมาะสม(ระบุ……)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setSplintSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่จำเป็น';
				break;
			case 2:
				$subject = 'ไม่ได้ทำ';
				break;
			case 3:
				$subject = 'ทำและเหมาะสม';
				break;
			case 4:
				$subject = 'ทำแต่ไม่เหมาะสม(ระบุ……)';
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
		$this->data['encrypt_id'] = $pk1;

		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['record_id'] = $data['service_information_id'];
		$this->data['preview_delivery_hospital'] = $this->setDeliveryHospitalSubject($data['delivery_hospital']);
		$this->data['record_delivery_hospital'] = $data['delivery_hospital'];
		$this->data['preview_delivery_hospital_course'] = $this->setDeliveryHospitalCourseSubject($data['delivery_hospital_course']);
		$this->data['record_delivery_hospital_course'] = $data['delivery_hospital_course'];
		$this->data['preview_screening_level'] = $this->setScreeningLevelSubject($data['screening_level']);
		$this->data['record_screening_level'] = $data['screening_level'];
		$this->data['preview_resuscitation'] = $this->setResuscitationSubject($data['resuscitation']);
		$this->data['record_resuscitation'] = $data['resuscitation'];
		$this->data['preview_respiratory_system'] = $this->setRespiratorySystemSubject($data['respiratory_system']);
		$this->data['record_respiratory_system'] = $data['respiratory_system'];
		$this->data['record_respiratory_system_remark'] = $data['respiratory_system_remark'];
		$this->data['preview_water_supply'] = $this->setWaterSupplySubject($data['water_supply']);
		$this->data['record_water_supply'] = $data['water_supply'];
		$this->data['record_water_supply_remark'] = $data['water_supply_remark'];
		$this->data['preview_hemostasis'] = $this->setHemostasisSubject($data['hemostasis']);
		$this->data['record_hemostasis'] = $data['hemostasis'];
		$this->data['record_hemostasis_remark'] = $data['hemostasis_remark'];
		$this->data['preview_splint'] = $this->setSplintSubject($data['splint']);
		$this->data['record_splint'] = $data['splint'];
		$this->data['record_splint_remark'] = $data['splint_remark'];
	}
}
/*---------------------------- END Controller Class --------------------------------*/
