<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Dashboard.php ]
 */
class About extends CRUD_Controller
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
		$this->data['cms_about_teams']	=  $this->cms_about_teams();

		// $this->data['list_data_cms_slide']	= $this->cms_slide();
		// $this->data['list_data_cms_ca_symptoms']	= $this->cms_ca_symptoms();
		// $this->data['cms_cardiac_arrest_slide']	= $this->cms_cardiac_arrest_slide();
		// $this->data['cms_ca_resuscitation']	= $this->cms_ca_resuscitation();
		// print_r($this->data);
		$this->parser->parse('template/front-end/aboutpage_view', $this->data);
	}



	public function cms_about_us()
	{
		$cms_about_us = $this->modeldb->get_list("cms_about_us");
		return $cms_about_us;
	}


	public function cms_about_teams()
	{
		$cms_about_us = $this->modeldb->get_list("cms_teams");
		return $cms_about_us;
	}

	public function policy()
	{
		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;

		$this->parser->parse('template/front-end/policypage_view', $this->data);
	}


	public function dashboard()
	{
		$this->breadcrumb_data['breadcrumb'] = array();
		$this->render_view('dashboard_zone');
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
