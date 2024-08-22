<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Dashboard.php ]
 */
class PreviewAssessment extends CRUD_Controller
{
	private $per_page;
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();

		$this->another_js .= 'assets/js_modules/cadiac_arrest/cms_ca_basic_info.js?ft=' . filemtime('assets/js_modules/cadiac_arrest/cms_ca_basic_info.js');
		$this->another_js .= '<script src="' . base_url('assets/themes/sb-admin/vendor/chart.js/Chart.min.js') . '"></script>';
		$this->another_js .= '<script src="' . base_url('assets/themes/sb-admin/js/sb-admin-charts.min.js') . '"></script>';

		$this->load->model('cadiac_arrest/Cms_ca_basic_info_model', 'Cms_ca_basic_info');

		$this->load->model('Globalmodel', 'modeldb');
		$this->load->model('website/Contact_us_model', 'Contact_us');

		$js_url = 'assets/js_modules/website/contact_us.js?ft=' . filemtime('assets/js_modules/website/contact_us.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->dashboard();
	}

	// ------------------------------------------------------------------------

	/**
	 * Create new record
	 */
	public function save()
	{

		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('contact_name', 'ชื่อผู้ติดต่อ', 'trim|required');
		$frm->set_rules('phone', 'เบอร์โทร', 'trim|required');
		$frm->set_rules('email', 'อีเมล', 'trim|required');
		$frm->set_rules('subject', 'เรื่อง', 'trim|required');
		$frm->set_rules('detail', 'รายละเอียด', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => ""
			));
			echo $json;
		} else {

			$post = $this->input->post(NULL, TRUE);
			//print_r($post);

			$encrypt_id = '';
			$id = $this->Contact_us->create($post);
			if ($id != '') {
				redirect(base_url('contactus'));
			} else {
				

				$json = json_encode(array(
					'is_successful' => FALSE,
					'message' => 'Error : ' . $this->Contact_us->error_message
				));
				echo $json;

			}

			//$this->breadcrumb_data['breadcrumb'] = array();
			$this->render_view('preview_assessment');

		}
	}


	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('contact_name', 'ชื่อผู้ติดต่อ', 'trim|required');
		$frm->set_rules('phone', 'เบอร์โทร', 'trim|required');
		$frm->set_rules('email', 'อีเมล', 'trim|required');
		$frm->set_rules('subject', 'เรื่อง', 'trim|required');
		$frm->set_rules('detail', 'รายละเอียด', 'trim|required|is_natural');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('contact_name');
			$message .= form_error('phone');
			$message .= form_error('email');
			$message .= form_error('subject');
			$message .= form_error('detail');
			return $message;
		}
	}

	/**
	 * Render this controller page
	 * @param String path of controller
	 * @param Integer total record
	 */
	private function render_view($path)
	{

		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		//$this->data['left_sidebar'] = $this->parser->parse('template/front-end/left_sidebar_view', $this->left_sidebar_data, TRUE);
		//$this->data['breadcrumb_list'] = $this->parser->parse('template/front-end/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;
		$this->data['cms_about_us']	=  $this->cms_about_us();

		$this->parser->parse('preview_assessment', $this->data);
	}



	public function cms_about_us()
	{
		$cms_about_us = $this->modeldb->get_list("cms_about_us");
		return $cms_about_us;
	}


	public function dashboard()
	{
		$this->breadcrumb_data['breadcrumb'] = array();
		$this->render_view('preview_assessment');
	}


	/**
	 * SET array data list
	 */
	private function setDataListFormat_cms_ca_basic_info($lists_data, $start_row = 0)
	{
		$data = $lists_data;
		$count = count($lists_data);
		for ($i = 0; $i < $count; $i++) {
			$start_row++;
			$data[$i]['record_number'] = $start_row;
			$pk1 = $data[$i]['ca_basic_info'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_ca_basic_info'] = $pk1;
			$data[$i]['create_date'] = setThaiDate($data[$i]['create_date']);
			$arr = explode('/', $data[$i]['images']);
			$encrypt_file_name = end($arr);
			$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_file_name'");
			$data[$i]['preview_images'] = setAttachLink('images', $data[$i]['images'], $filename);
			$arr = explode('/', $data[$i]['files']);
			$encrypt_file_name = end($arr);
			$filename = $this->table('tb_uploads_filename')->get_value('filename')->where("encrypt_name = '$encrypt_file_name'");
			$data[$i]['preview_files'] = setAttachLink('files', $data[$i]['files'], $filename);
		}
		return $data;
	}
}
/*---------------------------- END Controller Class --------------------------------*/