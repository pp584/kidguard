<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Risk_behavior.php ]
 */
class Risk_behavior extends CRUD_Controller
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
		$this->load->model('risk_behavior/Risk_behavior_model', 'Risk_behavior');
		$this->Risk_behavior->session_name = 'risk_behavior_risk_behavior';

		$this->data['page_url'] = site_url('risk_behavior/risk_behavior');
		
		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/risk_behavior/risk_behavior.js?ft='. filemtime('assets/js_modules/risk_behavior/risk_behavior.js');
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
		$this->session->unset_userdata($this->Risk_behavior->session_name . '_search_field');
		$this->session->unset_userdata($this->Risk_behavior->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Risk_behavior', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Risk_behavior->session_name . '_search_field' => $search_field, $this->Risk_behavior->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Risk_behavior->session_name . '_search_field');
			$value = $this->session->userdata($this->Risk_behavior->session_name . '_value');
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
			$this->Risk_behavior->order_field = $field;
			$this->Risk_behavior->order_sort = $sort;
		}
		$results = $this->Risk_behavior->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('risk_behavior/risk_behavior');
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

		$this->render_view('risk_behavior/risk_behavior/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Risk_behavior', 'url' => site_url('risk_behavior/risk_behavior')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Risk_behavior->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('risk_behavior/risk_behavior/preview_view');
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
						array('title' => 'Risk_behavior', 'url' => site_url('risk_behavior/risk_behavior')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->render_view('risk_behavior/risk_behavior/add_view');
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

		$frm->set_rules('basic_information_id', 'basic_information_id', 'trim|required|is_natural');
		$frm->set_rules('question1', 'ฉันเป็นคนมีสาระ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question2', 'ฉันไม่คิดก่อนพูด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question3', 'ฉันชอบความโลดโผนท้าทาย เช่น แข่งรถ ปีนเขา กระโดดร่ม[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question4', 'ฉันรู้สึกมีความสุขในชีวิต[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question5', 'เมื่อเหตุการณ์ผ่านไปแล้ว ฉันได้แต่เสียใจในการกระทำของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question6', 'ฉันมีประสบการณ์ที่ตื่นเต้นและท้าทาย[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question7', 'ฉันได้วางแผนเกี่ยวกับอนาคตตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question8', 'ฉันรู้สึกวิตกกังวลจนปวดศีรษะ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question9', 'ฉันรู้สึกกังวลในการทำบางสิ่ง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question10', 'ฉันมีความกล้าที่จะเปลี่ยนแปลงชีวิตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question11', 'ฉันทำอะไรโดยไม่คิด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question12', 'ฉันชอบการขับมอเตอร์ไซค์ด้วยความเร็วสูง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question13', 'ฉันมีความภาคภูมิใจในตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question14', 'ฉันเป็นคนขี้กลัว  เวลาจะทำอะไรมักจะวิตกกังวล[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question15', 'ฉันเป็นคนหุนหันพลันแล่น[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question16', 'ฉันชอบทำกิจกรรมที่มีความตื่นเต้นท้าทายโดยเฉพาะการกระทำที่ฝ่าฝืนกฎ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question17', 'ฉันรู้สึกว่าฉันล้มเหลวในชีวิต ทำอะไรก็ไม่สำเร็จ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question18', 'ฉันใช้อารมณ์มากกว่าเหตุผล[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question19', 'ฉันมีความสุขในการรุกรานพื้นที่ของผู้อื่น[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question20', 'ฉันมีความพอใจในชีวิตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question21', 'ฉันกลัวที่จะต้องทำสิ่งใดสิ่งหนึ่ง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question22', 'ฉันต้องการความเปลี่ยนแปลงในสิ่งใหม่อยู่เสมอ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question23', 'ฉันมีความกระตือรือร้นต่ออนาคตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('basic_information_id');
			$message .= form_error('question1');
			$message .= form_error('question2');
			$message .= form_error('question3');
			$message .= form_error('question4');
			$message .= form_error('question5');
			$message .= form_error('question6');
			$message .= form_error('question7');
			$message .= form_error('question8');
			$message .= form_error('question9');
			$message .= form_error('question10');
			$message .= form_error('question11');
			$message .= form_error('question12');
			$message .= form_error('question13');
			$message .= form_error('question14');
			$message .= form_error('question15');
			$message .= form_error('question16');
			$message .= form_error('question17');
			$message .= form_error('question18');
			$message .= form_error('question19');
			$message .= form_error('question20');
			$message .= form_error('question21');
			$message .= form_error('question22');
			$message .= form_error('question23');
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

		$frm->set_rules('basic_information_id', 'basic_information_id', 'trim|required|is_natural');
		$frm->set_rules('question1', 'ฉันเป็นคนมีสาระ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question2', 'ฉันไม่คิดก่อนพูด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question3', 'ฉันชอบความโลดโผนท้าทาย เช่น แข่งรถ ปีนเขา กระโดดร่ม[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question4', 'ฉันรู้สึกมีความสุขในชีวิต[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question5', 'เมื่อเหตุการณ์ผ่านไปแล้ว ฉันได้แต่เสียใจในการกระทำของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question6', 'ฉันมีประสบการณ์ที่ตื่นเต้นและท้าทาย[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question7', 'ฉันได้วางแผนเกี่ยวกับอนาคตตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question8', 'ฉันรู้สึกวิตกกังวลจนปวดศีรษะ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question9', 'ฉันรู้สึกกังวลในการทำบางสิ่ง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question10', 'ฉันมีความกล้าที่จะเปลี่ยนแปลงชีวิตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question11', 'ฉันทำอะไรโดยไม่คิด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question12', 'ฉันชอบการขับมอเตอร์ไซค์ด้วยความเร็วสูง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question13', 'ฉันมีความภาคภูมิใจในตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question14', 'ฉันเป็นคนขี้กลัว  เวลาจะทำอะไรมักจะวิตกกังวล[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question15', 'ฉันเป็นคนหุนหันพลันแล่น[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question16', 'ฉันชอบทำกิจกรรมที่มีความตื่นเต้นท้าทายโดยเฉพาะการกระทำที่ฝ่าฝืนกฎ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question17', 'ฉันรู้สึกว่าฉันล้มเหลวในชีวิต ทำอะไรก็ไม่สำเร็จ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question18', 'ฉันใช้อารมณ์มากกว่าเหตุผล[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question19', 'ฉันมีความสุขในการรุกรานพื้นที่ของผู้อื่น[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question20', 'ฉันมีความพอใจในชีวิตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question21', 'ฉันกลัวที่จะต้องทำสิ่งใดสิ่งหนึ่ง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question22', 'ฉันต้องการความเปลี่ยนแปลงในสิ่งใหม่อยู่เสมอ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question23', 'ฉันมีความกระตือรือร้นต่ออนาคตของตนเอง[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('basic_information_id');
			$message .= form_error('question1');
			$message .= form_error('question2');
			$message .= form_error('question3');
			$message .= form_error('question4');
			$message .= form_error('question5');
			$message .= form_error('question6');
			$message .= form_error('question7');
			$message .= form_error('question8');
			$message .= form_error('question9');
			$message .= form_error('question10');
			$message .= form_error('question11');
			$message .= form_error('question12');
			$message .= form_error('question13');
			$message .= form_error('question14');
			$message .= form_error('question15');
			$message .= form_error('question16');
			$message .= form_error('question17');
			$message .= form_error('question18');
			$message .= form_error('question19');
			$message .= form_error('question20');
			$message .= form_error('question21');
			$message .= form_error('question22');
			$message .= form_error('question23');
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
			$id = $this->Risk_behavior->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Risk_behavior->error_message;
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
						array('title' => 'Risk_behavior', 'url' => site_url('risk_behavior/risk_behavior')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Risk_behavior->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->render_view('risk_behavior/risk_behavior/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$risk_behavior_id = ci_decrypt($data['encrypt_risk_behavior_id']);
		if($risk_behavior_id==''){
			$error .= '- รหัส risk_behavior_id';
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

			$result = $this->Risk_behavior->update($post);
			if($result == false){
				$message = $this->Risk_behavior->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Risk_behavior->error_message;
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
			$result = $this->Risk_behavior->delete($post);
			if($result == false){
				$message = $this->Risk_behavior->error_message;
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
			$pk1 = $data[$i]['risk_behavior_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_risk_behavior_id'] = $pk1;
			$data[$i]['preview_question1'] = $this->setQuestion1Subject($data[$i]['question1']);
			$data[$i]['preview_question2'] = $this->setQuestion2Subject($data[$i]['question2']);
			$data[$i]['preview_question3'] = $this->setQuestion3Subject($data[$i]['question3']);
			$data[$i]['preview_question4'] = $this->setQuestion4Subject($data[$i]['question4']);
			$data[$i]['preview_question5'] = $this->setQuestion5Subject($data[$i]['question5']);
			$data[$i]['preview_question6'] = $this->setQuestion6Subject($data[$i]['question6']);
			$data[$i]['preview_question7'] = $this->setQuestion7Subject($data[$i]['question7']);
			$data[$i]['preview_question8'] = $this->setQuestion8Subject($data[$i]['question8']);
			$data[$i]['preview_question9'] = $this->setQuestion9Subject($data[$i]['question9']);
			$data[$i]['preview_question10'] = $this->setQuestion10Subject($data[$i]['question10']);
			$data[$i]['preview_question11'] = $this->setQuestion11Subject($data[$i]['question11']);
			$data[$i]['preview_question12'] = $this->setQuestion12Subject($data[$i]['question12']);
			$data[$i]['preview_question13'] = $this->setQuestion13Subject($data[$i]['question13']);
			$data[$i]['preview_question14'] = $this->setQuestion14Subject($data[$i]['question14']);
			$data[$i]['preview_question15'] = $this->setQuestion15Subject($data[$i]['question15']);
			$data[$i]['preview_question16'] = $this->setQuestion16Subject($data[$i]['question16']);
			$data[$i]['preview_question17'] = $this->setQuestion17Subject($data[$i]['question17']);
			$data[$i]['preview_question18'] = $this->setQuestion18Subject($data[$i]['question18']);
			$data[$i]['preview_question19'] = $this->setQuestion19Subject($data[$i]['question19']);
			$data[$i]['preview_question20'] = $this->setQuestion20Subject($data[$i]['question20']);
			$data[$i]['preview_question21'] = $this->setQuestion21Subject($data[$i]['question21']);
			$data[$i]['preview_question22'] = $this->setQuestion22Subject($data[$i]['question22']);
			$data[$i]['preview_question23'] = $this->setQuestion23Subject($data[$i]['question23']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion1Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion2Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion3Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion4Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion5Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion6Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion7Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion8Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion9Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion10Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion11Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion12Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion13Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion14Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion15Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion16Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion17Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion18Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion19Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion20Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion21Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion22Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion23Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่จริง';
				break;
			case 2:
				$subject = 'ค่อนข้างไม่จริง';
				break;
			case 3:
				$subject = 'ค่อนข้างจริง';
				break;
			case 4:
				$subject = 'จริง';
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

		$pk1 = $data['risk_behavior_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_risk_behavior_id'] = $pk1;

		$this->data['record_risk_behavior_id'] = $data['risk_behavior_id'];
		$this->data['record_basic_information_id'] = $data['basic_information_id'];
		$this->data['preview_question1'] = $this->setQuestion1Subject($data['question1']);
		$this->data['record_question1'] = $data['question1'];
		$this->data['preview_question2'] = $this->setQuestion2Subject($data['question2']);
		$this->data['record_question2'] = $data['question2'];
		$this->data['preview_question3'] = $this->setQuestion3Subject($data['question3']);
		$this->data['record_question3'] = $data['question3'];
		$this->data['preview_question4'] = $this->setQuestion4Subject($data['question4']);
		$this->data['record_question4'] = $data['question4'];
		$this->data['preview_question5'] = $this->setQuestion5Subject($data['question5']);
		$this->data['record_question5'] = $data['question5'];
		$this->data['preview_question6'] = $this->setQuestion6Subject($data['question6']);
		$this->data['record_question6'] = $data['question6'];
		$this->data['preview_question7'] = $this->setQuestion7Subject($data['question7']);
		$this->data['record_question7'] = $data['question7'];
		$this->data['preview_question8'] = $this->setQuestion8Subject($data['question8']);
		$this->data['record_question8'] = $data['question8'];
		$this->data['preview_question9'] = $this->setQuestion9Subject($data['question9']);
		$this->data['record_question9'] = $data['question9'];
		$this->data['preview_question10'] = $this->setQuestion10Subject($data['question10']);
		$this->data['record_question10'] = $data['question10'];
		$this->data['preview_question11'] = $this->setQuestion11Subject($data['question11']);
		$this->data['record_question11'] = $data['question11'];
		$this->data['preview_question12'] = $this->setQuestion12Subject($data['question12']);
		$this->data['record_question12'] = $data['question12'];
		$this->data['preview_question13'] = $this->setQuestion13Subject($data['question13']);
		$this->data['record_question13'] = $data['question13'];
		$this->data['preview_question14'] = $this->setQuestion14Subject($data['question14']);
		$this->data['record_question14'] = $data['question14'];
		$this->data['preview_question15'] = $this->setQuestion15Subject($data['question15']);
		$this->data['record_question15'] = $data['question15'];
		$this->data['preview_question16'] = $this->setQuestion16Subject($data['question16']);
		$this->data['record_question16'] = $data['question16'];
		$this->data['preview_question17'] = $this->setQuestion17Subject($data['question17']);
		$this->data['record_question17'] = $data['question17'];
		$this->data['preview_question18'] = $this->setQuestion18Subject($data['question18']);
		$this->data['record_question18'] = $data['question18'];
		$this->data['preview_question19'] = $this->setQuestion19Subject($data['question19']);
		$this->data['record_question19'] = $data['question19'];
		$this->data['preview_question20'] = $this->setQuestion20Subject($data['question20']);
		$this->data['record_question20'] = $data['question20'];
		$this->data['preview_question21'] = $this->setQuestion21Subject($data['question21']);
		$this->data['record_question21'] = $data['question21'];
		$this->data['preview_question22'] = $this->setQuestion22Subject($data['question22']);
		$this->data['record_question22'] = $data['question22'];
		$this->data['preview_question23'] = $this->setQuestion23Subject($data['question23']);
		$this->data['record_question23'] = $data['question23'];


	}
}
/*---------------------------- END Controller Class --------------------------------*/
