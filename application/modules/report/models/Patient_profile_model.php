<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Patient_profile_model Class
 * @date 2022-05-08
 */
class Patient_profile_model extends MY_Model
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
		$this->my_table = 'patient_profile';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';

		$this->order_by = '';
		$this->where_condition = '';

	}


	public function exists($data)
	{
		$patient_profile_id = checkEncryptData($data['patient_profile_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.patient_profile_id = $patient_profile_id");
		return $this->count_record();
	}


	public function load($id)
	{
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.patient_profile_id = $id");
		$lists = $this->load_record();
		return $lists;
	}


	public function create($post)
	{

		$data = array(
				'service_information_id' => $post['service_information_id']
				,'ohac_id' => $post['ohac_id']
				,'patient_name' => $post['patient_name']
				,'age' => $post['age']
				,'sex' => $post['sex']
				,'right_medical' => $post['right_medical']
				,'right_medical_remark' => $post['right_medical_remark']
				,'congenital_disease' => $post['congenital_disease']
				,'congenital_disease_patient' => $post['congenital_disease_patient']
				,'congenital_disease_patient_remark' => $post['congenital_disease_patient_remark']
		);
		$this->set_table_name($this->my_table);
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
			if($search_field == 'patient_profile_id'){
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
			$this->db->join('service_information AS service_information_1', "$this->my_table.service_information_id = service_information_1.service_information_id", 'left');

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
		$this->db->select("$this->my_table.*, service_information_1.service_unit_name AS serviceInformationIdServiceUnitName, service_information_1.operating_command AS serviceInformationIdOperatingCommand
				");
		$this->db->join('service_information AS service_information_1', "$this->my_table.service_information_id = service_information_1.service_information_id", 'left');

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
				'service_information_id' => $post['service_information_id']
				,'ohac_id' => $post['ohac_id']
				,'patient_name' => $post['patient_name']
				,'age' => $post['age']
				,'sex' => $post['sex']
				,'right_medical' => $post['right_medical']
				,'right_medical_remark' => $post['right_medical_remark']
				,'congenital_disease' => $post['congenital_disease']
				,'congenital_disease_patient' => $post['congenital_disease_patient']
				,'congenital_disease_patient_remark' => $post['congenital_disease_patient_remark']
		);

		if(!empty($data)){
			$patient_profile_id = checkEncryptData($post['encrypt_patient_profile_id']);
			$this->set_table_name($this->my_table);
			$this->set_where("$this->my_table.patient_profile_id = $patient_profile_id");
			return $this->update_record($data);
		}else{
			$this->error_message = 'ไม่พบข้อมูลที่เปลี่ยนแปลง';
		}
	}


	public function delete($post)
	{
			$patient_profile_id = checkEncryptData($post['encrypt_patient_profile_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.patient_profile_id = $patient_profile_id");
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