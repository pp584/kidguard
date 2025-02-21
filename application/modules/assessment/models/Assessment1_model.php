<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Assessment1_model Class
 * @date 2023-07-23
 */
class Assessment1_model extends MY_Model
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
		$this->my_table = 'assessment1';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';

		$this->order_by = '';
		$this->where_condition = '';

	}


	public function exists($data)
	{
		$id = checkEncryptData($data['id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.id = $id");
		return $this->count_record();
	}


	public function load()
	{
		$id = $this->session->userdata('assessment_id');
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.ref_assessment_id = $id");
		$lists = $this->load_record();
		return $lists;
	}


	public function create($post)
	{

		// question_4
			$data = array(
				'province_id' => $post['province_id']
				,'question_1' => $post['question_1']
				,'question_2' => $post['question_2']
				,'question_3' => $post['question_3']
				,'question_4' => $post['question_4']
				,'question_5' => $post['question_5']
				,'question_6' => $post['question_6']
				,'question_7' => $post['question_7']
				,'question_8' => $post['question_8']
				,'question_9' => $post['question_9']
				,'question_10' => $post['question_10']
				,'question_11' => $post['question_11']
				,'question_12' => $post['question_12']
				,'question_13' => $post['question_13']
				,'question_14' => $post['question_14']
				,'question_15' => $post['question_15']
				,'question_16' => $post['question_16']
				,'question_17' => $post['question_17']
				,'create_datetime' => date('Y-m-d')
				
		);
		

		

	$id = $this->session->userdata('assessment_id');
	if(!empty($data)){
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.ref_assessment_id = $id");
		return $this->update_record($data);
	}else{
		$this->error_message = 'ไม่พบข้อมูลที่เปลี่ยนแปลง';
	}
	
	}

	public function create_rawdata($table_name,$assesment_id)
	{
		$data = array('ref_assessment_id' => $assesment_id);
		$this->set_table_name($table_name);
		return $this->add_record($data);
	}



	/**
	* List all data
	* @param $start_row	Number offset record start
	* @param $per_page	Number limit record perpage
	*/
	public function read($start_row = FALSE, $per_page = FALSE)
	{
		$search_field 	= $this->session->userdata($this->session_name . '_search_field');
		$value 	= $this->session->userdata($this->session_name . '_value');
		$value 	= trim($value);
		
		$where = $this->where_condition;
		$order_by = $this->order_by;
		if($this->order_field != ''){
			$order_field = $this->order_field;
			$order_sort = $this->order_sort;
			$order_by = ($order_by != '' ? ', ' : '') . " $this->my_table.$order_field $order_sort";
		}
		
		if($search_field != '' && $value != ''){
			$search_method_field = "$this->my_table.$search_field";
			$search_method_value = '';
			if($search_field == 'id'){
				if(!is_numeric($value)){
					$value = 0;
				}
				$value = $value + 0;
				$search_method_value = "= $value";				
			}
			$where	.= ($where != '' ? ' AND ' : '') . " $search_method_field $search_method_value "; 
			if($order_by == ''){
				$order_by = ($order_by != '' ? ', ' : '') . " $this->my_table.$search_field";
			}
		}
		$this->set_table_name($this->my_table);
		$total_row = $this->count_record();
		$search_row = $total_row;
		if ($where != '') {
			$this->db->join('provinces AS provinces_1', "$this->my_table.province_id = provinces_1.id", 'left');

			$this->set_where($where);
			$search_row = $this->count_record();
		}
		$offset = $start_row;
		$limit = $per_page;
		$this->set_order_by($order_by);
		if($offset != FALSE){
			$this->set_offset($offset);
		}
		if($limit != FALSE){
			$this->set_limit($limit);
		}
		$this->db->select("$this->my_table.*, provinces_1.name_th AS provinceIdNameTh
				");
		$this->db->join('provinces AS provinces_1', "$this->my_table.province_id = provinces_1.id", 'left');

		$list_record = $this->list_record();
		$data = array(
				'total_row'	=> $total_row, 
				'search_row'	=> $search_row,
				'list_data'	=> $list_record
		);
		return $data;
	}

	public function update($post)
	{
		$data = array(
				'province_id' => $post['province_id']
				,'question_1' => $post['question_1']
				,'question_2' => $post['question_2']
				,'question_3' => $post['question_3']
				,'question_4' => $post['question_4']
				,'question_5' => $post['question_5']
				,'question_6' => $post['question_6']
				,'question_7' => $post['question_7']
				,'question_8' => $post['question_8']
				,'question_9' => $post['question_9']
				,'question_10' => $post['question_10']
				,'question_11' => $post['question_11']
				,'question_12' => $post['question_12']
				,'question_13' => $post['question_13']
				,'question_14' => $post['question_14']
		);

		if(!empty($data)){
			$id = checkEncryptData($post['encrypt_id']);
			$this->set_table_name($this->my_table);
			$this->set_where("$this->my_table.id = $id");
			return $this->update_record($data);
		}else{
			$this->error_message = 'ไม่พบข้อมูลที่เปลี่ยนแปลง';
		}
	}


	public function delete($post)
	{
			$id = checkEncryptData($post['encrypt_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.id = $id");
		return $this->delete_record();
	}


	public function search_table($table, $conditions)
	{
		if($conditions['search_value'] == ''){
			return array();
		}
		$this->set_table_name($table);
		$field1 = $conditions['field_value'];
		$field2 = $conditions['field_text'];
		$field_condition = $conditions['field_condition'];

		if(is_array($field1)){
			$all_field1 = implode(',', $field1);
			$field1 = "CONCAT_WS(' ', $all_field1) AS field_value";
		}else{
			$field1 = "$field1 AS field_value";
		}
		
		if(is_array($field2)){
			$all_field2 = implode(',', $field2);
			$field2 = "CONCAT_WS(' ', $all_field2) AS field_title";
		}else{
			$field2 = "$field2 AS field_title";
		}
		
		if(is_array($field_condition)){
			$all_field = implode(',', $field_condition);
			$field_condition =  "CONCAT_WS('', $all_field)";
		}
		$select = "$field1, $field2, $field_condition AS field_search";
		
		$search_value = $conditions['search_value'];
		
		$search_string = "";
		$search_method = "";
		switch($conditions['search_method']){
			case 'equal':
				$single_qoute = "'";
				if( $search_value[0] == "0" ) {
					$single_qoute = "'";
				}else{
					if (is_numeric($search_value)) {
						$single_qoute = "";
					}
				}
			
				$search_method = '=';
				$search_string = "{$single_qoute}{$search_value}{$single_qoute}";
				break;
			case 'contain':
				$search_method = 'LIKE';
				$search_string = "'%{$search_value}%'";
				$search_value = str_replace('.', '', str_replace(' ', '', $search_value));
				break;
			case 'start_with':
				$search_method = 'LIKE';
				$search_string = "'{$search_value}%'";
				break;
			case 'end_with':
				$search_method = 'LIKE';
				$search_string = "'%{$search_value}'";
				break;
		}
		$where = "$field_condition $search_method $search_string";
		$this->set_select_field("$select");
		$this->set_where("$where");
		return $this->list_record();
	}


}
/*---------------------------- END Model Class --------------------------------*/