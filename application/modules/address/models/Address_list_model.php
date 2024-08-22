<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Address_list_model Class
 * @date 2018-12-21
 */
class Address_list_model extends MY_Model
{

	private $my_table;
	public $session_name;

	public function __construct()
	{
		parent::__construct();
		$this->my_table = 'tb_address_list';
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
				'ref_student_id' => $post['ref_student_id']
				,'ref_geo_id' => $post['ref_geo_id']
				,'ref_province_id' => $post['ref_province_id']
				,'ref_amphur_id' => $post['ref_amphur_id']
				,'ref_district_id' => $post['ref_district_id']
				,'zip_code' => $post['zip_code']
				,'address' => $post['address']
				,'remark' => $post['remark']
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
		$this->db->select("$this->my_table.*, tb_student_1.firstname AS refStudentIdFirstname, tb_student_1.lastname AS refStudentIdLastname
				, tb_addr_geography_2.GEO_NAME AS refGeoIdGEONAME
				");
		$this->db->join('tb_student AS tb_student_1', "$this->my_table.ref_student_id = tb_student_1.id", 'left');
		$this->db->join('tb_addr_geography AS tb_addr_geography_2', "$this->my_table.ref_geo_id = tb_addr_geography_2.GEO_ID", 'left');

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
				'ref_student_id' => $post['ref_student_id']
				,'ref_geo_id' => $post['ref_geo_id']
				,'ref_province_id' => $post['ref_province_id']
				,'ref_amphur_id' => $post['ref_amphur_id']
				,'ref_district_id' => $post['ref_district_id']
				,'zip_code' => $post['zip_code']
				,'address' => $post['address']
				,'remark' => $post['remark']
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

	public function province_list($geo_id)
	{
		$this->set_table_name('tb_addr_province');
		$this->set_select_field("PROVINCE_ID, PROVINCE_NAME");
		$this->set_where("GEO_ID = $geo_id");
		$this->set_order_by("PROVINCE_NAME");
		return $this->list_record();
	}
	
	public function amphur_list($province_id)
	{
		$this->set_table_name('tb_addr_amphur');
		$this->set_select_field("AMPHUR_ID, AMPHUR_NAME");
		$this->set_where("PROVINCE_ID = $province_id");
		$this->set_order_by("AMPHUR_NAME");
		return $this->list_record();
	}
}
/*---------------------------- END Model Class --------------------------------*/