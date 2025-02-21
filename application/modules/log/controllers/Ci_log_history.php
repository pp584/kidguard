<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Ci_log_history.php ]
 */
class Ci_log_history extends MEMBER_Controller
{

	private $per_page;
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 30;
		$this->num_links = 1;
		$this->uri_segment = 4;
		$this->load->model('log/Ci_log_history_model', 'Ci_log_history');
		$this->Ci_log_history->session_name = 'log_ci_log_history';

		$this->data['page_url'] = site_url('log/ci_log_history');

		$this->data['page_title'] = 'ONCB';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/log/ci_log_history.js?ft=' . filemtime('assets/js_modules/log/ci_log_history.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'จัดการ log การใช้งาน', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Ci_log_history->session_name . '_search_field');
		$this->session->unset_userdata($this->Ci_log_history->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'จัดการ log การใช้งาน', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Ci_log_history->session_name . '_search_field' => $search_field, $this->Ci_log_history->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Ci_log_history->session_name . '_search_field');
			$value = $this->session->userdata($this->Ci_log_history->session_name . '_value');
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
			$this->Ci_log_history->order_field = $field;
			$this->Ci_log_history->order_sort = $sort;
		}
		$results = $this->Ci_log_history->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('log/ci_log_history');
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

		$this->render_view('log/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'จัดการ log การใช้งาน', 'url' => site_url('log/ci_log_history')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Ci_log_history->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง $id";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('log/preview_view');
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
			array('title' => 'จัดการ log การใช้งาน', 'url' => site_url('log/ci_log_history')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['tb_members_log_edit_user_option_list'] = $this->Ci_log_history->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)");
		$this->render_view('log/add_view');
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

		$frm->set_rules('log_edit_user', 'อ้างอิงตาราง User', 'trim|required');
		$frm->set_rules('log_edit_datetime', 'เมื่อไหร่', 'trim|required');
		$frm->set_rules('log_edit_remark', 'หมายเหตุ (ต้องระบุ)', 'trim|required');
		$frm->set_rules('log_edit_table', 'ที่ตารางไหน', 'trim|required');
		$frm->set_rules('log_edit_table_pk_name', 'PK ฟิลด์', 'trim|required');
		$frm->set_rules('log_edit_table_pk_value', 'PK ข้อมูล', 'trim|required');
		$frm->set_rules('log_edit_condition', 'เก็บเงื่อนไขการอัพเดต', 'trim|required');
		$frm->set_rules('log_login_id', 'อ้างอิงการ ตาราง Login', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('log_edit_user');
			$message .= form_error('log_edit_datetime');
			$message .= form_error('log_edit_remark');
			$message .= form_error('log_edit_table');
			$message .= form_error('log_edit_table_pk_name');
			$message .= form_error('log_edit_table_pk_value');
			$message .= form_error('log_edit_condition');
			$message .= form_error('log_login_id');
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

		$frm->set_rules('log_edit_user', 'อ้างอิงตาราง User', 'trim|required');
		$frm->set_rules('log_edit_datetime', 'เมื่อไหร่', 'trim|required');
		$frm->set_rules('log_edit_remark', 'หมายเหตุ (ต้องระบุ)', 'trim|required');
		$frm->set_rules('log_edit_table', 'ที่ตารางไหน', 'trim|required');
		$frm->set_rules('log_edit_table_pk_name', 'PK ฟิลด์', 'trim|required');
		$frm->set_rules('log_edit_table_pk_value', 'PK ข้อมูล', 'trim|required');
		$frm->set_rules('log_edit_condition', 'เก็บเงื่อนไขการอัพเดต', 'trim|required');
		$frm->set_rules('log_login_id', 'อ้างอิงการ ตาราง Login', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('log_edit_user');
			$message .= form_error('log_edit_datetime');
			$message .= form_error('log_edit_remark');
			$message .= form_error('log_edit_table');
			$message .= form_error('log_edit_table_pk_name');
			$message .= form_error('log_edit_table_pk_value');
			$message .= form_error('log_edit_condition');
			$message .= form_error('log_login_id');
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
			$id = $this->Ci_log_history->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Ci_log_history->error_message;
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
			array('title' => 'จัดการ log การใช้งาน', 'url' => site_url('log/ci_log_history')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Ci_log_history->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง $id";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_log_edit_datetime'] = setThaiDate($results['log_edit_datetime']);

				$this->data['tb_members_log_edit_user_option_list'] = $this->Ci_log_history->returnOptionList("tb_members", "userid", "CONCAT_WS(' - ', firstname,lastname)");
				$this->render_view('log/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$log_id = ci_decrypt($data['encrypt_log_id']);
		if ($log_id == '') {
			$error .= '- รหัส log_id';
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

			$result = $this->Ci_log_history->update($post);
			if ($result == false) {
				$message = $this->Ci_log_history->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Ci_log_history->error_message;
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
			$result = $this->Ci_log_history->delete($post);
			if ($result == false) {
				$message = $this->Ci_log_history->error_message;
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
			$pk1 = $data[$i]['log_id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_log_id'] = $pk1;
			$data[$i]['log_edit_datetime'] = setThaiDate($data[$i]['log_edit_datetime']);
		}
		return $data;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['log_id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_log_id'] = $pk1;


		$titleRow = $this->table('tb_members')->get_array('firstname, lastname')->where("userid = $data[log_edit_user]");
		if (!empty($titleRow)) {
			$logEditUserFirstname = $titleRow['firstname'];
			$logEditUserLastname = $titleRow['lastname'];
		} else {
			$logEditUserFirstname = '';
			$logEditUserLastname = '';
		}
		$this->data['logEditUserFirstname'] = $logEditUserFirstname;
		$this->data['logEditUserLastname'] = $logEditUserLastname;

		$this->data['record_log_id'] = $data['log_id'];
		$this->data['record_log_edit_user'] = $data['log_edit_user'];
		$this->data['record_log_edit_datetime'] = $data['log_edit_datetime'];
		$this->data['record_log_edit_remark'] = $data['log_edit_remark'];
		$this->data['record_log_edit_table'] = $data['log_edit_table'];
		$this->data['record_log_edit_table_pk_name'] = $data['log_edit_table_pk_name'];
		$this->data['record_log_edit_table_pk_value'] = $data['log_edit_table_pk_value'];
		$this->data['record_log_edit_condition'] = $data['log_edit_condition'];
		$this->data['record_log_login_id'] = $data['log_login_id'];

		$this->data['record_log_edit_datetime'] = setThaiDate($data['log_edit_datetime']);
	}
}
/*---------------------------- END Controller Class --------------------------------*/
