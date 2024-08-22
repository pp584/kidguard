<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Users.php ]
 */
class Users extends MEMBER_Controller
{

	private $per_page;
	private $another_js;
	private $another_css;
	private $upload_store_path;
	private $file_allow;
	private $file_allow_type;
	private $file_allow_mime;
	private $file_check_name;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 30;
		$this->num_links = 6;
		$this->uri_segment = 4;
		$this->load->model('users/Users_model', 'Users');
		$this->Users->session_name = 'users_users';

		$this->load->model('FileUpload_model', 'FileUpload');
		$this->data['page_url'] = site_url('users/users');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');
		$this->upload_store_path = './assets/uploads/users/';
		$this->file_allow = array(
			'application/pdf' => 'pdf',
			'application/msword' => 'doc',
			'application/vnd.ms-msword' => 'doc',
			'application/vnd.ms-excel' => 'xls',
			'application/powerpoint' => 'ppt',
			'application/vnd.ms-powerpoint' => 'ppt',
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
			'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
			'application/vnd.oasis.opendocument.text' => 'odt',
			'application/vnd.oasis.opendocument.spreadsheet' => 'ods',
			'application/vnd.oasis.opendocument.presentation' => 'odp',
			'image/bmp' => 'bmp',
			'image/png' => 'png',
			'image/pjpeg' => 'jpeg',
			'image/jpeg' => 'jpg'
		);
		$this->file_allow_type = array_values($this->file_allow);
		$this->file_allow_mime = array_keys($this->file_allow);
		$this->file_check_name = '';

		$js_url = 'assets/js_modules/users/users.js?ft=' . filemtime('assets/js_modules/users/users.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'จัดการผู้ใช้งาน', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Users->session_name . '_search_field');
		$this->session->unset_userdata($this->Users->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'จัดการผู้ใช้งาน', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Users->session_name . '_search_field' => $search_field, $this->Users->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Users->session_name . '_search_field');
			$value = $this->session->userdata($this->Users->session_name . '_value');
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
			$this->Users->order_field = $field;
			$this->Users->order_sort = $sort;
		}
		$results = $this->Users->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('users/users');
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

		$this->render_view('users/users/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'จัดการผู้ใช้งาน', 'url' => site_url('users/users')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Users->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('users/users/preview_view');
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
			array('title' => 'จัดการผู้ใช้งาน', 'url' => site_url('users/users')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['tb_members_prefix_prefix_option_list'] = $this->Users->returnOptionList("tb_members_prefix", "prefix_name", "prefix_name");
		$this->data['tb_members_level_level_option_list'] = $this->Users->returnOptionList("tb_members_level", "level_value", "level_title");
		$this->data['services_department_id_option_list'] = $this->Users->returnOptionList("services", "services_id", "services_name");
		$this->data['preview_photo'] = '<div id="div_preview_photo" class="py-3 div_file_preview" style="clear:both"><img id="photo_preview" height="300"/></div>';
		$this->data['record_photo_label'] = '';
		$this->render_view('users/users/add_view');
	}

	// ------------------------------------------------------------------------


	public function import_excel_form()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Users', 'url' => site_url('users/users')),
			array('title' => 'นำข้อมูลด้วย Excel', 'url' => '#', 'class' => 'active')
		);
		$this->data['start_row'] = 2;
		$this->render_view('users/users/addnew_import_form');
	}

	public function read_excel()
	{
		// load excel library
		$this->load->library('users/Excel');

		$table_list = '';
		$success = FALSE;
		$message = '';

		if (isset($_FILES) && isset($_FILES["FileUpload"]["name"]) && $_FILES["FileUpload"]["name"] != '') {

			$fileName = $_FILES["FileUpload"]["name"];
			$fileType = $_FILES["FileUpload"]["type"];
			$fileSize = ($_FILES["FileUpload"]["size"] / 1024) . " kB";
			$fileTmp = $_FILES["FileUpload"]["tmp_name"];

			$deniedExts = array("exe", "bat", "inf", "pif", "com", "scr", "vbs", "html", "asp", "php");
			$ext = explode(".", $fileName);
			$extension = end($ext);
			if (!in_array($extension, $deniedExts)) {
				if ($_FILES["FileUpload"]["error"] > 0) {
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
				} else {

					$inputFileType = PHPExcel_IOFactory::identify($fileTmp);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($fileTmp);

					$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();

					$startRow = $this->input->post('start_row', true);

					$dataRow = $objWorksheet->rangeToArray('A' . $startRow . ':' . $highestColumn . $highestRow, null, true, true, true);

					$fieldName = array(
						0 => 'username',
						1 => 'email',
						2 => 'password',
						3 => 'prefix',
						4 => 'firstname',
						5 => 'lastname',
						6 => 'level',
						7 => 'tel_number',
					);

					if (!empty($dataRow)) {
						$success = TRUE;
						$no = 0;
						foreach ($dataRow as $row_data) {
							if (empty(array_filter($row_data))) {
								continue;
							}
							$no++;
							$table_list .= '<tr>';
							$table_list .= '<td>' . $no . '<input name="insert_excel[' . $no . ']" value="' . $no . '" type="hidden" /></td>';
							$col = 0;
							foreach ($row_data as $td_data) {
								if (isset($fieldName[$col])) {
									$field_name = $fieldName[$col];

									$class_bg = '';
									$td_data = trim($td_data);
									$check_value = $td_data;

									if ($field_name == 'prefix') {
										$check_value = $this->Users->getValueOf("tb_members_prefix", "prefix_name", "prefix_name = '$td_data'", $this->db);
									}
									if ($check_value == '') {
										$class_bg = ' class="bg-danger" title="ไม่พบรหัสที่เชื่อมโยงกับข้อมูล ' . $td_data . '"';
									}

									if ($field_name == 'level') {
										$check_value = $this->Users->getValueOf("tb_members_level", "level_value", "level_title = '$td_data'", $this->db);
									}
									if ($check_value == '') {
										$class_bg = ' class="bg-danger" title="ไม่พบรหัสที่เชื่อมโยงกับข้อมูล ' . $td_data . '"';
									}

									$check_exists = '';
									if ($field_name == 'username') {
										$check_exists = $this->Users->getValueOf("tb_members", "username", "username = '$td_data'", $this->db);
									}
									if ($check_exists != '') {
										$check_value = '';
										$class_bg = ' class="bg-danger" title="พบข้อมูลซ้ำกัน ' . $td_data . '"';
									}

									$check_exists = '';
									if ($field_name == 'email') {
										$check_exists = $this->Users->getValueOf("tb_members", "email", "email = '$td_data'", $this->db);
									}
									if ($check_exists != '') {
										$check_value = '';
										$class_bg = ' class="bg-danger" title="พบข้อมูลซ้ำกัน ' . $td_data . '"';
									}

									$table_list .= '<td' . $class_bg . '>' . $td_data;
									$table_list .= '<input name="' . $field_name . '[' . $no . ']" value="' . $check_value . '" type="hidden" />';
									$table_list .= '</td>';
								}
								$col++;
							}
							$table_list .= '</tr>';
						}
						$table_list = htmlspecialchars($table_list);
					} else {
						$message = 'ไม่พบข้อมูลในไฟล์ ' .  $fileName;
					}
				}
			} else {
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

		if (!empty($post_data['insert_excel'])) {

			$insert_data = array();
			foreach ($post_data['insert_excel'] as $index => $no) {
				$insert_data[] = array(
					'username' => $post_data['username'][$index],
					'email' => $post_data['email'][$index],
					'password' => $post_data['password'][$index],
					'prefix' => $post_data['prefix'][$index],
					'firstname' => $post_data['firstname'][$index],
					'lastname' => $post_data['lastname'][$index],
					'level' => $post_data['level'][$index],
					'tel_number' => $post_data['tel_number'][$index]
				);
			}

			$num_rows = $this->Users->save_excel_data($insert_data);
			if ($num_rows) {
				$success = TRUE;
				$message = '<strong>นำเข้าข้อมูลเรียบร้อย ' . $num_rows . ' รายการ</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Users->error_message;
			}
		} else {
			$success = FALSE;
			$message = 'ไม่พบข้อมูลในแบบฟอร์มที่บันทึก';
		}

		$json = array(
			'is_successful' => $success,
			'message' =>  $message
		);

		echo json_encode($json);
	}
	/**
	 * Default Validation
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('username', 'ชื่อผู้ใช้งาน', 'trim|required');
		$frm->set_rules('email', 'อีเมล', 'trim|required');
		$frm->set_rules('password', 'รหัสผ่าน', 'trim|required');
		$frm->set_rules('prefix', 'คำนำหน้า', 'trim|required');
		$frm->set_rules('firstname', 'ชื่อ', 'trim|required');
		$frm->set_rules('lastname', 'นามสกุล', 'trim|required');
		$frm->set_rules('sex', 'เพศ', 'trim|required|is_natural');
		$frm->set_rules('level', 'สิทธิ์การใช้งาน', 'trim|required|is_natural');
		$frm->set_rules('tel_number', 'เบอร์โทรศัพท์', 'trim|required');
		$frm->set_rules('line_id', 'ไอดี Line', 'trim|required');
		// $frm->set_rules('department_id', 'อ้างอิง ไอดีสังกัด', 'trim|required|is_natural');
		//file upload
		$check_file = FALSE;
		if ($this->input->post('photo_label') == '') {
			$check_file = TRUE;
		}
		if ($check_file == TRUE) {
			if (empty($_FILES['photo']['name'])) {
				$frm->set_rules('photo', 'ภาพประจำตัว', 'trim|required');
			}
		}

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('username');
			$message .= form_error('email');
			$message .= form_error('password');
			$message .= form_error('prefix');
			$message .= form_error('firstname');
			$message .= form_error('lastname');
			$message .= form_error('sex');
			$message .= form_error('level');
			$message .= form_error('tel_number');
			$message .= form_error('line_id');
			// $message .= form_error('department_id');
			$message .= form_error('photo');
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

		$frm->set_rules('username', 'ชื่อผู้ใช้งาน', 'trim|required');
		$frm->set_rules('email', 'อีเมล', 'trim|required');
		// $frm->set_rules('password', 'รหัสผ่าน', 'trim|required');
		$frm->set_rules('prefix', 'คำนำหน้า', 'trim|required');
		$frm->set_rules('firstname', 'ชื่อ', 'trim|required');
		$frm->set_rules('lastname', 'นามสกุล', 'trim|required');
		$frm->set_rules('sex', 'เพศ', 'trim|required|is_natural');
		$frm->set_rules('level', 'สิทธิ์การใช้งาน', 'trim|required|is_natural');
		$frm->set_rules('tel_number', 'เบอร์โทรศัพท์', 'trim|required');
		$frm->set_rules('line_id', 'ไอดี Line', 'trim|required');
		// $frm->set_rules('department_id', 'อ้างอิง ไอดีสังกัด', 'trim|required|is_natural');
		//file upload
		$check_file = FALSE;
		if ($this->input->post('photo_label') == '') {
			$check_file = TRUE;
		}
		if ($check_file == TRUE) {
			if (empty($_FILES['photo']['name'])) {
				$frm->set_rules('photo', 'ภาพประจำตัว', 'trim|required');
			}
		}

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('username');
			$message .= form_error('email');
			// $message .= form_error('password');
			$message .= form_error('prefix');
			$message .= form_error('firstname');
			$message .= form_error('lastname');
			$message .= form_error('sex');
			$message .= form_error('level');
			$message .= form_error('tel_number');
			$message .= form_error('line_id');
			// $message .= form_error('department_id');
			$message .= form_error('photo');
			return $message;
		}
	}

	// ------------------------------------------------------------------------

	public function formValidateWithFile()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;
		$message = '';
		if (!empty($_FILES['photo']['name'])) {
			$this->file_check_name = 'photo';
			$frm->set_rules('photo', 'ภาพประจำตัว', 'callback_file_check');
			if ($frm->run() == FALSE) {
				$message .= form_error('photo');
			}
		}
		return $message;
	}
	public function file_check()
	{
		$allowed_mime_type_arr = $this->file_allow_mime;
		$mime = get_mime_by_extension($_FILES[$this->file_check_name]['name']);
		if (isset($_FILES[$this->file_check_name]['name']) && $_FILES[$this->file_check_name]['name'] != '') {
			if (in_array($mime, $allowed_mime_type_arr)) {
				return true;
			} else {
				$this->form_validation->set_message('file_check', '- กรุณาเลือกประเภทไฟล์  ' . implode(" | ", $this->file_allow_type) . ' เท่านั้นครับ');
				return false;
			}
		} else {
			$this->form_validation->set_message('file_check', '- กรุณาเลือกไฟล์ %s');
			return false;
		}
	}
	private function uploadFile($file_name, $dir = '')
	{
		if ($dir != '' && substr($dir, 0, 1) != '/') {
			$dir = '/' . $dir;
		}
		$path = $this->upload_store_path . (date('Y') + 543) . $dir;
		//เปิดคอนฟิก Auto ชื่อไฟล์ใหม่ด้วย
		$config['upload_path']          = $path;
		$config['allowed_types']        = $this->file_allow_type;
		$config['encrypt_name']		= TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($file_name)) {
			$encrypt_name = $this->upload->file_name;
			$orig_name = $this->upload->orig_name;
			$this->FileUpload->create($encrypt_name, $orig_name);
			$file_path = $path . '/' . $encrypt_name; //ไม่ต้องใช้ Path เต็ม
			$data = array(
				'result' => TRUE,
				'file_path' => $file_path,
				'error' => ''
			);
		} else {
			$data = array(
				'result' => FALSE,
				'error' => $this->upload->display_errors()
			);
		}
		return $data;
	}
	private function removeFile($file_path)
	{
		if ($file_path != '') {
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
	}
	/**
	 * Create new record
	 */
	public function save()
	{

		$message = '';
		$message .= $this->formValidateWithFile();
		$message .= $this->formValidate();
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$post = $this->input->post(NULL, TRUE);

			$upload_error = 0;
			$upload_error_msg = '';
			$post['photo'] = '';
			if (!empty($_FILES['photo']['name'])) {
				$arr = $this->uploadFile('photo');
				if ($arr['result'] == TRUE) {
					$post['photo'] = $arr['file_path'];
				} else {
					$upload_error++;
					$upload_error_msg .= '<br/>' . print_r($arr['error'], TRUE);
				}
			}
			$encrypt_id = '';
			if ($upload_error == 0) {
				$success = TRUE;
				$id = $this->Users->create($post);
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = $upload_error_msg;
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
			array('title' => 'จัดการผู้ใช้งาน', 'url' => site_url('users/users')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Users->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_birthday'] = setThaiDate($results['birthday']);
				$this->data['record_create_datetime'] = setThaiDate($results['create_datetime']);
				$this->data['record_modify_datetime'] = setThaiDate($results['modify_datetime']);

				$this->data['tb_members_prefix_prefix_option_list'] = $this->Users->returnOptionList("tb_members_prefix", "prefix_name", "prefix_name");
				$this->data['tb_members_level_level_option_list'] = $this->Users->returnOptionList("tb_members_level", "level_value", "level_title");
				$this->data['services_department_id_option_list'] = $this->Users->returnOptionList("services", "services_id", "services_name");
				$this->render_view('users/users/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$userid = ci_decrypt($data['encrypt_userid']);
		if ($userid == '') {
			$error .= '- รหัส userid';
		}
		return $error;
	}

	/**
	 * Update Record
	 */
	public function update()
	{
		$message = '';
		$message .= $this->formValidateWithFile();
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

			$upload_error = 0;
			$upload_error_msg = '';
			if (!empty($_FILES['photo']['name'])) {
				$arr = $this->uploadFile('photo');
				if ($arr['result'] == TRUE) {
					$post['photo'] = $arr['file_path'];
					$this->removeFile($post['photo_old_path']);
					$arr = explode('/', $post['photo_old_path']);
					$encrypt_name = end($arr);
					$this->FileUpload->delete($encrypt_name);
				} else {
					$upload_error++;
					$upload_error_msg .= '<br/>' . print_r($arr['error'], TRUE);
				}
			}

			if ($upload_error == 0) {
				$result = $this->Users->update($post);
				if ($result == false) {
					$message = $this->Users->error_message;
					$ok = FALSE;
				} else {
					$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Users->error_message;
					$ok = TRUE;
				}
			} else {
				$ok = FALSE;
				$message = $upload_error_msg;
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
			$result = $this->Users->delete($post);
			if ($result == false) {
				$message = $this->Users->error_message;
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
			$pk1 = $data[$i]['userid'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_userid'] = $pk1;
			$data[$i]['preview_sex'] = $this->setSexSubject($data[$i]['sex']);
			$data[$i]['birthday'] = setThaiDate($data[$i]['birthday']);
			$data[$i]['create_datetime'] = setThaiDate($data[$i]['create_datetime']);
			$data[$i]['modify_datetime'] = setThaiDate($data[$i]['modify_datetime']);
			$arr = explode('/', $data[$i]['photo']);
			$encrypt_file_name = end($arr);
			$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_file_name'");
			$data[$i]['preview_photo'] = setAttachLink('photo', $data[$i]['photo'], $filename);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setSexSubject($value)
	{
		$subject = '';
		switch ($value) {
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
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['userid'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_userid'] = $pk1;


		$prefixPrefixName = $this->table('tb_members_prefix')->get_value('prefix_name')->where("prefix_name = '$data[prefix]'");
		$this->data['prefixPrefixName'] = $prefixPrefixName;


		$levelLevelTitle = $this->table('tb_members_level')->get_value('level_title')->where("level_value = '$data[level]'");
		$this->data['levelLevelTitle'] = $levelLevelTitle;


		$departmentIdServicesName = $this->table('services')->get_value('services_name')->where("services_id = '$data[department_id]'");
		$this->data['departmentIdServicesName'] = $departmentIdServicesName;

		$this->data['record_userid'] = $data['userid'];
		$this->data['record_username'] = $data['username'];
		$this->data['record_email'] = $data['email'];
		$this->data['record_password'] = $data['password'];
		$this->data['record_prefix'] = $data['prefix'];
		$this->data['record_firstname'] = $data['firstname'];
		$this->data['record_lastname'] = $data['lastname'];
		$this->data['record_birthday'] = $data['birthday'];
		$this->data['preview_sex'] = $this->setSexSubject($data['sex']);
		$this->data['record_sex'] = $data['sex'];
		$this->data['record_level'] = $data['level'];
		$this->data['record_tel_number'] = $data['tel_number'];
		$this->data['record_line_id'] = $data['line_id'];
		$this->data['record_department_id'] = $data['department_id'];
		$this->data['record_photo'] = $data['photo'];
		$this->data['record_province_id'] = $data['province_id'];


		$this->data['university_name'] = $data['university_name'];

		$arr = explode('/', $data['photo']);
		$encrypt_name = end($arr);
		$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_name'");
		$this->data['record_photo_label'] = $filename;

		$this->data['preview_photo'] = setAttachPreview('photo', $data['photo'], $filename);
		$this->data['record_unsubscribe'] = $data['unsubscribe'];
		$this->data['record_void'] = $data['void'];
		$this->data['record_referral_code'] = $data['referral_code'];
		$this->data['record_create_datetime'] = $data['create_datetime'];
		$this->data['record_create_user_id'] = $data['create_user_id'];
		$this->data['record_modify_datetime'] = $data['modify_datetime'];
		$this->data['record_modify_user_id'] = $data['modify_user_id'];

		$this->data['record_birthday'] = setThaiDate($data['birthday']);
		$this->data['record_create_datetime'] = setThaiDate($data['create_datetime']);
		$this->data['record_modify_datetime'] = setThaiDate($data['modify_datetime']);
	}
}
/*---------------------------- END Controller Class --------------------------------*/
