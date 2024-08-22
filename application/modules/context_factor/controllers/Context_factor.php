<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Context_factor.php ]
 */
class Context_factor extends CRUD_Controller
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
		$this->load->model('Context_factor/Context_factor_model', 'Context_factor');
		$this->Context_factor->session_name = 'context_factor_context_factor';

		$this->data['page_url'] = site_url('context_factor/context_factor');
		
		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/Context_factor/context_factor.js?ft='. filemtime('assets/js_modules/Context_factor/context_factor.js');
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
		$this->session->unset_userdata($this->Context_factor->session_name . '_search_field');
		$this->session->unset_userdata($this->Context_factor->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Context_factor', 'class' => 'active', 'url' => '#'),
		);
		
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Context_factor->session_name . '_search_field' => $search_field, $this->Context_factor->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Context_factor->session_name . '_search_field');
			$value = $this->session->userdata($this->Context_factor->session_name . '_value');
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
			$this->Context_factor->order_field = $field;
			$this->Context_factor->order_sort = $sort;
		}
		$results = $this->Context_factor->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('context_factor/context_factor');
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

		$this->render_view('context_factor/context_factor/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Context_factor', 'url' => site_url('context_factor/context_factor')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Context_factor->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('context_factor/context_factor/preview_view');
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
						array('title' => 'Context_factor', 'url' => site_url('context_factor/context_factor')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->render_view('context_factor/context_factor/add_view');
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
		$frm->set_rules('question1', 'ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question2', 'ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง] ', 'trim|required|is_natural');
		$frm->set_rules('question3', 'ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question4', 'ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question5', '5	การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question6', 'ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question7', 'การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question8', 'ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question9', 'ฉันถูกทำร้ายร่างกายจากคนในครอบครัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question10', 'ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question11', 'ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question12', 'ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question13', 'ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question14', 'ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question15', 'ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question16', 'ฉันถูกห้ามไม่ให้คบเพื่อนบางคน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question17', 'ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question18', 'ฉันถูกห้ามไม่ให้ออกนอกบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question19', 'ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question20', 'คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question21', 'คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question22', 'ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question23', 'ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question24', 'เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question25', '17	คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question26', 'คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question27', 'ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question28', 'ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question29', 'ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question30', 'ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question31', 'ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question32', 'ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question33', 'ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question34', 'ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question35', 'ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question36', 'ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question37', 'ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question38', 'คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question39', 'เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question40', 'คนในชุมชนชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question41', 'ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question42', 'ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question43', 'ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question44', 'ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question45', 'ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question46', 'ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question47', 'ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');

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
		$frm->set_rules('question1', 'ฉันพยายามทำทุกอย่าง เพราะต้องการเป็นที่ยอมรับในกลุ่มเพื่อนที่ใช้สารเสพติด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question2', 'ฉันคิดว่าการที่ใช้สารเสพติดในกลุ่มเพื่อนเป็นเรื่องปกติธรรมดา[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง] ', 'trim|required|is_natural');
		$frm->set_rules('question3', 'ถ้าฉันใช้สารเสพติด ฉันจะได้เป็นส่วนหนึ่งของกลุ่มเพื่อน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question4', 'ฉันไม่ยอมเชื่อเพื่อน เมื่อเพื่อนชักจูงให้เห็นถึงความท้าทายของสารเสพติด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question5', '5	การที่ฉันใช้ชีวิตร่วมกับกลุ่มเพื่อนที่ใช้สารเสพติดและได้เพื่อนแท้ที่เข้าใจกัน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question6', 'ถ้าการลองสูบบุหรี่จะทำให้เพื่อน ๆ ยอมรับฉันเข้ากลุ่ม ฉันยินดีที่จะทำ[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question7', 'การที่ฉันใช้ชีวิตร่วมกับผู้ที่ใช้สารเสพติด ทำให้รู้สารเสพติดทำให้ได้เพื่อนแท้ที่เข้าใจกัน[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question8', 'ฉันจะไม่ยุ่งเกี่ยวกับกลุ่มเพื่อนที่ใช้สารเสพติดโดยเด็ดขาด[1=ไม่จริง,2=ค่อนข้างไม่จริง,3=ค่อนข้างจริง,4=จริง]', 'trim|required|is_natural');
		$frm->set_rules('question9', 'ฉันถูกทำร้ายร่างกายจากคนในครอบครัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question10', 'ฉันรับรู้/เห็นคนในครอบครัวทำร้ายร่างกายกันจนได้รับบาดเจ็บ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question11', 'ฉันรู้สึกไม่พอใจที่ถูกคนในครอบครัวบังคับให้ทำในสิ่งที่ฉันไม่ชอบ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question12', 'ฉันรู้สึกเสียใจที่ถูกคนในครอบครัวต่อว่าด้วยถ้อยคำที่รุนแรงและหยาบคาย[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question13', 'ฉันถูกคนในครอบครัวนำไปเปรียบเทียบกับคนอื่น จนทำให้ฉันรู้สึกกดดันหรืออับอาย[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question14', 'ฉันรู้สึกสบายใจที่ได้รับการดูแลเอาใจใส่จากคนในครอบครัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ] ', 'trim|required|is_natural');
		$frm->set_rules('question15', 'ฉันรับรู้/เห็นคนในครอบครัวต้องเสียใจเพราะการกระทำของคนในบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question16', 'ฉันถูกห้ามไม่ให้คบเพื่อนบางคน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question17', 'ฉันถูกกีดกันจากครอบครัวไม่ให้ติดต่อกับญาติพี่น้อง และ/หรือเพื่อนบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question18', 'ฉันถูกห้ามไม่ให้ออกนอกบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question19', 'ฉันต้องช่วยที่บ้านทำงาน จนทำให้ฉันไม่มีเวลาทำในสิ่งที่ฉันต้องการ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question20', 'คนในครอบครัวของฉันถูกกีดกันไม่ให้คบหรือติดต่อกับคนอื่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question21', 'คนในครอบครัวของฉันถูกบังคับไม่ให้ออกนอกบ้าน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question22', 'ฉันได้รับสิ่งจำเป็นพื้นฐานในการดำรงชีวิตจากครอบครัวอย่างเพียงพอ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question23', 'ฉันได้รับเงินจากผู้ปกครองไม่เพียงพอต่อการใช้ในชีวิตประจำวัน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question24', 'เมื่อฉันไม่สบายหรือเจ็บป่วย ครอบครัวไม่มีเงินพาฉันไปรักษา[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question25', '17	คนในครอบครัวของฉันทะเลาะกันเพราะเงินไม่พอใช้[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question26', 'คนในครอบครัวมักพูดจาลามกต่อหน้าฉัน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question27', 'ฉันถูกคนในครอบครัวจับเนื้อต้องตัวจนทำให้ฉันรู้สึกอึดอัดหรือไม่สบายใจ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question28', 'ฉันถูกคนในครอบครัวบังคับให้มีเพศสัมพันธ์กับผู้อื่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question29', 'ฉันถูกคนในครอบครัวบังคับให้ขายบริการทางเพศเพื่อแลกเงิน[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question30', 'ฉันรับรู้/เห็นคนในครอบครัวถูกบังคับให้มีเพศสัมพันธ์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question31', 'ฉันเห็นคนในครอบครัวสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question32', 'ฉันเห็นคนในครอบครัวใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question33', 'ฉันเห็นเพื่อน/รุ่นพี่ในโรงเรียนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question34', 'ฉันเห็นเพื่อน/รุ่นพี่ใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question35', 'ฉันเห็นคนในชุมชนสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question36', 'ฉันเห็นคนในชุมชนใช้สารเสพติดที่ผิดกฎหมาย เช่น ยาบ้า ยาไอซ์ กระท่อม ฝิ่น[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question37', 'ฉันเห็นดาราหรือนักร้องที่ฉันชื่นชอบสูบบุหรี่ หรือดื่มเครื่องดื่มแอลกอฮอล์[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question38', 'คนในครอบครัวชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question39', 'เพื่อน/รุ่นพี่ในโรงเรียนชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question40', 'คนในชุมชนชักชวนให้ฉันใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question41', 'ฉันพบเจอสารเสพติดหรืออุปกรณ์ที่ใช้ในการเสพสารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question42', 'ฉันสนิทกับคนในครอบครัวที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question43', 'ฉันมีกิจกรรมหรือความเกี่ยวข้องกับเพื่อน/รุ่นพี่ในโรงเรียนที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question44', 'ฉันมีกิจกรรมหรือความเกี่ยวข้องกับคนในชุมชนที่ใช้สารเสพติด[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question45', 'ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันเกรงกลัว[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question46', 'ผู้ที่ใช้สารเสพติดที่ฉันพบเป็นคนที่ฉันนับถือหรือชื่นชอบ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');
		$frm->set_rules('question47', 'ฉันติดตามการใช้สารเสพติดจากสื่อต่าง ๆ[1=ไม่เคย,2=นานๆครั้ง,3=บ่อยครั้ง,4=เป็นประจำ]', 'trim|required|is_natural');

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
			$id = $this->Context_factor->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Context_factor->error_message;
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
						array('title' => 'Context_factor', 'url' => site_url('context_factor/context_factor')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Context_factor->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->render_view('context_factor/context_factor/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$context_factor_id = ci_decrypt($data['encrypt_context_factor_id']);
		if($context_factor_id==''){
			$error .= '- รหัส context_factor_id';
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

			$result = $this->Context_factor->update($post);
			if($result == false){
				$message = $this->Context_factor->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Context_factor->error_message;
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
			$result = $this->Context_factor->delete($post);
			if($result == false){
				$message = $this->Context_factor->error_message;
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
			$pk1 = $data[$i]['context_factor_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_context_factor_id'] = $pk1;
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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
				$subject = 'ไม่เคย';
				break;
			case 2:
				$subject = 'นานๆครั้ง';
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

		$pk1 = $data['context_factor_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_context_factor_id'] = $pk1;

		$this->data['record_context_factor_id'] = $data['context_factor_id'];
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


	}
}
/*---------------------------- END Controller Class --------------------------------*/
