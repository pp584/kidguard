<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Basic_information.php ]
 */
class Basic_information extends CRUD_Controller
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
		
		$this->load->model('surway/Basic_information_model', 'Basic_information');
		$this->Basic_information->session_name = 'surway_basic_information';

		$this->data['page_url'] = site_url('surway/basic_information');
		
		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/surway/basic_information.js?ft='. filemtime('assets/js_modules/surway/basic_information.js');
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
		$this->session->unset_userdata($this->Basic_information->session_name . '_search_field');
		$this->session->unset_userdata($this->Basic_information->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Basic_information', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Basic_information->session_name . '_search_field' => $search_field, $this->Basic_information->session_name . '_value' => $value );
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Basic_information->session_name . '_search_field');
			$value = $this->session->userdata($this->Basic_information->session_name . '_value');
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
			$this->Basic_information->order_field = $field;
			$this->Basic_information->order_sort = $sort;
		}
		$results = $this->Basic_information->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('surway/basic_information');
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

		$this->render_view('surway/basic_information/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Basic_information', 'url' => site_url('surway/basic_information')),
						array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Basic_information->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('surway/basic_information/preview_view');
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
						array('title' => 'Basic_information', 'url' => site_url('surway/basic_information')),
						array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['provinces_province_option_list'] = $this->Basic_information->returnOptionList("provinces", "id", "name_th" );
		
		$this->render_view('surway/basic_information/add_view');
	}

	// ------------------------------------------------------------------------


	public function import_excel_form() 
	{
		$this->breadcrumb_data['breadcrumb'] = array(
						array('title' => 'Basic_information', 'url' => site_url('surway/basic_information')),
						array('title' => 'นำข้อมูลด้วย Excel', 'url' => '#', 'class' => 'active')
		);
		$this->data['start_row'] = 2;
		$this->render_view('surway/basic_information/addnew_import_form');

	}
	
	public function read_excel() 
	{
		// load excel library
		$this->load->library('surway/Excel');
		
		$table_list = '';
		$success = FALSE;
		$message = '';
		
		if( isset($_FILES) && isset($_FILES["FileUpload"]["name"]) && $_FILES["FileUpload"]["name"] != '' ){
	
			$fileName = $_FILES["FileUpload"]["name"];
			$fileType = $_FILES["FileUpload"]["type"];
			$fileSize = ($_FILES["FileUpload"]["size"] / 1024) . " kB";
			$fileTmp = $_FILES["FileUpload"]["tmp_name"];
			
			$deniedExts = array("exe", "bat", "inf", "pif", "com", "scr", "vbs", "html", "asp", "php");
			$ext = explode(".", $fileName);
			$extension = end($ext);
			if (!in_array($extension, $deniedExts) )
			{
				if ($_FILES["FileUpload"]["error"] > 0)
				{
					$filesError = array(
							"There is no error, the file uploaded with success",
							"The uploaded file exceeds the upload_max_filesize directive in php.ini",
							"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
							"The uploaded file was only partially uploaded",
							"No file was uploaded",
							"Missing a temporary folder"
					);
					$errorMsg = isset($filesError[$_FILES["FileUpload"]["error"]]) ? $filesError[$_FILES["FileUpload"]["error"]] : '';
					$message = "เกิดข้อผิดพลาด : " . $errorMsg;
				}
				else
				{
					
					$inputFileType = PHPExcel_IOFactory::identify($fileTmp);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($fileTmp);
					
					$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();
					
					$startRow = $this->input->post('start_row', true);

					$dataRow = $objWorksheet->rangeToArray('A'.$startRow.':'.$highestColumn.$highestRow,null, true, true, true);
				
					$fieldName = array (
					);
				
					if(!empty($dataRow)){
						$success = TRUE;
						$no = 0;
						foreach($dataRow as $row_data){
							if(empty(array_filter($row_data))){
								continue;
							}
							$no++;
							$table_list .= '<tr>';
							$table_list .= '<td>'.$no.'<input name="insert_excel['.$no.']" value="'.$no.'" type="hidden" /></td>';
							$col = 0;
							foreach($row_data as $td_data){
								if(isset($fieldName[$col])){
									$field_name = $fieldName[$col];
									
									$class_bg = '';
									$td_data = trim($td_data);
									$check_value = $td_data;
									
									$table_list .= '<td'.$class_bg.'>'.$td_data;
									$table_list .= '<input name="'.$field_name.'['.$no.']" value="'.$check_value.'" type="hidden" />';
									$table_list .= '</td>';
									
								}
								$col++;
							}
							$table_list .= '</tr>';
						}
						$table_list = htmlspecialchars($table_list);
					}else{
						$message = 'ไม่พบข้อมูลในไฟล์ ' .  $fileName;
					}
				}
			}else{
				$message = 'ไม่อนุญาติให้อัพโหลดไฟล์ *.' . $extension . 'เข้าระบบครับ';
			}
		}
		
		$json = json_encode(array(
					'is_successful' => $success,
					'message' => $message,
					'table_list' => $table_list
				), ENT_QUOTES);
				
		echo $json;
	}

	public function save_excel_data() 
	{
		$post_data = $this->input->post(NULL, TRUE);
		
		if( !empty($post_data['insert_excel']) ){
		
			$insert_data = array();
			foreach($post_data['insert_excel'] as $index=>$no){
				$insert_data[] = array(

				);
			}
		
			$num_rows = $this->Basic_information->save_excel_data($insert_data);
			if($num_rows){
				$success = TRUE;
				$message = '<strong>นำเข้าข้อมูลเรียบร้อย '.$num_rows.' รายการ</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Basic_information->error_message;
			}

		}else{
			$success = FALSE;
			$message = 'ไม่พบข้อมูลในแบบฟอร์มที่บันทึก';
		}
		
		$json = array(
					'is_successful' => $success,
					'message' =>  $message
		);
		
		echo json_encode($json);
	}

	public function multiple_select($value, $name)
	{
		$arr_choice = $this->input->post($name.'[]');
		if(!empty($arr_choice)){
			$arr_choice = array_filter($arr_choice, function($v){
				return $v !== '';
			});
		}
		if(empty($arr_choice)):
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

		$frm->set_rules('province', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('sex', 'เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('age', 'อายุ', 'trim|required');
		$frm->set_rules('edu1', 'สถานภาพการศึกษา[1=ศึกษาอยู่,2=ไม่ได้ศึกษา]', 'trim|required');
		$frm->set_rules('edu_id', 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่[1=ม1,2=ม2,3=ม3,4=ม4,5=ม5,6=ม6]', 'trim|required');
		$frm->set_rules('sisbro', 'จำนวนพี่น้อง[1=เป็นลูกคนเดียว,2=มีพี่น้องรวมทั้งหมด]', 'trim|required');
		$frm->set_rules('sisbro_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('family_status', 'สถานภาพทางครอบครัว[1=บิดามารดาอยู่ด้วยกัน,2=บิดามารดาแยกกันอยู่,3=บิดาเสียชีวิตแล้ว,4=มารดาเสียชีวิตแล้ว,5=บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required');
		$frm->set_rules('dad_job', 'อาชีพของบิดา[1=เกษตร,2=รับราชการ,3=พนักงานเอกชน,4=รัฐวิสาหกิจ,5=รับจ้างทั่วไป,6=ธุรกิจส่วนตัว,7=อื่นๆ]', 'trim|required');
		$frm->set_rules('dad_job_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('mom_job', 'อาชีพของมารดา[1=เกษตร,2=รับราชการ,3=พนักงานเอกชน,4=รัฐวิสาหกิจ,5=รับจ้างทั่วไป,6=ธุรกิจส่วนตัว,7=อื่นๆ]', 'trim|required');
		$frm->set_rules('mom_job_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('family_earn', 'รายได้ของครบอครัว[1=ต่ำกว่า15000บาท,2=15000-30000,3=30001-40000,4=40001-50000,5=มากกว่า50000]', 'trim|required');
		$frm->set_rules('consult', 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง(ตอบได้มากกว่า1ข้อ)', 'trim|callback_multiple_select[consult]');
		$frm->set_rules('consult_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('try_drugs', 'ท่านเคยถูกให้ลองสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required');
		$frm->set_rules('type_drugs', 'ท่านเคยลองใช้สารเสพติดใดบ้าง(ตอบได้มากกว่า1ข้อ)', 'trim|callback_multiple_select[type_drugs]');
		$frm->set_rules('type_drugs_remain', 'อื่นๆ ', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province');
			$message .= form_error('sex');
			$message .= form_error('age');
			$message .= form_error('edu1');
			$message .= form_error('edu_id');
			$message .= form_error('sisbro');
			$message .= form_error('sisbro_remain');
			$message .= form_error('family_status');
			$message .= form_error('dad_job');
			$message .= form_error('dad_job_remain');
			$message .= form_error('mom_job');
			$message .= form_error('mom_job_remain');
			$message .= form_error('family_earn');
			$message .= form_error('consult');
			$message .= form_error('consult_remain');
			$message .= form_error('try_drugs');
			$message .= form_error('type_drugs');
			$message .= form_error('type_drugs_remain');
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

		$frm->set_rules('province', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('sex', 'เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('age', 'อายุ', 'trim|required');
		$frm->set_rules('edu1', 'สถานภาพการศึกษา[1=ศึกษาอยู่,2=ไม่ได้ศึกษา]', 'trim|required');
		$frm->set_rules('edu_id', 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่[1=ม1,2=ม2,3=ม3,4=ม4,5=ม5,6=ม6]', 'trim|required');
		$frm->set_rules('sisbro', 'จำนวนพี่น้อง[1=เป็นลูกคนเดียว,2=มีพี่น้องรวมทั้งหมด]', 'trim|required');
		$frm->set_rules('sisbro_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('family_status', 'สถานภาพทางครอบครัว[1=บิดามารดาอยู่ด้วยกัน,2=บิดามารดาแยกกันอยู่,3=บิดาเสียชีวิตแล้ว,4=มารดาเสียชีวิตแล้ว,5=บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required');
		$frm->set_rules('dad_job', 'อาชีพของบิดา[1=เกษตร,2=รับราชการ,3=พนักงานเอกชน,4=รัฐวิสาหกิจ,5=รับจ้างทั่วไป,6=ธุรกิจส่วนตัว,7=อื่นๆ]', 'trim|required');
		$frm->set_rules('dad_job_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('mom_job', 'อาชีพของมารดา[1=เกษตร,2=รับราชการ,3=พนักงานเอกชน,4=รัฐวิสาหกิจ,5=รับจ้างทั่วไป,6=ธุรกิจส่วนตัว,7=อื่นๆ]', 'trim|required');
		$frm->set_rules('mom_job_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('family_earn', 'รายได้ของครบอครัว[1=ต่ำกว่า15000บาท,2=15000-30000,3=30001-40000,4=40001-50000,5=มากกว่า50000]', 'trim|required');
		$frm->set_rules('consult', 'เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง(ตอบได้มากกว่า1ข้อ)', 'trim|callback_multiple_select[consult]');
		$frm->set_rules('consult_remain', 'อื่นๆ ', 'trim|required');
		$frm->set_rules('try_drugs', 'ท่านเคยถูกให้ลองสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required');
		$frm->set_rules('type_drugs', 'ท่านเคยลองใช้สารเสพติดใดบ้าง(ตอบได้มากกว่า1ข้อ)', 'trim|callback_multiple_select[type_drugs]');
		$frm->set_rules('type_drugs_remain', 'อื่นๆ ', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province');
			$message .= form_error('sex');
			$message .= form_error('age');
			$message .= form_error('edu1');
			$message .= form_error('edu_id');
			$message .= form_error('sisbro');
			$message .= form_error('sisbro_remain');
			$message .= form_error('family_status');
			$message .= form_error('dad_job');
			$message .= form_error('dad_job_remain');
			$message .= form_error('mom_job');
			$message .= form_error('mom_job_remain');
			$message .= form_error('family_earn');
			$message .= form_error('consult');
			$message .= form_error('consult_remain');
			$message .= form_error('try_drugs');
			$message .= form_error('type_drugs');
			$message .= form_error('type_drugs_remain');
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
				$post['consult'] = implode(',', $post['consult']);
				$post['type_drugs'] = implode(',', $post['type_drugs']);
			$id = $this->Basic_information->create($post);
			if($id != ''){
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			}else{
				$success = FALSE;
				$message = 'Error : ' . $this->Basic_information->error_message;
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
						array('title' => 'Basic_information', 'url' => site_url('surway/basic_information')),
						array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Basic_information->load($id);
			if (empty($results)) {
			$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['provinces_province_option_list'] = $this->Basic_information->returnOptionList("provinces", "id", "name_th" );
				$this->render_view('surway/basic_information/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$basic_information_id = ci_decrypt($data['encrypt_basic_information_id']);
		if($basic_information_id==''){
			$error .= '- รหัส basic_information_id';
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

				$post['consult'] = implode(',', $post['consult']);
				$post['type_drugs'] = implode(',', $post['type_drugs']);
			$result = $this->Basic_information->update($post);
			if($result == false){
				$message = $this->Basic_information->error_message;
				$ok = FALSE;
			}else{
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Basic_information->error_message;
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
			$result = $this->Basic_information->delete($post);
			if($result == false){
				$message = $this->Basic_information->error_message;
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
			$pk1 = $data[$i]['basic_information_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if($pk1 != ''){
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_basic_information_id'] = $pk1;
			$data[$i]['preview_sex'] = $this->setSexSubject($data[$i]['sex']);
			$data[$i]['preview_edu1'] = $this->setEdu1Subject($data[$i]['edu1']);
			$data[$i]['preview_edu_id'] = $this->setEduIdSubject($data[$i]['edu_id']);
			$data[$i]['preview_sisbro'] = $this->setSisbroSubject($data[$i]['sisbro']);
			$data[$i]['preview_family_status'] = $this->setFamilyStatusSubject($data[$i]['family_status']);
			$data[$i]['preview_dad_job'] = $this->setDadJobSubject($data[$i]['dad_job']);
			$data[$i]['preview_mom_job'] = $this->setMomJobSubject($data[$i]['mom_job']);
			$data[$i]['preview_family_earn'] = $this->setFamilyEarnSubject($data[$i]['family_earn']);
			$data[$i]['preview_consult'] = $this->setConsultSubject($data[$i]['consult']);
			$data[$i]['preview_try_drugs'] = $this->setTryDrugsSubject($data[$i]['try_drugs']);
			$data[$i]['preview_type_drugs'] = $this->setTypeDrugsSubject($data[$i]['type_drugs']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setSexSubject($value)
	{
		$subject = '';
		switch($value){
			case 1:
				$subject = 'ชาย';
				break;
			case 2:
				$subject = 'หญิง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setEdu1Subject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'ศึกษาอยู่';
				break;
			case '2':
				$subject = 'ไม่ได้ศึกษา';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setEduIdSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'ม1';
				break;
			case '2':
				$subject = 'ม2';
				break;
			case '3':
				$subject = 'ม3';
				break;
			case '4':
				$subject = 'ม4';
				break;
			case '5':
				$subject = 'ม5';
				break;
			case '6':
				$subject = 'ม6';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setSisbroSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'เป็นลูกคนเดียว';
				break;
			case '2':
				$subject = 'มีพี่น้องรวมทั้งหมด';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setFamilyStatusSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'บิดามารดาอยู่ด้วยกัน';
				break;
			case '2':
				$subject = 'บิดามารดาแยกกันอยู่';
				break;
			case '3':
				$subject = 'บิดาเสียชีวิตแล้ว';
				break;
			case '4':
				$subject = 'มารดาเสียชีวิตแล้ว';
				break;
			case '5':
				$subject = 'บิดาและมารดาเสียชีวิตแล้ว';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setDadJobSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'เกษตร';
				break;
			case '2':
				$subject = 'รับราชการ';
				break;
			case '3':
				$subject = 'พนักงานเอกชน';
				break;
			case '4':
				$subject = 'รัฐวิสาหกิจ';
				break;
			case '5':
				$subject = 'รับจ้างทั่วไป';
				break;
			case '6':
				$subject = 'ธุรกิจส่วนตัว';
				break;
			case '7':
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setMomJobSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'เกษตร';
				break;
			case '2':
				$subject = 'รับราชการ';
				break;
			case '3':
				$subject = 'พนักงานเอกชน';
				break;
			case '4':
				$subject = 'รัฐวิสาหกิจ';
				break;
			case '5':
				$subject = 'รับจ้างทั่วไป';
				break;
			case '6':
				$subject = 'ธุรกิจส่วนตัว';
				break;
			case '7':
				$subject = 'อื่นๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setFamilyEarnSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'ต่ำกว่า15000บาท';
				break;
			case '2':
				$subject = '15000-30000';
				break;
			case '3':
				$subject = '30001-40000';
				break;
			case '4':
				$subject = '40001-50000';
				break;
			case '5':
				$subject = 'มากกว่า50000';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setConsultSubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach($arr as $value){
			switch($value){
				case '1':
					$subject .= $comma .  'บิดา';
					break;
				case '2':
					$subject .= $comma .  'มารดา';
					break;
				case '3':
					$subject .= $comma .  'ญาติ';
					break;
				case '4':
					$subject .= $comma .  'เพื่อน';
					break;
				case '5':
					$subject .= $comma .  'ครู';
					break;
				case '6':
					$subject .= $comma .  'คนรัก';
					break;
				case '7':
					$subject .= $comma .  'อื่นๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setTryDrugsSubject($value)
	{
		$subject = '';
		switch($value){
			case '1':
				$subject = 'เคย';
				break;
			case '2':
				$subject = 'ไม่เคย';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setTypeDrugsSubject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach($arr as $value){
			switch($value){
				case '1':
					$subject .= $comma .  'ยาบ้า';
					break;
				case '2':
					$subject .= $comma .  'ยาอี';
					break;
				case '3':
					$subject .= $comma .  'ยาเค';
					break;
				case '4':
					$subject .= $comma .  'ฝิ่น';
					break;
				case '5':
					$subject .= $comma .  'เฮโรอีน';
					break;
				case '6':
					$subject .= $comma .  'กัญชา';
					break;
				case '7':
					$subject .= $comma .  'ใบกระท่อม';
					break;
				case '8':
					$subject .= $comma .  'ทินเนอร์';
					break;
				case '9':
					$subject .= $comma .  'ยาไอซ์';
					break;
				case '10':
					$subject .= $comma .  'บุหรี่';
					break;
				case '11':
					$subject .= $comma .  'สุรา';
					break;
				case '12':
					$subject .= $comma .  'อื่นๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['basic_information_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if($pk1 != ''){
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_basic_information_id'] = $pk1;


		$provinceNameTh = $this->table('provinces')->get_value('name_th')->where("id = '$data[province]'");
		$this->data['provinceNameTh'] = $provinceNameTh;

		$this->data['record_basic_information_id'] = $data['basic_information_id'];
		$this->data['record_province'] = $data['province'];
		$this->data['record_section'] = $data['section'];
		$this->data['preview_sex'] = $this->setSexSubject($data['sex']);
		$this->data['record_sex'] = $data['sex'];
		$this->data['record_age'] = $data['age'];
		$this->data['preview_edu1'] = $this->setEdu1Subject($data['edu1']);
		$this->data['record_edu1'] = $data['edu1'];
		$this->data['preview_edu_id'] = $this->setEduIdSubject($data['edu_id']);
		$this->data['record_edu_id'] = $data['edu_id'];
		$this->data['preview_sisbro'] = $this->setSisbroSubject($data['sisbro']);
		$this->data['record_sisbro'] = $data['sisbro'];
		$this->data['record_sisbro_remain'] = $data['sisbro_remain'];
		$this->data['preview_family_status'] = $this->setFamilyStatusSubject($data['family_status']);
		$this->data['record_family_status'] = $data['family_status'];
		$this->data['preview_dad_job'] = $this->setDadJobSubject($data['dad_job']);
		$this->data['record_dad_job'] = $data['dad_job'];
		$this->data['record_dad_job_remain'] = $data['dad_job_remain'];
		$this->data['preview_mom_job'] = $this->setMomJobSubject($data['mom_job']);
		$this->data['record_mom_job'] = $data['mom_job'];
		$this->data['record_mom_job_remain'] = $data['mom_job_remain'];
		$this->data['preview_family_earn'] = $this->setFamilyEarnSubject($data['family_earn']);
		$this->data['record_family_earn'] = $data['family_earn'];
		$this->data['preview_consult'] = $this->setConsultSubject($data['consult']);
		$this->data['record_consult'] = $data['consult'];
		$this->data['record_consult_remain'] = $data['consult_remain'];
		$this->data['preview_try_drugs'] = $this->setTryDrugsSubject($data['try_drugs']);
		$this->data['record_try_drugs'] = $data['try_drugs'];
		$this->data['preview_type_drugs'] = $this->setTypeDrugsSubject($data['type_drugs']);
		$this->data['record_type_drugs'] = $data['type_drugs'];
		$this->data['record_type_drugs_remain'] = $data['type_drugs_remain'];


	}
}
/*---------------------------- END Controller Class --------------------------------*/
