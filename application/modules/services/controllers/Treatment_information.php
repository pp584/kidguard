<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Treatment_information.php ]
 */
class Treatment_information extends MEMBER_Controller
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
		$this->load->model('services/Treatment_information_model', 'Treatment_information');
		$this->Treatment_information->session_name = 'services_treatment_information';

		$this->data['page_url'] = site_url('services/treatment_information');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/services/treatment_information.js?ft=' . filemtime('assets/js_modules/services/treatment_information.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Treatment_information', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Treatment_information->session_name . '_search_field');
		$this->session->unset_userdata($this->Treatment_information->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Treatment_information', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Treatment_information->session_name . '_search_field' => $search_field, $this->Treatment_information->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Treatment_information->session_name . '_search_field');
			$value = $this->session->userdata($this->Treatment_information->session_name . '_value');
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
			$this->Treatment_information->order_field = $field;
			$this->Treatment_information->order_sort = $sort;
		}
		$results = $this->Treatment_information->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('services/treatment_information');
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

		$this->render_view('services/treatment_information/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Treatment_information', 'url' => site_url('services/treatment_information')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Treatment_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('services/treatment_information/preview_view');
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
			array('title' => 'Treatment_information', 'url' => site_url('services/treatment_information')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('services/treatment_information/add_view');
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

		$frm->set_rules('rosc_time_save', 'การบันทึกเวลา ROSC (การกลับมามีสัญญาณชีพ) ครั้งแรกเมื่อทีมปฏิบัติการแพทย์ฉุกเฉินไปถึง[1=ทำ,2=ไม่ทำ,3=ไม่ทราบเวลา]', 'trim|required|is_natural');
		$frm->set_rules('cpr', 'การทำ CPR ของทีมปฏิบัติการแพทย์ฉุกเฉิน[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('time_cpr_start', 'เวลาที่เริ่ม CPR ณ จุดเกิดเหตุ', 'trim|required');
		$frm->set_rules('time_cpr_end', 'เวลาที่สิ้นสุดการ CPR ณ จุดเกิดเหตุ', 'trim|required');
		$frm->set_rules('rosc_time_alert', 'การมี ROSC (การกลับมามีสัญญาณชีพ)[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('rta_have', 'มี[1=หลังจาก CPR โดยผู้พบเห็นเหตุการณ์,2=หลังจาก CPR โดยทีมปฏิบัติการแพทย์ฉุกเฉิน,3=หลังจากใช้ AED โดยผู้พบเห็นเหตุการณ์,4=หลังจากใช้ AED โดยทีมปฏิบัติการแพทย์ฉุกเฉิน,5=หลังจากทีมปฏิบัติการแพทย์ฉุกเฉินทำ Advanced  cardiac life support (การช่วยฟื้นคืนชีพระดับสูง)]', 'trim|required|is_natural');
		$frm->set_rules('cpr_rosc_nomal', 'การทำ CPR เพื่อให้ผู้ป่วยมีภาวะ ROSC คงที่[1=ณ จุดเกิดเหตุ,2=ณ จุดเกิดเหตุ - ทำต่อเนื่องในรถฉุกเฉิน,3=ณ จุดเกิดเหตุ – ทำต่อเนื่องในรถฉุกเฉิน - แผนกอุบัติเหตุและฉุกเฉินโรงพยาบาล]', 'trim|required|is_natural');
		$frm->set_rules('use_defibrillator', 'การใช้ Defibrillator[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('ekg', 'การประเมิน EKG หลังทำ CPR[1=Shockable rhythm (Pulseless Ventricular Fibrillation/ Ventricular Tachycardia),2= Non-shockable rhythm (Asystole / Pulseless Electrical Activity)]', 'trim|required|is_natural');
		$frm->set_rules('defibrillations_number', 'จำนวนครั้งการกระตุกหัวใจที่ได้รับ', 'trim|required|is_natural');
		$frm->set_rules('airway_opening', 'การเปิดทางเดินหายใจ[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('airway_management', 'การจัดการทางเดินหายใจและการช่วยหายใจ (เลือกได้มากกว่า 1 ข้อ) ', 'trim|callback_multiple_select[airway_management]');
		$frm->set_rules('non_definite_airway', 'Non-definite airway', 'trim|callback_multiple_select[non_definite_airway]');
		$frm->set_rules('definite_airway', 'Definite airway', 'trim|callback_multiple_select[definite_airway]');
		$frm->set_rules('stop_bleeding', 'การ Stop bleeding (การห้ามเลือด)[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('intravenous_fluid', 'การให้สารน้ำทางหลอดเลือดดำ[1=ไม่ให้,2=ให้ ระบุประเภท และ อัตราการไหลต่อชั่วโมง]', 'trim|required|is_natural');
		$frm->set_rules('intravenous_fluid_yes', 'ให้[1=9% Nacl,2=Acetar,3=Lactate ringer,4=อื่นๆ]', 'trim|required|is_natural');
		$frm->set_rules('intravenous_fluid_remark', 'อื่นๆ ระบุ', 'trim|required');
		$frm->set_rules('drug', 'การให้ยา[1=ไม่ให้,2=ให้ ระบุประเภท]', 'trim|required|is_natural');
		$frm->set_rules('drag_yes', 'ให้[1=Adrenaline,2=Atropine,3=Cordarone,4=อื่นๆ]', 'trim|required|is_natural');
		$frm->set_rules('drug_remark', 'อื่นๆ ระบุ', 'trim|required');
		$frm->set_rules('hkw_local', 'การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) ณ จุดเกิดเหตุ[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('hkw_hospital', 'การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) อย่างต่อเนื่องจนถึงโรงพยาบาล[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('auto_cpr', 'เครื่อง Auto CPR[1=ไม่มีเครื่อง Auto CPR,2=มีเครื่อง Auto CPR]	', 'trim|required|is_natural');
		$frm->set_rules('auto_cpr_yes', 'มีเครื่อง Auto CPR[1=ไม่ใช้,2=ใช้]', 'trim|required|is_natural');
		$frm->set_rules('course_resuscitation', 'สาเหตุการหยุด Resuscitation[1=Loss of Spontaneous Circulation LOSC (ไม่มีสัญญาณชีพกลับมา),2=Living will (หนังสือแสดงเจตนาปฏิเสธการรักษาพยาบาล),3=Return of Spontaneous Circulation ROSC (กลับมามีสัญญาณชีพ)]', 'trim|required|is_natural');
		$frm->set_rules('cpr_output', 'ผลลัพธ์การ CPR[1=ทุเลา,2=คงเดิม,3=เสียชีวิต ณ จุดเกิดเหตุ,4=เสียชีวิตขณะนำส่งโรงพยาบาล]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('rosc_time_save');
			$message .= form_error('cpr');
			$message .= form_error('time_cpr_start');
			$message .= form_error('time_cpr_end');
			$message .= form_error('rosc_time_alert');
			$message .= form_error('rta_have');
			$message .= form_error('cpr_rosc_nomal');
			$message .= form_error('use_defibrillator');
			$message .= form_error('ekg');
			$message .= form_error('defibrillations_number');
			$message .= form_error('airway_opening');
			$message .= form_error('airway_management');
			$message .= form_error('non_definite_airway');
			$message .= form_error('definite_airway');
			$message .= form_error('stop_bleeding');
			$message .= form_error('intravenous_fluid');
			$message .= form_error('intravenous_fluid_yes');
			$message .= form_error('intravenous_fluid_remark');
			$message .= form_error('drug');
			$message .= form_error('drag_yes');
			$message .= form_error('drug_remark');
			$message .= form_error('hkw_local');
			$message .= form_error('hkw_hospital');
			$message .= form_error('auto_cpr');
			$message .= form_error('auto_cpr_yes');
			$message .= form_error('course_resuscitation');
			$message .= form_error('cpr_output');
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

		$frm->set_rules('rosc_time_save', 'การบันทึกเวลา ROSC (การกลับมามีสัญญาณชีพ) ครั้งแรกเมื่อทีมปฏิบัติการแพทย์ฉุกเฉินไปถึง[1=ทำ,2=ไม่ทำ,3=ไม่ทราบเวลา]', 'trim|required|is_natural');
		$frm->set_rules('cpr', 'การทำ CPR ของทีมปฏิบัติการแพทย์ฉุกเฉิน[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('time_cpr_start', 'เวลาที่เริ่ม CPR ณ จุดเกิดเหตุ', 'trim|required');
		$frm->set_rules('time_cpr_end', 'เวลาที่สิ้นสุดการ CPR ณ จุดเกิดเหตุ', 'trim|required');
		$frm->set_rules('rosc_time_alert', 'การมี ROSC (การกลับมามีสัญญาณชีพ)[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('rta_have', 'มี[1=หลังจาก CPR โดยผู้พบเห็นเหตุการณ์,2=หลังจาก CPR โดยทีมปฏิบัติการแพทย์ฉุกเฉิน,3=หลังจากใช้ AED โดยผู้พบเห็นเหตุการณ์,4=หลังจากใช้ AED โดยทีมปฏิบัติการแพทย์ฉุกเฉิน,5=หลังจากทีมปฏิบัติการแพทย์ฉุกเฉินทำ Advanced  cardiac life support (การช่วยฟื้นคืนชีพระดับสูง)]', 'trim|required|is_natural');
		$frm->set_rules('cpr_rosc_nomal', 'การทำ CPR เพื่อให้ผู้ป่วยมีภาวะ ROSC คงที่[1=ณ จุดเกิดเหตุ,2=ณ จุดเกิดเหตุ - ทำต่อเนื่องในรถฉุกเฉิน,3=ณ จุดเกิดเหตุ – ทำต่อเนื่องในรถฉุกเฉิน - แผนกอุบัติเหตุและฉุกเฉินโรงพยาบาล]', 'trim|required|is_natural');
		$frm->set_rules('use_defibrillator', 'การใช้ Defibrillator[1=มี,2=ไม่มี]', 'trim|required|is_natural');
		$frm->set_rules('ekg', 'การประเมิน EKG หลังทำ CPR[1=Shockable rhythm (Pulseless Ventricular Fibrillation/ Ventricular Tachycardia),2= Non-shockable rhythm (Asystole / Pulseless Electrical Activity)]', 'trim|required|is_natural');
		$frm->set_rules('defibrillations_number', 'จำนวนครั้งการกระตุกหัวใจที่ได้รับ', 'trim|required|is_natural');
		$frm->set_rules('airway_opening', 'การเปิดทางเดินหายใจ[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('airway_management', 'การจัดการทางเดินหายใจและการช่วยหายใจ (เลือกได้มากกว่า 1 ข้อ) ', 'trim|callback_multiple_select[airway_management]');
		$frm->set_rules('non_definite_airway', 'Non-definite airway', 'trim|callback_multiple_select[non_definite_airway]');
		$frm->set_rules('definite_airway', 'Definite airway', 'trim|callback_multiple_select[definite_airway]');
		$frm->set_rules('stop_bleeding', 'การ Stop bleeding (การห้ามเลือด)[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('intravenous_fluid', 'การให้สารน้ำทางหลอดเลือดดำ[1=ไม่ให้,2=ให้ ระบุประเภท และ อัตราการไหลต่อชั่วโมง]', 'trim|required|is_natural');
		$frm->set_rules('intravenous_fluid_yes', 'ให้[1=9% Nacl,2=Acetar,3=Lactate ringer,4=อื่นๆ]', 'trim|required|is_natural');
		$frm->set_rules('intravenous_fluid_remark', 'อื่นๆ ระบุ', 'trim|required');
		$frm->set_rules('drug', 'การให้ยา[1=ไม่ให้,2=ให้ ระบุประเภท]', 'trim|required|is_natural');
		$frm->set_rules('drag_yes', 'ให้[1=Adrenaline,2=Atropine,3=Cordarone,4=อื่นๆ]', 'trim|required|is_natural');
		$frm->set_rules('drug_remark', 'อื่นๆ ระบุ', 'trim|required');
		$frm->set_rules('hkw_local', 'การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) ณ จุดเกิดเหตุ[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('hkw_hospital', 'การ Hypothermia/Keep warm (ลดอุณหภูมิกาย/ห่มผ้า) อย่างต่อเนื่องจนถึงโรงพยาบาล[1=ไม่ทำ,2=ทำ]', 'trim|required|is_natural');
		$frm->set_rules('auto_cpr', 'เครื่อง Auto CPR[1=ไม่มีเครื่อง Auto CPR,2=มีเครื่อง Auto CPR]	', 'trim|required|is_natural');
		$frm->set_rules('auto_cpr_yes', 'มีเครื่อง Auto CPR[1=ไม่ใช้,2=ใช้]', 'trim|required|is_natural');
		$frm->set_rules('course_resuscitation', 'สาเหตุการหยุด Resuscitation[1=Loss of Spontaneous Circulation LOSC (ไม่มีสัญญาณชีพกลับมา),2=Living will (หนังสือแสดงเจตนาปฏิเสธการรักษาพยาบาล),3=Return of Spontaneous Circulation ROSC (กลับมามีสัญญาณชีพ)]', 'trim|required|is_natural');
		$frm->set_rules('cpr_output', 'ผลลัพธ์การ CPR[1=ทุเลา,2=คงเดิม,3=เสียชีวิต ณ จุดเกิดเหตุ,4=เสียชีวิตขณะนำส่งโรงพยาบาล]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('rosc_time_save');
			$message .= form_error('cpr');
			$message .= form_error('time_cpr_start');
			$message .= form_error('time_cpr_end');
			$message .= form_error('rosc_time_alert');
			$message .= form_error('rta_have');
			$message .= form_error('cpr_rosc_nomal');
			$message .= form_error('use_defibrillator');
			$message .= form_error('ekg');
			$message .= form_error('defibrillations_number');
			$message .= form_error('airway_opening');
			$message .= form_error('airway_management');
			$message .= form_error('non_definite_airway');
			$message .= form_error('definite_airway');
			$message .= form_error('stop_bleeding');
			$message .= form_error('intravenous_fluid');
			$message .= form_error('intravenous_fluid_yes');
			$message .= form_error('intravenous_fluid_remark');
			$message .= form_error('drug');
			$message .= form_error('drag_yes');
			$message .= form_error('drug_remark');
			$message .= form_error('hkw_local');
			$message .= form_error('hkw_hospital');
			$message .= form_error('auto_cpr');
			$message .= form_error('auto_cpr_yes');
			$message .= form_error('course_resuscitation');
			$message .= form_error('cpr_output');
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
			$post['airway_management'] = implode(',', $post['airway_management']);
			$post['non_definite_airway'] = implode(',', $post['non_definite_airway']);
			$post['definite_airway'] = implode(',', $post['definite_airway']);
			$id = $this->Treatment_information->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Treatment_information->error_message;
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
			array('title' => 'การรักษาโดยทีมปฏิบัติการ', 'url' => site_url('services/treatment_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = $this->session->userdata('service_information_id');
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Treatment_information->load_edit_data($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/treatment_information/edit_view');
			}
		}
	}

	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Treatment_information', 'url' => site_url('services/treatment_information')),
			array('title' => 'บันทึกข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการบันทึกข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Treatment_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_service_information_id'] = $this->session->userdata('service_information_id');

				$this->setPreviewFormat($results);

				$this->render_view('services/treatment_information/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$treatment_information_id = ci_decrypt($data['encrypt_treatment_information_id']);
		if ($treatment_information_id == '') {
			$error .= '- รหัส treatment_information_id';
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

			$post['airway_management'] = implode(',', $post['airway_management']);
			$post['non_definite_airway'] = implode(',', $post['non_definite_airway']);
			$post['definite_airway'] = implode(',', $post['definite_airway']);
			$result = $this->Treatment_information->update($post);
			if ($result == false) {
				$message = $this->Treatment_information->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Treatment_information->error_message;
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
			$result = $this->Treatment_information->delete($post);
			if ($result == false) {
				$message = $this->Treatment_information->error_message;
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
			$pk1 = $data[$i]['treatment_information_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_treatment_information_id'] = $pk1;
			$data[$i]['preview_rosc_time_save'] = $this->setRoscTimeSaveSubject($data[$i]['rosc_time_save']);
			$data[$i]['preview_cpr'] = $this->setCprSubject($data[$i]['cpr']);
			$data[$i]['preview_rosc_time_alert'] = $this->setRoscTimeAlertSubject($data[$i]['rosc_time_alert']);
			$data[$i]['preview_rta_have'] = $this->setRtaHaveSubject($data[$i]['rta_have']);
			$data[$i]['preview_cpr_rosc_nomal'] = $this->setCprRoscNomalSubject($data[$i]['cpr_rosc_nomal']);
			$data[$i]['preview_use_defibrillator'] = $this->setUseDefibrillatorSubject($data[$i]['use_defibrillator']);
			$data[$i]['preview_ekg'] = $this->setEkgSubject($data[$i]['ekg']);
			$data[$i]['preview_airway_opening'] = $this->setAirwayOpeningSubject($data[$i]['airway_opening']);
			$data[$i]['preview_airway_management'] = $this->setAirwayManagementSubject($data[$i]['airway_management']);
			$data[$i]['preview_non_definite_airway'] = $this->setNonDefiniteAirwaySubject($data[$i]['non_definite_airway']);
			$data[$i]['preview_definite_airway'] = $this->setDefiniteAirwaySubject($data[$i]['definite_airway']);
			$data[$i]['preview_stop_bleeding'] = $this->setStopBleedingSubject($data[$i]['stop_bleeding']);
			$data[$i]['preview_intravenous_fluid'] = $this->setIntravenousFluidSubject($data[$i]['intravenous_fluid']);
			$data[$i]['preview_intravenous_fluid_yes'] = $this->setIntravenousFluidYesSubject($data[$i]['intravenous_fluid_yes']);
			$data[$i]['preview_drug'] = $this->setDrugSubject($data[$i]['drug']);
			$data[$i]['preview_drag_yes'] = $this->setDragYesSubject($data[$i]['drag_yes']);
			$data[$i]['preview_hkw_local'] = $this->setHkwLocalSubject($data[$i]['hkw_local']);
			$data[$i]['preview_hkw_hospital'] = $this->setHkwHospitalSubject($data[$i]['hkw_hospital']);
			$data[$i]['preview_auto_cpr'] = $this->setAutoCprSubject($data[$i]['auto_cpr']);
			$data[$i]['preview_auto_cpr_yes'] = $this->setAutoCprYesSubject($data[$i]['auto_cpr_yes']);
			$data[$i]['preview_course_resuscitation'] = $this->setCourseResuscitationSubject($data[$i]['course_resuscitation']);
			$data[$i]['preview_cpr_output'] = $this->setCprOutputSubject($data[$i]['cpr_output']);
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
	private function setRoscTimeSaveSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ทำ';
				break;
			case 2:
				$subject = 'ไม่ทำ';
				break;
			case 3:
				$subject = 'ไม่ทราบเวลา';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setCprSubject($value)
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
	private function setRoscTimeAlertSubject($value)
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
	private function setRtaHaveSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'หลังจาก CPR โดยผู้พบเห็นเหตุการณ์';
				break;
			case 2:
				$subject = 'หลังจาก CPR โดยทีมปฏิบัติการแพทย์ฉุกเฉิน';
				break;
			case 3:
				$subject = 'หลังจากใช้ AED โดยผู้พบเห็นเหตุการณ์';
				break;
			case 4:
				$subject = 'หลังจากใช้ AED โดยทีมปฏิบัติการแพทย์ฉุกเฉิน';
				break;
			case 5:
				$subject = 'หลังจากทีมปฏิบัติการแพทย์ฉุกเฉินทำ Advanced  cardiac life support (การช่วยฟื้นคืนชีพระดับสูง)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setCprRoscNomalSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ณ จุดเกิดเหตุ';
				break;
			case 2:
				$subject = 'ณ จุดเกิดเหตุ - ทำต่อเนื่องในรถฉุกเฉิน';
				break;
			case 3:
				$subject = 'ณ จุดเกิดเหตุ – ทำต่อเนื่องในรถฉุกเฉิน - แผนกอุบัติเหตุและฉุกเฉินโรงพยาบาล';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setUseDefibrillatorSubject($value)
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
	private function setEkgSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'Shockable rhythm (Pulseless Ventricular Fibrillation/ Ventricular Tachycardia)';
				break;
			case 2:
				$subject = 'Non-shockable rhythm (Asystole / Pulseless Electrical Activity)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setAirwayOpeningSubject($value)
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
	private function setAirwayManagementSubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  'Non-definite airway เลือกประเภท';
					break;
				case '2':
					$subject .= $comma .  'Definite airway เลือกประเภท';
					break;
				case '3':
					$subject .= $comma .  'Oxygen cannula/mask';
					break;
				case '4':
					$subject .= $comma .  'Bag-valve-mask ventilation';
					break;
				case '5':
					$subject .= $comma .  'อื่น ๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setNonDefiniteAirwaySubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  'การจัดท่า เช่น Head tilt Chin lift Jaw thrust maneuver';
					break;
				case '2':
					$subject .= $comma .  'Oral airway หรือ oropharyngeal airway (ท่อเปิดทางเดินหายใจทางปาก)';
					break;
				case '3':
					$subject .= $comma .  'Nasal airway หรือ nasopharyngeal airway (ท่อเปิดทางเดินหายใจทางจมูก)';
					break;
				case '4':
					$subject .= $comma .  'Laryngeal mask airway (LMA) หรือหน้ากากครอบกล่องเสียง เป็นอุปกรณ์ช่วยหายใจเหนือสายเสียง (Supraglottic airway device)';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDefiniteAirwaySubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  'Endotracheal tube (ใส่ท่อช่วยหายใจ)';
					break;
				case '2':
					$subject .= $comma .  'Nasotracheal tube (ใส่ท่อช่วยหายใจทางจมูก)';
					break;
				case '3':
					$subject .= $comma .  'Surgical airway (เช่น เจาะคอ)';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setStopBleedingSubject($value)
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
	private function setIntravenousFluidSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่ให้';
				break;
			case 2:
				$subject = 'ให้ ระบุประเภท และ อัตราการไหลต่อชั่วโมง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setIntravenousFluidYesSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = '9% Nacl';
				break;
			case 2:
				$subject = 'Acetar';
				break;
			case 3:
				$subject = 'Lactate ringer';
				break;
			case 4:
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDrugSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่ให้';
				break;
			case 2:
				$subject = 'ให้ ระบุประเภท';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDragYesSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'Adrenaline';
				break;
			case 2:
				$subject = 'Atropine';
				break;
			case 3:
				$subject = 'Cordarone';
				break;
			case 4:
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setHkwLocalSubject($value)
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
	private function setHkwHospitalSubject($value)
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
	private function setAutoCprSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่มีเครื่อง Auto CPR';
				break;
			case 2:
				$subject = 'มีเครื่อง Auto CPR';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setAutoCprYesSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ไม่ใช้';
				break;
			case 2:
				$subject = 'ใช้';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setCourseResuscitationSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'Loss of Spontaneous Circulation LOSC (ไม่มีสัญญาณชีพกลับมา)';
				break;
			case 2:
				$subject = 'Living will (หนังสือแสดงเจตนาปฏิเสธการรักษาพยาบาล)';
				break;
			case 3:
				$subject = 'Return of Spontaneous Circulation ROSC (กลับมามีสัญญาณชีพ)';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setCprOutputSubject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ทุเลา';
				break;
			case 2:
				$subject = 'คงเดิม';
				break;
			case 3:
				$subject = 'เสียชีวิต ณ จุดเกิดเหตุ';
				break;
			case 4:
				$subject = 'เสียชีวิตขณะนำส่งโรงพยาบาล';
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

		$pk1 = $data['treatment_information_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_treatment_information_id'] = $pk1;

		$this->data['record_treatment_information_id'] = $data['treatment_information_id'];
		$this->data['record_service_information_id'] = $data['service_information_id'];
		$this->data['preview_rosc_time_save'] = $this->setRoscTimeSaveSubject($data['rosc_time_save']);
		$this->data['record_rosc_time_save'] = $data['rosc_time_save'];
		$this->data['preview_cpr'] = $this->setCprSubject($data['cpr']);
		$this->data['record_cpr'] = $data['cpr'];
		$this->data['record_time_cpr_start'] = $data['time_cpr_start'];
		$this->data['record_time_cpr_end'] = $data['time_cpr_end'];
		$this->data['preview_rosc_time_alert'] = $this->setRoscTimeAlertSubject($data['rosc_time_alert']);
		$this->data['record_rosc_time_alert'] = $data['rosc_time_alert'];
		$this->data['preview_rta_have'] = $this->setRtaHaveSubject($data['rta_have']);
		$this->data['record_rta_have'] = $data['rta_have'];
		$this->data['preview_cpr_rosc_nomal'] = $this->setCprRoscNomalSubject($data['cpr_rosc_nomal']);
		$this->data['record_cpr_rosc_nomal'] = $data['cpr_rosc_nomal'];
		$this->data['preview_use_defibrillator'] = $this->setUseDefibrillatorSubject($data['use_defibrillator']);
		$this->data['record_use_defibrillator'] = $data['use_defibrillator'];
		$this->data['preview_ekg'] = $this->setEkgSubject($data['ekg']);
		$this->data['record_ekg'] = $data['ekg'];
		$this->data['record_defibrillations_number'] = $data['defibrillations_number'];
		$this->data['preview_airway_opening'] = $this->setAirwayOpeningSubject($data['airway_opening']);
		$this->data['record_airway_opening'] = $data['airway_opening'];
		$this->data['preview_airway_management'] = $this->setAirwayManagementSubject($data['airway_management']);
		$this->data['record_airway_management'] = $data['airway_management'];
		$this->data['preview_non_definite_airway'] = $this->setNonDefiniteAirwaySubject($data['non_definite_airway']);
		$this->data['record_non_definite_airway'] = $data['non_definite_airway'];
		$this->data['preview_definite_airway'] = $this->setDefiniteAirwaySubject($data['definite_airway']);
		$this->data['record_definite_airway'] = $data['definite_airway'];
		$this->data['preview_stop_bleeding'] = $this->setStopBleedingSubject($data['stop_bleeding']);
		$this->data['record_stop_bleeding'] = $data['stop_bleeding'];
		$this->data['preview_intravenous_fluid'] = $this->setIntravenousFluidSubject($data['intravenous_fluid']);
		$this->data['record_intravenous_fluid'] = $data['intravenous_fluid'];
		$this->data['preview_intravenous_fluid_yes'] = $this->setIntravenousFluidYesSubject($data['intravenous_fluid_yes']);
		$this->data['record_intravenous_fluid_yes'] = $data['intravenous_fluid_yes'];
		$this->data['record_intravenous_fluid_remark'] = $data['intravenous_fluid_remark'];
		$this->data['preview_drug'] = $this->setDrugSubject($data['drug']);
		$this->data['record_drug'] = $data['drug'];
		$this->data['preview_drag_yes'] = $this->setDragYesSubject($data['drag_yes']);
		$this->data['record_drag_yes'] = $data['drag_yes'];
		$this->data['record_drug_remark'] = $data['drug_remark'];
		$this->data['preview_hkw_local'] = $this->setHkwLocalSubject($data['hkw_local']);
		$this->data['record_hkw_local'] = $data['hkw_local'];
		$this->data['preview_hkw_hospital'] = $this->setHkwHospitalSubject($data['hkw_hospital']);
		$this->data['record_hkw_hospital'] = $data['hkw_hospital'];
		$this->data['preview_auto_cpr'] = $this->setAutoCprSubject($data['auto_cpr']);
		$this->data['record_auto_cpr'] = $data['auto_cpr'];
		$this->data['preview_auto_cpr_yes'] = $this->setAutoCprYesSubject($data['auto_cpr_yes']);
		$this->data['record_auto_cpr_yes'] = $data['auto_cpr_yes'];
		$this->data['preview_course_resuscitation'] = $this->setCourseResuscitationSubject($data['course_resuscitation']);
		$this->data['record_course_resuscitation'] = $data['course_resuscitation'];
		$this->data['preview_cpr_output'] = $this->setCprOutputSubject($data['cpr_output']);
		$this->data['record_cpr_output'] = $data['cpr_output'];
	}
}
/*---------------------------- END Controller Class --------------------------------*/
