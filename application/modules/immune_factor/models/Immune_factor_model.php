<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Immune_factor_model Class
 * @date 2023-07-18
 */
class Immune_factor_model extends MY_Model
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
		$this->my_table = 'immune_factor';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';

		$this->order_by = '';
		$this->where_condition = '';

	}


	public function exists($data)
	{
		$immune_factor_id = checkEncryptData($data['immune_factor_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.immune_factor_id = $immune_factor_id");
		return $this->count_record();
	}


	public function load($id)
	{
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.immune_factor_id = $id");
		$lists = $this->load_record();
		return $lists;
	}


	public function create($post)
	{

		$data = array(
				'question1' => $post['question1']
				,'question2' => $post['question2']
				,'question3' => $post['question3']
				,'question4' => $post['question4']
				,'question5' => $post['question5']
				,'question6' => $post['question6']
				,'question7' => $post['question7']
				,'question8' => $post['question8']
				,'question9' => $post['question9']
				,'question10' => $post['question10']
				,'question11' => $post['question11']
				,'question12' => $post['question12']
				,'question13' => $post['question13']
				,'question14' => $post['question14']
				,'question15' => $post['question15']
				,'question16' => $post['question16']
				,'question17' => $post['question17']
				,'question18' => $post['question18']
				,'question19' => $post['question19']
				,'question20' => $post['question20']
				,'question21' => $post['question21']
				,'question22' => $post['question22']
				,'question23' => $post['question23']
				,'question24' => $post['question24']
				,'question25' => $post['question25']
				,'question26' => $post['question26']
				,'question27' => $post['question27']
				,'question28' => $post['question28']
				,'question29' => $post['question29']
				,'question30' => $post['question30']
				,'question31' => $post['question31']
				,'question32' => $post['question32']
				,'question33' => $post['question33']
				,'question34' => $post['question34']
				,'question35' => $post['question35']
				,'question36' => $post['question36']
				,'question37' => $post['question37']
				,'question38' => $post['question38']
				,'question39' => $post['question39']
				,'question40' => $post['question40']
				,'question41' => $post['question41']
				,'question42' => $post['question42']
				,'question43' => $post['question43']
				,'question44' => $post['question44']
				,'question45' => $post['question45']
				,'question46' => $post['question46']
				,'question47' => $post['question47']
				,'question48' => $post['question48']
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
			if($search_field == 'immune_factor_id'){
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
		$this->db->select("$this->my_table.*");

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
				'question1' => $post['question1']
				,'question2' => $post['question2']
				,'question3' => $post['question3']
				,'question4' => $post['question4']
				,'question5' => $post['question5']
				,'question6' => $post['question6']
				,'question7' => $post['question7']
				,'question8' => $post['question8']
				,'question9' => $post['question9']
				,'question10' => $post['question10']
				,'question11' => $post['question11']
				,'question12' => $post['question12']
				,'question13' => $post['question13']
				,'question14' => $post['question14']
				,'question15' => $post['question15']
				,'question16' => $post['question16']
				,'question17' => $post['question17']
				,'question18' => $post['question18']
				,'question19' => $post['question19']
				,'question20' => $post['question20']
				,'question21' => $post['question21']
				,'question22' => $post['question22']
				,'question23' => $post['question23']
				,'question24' => $post['question24']
				,'question25' => $post['question25']
				,'question26' => $post['question26']
				,'question27' => $post['question27']
				,'question28' => $post['question28']
				,'question29' => $post['question29']
				,'question30' => $post['question30']
				,'question31' => $post['question31']
				,'question32' => $post['question32']
				,'question33' => $post['question33']
				,'question34' => $post['question34']
				,'question35' => $post['question35']
				,'question36' => $post['question36']
				,'question37' => $post['question37']
				,'question38' => $post['question38']
				,'question39' => $post['question39']
				,'question40' => $post['question40']
				,'question41' => $post['question41']
				,'question42' => $post['question42']
				,'question43' => $post['question43']
				,'question44' => $post['question44']
				,'question45' => $post['question45']
				,'question46' => $post['question46']
				,'question47' => $post['question47']
				,'question48' => $post['question48']
		);

		if(!empty($data)){
			$immune_factor_id = checkEncryptData($post['encrypt_immune_factor_id']);
			$this->set_table_name($this->my_table);
			$this->set_where("$this->my_table.immune_factor_id = $immune_factor_id");
			return $this->update_record($data);
		}else{
			$this->error_message = 'ไม่พบข้อมูลที่เปลี่ยนแปลง';
		}
	}


	public function delete($post)
	{
			$immune_factor_id = checkEncryptData($post['encrypt_immune_factor_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.immune_factor_id = $immune_factor_id");
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