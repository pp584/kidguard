<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Assessment.php ]
 */
class AssessmentV2 extends MEMBER_Controller
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
		$this->load->model('report/Assessment_v2_model', 'Assessment');
		$this->Assessment->session_name = 'report_assessment';

		$this->data['page_url'] = site_url('report/assessment_v2');

		$this->data['page_title'] = 'PHP CI MANIA';
		$this->data['user_prefix_name']	= $this->session->userdata('user_prefix_name');
		$this->data['user_firstname']		= $this->session->userdata('user_firstname');
		$this->data['user_lastname']		= $this->session->userdata('user_lastname');

		$js_url = 'assets/js_modules/report/assessment_v2.js?ft=' . filemtime('assets/js_modules/report/assessment_v2.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment_v2', 'class' => 'active', 'url' => '#'),
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
		$this->session->unset_userdata($this->Assessment->session_name . '_search_field');
		$this->session->unset_userdata($this->Assessment->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Assessment->session_name . '_search_field' => $search_field, $this->Assessment->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Assessment->session_name . '_search_field');
			$value = $this->session->userdata($this->Assessment->session_name . '_value');
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
			$this->Assessment->order_field = $field;
			$this->Assessment->order_sort = $sort;
		}
		$results = $this->Assessment->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('report/assessment');
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

		$this->render_view('report/assessment/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment', 'url' => site_url('report/assessment')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('report/assessment/preview_view');
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
			array('title' => 'Assessment', 'url' => site_url('report/assessment')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->render_view('report/assessment/add_view');
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

		$frm->set_rules('self_management_score', 'การบริหารจัดการตน', 'trim|required|decimal');
		$frm->set_rules('psychological_capital_score', 'ทุนทางจิตวิทยา', 'trim|required|decimal');
		$frm->set_rules('self_esteem_score', 'การเห็นคุณค่าในตนเอง', 'trim|required|decimal');
		$frm->set_rules('identity_power_score', 'พลังตัวตน', 'trim|required|decimal');
		$frm->set_rules('compliance_score', 'การคล้อยตามกลุ่มคนใช้สารเสพติด', 'trim|required|decimal');
		$frm->set_rules('domestic_violence_score', 'ความรุนแรงในครอบครัว', 'trim|required|decimal');
		$frm->set_rules('exemplary_score', 'การเป็นแบบอย่างในการใช้สารเสพติด', 'trim|required|decimal');
		$frm->set_rules('media_exposure_score', 'การเปิดรับเกี่ยวกับสื่อสารเสพติด', 'trim|required|decimal');
		$frm->set_rules('attitude_score', 'เจตคติทางบวกต่อการใช้สารเสพติด', 'trim|required|decimal');
		$frm->set_rules('source_purchase_score', 'การรับรู้แหล่งซื้อสารเสพติด', 'trim|required|decimal');
		$frm->set_rules('family_power_score', 'พลังครอบครัว', 'trim|required|decimal');
		$frm->set_rules('school_power_score', 'พลังสถานศึกษา', 'trim|required|decimal');
		$frm->set_rules('friend_power_score', 'พลังเพื่อนและกิจกรรม', 'trim|required|decimal');
		$frm->set_rules('community_power_score', 'พลังชุมชน', 'trim|required|decimal');
		$frm->set_rules('group_type_id', 'กลุ่ม', 'trim|required|is_natural');
		$frm->set_rules('data_year', 'ปี', 'trim|required');
		$frm->set_rules('section', 'Section', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('decimal', '- %s ต้องระบุตัวเลขทศนิยม');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('self_management_score');
			$message .= form_error('psychological_capital_score');
			$message .= form_error('self_esteem_score');
			$message .= form_error('identity_power_score');
			$message .= form_error('compliance_score');
			$message .= form_error('domestic_violence_score');
			$message .= form_error('exemplary_score');
			$message .= form_error('media_exposure_score');
			$message .= form_error('attitude_score');
			$message .= form_error('source_purchase_score');
			$message .= form_error('family_power_score');
			$message .= form_error('school_power_score');
			$message .= form_error('friend_power_score');
			$message .= form_error('community_power_score');
			$message .= form_error('group_type_id');
			$message .= form_error('data_year');
			$message .= form_error('section');
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

		$frm->set_rules('self_management_score', 'การบริหารจัดการตน', 'trim|required|decimal');
		$frm->set_rules('psychological_capital_score', 'ทุนทางจิตวิทยา', 'trim|required|decimal');
		$frm->set_rules('self_esteem_score', 'การเห็นคุณค่าในตนเอง', 'trim|required|decimal');
		$frm->set_rules('identity_power_score', 'พลังตัวตน', 'trim|required|decimal');
		$frm->set_rules('compliance_score', 'การคล้อยตามกลุ่มคนใช้สารเสพติด', 'trim|required|decimal');
		$frm->set_rules('domestic_violence_score', 'ความรุนแรงในครอบครัว', 'trim|required|decimal');
		$frm->set_rules('exemplary_score', 'การเป็นแบบอย่างในการใช้สารเสพติด', 'trim|required|decimal');
		$frm->set_rules('media_exposure_score', 'การเปิดรับเกี่ยวกับสื่อสารเสพติด', 'trim|required|decimal');
		$frm->set_rules('attitude_score', 'เจตคติทางบวกต่อการใช้สารเสพติด', 'trim|required|decimal');
		$frm->set_rules('source_purchase_score', 'การรับรู้แหล่งซื้อสารเสพติด', 'trim|required|decimal');
		$frm->set_rules('family_power_score', 'พลังครอบครัว', 'trim|required|decimal');
		$frm->set_rules('school_power_score', 'พลังสถานศึกษา', 'trim|required|decimal');
		$frm->set_rules('friend_power_score', 'พลังเพื่อนและกิจกรรม', 'trim|required|decimal');
		$frm->set_rules('community_power_score', 'พลังชุมชน', 'trim|required|decimal');
		$frm->set_rules('group_type_id', 'กลุ่ม', 'trim|required|is_natural');
		$frm->set_rules('data_year', 'ปี', 'trim|required');
		$frm->set_rules('section', 'Section', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('decimal', '- %s ต้องระบุตัวเลขทศนิยม');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('self_management_score');
			$message .= form_error('psychological_capital_score');
			$message .= form_error('self_esteem_score');
			$message .= form_error('identity_power_score');
			$message .= form_error('compliance_score');
			$message .= form_error('domestic_violence_score');
			$message .= form_error('exemplary_score');
			$message .= form_error('media_exposure_score');
			$message .= form_error('attitude_score');
			$message .= form_error('source_purchase_score');
			$message .= form_error('family_power_score');
			$message .= form_error('school_power_score');
			$message .= form_error('friend_power_score');
			$message .= form_error('community_power_score');
			$message .= form_error('group_type_id');
			$message .= form_error('data_year');
			$message .= form_error('section');
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
			$id = $this->Assessment->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Assessment->error_message;
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
			array('title' => 'Assessment', 'url' => site_url('report/assessment')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_create_datetime'] = setThaiDate($results['create_datetime']);

				$this->render_view('report/assessment/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$id = ci_decrypt($data['encrypt_id']);
		if ($id == '') {
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

			$result = $this->Assessment->update($post);
			if ($result == false) {
				$message = $this->Assessment->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Assessment->error_message;
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
			$result = $this->Assessment->delete($post);
			if ($result == false) {
				$message = $this->Assessment->error_message;
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
			$pk1 = $data[$i]['id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_id'] = $pk1;
			$data[$i]['self_management_score'] = number_format($data[$i]['self_management_score'], 2);
			$data[$i]['psychological_capital_score'] = number_format($data[$i]['psychological_capital_score'], 2);
			$data[$i]['self_esteem_score'] = number_format($data[$i]['self_esteem_score'], 2);
			$data[$i]['identity_power_score'] = number_format($data[$i]['identity_power_score'], 2);
			$data[$i]['compliance_score'] = number_format($data[$i]['compliance_score'], 2);
			$data[$i]['domestic_violence_score'] = number_format($data[$i]['domestic_violence_score'], 2);
			$data[$i]['exemplary_score'] = number_format($data[$i]['exemplary_score'], 2);
			$data[$i]['media_exposure_score'] = number_format($data[$i]['media_exposure_score'], 2);
			$data[$i]['attitude_score'] = number_format($data[$i]['attitude_score'], 2);
			$data[$i]['source_purchase_score'] = number_format($data[$i]['source_purchase_score'], 2);
			$data[$i]['family_power_score'] = number_format($data[$i]['family_power_score'], 2);
			$data[$i]['school_power_score'] = number_format($data[$i]['school_power_score'], 2);
			$data[$i]['friend_power_score'] = number_format($data[$i]['friend_power_score'], 2);
			$data[$i]['community_power_score'] = number_format($data[$i]['community_power_score'], 2);
			$data[$i]['create_datetime'] = setThaiDate($data[$i]['create_datetime']);
		}
		return $data;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;

		$this->data['record_id'] = $data['id'];
		$this->data['record_self_management_score'] = $data['self_management_score'];
		$this->data['record_psychological_capital_score'] = $data['psychological_capital_score'];
		$this->data['record_self_esteem_score'] = $data['self_esteem_score'];
		$this->data['record_identity_power_score'] = $data['identity_power_score'];
		$this->data['record_compliance_score'] = $data['compliance_score'];
		$this->data['record_domestic_violence_score'] = $data['domestic_violence_score'];
		$this->data['record_exemplary_score'] = $data['exemplary_score'];
		$this->data['record_media_exposure_score'] = $data['media_exposure_score'];
		$this->data['record_attitude_score'] = $data['attitude_score'];
		$this->data['record_source_purchase_score'] = $data['source_purchase_score'];
		$this->data['record_family_power_score'] = $data['family_power_score'];
		$this->data['record_school_power_score'] = $data['school_power_score'];
		$this->data['record_friend_power_score'] = $data['friend_power_score'];
		$this->data['record_community_power_score'] = $data['community_power_score'];
		$this->data['record_group_type_id'] = $data['group_type_id'];
		$this->data['record_data_year'] = $data['data_year'];
		$this->data['record_create_datetime'] = $data['create_datetime'];
		$this->data['record_section'] = $data['section'];

		$this->data['record_self_management_score'] = number_format($data['self_management_score'], 2);
		$this->data['record_psychological_capital_score'] = number_format($data['psychological_capital_score'], 2);
		$this->data['record_self_esteem_score'] = number_format($data['self_esteem_score'], 2);
		$this->data['record_identity_power_score'] = number_format($data['identity_power_score'], 2);
		$this->data['record_compliance_score'] = number_format($data['compliance_score'], 2);
		$this->data['record_domestic_violence_score'] = number_format($data['domestic_violence_score'], 2);
		$this->data['record_exemplary_score'] = number_format($data['exemplary_score'], 2);
		$this->data['record_media_exposure_score'] = number_format($data['media_exposure_score'], 2);
		$this->data['record_attitude_score'] = number_format($data['attitude_score'], 2);
		$this->data['record_source_purchase_score'] = number_format($data['source_purchase_score'], 2);
		$this->data['record_family_power_score'] = number_format($data['family_power_score'], 2);
		$this->data['record_school_power_score'] = number_format($data['school_power_score'], 2);
		$this->data['record_friend_power_score'] = number_format($data['friend_power_score'], 2);
		$this->data['record_community_power_score'] = number_format($data['community_power_score'], 2);
		$this->data['record_create_datetime'] = setThaiDate($data['create_datetime']);
	}

	public function export_excel()
	{
		// load excel library
		$this->load->library('report/Excel');

		$results = $this->Assessment->read();
		$data_lists = $this->setDataListFormat($results['list_data'], 0);

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		// set Header ***** SECTION 1 ***** 
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'การบริหารจัดการตน');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'ทุนทางจิตวิทยา');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'การเห็นคุณค่าในตนเอง');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'พลังตัวตน');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'การคล้อยตามกลุ่มคนใช้สารเสพติด');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'ความรุนแรงในครอบครัว');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'การเป็นแบบอย่างในการใช้สารเสพติด');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'การเปิดรับเกี่ยวกับสื่อสารเสพติด');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'เจตคติทางบวกต่อการใช้สารเสพติด');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'การรับรู้แหล่งซื้อสารเสพติด');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'พลังครอบครัว');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'พลังสถานศึกษา');
		$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'พลังเพื่อนและกิจกรรม');
		$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'พลังชุมชน');
		$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'กลุ่ม');
		$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'ปี');
		$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'วันที่สร้าง');
		$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Section');

		// END SECTION 1

		// set header bold
		$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);

		// set Row
		$rowCount = 2;
		foreach ($data_lists as $row) {

			// ***** SECTION 2 *****

			$sheet = $objPHPExcel->getActiveSheet();
			$sheet->SetCellValue('A' . $rowCount, $row['self_management_score']);
			$sheet->SetCellValue('B' . $rowCount, $row['psychological_capital_score']);
			$sheet->SetCellValue('C' . $rowCount, $row['self_esteem_score']);
			$sheet->SetCellValue('D' . $rowCount, $row['identity_power_score']);
			$sheet->SetCellValue('E' . $rowCount, $row['compliance_score']);
			$sheet->SetCellValue('F' . $rowCount, $row['domestic_violence_score']);
			$sheet->SetCellValue('G' . $rowCount, $row['exemplary_score']);
			$sheet->SetCellValue('H' . $rowCount, $row['media_exposure_score']);
			$sheet->SetCellValue('I' . $rowCount, $row['attitude_score']);
			$sheet->SetCellValue('J' . $rowCount, $row['source_purchase_score']);
			$sheet->SetCellValue('K' . $rowCount, $row['family_power_score']);
			$sheet->SetCellValue('L' . $rowCount, $row['school_power_score']);
			$sheet->SetCellValue('M' . $rowCount, $row['friend_power_score']);
			$sheet->SetCellValue('N' . $rowCount, $row['community_power_score']);
			$sheet->SetCellValue('O' . $rowCount, $row['group_type_id']);
			$sheet->setCellValueExplicit('P' . $rowCount, $row['data_year'], PHPExcel_Cell_DataType::TYPE_STRING);
			$sheet->setCellValueExplicit('Q' . $rowCount, $row['create_datetime'], PHPExcel_Cell_DataType::TYPE_STRING);
			$sheet->SetCellValue('R' . $rowCount, $row['section']);


			$rowCount++;
		}

		foreach (range('A', 'S') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}


		$filename = "Assessment_list" . date("Y-m-d-H-i-s") . ".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		$objWriter->save('php://output');
	}
}
/*---------------------------- END Controller Class --------------------------------*/
