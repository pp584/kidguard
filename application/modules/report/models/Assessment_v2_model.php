<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Assessment_model Class
 * @date 2023-12-16
 */
class Assessment_v2_model extends MY_Model
{
	private $my_table;
	public $session_name;
	public $order_field;
	public $order_sort;

	public $order_by;
	public $where_condition;

	public $owner_record;

	public function __construct()
	{
		parent::__construct();
		$this->my_table = 'dashboard_data';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';

		$this->order_by = '';
		$this->where_condition = '';
	}

	public function getScore($requestData)
	{
		try {
			$page =  (isset($requestData['page']) && !empty($requestData['page'])) ? $requestData['page'] : 1;
			$pageSize =  (isset($requestData['page_size'])) ? $requestData['page_size'] : 10;
			$startDate = (isset($requestData['start_date']) && !empty($requestData['start_date'])) ? $requestData['start_date'] : "2024-01-01";
			$endDate = (isset($requestData['end_date']) && !empty($requestData['end_date'])) ? $requestData['end_date'] : date('Y-m-d');
			$orderBy =  (isset($requestData['order_by']) && !empty($requestData['order_by'])) ? $requestData['order_by'] : 'DESC';

			$startDateFormatted = (new DateTime($startDate . ' 00:00:00'))->format('Y-m-d H:i:s');
			$endDateFormatted = (new DateTime($endDate . ' 23:59:59'))->format('Y-m-d H:i:s');
			$limit = ($pageSize > 0) ? $pageSize : null;
			$offset = ($page - 1) * $limit;

			$selectStatement = '';
			$fields = $this->db->list_fields('submit_user');
			foreach ($fields as $field) {
				$selectStatement .= 'submit_user.' . $field . ' AS submit_user_' . $field . ',';
			}
			$this->db->select('SQL_CALC_FOUND_ROWS ' . $selectStatement, false);
			$this->db->from('submit_user');
			$this->db->where("submit_date BETWEEN '$startDateFormatted' AND '$endDateFormatted'");
			$this->db->order_by('submit_date', $orderBy);
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			$numRows = $query->num_rows();
			$users = $query->result_array();

			//Pagination detail
			$totalItemQuery = $this->db->query('SELECT FOUND_ROWS() AS total_item');

			$totalItem = $totalItemQuery->row()->total_item;
			$resultItem = $numRows;
			$firstItem = $resultItem > 0 ? ($page - 1) * $pageSize + 1 : 0;
			$lastItem = $resultItem > 0 ? min($page * $pageSize, $totalItem) : 0;
			if ($lastItem == 0) $lastItem = $totalItem;

			$pagination = [
				"total_item" => $totalItem,
				"result_item" => $resultItem,
				"first_item" => $firstItem,
				"last_item" => $lastItem,
			];

			$userIds = array_column($users, 'submit_user_id');
			if (!empty($userIds)) {
				$this->db->select('
                submit_answer.submit_user_id AS user_id,
                question.id AS question_id,
                question.name AS question_name,
                choice.id AS choice_id,
                choice.score AS choice_score,
            ');
				$this->db->from('submit_answer');
				$this->db->join('question', 'question.id = submit_answer.question_id', 'left');
				$this->db->join('choice', 'choice.id = submit_answer.choice_id', 'left');
				$this->db->join('question_group', 'question_group.id = question.question_group_id', 'left');
				$this->db->join('question_sub_group', 'question_group.id = question.question_sub_group_id', 'left');
				$this->db->join('section', 'section.id = question_group.section_id', 'left');
				$this->db->where_in('submit_answer.submit_user_id', $userIds);
				$this->db->order_by('submit_answer.id', 'ASC');
				$this->db->order_by('section.index', 'ASC');
				$this->db->order_by('question_group.index', 'ASC');
				$this->db->order_by('question_sub_group.index', 'ASC');
				$this->db->order_by('question.index', 'ASC');
				$this->db->order_by('choice.score', 'ASC');
				$query = $this->db->get();
				$submitAnswer = $query->result_array();
			} else {
				$submitAnswer = array();
			}

			$formattedData = array();
			foreach ($submitAnswer as $answer) {
				$answerIndex = null;
				foreach ($formattedData as $index => $row) {
					if ($row['user_id'] === $answer['user_id']) {
						$answerIndex = $index;
						break;
					}
				}
				if ($answerIndex === null) {
					$answerIndex = count($formattedData);
					$formattedData[] = array(
						'user_id' => $answer['user_id'],
						'answers' => array(),
					);
				}

				$questionIndex = count($formattedData[$answerIndex]['answers']);
				$formattedData[$answerIndex]['answers'][] = array(
					'question' => strval($questionIndex + 1),
					'choice' => $answer['choice_score'],
				);
			}

			$usersFormat = array();
			foreach ($users as $user) {
				$usersFormat[$user['submit_user_id']] = array(
					'ticket' => $user['submit_user_ticket'],
					'province' => $user['submit_user_province'],
					'district' => $user['submit_user_district'],
					'postal_code' => $user['submit_user_postal_code'],
					'gender' => $user['submit_user_gender'],
					'age' => $user['submit_user_age'],
					'education_status' => $user['submit_user_education_status'],
					'num_siblings' => $user['submit_user_num_siblings'],
					'family_status' => $user['submit_user_family_status'],
					'father_occupation' => $user['submit_user_father_occupation'],
					'mother_occupation' => $user['submit_user_mother_occupation'],
					'family_income' => $user['submit_user_family_income'],
					'consult_people' => $user['submit_user_consult_people'],
					'drug_history' => $user['submit_user_drug_history'],
					'type_of_drugs' => $user['submit_user_type_of_drugs'],
					'submit_date' => $user['submit_user_submit_date'],
				);
			}

			$formattedDataAssoc = array();
			foreach ($formattedData as $data) {
				$formattedDataAssoc[$data['user_id']] = $data;
			}

			$dataUsers = array();
			foreach ($users as $user) {
				$userId = $user['submit_user_id'];
				if (isset($formattedDataAssoc[$userId])) {
					$dataUsers[] = array_merge($usersFormat[$userId], $formattedDataAssoc[$userId]);
				} else {
					$dataUsers[] = $usersFormat[$userId]; // Add user data even if no answers are found
				}
			}

			$data = [
				"data" => $dataUsers,
				"pagination" => $pagination
			];
			return $data;
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			return $data;
		}
	}

	public function getQuestionList()
	{
		try {
			$this->db->select('	
				question.id,
				question.name
			');
			$this->db->from('question');
			$this->db->join('question_sub_group', 'question.question_sub_group_id = question_sub_group.id', 'left');
			$this->db->join('question_group', 'question.question_group_id = question_group.id', 'left');
			$this->db->join('section', 'question_group.section_id = section.id', 'left');
			$this->db->order_by('section.index', 'ASC');
			$this->db->order_by('question_group.index', 'ASC');
			$this->db->order_by('question_sub_group.index', 'ASC');
			$this->db->order_by('question.index', 'ASC');

			$query = $this->db->get();
			$data = $query->result_array();

			return $data;
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			return $data;
		}
	}

	public function getScoreAverage($requestData)
	{
		try {
			$page =  (isset($requestData['page']) && !empty($requestData['page'])) ? $requestData['page'] : 1;
			$pageSize =  (isset($requestData['page_size'])) ? $requestData['page_size'] : 10;
			$startDate = (isset($requestData['start_date']) && !empty($requestData['start_date'])) ? $requestData['start_date'] : "2024-01-01";
			$endDate = (isset($requestData['end_date']) && !empty($requestData['end_date'])) ? $requestData['end_date'] : date('Y-m-d');
			$orderBy =  (isset($requestData['order_by']) && !empty($requestData['order_by'])) ? $requestData['order_by'] : 'DESC';

			$startDateFormatted = (new DateTime($startDate . ' 00:00:00'))->format('Y-m-d H:i:s');
			$endDateFormatted = (new DateTime($endDate . ' 23:59:59'))->format('Y-m-d H:i:s');
			$limit = ($pageSize > 0) ? $pageSize : null;
			$offset = ($page - 1) * $limit;

			$selectStatement = '';
			$fields = $this->db->list_fields('submit_user');
			foreach ($fields as $field) {
				$selectStatement .= 'submit_user.' . $field . ' AS submit_user_' . $field . ',';
			}
			$this->db->select('SQL_CALC_FOUND_ROWS ' . $selectStatement, false);
			$this->db->from('submit_user');
			$this->db->where("submit_date BETWEEN '$startDateFormatted' AND '$endDateFormatted'");
			$this->db->order_by('submit_date', $orderBy);
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			$numRows = $query->num_rows();
			$users = $query->result_array();

			//Pagination detail
			$totalItemQuery = $this->db->query('SELECT FOUND_ROWS() AS total_item');

			$totalItem = $totalItemQuery->row()->total_item;
			$resultItem = $numRows;
			$firstItem = $resultItem > 0 ? ($page - 1) * $pageSize + 1 : 0;
			$lastItem = $resultItem > 0 ? min($page * $pageSize, $totalItem) : 0;
			if ($lastItem == 0) $lastItem = $totalItem;

			$pagination = [
				"total_item" => $totalItem,
				"result_item" => $resultItem,
				"first_item" => $firstItem,
				"last_item" => $lastItem,
			];

			$userIds = array_column($users, 'submit_user_id');
			if (!empty($userIds)) {
				$this->db->select('
                submit_answer_average.user_id AS user_id,
                submit_answer_average.average_score AS average_score,
                graph_bar.id AS graph_bar_id,
                graph_bar.name AS graph_bar_name,
            ');
				$this->db->from('submit_answer_average');
				$this->db->join('graph_bar', 'graph_bar.id = submit_answer_average.graph_bar_id', 'left');
				$this->db->join('graph', 'graph.id = graph_bar.graph_id', 'left');
				$this->db->where_in('submit_answer_average.user_id', $userIds);
				$this->db->order_by('graph.index', 'ASC');
				$this->db->order_by('graph_bar.index', 'ASC');
				$query = $this->db->get();
				$submitAnswer = $query->result_array();
			} else {
				$submitAnswer = array();
			}

			$formattedData = array();
			foreach ($submitAnswer as $answer) {
				$answerIndex = null;
				foreach ($formattedData as $index => $row) {
					if ($row['user_id'] === $answer['user_id']) {
						$answerIndex = $index;
						break;
					}
				}
				if ($answerIndex === null) {
					$answerIndex = count($formattedData);
					$formattedData[] = array(
						'user_id' => $answer['user_id'],
						'answers' => array(),
					);
				}

				$questionIndex = count($formattedData[$answerIndex]['answers']);
				$formattedData[$answerIndex]['answers'][] = array(
					'graph_bar_id' => $answer['graph_bar_id'],
					'graph_bar_name' => $answer['graph_bar_name'],
					'average_score' => $answer['average_score'],
				);
			}

			$usersFormat = array();
			foreach ($users as $user) {
				$usersFormat[$user['submit_user_id']] = array(
					'ticket' => $user['submit_user_ticket'],
					'province' => $user['submit_user_province'],
					'district' => $user['submit_user_district'],
					'postal_code' => $user['submit_user_postal_code'],
					'gender' => $user['submit_user_gender'],
					'age' => $user['submit_user_age'],
					'education_status' => $user['submit_user_education_status'],
					'num_siblings' => $user['submit_user_num_siblings'],
					'family_status' => $user['submit_user_family_status'],
					'father_occupation' => $user['submit_user_father_occupation'],
					'mother_occupation' => $user['submit_user_mother_occupation'],
					'family_income' => $user['submit_user_family_income'],
					'consult_people' => $user['submit_user_consult_people'],
					'drug_history' => $user['submit_user_drug_history'],
					'type_of_drugs' => $user['submit_user_type_of_drugs'],
					'submit_date' => $user['submit_user_submit_date'],
				);
			}
			$formattedDataAssoc = array();
			foreach ($formattedData as $data) {
				$formattedDataAssoc[$data['user_id']] = $data;
			}

			$dataUsers = array();
			foreach ($users as $user) {
				$userId = $user['submit_user_id'];
				if (isset($formattedDataAssoc[$userId])) {
					$dataUsers[] = array_merge($usersFormat[$userId], $formattedDataAssoc[$userId]);
				} else {
					$dataUsers[] = $usersFormat[$userId]; // Add user data even if no answers are found
				}
			}

			$data = [
				"data" => $dataUsers,
				"pagination" => $pagination
			];
			return $data;
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			return $data;
		}
	}

	public function getScoreAverageGraphBar()
	{
		try {
			//* GET REQUEST DATA

			//* QUERY DATA TO ADD TEMP_SCORE
			$this->db->select('
				graph_bar.id AS graph_bar_id,
				graph_bar.name AS graph_bar_name,
            ');
			$this->db->from('graph_bar');
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');

			$query = $this->db->get();
			$graphBarList = $query->result_array();

			$data = array('status' => "true", 'message' => null, 'data' => $graphBarList);
			return $graphBarList;
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			return $data;
		}
	}

	public function getGraphbarSetting()
	{
		try {
			$this->db->select('
				graph_bar.id AS graph_bar_id,
				graph_bar.name AS graph_bar_name,
				graph_bar.norm_none_drug AS graph_bar_norm_none_drug,
				graph_bar.norm_drug AS graph_bar_norm_drug,
				graph.id AS graph_id,
				graph.name AS graph_name
			');
			$this->db->from('graph_bar');
			$this->db->join('graph', 'graph.id = graph_bar.graph_id', 'left');
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');
			$query = $this->db->get();
			$graphBars = $query->result_array();

			$formattedData = array();
			foreach ($graphBars as $graphBar) {
				$graphIndex = null;
				foreach ($formattedData as $index => $row) {
					if ($row['graph_id'] === $graphBar['graph_id']) {
						$graphIndex = $index;
						break;
					}
				}
				if ($graphIndex === null) {
					$graphIndex = count($formattedData);
					$formattedData[] = array(
						'graph_id' => $graphBar['graph_id'],
						'graph_name' => $graphBar['graph_name'],
						'bars' => array(),
					);
				}

				$formattedData[$graphIndex]['bars'][] = array(
					'graph_bar_id' => $graphBar['graph_bar_id'],
					'graph_bar_name' => $graphBar['graph_bar_name'],
					'norm_none_drug' => $graphBar['graph_bar_norm_none_drug'],
					'norm_drug' => $graphBar['graph_bar_norm_drug'],
				);
			}

			return $formattedData;
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			return $data;
		}
	}

	public function getYearForSelectOption()
	{
		try {
			$this->db->select('DISTINCT YEAR(submit_date) as year');
			$this->db->from('submit_answer_average');
			$query = $this->db->get();
			$Years = $query->result_array();

			return $Years;
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			return $data;
		}
	}

	public function syncYearData($yearSubmit)
	{
		try {
			$this->db->select('id, year');
			$this->db->from('sync_year');
			$this->db->where('year', $yearSubmit);
			$query = $this->db->get();
			$yearQuery = $query->result_array();

			//* CHECK ALREADY HAVE YEAR
			$currentDate = date('Y-m-d');
			$year_id = $this->uuid();
			if (count($yearQuery) == 0) {
				$insertYearData = array(
					'id' => $year_id,
					'year' => $yearSubmit,
					'last_update' => $currentDate
				);
				$this->db->insert('sync_year', $insertYearData);
			} else {
				$year_id = $yearQuery[0]['id'];
				$syncBarAverageData = array(
					'last_update' => $currentDate
				);
				$this->db->where('id', $year_id);
				$this->db->update('sync_year', $syncBarAverageData);
			}

			//* QUERY DATA TO ADD TEMP_SCORE
			$this->db->select('id, average_score, graph_bar_id');
			$this->db->from('submit_answer_average');
			$this->db->where('YEAR(submit_date)', $yearSubmit);
			$query = $this->db->get();
			$submit_answer_average = $query->result_array();

			//! CHECK IF HAVE DATA FOR SYNC
			if (!count($submit_answer_average) == 0) {

				//* QUERY GRAPH BAR DATA
				$this->db->select('id, graph_id');
				$this->db->from('graph_bar');
				$query = $this->db->get();
				$graph_bar = $query->result_array();

				//* DELETE OLD SYNC_BAR_AVERAGE
				$this->db->where('sync_year_id', $year_id);
				$this->db->delete('sync_bar_average');

				//* INSERT NEW SYNC_BAR_AVERAGE
				foreach ($graph_bar as $bar) {
					$submit_id = $this->uuid();
					$data = array(
						'id' => $submit_id,
						'average_score' => 0,
						'sync_year_id' => $year_id,
						'graph_bar_id' => $bar['id']
					);
					$this->db->insert('sync_bar_average', $data);
				}

				//* MAP GRAPH BAR TO GET ONLY GRAPH_BAR_ID
				$barList = array_map(function ($bar) {
					return $bar['id'];
				}, $graph_bar);
				$tempScore = [];
				foreach ($submit_answer_average as $answer) {
					if (in_array($answer['graph_bar_id'], $barList)) {
						if (!isset($tempScore[$answer['graph_bar_id']])) {
							$tempScore[$answer['graph_bar_id']] = [];
						}
						$tempScore[$answer['graph_bar_id']][] = $answer['average_score'];
					}
				}

				//* AVERAGE TEMP_SCORE AND UPDATE SYNC_BAR_AVERAGE
				foreach ($tempScore as $id => $scores) {
					$average = number_format(array_sum($scores) / count($scores), 2);

					$syncBarAverageData = array(
						'average_score' => $average
					);
					$this->db->where('sync_year_id', $year_id);
					$this->db->where('graph_bar_id', $id);
					$this->db->update('sync_bar_average', $syncBarAverageData);
				}
				$message = "Sync data for " . $yearSubmit . " success!";
			} else {
				$message = "No data in " . $yearSubmit . " for sync!";
			}

			return $message;
			// $this->output->set_content_type('application/json')->set_output(json_encode($data));
			// $this->output->set_output($year_id);
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function previewImport($data)
	{
		try {
			$answers = $data;

			$this->db->select(
				'question.id AS question_id, 
                question.type AS question_type,
                choice.id AS choice_id,
                choice.score AS choice_score,
                graph_bar.id AS graph_bar_id,
                '
			);
			$this->db->from('question');
			$this->db->join('question_group', 'question.question_group_id = question_group.id', 'left');
			$this->db->join('question_sub_group', 'question.question_sub_group_id = question_sub_group.id', 'left');
			$this->db->join('question_img', 'question.question_img_id = question_img.id', 'left');
			$this->db->join('choice_group', 'question_group.choice_group_id = choice_group.id', 'left');
			$this->db->join('choice', 'choice_group.id = choice.choice_group_id', 'left');
			$this->db->join('section', 'question_group.section_id = section.id', 'left');
			$this->db->join('graph_bar_question', 'question.id = graph_bar_question.question_id', 'left');
			$this->db->join('graph_bar', 'graph_bar_question.graph_bar_id = graph_bar.id', 'left');
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->order_by('section.index', 'ASC');
			$this->db->order_by('question_group.index', 'ASC');
			$this->db->order_by('question_sub_group.index', 'ASC');
			$this->db->order_by('question.index', 'ASC');
			$this->db->order_by('choice.score', 'ASC');
			$query = $this->db->get();
			$resData = $query->result_array();

			$formattedData = array();
			foreach ($resData as $row) {
				$questionIndex = null;
				foreach ($formattedData as $index => $question) {
					if ($question['question_id'] === $row['question_id']) {
						$questionIndex = $index;
						break;
					}
				}
				if ($questionIndex === null) {
					$questionIndex = count($formattedData);
					$formattedData[] = array(
						'question_id' => $row['question_id'],
						'graph_bar_id' => $row['graph_bar_id'],
						'index' => (int)$questionIndex + 1,
						'choices' => array()
					);
				}

				$choice_score = (int)$row['choice_score'];
				if (!$row['question_type']) {
					$choice_score = (5 - $choice_score);
				}
				$formattedData[$questionIndex]['choices'][] = array(
					'choice_id' => $row['choice_id'],
					'choice_score' => $choice_score,
				);
			}

			$tempData = array();
			foreach ($answers as $answer) {
				$questionKey = (int)$answer['question'] - 1;
				$choiceKey = (int)$answer['choice'] - 1;

				$question_id = $formattedData[$questionKey]['question_id'];
				$graph_bar_id = $formattedData[$questionKey]['graph_bar_id'];
				$choice_id = $formattedData[$questionKey]['choices'][$choiceKey]['choice_id'];
				$score = $formattedData[$questionKey]['choices'][$choiceKey]['choice_score'];

				$tempData[] = array(
					'question_id' => $question_id,
					'choice_id' => $choice_id,
					'graph_bar_id' => $graph_bar_id,
					'score' => $score,
				);
			}

			return $tempData;
		} catch (Exception $e) {
			throw $e;
		}
	}
}
/*---------------------------- END Model Class --------------------------------*/
