<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Event_information.php ]
 */
class Event_information extends MEMBER_Controller
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
		$this->load->model('services/Event_information_model', 'Event_information');
		$this->Event_information->session_name = 'services_event_information';

		$this->data['page_url'] = site_url('services/event_information');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/event_information.js?ft=' . filemtime('assets/js_modules/services/event_information.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Event_information', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Event_information->session_name . '_search_field');
		$this->session->unset_userdata($this->Event_information->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Event_information', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Event_information->session_name . '_search_field' => $search_field, $this->Event_information->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Event_information->session_name . '_search_field');
			$value = $this->session->userdata($this->Event_information->session_name . '_value');
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
			$this->Event_information->order_field = $field;
			$this->Event_information->order_sort = $sort;
		}
		$results = $this->Event_information->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/event_information');
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

		$this->render_view('services/event_information/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Event_information', 'url' => site_url('services/event_information')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Event_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/event_information/preview_view');
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
			array('title' => 'Event_information', 'url' => site_url('services/event_information')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('services/event_information/add_view');
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

		$frm->set_rules('even_scene', 'ลักษณะของที่เกิดเหตุ[1=ที่พักอาศัย ,2=สถานที่ทำงาน,3=สถานที่สาธารณะ,4=ศูนย์ดูแลผู้ป่วย,5=อื่นๆ]', 'trim|required|is_natural');
		//$frm->set_rules('accommodation', 'ที่พักอาศัย[1=หอพัก/แฟลต/อพาร์ทเมนต์/คอนโด (เป็นตึกสูง),2=บ้านเดี่ยวของตนเอง,3=หมู่บ้านจัดสรร,4=อื่น ๆ]', 'trim|required|is_natural');
		//$frm->set_rules('workplace', 'สถานที่ทำงาน[1=โรงงาน/บริษัท/สำนักงาน,2=ค่ายทหาร,3=หน่วยงานราชการ,4=อื่น ๆ]', 'trim|required|is_natural');
		//$frm->set_rules('public_place', 'สถานที่สาธารณะ[1=ตลาด,2=แหล่งท่องเที่ยว,3=สนามบิน,4=ถนน,5=ห้างสรรพสินค้า,6=สนามกีฬา,7=สถานบันเทิง,8=สวนสาธารณะ,9=สถานีขนส่ง]', 'trim|required|is_natural');
		//	$frm->set_rules('eyewitnesses', 'ผู้พบเห็นเหตุการณ์[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์,3=อื่นๆ]', 'trim|required|is_natural');
		//$frm->set_rules('general_public', 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]', 'trim|required|is_natural');
		//$frm->set_rules('medical_personnel', 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]', 'trim|required|is_natural');
		$frm->set_rules('causes_cardiac_arres', ' สาเหตุเบื้องต้นของภาวะหัวใจหยุดเต้น[1=Hypovolemia ภาวะปริมาตรเลือดน้อย เช่น มีประวัติถ่ายเหลว ท้องเสีย อาเจียน รับประทานไม่ได้ ขาดน้ำรุนแรง,2=Hypoxia ภาวะพร่องออกซิเจน เช่น ขาดอากาศหายใจ respiratory failureO2saturation drop,3=Hydrogen ion (Acidosis)  ภาวะเลือดเป็นกรด,4=Hypo/Hyperkalemia ภาวะโพแทสเซียมต่ำ/สูง,5=Hypothermia ภาวะอุณหภูมิกายต่ำ เช่น ตัวเย็นเกิน,6=Hypoglycemia ภาวะน้ำตาลในเลือดต่ำ,7=Toxins สารพิษ เช่น พบสารพิษ/ยาหล่นอยู่ข้างลำตัวหรือบริเวณใกล้เคียง กินยาฆ่าแมลง/น้ำยาล้างห้องน้ำ,8=Tamponade cardiac ภาวะบีบรัดหัวใจ เช่น ความดันโลหิตต่ำ ฟังพบเสียงหัวใจเบา หลอดเลือดดำคอโป่ง,9=Tension pneumothorax ภาวะปอดถูกกดทับ เช่น ฟังเสียงลมเข้าปอดลดลง หลอดลมคอเอียงไปข้างใดข้างหนึ่ง,10=Thrombosis pulmonary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดปอด เช่น โรคประจำตัวเป็นมะเร็งนอนติดเตียง นั่งเครื่องบินหลายชั่วโมง,11=Thrombosis coronary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดหัวใจ เช่น โรคประจำตัวหัวใจ ประวัติเจ็บแน่นหน้าอก เหงื่อออก ใจสั่น,12=Trauma ภาวะบาดเจ็บตามอวัยวะ เช่ย ประสบอุบัติเหตุทางรถยนต์,13=อื่นๆ ระบุ]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('even_scene');
			// $message .= form_error('accommodation');
			// $message .= form_error('workplace');
			// $message .= form_error('public_place');
			// $message .= form_error('eyewitnesses');
			// $message .= form_error('general_public');
			// $message .= form_error('medical_personnel');
			$message .= form_error('causes_cardiac_arres');
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

		$frm->set_rules('even_scene', 'ลักษณะของที่เกิดเหตุ[1=ที่พักอาศัย ,2=สถานที่ทำงาน,3=สถานที่สาธารณะ,4=ศูนย์ดูแลผู้ป่วย,5=อื่นๆ]', 'trim|required|is_natural');
		// $frm->set_rules('accommodation', 'ที่พักอาศัย[1=หอพัก/แฟลต/อพาร์ทเมนต์/คอนโด (เป็นตึกสูง),2=บ้านเดี่ยวของตนเอง,3=หมู่บ้านจัดสรร,4=อื่น ๆ]', 'trim|required|is_natural');
		// $frm->set_rules('workplace', 'สถานที่ทำงาน[1=โรงงาน/บริษัท/สำนักงาน,2=ค่ายทหาร,3=หน่วยงานราชการ,4=อื่น ๆ]', 'trim|required|is_natural');
		// $frm->set_rules('public_place', 'สถานที่สาธารณะ[1=ตลาด,2=แหล่งท่องเที่ยว,3=สนามบิน,4=ถนน,5=ห้างสรรพสินค้า,6=สนามกีฬา,7=สถานบันเทิง,8=สวนสาธารณะ,9=สถานีขนส่ง]', 'trim|required|is_natural');
		// $frm->set_rules('eyewitnesses', 'ผู้พบเห็นเหตุการณ์[1=ประชาชนทั่วไป,2=บุคลากรทางการแพทย์,3=อื่นๆ]', 'trim|required|is_natural');
		// $frm->set_rules('general_public', 'ประชาชนทั่วไป[1=สมาชิกครอบครัว,2=เพื่อนบ้าน,3=เพื่อนร่วมงาน,4=ตำรวจ,5=ผู้พบเห็นเหตุการณ์/พลเมืองดี]', 'trim|required|is_natural');
		// $frm->set_rules('medical_personnel', 'บุคลากรทางการแพทย์[1=แพทย์,2=ผู้ประกอบวิชาชีพทางการแพทย์(เช่น นักรังสีเทคนิค/นักกายภาพ ระบุ...),3=พยาบาล/พยาบาลเวชปฏิบัติฉุกเฉิน (ENP)/นักปฏิบัติการฉุกเฉินการแพทย์ (Paramedic),4=พนักงานฉุกเฉินการแพทย์ (AEMT)/ พนักงานฉุกเฉินการแพทย์(EMT)/อาสาสมัครฉุกเฉินการแพทย์ (EMR),5=อาสาสมัครสาธารณสุข อสส./อสม.]', 'trim|required|is_natural');
		$frm->set_rules('causes_cardiac_arres', ' สาเหตุเบื้องต้นของภาวะหัวใจหยุดเต้น[1=Hypovolemia ภาวะปริมาตรเลือดน้อย เช่น มีประวัติถ่ายเหลว ท้องเสีย อาเจียน รับประทานไม่ได้ ขาดน้ำรุนแรง,2=Hypoxia ภาวะพร่องออกซิเจน เช่น ขาดอากาศหายใจ respiratory failureO2saturation drop,3=Hydrogen ion (Acidosis)  ภาวะเลือดเป็นกรด,4=Hypo/Hyperkalemia ภาวะโพแทสเซียมต่ำ/สูง,5=Hypothermia ภาวะอุณหภูมิกายต่ำ เช่น ตัวเย็นเกิน,6=Hypoglycemia ภาวะน้ำตาลในเลือดต่ำ,7=Toxins สารพิษ เช่น พบสารพิษ/ยาหล่นอยู่ข้างลำตัวหรือบริเวณใกล้เคียง กินยาฆ่าแมลง/น้ำยาล้างห้องน้ำ,8=Tamponade cardiac ภาวะบีบรัดหัวใจ เช่น ความดันโลหิตต่ำ ฟังพบเสียงหัวใจเบา หลอดเลือดดำคอโป่ง,9=Tension pneumothorax ภาวะปอดถูกกดทับ เช่น ฟังเสียงลมเข้าปอดลดลง หลอดลมคอเอียงไปข้างใดข้างหนึ่ง,10=Thrombosis pulmonary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดปอด เช่น โรคประจำตัวเป็นมะเร็งนอนติดเตียง นั่งเครื่องบินหลายชั่วโมง,11=Thrombosis coronary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดหัวใจ เช่น โรคประจำตัวหัวใจ ประวัติเจ็บแน่นหน้าอก เหงื่อออก ใจสั่น,12=Trauma ภาวะบาดเจ็บตามอวัยวะ เช่ย ประสบอุบัติเหตุทางรถยนต์,13=อื่นๆ ระบุ]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('even_scene');
			// $message .= form_error('accommodation');
			// $message .= form_error('workplace');
			// $message .= form_error('public_place');
			// $message .= form_error('eyewitnesses');
			// $message .= form_error('general_public');
			// $message .= form_error('medical_personnel');
			$message .= form_error('causes_cardiac_arres');
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
			$id = $this->Event_information->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Event_information->error_message;
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
			array('title' => 'ข้อมูลเหตุการณ์', 'url' => site_url('services/event_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = $this->session->userdata('service_information_id');
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Event_information->load_edit_data($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/event_information/edit_view');
			}
		}
	}

	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Event_information', 'url' => site_url('services/event_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Event_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/event_information/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$event_information_id = ci_decrypt($data['encrypt_event_information_id']);
		if ($event_information_id == '') {
			$error .= '- รหัส event_information_id';
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

			$result = $this->Event_information->update($post);
			if ($result == false) {
				$message = $this->Event_information->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Event_information->error_message;
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
			$result = $this->Event_information->delete($post);
			if ($result == false) {
				$message = $this->Event_information->error_message;
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
			$pk1 = $data[$i]['event_information_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_event_information_id'] = $pk1;
			$data[$i]['preview_even_scene'] = $this->setEvenSceneSubject($data[$i]['even_scene']);
			$data[$i]['preview_accommodation'] = $this->setAccommodationSubject($data[$i]['accommodation']);
			$data[$i]['preview_workplace'] = $this->setWorkplaceSubject($data[$i]['workplace']);
			$data[$i]['preview_public_place'] = $this->setPublicPlaceSubject($data[$i]['public_place']);
			$data[$i]['preview_eyewitnesses'] = $this->setEyewitnessesSubject($data[$i]['eyewitnesses']);
			$data[$i]['preview_general_public'] = $this->setGeneralPublicSubject($data[$i]['general_public']);
			$data[$i]['preview_medical_personnel'] = $this->setMedicalPersonnelSubject($data[$i]['medical_personnel']);
			$data[$i]['preview_causes_cardiac_arres'] = $this->setCausesCardiacArresSubject($data[$i]['causes_cardiac_arres']);
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
	private function setEvenSceneSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ที่พักอาศัย';
				break;
			case 2:
				$subject = 'สถานที่ทำงาน';
				break;
			case 3:
				$subject = 'สถานที่สาธารณะ';
				break;
			case 4:
				$subject = 'ศูนย์ดูแลผู้ป่วย';
				break;
			case 5:
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setAccommodationSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'หอพัก/แฟลต/อพาร์ทเมนต์/คอนโด (เป็นตึกสูง)';
				break;
			case 2:
				$subject = 'บ้านเดี่ยวของตนเอง';
				break;
			case 3:
				$subject = 'หมู่บ้านจัดสรร';
				break;
			case 4:
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setWorkplaceSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'โรงงาน/บริษัท/สำนักงาน';
				break;
			case 2:
				$subject = 'ค่ายทหาร';
				break;
			case 3:
				$subject = 'หน่วยงานราชการ';
				break;
			case 4:
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setPublicPlaceSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ตลาด';
				break;
			case 2:
				$subject = 'แหล่งท่องเที่ยว';
				break;
			case 3:
				$subject = 'สนามบิน';
				break;
			case 4:
				$subject = 'ถนน';
				break;
			case 5:
				$subject = 'ห้างสรรพสินค้า';
				break;
			case 6:
				$subject = 'สนามกีฬา';
				break;
			case 7:
				$subject = 'สถานบันเทิง';
				break;
			case 8:
				$subject = 'สวนสาธารณะ';
				break;
			case 9:
				$subject = 'สถานีขนส่ง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setEyewitnessesSubject($value)
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
	private function setGeneralPublicSubject($value)
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
	private function setMedicalPersonnelSubject($value)
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
	private function setCausesCardiacArresSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'Hypovolemia ภาวะปริมาตรเลือดน้อย เช่น มีประวัติถ่ายเหลว ท้องเสีย อาเจียน รับประทานไม่ได้ ขาดน้ำรุนแรง';
				break;
			case 2:
				$subject = 'Hypoxia ภาวะพร่องออกซิเจน เช่น ขาดอากาศหายใจ respiratory failureO2saturation drop';
				break;
			case 3:
				$subject = 'Hydrogen ion (Acidosis)  ภาวะเลือดเป็นกรด';
				break;
			case 4:
				$subject = 'Hypo/Hyperkalemia ภาวะโพแทสเซียมต่ำ/สูง';
				break;
			case 5:
				$subject = 'Hypothermia ภาวะอุณหภูมิกายต่ำ เช่น ตัวเย็นเกิน';
				break;
			case 6:
				$subject = 'Hypoglycemia ภาวะน้ำตาลในเลือดต่ำ';
				break;
			case 7:
				$subject = 'Toxins สารพิษ เช่น พบสารพิษ/ยาหล่นอยู่ข้างลำตัวหรือบริเวณใกล้เคียง กินยาฆ่าแมลง/น้ำยาล้างห้องน้ำ';
				break;
			case 8:
				$subject = 'Tamponade cardiac ภาวะบีบรัดหัวใจ เช่น ความดันโลหิตต่ำ ฟังพบเสียงหัวใจเบา หลอดเลือดดำคอโป่ง';
				break;
			case 9:
				$subject = 'Tension pneumothorax ภาวะปอดถูกกดทับ เช่น ฟังเสียงลมเข้าปอดลดลง หลอดลมคอเอียงไปข้างใดข้างหนึ่ง';
				break;
			case 10:
				$subject = 'Thrombosis pulmonary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดปอด เช่น โรคประจำตัวเป็นมะเร็งนอนติดเตียง นั่งเครื่องบินหลายชั่วโมง';
				break;
			case 11:
				$subject = 'Thrombosis coronary ภาวะลิ่มเลือดอุดกั้นในหลอดเลือดหัวใจ เช่น โรคประจำตัวหัวใจ ประวัติเจ็บแน่นหน้าอก เหงื่อออก ใจสั่น';
				break;
			case 12:
				$subject = 'Trauma ภาวะบาดเจ็บตามอวัยวะ เช่ย ประสบอุบัติเหตุทางรถยนต์';
				break;
			case 13:
				$subject = 'อื่นๆ ระบุ';
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

		$pk1 = $data['event_information_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_event_information_id'] = $pk1;

		$this->data['record_event_information_id'] = $data['event_information_id'];
		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['preview_even_scene'] = $this->setEvenSceneSubject($data['even_scene']);
		$this->data['record_even_scene'] = $data['even_scene'];
		$this->data['record_even_scene_remark'] = $data['even_scene_remark'];
		$this->data['preview_accommodation'] = $this->setAccommodationSubject($data['accommodation']);
		$this->data['record_accommodation'] = $data['accommodation'];
		$this->data['record_accommodation_remark'] = $data['accommodation_remark'];
		$this->data['preview_workplace'] = $this->setWorkplaceSubject($data['workplace']);
		$this->data['record_workplace'] = $data['workplace'];
		$this->data['record_workplace_remark'] = $data['workplace_remark'];
		$this->data['preview_public_place'] = $this->setPublicPlaceSubject($data['public_place']);
		$this->data['record_public_place'] = $data['public_place'];
		$this->data['preview_eyewitnesses'] = $this->setEyewitnessesSubject($data['eyewitnesses']);
		$this->data['record_eyewitnesses'] = $data['eyewitnesses'];
		$this->data['preview_general_public'] = $this->setGeneralPublicSubject($data['general_public']);
		$this->data['record_general_public'] = $data['general_public'];
		$this->data['preview_medical_personnel'] = $this->setMedicalPersonnelSubject($data['medical_personnel']);
		$this->data['record_medical_personnel'] = $data['medical_personnel'];
		$this->data['record_eyewitnesses_remark'] = $data['eyewitnesses_remark'];
		$this->data['preview_causes_cardiac_arres'] = $this->setCausesCardiacArresSubject($data['causes_cardiac_arres']);
		$this->data['record_causes_cardiac_arres'] = $data['causes_cardiac_arres'];
	}
}
/*---------------------------- END Controller Class --------------------------------*/
