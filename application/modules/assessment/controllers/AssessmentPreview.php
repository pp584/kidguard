<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : assessment4.php ]
 */
class AssessmentPreview extends CRUD_Controller
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
		$this->load->model('assessment/assessment4_model', 'assessment4');
		$this->assessment4->session_name = 'assessment_assessment4';
		$this->data['page_url'] = site_url('assessment/assessment4');

		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/assessment/assessment4.js?ft=' . filemtime('assets/js_modules/assessment/assessment4.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
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


	public function test_data($assessment_id_by_user)
	{
		$_SESSION["assessment_id"] = $assessment_id_by_user;
		$this->list_all();
	}
	protected function render_view($path)
	{

		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		// $this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		// $this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;


		$this->get_province();
		$this->self_management();
		$this->Psychological_capital();
		$this->Self_esteem();
		$this->Identity_power();
		$this->Compliance();
		$this->Domestic_violence();
		$this->Exemplary();
		$this->Media_exposure();
		$this->Attitude();
		$this->Source_purchase();
		$this->Family_power();
		$this->School_power();
		$this->Friend_power();
		$this->Community_power();


		$this->data['utilities_file_time'] = filemtime('assets/js/ci_utilities.js');
		$this->parser->parse('template/front-end/preview_assessment', $this->data);
	}


	function get_province()
	{
		$this->data['province_code'] =  '';
	}


	function Community_power()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(76, 77, 78, 79, 80, 81, 82, 83);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;



		// กลุ่มเคยลอง 
		// $assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 1");
		// // $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 1");
		// foreach ($assessment1_1_query_result->result() as $row) {
		// 	foreach ($ass1 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score1 += $row->$field;
		// 	}
		// }

		// // foreach ($assessment1_2_query_result->result() as $row) {
		// // 	foreach ($ass2 as $key => $value) {
		// // 		$field  = 'quest_' . $value;
		// // 		$sum_score2 += $row->$field;
		// // 	}
		// // }

		// // กลุ่มๆม่เสพ 
		// $assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 2");
		// // $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 2");
		// foreach ($assessment1_1_query_result->result() as $row) {
		// 	foreach ($ass1 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score3 += $row->$field;
		// 	}
		// }

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		// $sum_score4 += $row->$field;
		// 	}
		// }

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score5 += $row->$field;
		// 	}
		// }



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['community_power_score1'] = $net_sum_score1;
		$this->data['community_power_score2'] = $net_sum_score2;
		$this->data['community_power_score3'] = $net_sum_score3;
	}

	function Friend_power()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(70, 71, 72, 37, 74, 75);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;




		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score5 += $row->$field;
		// 	}
		// }



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);
		$net_sum_score4 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);

		$this->data['friend_power_score1'] = $net_sum_score1;
		$this->data['friend_power_score2'] = $net_sum_score2;
		$this->data['friend_power_score3'] = $net_sum_score3;
		$this->data['friend_power_score4'] = $net_sum_score4;
	}


	function School_power()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;





		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}





		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['school_power_score1'] = $net_sum_score1;
		$this->data['school_power_score2'] = $net_sum_score2;
		$this->data['school_power_score3'] = $net_sum_score3;
	}


	// family power

	function Family_power()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(51, 52, 53, 54, 55, 56, 57, 58);
		// $ass2 = array();

		$select1 = '';
		$select2 = '';
		$total_row1 = 0;
		$total_row2 = 0;

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		// foreach ($ass2 as $key => $value) {

		// 	$select2 .= 'a2.quest_' . $value . ',';
		// }

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		// $total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;



		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}




		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['family_power_score1'] = $net_sum_score1;
		$this->data['family_power_score2'] = $net_sum_score2;
		$this->data['family_power_score3'] = $net_sum_score3;
	}

	// ,92,93,94,95,96,97,98/
	function Source_purchase()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		// $ass1 = array();
		$ass2 = array(92, 93, 94, 95, 96, 97, 98);

		// $select1 = '';
		$select2 = '';

		// foreach ($ass1 as $key => $value) {

		// 	$select1 .= 'a2.quest_' . $value . ',';
		// }

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		// $total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row =  $total_row2;



		// $select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;





		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		// $assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// foreach ($assessment1_1_query_result->result() as $row) {
		// 	foreach ($ass1 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score5 += $row->$field;
		// 	}
		// }

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score5 +=  $row->$field;
				}
			}
		}



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['source_purchase_score1'] = $net_sum_score1;
		$this->data['source_purchase_score2'] = $net_sum_score2;
		$this->data['source_purchase_score3'] = $net_sum_score3;
	}


	function Attitude()
	{
		
		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(85,86,87,90,91);
		$ass2 = array(84,88,89);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;

		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score5 +=  $row->$field;
				}
			}
		}



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['attitude_score1'] = $net_sum_score1;
		$this->data['attitude_score2'] = $net_sum_score2;
		$this->data['attitude_score3'] = $net_sum_score3;
	}


	function Media_exposure()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(47, 48, 49, 50);
		$ass2 = array();

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;
		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		if (!is_null($row->$field)) {
		// 			$sum_score5 +=  $row->$field;
		// 		}
		// 	}
		// }



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['media_exposure_score1'] = $net_sum_score1;
		$this->data['media_exposure_score2'] = $net_sum_score2;
		$this->data['media_exposure_score3'] = $net_sum_score3;
	}



	function Exemplary()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46);
		$ass2 = array();

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;


		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		
		// echo $this->db->last_query();

		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		if (!is_null($row->$field)) {
		// 			$sum_score5 +=  $row->$field;
		// 		}
		// 	}
		// }



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['exemplary_score1'] = $net_sum_score1;
		$this->data['exemplary_score2'] = $net_sum_score2;
		$this->data['exemplary_score3'] = $net_sum_score3;
	}

	function Domestic_violence()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(22,14);
		$ass2 = array(9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20, 21, 23, 24, 25, 26, 27, 28, 29, 30);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;


		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score5 +=  $row->$field;
				}
			}
		}



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['domestic_violence_score1'] = $net_sum_score1;
		$this->data['domestic_violence_score2'] = $net_sum_score2;
		$this->data['domestic_violence_score3'] = $net_sum_score3;
	}

	function Compliance()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(4, 8);
		$ass2 = array(1, 2, 3, 5, 6, 7);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment3 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score5 +=  $row->$field;
				}
			}
		}

		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['compliance_score1'] = $net_sum_score1;
		$this->data['compliance_score2'] = $net_sum_score2;
		$this->data['compliance_score3'] = $net_sum_score3;
	}

	function Self_esteem()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(75, 76, 77, 78, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99);
		$ass2 = array(79, 80);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score6 +=  $row->$field;
				}
			}
		}



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['self_esteem_score1'] = $net_sum_score1;
		$this->data['self_esteem_score2'] = $net_sum_score2;
		$this->data['self_esteem_score3'] = $net_sum_score3 ;
	}

	function Identity_power()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114);
		$ass2 = array();

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;



		// กลุ่มเคยลอง 
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 1");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 1");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score1 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score2 += $row->$field;
		// 	}
		// }

		// กลุ่มๆม่เสพ 
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 2");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.question_15 = 2");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score3 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score4 += $row->$field;
		// 	}
		// }

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		// $assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		// foreach ($assessment1_2_query_result->result() as $row) {
		// 	foreach ($ass2 as $key => $value) {
		// 		$field  = 'quest_' . $value;
		// 		$sum_score5 += $row->$field;
		// 	}
		// }



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['identity_power_score1'] = $net_sum_score1;
		$this->data['identity_power_score2'] = $net_sum_score2;
		$this->data['identity_power_score3'] = $net_sum_score3;
	}

	function Psychological_capital()
	{

		$score_type1 = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '0' => 0);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);

		$ass1 = array(49, 50, 52, 53, 54, 55, 56, 57, 58, 59, 60, 62, 63, 64, 65, 66, 68, 69, 71, 72, 73, 74);
		$ass2 = array(51, 61, 67, 70);

		$select1 = '';
		$select2 = '';

		foreach ($ass1 as $key => $value) {

			$select1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {

			$select2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;



		$select1 = substr($select1, 0, -1);
		$select2 = substr($select2, 0, -1);

		$sum_score1 = null;
		$sum_score2 = null;
		$sum_score3 = null;
		$sum_score4 = null;

		$sum_score5 = null;
		$sum_score6 = null;

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment1_1_query_result = $this->db->query("SELECT  $select1 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		$assessment1_2_query_result = $this->db->query("SELECT  $select2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where  a1.ref_assessment_id  =  $assessment_id_by_user  ");
		foreach ($assessment1_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score5 += $row->$field;
			}
		}

		foreach ($assessment1_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score6 +=  $row->$field;
				}
			}
		}



		$net_sum_score1 = number_format(($sum_score1 + $sum_score2) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score3 + $sum_score4) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score5 + $sum_score6) / $sum_total_row, 2);


		$this->data['psychological_capital_score1'] = $net_sum_score1;
		$this->data['psychological_capital_score2'] = $net_sum_score2;
		$this->data['psychological_capital_score3'] = $net_sum_score3;
	}

	function self_management()
	{
		$score_type1 = array('0' => '0', '1' => 1, '2' => 2, '3' => 3, '4' => 4);
		$score_type2 = array('1' => 4, '2' => 3, '3' => 2, '4' => 1, '0' => 0);
		$sum_score1_1 = null;
		$sum_score1_2 = null;
		$sum_score2_1 = null;
		$sum_score2_2 = null;
		$sum_score3_1 = null;
		$sum_score3_2 = null;

		$net_sum_score1 = null;
		$net_sum_score2 = null;
		$net_sum_score3 = null;

		// คะแนนปกติ การบริหารจัดการตน  PR50 กลุ่มไม่เคยลอง  
		$select_ass1_1 = '';
		$select_ass1_2 = '';

		$select_ass2_1 = '';
		$select_ass2_2 = '';


		$ass1 = array(1, 2, 8, 9, 11, 12, 15, 16, 20, 21, 23, 24, 25, 26, 27, 28, 31, 34, 36, 40, 41, 42, 43, 44, 45, 46, 47);
		$ass2 = array(3, 4, 5, 6, 7, 10, 13, 14, 17, 18, 19, 22, 29, 30, 32, 33, 35, 37, 38, 39, 48);


		foreach ($ass1 as $key => $value) {
			$select_ass1_1 .= 'a2.quest_' . $value . ',';
		}

		foreach ($ass2 as $key => $value) {
			$select_ass1_2 .= 'a2.quest_' . $value . ',';
		}

		$sum_total_row = 0;
		$total_row1 = count($ass1);
		$total_row2 = count($ass2);
		$sum_total_row = $total_row1 + $total_row2;

		$select_ass1 = substr($select_ass1_1, 0, -1);
		$select_ass2 = substr($select_ass1_2, 0, -1);

		// ผู้ประเมิน 
		$assessment_id_by_user = $_SESSION["assessment_id"];
		$assessment3_1_query_result = $this->db->query("SELECT  $select_ass1 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.ref_assessment_id  =  $assessment_id_by_user ");
		$assessment3_2_query_result = $this->db->query("SELECT  $select_ass2 FROM assessment1 a1  INNER JOIN assessment2 a2 on a1.ref_assessment_id = a2.ref_assessment_id where a1.ref_assessment_id  =  $assessment_id_by_user ");
		foreach ($assessment3_1_query_result->result() as $row) {
			foreach ($ass1 as $key => $value) {
				$field  = 'quest_' . $value;
				$sum_score3_1 += $row->$field;
			}
		}

		foreach ($assessment3_2_query_result->result() as $row) {
			foreach ($ass2 as $key => $value) {
				$field  = 'quest_' . $value;
				if (!is_null($row->$field)) {
					$sum_score3_2 += $row->$field;
				}
			}
		}

		$net_sum_score1 = number_format(($sum_score1_1 + $sum_score1_1) / $sum_total_row, 2);
		$net_sum_score2 = number_format(($sum_score2_1 + $sum_score2_2) / $sum_total_row, 2);
		$net_sum_score3 = number_format(($sum_score3_1 + $sum_score3_2) / $sum_total_row);


		$this->data['self_management_net_sum_score1'] = $net_sum_score1;
		$this->data['self_management_net_sum_score2'] = $net_sum_score2;
		$this->data['self_management_net_sum_score3'] = ($sum_score3_1 + $sum_score3_2) / $sum_total_row;
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
		$this->session->unset_userdata($this->assessment4->session_name . '_search_field');
		$this->session->unset_userdata($this->assessment4->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->render_view('assessment/assessment4/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'assessment4', 'url' => site_url('assessment/assessment4')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->assessment4->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('assessment/assessment4/preview_view');
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
			array('title' => 'assessment4', 'url' => site_url('assessment/assessment4')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['provinces_province_id_option_list'] = $this->assessment4->returnOptionList("provinces", "id", "name_th");
		$this->render_view('assessment/assessment4/add_view');
	}

	// ------------------------------------------------------------------------


	public function multiple_select($value, $name)
	{
		$arr_choice = $this->input->post($name . '[]');
		if (!empty($arr_choice)) {
			$arr_choice = array_filter($arr_choice, function ($v) {
				return $v !== '';
			});
		}
		if (empty($arr_choice)) :
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

		for ($i = 1; $i <= 23; $i++) {

			$frm->set_rules('quest_' . $i, 'ข้อที่ ' . $i . ' กรุณาเลือก', 'trim|required');
		}



		$frm->set_message('required', '- กรุณาเลือก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			for ($i = 1; $i <= 23; $i++) {
				$message .= form_error('quest_' . $i);
			}


			// $message .= form_error('question_1');
			// $message .= form_error('question_2');
			// $message .= form_error('question_3');
			// $message .= form_error('question_4');
			// $message .= form_error('question_5');
			// $message .= form_error('question_6');
			// $message .= form_error('question_7');
			// $message .= form_error('question_8');
			// $message .= form_error('question_9');
			// $message .= form_error('question_10');
			// $message .= form_error('question_11');
			// $message .= form_error('question_12');
			// $message .= form_error('question_13');
			// $message .= form_error('question_14');
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

		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_2', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_3', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_4', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_5', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_6', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_7', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_8', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_9', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_10', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_11', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_12', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_13', 'กรุณาเลือก', 'trim|required');
		$frm->set_rules('question_14', 'กรุณาเลือก', 'trim|required');
		// $frm->set_rules('question_1', '1.เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		// $frm->set_rules('question_2', '2.อายุ', 'trim|required|is_natural');
		// $frm->set_rules('question_3', '3.สถานภาพการศึกษา[1=1.ศึกษาอยู่,2=2. ไม่ได้ศึกษา]', 'trim|required|is_natural');
		// $frm->set_rules('question_4', '4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่', 'trim|required|is_natural');
		// $frm->set_rules('question_5', '5.จำนวนพี่น้อง[1=1. เป็นลูกคนเดียว,2=2. มีพี่น้องรวมทั้งหมด]', 'trim|required|is_natural');
		// $frm->set_rules('question_6', 'กรุณากรอก', 'trim|required');
		// $frm->set_rules('question_7', '6.สถานภาพทางครอบครัว[1=1. บิดามารดาอยู่ด้วยกัน,2=2. บิดามารดาแยกกันอยู่,3=3. บิดาเสียชีวิตแล้ว,4=4. มารดาเสียชีวิตแล้ว,5=5. บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required|is_natural');
		// $frm->set_rules('question_8', '7.อาชีพของบิดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required|is_natural');
		// $frm->set_rules('question_9', '8. อาชีพของมารดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required|is_natural');
		// $frm->set_rules('question_10', '10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[question_10]');
		// $frm->set_rules('question_11', 'กรุณากรอก', 'trim|required');
		// $frm->set_rules('question_12', '11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required|is_natural');
		// $frm->set_rules('question_13', '12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=7,8=8,9=9,10=10,11=11,12=อื่น ๆ โปรดระบุ]', 'trim|required');
		// $frm->set_rules('question_14', 'กรุณากรอก', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			$message .= form_error('question_4');
			$message .= form_error('question_5');
			$message .= form_error('question_6');
			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_9');
			$message .= form_error('question_10');
			$message .= form_error('question_11');
			$message .= form_error('question_12');
			$message .= form_error('question_13');
			$message .= form_error('question_14');
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
			// $post['question_13'] = implode(',', $post['question_13']);
			// $post['question_16'] = implode(',', $post['question_16']);
			$id = $this->assessment4->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);

				$_SESSION["assessment_id"] = $id;

				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->assessment4->error_message;
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
			array('title' => 'assessment4', 'url' => site_url('assessment/assessment4')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->assessment4->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['provinces_province_id_option_list'] = $this->assessment4->returnOptionList("provinces", "id", "name_th");
				$this->render_view('assessment/assessment4/edit_view');
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

			$post['question_10'] = implode(',', $post['question_10']);
			$result = $this->assessment4->update($post);
			if ($result == false) {
				$message = $this->assessment4->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->assessment4->error_message;
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
			$result = $this->assessment4->delete($post);
			if ($result == false) {
				$message = $this->assessment4->error_message;
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
			$data[$i]['preview_question_1'] = $this->setQuestion1Subject($data[$i]['question_1']);
			$data[$i]['preview_question_3'] = $this->setQuestion3Subject($data[$i]['question_3']);
			$data[$i]['preview_question_5'] = $this->setQuestion5Subject($data[$i]['question_5']);
			$data[$i]['preview_question_6'] = $this->setQuestion6Subject($data[$i]['question_6']);
			$data[$i]['preview_question_7'] = $this->setQuestion7Subject($data[$i]['question_7']);
			$data[$i]['preview_question_8'] = $this->setQuestion8Subject($data[$i]['question_8']);
			$data[$i]['preview_question_9'] = $this->setQuestion9Subject($data[$i]['question_9']);
			$data[$i]['preview_question_10'] = $this->setQuestion10Subject($data[$i]['question_10']);
			$data[$i]['preview_question_12'] = $this->setQuestion12Subject($data[$i]['question_12']);
			$data[$i]['preview_question_13'] = $this->setQuestion13Subject($data[$i]['question_13']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion1Subject($value)
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
	 * SET choice subject
	 */
	private function setQuestion3Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = '1.ศึกษาอยู่';
				break;
			case 2:
				$subject = '2. ไม่ได้ศึกษา';
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
		switch ($value) {
			case 1:
				$subject = '1. เป็นลูกคนเดียว';
				break;
			case 2:
				$subject = '2. มีพี่น้องรวมทั้งหมด';
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
		switch ($value) {
			case '1':
				$subject = 'Choice 1';
				break;
			case '2':
				$subject = 'Choice 2';
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
		switch ($value) {
			case 1:
				$subject = '1. บิดามารดาอยู่ด้วยกัน';
				break;
			case 2:
				$subject = '2. บิดามารดาแยกกันอยู่';
				break;
			case 3:
				$subject = '3. บิดาเสียชีวิตแล้ว';
				break;
			case 4:
				$subject = '4. มารดาเสียชีวิตแล้ว';
				break;
			case 5:
				$subject = '5. บิดาและมารดาเสียชีวิตแล้ว';
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
		switch ($value) {
			case 1:
				$subject = '1';
				break;
			case 2:
				$subject = '2';
				break;
			case 3:
				$subject = '3';
				break;
			case 4:
				$subject = '4';
				break;
			case 5:
				$subject = '5';
				break;
			case 6:
				$subject = '6';
				break;
			case 7:
				$subject = 'อื่น ๆ';
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
		switch ($value) {
			case 1:
				$subject = '1';
				break;
			case 2:
				$subject = '2';
				break;
			case 3:
				$subject = '3';
				break;
			case 4:
				$subject = '4';
				break;
			case 5:
				$subject = '5';
				break;
			case 6:
				$subject = '6';
				break;
			case 7:
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion10Subject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  '1';
					break;
				case '2':
					$subject .= $comma .  '2';
					break;
				case '3':
					$subject .= $comma .  '3';
					break;
				case '4':
					$subject .= $comma .  '4';
					break;
				case '5':
					$subject .= $comma .  '5';
					break;
				case '6':
					$subject .= $comma .  '6';
					break;
				case '7':
					$subject .= $comma .  'อื่น ๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion12Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เคย';
				break;
			case 2:
				$subject = 'ไม่เคย';
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
		switch ($value) {
			case '1':
				$subject = '1';
				break;
			case '2':
				$subject = '2';
				break;
			case '3':
				$subject = '3';
				break;
			case '4':
				$subject = '4';
				break;
			case '5':
				$subject = '5';
				break;
			case '6':
				$subject = '6';
				break;
			case '7':
				$subject = '7';
				break;
			case '8':
				$subject = '8';
				break;
			case '9':
				$subject = '9';
				break;
			case '10':
				$subject = '10';
				break;
			case '11':
				$subject = '11';
				break;
			case '12':
				$subject = 'อื่น ๆ โปรดระบุ';
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

		$pk1 = $data['id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;


		$provinceIdNameTh = $this->table('provinces')->get_value('name_th')->where("id = '$data[province_id]'");
		$this->data['provinceIdNameTh'] = $provinceIdNameTh;

		$this->data['record_id'] = $data['id'];
		$this->data['record_assessment_code'] = $data['assessment_code'];
		$this->data['record_province_id'] = $data['province_id'];
		$this->data['preview_question_1'] = $this->setQuestion1Subject($data['question_1']);
		$this->data['record_question_1'] = $data['question_1'];
		$this->data['record_question_2'] = $data['question_2'];
		$this->data['preview_question_3'] = $this->setQuestion3Subject($data['question_3']);
		$this->data['record_question_3'] = $data['question_3'];
		$this->data['record_question_4'] = $data['question_4'];
		$this->data['preview_question_5'] = $this->setQuestion5Subject($data['question_5']);
		$this->data['record_question_5'] = $data['question_5'];
		$this->data['preview_question_6'] = $this->setQuestion6Subject($data['question_6']);
		$this->data['record_question_6'] = $data['question_6'];
		$this->data['preview_question_7'] = $this->setQuestion7Subject($data['question_7']);
		$this->data['record_question_7'] = $data['question_7'];
		$this->data['preview_question_8'] = $this->setQuestion8Subject($data['question_8']);
		$this->data['record_question_8'] = $data['question_8'];
		$this->data['preview_question_9'] = $this->setQuestion9Subject($data['question_9']);
		$this->data['record_question_9'] = $data['question_9'];
		$this->data['preview_question_10'] = $this->setQuestion10Subject($data['question_10']);
		$this->data['record_question_10'] = $data['question_10'];
		$this->data['record_question_11'] = $data['question_11'];
		$this->data['preview_question_12'] = $this->setQuestion12Subject($data['question_12']);
		$this->data['record_question_12'] = $data['question_12'];
		$this->data['preview_question_13'] = $this->setQuestion13Subject($data['question_13']);
		$this->data['record_question_13'] = $data['question_13'];
		$this->data['record_question_14'] = $data['question_14'];
	}
}
/*---------------------------- END Controller Class --------------------------------*/
