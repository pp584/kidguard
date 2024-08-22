<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Dashboard.php ]
 */
class News_basic_info extends CRUD_Controller
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
		$this->data['cms_posts']	=  $this->cms_posts();
		$this->parser->parse('template/front-end/news_basic_info', $this->data);
	}


	public function cms_posts()
	{
		$cms_about_us = $this->modeldb->get_list("cms_ca_basic_info");
		return $cms_about_us;
	}


	public function dashboard()
	{
		$this->breadcrumb_data['breadcrumb'] = array();
		$this->render_view('dashboard_zone');
	}


	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'News', 'url' => site_url('website/news')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		//$this->data['left_sidebar'] = $this->parser->parse('template/front-end/left_sidebar_view', $this->left_sidebar_data, TRUE);
		//$this->data['breadcrumb_list'] = $this->parser->parse('template/front-end/breadcrumb_view', $this->breadcrumb_data, TRUE);
		//$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;

		//$encrypt_id = urldecode($encrypt_id);
		$id = $encrypt_id;
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {

			$this->update_page_view($id);
			$cms_about_us = $this->modeldb->get_list("cms_ca_basic_info", "ca_basic_info=$id");
			$this->data['results'] = $cms_about_us;

			$this->parser->parse('template/front-end/news_basic_info_view', $this->data);
		}
	}

	public function update_page_view($id){

		// $table, $set, $where
		// UPDATE cms_posts set page_views_total = page_views_total + 1 WHERE id=10;

		$this->db->query("UPDATE cms_ca_basic_info set page_views_total = page_views_total + 1 WHERE ca_basic_info=$id ");
		//  $this->modeldb->update("cms_posts","page_views_total = page_views_total + 1 " ,"id=$id");


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