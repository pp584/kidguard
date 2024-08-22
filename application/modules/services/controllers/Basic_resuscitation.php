<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Basic_resuscitation.php ]
 */
class Basic_resuscitation extends MEMBER_Controller
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
		$this->load->model('services/Basic_resuscitation_model', 'Basic_resuscitation');
		$this->Basic_resuscitation->session_name = 'services_basic_resuscitation';

		$this->data['page_url'] = site_url('services/basic_resuscitation');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/basic_resuscitation.js?ft=' . filemtime('assets/js_modules/services/basic_resuscitation.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Basic_resuscitation', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Basic_resuscitation->session_name . '_search_field');
		$this->session->unset_userdata($this->Basic_resuscitation->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Basic_resuscitation', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Basic_resuscitation->session_name . '_search_field' => $search_field, $this->Basic_resuscitation->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Basic_resuscitation->session_name . '_search_field');
			$value = $this->session->userdata($this->Basic_resuscitation->session_name . '_value');
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
			$this->Basic_resuscitation->order_field = $field;
			$this->Basic_resuscitation->order_sort = $sort;
		}
		$results = $this->Basic_resuscitation->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/basic_resuscitation');
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

		$this->render_view('services/basic_resuscitation/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Basic_resuscitation', 'url' => site_url('services/basic_resuscitation')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Basic_resuscitation->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/basic_resuscitation/preview_view');
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
			array('title' => 'Basic_resuscitation', 'url' => site_url('services/basic_resuscitation')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('services/basic_resuscitation/add_view');
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

		$frm->set_rules('first_life_resuscitation', 'การทำกู้ชีพเบื้องต้น ก่อนทีมปฏิบัติการแพทย์ฉุกเฉินมาถึง[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('methods_first_life_resuscitation', 'ลักษณะของการทำกู้ชีพเบื้องต้น[1=Compressions only (กดหน้าอกอย่างเดียว),2=Chest compressions and mouth or bag ventilations (กดหน้าอกร่วมกับช่วยหายใจทางปากหรือถุงลม),3=Mouth or bag ventilations only (ช่วยหายใจทางปากหรือถุงลมอย่างเดียว),4=AED,5=Stop bleeding (ห้ามเลือด),6=Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า),7=อื่นๆ', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr', 'ผู้ทำการกู้ชีพ (CPR) เบื้องต้น[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์,3=อื่นๆ]', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr_general_public', 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr_medical_personnel', 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr_remark', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('general_public_aed', 'มี AED ในที่สาธารณะ[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('use_general_public_aed', 'มีการใช้ AED โดยผู้พบเห็นเหตุการณ์ ณ จุดเกิดเหตุ[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('first_use_aed', 'ผู้ที่ใช้ AED คนแรก ณ จุดเกิดเหตุ[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์]', 'trim|required|is_natural');
		$frm->set_rules('first_use_aedgeneral_public', 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]', 'trim|required|is_natural');
		$frm->set_rules('first_use_aedmedical_personnel', 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('first_life_resuscitation');
			$message .= form_error('methods_first_life_resuscitation');
			$message .= form_error('rescuer_cpr');
			$message .= form_error('rescuer_cpr_general_public');
			$message .= form_error('rescuer_cpr_medical_personnel');
			$message .= form_error('rescuer_cpr_remark');
			$message .= form_error('general_public_aed');
			$message .= form_error('use_general_public_aed');
			$message .= form_error('first_use_aed');
			$message .= form_error('first_use_aedgeneral_public');
			$message .= form_error('first_use_aedmedical_personnel');
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

		$frm->set_rules('first_life_resuscitation', 'การทำกู้ชีพเบื้องต้น ก่อนทีมปฏิบัติการแพทย์ฉุกเฉินมาถึง[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('methods_first_life_resuscitation', 'ลักษณะของการทำกู้ชีพเบื้องต้น[1=Compressions only (กดหน้าอกอย่างเดียว),2=Chest compressions and mouth or bag ventilations (กดหน้าอกร่วมกับช่วยหายใจทางปากหรือถุงลม),3=Mouth or bag ventilations only (ช่วยหายใจทางปากหรือถุงลมอย่างเดียว),4=AED,5=Stop bleeding (ห้ามเลือด),6=Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า),7=อื่นๆ', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr', 'ผู้ทำการกู้ชีพ (CPR) เบื้องต้น[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์,3=อื่นๆ]', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr_general_public', 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr_medical_personnel', 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]', 'trim|required|is_natural');
		$frm->set_rules('rescuer_cpr_remark', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('general_public_aed', 'มี AED ในที่สาธารณะ[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('use_general_public_aed', 'มีการใช้ AED โดยผู้พบเห็นเหตุการณ์ ณ จุดเกิดเหตุ[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('first_use_aed', 'ผู้ที่ใช้ AED คนแรก ณ จุดเกิดเหตุ[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์]', 'trim|required|is_natural');
		$frm->set_rules('first_use_aedgeneral_public', 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]', 'trim|required|is_natural');
		$frm->set_rules('first_use_aedmedical_personnel', 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('first_life_resuscitation');
			$message .= form_error('methods_first_life_resuscitation');
			$message .= form_error('rescuer_cpr');
			$message .= form_error('rescuer_cpr_general_public');
			$message .= form_error('rescuer_cpr_medical_personnel');
			$message .= form_error('rescuer_cpr_remark');
			$message .= form_error('general_public_aed');
			$message .= form_error('use_general_public_aed');
			$message .= form_error('first_use_aed');
			$message .= form_error('first_use_aedgeneral_public');
			$message .= form_error('first_use_aedmedical_personnel');
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
			$id = $this->Basic_resuscitation->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Basic_resuscitation->error_message;
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
			array('title' => 'การกู้ชีพเบื้องต้น', 'url' => site_url('services/basic_resuscitation')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		//$encrypt_id = urldecode($encrypt_id);
		//$id = $this->session->userdata('service_information_id');
		$id =  $this->session->userdata('service_information_id');
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Basic_resuscitation->load_edit_data($id);
			// if (empty($results)) {
			// 	$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
			// 	$this->render_view('ci_message/danger');
			// } else {
			$this->data['csrf_field'] = insert_csrf_field(true);

			$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

			$this->setPreviewFormat($results);

			$this->render_view('services/basic_resuscitation/edit_view');
			// }
		}
	}


	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Basic_resuscitation', 'url' => site_url('services/basic_resuscitation')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Basic_resuscitation->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/basic_resuscitation/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$basic_resuscitation_id = ci_decrypt($data['encrypt_basic_resuscitation_id']);
		if ($basic_resuscitation_id == '') {
			$error .= '- รหัส basic_resuscitation_id';
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

			$result = $this->Basic_resuscitation->update($post);
			if ($result == false) {
				$message = $this->Basic_resuscitation->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Basic_resuscitation->error_message;
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
			$result = $this->Basic_resuscitation->delete($post);
			if ($result == false) {
				$message = $this->Basic_resuscitation->error_message;
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
			$pk1 = $data[$i]['basic_resuscitation_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_basic_resuscitation_id'] = $pk1;
			$data[$i]['preview_first_life_resuscitation'] = $this->setFirstLifeResuscitationSubject($data[$i]['first_life_resuscitation']);
			$data[$i]['preview_methods_first_life_resuscitation'] = $this->setMethodsFirstLifeResuscitationSubject($data[$i]['methods_first_life_resuscitation']);
			$data[$i]['preview_rescuer_cpr'] = $this->setRescuerCprSubject($data[$i]['rescuer_cpr']);
			$data[$i]['preview_rescuer_cpr_general_public'] = $this->setRescuerCprGeneralPublicSubject($data[$i]['rescuer_cpr_general_public']);
			$data[$i]['preview_rescuer_cpr_medical_personnel'] = $this->setRescuerCprMedicalPersonnelSubject($data[$i]['rescuer_cpr_medical_personnel']);
			$data[$i]['preview_rescuer_cpr_remark'] = $this->setRescuerCprRemarkSubject($data[$i]['rescuer_cpr_remark']);
			$data[$i]['preview_general_public_aed'] = $this->setGeneralPublicAedSubject($data[$i]['general_public_aed']);
			$data[$i]['preview_use_general_public_aed'] = $this->setUseGeneralPublicAedSubject($data[$i]['use_general_public_aed']);
			$data[$i]['preview_first_use_aed'] = $this->setFirstUseAedSubject($data[$i]['first_use_aed']);
			$data[$i]['preview_first_use_aedgeneral_public'] = $this->setFirstUseAedgeneralPublicSubject($data[$i]['first_use_aedgeneral_public']);
			$data[$i]['preview_first_use_aedmedical_personnel'] = $this->setFirstUseAedmedicalPersonnelSubject($data[$i]['first_use_aedmedical_personnel']);
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
	private function setFirstLifeResuscitationSubject($value)
	{
		$subject = '';
		switch ($value) {
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
	private function setMethodsFirstLifeResuscitationSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'Compressions only (กดหน้าอกอย่างเดียว)';
				break;
			case 2:
				$subject = 'Chest compressions and mouth or bag ventilations (กดหน้าอกร่วมกับช่วยหายใจทางปากหรือถุงลม)';
				break;
			case 3:
				$subject = 'Mouth or bag ventilations only (ช่วยหายใจทางปากหรือถุงลมอย่างเดียว)';
				break;
			case 4:
				$subject = 'AED';
				break;
			case 5:
				$subject = 'Stop bleeding (ห้ามเลือด)';
				break;
			case 6:
				$subject = 'Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า)';
				break;
			case 7:
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRescuerCprSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ประชาชนทั่วไป';
				break;
			case 2:
				$subject = 'บุคลากรทางการแพทย์';
				break;
			case 3:
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRescuerCprGeneralPublicSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'สมาชิกครอบครัว';
				break;
			case 2:
				$subject = 'เพื่อนบ้าน';
				break;
			case 3:
				$subject = 'เพื่อนร่วมงาน';
				break;
			case 4:
				$subject = 'ตำรวจ';
				break;
			case 5:
				$subject = 'ผู้พบเห็นเหตุการณ์/พลเมืองดี';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRescuerCprMedicalPersonnelSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'แพทย์';
				break;
			case 2:
				$subject = 'ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)';
				break;
			case 3:
				$subject = 'พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)';
				break;
			case 4:
				$subject = 'พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)';
				break;
			case 5:
				$subject = 'อาสาสมัครสาธารณสุข อสส./อสม.';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setRescuerCprRemarkSubject($value)
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
	private function setGeneralPublicAedSubject($value)
	{
		$subject = '';
		switch ($value) {
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
	private function setUseGeneralPublicAedSubject($value)
	{
		$subject = '';
		switch ($value) {
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
	private function setFirstUseAedSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ประชาชนทั่วไป';
				break;
			case 2:
				$subject = 'บุคลากรทางการแพทย์';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setFirstUseAedgeneralPublicSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'สมาชิกครอบครัว';
				break;
			case 2:
				$subject = 'เพื่อนบ้าน';
				break;
			case 3:
				$subject = 'เพื่อนร่วมงาน';
				break;
			case 4:
				$subject = 'ตำรวจ';
				break;
			case 5:
				$subject = 'ผู้พบเห็นเหตุการณ์/พลเมืองดี';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setFirstUseAedmedicalPersonnelSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'แพทย์';
				break;
			case 2:
				$subject = 'ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...)';
				break;
			case 3:
				$subject = 'พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic)';
				break;
			case 4:
				$subject = 'พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR)';
				break;
			case 5:
				$subject = 'อาสาสมัครสาธารณสุข อสส./อสม.';
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

		$pk1 = $data['basic_resuscitation_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_basic_resuscitation_id'] = $pk1;

		$this->data['record_basic_resuscitation_id'] = $data['basic_resuscitation_id'];
		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['preview_first_life_resuscitation'] = $this->setFirstLifeResuscitationSubject($data['first_life_resuscitation']);
		$this->data['record_first_life_resuscitation'] = $data['first_life_resuscitation'];
		$this->data['preview_methods_first_life_resuscitation'] = $this->setMethodsFirstLifeResuscitationSubject($data['methods_first_life_resuscitation']);
		$this->data['record_methods_first_life_resuscitation'] = $data['methods_first_life_resuscitation'];
		$this->data['preview_rescuer_cpr'] = $this->setRescuerCprSubject($data['rescuer_cpr']);
		$this->data['record_rescuer_cpr'] = $data['rescuer_cpr'];
		$this->data['preview_rescuer_cpr_general_public'] = $this->setRescuerCprGeneralPublicSubject($data['rescuer_cpr_general_public']);
		$this->data['record_rescuer_cpr_general_public'] = $data['rescuer_cpr_general_public'];
		$this->data['preview_rescuer_cpr_medical_personnel'] = $this->setRescuerCprMedicalPersonnelSubject($data['rescuer_cpr_medical_personnel']);
		$this->data['record_rescuer_cpr_medical_personnel'] = $data['rescuer_cpr_medical_personnel'];
		$this->data['preview_rescuer_cpr_remark'] = $this->setRescuerCprRemarkSubject($data['rescuer_cpr_remark']);
		$this->data['record_rescuer_cpr_remark'] = $data['rescuer_cpr_remark'];
		$this->data['preview_general_public_aed'] = $this->setGeneralPublicAedSubject($data['general_public_aed']);
		$this->data['record_general_public_aed'] = $data['general_public_aed'];
		$this->data['preview_use_general_public_aed'] = $this->setUseGeneralPublicAedSubject($data['use_general_public_aed']);
		$this->data['record_use_general_public_aed'] = $data['use_general_public_aed'];
		$this->data['preview_first_use_aed'] = $this->setFirstUseAedSubject($data['first_use_aed']);
		$this->data['record_first_use_aed'] = $data['first_use_aed'];
		$this->data['preview_first_use_aedgeneral_public'] = $this->setFirstUseAedgeneralPublicSubject($data['first_use_aedgeneral_public']);
		$this->data['record_first_use_aedgeneral_public'] = $data['first_use_aedgeneral_public'];
		$this->data['preview_first_use_aedmedical_personnel'] = $this->setFirstUseAedmedicalPersonnelSubject($data['first_use_aedmedical_personnel']);
		$this->data['record_first_use_aedmedical_personnel'] = $data['first_use_aedmedical_personnel'];
	}
}
/*---------------------------- END Controller Class --------------------------------*/
