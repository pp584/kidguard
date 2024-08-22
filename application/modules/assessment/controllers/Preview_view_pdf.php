<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : assessment4.php ]
 */
class Preview_view_pdf extends CRUD_Controller
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

    /**
     * Index of controller
     */
    public function index()
    {
        $this->render_view();
    }

    protected function render_view()
    {
        $this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
        // $this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
        // $this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
        // $this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
        $this->data['another_css'] = $this->another_css;
        $this->data['another_js'] = $this->another_js;


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
        $this->parser->parse('template/front-end/preview_view_pdf', $this->data);
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




}
