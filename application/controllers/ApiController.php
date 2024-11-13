<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class ApiController extends CI_Controller
{
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

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! ส่งคำตอบทั้งหมด
	public function userSubmitQuestion()
	{
		try {
			//* GET REQUEST DATA
			$requestData = $this->input->post();

			$currentDate = isset($requestData['submit_date']) && !empty($requestData['submit_date']) ? $requestData['submit_date'] : date('Y-m-d H:i:s');
			$currentDate = (new DateTime($currentDate))->format('Y-m-d H:i:s');

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
				'consult_people' => $userData['consult_people'],
				'drug_history' => $userData['drug_history'],
				'type_of_drugs' => $userData['type_of_drugs'],
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

			$data = array('status' => "true", 'message' => null, 'data' => $user_id);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! คำนวนกราฟสำหรับแต่ละ Section (ไว้สำหรับคำนวนกราฟในแอปตอนทำแต่ละตอนเสร็จ)
	public function getSummarySectionGraph()
	{
		try {
			//* GET REQUEST DATA
			$requestData = $this->input->post();

			// Initialize data structures
			$formattedData = [];
			$graphIndexMap = [];
			$barIndexMap = [];

			// First loop to organize data into a structured format
			foreach ($requestData['answers'] as $question) {
				if (!isset($graphIndexMap[$question['graph_id']])) {
					$graphIndex = count($formattedData);
					$formattedData[] = array(
						'graph_id' => $question['graph_id'],
						'bars' => array(),
					);
					$graphIndexMap[$question['graph_id']] = $graphIndex;
				} else {
					$graphIndex = $graphIndexMap[$question['graph_id']];
				}

				if (!isset($barIndexMap[$question['graph_id']][$question['graph_bar_id']])) {
					$barIndex = count($formattedData[$graphIndex]['bars']);
					$formattedData[$graphIndex]['bars'][] = array(
						'graph_bar_id' => $question['graph_bar_id'],
						'answers' => array(),
					);
					$barIndexMap[$question['graph_id']][$question['graph_bar_id']] = $barIndex;
				} else {
					$barIndex = $barIndexMap[$question['graph_id']][$question['graph_bar_id']];
				}

				$formattedData[$graphIndex]['bars'][$barIndex]['answers'][] = array(
					'question_id' => $question['question_id'],
					'choice_id' => $question['choice_id'],
					'score' => $question['score'],
				);
			}

			// Get all graph details in a single query
			$graphIds = array_keys($graphIndexMap);
			$this->db->select('
                graph_bar.id AS graph_bar_id,
                graph_bar.name AS graph_bar_name,
                graph_bar.norm_none_drug AS graph_bar_norm_none_drug,
                graph_bar.norm_drug AS graph_bar_norm_drug,
                graph.id AS graph_id,
                graph.name AS graph_name,
                graph.show_compare_norm AS graph_show_compare_norm
            ');
			$this->db->from('graph_bar');
			$this->db->where_in('graph.id', $graphIds);
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');
			$query = $this->db->get();
			$graph_bars = $query->result_array();

			// Create a mapping of graph_bar details
			$graphBarDetails = [];
			foreach ($graph_bars as $bar) {
				$graphBarDetails[$bar['graph_id']][] = $bar;
			}

			// Calculate average score for each bar and finalize the response data
			foreach ($formattedData as &$graph) {
				$graphDetails = $graphBarDetails[$graph['graph_id']];
				$total_percent = 0;

				$adviceTitle = null;
				$adviceShowTitle = 0;
				$adviceList = [];
				$foundFirstScaleCondition = false;
				$adviceFromStatus = false;

				foreach ($graph['bars'] as $index => &$bar) {
					$total_score = 0;
					$answer_count = count($bar['answers']);
					foreach ($bar['answers'] as $answer) {
						$total_score += $answer['score'];
					}

					$bar['bar_name'] = $graphDetails[$index]['graph_bar_name'];
					$bar['bar_value'] = number_format($total_score / $answer_count, 2);
					$bar['bar_percent'] = number_format(($bar['bar_value'] / 4) * 100, 2);
					$bar['norm_none_drug'] = $graphDetails[$index]['graph_bar_norm_none_drug'];
					$bar['norm_drug'] = $graphDetails[$index]['graph_bar_norm_drug'];
					unset($bar['answers']);
					$total_percent += $bar['bar_percent'];


					// GET ADVICE
					$this->db->select('
						advice.id AS advice_id,
						advice.title AS advice_title,
						advice.is_show_title AS is_show_title,
						advice.condition_type AS condition_type,
						advice_condition.id AS condition_id,
						advice_condition.name AS condition_name,
						advice_condition.condition_check AS condition_check,
						advice_condition.condition_check_from AS condition_check_from,
						advice_condition.index AS condition_index,
						advice_condition.condition_value AS condition_value
					');
					$this->db->from('advice');
					$this->db->where('graph_bar_id', $bar['graph_bar_id']);
					$this->db->join('advice_condition', 'advice.id = advice_condition.advice_id', 'left');
					$this->db->order_by('advice.index', 'ASC');
					$this->db->order_by('advice_condition.index', 'ASC');

					$query = $this->db->get();

					foreach ($query->result_array() as $row) {
						$conditionStatus = false;

						if ($row['condition_check_from'] == 'norm_drug' || $row['condition_check_from'] == 'norm_non_drug') {
							$conditionStatus = $bar['bar_value'] >= $bar[$row['condition_check_from']];
						} elseif ($row['condition_check_from'] == 'value') {
							$conditionStatus = $bar['bar_value'] >= $row['condition_value'];
						}
						if ($row['condition_check'] == 'less_than') {
							$conditionStatus = !$conditionStatus;
						}

						if ($row['condition_type'] == 'scale') {
							$adviceFromStatus = true;
							if (!$foundFirstScaleCondition) {
								$foundFirstScaleCondition = $conditionStatus;
							} else {
								$conditionStatus = false;
							}
						}

						if ($row['condition_id'] !== null) {
							$adviceList[] = [
								'id' => $row['condition_id'],
								'condition_name' => $row['condition_name'],
								'index' => $row['condition_index'],
								'status' => $conditionStatus
							];
						}
						$adviceTitle = $row['advice_title'];
						$adviceShowTitle = $row['is_show_title'];
					}
				}
				$graph['advice_title'] = $adviceTitle;
				$graph['advice_show_title'] = $adviceShowTitle ? true : false;
				$graph['advice_send_type'] = $adviceFromStatus ? 'send_true' : 'send_false';
				$graph['advice_list'] = $adviceList;

				$graph['graph_name'] = $graphDetails[0]['graph_name'];
				$graph['graph_show_compare_norm'] = $graphDetails[0]['graph_show_compare_norm'];
				$bar_count = count($graph['bars']);
				$graph['graph_power'] = number_format($total_percent / $bar_count, 2);
				$graph['total_percent'] = number_format($total_percent, 2);
				$graph['bar_count'] = $bar_count;

				if ($graph['graph_show_compare_norm']) {
					$graph['bars'][0]['bar_name'] = "ของตน";
					$graph['bars'][] = array(
						'bar_name' => "กลุ่มเคยลอง",
						'bar_value' => number_format($graph['bars'][0]['norm_drug'], 2),
						'bar_percent' => $graph['bars'][0]['bar_percent'],
						'norm_none_drug' => $graph['bars'][0]['norm_none_drug'],
						'norm_drug' => $graph['bars'][0]['norm_drug'],
					);
					$graph['bars'][] = array(
						'bar_name' => "กลุ่มไม่เคยลอง",
						'bar_value' => number_format($graph['bars'][0]['norm_none_drug'], 2),
						'bar_percent' => $graph['bars'][0]['bar_percent'],
						'norm_none_drug' => $graph['bars'][0]['norm_none_drug'],
						'norm_drug' => $graph['bars'][0]['norm_drug'],
					);
				}
			}

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! คำนวนกราฟทั้งหมด ของผู้ใช้ ตาม user_id ที่ส่งมา
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
					'bar_id' => $graph_bar['graph_bar_id'],
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

				$adviceTitle = null;
				$adviceShowTitle = 0;
				$foundFirstScaleCondition = false;
				$adviceFromStatus = false;
				$adviceList = [];

				foreach ($graph['bars'] as &$bar) {
					$total_percent += $bar['bar_percent'];

					// GET ADVICE
					$this->db->select('
						advice.id AS advice_id,
						advice.title AS advice_title,
						advice.is_show_title AS is_show_title,
						advice.condition_type AS condition_type,
						advice_condition.id AS condition_id,
						advice_condition.name AS condition_name,
						advice_condition.condition_check AS condition_check,
						advice_condition.condition_check_from AS condition_check_from,
						advice_condition.index AS condition_index,
						advice_condition.condition_value AS condition_value
					');
					$this->db->from('advice');
					$this->db->where('graph_bar_id', $bar['bar_id']);
					$this->db->join('advice_condition', 'advice.id = advice_condition.advice_id', 'left');
					$this->db->order_by('advice.index', 'ASC');
					$this->db->order_by('advice_condition.index', 'ASC');

					$query = $this->db->get();

					foreach ($query->result_array() as $row) {
						$conditionStatus = false;

						if ($row['condition_check_from'] == 'norm_drug' || $row['condition_check_from'] == 'norm_non_drug') {
							$conditionStatus = $bar['bar_value'] >= $bar[$row['condition_check_from']];
						} elseif ($row['condition_check_from'] == 'value') {
							$conditionStatus = $bar['bar_value'] >= $row['condition_value'];
						}
						if ($row['condition_check'] == 'less_than') {
							$conditionStatus = !$conditionStatus;
						}

						if ($row['condition_type'] == 'scale') {
							$adviceFromStatus = true;
							if (!$foundFirstScaleCondition) {
								$foundFirstScaleCondition = $conditionStatus;
							} else {
								$conditionStatus = false;
							}
						}

						if ($row['condition_id'] !== null) {
							$adviceList[] = [
								'id' => $row['condition_id'],
								'condition_name' => $row['condition_name'],
								'index' => $row['condition_index'],
								'status' => $conditionStatus
							];
						}
					}
					$adviceTitle = $row['advice_title'];
					$adviceShowTitle = $row['is_show_title'];
				}
				$graph['advice_title'] = $adviceTitle;
				$graph['advice_show_title'] = $adviceShowTitle ? true : false;
				$graph['advice_send_type'] = $adviceFromStatus ? 'send_true' : 'send_false';
				$graph['advice_list'] = $adviceList;
				$graph['graph_power'] = number_format($total_percent / $bar_count, 2);
			}

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! ซิงค์ข้อมูลประจำปี ตามปีที่ส่งมา
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
			$this->db->select('
				submit_answer_average.id, 
				submit_answer_average.average_score, 
				submit_answer_average.graph_bar_id,
				province.code,
				province.section,
				');
			$this->db->join('submit_user', 'submit_user.id = submit_answer_average.user_id', 'left');
			$this->db->join('province', 'province.name = submit_user.province', 'left');
			$this->db->from('submit_answer_average');
			$this->db->where('YEAR(submit_answer_average.submit_date)', $yearSubmit);
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

				//* QUERY PROVINCE_SECTION
				$this->db->distinct();
				$this->db->select('section');
				$this->db->from('province');
				$query = $this->db->get();
				$province_section = $query->result_array();

				//* INSERT NEW SYNC_BAR_AVERAGE WITH PROVINCE_SECTION
				foreach ($province_section as $section) {
					foreach ($graph_bar as $bar) {
						$submit_id = $this->uuid();
						$data = array(
							'id' => $submit_id,
							'average_score' => 0,
							'sync_year_id' => $year_id,
							'graph_bar_id' => $bar['id'],
							'province_section' => $section['section']
						);
						$this->db->insert('sync_bar_average', $data);
					}
				}

				//* MAP GRAPH BAR TO GET ONLY GRAPH_BAR_ID
				$barList = array_map(function ($bar) {
					return $bar['id'];
				}, $graph_bar);
				$tempScore = [];
				foreach ($submit_answer_average as $index => $answer) {
					if (in_array($answer['graph_bar_id'], $barList)) {
						$tempScore[$index] = array(
							'graph_bar_id' => $answer['graph_bar_id'],
							'section' => $answer['section'],
							'scores' => $answer['average_score']
						);
					}
				}

				//* AVERAGE TEMP_SCORE AND UPDATE SYNC_BAR_AVERAGE
				$groupedData = [];
				foreach ($tempScore as $item) {
					$graphBarId = $item['graph_bar_id'];
					$section = $item['section'];
					$score = (int)$item['scores'];

					$key = $graphBarId . '-' . $section;

					if (!isset($groupedData[$key])) {
						$groupedData[$key] = ['graph_bar_id' => $graphBarId, 'section' => $section, 'total' => 0, 'count' => 0];
					}

					$groupedData[$key]['total'] += $score;
					$groupedData[$key]['count']++;
					$groupedData[$key]['average_score'] =  $groupedData[$key]['total'] / $groupedData[$key]['count'];
				}

				foreach ($groupedData as $group) {
					$graphBarId = $group['graph_bar_id'];
					$section = $group['section'];
					$averageScore = $group['average_score'];

					$syncBarAverageData = array(
						'average_score' => $averageScore
					);

					$this->db->where('sync_year_id', $year_id);
					$this->db->where('graph_bar_id', $graphBarId);
					$this->db->where('province_section', $section);
					$this->db->update('sync_bar_average', $syncBarAverageData);
				}

				$message = "ปรับปรุงข้อมูลกราฟปี " . $yearSubmit . " สำเร็จ";
			} else {
				$message = "ไม่มีข้อมูลสำหรับปรับปรุงในปี " . $yearSubmit;
			}

			$data = array('status' => true, 'message' => $message, 'data' => null);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => false, 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! คำนวนกราฟทั้งหมด (ตามจำนวน...ปีล่าสุด) (default คือ 3 ปีล่าสุด) (*นำจำนวน...ปีล่าสุดมาหาค่าเฉลี่ยกัน)
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
            AVG(CASE WHEN sync_bar_average.average_score <> 0 THEN sync_bar_average.average_score END) AS average_score,
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

	//! คำนวนกราฟทั้งหมด แบ่งตามเขต (เลือกปีที่ต้องการ) (default คือ ปีปัจจุบัน)
	public function getYearSummarySectionGraph($current_year = null)
	{
		try {
			if (!isset($current_year) || empty($current_year)) {
				$current_year = date('Y');
			}
			$this->db->select('id, year');
			$this->db->from('sync_year');
			$this->db->where('year =', $current_year);
			$this->db->limit(1);
			$query = $this->db->get();
			$queryYears = $query->result_array();

			$current_year_id = $queryYears[0]['id'];

			$this->db->select('
			sync_bar_average.province_section AS section,
			sync_bar_average.average_score AS average_score,
            graph_bar.id AS graph_bar_id,
            graph_bar.name AS graph_bar_name,
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
			$this->db->where('sync_year.id', $current_year_id);
			$this->db->order_by('graph.index', 'ASC');
			$this->db->order_by('graph_bar.index', 'ASC');
			$this->db->order_by('sync_bar_average.province_section', 'ASC');

			$query = $this->db->get();
			$graph_bars = $query->result_array();

			$formattedData = array();
			foreach ($graph_bars as $row) {
				$graphIndex = null;
				foreach ($formattedData as $index => $graph) {
					if ($graph['graph_id'] === $row['graph_id']) {
						$graphIndex = $index;
						break;
					}
				}
				if ($graphIndex === null) {
					$graphIndex = count($formattedData);
					$formattedData[] = array(
						'graph_id' => $row['graph_id'],
						'graph_name' => $row['graph_name'],
						'bars' => array(),
					);
				}
				$graphBarIndex = null;
				foreach ($formattedData[$graphIndex]['bars'] as $index => $bar) {
					if ($bar['graph_bar_id'] === $row['graph_bar_id']) {
						$graphBarIndex = $index;
						break;
					}
				}
				if ($graphBarIndex === null) {
					$graphBarIndex = count($formattedData[$graphIndex]['bars']);
					$formattedData[$graphIndex]['bars'][] = array(
						'graph_bar_id' => $row['graph_bar_id'],
						'graph_bar_name' => $row['graph_bar_name'],
						'norm_none_drug' => $row['graph_bar_norm_none_drug'],
						'norm_drug' => $row['graph_bar_norm_drug'],
						'values' => array(),
					);
				}
				$sectionName = $row['section'] == 0 ? "กทม" : "ภาค " . $row['section'];
				$formattedData[$graphIndex]['bars'][$graphBarIndex]['values'][] = array(
					'section' => $row['section'],
					'section_name' => $sectionName,
					'average_score' => number_format($row['average_score'], 2),
				);
			}
			$message = !isset($formattedData) || empty($formattedData) ? 'ไม่พบข้อมูลสำหรับแสดงผลปี ' . $current_year : null;
			$data = array('status' => "true", 'message' => $message, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! สำหรับเพิ่มข้อมูลปีเก่า (ข้อมูลระบบเก่า)
	public function insertOldData()
	{
		try {
			$years = ['2019', '2021', '2023'];
			$yearData = [
				[
					'average_score' => 2.47,
					'graph_bar_id' => 'f927ab3a-5e2b-4ec3-8f15-3bb24dbbe6d7',
					'graph_bar_name' => 'การบริหารจัดการตน',
				],
				[
					'average_score' => 2.81,
					'graph_bar_id' => '1c6cc482-7d3f-4f45-9a69-88fa8d1d7790',
					'graph_bar_name' => 'ทุนทางจิตวิทยา',
				],
				[
					'average_score' => 2.89,
					'graph_bar_id' => 'cc42c9b8-fb2f-4e92-bf7c-d0306486636f',
					'graph_bar_name' => 'การเห็นคุณค่าในตนเอง',
				],
				[
					'average_score' => 2.66,
					'graph_bar_id' => '0c2e22a3-0ae8-4964-a2bc-ec0675e0f96a',
					'graph_bar_name' => 'พลังตัวตน',
				],
				[
					'average_score' => 2.67,
					'graph_bar_id' => 'c57d3b7d-fc30-48ba-b63a-195c36c6e928',
					'graph_bar_name' => 'พลังครอบครัว',
				],
				[
					'average_score' => 2.41,
					'graph_bar_id' => 'dd450b5e-3914-4742-8b61-68181ebd1121',
					'graph_bar_name' => 'พลังสร้างปัญญา',
				],
				[
					'average_score' => 2.06,
					'graph_bar_id' => 'fb206c14-276d-4b9d-8057-18b38b11f2bb',
					'graph_bar_name' => 'พลังเพื่อนและกิจกรรม',
				],
				[
					'average_score' => 2.63,
					'graph_bar_id' => 'cc42c9b8-fb2f-4e92-bf7c-d0306486636a',
					'graph_bar_name' => 'พลังชุมชน',
				],
				[
					'average_score' => 1.80,
					'graph_bar_id' => '3a32613d-0a56-4970-a748-6c9ec88b74d4',
					'graph_bar_name' => 'การคล้อยตาม',
				],
				[
					'average_score' => 0.83,
					'graph_bar_id' => '4294cb8f-2a7b-4f97-b29f-3622ea96e649',
					'graph_bar_name' => 'ความรุนแรง',
				],
				[
					'average_score' => 1.41,
					'graph_bar_id' => '49517c94-6538-4fd7-91ae-3b6c14d2f1c8',
					'graph_bar_name' => 'การเป็นแบบอย่าง',
				],
				[
					'average_score' => 1.26,
					'graph_bar_id' => 'b660a555-ff99-4be8-8f2a-b2a6b5ef81ae',
					'graph_bar_name' => 'การเปิดรับสื่อ',
				],
				[
					'average_score' => 1.28,
					'graph_bar_id' => 'c8b6bcd3-e37a-40b3-8b33-b9d8b8a1d90e',
					'graph_bar_name' => 'เจตคติทางบวก',
				],
				[
					'average_score' => 2.54,
					'graph_bar_id' => 'c2b0d4f4-786a-4c0e-8998-39e2b663e2d5',
					'graph_bar_name' => 'การรับรู้แหล่ง',
				],
			];
			foreach ($years as $year) {
				$currentDate = date('Y-m-d');
				$year_id = $this->uuid();
				$insertYearData = array(
					'id' => $year_id,
					'year' => $year,
					'last_update' => $currentDate,
				);
				$this->db->insert('sync_year', $insertYearData);

				foreach ($yearData as $data) {
					$data_id = $this->uuid();
					$insertAverageData = array(
						'id' => $data_id,
						'average_score' => $data['average_score'],
						'sync_year_id' => $year_id,
						'graph_bar_id' => $data['graph_bar_id'],
					);
					$this->db->insert('sync_bar_average', $insertAverageData);
				}
			}

			$data = array('status' => "true", 'message' => null, 'data' => "Insert success!");
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! คำนวนกราฟ 3 ปีล่าสุด (แยกข้อมูลป็นของแต่ละปี)
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
            	AVG(CASE WHEN sync_bar_average.average_score <> 0 THEN sync_bar_average.average_score END) AS sync_bar_average_score,
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
			$this->db->group_by('sync_year.id');
			$this->db->group_by('graph_bar.id');
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

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! ดึงข้อมูลผู้ตอบคำถามทั้งหมด (ข้อมูลส่วนตัว + ค่าเฉลี่ยของแต่ละกราฟ)
	public function getScoreAverage()
	{
		try {
			//* GET REQUEST DATA
			$requestData = $this->input->post();
			$orderBy =  (isset($requestData['order_by']) && !empty($requestData['order_by'])) ? $requestData['order_by'] : 'DESC';
			$page =  (isset($requestData['page']) && !empty($requestData['page'])) ? $requestData['page'] : 1;
			$pageSize =  (isset($requestData['page_size']) && !empty($requestData['page_size'])) ? $requestData['page_size'] : null;
			$offset = ($page - 1) * $pageSize;
			$startDate = (isset($requestData['start_date']) && !empty($requestData['start_date'])) ? $requestData['start_date'] : "2024-01-01";
			$endDate = (isset($requestData['end_date']) && !empty($requestData['end_date'])) ? $requestData['end_date'] : date('Y-m-d');

			$startDateTime = new DateTime($startDate . ' 00:00:00');
			$endDateTime = new DateTime($endDate . ' 23:59:59');
			$startDateFormatted = $startDateTime->format('Y-m-d H:i:s');
			$endDateFormatted = $endDateTime->format('Y-m-d H:i:s');

			$selectStatement = '';
			$fields = $this->db->list_fields('submit_user');
			foreach ($fields as $field) {
				$selectStatement .= 'submit_user.' . $field . ' AS submit_user_' . $field . ',';
			}
			$this->db->select($selectStatement);
			$this->db->from('submit_user');
			$this->db->where("submit_date BETWEEN '$startDateFormatted' AND '$endDateFormatted'");
			$this->db->order_by('submit_date', $orderBy);
			$this->db->limit($pageSize, $offset);
			$query = $this->db->get();
			$users = $query->result_array();

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
			$dataUsers = array();
			foreach ($formattedData as $data) {
				$userId = $data['user_id'];
				if (isset($usersFormat[$userId])) {
					$dataUsers[] = array_merge($usersFormat[$userId], $data);
				}
			}

			$data = array('status' => "true", 'message' => null, 'data' => $dataUsers);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! ดึงข้อมูลผู้ตอบคำถามทั้งหมด (ข้อมูลส่วนตัว + คำถามและคำตอบที่เลือก)
	public function getScore()
	{
		try {
			//* GET REQUEST DATA
			$requestData = $this->input->post();
			$orderBy =  (isset($requestData['order_by']) && !empty($requestData['order_by'])) ? $requestData['order_by'] : 'DESC';
			$page =  (isset($requestData['page']) && !empty($requestData['page'])) ? $requestData['page'] : 1;
			$pageSize =  (isset($requestData['page_size']) && !empty($requestData['page_size'])) ? $requestData['page_size'] : null;
			$offset = ($page - 1) * $pageSize;
			$startDate = (isset($requestData['start_date']) && !empty($requestData['start_date'])) ? $requestData['start_date'] : "2024-01-01";
			$endDate = (isset($requestData['end_date']) && !empty($requestData['end_date'])) ? $requestData['end_date'] : date('Y-m-d');

			$startDateTime = new DateTime($startDate . ' 00:00:00');
			$endDateTime = new DateTime($endDate . ' 23:59:59');
			$startDateFormatted = $startDateTime->format('Y-m-d H:i:s');
			$endDateFormatted = $endDateTime->format('Y-m-d H:i:s');

			$selectStatement = '';
			$fields = $this->db->list_fields('submit_user');
			foreach ($fields as $field) {
				$selectStatement .= 'submit_user.' . $field . ' AS submit_user_' . $field . ',';
			}
			$this->db->select($selectStatement);
			$this->db->from('submit_user');
			$this->db->where("submit_date BETWEEN '$startDateFormatted' AND '$endDateFormatted'");
			$this->db->order_by('submit_date', $orderBy);
			$this->db->limit($pageSize, $offset);
			$query = $this->db->get();
			$users = $query->result_array();

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
			$dataUsers = array();
			foreach ($formattedData as $data) {
				$userId = $data['user_id'];
				if (isset($usersFormat[$userId])) {
					$dataUsers[] = array_merge($usersFormat[$userId], $data);
				}
			}

			$data = array('status' => "true", 'message' => null, 'data' => $dataUsers);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function getStats($current_year = null)
	{
		try {
			if (!isset($current_year) || empty($current_year)) {
				$current_year = date('Y');
			}
			$this->db->select('id, year');
			$this->db->from('sync_year');
			$this->db->where('year =', $current_year);
			$this->db->limit(1);
			$query = $this->db->get();
			$currentYearId = $query->row('id');

			$this->db->select('COUNT(id) AS count');
			$this->db->from('submit_user');
			$this->db->where('YEAR(submit_date) =', $current_year);
			$query = $this->db->get();
			$countSubmitUser = $query->row('count');

			$this->db->select('id');
			$this->db->from('graph');
			$this->db->order_by('index', 'ASC');
			$this->db->limit(1);
			$query = $this->db->get();
			$graphId = $query->row('id');

			$this->db->select('
            graph_bar.id AS graph_bar_id,
            graph_bar.name AS graph_bar_name,
            AVG(CASE WHEN sync_bar_average.average_score <> 0 THEN sync_bar_average.average_score END) AS average_score,
        	');
			$this->db->from('sync_bar_average');
			$this->db->join('graph_bar', 'sync_bar_average.graph_bar_id = graph_bar.id', 'left');
			$this->db->join('graph', 'graph_bar.graph_id = graph.id', 'left');
			$this->db->join('sync_year', 'sync_bar_average.sync_year_id = sync_year.id', 'left');
			$this->db->where('sync_year.id', $currentYearId);
			$this->db->where('graph.id', $graphId);
			$this->db->group_by('graph_bar.id');

			$query = $this->db->get();
			$graphBars = $query->result_array();

			$formattedData = array(
				'submit_count' => $countSubmitUser,
				'score_averages' => array(),
			);
			foreach ($graphBars as $row) {
				$formattedData['score_averages'][] = array(
					'name' => $row['graph_bar_name'],
					'scores' => number_format($row['average_score'], 2),

				);
			}

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! สำหรับ map id ของคำถามและคำตอบ จากลำดับข้อและลำดับคำตอบ
	public function previewImport()
	{
		try {
			$requestData = $this->input->post();
			$answers = $requestData['answers'];

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
			$data = array('status' => "true", 'message' => null, 'data' => $tempData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function importSubmitQuestion()
	{
		try {
			$this->db->trans_start();
			$request = $this->input->post();

			foreach ($request['import_data'] as $record) {
				$requestData = $record;
				$requestData['user_info']['postal_code'] = "";

				//Perform normal submit operation
				$currentDate = (new DateTime($request['import_date']))->format('Y-m-d H:i:s');

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
					'consult_people' => $userData['consult_people'],
					'drug_history' => $userData['drug_history'],
					'type_of_drugs' => $userData['type_of_drugs'],
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
			}

			$this->db->trans_complete();

			$res = array('status' => true, 'message' => "นำเข้าข้อมูลสำเร็จ " . count($request['import_data']) . " รายการ", 'data' => null);
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		} catch (Exception $e) {
			$res = array('status' => false, 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($res));
		}
	}

	//! ดึงข้อมูลการตั้งค่า ค่า Norm ของกราฟทั้งหมด
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

			$data = array('status' => "true", 'message' => null, 'data' => $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! อัปเดตข้อมูลการตั้งค่า ค่า Norm ของกราฟทั้งหมด
	public function updateGraphbarNorm()
	{
		try {
			$requestData = $this->input->post();
			$graphBars = $requestData['graph_bars'];

			$message = null;
			foreach ($graphBars as $graphBar) {
				$graphBarId = $graphBar['graph_bar_id'];
				$normNoneDrug = $graphBar['norm_none_drug'];
				$normDrug = $graphBar['norm_drug'];
				if (empty($graphBarId)) {
					throw new Exception("Undefined graph_bar_id");
				} else {
					$graphBarData = array(
						'norm_none_drug' => $normNoneDrug,
						'norm_drug' => $normDrug,
					);

					$this->db->where('id', $graphBarId);
					$this->db->update('graph_bar', $graphBarData);
				}
			}

			$message = "ปรับปรุงข้อมูลค่า Norm สำเร็จ";
			$data = array('status' => true, 'message' => $message, 'data' => null);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => false, 'message' => $e->getMessage(), 'data' => null,);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	//! แสดงคำแนะนำทั้งหมด
	public function getAllAdviceText($id = null)
	{
		try {
			$requestData = $this->input->post();
			$conditionIds = $requestData['condition_id'] ?? [$id];
	
			$result = [];
	
			if (!empty($conditionIds) && is_array($conditionIds)) {
				$this->db->select('
				advice_text.*,
				advice.id AS advice_id,
				advice.title AS advice_title,
				advice.index AS advice_index,
				advice_condition.id AS advice_condition_id,
				advice_condition.name AS advice_condition_name
				');
				$this->db->from('advice_text');
				$this->db->where_in('advice_condition_id', $conditionIds);
				$this->db->join('advice_condition', 'advice_condition.id = advice_text.advice_condition_id', 'left');
				$this->db->join('advice', 'advice_condition.advice_id = advice.id', 'left');
				$this->db->order_by('advice_text.advice_condition_id', 'ASC');
				$this->db->order_by('advice_text.index', 'ASC');
	
				$query = $this->db->get();
				$result = $query->result_array();
			}
	
			$formattedData = [];
	
			foreach ($result as $row) {
				$conditionId = $row['advice_condition_id'];
	
				if (!isset($formattedData[$conditionId])) {
					$formattedData[$conditionId] = [
						'advice_id' => $row['advice_id'],
						'advice_title' => $row['advice_title'],
						'advice_condition_name' => $row['advice_condition_name'],
						'advice_index' => $row['advice_index'],
						'advice_detail' => []
					];
				}
	
				$formattedData[$conditionId]['advice_detail'][] = [
					'id' => $row['id'],
					'title' => $row['title'],
					'text' => $row['text'],
					'index' => $row['index'],
					'advice_condition_id' => $row['advice_condition_id']
				];
			}

			$formattedData = array_values($formattedData);
	
			$data = array('status' => "true", 'message' => null, 'data' => $id ? $formattedData[0] : $formattedData);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} catch (Exception $e) {
			$data = array('status' => "false", 'message' => $e->getMessage(), 'data' => null);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}
	

	//! แสดงคำแนะนำ
	public function getAdviceText($id)
	{
		$this->getAllAdviceText($id);
	}


	//! gen uuidv4
	public function uuid()
	{
		$uuid = uniqid() . md5(uniqid('', true));
		return $uuid;
	}

	//! gen ticket
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
