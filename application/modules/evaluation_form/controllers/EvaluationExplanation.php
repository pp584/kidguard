<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : evaluation_create.php ]
 */
class EvaluationExplanation extends CRUD_Controller
{
	private $per_page;
	private $another_js;
	private $js_util_url;
	private $another_css;
	private $evaluate;

	private $complete_qt_basic = false;
	private $complete_qt_immune  = false;
	private $complete_qt_contextual  = false;
	private $complete_qt_risky  = false;
	public $list_qt  = [];
	public $list_ch  = [];
	public $list_graph  = [];
	public $user_id = '';

	public $user_info;
	public $immune_info;
	public $contextual_info;
	public $risky_info;

	public $province = [];
	public $amphure = [];

	private $num_links;
	private $uri_segment;

	// private $parser;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		$basic_data = $this->session->userdata('basic_form_data');
		if ($basic_data) {
			$this->user_info = array(
				"province" => isset($basic_data["province"]) ? $basic_data["province"] : "",
				"district" => isset($basic_data["district"]) ? $basic_data["district"] : "",
				"postal_code" => isset($basic_data["postal_code"]) ? $basic_data["postal_code"] : "",
				"gender" => isset($basic_data["gender"]) ? $basic_data["gender"] : "",
				"age" => isset($basic_data["age"]) ? $basic_data["age"] : null,
				"education_status" => isset($basic_data["education_status"]) ? $basic_data["education_status"] : "",
				"num_siblings" => isset($basic_data["num_siblings"]) ? $basic_data["num_siblings"] : "",
				"family_status" => isset($basic_data["family_status"]) ? $basic_data["family_status"] : "",
				"father_occupation" => isset($basic_data["father_occupation"]) ? $basic_data["father_occupation"] : "",
				"mother_occupation" => isset($basic_data["mother_occupation"]) ? $basic_data["mother_occupation"] : "",
				"family_income" => isset($basic_data["family_income"]) ? $basic_data["family_income"] : "",
				"consult_people" => isset($basic_data["consult_people"]) ? $basic_data["consult_people"] : [],
				"drug_history" => isset($basic_data["drug_history"]) ? $basic_data["drug_history"] : "",
				"type_of_drugs" => isset($basic_data["type_of_drugs"]) ? $basic_data["type_of_drugs"] : [],
				"other_drugs" => isset($basic_data["other_drugs"]) ? $basic_data["other_drugs"] : "",
				"other_consult_people" => isset($basic_data["other_consult_people"]) ? $basic_data["other_consult_people"] : ""
			);
		} else {
			$this->user_info = array(
				"province" => "",
				"district" => "",
				"postal_code" => "",
				"gender" => "",
				"age" => null,
				"education_status" => "",
				"num_siblings" => "",
				"family_status" => "",
				"father_occupation" => "",
				"mother_occupation" => "",
				"family_income" => "",
				"consult_people" => array(),
				"drug_history" => "",
				"type_of_drugs" => array(),
				"other_drugs" => "",
				"other_consult_people" => ""
			);
		}

		if ($this->session->userdata('complete_qt_basic')) {
			$this->complete_qt_basic = $this->session->userdata('complete_qt_basic');
		} else {
			$this->complete_qt_risky = false;
		}
		if ($this->session->userdata('complete_qt_immune')) {
			$this->complete_qt_immune = $this->session->userdata('complete_qt_immune');
		} else {
			$this->complete_qt_immune = false;
		}
		if ($this->session->userdata('complete_qt_contextual')) {
			$this->complete_qt_contextual = $this->session->userdata('complete_qt_contextual');
		} else {
			$this->complete_qt_contextual = false;
		}
		if ($this->session->userdata('complete_qt_risky')) {
			$this->complete_qt_risky = $this->session->userdata('complete_qt_risky');
		} else {
			$this->complete_qt_risky = false;
		}

		$immune_data = $this->session->userdata('immune_save_form_data');
		if ($immune_data) {
			$this->immune_info = $immune_data;
		}
		$contextual_data = $this->session->userdata('contextual_save_form_data');
		if ($contextual_data) {
			$this->contextual_info = $contextual_data;
		}
		$risky_data = $this->session->userdata('risky_save_form_data');
		if ($risky_data) {
			$this->risky_info = $risky_data;
		}

		// print_r($this->user_info);
		// _____ update session by key
		// $this->session->set_userdata($this->user_info);

		// _____ find session by key
		// $postal_code = $this->session->userdata('postal_code');

		// _____remove by key
		// $this->session->unset_userdata('some_key');

		// _____remove all
		// $this->session->sess_destroy();

		$this->per_page = 30;
		$this->num_links = 6;
		$this->uri_segment = 4;
		//$this->load->model('users/Users_model', 'Users');
		$this->load->model('evaluation_form/evaluation_model', 'EvaluationExplanation');
		$this->EvaluationExplanation->session_name = 'EvaluationExplanation';
		$this->data['page_url'] = site_url('evaluation/evaluation');

		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/evaluations/evaluation.js?ft=' . filemtime('assets/js_modules/evaluations/evaluation.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';

		$js_util_url = 'assets/js/ci_utilities.js?ft=' . filemtime('assets/js/ci_utilities.js');
		$this->js_util_url .= '<script src="' . base_url($js_util_url) . '"></script>';
		$this->read_json();

		// if ($this->user_info['province']) {
		// 	echo "pass";
		// }
	}

	/*
	*-----------------------------------------------
	* START _____Index of controller
	*/

	public function read_json()
	{
		$file_path = FCPATH . 'assets/jsons/provinceDB.json'; // Replace with actual path
		$json_string = file_get_contents($file_path);
		if ($json_string === false) {
			return;
		}

		$data = json_decode($json_string, true);

		// print_r($data);
		foreach ($data as $geo) {
			foreach ($geo['provincesLists'] as $prov) {
				$this->province[] = [
					'id' => $prov['id'],
					'nameTH' => $prov['nameTH'],
					'amphuresList' => array_map(function ($x) {
						return [
							'id' => (int) $x['id'],
							'nameTH' => $x['nameTH'],
							'postalLists' => array_map(function ($y) {
								return [
									'id' => (int) $y['id'],
									'districtTH' => $y['nameTH'],
									'zipCode' => $y['zipCode'],
								];
							}, $x['districtsLists']),
						];
					}, $prov['amphuresLists']),
				];
			}
		}
	}

	public function filter_amphures()
	{
		$province_name = $this->input->post('province');

		$found_province = array_filter($this->province, function ($province) use ($province_name) {
			return $province['nameTH'] === $province_name;
		});

		if (!empty($found_province)) {
			$found_province = array_values($found_province); // Resetting keys
			$amphuresList = $found_province[0]['amphuresList'];
		} else {
			$amphuresList = [];
		}

		echo json_encode($amphuresList);
	}
	public function index()
	{
		$this->evaluate = false;
		$this->render_view('evaluation_form/evaluation_view');
	}
	/*
	*-----------------------------------------------
	* START _____Question route of controller
	*/
	public function question_basic()
	{
		$this->evaluate = true;
		$this->render_view('evaluation_form/evaluation_basic_view');
	}
	public function question_immune()
	{
		$data = $this->EvaluationExplanation->getAllQuestion();
		$groupedData = [];

		foreach ($data[0]['questions'] as $index => $question) {
			$groupId = $question['question_group_id'];
			$subGroupId = isset($question['question_sub_group_id']) ? $question['question_sub_group_id'] : 'no_subgroup';

			if (!isset($groupedData[$groupId])) {
				$groupedData[$groupId] = [
					"question_group_id" => $question['question_group_id'],
					"question_group_index" => $question['question_group_index'],
					"question_group_name" => $question['question_group_name'],
					"sub_groups" => []
				];
			}

			if (!isset($groupedData[$groupId]['sub_groups'][$subGroupId])) {
				$groupedData[$groupId]['sub_groups'][$subGroupId] = [
					"question_sub_group_id" => $subGroupId,
					"question_sub_group_index" => isset($question['question_sub_group_index']) ? $question['question_sub_group_index'] : null,
					"question_sub_group_name" => isset($question['question_sub_group_name']) ? $question['question_sub_group_name'] : 'null',
					"head_choice" => [],
					"question_list" => []
				];
			}

			$unique = [];
			foreach ($question['choices'] as $item) {
				$choiceName = $item['choice_name'];
				if (!isset($unique[$choiceName])) {
					$unique[$choiceName] = $item;
				}
			}
			$groupedData[$groupId]['sub_groups'][$subGroupId]['head_choice'] = array_values($unique);
			$groupedData[$groupId]['sub_groups'][$subGroupId]['question_list'][] = [
				"question_id" => $question['question_id'],
				"question_index" => $question['question_index'],
				"question_name" => $question['question_name'],
				"choices" => $question['choices'],
				"answer" => "null"
			];

			// $this->list_ch[] = $question['choices'];
		}

		$finalOutput = [];
		foreach ($groupedData as $groupId => $group) {
			$subGroups = array_values($group['sub_groups']);
			$group['sub_groups'] = $subGroups;
			foreach ($group['sub_groups'] as &$subGroup) {
				$subGroup = array_filter($subGroup, function ($value) {
					return $value !== null;
				});
			}
			$finalOutput[] = $group;
		}

		// print_r($finalOutput);

		$this->list_qt = $finalOutput;
		$this->evaluate = true;
		$this->render_view('evaluation_form/evaluation_immune_view');
	}
	public function question_contextual()
	{
		$data = $this->EvaluationExplanation->getAllQuestion();
		$groupedData = [];

		foreach ($data[1]['questions'] as $question) {
			$groupId = $question['question_group_id'];
			$subGroupId = isset($question['question_sub_group_id']) ? $question['question_sub_group_id'] : 'no_subgroup';

			if (!isset($groupedData[$groupId])) {
				$groupedData[$groupId] = [
					"question_group_id" => $question['question_group_id'],
					"question_group_index" => $question['question_group_index'],
					"question_group_name" => $question['question_group_name'],
					"sub_groups" => []
				];
			}

			if (!isset($groupedData[$groupId]['sub_groups'][$subGroupId])) {
				$groupedData[$groupId]['sub_groups'][$subGroupId] = [
					"question_sub_group_id" => $subGroupId,
					"question_sub_group_index" => isset($question['question_sub_group_index']) ? $question['question_sub_group_index'] : null,
					"question_sub_group_name" => isset($question['question_sub_group_name']) ? $question['question_sub_group_name'] : 'null',
					"question_list" => []
				];
			}

			$unique = [];
			foreach ($question['choices'] as $item) {
				$choiceName = $item['choice_name'];
				if (!isset($unique[$choiceName])) {
					$unique[$choiceName] = $item;
				}
			}
			$groupedData[$groupId]['sub_groups'][$subGroupId]['head_choice'] = array_values($unique);

			$groupedData[$groupId]['sub_groups'][$subGroupId]['question_list'][] = [
				"question_id" => $question['question_id'],
				"question_index" => $question['question_index'],
				"question_name" => $question['question_name'],
				"choices" => $question['choices'],
				"answer" => "null"
			];
		}

		// Reformat the grouped data to match the desired output structure
		$finalOutput = [];
		foreach ($groupedData as $groupId => $group) {
			$subGroups = array_values($group['sub_groups']);
			$group['sub_groups'] = $subGroups;
			foreach ($group['sub_groups'] as &$subGroup) {
				$subGroup = array_filter($subGroup, function ($value) {
					return $value !== null;
				});
			}
			$finalOutput[] = $group;
		}

		$this->list_qt = $finalOutput;
		$this->evaluate = true;
		$this->render_view('evaluation_form/evaluation_contextual_view');
	}
	public function question_risky()
	{
		$data = $this->EvaluationExplanation->getAllQuestion();
		$groupedData = [];

		foreach ($data[2]['questions'] as $question) {
			$groupId = $question['question_group_id'];
			$subGroupId = isset($question['question_sub_group_id']) ? $question['question_sub_group_id'] : 'no_subgroup';

			if (!isset($groupedData[$groupId])) {
				$groupedData[$groupId] = [
					"question_group_id" => $question['question_group_id'],
					"question_group_index" => $question['question_group_index'],
					"question_group_name" => $question['question_group_name'],
					"sub_groups" => []
				];
			}

			if (!isset($groupedData[$groupId]['sub_groups'][$subGroupId])) {
				$groupedData[$groupId]['sub_groups'][$subGroupId] = [
					"question_sub_group_id" => $subGroupId,
					"question_sub_group_index" => isset($question['question_sub_group_index']) ? $question['question_sub_group_index'] : null,
					"question_sub_group_name" => isset($question['question_sub_group_name']) ? $question['question_sub_group_name'] : 'null',
					"question_list" => []
				];
			}

			$unique = [];
			foreach ($question['choices'] as $item) {
				$choiceName = $item['choice_name'];
				if (!isset($unique[$choiceName])) {
					$unique[$choiceName] = $item;
				}
			}
			$groupedData[$groupId]['sub_groups'][$subGroupId]['head_choice'] = array_values($unique);

			$groupedData[$groupId]['sub_groups'][$subGroupId]['question_list'][] = [
				"question_id" => $question['question_id'],
				"question_index" => $question['question_index'],
				"question_name" => $question['question_name'],
				"choices" => $question['choices'],
				"answer" => "null"
			];
		}

		// Reformat the grouped data to match the desired output structure
		$finalOutput = [];
		foreach ($groupedData as $groupId => $group) {
			$subGroups = array_values($group['sub_groups']);
			$group['sub_groups'] = $subGroups;
			foreach ($group['sub_groups'] as &$subGroup) {
				$subGroup = array_filter($subGroup, function ($value) {
					return $value !== null;
				});
			}
			$finalOutput[] = $group;
		}

		$this->list_qt = $finalOutput;

		// print_r($this->list_qt);
		$this->evaluate = true;
		$this->render_view('evaluation_form/evaluation_risky_view');
	}

	public function question_graph()
	{
		$this->evaluate = false;

		if (isset($_GET['id']) and $_GET['id'] != '') {
			$this->render_view('evaluation_form/evaluation_graph_share_view');
			return;
		}
		// $this->getGraph();
		$this->render_view('evaluation_form/evaluation_graph_view');
	}


	/*
	*-----------------------------------------------
	* START _____Render view of controller
	*/
	protected function render_view($path)
	{
		// $this->load->library('parser');
		// $this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		// $this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		// ๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘๘
		$this->data['top_navbar'] = $this->parser->parse('template/front-end/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;
		$this->data['evaluate'] = $this->evaluate;
		$this->data['complete_qt_basic'] = $this->complete_qt_basic;
		$this->data['complete_qt_immune'] = $this->complete_qt_immune;
		$this->data['complete_qt_contextual'] = $this->complete_qt_contextual;
		$this->data['complete_qt_risky'] = $this->complete_qt_risky;
		$this->data['utilities_file_time'] = filemtime('assets/js/ci_utilities.js');
		$this->data['js_util_url'] = $this->js_util_url;

		if ($_SERVER['REQUEST_URI'] === '/siamit-ctrlplus_oncb-backend-codeiniter/evaluation_form/evaluationExplanation/question_graph?id=' . (isset($_GET['id']) ? $_GET['id'] : '')) {
			$this->parser->parse('template/front-end-v2/evaluation_share_view', $this->data);
		} else {
			$this->parser->parse('template/front-end-v2/evaluation_view', $this->data);
		}
	}



	/*
	*-----------------------------------------------
	* START _____Function Handle Or Submit view of controller
	*/
	public function basic_save()
	{
		$message = '';
		// $message .= $this->formValidate();
		// $this->load->library('form_validation');
		// $frm = $this->form_validation;

		$post = $this->input->post(NULL, TRUE);
		$this->session->set_userdata('basic_form_data', $post);
		$this->session->set_userdata('complete_qt_basic', true);

		$success = TRUE;

		$json = json_encode(array(
			'is_successful' => $success,
			'message' => $message
		));

		echo $json;
	}
	public function immune_save()
	{
		$message = '';
		$post = $this->input->post(NULL, TRUE);
		$this->session->set_userdata('immune_save_form_data', $post);
		$this->session->set_userdata('complete_qt_immune', true);
		$success = TRUE;

		$json = json_encode(array(
			'is_successful' => $success,
			'message' => $message,
			'complete_qt_basic' => $this->session->userdata('complete_qt_basic'),
			'complete_qt_immune' => $this->session->userdata('complete_qt_immune'),
			'complete_qt_contextual' => $this->session->userdata('complete_qt_contextual'),
			'complete_qt_risky' => $this->session->userdata('complete_qt_risky')
		));

		echo $json;
	}
	public function contextual_save()
	{
		$message = '';
		$post = $this->input->post(NULL, TRUE);
		$this->session->set_userdata('contextual_save_form_data', $post);
		$this->session->set_userdata('complete_qt_contextual', true);
		// $this->complete_qt_contextual = true;
		$success = TRUE;

		$json = json_encode(array(
			'is_successful' => $success,
			'message' => $message,
			'complete_qt_contextual' => $this->session->userdata('complete_qt_contextual')
		));

		echo $json;
	}
	public function risky_save()
	{
		$message = '';
		$post = $this->input->post(NULL, TRUE);
		$this->session->set_userdata('risky_save_form_data', $post);
		$this->session->set_userdata('complete_qt_risky', true);

		$this->complete_qt_risky = true;
		$success = TRUE;

		$json = json_encode(array(
			'is_successful' => $success,
			'message' => $message,
			'complete_qt_risky' => $this->session->userdata('complete_qt_risky')
		));

		echo $json;
	}

	public function submit_form()
	{
		$question_basic = $this->user_info;
		$question_immune = $this->immune_info;
		$question_contextual = $this->contextual_info;
		$question_risky = $this->risky_info;

		if (isset($question_basic['other_consult_people'])) {
			unset($question_basic['other_consult_people']);
		}
		if (isset($question_basic['other_drugs'])) {
			unset($question_basic['other_drugs']);
		}
		$matchingValues = [];

		if ($question_immune) {
			$matchingValues =  array_merge($matchingValues, $this->extractAllValuesFromArrays($question_immune));
		}

		if ($question_contextual) {
			$matchingValues =  array_merge($matchingValues, $this->extractAllValuesFromArrays($question_contextual));
		}

		if ($question_risky) {
			$matchingValues =  array_merge($matchingValues, $this->extractAllValuesFromArrays($question_risky));
		}

		$questionAll = $this->EvaluationExplanation->getAllQuestion();

		$newRequest = [];
		$question_index = 0;
		foreach ($questionAll as $index1 => $value1) {
			foreach ($value1['questions'] as $index2 => $value2) {
				$score = 0;
				$choice_id = '';
				$choice_name = '';
				foreach ($value2['choices'] as $index3 => $value3) {
					if ($value3['choice_id'] === $matchingValues[$question_index]) {
						$choice_id = $value3['choice_id'];
						$score = $value3['choice_score'];
						$choice_name = $value3['choice_name'];
						break;
					}
				}
				$newRequest[] = [
					'question_id' => $value2['question_id'],
					'choice_id' => $choice_id,
					'graph_bar_id' => $value2['graph_bar_id'],
					'question_name' => $value2['question_name'],
					'score' => $score,
					'choice_name' => $choice_name,
				];
				$question_index++;
			}
		}

		$data = [
			'user_info' => $question_basic,
			'answers' => $newRequest,
		];

		$message = '';
		$res = $this->EvaluationExplanation->userSubmitQuestion($data);

		// $json = json_encode(array(
		// 	'is_successful' => $success,
		// 	'message' => $message,
		// 	'basic' => $question_basic,
		// 	'immune' => $question_immune,
		// 	'contextual' => $question_contextual,
		// 	'risky' => $question_risky,
		// 	'request' => $data,
		// 	'dataMap' => $matchingValues,
		// 	'answer' => $newRequest,
		// 	'question_all' => $questionAll,
		// ));
		if ($res) {
			$success = TRUE;
			$json = json_encode(array(
				'is_successful' => $success,
				'message' => $message,
				'data' => $res,
				'basic' => $question_basic,
				'immune' => $question_immune,
				'contextual' => $question_contextual,
				'risky' => $question_risky,
				'request' => $data,
				'dataMap' => $matchingValues,
				'answer' => $newRequest,
				'question_all' => $questionAll,
			));

			$user_id = $res;
		} else {
			$success = FALSE;
			$json = json_encode(array(
				'is_successful' => $success,
				'message' => $message,
				'data' => null
			));
		}

		$this->complete_qt_basic = false;
		$this->complete_qt_immune = false;
		$this->complete_qt_contextual = false;
		$this->complete_qt_risky = false;
		// $this->session->sess_destroy();
		echo $json;
	}

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
			$post['question_13'] = implode(',', $post['question_13']);

			$question_15 = $post['question_15'];
			if ($question_15 == 1) {
				$post['question_16'] = implode(',', $post['question_16']);
			} else {
				$post['question_16'] = '';
				$post['question_17'] = '';
			}


			$question_3 = $post['question_3'];


			if ($question_3  == 1) {
				$post['question_4'] = $post['question_4'];
			} else {
				$post['question_4'] = '';
			}

			$question_5 = $post['question_5'];
			if ($question_5  == 2) {
				$post['question_6'] = $post['question_6'];
			} else {
				$post['question_6'] = '';
			}

			$question_8 = $post['question_8'];
			if ($question_8  == 7) {
				$post['question_9'] = $post['question_9'];
			} else {
				$post['question_9'] = '';
			}

			$question_10 = $post['question_10'];
			if ($question_10  == 6) {
				$post['question_11'] = implode(',', $post['question_11']);
			} else {
				$post['question_11'] = '';
			}




			$id = $this->Assessment1->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Assessment1->error_message;
			}

			$json = json_encode(array(
				'is_successful' => $success,
				'encrypt_id' =>  $encrypt_id,
				'message' => $message
			));

			echo $json;
		}
	}

	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$post = $this->input->post(NULL, TRUE);

		$encrypt_id = '';
		$question_15 = $post['question_15'];


		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', 'เพศ', 'trim|required|is_natural');
		$frm->set_rules('question_2', 'อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', 'สถานภาพการศึกษา', 'trim|required|is_natural');
		// $frm->set_rules('question_4', 'ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่ ', 'trim|required|is_natural');
		$frm->set_rules('question_5', 'จำนวนพี่น้อง', 'trim|required|is_natural');
		$question_5 = $post['question_5'];
		if ($question_5 == 2) {
			$question_6 = $post['question_6'];
			if ($question_6 == '') {
				$frm->set_rules('question_6', 'จำนวนพี่น้อง', 'trim|required');
			}
		}


		$frm->set_rules('question_7', 'สถานภาพทางครอบครัว', 'trim|required|is_natural');
		$frm->set_rules('question_8', 'อาชีพของบิดา', 'trim|required|is_natural');
		$frm->set_rules('question_10', 'อาชีพของมารดา', 'trim|required|is_natural');
		$frm->set_rules('question_12', 'รายได้ของครอบครัว (เฉลี่ยต่อเดือน) ', 'trim|required|is_natural');
		$frm->set_rules('question_15', 'ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่ ', 'trim|required|is_natural');

		// 1= เคย ,2 ช= ไม่เคย  
		// if ($question_15 == 1) {
		// 	$frm->set_rules('question_16', 'ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|required|is_natural');
		// }

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province_id');
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			// $message .= form_error('question_4');
			$message .= form_error('question_5');
			$question_5 = $post['question_5'];
			if ($question_5 == 2) {
				$question_6 = $post['question_6'];
				if ($question_6 == '') {
					$message .= form_error('question_6');
				}
			}


			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_10');
			$message .= form_error('question_12');
			$message .= form_error('question_15');

			// if ($question_15 == 1) {
			// 	$message .= form_error('question_16');
			// }

			return $message;
		}
	}

	/*
	*-----------------------------------------------
	* START _____Utility of controller
	*/
	function extractAllValuesFromArrays(array ...$dataArrays): array
	{
		$allValues = [];

		foreach ($dataArrays as $data) {
			$allValues = array_merge($allValues, array_values($data));
		}

		return $allValues;
	}

	public function getGraph()
	{
		$message = '';

		if (isset($_GET['id']) and $_GET['id'] != '') {
			$this->list_graph = $this->EvaluationExplanation->getAllSummaryGraph($_GET['id']);
		}

		// echo $this->list_graph;
		$success = TRUE;
		$json = json_encode(array(
			'is_successful' => $success,
			'message' => $message,
			'data' => $this->list_graph
		));

		echo $json;

		// $this->question_graph();
	}

	public function clear()
	{
		$this->complete_qt_basic = false;
		$this->complete_qt_immune = false;
		$this->complete_qt_contextual = false;
		$this->complete_qt_risky = false;
		$this->session->sess_destroy();
	}
}
