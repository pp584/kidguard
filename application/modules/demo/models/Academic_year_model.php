<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Academic_year_model Class
 * @date 2019-01-11
 */
class Academic_year_model extends MY_Model
{

	private $my_table;
	public $session_name;
	public $order_field;
	public $order_sort;

	public function __construct()
	{
		parent::__construct();
		$this->my_table = 'tb_info_academic_year';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';
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
				'thai_year' => $post['thai_year']
				,'term' => $post['term']
				,'class_room' => $post['class_room']
				,'ref_student_id' => $post['ref_student_id']
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
		if($this->order_field != ''){
			$order_field = $this->order_field;
			$order_sort = $this->order_sort;
			$order_by	= " $this->my_table.$order_field $order_sort";
		}
		
		if($search_field != '' && $value != ''){
			$search_method_value = '';
			if($search_field == 'thai_year'){
				$value = $value + 0;
				$search_method_value = "= $value";				
			}
			$where		= " $this->my_table.$search_field $search_method_value "; 
			if($order_by == ''){
				$order_by	= " $this->my_table.$search_field";
			}
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
		$this->db->select("$this->my_table.*, tb_year_1.year_num AS thaiYearYearNum
				, tb_room_2.room_name AS classRoomRoomName
				, tb_student_3.prefix_name AS refStudentIdPrefixName, tb_student_3.firstname AS refStudentIdFirstname, tb_student_3.lastname AS refStudentIdLastname
				");
		$this->db->join('tb_year AS tb_year_1', "$this->my_table.thai_year = tb_year_1.year_num", 'left');
		$this->db->join('tb_room AS tb_room_2', "$this->my_table.class_room = tb_room_2.id", 'left');
		$this->db->join('tb_student AS tb_student_3', "$this->my_table.ref_student_id = tb_student_3.id", 'left');

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
				'thai_year' => $post['thai_year']
				,'term' => $post['term']
				,'class_room' => $post['class_room']
				,'ref_student_id' => $post['ref_student_id']
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