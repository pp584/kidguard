<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Student_model Class
 * @date 2018-12-09
 */
class Student_model extends MY_Model
{

	private $my_table;
	public $session_name;

	public function __construct()
	{
		parent::__construct();
		$this->my_table = 'tb_student';
		$this->set_table_name($this->my_table);
	}


	public function exists($data)
	{
		$id = checkEncryptData($data['id']);
		$this->set_where("id = $id");
		return $this->count_record();
	}


	public function load($id)
	{
		$this->set_where("id = $id");
		return $this->load_record();
	}


	public function create($post)
	{

		$data = array(
				'student_code' => $post['student_code']
				,'prefix_name' => $post['prefix_name']
				,'firstname' => $post['firstname']
				,'lastname' => $post['lastname']
		);
		return $this->add_record($data);
	}


	/**
	* List all data
	* @param $start_row	Number offset record start
	* @param $per_page	Number limit record perpage
	*/
	public function read($start_row, $per_page)
	{
		$search_field 	= $this->session->userdata($this->session_name . '_search_field');
		$value 	= $this->session->userdata($this->session_name . '_value');
		$value 	= trim($value);
		
		$where	= '';
		$order_by	= '';
		if($search_field != ''){
			$search_method_value = '';
			if($search_field == 'id'){
				$value = $value + 0;
				$search_method_value = "= $value";				
			}
			if($search_field == 'student_code'){
				$search_method_value = "= '$value'";				
			}
			if($search_field == 'firstname'){
				$search_method_value = "LIKE '%$value%'";				
			}
			$where		= " $this->my_table.$search_field $search_method_value "; 
			$order_by	= " $this->my_table.$search_field";
		}
		$total_row = $this->count_record();
		$search_row = $total_row;
		if ($where != '') {
			$this->set_where($where);
			$search_row = $this->count_record();
		}
		$offset = $start_row;
		$limit = $per_page;
		$this->set_order_by($order_by);
		$this->set_offset($offset);
		$this->set_limit($limit);
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
				'student_code' => $post['student_code']
				,'prefix_name' => $post['prefix_name']
				,'firstname' => $post['firstname']
				,'lastname' => $post['lastname']
		);

		$id = checkEncryptData($post['encrypt_id']);
		$this->set_where("id = $id");
		return $this->update_record($data);
	}


	public function delete($post)
	{
		$id = checkEncryptData($post['encrypt_id']);
		$this->set_where("id = $id");
		return $this->delete_record();
	}


}
/*---------------------------- END Model Class --------------------------------*/