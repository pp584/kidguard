<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Dashboard.php ]
 */
class DashboardZone extends CRUD_Controller
{
	private $per_page;
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Globalmodel', 'modeldb');

		//$this->another_js .= '<script src="'. base_url('assets/themes/sb-admin/vendor/chart.js/Chart.min.js').'"></script>';
		//$this->another_js .= '<script src="'. base_url('assets/themes/sb-admin/js/sb-admin-charts.min.js').'"></script>';

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
		
		$this->data['top_navbar'] = $this->parser->parse('template/sb-admin-bs4/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		$this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;



		$this->parser->parse('template/sb-admin-bs4/homepage_view', $this->data);
	}


	function search(){

		// ค้นหา
		$this->dashboard();
		
		
	}

	public function dashboard()
	{
		$this->breadcrumb_data['breadcrumb'] = array();

		$this->data['patient_today'] = $this->patient_today();
		$this->data['patient_hospitalized'] = $this->patient_hospitalized();
		$this->data['patient_dead'] = $this->patient_dead();

		$this->data['patient_delivery_resuscitation'] = $this->patient_delivery_information(1);
		$this->data['patient_delivery_emergency'] = $this->patient_delivery_information(2);
		$this->data['patient_delivery_urgency'] = $this->patient_delivery_information(3);
		$this->data['patient_delivery_semi'] = $this->patient_delivery_information(4);
		$this->data['patient_delivery_none'] = $this->patient_delivery_information(5);

		$this->data['even_scene_home'] = $this->patient_event_information(1);
		$this->data['even_scene_work'] = $this->patient_event_information(2);
		$this->data['even_scene_public'] = $this->patient_event_information(3);
		$this->data['even_scene_care'] = $this->patient_event_information(4);
		$this->data['even_scene_other'] = $this->patient_event_information(5);

		

		for ($i = 0; $i <= 12; $i++) {
			$this->data['patient_patient_status_' . $i . ''] = $this->patient_patient_status($i, 1);
		}

		for ($i = 0; $i <= 12; $i++) {
			$this->data['patient_patient_status_dead_' . $i . ''] = $this->patient_patient_status($i, 2);
		}



		$y = date("Y");
		for ($i = ($y - 6); $i <= $y; $i++) {
			$this->data['patient_patient_year_' . $i . ''] = $this->patient_patient_status_year($i, 1);
		}

		for ($i = ($y - 6); $i <= $y; $i++) {
			$this->data['patient_patient_year_dead_' . $i . ''] = $this->patient_patient_status_year($i, 2);
		}


		$this->data['zone_list'] = $this->zone_list();
		
		$this->render_view('dashboard_zone');
	}


	public function zone_list()
	{
		$services = $this->modeldb->get_list("services");
		return $services;
	}

	// SELECT SUM(patient_status) as total_patient_status FROM result_data WHERE YEAR(date_out) = 2022 AND MONTH(date_out) = 4 AND patient_status =1
	// 1=มีชีวิต รักษาในโรงพยาบาล,2=เสียชีวิต] 

	public function patient_patient_status_year($y, $status)
	{
		$tooday = date("Y-m-d");
		$total = 0;
		//$data_cms_ca_resuscitation = $this->modeldb->select("SUM(patient_status) as total_patient_status", "YEAR(date_out) = 2022 AND MONTH(date_out) = 4 AND patient_status =1");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("result_data", "YEAR(date_out) = $y AND patient_status = $status ");
		return count($data_cms_ca_resuscitation);
	}

	public function patient_patient_status($m, $status)
	{
		$tooday = date("Y-m-d");
		$total = 0;
		//$data_cms_ca_resuscitation = $this->modeldb->select("SUM(patient_status) as total_patient_status", "YEAR(date_out) = 2022 AND MONTH(date_out) = 4 AND patient_status =1");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("result_data", "YEAR(date_out) = 2022 AND MONTH(date_out) = " . $m . " AND patient_status = $status ");
		return count($data_cms_ca_resuscitation);
	}


	// ลักษณะของที่เกิดเหตุ[1=ที่พักอาศัย ,2=สถานที่ทำงาน,3=สถานที่สาธารณะ,4=ศูนย์ดูแลผู้ป่วย,5=อื่นๆ]
	public function patient_event_information($even_scene)
	{
		$tooday = date("Y-m-d");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("event_information", "even_scene= '" . $even_scene . "' ");
		return count($data_cms_ca_resuscitation);
	}

	// delivery_information
	// ระดับการคัดกรอง[
	// 1=สีแดง ผู้ป่วยฉุกเฉินวิกฤต (Resuscitation),
	// 2=สีชมพู ผู้ป่วยฉุกเฉินหนัก (Emergency),
	// 3=สีเหลือง ผู้ป่วยฉุกเฉินเร่งด่วน (Urgency),
	// 4=สีเขียว ผู้ป่วยฉุกเฉินไม่รุนแรง (Semi-Urgency),
	// 5=สีขาว ผู้ป่วยทั่วไป (Non-Urgency)]

	public function patient_delivery_information($screening_level)
	{
		$tooday = date("Y-m-d");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("delivery_information", "screening_level= '" . $screening_level . "' ");
		return count($data_cms_ca_resuscitation);
	}

	//new patient today
	public function patient_today()
	{
		$tooday = date("Y-m-d");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("service_information", "regis_date= '" . $tooday . "' ");
		return count($data_cms_ca_resuscitation);
	}


	// patient is hospitalized
	public function patient_hospitalized()
	{
		$tooday = date("Y-m-d");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("result_data", "patient_status=1 ");
		return count($data_cms_ca_resuscitation);
	}


	// patient is hospitalized
	public function patient_dead()
	{
		$tooday = date("Y-m-d");
		$data_cms_ca_resuscitation = $this->modeldb->get_list("result_data", "patient_status=2 ");
		return count($data_cms_ca_resuscitation);
	}
}
/*---------------------------- END Controller Class --------------------------------*/