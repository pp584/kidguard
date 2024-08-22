<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 *  Evaluation_model Class
 * @date 2023-07-23
 */
class Evaluation_model extends MY_Model
{
	public $session_name;

	public function __construct()
	{
		parent::__construct();
	}
	//! ดึงคำถามทั้งหมด
	public function getAllQuestion()
	{
		try {
			//! | START OF QUERY ALL QUESTION
			$this->db->select(
				'question.id AS question_id, 
                question.index AS question_index,
                question.name AS question_name,
                question.type AS question_type,

                question_img.name AS question_img,

                question_group.id AS question_group_id,
                question_group.index AS question_group_index,
                question_group.name AS question_group_name,
                
                question_group.section_id AS section_id,
                section.index AS section_index,
                section.name AS section_name,

                question_sub_group.id AS question_sub_group_id,
                question_sub_group.index AS question_sub_group_index,
                question_sub_group.name AS question_sub_group_name,

                choice.id AS choice_id,
                choice.name AS choice_name,
                choice.score AS choice_score,

                graph_bar.id AS graph_bar_id,
                graph.id AS graph_id

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

			//! | END OF QUERY ALL QUESTION

			//! | START OF FORMATTED DATA

			$formattedData = array();
			$displayIndex = 0;
			$oldQuestionGroupId = null;
			foreach ($resData as $row) {
				//* Group QuestionGroup to Section
				$sectionIndex = null;
				foreach ($formattedData as $index => $section) {
					if ($section['section_id'] === $row['section_id']) {
						$sectionIndex = $index;
						break;
					}
				}
				if ($sectionIndex === null) {
					$sectionIndex = count($formattedData);
					$formattedData[] = array(
						'section_id' => $row['section_id'],
						'section_name' => $row['section_name'],
						'section_index' => (int)$row['section_index'],
						'questions' => array()
					);
				}

				//* Group Choice to Question
				$questionIndex = null;
				foreach ($formattedData[$sectionIndex]['questions'] as $index => $questions) {
					if ($questions['question_id'] === $row['question_id']) {
						$questionIndex = $index;
						break;
					}
				}
				if ($questionIndex === null) {

					//* CUSTOM DISPLAY INDEX
					$newQuestionGroupId = $row['question_group_id'];
					if ($oldQuestionGroupId !== $newQuestionGroupId) {
						$displayIndex = 0;
						$oldQuestionGroupId = $newQuestionGroupId;
					}
					$displayIndex = $displayIndex + 1;

					$questionIndex = count($formattedData[$sectionIndex]['questions']);
					$formattedData[$sectionIndex]['questions'][] = array(
						'graph_id' => $row['graph_id'],
						'graph_bar_id' => $row['graph_bar_id'],
						'question_group_id' => $row['question_group_id'],
						'question_group_index' => (int)$row['question_group_index'],
						'question_group_name' => $row['question_group_name'],
						'question_sub_group_id' => $row['question_sub_group_id'],
						'question_sub_group_index' => (int)$row['question_sub_group_index'],
						'question_sub_group_name' => $row['question_sub_group_name'],
						'question_id' => $row['question_id'],
						'question_index' => (int)$row['question_index'],
						'question_display_index' => (int)$displayIndex,
						'question_name' => $row['question_name'],
						'question_img' => $row['question_img'],
						'choices' => array()
					);
				}

				//* Add Choice 
				//? 1 (true) = คำถามเชิงบวก , 0 (false) = คำถามเชิงลบ

				$choice_score = (int)$row['choice_score'];
				if (!$row['question_type']) {
					$choice_score = (5 - $choice_score);
				}
				$formattedData[$sectionIndex]['questions'][$questionIndex]['choices'][] = array(
					'choice_id' => $row['choice_id'],
					'choice_name' => $row['choice_name'],
					'choice_score' => $choice_score,
				);
			}
			//! | END OF FORMATTED DATA

			$data = $formattedData;
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}

	//! ส่งคำถามทั้งหมด (return id ของผู้ส่งคำตอบ)
	public function userSubmitQuestion($dataRequest)
	{

		//return "665d3082857008f0907afd92366f7ba732b5aa89d66ef";
		try {
			//* GET REQUEST DATA
			// $requestData = $this->input->post();
			$requestData = $dataRequest;
			$currentDate = date('Y-m-d H:i:s');

			//* QUERY GRAPH BAR DATA
			$this->db->select('id, graph_id');
			$this->db->from('graph_bar');
			$query = $this->db->get();
			$graph_bar = $query->result_array();

			//* INSERT USER
			$user_id = $this->uuid();
			$userData = $requestData['user_info'];

			$provinceName = $userData['province'];
			$ticketId = $this->getTicket($provinceName, $currentDate);

			$submitUserData = array(
				'id' => $user_id,
				'ticket' => $ticketId,
				'province' => $userData['province'],
				'district' => $userData['district'],
				'postal_code' => $userData['postal_code'],
				'gender' => $userData['gender'],
				'age' => $userData['age'],
				'education_status' => $userData['education_status'],
				'num_siblings' => $userData['num_siblings'],
				'family_status' => $userData['family_status'],
				'father_occupation' => $userData['father_occupation'],
				'mother_occupation' => $userData['mother_occupation'],
				'family_income' => $userData['family_income'],
				'consult_people' =>  implode(", ", $userData['consult_people']),
				'drug_history' => $userData['drug_history'],
				'type_of_drugs' => implode(", ", $userData['type_of_drugs']),
				'submit_date' => $currentDate,
			);

			$this->db->insert('submit_user', $submitUserData);

			//* INSERT SUBMIT_ANSWER_AVERAGE
			foreach ($graph_bar as $bar) {
				$submit_id = $this->uuid();
				$data = array(
					'id' => $submit_id,
					'user_id' => $user_id,
					'average_score' => 0,
					'graph_bar_id' => $bar['id'],
					'submit_date' => $currentDate
				);
				$this->db->insert('submit_answer_average', $data);
			}

			//* MAP GRAPH BAR TO GET ONLY GRAPH_BAR_ID
			$barList = array_map(function ($bar) {
				return $bar['id'];
			}, $graph_bar);

			//* INSERT SUBMIT_ANSWER AND ADD TEMP_SCORE
			$tempScore = [];
			foreach ($requestData['answers'] as $answer) {
				$answer_id = $this->uuid();
				$submitAnswerData = array(
					'id' => $answer_id,
					'score' => $answer['score'],
					'submit_user_id' => $user_id,
					'question_id' => $answer['question_id'],
					'choice_id' => $answer['choice_id']
				);
				$this->db->insert('submit_answer', $submitAnswerData);

				if (in_array($answer['graph_bar_id'], $barList)) {
					if (!isset($tempScore[$answer['graph_bar_id']])) {
						$tempScore[$answer['graph_bar_id']] = [];
					}
					$tempScore[$answer['graph_bar_id']][] = $answer['score'];
				}
			}

			//* AVERAGE TEMP_SCORE AND UPDATE SUBMIT_ANSWER_AVERAGE
			foreach ($tempScore as $id => $scores) {
				$average = number_format(array_sum($scores) / count($scores), 2);

				$submitAnswerAverageData = array(
					'average_score' => $average
				);
				$this->db->where('user_id', $user_id);
				$this->db->where('graph_bar_id', $id);
				$this->db->update('submit_answer_average', $submitAnswerAverageData);
			}

			$data = $user_id;
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}

	//! ดึงกราฟของผู้ใช้ (ส่ง id ของผู้ส่งคำตอบ)
	public function getAllSummaryGraph($user_id)
	{
		try {
			//* QUERY ANWSER DATA
			$this->db->select('
            submit_answer_average.id AS submit_answer_average_id,
            submit_answer_average.average_score AS submit_answer_average_score,
            graph_bar.id AS graph_bar_id,
            graph_bar.name AS graph_bar_name,
            graph_bar.norm_none_drug AS graph_bar_norm_none_drug,
            graph_bar.norm_drug AS graph_bar_norm_drug,
            graph.id AS graph_id,
            graph.name AS graph_name,
            graph.show_compare_norm AS graph_show_compare_norm
            ');
			$this->db->from('submit_answer_average');
			$this->db->where('submit_answer_average.user_id', $user_id);
			$this->db->join('graph_bar', 'submit_answer_average.graph_bar_id = graph_bar.id', 'left');
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');

			$query = $this->db->get();
			$graph_bars = $query->result_array();

			//* FORMATTED ANWSER DATA
			$formattedData = array();
			foreach ($graph_bars as $graph_bar) {
				$graphIndex = null;
				foreach ($formattedData as $index => $graph) {
					if ($graph['graph_id'] === $graph_bar['graph_id']) {
						$graphIndex = $index;
						break;
					}
				}
				if ($graphIndex === null) {
					$graphIndex = count($formattedData);
					$formattedData[] = array(
						'graph_id' => $graph_bar['graph_id'],
						'graph_name' => $graph_bar['graph_name'],
						'graph_show_compare_norm' => $graph_bar['graph_show_compare_norm'],
						'bars' => array(),
					);
				}
				$graph_bar_percent = number_format(($graph_bar['submit_answer_average_score'] * 100) / 4, 2);
				$barIndex = count($formattedData[$graphIndex]['bars']);
				$formattedData[$graphIndex]['bars'][] = array(
					'bar_name' => $graph_bar['graph_bar_name'],
					'bar_value' => number_format($graph_bar['submit_answer_average_score'], 2),
					'bar_percent' => $graph_bar_percent,
					'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
					'norm_drug' => $graph_bar['graph_bar_norm_drug'],
				);

				if ($formattedData[$graphIndex]['graph_show_compare_norm'] == true) {
					$formattedData[$graphIndex]['bars'][$barIndex]['bar_name'] = "ของตน";
					$formattedData[$graphIndex]['bars'][] = array(
						'bar_name' => "กลุ่มเคยลอง",
						'bar_value' => number_format($graph_bar['graph_bar_norm_drug'], 2),
						'bar_percent' => $graph_bar_percent,
						'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
						'norm_drug' => $graph_bar['graph_bar_norm_drug'],
					);
					$formattedData[$graphIndex]['bars'][] = array(
						'bar_name' => "กลุ่มไม่เคยลอง",
						'bar_value' => number_format($graph_bar['graph_bar_norm_none_drug'], 2),
						'bar_percent' => $graph_bar_percent,
						'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
						'norm_drug' => $graph_bar['graph_bar_norm_drug'],
					);
				}
			}

			//* Calculate graph_power for each graph
			foreach ($formattedData as &$graph) {
				$total_percent = 0;
				$bar_count = count($graph['bars']);
				foreach ($graph['bars'] as $bar) {
					$total_percent += $bar['bar_percent'];
				}
				$graph['graph_power'] = number_format($total_percent / $bar_count, 2);
			}

			return $formattedData;
		} catch (Exception $e) {
			throw $e;
		}
	}

	//! ดึงกราฟของผู้ใช้ (ส่งปีที่ต้องการ sync ค.ศ.) เช่น syncYearData( 2024 );
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

			$data = $message;
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}

	//! ดึงค่าเฉลี่ยของกราฟปีย้อนหลัง (จำนวนปี) เช่น ดึงค่าเฉลี่ยกราฟปีย้อนหลัง 5 ปี getYearSummaryGraph(5)
	//? DEFAULT : 3 ปี | ไม่ต้องส่ง Parameter ก็ได้
	public function getYearSummaryGraph($yearCount = 3)
	{
		try {
			//* QUERY LAST 3 YEAR DATA
			$current_year = date('Y');
			$this->db->select('id, year');
			$this->db->from('sync_year');
			$this->db->where('year <=', $current_year);
			$this->db->order_by('sync_year.year', 'DESC');
			$this->db->limit($yearCount);

			$query = $this->db->get();
			$queryYears = $query->result_array();

			$lastThreeYear = array_column($queryYears, 'id');

			//* QUERY SYNC DATA
			$this->db->select('
            graph_bar.id AS graph_bar_id,
            graph_bar.name AS graph_bar_name,
            AVG(sync_bar_average.average_score) AS average_score,
            graph_bar.norm_none_drug AS graph_bar_norm_none_drug,
            graph_bar.norm_drug AS graph_bar_norm_drug,
            graph.id AS graph_id,
            graph.name AS graph_name,
            graph.show_compare_norm AS graph_show_compare_norm
        ');
			$this->db->from('sync_bar_average');
			$this->db->join('graph_bar', 'sync_bar_average.graph_bar_id = graph_bar.id', 'left');
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->join('sync_year', 'sync_bar_average.sync_year_id = sync_year.id', 'left');
			$this->db->where_in('sync_year.id', $lastThreeYear);
			$this->db->group_by('graph_bar.id');
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');

			$query = $this->db->get();
			$graph_bars = $query->result_array();

			//* FORMATTED GRAPH DATA
			$formattedData = array();
			foreach ($graph_bars as $graph_bar) {
				$graphIndex = null;
				foreach ($formattedData as $index => $graph) {
					if ($graph['graph_id'] === $graph_bar['graph_id']) {
						$graphIndex = $index;
						break;
					}
				}
				if ($graphIndex === null) {
					$graphIndex = count($formattedData);
					$formattedData[] = array(
						'graph_id' => $graph_bar['graph_id'],
						'graph_name' => $graph_bar['graph_name'],
						'graph_show_compare_norm' => $graph_bar['graph_show_compare_norm'],
						'bars' => array(),
					);
				}

				$graph_bar_percent = number_format(($graph_bar['average_score'] * 100) / 4, 2);
				$barIndex = count($formattedData[$graphIndex]['bars']);
				$formattedData[$graphIndex]['bars'][] = array(
					'bar_name' => $graph_bar['graph_bar_name'],
					'bar_value' => number_format($graph_bar['average_score'], 2),
					'bar_percent' => $graph_bar_percent,
					'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
					'norm_drug' => $graph_bar['graph_bar_norm_drug'],
				);

				if ($formattedData[$graphIndex]['graph_show_compare_norm'] == true) {
					$formattedData[$graphIndex]['bars'][$barIndex]['bar_name'] = "ของตน";
					$formattedData[$graphIndex]['bars'][] = array(
						'bar_name' => "กลุ่มเคยลอง",
						'bar_value' => number_format($graph_bar['graph_bar_norm_drug'], 2),
						'bar_percent' => $graph_bar_percent,
						'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
						'norm_drug' => $graph_bar['graph_bar_norm_drug'],
					);
					$formattedData[$graphIndex]['bars'][] = array(
						'bar_name' => "กลุ่มไม่เคยลอง",
						'bar_value' => number_format($graph_bar['graph_bar_norm_none_drug'], 2),
						'bar_percent' => $graph_bar_percent,
						'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
						'norm_drug' => $graph_bar['graph_bar_norm_drug'],
					);
				}
			}

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! ดึงกราฟปี 3 ปีย้อนหลัง (ข้อมูลออกเป็น 3 ชุด)
	public function getLastThreeYearGraph()
	{
		try {
			//* QUERY LAST 3 YEAR DATA
			$current_year = date('Y');
			$this->db->select('id, year');
			$this->db->from('sync_year');
			$this->db->where('year <=', $current_year);
			$this->db->order_by('sync_year.year', 'DESC');
			$this->db->limit(3);

			$query = $this->db->get();
			$queryYears = $query->result_array();

			$lastThreeYear = array_column($queryYears, 'id');

			//* QUERY SYNC DATA
			$this->db->select('
                sync_bar_average.id AS sync_bar_average_id,
                sync_bar_average.average_score AS sync_bar_average_score,
                sync_year.id AS sync_year_id,
                sync_year.year AS sync_year_year,
                graph_bar.id AS graph_bar_id,
                graph_bar.name AS graph_bar_name,
                graph_bar.norm_none_drug AS graph_bar_norm_none_drug,
                graph_bar.norm_drug AS graph_bar_norm_drug,
                graph.id AS graph_id,
                graph.name AS graph_name
            ');
			$this->db->from('sync_bar_average');
			$this->db->join('graph_bar', 'sync_bar_average.graph_bar_id = graph_bar.id', 'left');
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->join('sync_year', 'sync_bar_average.sync_year_id = sync_year.id', 'left');
			$this->db->where_in('sync_year.id', $lastThreeYear);
			$this->db->order_by('sync_year.year', 'DESC');
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');

			$query = $this->db->get();
			$graph_bars = $query->result_array();

			//* FORMATTED ANWSER DATA
			$formattedData = array();
			foreach ($graph_bars as $graph_bar) {
				$yearIndex = null;
				foreach ($formattedData as $index => $year) {
					if ($year['sync_id'] === $graph_bar['sync_year_id']) {
						$yearIndex = $index;
						break;
					}
				}
				if ($yearIndex === null) {
					$yearIndex = count($formattedData);
					$formattedData[] = array(
						'sync_id' => $graph_bar['sync_year_id'],
						'sync_year' => $graph_bar['sync_year_year'],
						'graphs' => array(),
					);
				}

				$graphIndex = null;
				foreach ($formattedData[$yearIndex]['graphs'] as $index => $graph) {
					if ($graph['graph_id'] === $graph_bar['graph_id']) {
						$graphIndex = $index;
						break;
					}
				}
				if ($graphIndex === null) {
					$graphIndex = count($formattedData[$yearIndex]['graphs']);
					$formattedData[$yearIndex]['graphs'][] = array(
						'graph_id' => $graph_bar['graph_id'],
						'graph_name' => $graph_bar['graph_name'],
						'bars' => array(),
					);
				}

				$graph_bar_percent = number_format(($graph_bar['sync_bar_average_score'] * 100) / 4, 2);
				$formattedData[$yearIndex]['graphs'][$graphIndex]['bars'][] = array(
					'bar_name' => $graph_bar['graph_bar_name'],
					'bar_value' => number_format($graph_bar['sync_bar_average_score'], 2),
					'bar_percent' => $graph_bar_percent,
					'norm_none_drug' => $graph_bar['graph_bar_norm_none_drug'],
					'norm_drug' => $graph_bar['graph_bar_norm_drug'],
				);
			}

			$data = $formattedData;
			return $data;
		} catch (Exception $e) {
			throw $e;
		}
	}

	//! GENERATE UUID
	public function uuid()
	{
		$uuid = uniqid() . md5(uniqid('', true));
		return $uuid;
	}
	public function getTicket($provinceName, $currentDate)
	{
		try {
			$this->db->select('code, section');
			$this->db->from('province');
			$this->db->where('name', $provinceName);
			$query = $this->db->get();
			$provinceData = $query->row_array();

			
			$currentDate = date('Y-m-d', strtotime($currentDate));

			$gregorianYear = date('Y', strtotime($currentDate));
			$thaiYear = $gregorianYear + 543;
			$shortThaiYear = substr($thaiYear, -2);

			$month = date('m', strtotime($currentDate));
			$day = date('d', strtotime($currentDate));

			$this->db->select('id, no');
			$this->db->from('ticket');
			$this->db->where('DATE(date) =', $currentDate);
			$this->db->order_by('id', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get();
			$lastTicket = $query->row_array();

			$ticketNo = isset($lastTicket['no']) ? $lastTicket['no'] + 1 : 1;

			$provinceCode = str_pad($provinceData['code'], 2, '0', STR_PAD_LEFT);
			$provinceSection = str_pad($provinceData['section'], 2, '0', STR_PAD_LEFT);
			$ticketData = $provinceCode . $provinceSection . $shortThaiYear . $month . $day . str_pad($ticketNo, 5, '0', STR_PAD_LEFT);

			if (isset($lastTicket) && !empty($lastTicket)) {
				$updateTicketData = array(
					'no' => $ticketNo,
					'date' => $currentDate,
				);
				$this->db->where('id', $lastTicket['id']);
				$this->db->update('ticket', $updateTicketData);
			} else {
				$ticketId = $this->uuid();
				$insertTicketData = array(
					'id' => $ticketId,
					'date' => $currentDate,
					'no' => $ticketNo,
				);
				$this->db->insert('ticket', $insertTicketData);
			}

			return $ticketData;
		} catch (Exception $e) {
			throw new Exception('ไม่สามารถสร้าง Ticket ได้: ' . $e->getMessage());
		}
	}
}
