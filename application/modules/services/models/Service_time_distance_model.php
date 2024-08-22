<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Service_time_distance_model Class
 * @date 2022-04-06
 */
class Service_time_distance_model extends MY_Model
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
		$this->my_table = 'service_information';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';

		$this->order_by = '';
		$this->where_condition = '';

	}


	public function exists($data)
	{
		$service_information_id = checkEncryptData($data['service_information_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.service_information_id = $service_information_id");
		return $this->count_record();
	}


	public function load($id)
	{
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.service_information_id = $id");
		$lists = $this->load_record();
		return $lists;
	}


	public function create($post)
	{

		$data = array(
				'service_unit_name' => $post['service_unit_name']
				,'operating_command' => $post['operating_command']
				,'zone_area' => $post['zone_area']
				,'police_station' => $post['police_station']
				,'operating_number' => $post['operating_number']
				,'regis_date' => setDateToStandard($post['regis_date'])
				,'performance' => $post['performance']
				,'locale' => $post['locale']
				,'event' => $post['event']
				,'create_by_userid' => $post['create_by_userid']
				,'create_date' => date('Y-m-d H:i:s')
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
			if($search_field == 'service_information_id'){
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
			$this->db->join('services AS services_1', "$this->my_table.service_unit_name = services_1.services_name", 'left');
		$this->db->join('tb_members AS tb_members_2', "$this->my_table.create_by_userid = tb_members_2.userid", 'left');

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
		$this->db->select("$this->my_table.*, services_1.services_name AS serviceUnitNameServicesName
				, tb_members_2.firstname AS createByUseridFirstname, tb_members_2.lastname AS createByUseridLastname
				");
		$this->db->join('services AS services_1', "$this->my_table.service_unit_name = services_1.services_name", 'left');
		$this->db->join('tb_members AS tb_members_2', "$this->my_table.create_by_userid = tb_members_2.userid", 'left');

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
				'service_unit_name' => isset($post['service_unit_name'])
				,'operating_command' =>isset( $post['operating_command'])
				,'zone_area' => isset($post['zone_area'])
				,'police_station' => isset($post['police_station'])
				,'operating_number' => isset($post['operating_number'])
				,'regis_date' => setDateToStandard($post['regis_date'])
				,'performance' => isset($post['performance'])
				,'locale' => isset($post['locale'])
				,'event' => isset($post['event'])
				,'create_by_userid' => isset($post['create_by_userid'])
		);

		if(!empty($data)){
			$service_information_id = checkEncryptData($post['encrypt_service_information_id']);
			$this->set_table_name($this->my_table);
			$this->set_where("$this->my_table.service_information_id = $service_information_id");
			return $this->update_record($data);
		}else{
			$this->error_message = 'ไม่พบข้อมูลที่เปลี่ยนแปลง';
		}
	}


	public function delete($post)
	{
			$service_information_id = checkEncryptData($post['encrypt_service_information_id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.service_information_id = $service_information_id");
		return $this->delete_record();
	}


	public function loadDetailList($master_ref_id)
	{
		$this->set_table_name('time_distance');
		$this->db->select("time_distance.*, ");
		$this->set_where("service_information_id = $master_ref_id");
		return $this->list_record();
	}



	public function load_detail_record($id)
	{
		$this->set_table_name('time_distance');
		$this->set_where("itme_distance_id = $id");
		return $this->load_record();
	}

	public function save_detail_list($post)
	{
		$this->set_table_name('time_distance');
		$data = array(
				'service_information_id' => $post['service_information_id']
				,'incident_time' => $post['incident_time']
				,'incident_time_recrive' => $post['incident_time_recrive']
				,'time_order' => $post['time_order']
				,'base_time_start' => $post['base_time_start']
				,'base_time_stop' => $post['base_time_stop']
				,'time_of_leaving' => $post['time_of_leaving']
				,'time_to_hospital' => $post['time_to_hospital']
				,'base_time_finish' => $post['base_time_finish']
				,'distance_base_scene' => $post['distance_base_scene']
				,'distance_to_hospital' => $post['distance_to_hospital']
		);

		if($post['encrypt_itme_distance_id'] != ''){
			$itme_distance_id = checkEncryptData($post['encrypt_itme_distance_id']);
			$this->set_where("itme_distance_id = $itme_distance_id");
			return $this->update_record($data);
		}else{
			return $this->add_record($data);
		}
	}


	public function delete_list($post)
	{
		$this->set_table_name('time_distance');
		$itme_distance_id = checkEncryptData($post['encrypt_itme_distance_id']);
		$this->set_where("itme_distance_id = $itme_distance_id");
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