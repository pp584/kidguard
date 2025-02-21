<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Immune_factor.php ]
 */
class Immune_factor extends CRUD_Controller
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
		$this->load->model('Immune_factor/Immune_factor_model', 'Immune_factor');
		$this->Immune_factor->session_name = 'immune_factor_immune_factor';

		$this->data['page_url'] = site_url('immune_factor/immune_factor');
		
		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/Immune_factor/immune_factor.js?ft='. filemtime('assets/js_modules/Immune_factor/immune_factor.js');
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
		$this->session->unset_userdata($this->Immune_factor->session_name . '_search_field');
		$this->session->unset_userdata($this->Immune_factor->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Immune_factor', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Immune_factor->session_name . '_search_field' => $search_field, $this->Immune_factor->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Immune_factor->session_name . '_search_field');
			$value = $this->session->userdata($this->Immune_factor->session_name . '_value');
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
			$this->Immune_factor->order_field = $field;
			$this->Immune_factor->order_sort = $sort;
		}
		$results = $this->Immune_factor->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('immune_factor/immune_factor');
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

		$this->render_view('immune_factor/immune_factor/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Immune_factor', 'url' => site_url('immune_factor/immune_factor')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Immune_factor->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('immune_factor/immune_factor/preview_view');
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
						array('title' => 'Immune_factor', 'url' => site_url('immune_factor/immune_factor')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->render_view('immune_factor/immune_factor/add_view');
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

		$frm->set_rules('question1', 'ฉันเริ่มทำกิจกรรมหรืองานต่าง ๆ ได้ด้วยตนเอง[1=ไม่เคย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question2', 'ฉันเริ่มทำกิจวัตรประจำวัน โดยไม่ต้องให้ใครมาบอก[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question3', 'ฉันมักผัดวันประกันพรุ่ง ในการเริ่มต้นกระทำกิจกรรมต่าง ๆ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question4', 'ฉันเริ่มคิดทำการบ้านหรืองานต่าง ๆ ในนาทีสุดท้าย[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question5', 'ฉันไม่รู้ว่าจะเริ่มต้นทำงานต่าง ๆ ด้วยตนเองได้อย่างไร[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question6', 'ฉันมีคนคอยเตือนให้ลงมือทำงานต่าง ๆ [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question7', 'เมื่อได้รับการสั่งงานหลาย ๆ อย่าง ฉันจำได้เพียงบางอย่าง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question8', 'ฉันจำรายละเอียดสำคัญในขณะนำเสนองานหน้าชั้นได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question9', 'ฉันสามารถเล่าเหตุการณ์ที่เกิดขึ้นเมื่อวานนี้ให้เพื่อนฟังได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question10', 'ฉันมีปัญหาการจำ แม้ในช่วงเวลาสั้น ๆ (เช่น ทิศทาง, เบอร์โทรศัพท์)[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question11', 'ฉันจำขั้นตอนการทำงานที่ซับซ้อนได้ [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question12', 'ฉันตอบคำถามในหัวข้อที่อาจารย์เคยสอนได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question13', 'ฉันลืมสิ่งที่จะต้องทำในลำดับต่อไป[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question14', 'ฉันถูกเบี่ยงเบนความสนใจได้ง่าย  ในขณะทำกิจกรรม[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question15', 'ฉันจดจ่ออยู่กับกิจกรรมหรืองานที่ทำ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question16', 'ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question17', 'ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question18', 'ฉันเปลี่ยนไปคุยหัวข้อใหม่ ทั้ง ๆ ที่ยังคุยหัวข้อเดิมไม่เสร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question19', 'ฉันมักหาสิ่งของที่ต้องการใช้ไม่เจอ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question20', 'ฉันกำหนดหัวข้อและเรียงลำดับความสำคัญของเนื้อหา ก่อนลงมือทำรายงาน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question21', 'ฉันจัดลำดับความสำคัญของงานที่จะทำได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question22', 'การกำหนดขั้นตอนการทำงานไว้ล่วงหน้า เป็นเรื่องที่ยากสำหรับฉัน [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question23', 'ฉันกำหนดเป้าหมายการทำงานไว้อย่างชัดเจน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question24', 'ฉันตรวจทานความถูกต้องของงาน ก่อนนำส่งอาจารย์[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question25', 'ฉันรู้และปรับแก้ข้อผิดพลาดในงานของฉัน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question26', 'ฉันรู้ข้อผิดพลาดของงาน และปรับแก้ด้วยตนเอง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question27', 'ฉันติดตามผลการปรับปรุงงานของตนเอง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question28', 'ฉันตรวจสอบการปฏิบัติกิจกรรมให้เป็นไปตามแผนที่วางไว้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question29', 'ฉันรู้สึกหงุดหงิด หากต้องเปลี่ยนไปทำกิจกรรมอย่างอื่นที่ไม่ได้กำหนดไว้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question30', 'ฉันกังวลที่จะต้องทำกิจกรรมที่แปลกใหม่และท้าทาย[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question31', 'ฉันยอมรับการเปลี่ยนแปลงที่เกิดขึ้นในชีวิตประจำวันได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question32', 'ฉันยึดติดกับปัญหาใดปัญหาหนึ่งเป็นเวลานานมากเกินไป[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question33', 'ฉันรู้สึกรำคาญ เมื่อเพื่อนยืมใช้ของส่วนตัว[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question34', 'ฉันยินดีรับฟังข้อเสนอแนะในสิ่งที่ฉันทำผิดพลาด[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question35', 'เวลาประสบปัญหาเล็ก ๆ น้อย ๆ  ฉันแสดงออกทางอารมณ์มากเกินไป [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]  ', 'trim|required|is_natural');
		$frm->set_rules('question36', 'ฉันปรับอารมณ์เข้ากับสถานการณ์ที่ไม่พึงประสงค์ได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question37', 'ฉันเอะอะ โวยวาย เมื่อไม่ได้ดั่งใจ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question38', 'ฉันใช้เวลาเล่นโทรศัพท์มือถือมากเกินไป โดยไม่ได้นึกถึงผลเสียที่จะเกิดตามมา[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question39', 'ฉันทำกิจกรรมที่เสี่ยงอันตราย แม้จะถูกตักเตือนแล้ว[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question40', 'ฉันปฏิเสธเมื่อเพื่อนชวนให้ลองดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question41', 'ฉันคิดไตร่ตรองอย่างรอบคอบ ก่อนลงมือกระทำกิจกรรมต่าง ๆ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question42', 'ฉันไม่พูดคุยกับเพื่อนในระหว่างงานพิธีการของโรงเรียน/ชุมชน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question43', 'ก่อนลงมือทำกิจกรรม ฉันคิดถึงอันตรายที่อาจจะเกิดขึ้นได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question44', 'ฉันตั้งใจทำงานที่ได้รับมอบหมายจนเสร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question45', 'ฉันไม่ย่อท้อในการทำงาน แม้จะมีปัญหาและอุปสรรค[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question46', 'ฉันตั้งใจและลงมือกระทำกิจกรรมหรืองานต่าง ๆ ด้วยความมุ่งมั่น อดทน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question47', 'ฉันพยายามหาข้อมูลมาสนับสนุนในการทำโครงงานจนประสบความสำเร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question48', 'เมื่อประสบกับปัญหาและอุปสรรค ฉันจะยกเลิกการทำงานนั้นทันที[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
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
			$message .= form_error('question24');
			$message .= form_error('question25');
			$message .= form_error('question26');
			$message .= form_error('question27');
			$message .= form_error('question28');
			$message .= form_error('question29');
			$message .= form_error('question30');
			$message .= form_error('question31');
			$message .= form_error('question32');
			$message .= form_error('question33');
			$message .= form_error('question34');
			$message .= form_error('question35');
			$message .= form_error('question36');
			$message .= form_error('question37');
			$message .= form_error('question38');
			$message .= form_error('question39');
			$message .= form_error('question40');
			$message .= form_error('question41');
			$message .= form_error('question42');
			$message .= form_error('question43');
			$message .= form_error('question44');
			$message .= form_error('question45');
			$message .= form_error('question46');
			$message .= form_error('question47');
			$message .= form_error('question48');
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

		$frm->set_rules('question1', 'ฉันเริ่มทำกิจกรรมหรืองานต่าง ๆ ได้ด้วยตนเอง[1=ไม่เคย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question2', 'ฉันเริ่มทำกิจวัตรประจำวัน โดยไม่ต้องให้ใครมาบอก[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question3', 'ฉันมักผัดวันประกันพรุ่ง ในการเริ่มต้นกระทำกิจกรรมต่าง ๆ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question4', 'ฉันเริ่มคิดทำการบ้านหรืองานต่าง ๆ ในนาทีสุดท้าย[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question5', 'ฉันไม่รู้ว่าจะเริ่มต้นทำงานต่าง ๆ ด้วยตนเองได้อย่างไร[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question6', 'ฉันมีคนคอยเตือนให้ลงมือทำงานต่าง ๆ [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question7', 'เมื่อได้รับการสั่งงานหลาย ๆ อย่าง ฉันจำได้เพียงบางอย่าง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question8', 'ฉันจำรายละเอียดสำคัญในขณะนำเสนองานหน้าชั้นได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question9', 'ฉันสามารถเล่าเหตุการณ์ที่เกิดขึ้นเมื่อวานนี้ให้เพื่อนฟังได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question10', 'ฉันมีปัญหาการจำ แม้ในช่วงเวลาสั้น ๆ (เช่น ทิศทาง, เบอร์โทรศัพท์)[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question11', 'ฉันจำขั้นตอนการทำงานที่ซับซ้อนได้ [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question12', 'ฉันตอบคำถามในหัวข้อที่อาจารย์เคยสอนได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question13', 'ฉันลืมสิ่งที่จะต้องทำในลำดับต่อไป[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question14', 'ฉันถูกเบี่ยงเบนความสนใจได้ง่าย  ในขณะทำกิจกรรม[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question15', 'ฉันจดจ่ออยู่กับกิจกรรมหรืองานที่ทำ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question16', 'ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question17', 'ขณะทำกิจกรรม ฉันไม่วอกแวกไปตามสิ่งที่มารบกวน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question18', 'ฉันเปลี่ยนไปคุยหัวข้อใหม่ ทั้ง ๆ ที่ยังคุยหัวข้อเดิมไม่เสร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question19', 'ฉันมักหาสิ่งของที่ต้องการใช้ไม่เจอ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question20', 'ฉันกำหนดหัวข้อและเรียงลำดับความสำคัญของเนื้อหา ก่อนลงมือทำรายงาน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question21', 'ฉันจัดลำดับความสำคัญของงานที่จะทำได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question22', 'การกำหนดขั้นตอนการทำงานไว้ล่วงหน้า เป็นเรื่องที่ยากสำหรับฉัน [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question23', 'ฉันกำหนดเป้าหมายการทำงานไว้อย่างชัดเจน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question24', 'ฉันตรวจทานความถูกต้องของงาน ก่อนนำส่งอาจารย์[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question25', 'ฉันรู้และปรับแก้ข้อผิดพลาดในงานของฉัน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question26', 'ฉันรู้ข้อผิดพลาดของงาน และปรับแก้ด้วยตนเอง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question27', 'ฉันติดตามผลการปรับปรุงงานของตนเอง[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question28', 'ฉันตรวจสอบการปฏิบัติกิจกรรมให้เป็นไปตามแผนที่วางไว้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question29', 'ฉันรู้สึกหงุดหงิด หากต้องเปลี่ยนไปทำกิจกรรมอย่างอื่นที่ไม่ได้กำหนดไว้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question30', 'ฉันกังวลที่จะต้องทำกิจกรรมที่แปลกใหม่และท้าทาย[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question31', 'ฉันยอมรับการเปลี่ยนแปลงที่เกิดขึ้นในชีวิตประจำวันได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question32', 'ฉันยึดติดกับปัญหาใดปัญหาหนึ่งเป็นเวลานานมากเกินไป[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question33', 'ฉันรู้สึกรำคาญ เมื่อเพื่อนยืมใช้ของส่วนตัว[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question34', 'ฉันยินดีรับฟังข้อเสนอแนะในสิ่งที่ฉันทำผิดพลาด[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question35', 'เวลาประสบปัญหาเล็ก ๆ น้อย ๆ  ฉันแสดงออกทางอารมณ์มากเกินไป [1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]  ', 'trim|required|is_natural');
		$frm->set_rules('question36', 'ฉันปรับอารมณ์เข้ากับสถานการณ์ที่ไม่พึงประสงค์ได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question37', 'ฉันเอะอะ โวยวาย เมื่อไม่ได้ดั่งใจ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question38', 'ฉันใช้เวลาเล่นโทรศัพท์มือถือมากเกินไป โดยไม่ได้นึกถึงผลเสียที่จะเกิดตามมา[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question39', 'ฉันทำกิจกรรมที่เสี่ยงอันตราย แม้จะถูกตักเตือนแล้ว[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question40', 'ฉันปฏิเสธเมื่อเพื่อนชวนให้ลองดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question41', 'ฉันคิดไตร่ตรองอย่างรอบคอบ ก่อนลงมือกระทำกิจกรรมต่าง ๆ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question42', 'ฉันไม่พูดคุยกับเพื่อนในระหว่างงานพิธีการของโรงเรียน/ชุมชน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question43', 'ก่อนลงมือทำกิจกรรม ฉันคิดถึงอันตรายที่อาจจะเกิดขึ้นได้[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question44', 'ฉันตั้งใจทำงานที่ได้รับมอบหมายจนเสร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question45', 'ฉันไม่ย่อท้อในการทำงาน แม้จะมีปัญหาและอุปสรรค[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question46', 'ฉันตั้งใจและลงมือกระทำกิจกรรมหรืองานต่าง ๆ ด้วยความมุ่งมั่น อดทน[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question47', 'ฉันพยายามหาข้อมูลมาสนับสนุนในการทำโครงงานจนประสบความสำเร็จ[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question48', 'เมื่อประสบกับปัญหาและอุปสรรค ฉันจะยกเลิกการทำงานนั้นทันที[1=ไม่เลย,2=บางครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
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
			$message .= form_error('question24');
			$message .= form_error('question25');
			$message .= form_error('question26');
			$message .= form_error('question27');
			$message .= form_error('question28');
			$message .= form_error('question29');
			$message .= form_error('question30');
			$message .= form_error('question31');
			$message .= form_error('question32');
			$message .= form_error('question33');
			$message .= form_error('question34');
			$message .= form_error('question35');
			$message .= form_error('question36');
			$message .= form_error('question37');
			$message .= form_error('question38');
			$message .= form_error('question39');
			$message .= form_error('question40');
			$message .= form_error('question41');
			$message .= form_error('question42');
			$message .= form_error('question43');
			$message .= form_error('question44');
			$message .= form_error('question45');
			$message .= form_error('question46');
			$message .= form_error('question47');
			$message .= form_error('question48');
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
			$id = $this->Immune_factor->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Immune_factor->error_message;
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
						array('title' => 'Immune_factor', 'url' => site_url('immune_factor/immune_factor')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Immune_factor->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->render_view('immune_factor/immune_factor/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$immune_factor_id = ci_decrypt($data['encrypt_immune_factor_id']);
		if($immune_factor_id==''){
			$error .= '- รหัส immune_factor_id';
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

			$result = $this->Immune_factor->update($post);
			if($result == false){
				$message = $this->Immune_factor->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Immune_factor->error_message;
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
			$result = $this->Immune_factor->delete($post);
			if($result == false){
				$message = $this->Immune_factor->error_message;
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
			$pk1 = $data[$i]['immune_factor_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_immune_factor_id'] = $pk1;
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
			$data[$i]['preview_question24'] = $this->setQuestion24Subject($data[$i]['question24']);
			$data[$i]['preview_question25'] = $this->setQuestion25Subject($data[$i]['question25']);
			$data[$i]['preview_question26'] = $this->setQuestion26Subject($data[$i]['question26']);
			$data[$i]['preview_question27'] = $this->setQuestion27Subject($data[$i]['question27']);
			$data[$i]['preview_question28'] = $this->setQuestion28Subject($data[$i]['question28']);
			$data[$i]['preview_question29'] = $this->setQuestion29Subject($data[$i]['question29']);
			$data[$i]['preview_question30'] = $this->setQuestion30Subject($data[$i]['question30']);
			$data[$i]['preview_question31'] = $this->setQuestion31Subject($data[$i]['question31']);
			$data[$i]['preview_question32'] = $this->setQuestion32Subject($data[$i]['question32']);
			$data[$i]['preview_question33'] = $this->setQuestion33Subject($data[$i]['question33']);
			$data[$i]['preview_question34'] = $this->setQuestion34Subject($data[$i]['question34']);
			$data[$i]['preview_question35'] = $this->setQuestion35Subject($data[$i]['question35']);
			$data[$i]['preview_question36'] = $this->setQuestion36Subject($data[$i]['question36']);
			$data[$i]['preview_question37'] = $this->setQuestion37Subject($data[$i]['question37']);
			$data[$i]['preview_question38'] = $this->setQuestion38Subject($data[$i]['question38']);
			$data[$i]['preview_question39'] = $this->setQuestion39Subject($data[$i]['question39']);
			$data[$i]['preview_question40'] = $this->setQuestion40Subject($data[$i]['question40']);
			$data[$i]['preview_question41'] = $this->setQuestion41Subject($data[$i]['question41']);
			$data[$i]['preview_question42'] = $this->setQuestion42Subject($data[$i]['question42']);
			$data[$i]['preview_question43'] = $this->setQuestion43Subject($data[$i]['question43']);
			$data[$i]['preview_question44'] = $this->setQuestion44Subject($data[$i]['question44']);
			$data[$i]['preview_question45'] = $this->setQuestion45Subject($data[$i]['question45']);
			$data[$i]['preview_question46'] = $this->setQuestion46Subject($data[$i]['question46']);
			$data[$i]['preview_question47'] = $this->setQuestion47Subject($data[$i]['question47']);
			$data[$i]['preview_question48'] = $this->setQuestion48Subject($data[$i]['question48']);
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion24Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion25Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion26Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion27Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion28Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion29Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion30Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion31Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion32Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion33Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion34Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion35Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion36Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion37Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion38Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion39Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion40Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion41Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion42Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion43Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion44Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion45Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion46Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion47Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion48Subject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ไม่เลย';
				break;
			case 2:
				$subject = 'บางครั้ง';
				break;
			case 3:
				$subject = 'บ่อยครั้ง';
				break;
			case 4:
				$subject = 'เป็นประจำ';
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

		$pk1 = $data['immune_factor_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_immune_factor_id'] = $pk1;

		$this->data['record_immune_factor_id'] = $data['immune_factor_id'];
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
		$this->data['preview_question24'] = $this->setQuestion24Subject($data['question24']);
		$this->data['record_question24'] = $data['question24'];
		$this->data['preview_question25'] = $this->setQuestion25Subject($data['question25']);
		$this->data['record_question25'] = $data['question25'];
		$this->data['preview_question26'] = $this->setQuestion26Subject($data['question26']);
		$this->data['record_question26'] = $data['question26'];
		$this->data['preview_question27'] = $this->setQuestion27Subject($data['question27']);
		$this->data['record_question27'] = $data['question27'];
		$this->data['preview_question28'] = $this->setQuestion28Subject($data['question28']);
		$this->data['record_question28'] = $data['question28'];
		$this->data['preview_question29'] = $this->setQuestion29Subject($data['question29']);
		$this->data['record_question29'] = $data['question29'];
		$this->data['preview_question30'] = $this->setQuestion30Subject($data['question30']);
		$this->data['record_question30'] = $data['question30'];
		$this->data['preview_question31'] = $this->setQuestion31Subject($data['question31']);
		$this->data['record_question31'] = $data['question31'];
		$this->data['preview_question32'] = $this->setQuestion32Subject($data['question32']);
		$this->data['record_question32'] = $data['question32'];
		$this->data['preview_question33'] = $this->setQuestion33Subject($data['question33']);
		$this->data['record_question33'] = $data['question33'];
		$this->data['preview_question34'] = $this->setQuestion34Subject($data['question34']);
		$this->data['record_question34'] = $data['question34'];
		$this->data['preview_question35'] = $this->setQuestion35Subject($data['question35']);
		$this->data['record_question35'] = $data['question35'];
		$this->data['preview_question36'] = $this->setQuestion36Subject($data['question36']);
		$this->data['record_question36'] = $data['question36'];
		$this->data['preview_question37'] = $this->setQuestion37Subject($data['question37']);
		$this->data['record_question37'] = $data['question37'];
		$this->data['preview_question38'] = $this->setQuestion38Subject($data['question38']);
		$this->data['record_question38'] = $data['question38'];
		$this->data['preview_question39'] = $this->setQuestion39Subject($data['question39']);
		$this->data['record_question39'] = $data['question39'];
		$this->data['preview_question40'] = $this->setQuestion40Subject($data['question40']);
		$this->data['record_question40'] = $data['question40'];
		$this->data['preview_question41'] = $this->setQuestion41Subject($data['question41']);
		$this->data['record_question41'] = $data['question41'];
		$this->data['preview_question42'] = $this->setQuestion42Subject($data['question42']);
		$this->data['record_question42'] = $data['question42'];
		$this->data['preview_question43'] = $this->setQuestion43Subject($data['question43']);
		$this->data['record_question43'] = $data['question43'];
		$this->data['preview_question44'] = $this->setQuestion44Subject($data['question44']);
		$this->data['record_question44'] = $data['question44'];
		$this->data['preview_question45'] = $this->setQuestion45Subject($data['question45']);
		$this->data['record_question45'] = $data['question45'];
		$this->data['preview_question46'] = $this->setQuestion46Subject($data['question46']);
		$this->data['record_question46'] = $data['question46'];
		$this->data['preview_question47'] = $this->setQuestion47Subject($data['question47']);
		$this->data['record_question47'] = $data['question47'];
		$this->data['preview_question48'] = $this->setQuestion48Subject($data['question48']);
		$this->data['record_question48'] = $data['question48'];


	}
}
/*---------------------------- END Controller Class --------------------------------*/
