<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Assessment_form.php ]
 */
class Assessment_form extends MEMBER_Controller
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
		$this->load->model('report/Assessment_form_model', 'Assessment_form');
		$this->Assessment_form->session_name = 'report_assessment_form';

		$this->data['page_url'] = site_url('report/assessment_form');
		
		$this->data['page_title'] = 'PHP CI MANIA';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/report/assessment_form.js?ft='. filemtime('assets/js_modules/report/assessment_form.js');
		$this->another_js .= '<script src="'. base_url($js_url) .'"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Assessment_form', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Assessment_form->session_name . '_search_field');
		$this->session->unset_userdata($this->Assessment_form->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Assessment_form', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Assessment_form->session_name . '_search_field' => $search_field, $this->Assessment_form->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Assessment_form->session_name . '_search_field');
			$value = $this->session->userdata($this->Assessment_form->session_name . '_value');
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
			$this->Assessment_form->order_field = $field;
			$this->Assessment_form->order_sort = $sort;
		}
		$results = $this->Assessment_form->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('report/assessment_form');
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

		$this->render_view('report/assessment_form/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Assessment_form', 'url' => site_url('report/assessment_form')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment_form->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('report/assessment_form/preview_view');
			}
		}
	}


	// ------------------------------------------------------------------------

	public function preview_print_pdf($encrypt_id = "") 
	{
		// load PDF library
		$this->load->library('report/Assessment_form_preview_pdf');
		
		$id = ci_decrypt(urldecode($encrypt_id));
		$results = $this->Assessment_form->load($id);
		$this->setPreviewFormat($results);
		$data_lists = array();
		$this->data['detail_list'] = $data_lists;
		$data = $this->data;
		
		$pdf = new FPDI('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$font = 'thsarabun';
		$pdf->font = $font;
		
		$pdf->SetCreator("");
		$pdf->SetAuthor("");
		$pdf->SetTitle("ตารางแสดงรายการ ข้อมูล assessment_form");
		$pdf->SetSubject("ตารางแสดงรายการ ข้อมูล assessment_form");
				
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->SetMargins(10, 10, 10);
		$pdf->SetHeaderMargin(0);
		$pdf->SetTopMargin(15);
		$pdf->SetFooterMargin(0);
		
		$pdf->SetFont($font, '', 16);
		
		// Add a page
		$pdf->AddPage("P");
		
		$html = $this->parser->parse_repeat('report/assessment_form/preview_view_pdf', $data, true);
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		
		$pdf->lastPage();
		
		$pdf->Output('Assessment_form_list.pdf', 'I');
	}

	public function preview_export_excel($encrypt_id = "") 
	{	
		$id = ci_decrypt(urldecode($encrypt_id));
		$results = $this->Assessment_form->load($id);
		$this->setPreviewFormat($results);
		$data_lists = array();
		$this->data['detail_list'] = $data_lists;
		$data = $this->data;
	
		$table	=  $this->parser->parse_repeat('report/assessment_form/preview_view_excel', $data, true);

		$filename = "Assessment_form_preview". date("Y-m-d-H-i-s")."";
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0'); 
		
		echo $table;

	}

	// ------------------------------------------------------------------------
	/**
	 * Reload running number
	 */
	public function reload_runninng()
	{
		$field = $this->input->post('field', TRUE);
		echo $this->Assessment_form->set_running_number($field);
	}


	// ------------------------------------------------------------------------
	/**
	 * set default input for add form
	 */
	public function setFormAddData()
	{
		$assessment_code_running = $this->Assessment_form->set_running_number('assessment_code');
		$this->data['source_assessment_code'] = $assessment_code_running;

	}

	/**
	 * Add form
	 */
	public function add()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Assessment_form', 'url' => site_url('report/assessment_form')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->setFormAddData();
		$this->render_view('report/assessment_form/add_view');
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

		$frm->set_rules('assessment_code', 'assessment_code', 'trim|required');
		$frm->set_rules('draf', 'Draf[1=Draf,2=Submit]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('assessment_code');
			$message .= form_error('draf');
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

		$frm->set_rules('assessment_code', 'assessment_code', 'trim|required');
		$frm->set_rules('draf', 'Draf[1=Draf,2=Submit]', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('assessment_code');
			$message .= form_error('draf');
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
			$id = $this->Assessment_form->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Assessment_form->error_message;
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
						array('title' => 'Assessment_form', 'url' => site_url('report/assessment_form')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment_form->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);

				$this->data['source_assessment_code'] = '';

				$this->setPreviewFormat($results);

				$this->data['record_create_date'] = setThaiDate($results['create_date']);

				$this->render_view('report/assessment_form/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$id = ci_decrypt($data['encrypt_id']);
		if($id==''){
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

			$result = $this->Assessment_form->update($post);
			if($result == false){
				$message = $this->Assessment_form->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Assessment_form->error_message;
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
			$result = $this->Assessment_form->delete($post);
			if($result == false){
				$message = $this->Assessment_form->error_message;
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
			$pk1 = $data[$i]['id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_id'] = $pk1;
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
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;

		$this->data['record_id'] = $data['id'];
		$this->data['record_assessment_code'] = $data['assessment_code'];
		$this->data['record_create_date'] = $data['create_date'];
		$this->data['record_draf'] = $data['draf'];
		$this->data['record_import_year_data'] = $data['import_year_data'];

		$this->data['record_create_date'] = setThaiDate($data['create_date']);

	}

	public function print_pdf() 
	{
		// load excel library
		$this->load->library('report/Assessment_form_list_pdf');
		
		$results = $this->Assessment_form->read();
		$data_lists = $this->setDataListFormat($results['list_data'], 0);
		$data['data_list'] = $data_lists;

		$pdf = new FPDI('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$font = 'thsarabun';
		$pdf->font = $font;
		
		$pdf->SetCreator("");
		$pdf->SetAuthor("");
		$pdf->SetTitle("ตารางแสดงรายการ ข้อมูล assessment_form");
		$pdf->SetSubject("ตารางแสดงรายการ ข้อมูล assessment_form");
				
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		
		$pdf->SetMargins(10, 10, 10);
		$pdf->SetHeaderMargin(0);
		$pdf->SetTopMargin(15);
		$pdf->SetFooterMargin(0);
		
		$pdf->SetFont($font, '', 16);
		
		// Add a page
		$pdf->AddPage("P");
		
		$html = $this->parser->parse_repeat('report/assessment_form/list_view_pdf', $data, true);
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		
		$pdf->lastPage();
		
		$pdf->Output('Assessment_form_list.pdf', 'I');
	}

	public function export_excel() 
	{
		// load excel library
		$this->load->library('report/Excel');
		
		$results = $this->Assessment_form->read();
		$data_lists = $this->setDataListFormat($results['list_data'], 0);
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
       
		$arr = ['province ',' section ',' 1.Sex ',' 2.Age ',' 3.Edu1 ',' 4.Edu2 ',' 5.sisbro ',' 6.family ',' 7.Dad Job ',' 8.Mom Job ',' 9.earn ',' 10.C1 ',' 11.try ',' 12.D1 ',' 12.D12(อื่นๆ) ',' EF1 ',' EF2 ',' EF3 ',' EF4 ',' EF5 ',' EF6 ',' EF7 ',' EF8 ',' EF9 ',' EF10 ',' EF11 ',' EF12 ',' EF13 ',' EF14 ',' EF15 ',' EF16 ',' EF17 ',' EF18 ',' EF19 ',' EF20 ',' EF21 ',' EF22 ',' EF23 ',' EF24 ',' EF25 ',' EF26 ',' EF27 ',' EF28 ',' EF29 ',' EF30 ',' EF31 ',' EF32 ',' EF33 ',' EF34 ',' EF35 ',' EF36 ',' EF37 ',' EF38 ',' EF39 ',' EF40 ',' EF41 ',' EF42 ',' EF43 ',' EF44 ',' EF45 ',' EF46 ',' EF47 ',' EF48 ',' PSY1 ',' PSY2 ',' PSY3 ',' PSY4 ',' PSY5 ',' PSY6 ',' PSY7 ',' PSY8 ',' PSY9 ',' PSY10 ',' PSY11 ',' PSY12 ',' PSY13 ',' PSY14 ',' PSY15 ',' PSY16 ',' PSY17 ',' PSY18 ',' PSY19 ',' PSY20 ',' PSY21 ',' PSY22 ',' PSY23 ',' PSY24 ',' PSY25 ',' PSY26 ',' SELF1 ',' SELF2 ',' SELF3 ',' SELF4 ',' SELF5 ',' SELF6 ',' SELF7 ',' SELF8 ',' SELF9 ',' SELF10 ',' SELF11 ',' SELF12 ',' SELF13 ',' SELF14 ',' SELF15 ',' SELF16 ',' SELF17 ',' SELF18 ',' SELF19 ',' SELF20 ',' SELF21 ',' SELF22 ',' SELF23 ',' SELF24 ',' SELF25 ',' POW1 ',' POW2 ',' POW3 ',' POW4 ',' POW5 ',' POW6 ',' POW7 ',' POW8 ',' POW9 ',' POW10 ',' POW11 ',' POW12 ',' POW13 ',' POW14 ',' POW15 ',' CON1 ',' CON2 ',' CON3 ',' CON4 ',' CON5 ',' CON6 ',' CON7 ',' CON8 ',' FAM1 ',' FAM2 ',' FAM3 ',' FAM4 ',' FAM5 ',' FAM6 ',' FAM7 ',' FAM8 ',' FAM9 ',' FAM10 ',' FAM11 ',' FAM12 ',' FAM13 ',' FAM14 ',' FAM15 ',' FAM16 ',' FAM17 ',' FAM18 ',' FAM19 ',' FAM20 ',' FAM21 ',' FAM22 ',' MOD1 ',' MOD2 ',' MOD3 ',' MOD4 ',' MOD5 ',' MOD6 ',' MOD7 ',' MOD8 ',' MOD9 ',' MOD10 ',' MOD11 ',' MOD12 ',' MOD13 ',' MOD14 ',' MOD15 ',' MOD16 ',' MEDIA1 ',' MEDIA2 ',' MEDIA3 ',' MEDIA4 ',' POWFA1 ',' POWFA2 ',' POWFA3 ',' POWFA4 ',' POWFA5 ',' POWFA6 ',' POWFA7 ',' POWFA8 ',' POWIN1 ',' POWIN2 ',' POWIN3 ',' POWIN4 ',' POWIN5 ',' POWIN6 ',' POWIN7 ',' POWIN8 ',' POWIN9 ',' POWIN10 ',' POWIN11 ',' POWFA1 ',' POWFA2 ',' POWFA3 ',' POWFA4 ',' POWFA5 ',' POWFA6 ',' POWCOM1 ',' POWCOM2 ',' POWCOM3 ',' POWCOM4 ',' POWCOM5 ',' POWCOM6 ',' POWCOM7 ',' POWCOM8 ',' ATT1 ',' ATT2 ',' ATT3 ',' ATT4 ',' ATT5 ',' ATT6 ',' ATT7 ',' ATT8 ',' ATT9 ',' ATT10 ',' ATT11 ',' ATT12 ',' ATT13 ',' ATT14 ',' ATT15 ',' BEH1 ',' BEH2 ',' BEH3 ',' BEH4 ',' BEH5 ',' BEH6 ',' BEH7 ',' BEH8 ',' BEH9 ',' BEH10 ',' BEH11 ',' BEH12 ',' BEH13 ',' BEH14 ',' BEH15 ',' BEH16 ',' BEH17 ',' BEH18 ',' BEH19 ',' BEH20 ',' BEH21 ',' BEH22 ',' BEH23'];
		
		$row = 1; // 1-based index
		$col = 0;
		foreach($arr  as $value){

			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
        	$col++;

		}
		
		// set Header ***** SECTION 1 ***** 
		// $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'province');
		// $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'section');
		// $objPHPExcel->getActiveSheet()->SetCellValue('C1', '1.Sex');
		// $objPHPExcel->getActiveSheet()->SetCellValue('D1', '2.Age');
		// $objPHPExcel->getActiveSheet()->SetCellValue('E1', '3.Edu1');
		// $objPHPExcel->getActiveSheet()->SetCellValue('F1', '4.Edu2');
		// $objPHPExcel->getActiveSheet()->SetCellValue('G1', '5.sisbro');
		// $objPHPExcel->getActiveSheet()->SetCellValue('H1', '6.family');
		// $objPHPExcel->getActiveSheet()->SetCellValue('I1', '7.Dad Job');
		// $objPHPExcel->getActiveSheet()->SetCellValue('J1', '8. Mom Job');
		// $objPHPExcel->getActiveSheet()->SetCellValue('K1', '9. earn');
		// $objPHPExcel->getActiveSheet()->SetCellValue('L1', '10. C1');
		// $objPHPExcel->getActiveSheet()->SetCellValue('M1', '11. try');
		// $objPHPExcel->getActiveSheet()->SetCellValue('N1', '12. D1');
		// $objPHPExcel->getActiveSheet()->SetCellValue('O1', '12. D12(อื่นๆ)');

		// $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'EF1');
		// $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'EF2');
		// $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'EF2');
		// $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'EF4');
		// $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'EF5');
		// $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'EF6');
		// $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'EF7');
		// $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'EF8');
		// $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'EF9');
		// $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'EF10');
		// $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'EF11');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'EF12');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EF13');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EF14');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'EF15');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'EF16');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'EF17');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EF18');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'EF19');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'EF20');

		// $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'EF21');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'EF22');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'EF23');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'EF24');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'EF25');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'EF26');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'EF27');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'EF28');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'EF29');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'EF30');

		// $objPHPExcel->getActiveSheet()->SetCellValue('AT1','EF31');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AU1','EF32');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AV1','EF33');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AW1','EF34');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AX1','EF35');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AY1','EF36');
		// $objPHPExcel->getActiveSheet()->SetCellValue('AZ1','EF37');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BA1','EF38');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BB1','EF39');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BC1','EF40');

		// $objPHPExcel->getActiveSheet()->SetCellValue('BD1','EF41');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BE1','EF42');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BF1','EF43');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BG1','EF44');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BH1','EF45');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BI1','EF46');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BJ1','EF47');
		// $objPHPExcel->getActiveSheet()->SetCellValue('BK1','EF48');

		// END SECTION 1
		
		// set header bold
		$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold( true );
							
		// set Row
		$rowCount = 2;
		foreach ($data_lists as $row) {
		
			// ***** SECTION 2 *****

			$sheet = $objPHPExcel->getActiveSheet();
			$sheet->SetCellValue('A' . $rowCount, $row['province_name']);
			$sheet->SetCellValue('B' . $rowCount, $row['Sex']);
			$sheet->SetCellValue('C' . $rowCount, $row['Age']);
			$sheet->SetCellValue('D' . $rowCount, $row['Edu1']);
			$sheet->SetCellValue('E' . $rowCount, $row['Edu2']);
			$sheet->SetCellValue('F' . $rowCount, $row['Sisbro_total']);
			$sheet->SetCellValue('G' . $rowCount, $row['Family']);
			$sheet->SetCellValue('H' . $rowCount, $row['Dad_Job_fill']);
			$sheet->SetCellValue('I' . $rowCount, $row['Mom_Job_fill']);
			$sheet->SetCellValue('J' . $rowCount, $row['earn']);
			$sheet->SetCellValue('K' . $rowCount, $row['C1_fill']);
			$sheet->SetCellValue('L' . $rowCount, $row['try_data_yes_no']);

			$sheet->SetCellValue('P' . $rowCount, $row['EF1']);
			$sheet->SetCellValue('Q' . $rowCount, $row['EF2']);
			$sheet->SetCellValue('R' . $rowCount, $row['EF3']);
			$sheet->SetCellValue('S' . $rowCount, $row['EF4']);
			$sheet->SetCellValue('T' . $rowCount, $row['EF5']);
			$sheet->SetCellValue('U' . $rowCount, $row['EF6']);
			$sheet->SetCellValue('V' . $rowCount, $row['EF7']);
			$sheet->SetCellValue('W' . $rowCount, $row['EF8']);
			$sheet->SetCellValue('X' . $rowCount, $row['EF9']);
			$sheet->SetCellValue('Y' . $rowCount, $row['EF10']);
			$sheet->SetCellValue('Z' . $rowCount, $row['EF11']);

			$sheet->SetCellValue('AA' . $rowCount, $row['EF12']);
			$sheet->SetCellValue('AB' . $rowCount, $row['EF13']);
			$sheet->SetCellValue('AC' . $rowCount, $row['EF14']);
			$sheet->SetCellValue('AD' . $rowCount, $row['EF15']);
			$sheet->SetCellValue('AE' . $rowCount, $row['EF16']);
			$sheet->SetCellValue('AF' . $rowCount, $row['EF17']);
			$sheet->SetCellValue('AG' . $rowCount, $row['EF18']);
			$sheet->SetCellValue('AH' . $rowCount, $row['EF19']);
			$sheet->SetCellValue('AI' . $rowCount, $row['EF20']);

			$sheet->SetCellValue('AJ' . $rowCount, $row['EF21']);
			$sheet->SetCellValue('AK' . $rowCount, $row['EF22']);
			$sheet->SetCellValue('AL' . $rowCount, $row['EF23']);
			$sheet->SetCellValue('AM' . $rowCount, $row['EF24']);
			$sheet->SetCellValue('AN' . $rowCount, $row['EF25']);
			$sheet->SetCellValue('AO' . $rowCount, $row['EF26']);
			$sheet->SetCellValue('AP' . $rowCount, $row['EF27']);
			$sheet->SetCellValue('AQ' . $rowCount, $row['EF28']);
			$sheet->SetCellValue('AR' . $rowCount, $row['EF29']);
			$sheet->SetCellValue('AS' . $rowCount, $row['EF30']);

			$sheet->SetCellValue('AT' . $rowCount, $row['EF31']);
			$sheet->SetCellValue('AU' . $rowCount, $row['EF32']);
			$sheet->SetCellValue('AV' . $rowCount, $row['EF33']);
			$sheet->SetCellValue('AW' . $rowCount, $row['EF34']);
			$sheet->SetCellValue('AX' . $rowCount, $row['EF35']);
			$sheet->SetCellValue('AY' . $rowCount, $row['EF36']);
			$sheet->SetCellValue('AZ' . $rowCount, $row['EF37']);
			$sheet->SetCellValue('BA' . $rowCount, $row['EF38']);
			$sheet->SetCellValue('BB' . $rowCount, $row['EF39']);
			$sheet->SetCellValue('BC' . $rowCount, $row['EF40']);


			$sheet->SetCellValue('AT' . $rowCount, $row['EF31']);
			$sheet->SetCellValue('AU' . $rowCount, $row['EF32']);
			$sheet->SetCellValue('AV' . $rowCount, $row['EF33']);
			$sheet->SetCellValue('AW' . $rowCount, $row['EF34']);
			$sheet->SetCellValue('AX' . $rowCount, $row['EF35']);
			$sheet->SetCellValue('AY' . $rowCount, $row['EF36']);
			$sheet->SetCellValue('AZ' . $rowCount, $row['EF37']);
			$sheet->SetCellValue('BA' . $rowCount, $row['EF38']);
			$sheet->SetCellValue('BB' . $rowCount, $row['EF39']);
			$sheet->SetCellValue('BC' . $rowCount, $row['EF40']);

			$sheet->SetCellValue('BD' . $rowCount, $row['EF41']);
			$sheet->SetCellValue('BE' . $rowCount, $row['EF42']);
			$sheet->SetCellValue('BF' . $rowCount, $row['EF43']);
			$sheet->SetCellValue('BG' . $rowCount, $row['EF44']);
			$sheet->SetCellValue('BH' . $rowCount, $row['EF45']);
			// $sheet->SetCellValue('BI' . $rowCount, $row['EF46']);
			// $sheet->SetCellValue('BJ' . $rowCount, $row['EF47']);
			// $sheet->SetCellValue('BK' . $rowCount, $row['EF48']);
			
			$sheet->SetCellValue('BL' . $rowCount, $row['PSY1']);
			$sheet->SetCellValue('BM' . $rowCount, $row['PSY2']);
			$sheet->SetCellValue('BN' . $rowCount, $row['PSY3']);
			$sheet->SetCellValue('BO' . $rowCount, $row['PSY4']);
			$sheet->SetCellValue('BP' . $rowCount, $row['PSY5']);
			$sheet->SetCellValue('BQ' . $rowCount, $row['PSY6']);
			$sheet->SetCellValue('BR' . $rowCount, $row['PSY7']);
			$sheet->SetCellValue('BS' . $rowCount, $row['PSY8']);
			$sheet->SetCellValue('BT' . $rowCount, $row['PSY9']);
			$sheet->SetCellValue('BU' . $rowCount, $row['PSY10']);
			$sheet->SetCellValue('BV' . $rowCount, $row['PSY11']);
			$sheet->SetCellValue('BW' . $rowCount, $row['PSY12']);
			$sheet->SetCellValue('BX' . $rowCount, $row['PSY13']);
			$sheet->SetCellValue('BY' . $rowCount, $row['PSY14']);
			$sheet->SetCellValue('BZ' . $rowCount, $row['PSY15']);

			$sheet->SetCellValue('CA' . $rowCount, $row['PSY16']);
			$sheet->SetCellValue('CB' . $rowCount, $row['PSY17']);
			$sheet->SetCellValue('CC' . $rowCount, $row['PSY18']);
			$sheet->SetCellValue('CD' . $rowCount, $row['PSY19']);
			$sheet->SetCellValue('CE' . $rowCount, $row['PSY20']);
			$sheet->SetCellValue('CF' . $rowCount, $row['PSY21']);
			$sheet->SetCellValue('CG' . $rowCount, $row['PSY22']);
			$sheet->SetCellValue('CH' . $rowCount, $row['PSY23']);
			$sheet->SetCellValue('CI' . $rowCount, $row['PSY24']);
			$sheet->SetCellValue('CJ' . $rowCount, $row['PSY25']);
			$sheet->SetCellValue('CK' . $rowCount, $row['PSY26']);

			$sheet->SetCellValue('CL' . $rowCount, $row['SELF1']);
			$sheet->SetCellValue('CM' . $rowCount, $row['SELF2']);
			$sheet->SetCellValue('CN' . $rowCount, $row['SELF3']);
			$sheet->SetCellValue('CO' . $rowCount, $row['SELF4']);
			$sheet->SetCellValue('CP' . $rowCount, $row['SELF5']);
			$sheet->SetCellValue('CQ' . $rowCount, $row['SELF6']);
			$sheet->SetCellValue('CR' . $rowCount, $row['SELF7']);
			$sheet->SetCellValue('CS' . $rowCount, $row['SELF8']);
			$sheet->SetCellValue('CT' . $rowCount, $row['SELF9']);
			$sheet->SetCellValue('CU' . $rowCount, $row['SELF10']);
			$sheet->SetCellValue('CV' . $rowCount, $row['SELF11']);
			$sheet->SetCellValue('CW' . $rowCount, $row['SELF12']);
			$sheet->SetCellValue('CX' . $rowCount, $row['SELF13']);
			$sheet->SetCellValue('CY' . $rowCount, $row['SELF14']);
			$sheet->SetCellValue('CZ' . $rowCount, $row['SELF15']);
			$sheet->SetCellValue('DA' . $rowCount, $row['SELF16']);
			$sheet->SetCellValue('DB' . $rowCount, $row['SELF17']);
			$sheet->SetCellValue('DC' . $rowCount, $row['SELF18']);
			$sheet->SetCellValue('DD' . $rowCount, $row['SELF19']);
			$sheet->SetCellValue('DE' . $rowCount, $row['SELF20']);
			$sheet->SetCellValue('DF' . $rowCount, $row['SELF21']);
			$sheet->SetCellValue('DG' . $rowCount, $row['SELF22']);
			$sheet->SetCellValue('DH' . $rowCount, $row['SELF23']);
			$sheet->SetCellValue('DI' . $rowCount, $row['SELF24']);
			$sheet->SetCellValue('DJ' . $rowCount, $row['SELF25']);

			
			$sheet->SetCellValue('DK' . $rowCount, $row['POW1']);
			$sheet->SetCellValue('DL' . $rowCount, $row['POW2']);
			$sheet->SetCellValue('DM' . $rowCount, $row['POW3']);
			$sheet->SetCellValue('DN' . $rowCount, $row['POW4']);
			$sheet->SetCellValue('DO' . $rowCount, $row['POW5']);
			$sheet->SetCellValue('DP' . $rowCount, $row['POW6']);
			$sheet->SetCellValue('DQ' . $rowCount, $row['POW7']);
			$sheet->SetCellValue('DR' . $rowCount, $row['POW8']);
			$sheet->SetCellValue('DS' . $rowCount, $row['POW9']);
			$sheet->SetCellValue('DT' . $rowCount, $row['POW10']);
			$sheet->SetCellValue('DU' . $rowCount, $row['POW11']);
			$sheet->SetCellValue('DV' . $rowCount, $row['POW12']);
			$sheet->SetCellValue('DW' . $rowCount, $row['POW13']);
			$sheet->SetCellValue('DX' . $rowCount, $row['POW14']);
			$sheet->SetCellValue('DY' . $rowCount, $row['POW15']);

			$sheet->SetCellValue('DZ' . $rowCount, $row['CON1']);
			$sheet->SetCellValue('EA' . $rowCount, $row['CON2']);
			$sheet->SetCellValue('EB' . $rowCount, $row['CON3']);
			$sheet->SetCellValue('EC' . $rowCount, $row['CON4']);
			$sheet->SetCellValue('ED' . $rowCount, $row['CON5']);
			$sheet->SetCellValue('EE' . $rowCount, $row['CON6']);
			$sheet->SetCellValue('EF' . $rowCount, $row['CON7']);
			$sheet->SetCellValue('EG' . $rowCount, $row['CON8']);


			$sheet->SetCellValue('EH' . $rowCount, $row['FAM1']);
			$sheet->SetCellValue('EI' . $rowCount, $row['FAM2']);
			$sheet->SetCellValue('EJ' . $rowCount, $row['FAM3']);
			$sheet->SetCellValue('EK' . $rowCount, $row['FAM4']);
			$sheet->SetCellValue('EL' . $rowCount, $row['FAM5']);
			$sheet->SetCellValue('EM' . $rowCount, $row['FAM6']);
			$sheet->SetCellValue('EN' . $rowCount, $row['FAM7']);
			$sheet->SetCellValue('EO' . $rowCount, $row['FAM8']);
			$sheet->SetCellValue('EP' . $rowCount, $row['FAM9']);
			$sheet->SetCellValue('EQ' . $rowCount, $row['FAM10']);
			$sheet->SetCellValue('ER' . $rowCount, $row['FAM11']);
			$sheet->SetCellValue('ES' . $rowCount, $row['FAM12']);
			$sheet->SetCellValue('ET' . $rowCount, $row['FAM13']);
			$sheet->SetCellValue('EU' . $rowCount, $row['FAM14']);
			$sheet->SetCellValue('EV' . $rowCount, $row['FAM15']);
			$sheet->SetCellValue('EW' . $rowCount, $row['FAM16']);
			$sheet->SetCellValue('EX' . $rowCount, $row['FAM17']);
			$sheet->SetCellValue('EY' . $rowCount, $row['FAM18']);
			$sheet->SetCellValue('EZ' . $rowCount, $row['FAM19']);
			$sheet->SetCellValue('FA' . $rowCount, $row['FAM20']);
			$sheet->SetCellValue('FB' . $rowCount, $row['FAM21']);
			$sheet->SetCellValue('FC' . $rowCount, $row['FAM22']);

			$sheet->SetCellValue('FD' . $rowCount, $row['MOD1']);
			$sheet->SetCellValue('FE' . $rowCount, $row['MOD2']);
			$sheet->SetCellValue('FF' . $rowCount, $row['MOD3']);
			$sheet->SetCellValue('FG' . $rowCount, $row['MOD4']);
			$sheet->SetCellValue('FH' . $rowCount, $row['MOD5']);
			$sheet->SetCellValue('FI' . $rowCount, $row['MOD6']);
			$sheet->SetCellValue('FJ' . $rowCount, $row['MOD7']);
			$sheet->SetCellValue('FK' . $rowCount, $row['MOD8']);
			$sheet->SetCellValue('FL' . $rowCount, $row['MOD9']);
			$sheet->SetCellValue('FM' . $rowCount, $row['MOD10']);
			$sheet->SetCellValue('FN' . $rowCount, $row['MOD11']);
			$sheet->SetCellValue('FO' . $rowCount, $row['MOD12']);
			$sheet->SetCellValue('FP' . $rowCount, $row['MOD13']);
			$sheet->SetCellValue('FQ' . $rowCount, $row['MOD14']);
			$sheet->SetCellValue('FR' . $rowCount, $row['MOD15']);
			$sheet->SetCellValue('FS' . $rowCount, $row['MOD16']);

			$sheet->SetCellValue('FT' . $rowCount, $row['MEDIA1']);
			$sheet->SetCellValue('FU' . $rowCount, $row['MEDIA2']);
			$sheet->SetCellValue('FV' . $rowCount, $row['MEDIA3']);
			$sheet->SetCellValue('FW' . $rowCount, $row['MEDIA4']);

			$sheet->SetCellValue('FX' . $rowCount, $row['POWFA1']);
			$sheet->SetCellValue('FY' . $rowCount, $row['POWFA2']);
			$sheet->SetCellValue('FZ' . $rowCount, $row['POWFA3']);
			$sheet->SetCellValue('GA' . $rowCount, $row['POWFA4']);
			$sheet->SetCellValue('GB' . $rowCount, $row['POWFA5']);
			$sheet->SetCellValue('GC' . $rowCount, $row['POWFA6']);
			$sheet->SetCellValue('GD' . $rowCount, $row['POWFA7']);
			$sheet->SetCellValue('GE' . $rowCount, $row['POWFA8']);

			$sheet->SetCellValue('GF' . $rowCount, $row['POWIN1']);
			$sheet->SetCellValue('GG' . $rowCount, $row['POWIN2']);	
			$sheet->SetCellValue('GH' . $rowCount, $row['POWIN3']);	
			$sheet->SetCellValue('GI' . $rowCount, $row['POWIN4']);	
			$sheet->SetCellValue('GJ' . $rowCount, $row['POWIN5']);	
			$sheet->SetCellValue('GK' . $rowCount, $row['POWIN6']);	
			$sheet->SetCellValue('GL' . $rowCount, $row['POWIN7']);	
			$sheet->SetCellValue('GM' . $rowCount, $row['POWIN8']);	
			$sheet->SetCellValue('GN' . $rowCount, $row['POWIN9']);	
			$sheet->SetCellValue('GO' . $rowCount, $row['POWIN10']);
			$sheet->SetCellValue('GP' . $rowCount, $row['POWIN11']);
			
			$sheet->SetCellValue('GQ' . $rowCount, $row['POWFA1']);
			$sheet->SetCellValue('GR' . $rowCount, $row['POWFA2']);
			$sheet->SetCellValue('GS' . $rowCount, $row['POWFA3']);
			$sheet->SetCellValue('GT' . $rowCount, $row['POWFA4']);
			$sheet->SetCellValue('GU' . $rowCount, $row['POWFA5']);
			$sheet->SetCellValue('GV' . $rowCount, $row['POWFA6']);

			$sheet->SetCellValue('GW' . $rowCount, $row['POWCOM1']);
			$sheet->SetCellValue('GX' . $rowCount, $row['POWCOM2']);
			$sheet->SetCellValue('GY' . $rowCount, $row['POWCOM3']);
			$sheet->SetCellValue('GZ' . $rowCount, $row['POWCOM4']);
			$sheet->SetCellValue('HA' . $rowCount, $row['POWCOM5']);
			$sheet->SetCellValue('HB' . $rowCount, $row['POWCOM6']);
			$sheet->SetCellValue('HC' . $rowCount, $row['POWCOM7']);
			$sheet->SetCellValue('HD' . $rowCount, $row['POWCOM8']);

			$sheet->SetCellValue('HE' . $rowCount, $row['ATT1']);
			$sheet->SetCellValue('HF' . $rowCount, $row['ATT2']);
			$sheet->SetCellValue('HG' . $rowCount, $row['ATT3']);
			$sheet->SetCellValue('HH' . $rowCount, $row['ATT4']);
			$sheet->SetCellValue('HI' . $rowCount, $row['ATT5']);
			$sheet->SetCellValue('HJ' . $rowCount, $row['ATT6']);
			$sheet->SetCellValue('HK' . $rowCount, $row['ATT7']);
			$sheet->SetCellValue('HL' . $rowCount, $row['ATT8']);
			$sheet->SetCellValue('HM' . $rowCount, $row['ATT9']);
			$sheet->SetCellValue('HN' . $rowCount, $row['ATT10']);
			$sheet->SetCellValue('HO' . $rowCount, $row['ATT11']);
			$sheet->SetCellValue('HP' . $rowCount, $row['ATT12']);
			$sheet->SetCellValue('HQ' . $rowCount, $row['ATT13']);
			$sheet->SetCellValue('HR' . $rowCount, $row['ATT14']);
			// $sheet->SetCellValue('HS' . $rowCount, $row['ATT15']);

			$sheet->SetCellValue('HT' . $rowCount, $row['BEH1']);
			$sheet->SetCellValue('HU' . $rowCount, $row['BEH2']);
			$sheet->SetCellValue('HV' . $rowCount, $row['BEH3']);
			$sheet->SetCellValue('HW' . $rowCount, $row['BEH4']);
			$sheet->SetCellValue('HX' . $rowCount, $row['BEH5']);
			$sheet->SetCellValue('HY' . $rowCount, $row['BEH6']);
			$sheet->SetCellValue('HZ' . $rowCount, $row['BEH7']);
			$sheet->SetCellValue('IA' . $rowCount, $row['BEH8']);
			$sheet->SetCellValue('IB' . $rowCount, $row['BEH9']);
			$sheet->SetCellValue('IC' . $rowCount, $row['BEH10']);
			$sheet->SetCellValue('ID' . $rowCount, $row['BEH11']);
			$sheet->SetCellValue('IE' . $rowCount, $row['BEH12']);	
			$sheet->SetCellValue('IF' . $rowCount, $row['BEH13']);
			$sheet->SetCellValue('IG' . $rowCount, $row['BEH14']);
			$sheet->SetCellValue('IH' . $rowCount, $row['BEH15']);
			$sheet->SetCellValue('II' . $rowCount, $row['BEH16']);
			$sheet->SetCellValue('IJ' . $rowCount, $row['BEH17']);
			$sheet->SetCellValue('IK' . $rowCount, $row['BEH18']);
			$sheet->SetCellValue('IL' . $rowCount, $row['BEH19']);
			$sheet->SetCellValue('IM' . $rowCount, $row['BEH20']);
			$sheet->SetCellValue('IN' . $rowCount, $row['BEH21']);
			$sheet->SetCellValue('IO' . $rowCount, $row['BEH22']);
			$sheet->SetCellValue('IP' . $rowCount, $row['BEH23']);
			$rowCount++;
		}
		
		foreach(range('A','D') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}

		
		$filename = "Assessment_form_list". date("Y-m-d-H-i-s").".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  

		$objWriter->save('php://output'); 

	}
}
/*---------------------------- END Controller Class --------------------------------*/
