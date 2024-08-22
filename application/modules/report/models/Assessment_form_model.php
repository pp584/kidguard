<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Assessment_form_model Class
 * @date 2023-12-08
 */
class Assessment_form_model extends MY_Model
{

	private $running_options;
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
		$this->my_table = 'assessment_form';
		$this->set_table_name($this->my_table);
		$this->order_field = '';
		$this->order_sort = '';

		$this->order_by = '';
		$this->where_condition = '';


		$options = array();
		$options['assessment_code'] = array('format' => 2, 'type' => '', 'digit' => 6);
		$this->running_options = $options;
	}


	public function exists($data)
	{
		$id = checkEncryptData($data['id']);
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.id = $id");
		return $this->count_record();
	}


	public function load($id)
	{
		$this->set_table_name($this->my_table);
		$this->set_where("$this->my_table.id = $id");
		$lists = $this->load_record();
		return $lists;
	}


	public function create($post)
	{

		$data = array(
			'assessment_code' => $post['assessment_code'], 'create_date' => date('Y-m-d H:i:s'), 'draf' => $post['draf']
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
		if ($this->order_field != '') {
			$order_field = $this->order_field;
			$order_sort = $this->order_sort;
			$order_by = ($order_by != '' ? ', ' : '') . " $this->my_table.$order_field $order_sort";
		}

		if ($search_field != '' && $value != '') {
			$search_method_field = "$this->my_table.$search_field";
			$search_method_value = '';
			if ($search_field == 'id') {
				if (!is_numeric($value)) {
					$value = 0;
				}
				$value = $value + 0;
				$search_method_value = "= $value";
			}
			$where	.= ($where != '' ? ' AND ' : '') . " $search_method_field $search_method_value ";
			if ($order_by == '') {
				$order_by = ($order_by != '' ? ', ' : '') . " $this->my_table.$search_field";
			}
		}

		$this->db->select("
		$this->my_table.*,
		provinces.name_th as province_name,
		assessment1.question_1 Sex,
		assessment1.question_2 Age,
		assessment1.question_3 Edu1,
		assessment1.question_4 Edu2,
		assessment1.question_5 Sisbro,
		assessment1.question_6 Sisbro_total,
		assessment1.question_7 Family,
		assessment1.question_8 Dad_Job,
		assessment1.question_9 Dad_Job_fill,
		assessment1.question_10 Mom_Job,
		assessment1.question_11 Mom_Job_fill,
		assessment1.question_12 earn,
		assessment1.question_13 C1,
		assessment1.question_14 C1_fill,
		assessment1.question_15 try_data_yes_no,
		assessment1.question_16 try_data,
		assessment1.question_17 try_data_fill, 
		assessment2.quest_1 EF1,
		assessment2.quest_2 EF2,
		assessment2.quest_3 EF3,
		assessment2.quest_4 EF4,
		assessment2.quest_5 EF5,
		assessment2.quest_6 EF6,
		assessment2.quest_7 EF7,
		assessment2.quest_8 EF8,
		assessment2.quest_9 EF9,
		assessment2.quest_10 EF10,
		assessment2.quest_11 EF11,
		assessment2.quest_12 EF12,
		assessment2.quest_13 EF13,
		assessment2.quest_14 EF14,
		assessment2.quest_15 EF15,
		assessment2.quest_16 EF16,
		assessment2.quest_17 EF17,
		assessment2.quest_18 EF18,
		assessment2.quest_19 EF19,
		assessment2.quest_20 EF20,
		assessment2.quest_21 EF21,
		assessment2.quest_22 EF22,
		assessment2.quest_23 EF23,
		assessment2.quest_24 EF24,
		assessment2.quest_25 EF25,
		assessment2.quest_26 EF26,
		assessment2.quest_27 EF27,
		assessment2.quest_28 EF28,
		assessment2.quest_29 EF29,
		assessment2.quest_30 EF30,
		assessment2.quest_31 EF31,
		assessment2.quest_32 EF32,
		assessment2.quest_33 EF33,
		assessment2.quest_34 EF34,
		assessment2.quest_35 EF35,
		assessment2.quest_36 EF36,
		assessment2.quest_37 EF37,
		assessment2.quest_38 EF38,
		assessment2.quest_39 EF39,
		assessment2.quest_40 EF40,
		assessment2.quest_41 EF41,
		assessment2.quest_42 EF42,
		assessment2.quest_43 EF43,
		assessment2.quest_44 EF44,
		assessment2.quest_45 EF45,
		assessment2.quest_46 PSY1,
		assessment2.quest_47 PSY2,
		assessment2.quest_48 PSY3,
		assessment2.quest_49 PSY4,
		assessment2.quest_50 PSY5,
		assessment2.quest_51 PSY6,
		assessment2.quest_52 PSY7,
		assessment2.quest_53 PSY8,
		assessment2.quest_54 PSY9,
		assessment2.quest_55 PSY10,
		assessment2.quest_56 PSY11,
		assessment2.quest_57 PSY12,
		assessment2.quest_58 PSY13,
		assessment2.quest_59 PSY14,
		assessment2.quest_60 PSY15,
		assessment2.quest_61 PSY16,
		assessment2.quest_62 PSY17,
		assessment2.quest_63 PSY18,
		assessment2.quest_64 PSY19,
		assessment2.quest_65 PSY20,
		assessment2.quest_66 PSY21,
		assessment2.quest_67 PSY22,
		assessment2.quest_68 PSY23,
		assessment2.quest_69 PSY24,
		assessment2.quest_70 PSY25,
		assessment2.quest_71 PSY26,
		assessment2.quest_72 SELF1,
		assessment2.quest_73 SELF2,
		assessment2.quest_74 SELF3,
		assessment2.quest_75 SELF4,
		assessment2.quest_76 SELF5,
		assessment2.quest_77 SELF6,
		assessment2.quest_78 SELF7,
		assessment2.quest_79 SELF8,
		assessment2.quest_80 SELF9,
		assessment2.quest_81 SELF10,
		assessment2.quest_82 SELF11,
		assessment2.quest_83 SELF12,
		assessment2.quest_84 SELF13,
		assessment2.quest_85 SELF14,
		assessment2.quest_86 SELF15,
		assessment2.quest_87 SELF16,
		assessment2.quest_88 SELF17,
		assessment2.quest_89 SELF18,
		assessment2.quest_90 SELF19,
		assessment2.quest_91 SELF20,
		assessment2.quest_92 SELF21,
		assessment2.quest_93 SELF22,
		assessment2.quest_94 SELF23,
		assessment2.quest_95 SELF24,
		assessment2.quest_96 SELF25,
		assessment2.quest_97 POW1,
		assessment2.quest_98 POW2,
		assessment2.quest_99 POW3,
		assessment2.quest_100 POW4,
		assessment2.quest_101 POW5,
		assessment2.quest_102 POW6,
		assessment2.quest_103 POW7,
		assessment2.quest_104 POW8,
		assessment2.quest_105 POW9,
		assessment2.quest_106 POW10,
		assessment2.quest_107 POW11,
		assessment2.quest_108 POW12,
		assessment2.quest_109 POW13,
		assessment2.quest_110 POW14,
		assessment2.quest_111 POW15,
		assessment3.quest_1 CON1 ,
		assessment3.quest_2 CON2,
		assessment3.quest_3 CON3,
		assessment3.quest_4 CON4,
		assessment3.quest_5 CON5,
		assessment3.quest_6 CON6,
		assessment3.quest_7 CON7,
		assessment3.quest_8 CON8,
		assessment3.quest_9 FAM1,
		assessment3.quest_10 FAM2,
		assessment3.quest_11 FAM3,
		assessment3.quest_12 FAM4,
		assessment3.quest_13 FAM5,
		assessment3.quest_14 FAM6,
		assessment3.quest_15 FAM7,
		assessment3.quest_16 FAM8,
		assessment3.quest_17 FAM9,
		assessment3.quest_18 FAM10,
		assessment3.quest_19 FAM11,
		assessment3.quest_20 FAM10,
		assessment3.quest_21 FAM12,
		assessment3.quest_22 FAM13,
		assessment3.quest_23 FAM14,
		assessment3.quest_24 FAM15,
		assessment3.quest_25 FAM16,
		assessment3.quest_26 FAM17,
		assessment3.quest_27 FAM18,
		assessment3.quest_28 FAM19,
		assessment3.quest_29 FAM20,
		assessment3.quest_30 FAM21,
		assessment3.quest_31 FAM22,
		assessment3.quest_32 MOD1,
		assessment3.quest_33 MOD2,
		assessment3.quest_34 MOD3,
		assessment3.quest_35 MOD4,
		assessment3.quest_36 MOD5,
		assessment3.quest_37 MOD6,
		assessment3.quest_38 MOD7,
		assessment3.quest_39 MOD8,
		assessment3.quest_40 MOD9,
		assessment3.quest_41 MOD10,
		assessment3.quest_42 MOD11,
		assessment3.quest_43 MOD12,
		assessment3.quest_44 MOD13,
		assessment3.quest_45 MOD14,
		assessment3.quest_46 MOD15,
		assessment3.quest_47 MOD16,
		assessment3.quest_48 MEDIA1,
		assessment3.quest_49 MEDIA2,
		assessment3.quest_50 MEDIA3,
		assessment3.quest_51 MEDIA4,
		assessment3.quest_52 POWFA1,
		assessment3.quest_53 POWFA2,
		assessment3.quest_54 POWFA3,
		assessment3.quest_55 POWFA4,
		assessment3.quest_56 POWFA5,
		assessment3.quest_57 POWFA6,
		assessment3.quest_58 POWFA7,
		assessment3.quest_59 POWFA8,
		assessment3.quest_60 POWIN1,
		assessment3.quest_61 POWIN2,
		assessment3.quest_62 POWIN3,
		assessment3.quest_63 POWIN4,
		assessment3.quest_64 POWIN5,
		assessment3.quest_65 POWIN6,
		assessment3.quest_66 POWIN7,
		assessment3.quest_67 POWIN8,
		assessment3.quest_68 POWIN9,
		assessment3.quest_69 POWIN10,
		assessment3.quest_70 POWIN11,
		assessment3.quest_71 POWFA1,
		assessment3.quest_72 POWFA2,
		assessment3.quest_73 POWFA3,
		assessment3.quest_74 POWFA4,
		assessment3.quest_75 POWFA5,
		assessment3.quest_76 POWFA6,

		assessment3.quest_77 POWCOM1,
		assessment3.quest_78 POWCOM2,
		assessment3.quest_79 POWCOM3,
		assessment3.quest_80 POWCOM4,
		assessment3.quest_81 POWCOM5,
		assessment3.quest_82 POWCOM6,
		assessment3.quest_83 POWCOM7,
		assessment3.quest_84 POWCOM8,

		assessment3.quest_85 ATT1,
		assessment3.quest_86 ATT2,
		assessment3.quest_87 ATT3,
		assessment3.quest_88 ATT4,
		assessment3.quest_89 ATT5,
		assessment3.quest_90 ATT6,
		assessment3.quest_91 ATT7,
		assessment3.quest_92 ATT8,
		assessment3.quest_93 ATT9,
		assessment3.quest_94 ATT10,
		assessment3.quest_95 ATT11,
		assessment3.quest_96 ATT12,
		assessment3.quest_97 ATT13,
		assessment3.quest_98 ATT14,

		assessment4.quest_1 BEH1,
    	assessment4.quest_2 BEH2,
		assessment4.quest_3 BEH3,
		assessment4.quest_4 BEH4,
		assessment4.quest_5 BEH5,
		assessment4.quest_6 BEH6,
		assessment4.quest_7 BEH7,
		assessment4.quest_8 BEH8,
		assessment4.quest_9 BEH9,
		assessment4.quest_10 BEH10,
		assessment4.quest_11 BEH11,
		assessment4.quest_12 BEH12,
		assessment4.quest_13 BEH13,
		assessment4.quest_14 BEH14,
		assessment4.quest_15 BEH15,
		assessment4.quest_16 BEH16,
		assessment4.quest_17 BEH17,
		assessment4.quest_18 BEH18,
		assessment4.quest_19 BEH19,
		assessment4.quest_20 BEH20,
		assessment4.quest_21 BEH21,
		assessment4.quest_22 BEH22,
		assessment4.quest_23 BEH23
		
		");
		$this->db->join('assessment1 AS assessment1', "$this->my_table.id = assessment1.ref_assessment_id", 'left');
		$this->db->join('assessment2 AS assessment2', "$this->my_table.id = assessment2.ref_assessment_id", 'left');
		$this->db->join('assessment3 AS assessment3', "$this->my_table.id = assessment3.ref_assessment_id", 'left');
		$this->db->join('assessment4 AS assessment4', "$this->my_table.id = assessment4.ref_assessment_id", 'left');
		$this->db->join('provinces AS provinces', "provinces.id = assessment1.province_id", 'left');


		$total_row = $this->count_record();
		$search_row = $total_row;
		if ($where != '') {

			$this->set_where($where);
			$search_row = $this->count_record();
		}
		$offset = $start_row;
		$limit = $per_page;
		$this->set_order_by($order_by);
		if ($offset != FALSE) {
			$this->set_offset($offset);
		}
		if ($limit != FALSE) {
			$this->set_limit($limit);
		}


		$this->db->select("
		$this->my_table.*,
		provinces.name_th as province_name,
		assessment1.question_1 Sex,
		assessment1.question_2 Age,
		assessment1.question_3 Edu1,
		assessment1.question_4 Edu2,
		assessment1.question_5 Sisbro,
		assessment1.question_6 Sisbro_total,
		assessment1.question_7 Family,
		assessment1.question_8 Dad_Job,
		assessment1.question_9 Dad_Job_fill,
		assessment1.question_10 Mom_Job,
		assessment1.question_11 Mom_Job_fill,
		assessment1.question_12 earn,
		assessment1.question_13 C1,
		assessment1.question_14 C1_fill,
		assessment1.question_15 try_data_yes_no,
		assessment1.question_16 try_data,
		assessment1.question_17 try_data_fill, 
		assessment2.quest_1 EF1,
		assessment2.quest_2 EF2,
		assessment2.quest_3 EF3,
		assessment2.quest_4 EF4,
		assessment2.quest_5 EF5,
		assessment2.quest_6 EF6,
		assessment2.quest_7 EF7,
		assessment2.quest_8 EF8,
		assessment2.quest_9 EF9,
		assessment2.quest_10 EF10,
		assessment2.quest_11 EF11,
		assessment2.quest_12 EF12,
		assessment2.quest_13 EF13,
		assessment2.quest_14 EF14,
		assessment2.quest_15 EF15,
		assessment2.quest_16 EF16,
		assessment2.quest_17 EF17,
		assessment2.quest_18 EF18,
		assessment2.quest_19 EF19,
		assessment2.quest_20 EF20,
		assessment2.quest_21 EF21,
		assessment2.quest_22 EF22,
		assessment2.quest_23 EF23,
		assessment2.quest_24 EF24,
		assessment2.quest_25 EF25,
		assessment2.quest_26 EF26,
		assessment2.quest_27 EF27,
		assessment2.quest_28 EF28,
		assessment2.quest_29 EF29,
		assessment2.quest_30 EF30,
		assessment2.quest_31 EF31,
		assessment2.quest_32 EF32,
		assessment2.quest_33 EF33,
		assessment2.quest_34 EF34,
		assessment2.quest_35 EF35,
		assessment2.quest_36 EF36,
		assessment2.quest_37 EF37,
		assessment2.quest_38 EF38,
		assessment2.quest_39 EF39,
		assessment2.quest_40 EF40,
		assessment2.quest_41 EF41,
		assessment2.quest_42 EF42,
		assessment2.quest_43 EF43,
		assessment2.quest_44 EF44,
		assessment2.quest_45 EF45,
		assessment2.quest_46 PSY1,
		assessment2.quest_47 PSY2,
		assessment2.quest_48 PSY3,
		assessment2.quest_49 PSY4,
		assessment2.quest_50 PSY5,
		assessment2.quest_51 PSY6,
		assessment2.quest_52 PSY7,
		assessment2.quest_53 PSY8,
		assessment2.quest_54 PSY9,
		assessment2.quest_55 PSY10,
		assessment2.quest_56 PSY11,
		assessment2.quest_57 PSY12,
		assessment2.quest_58 PSY13,
		assessment2.quest_59 PSY14,
		assessment2.quest_60 PSY15,
		assessment2.quest_61 PSY16,
		assessment2.quest_62 PSY17,
		assessment2.quest_63 PSY18,
		assessment2.quest_64 PSY19,
		assessment2.quest_65 PSY20,
		assessment2.quest_66 PSY21,
		assessment2.quest_67 PSY22,
		assessment2.quest_68 PSY23,
		assessment2.quest_69 PSY24,
		assessment2.quest_70 PSY25,
		assessment2.quest_71 PSY26,
		assessment2.quest_72 SELF1,
		assessment2.quest_73 SELF2,
		assessment2.quest_74 SELF3,
		assessment2.quest_75 SELF4,
		assessment2.quest_76 SELF5,
		assessment2.quest_77 SELF6,
		assessment2.quest_78 SELF7,
		assessment2.quest_79 SELF8,
		assessment2.quest_80 SELF9,
		assessment2.quest_81 SELF10,
		assessment2.quest_82 SELF11,
		assessment2.quest_83 SELF12,
		assessment2.quest_84 SELF13,
		assessment2.quest_85 SELF14,
		assessment2.quest_86 SELF15,
		assessment2.quest_87 SELF16,
		assessment2.quest_88 SELF17,
		assessment2.quest_89 SELF18,
		assessment2.quest_90 SELF19,
		assessment2.quest_91 SELF20,
		assessment2.quest_92 SELF21,
		assessment2.quest_93 SELF22,
		assessment2.quest_94 SELF23,
		assessment2.quest_95 SELF24,
		assessment2.quest_96 SELF25,
		assessment2.quest_97 POW1,
		assessment2.quest_98 POW2,
		assessment2.quest_99 POW3,
		assessment2.quest_100 POW4,
		assessment2.quest_101 POW5,
		assessment2.quest_102 POW6,
		assessment2.quest_103 POW7,
		assessment2.quest_104 POW8,
		assessment2.quest_105 POW9,
		assessment2.quest_106 POW10,
		assessment2.quest_107 POW11,
		assessment2.quest_108 POW12,
		assessment2.quest_109 POW13,
		assessment2.quest_110 POW14,
		assessment2.quest_111 POW15,
		assessment3.quest_1 CON1 ,
		assessment3.quest_2 CON2,
		assessment3.quest_3 CON3,
		assessment3.quest_4 CON4,
		assessment3.quest_5 CON5,
		assessment3.quest_6 CON6,
		assessment3.quest_7 CON7,
		assessment3.quest_8 CON8,
		assessment3.quest_9 FAM1,
		assessment3.quest_10 FAM2,
		assessment3.quest_11 FAM3,
		assessment3.quest_12 FAM4,
		assessment3.quest_13 FAM5,
		assessment3.quest_14 FAM6,
		assessment3.quest_15 FAM7,
		assessment3.quest_16 FAM8,
		assessment3.quest_17 FAM9,
		assessment3.quest_18 FAM10,
		assessment3.quest_19 FAM11,
		assessment3.quest_20 FAM10,
		assessment3.quest_21 FAM12,
		assessment3.quest_22 FAM13,
		assessment3.quest_23 FAM14,
		assessment3.quest_24 FAM15,
		assessment3.quest_25 FAM16,
		assessment3.quest_26 FAM17,
		assessment3.quest_27 FAM18,
		assessment3.quest_28 FAM19,
		assessment3.quest_29 FAM20,
		assessment3.quest_30 FAM21,
		assessment3.quest_31 FAM22,
		assessment3.quest_32 MOD1,
		assessment3.quest_33 MOD2,
		assessment3.quest_34 MOD3,
		assessment3.quest_35 MOD4,
		assessment3.quest_36 MOD5,
		assessment3.quest_37 MOD6,
		assessment3.quest_38 MOD7,
		assessment3.quest_39 MOD8,
		assessment3.quest_40 MOD9,
		assessment3.quest_41 MOD10,
		assessment3.quest_42 MOD11,
		assessment3.quest_43 MOD12,
		assessment3.quest_44 MOD13,
		assessment3.quest_45 MOD14,
		assessment3.quest_46 MOD15,
		assessment3.quest_47 MOD16,
		assessment3.quest_48 MEDIA1,
		assessment3.quest_49 MEDIA2,
		assessment3.quest_50 MEDIA3,
		assessment3.quest_51 MEDIA4,
		assessment3.quest_52 POWFA1,
		assessment3.quest_53 POWFA2,
		assessment3.quest_54 POWFA3,
		assessment3.quest_55 POWFA4,
		assessment3.quest_56 POWFA5,
		assessment3.quest_57 POWFA6,
		assessment3.quest_58 POWFA7,
		assessment3.quest_59 POWFA8,
		assessment3.quest_60 POWIN1,
		assessment3.quest_61 POWIN2,
		assessment3.quest_62 POWIN3,
		assessment3.quest_63 POWIN4,
		assessment3.quest_64 POWIN5,
		assessment3.quest_65 POWIN6,
		assessment3.quest_66 POWIN7,
		assessment3.quest_67 POWIN8,
		assessment3.quest_68 POWIN9,
		assessment3.quest_69 POWIN10,
		assessment3.quest_70 POWIN11,
		assessment3.quest_71 POWFA1,
		assessment3.quest_72 POWFA2,
		assessment3.quest_73 POWFA3,
		assessment3.quest_74 POWFA4,
		assessment3.quest_75 POWFA5,
		assessment3.quest_76 POWFA6,

		assessment3.quest_77 POWCOM1,
		assessment3.quest_78 POWCOM2,
		assessment3.quest_79 POWCOM3,
		assessment3.quest_80 POWCOM4,
		assessment3.quest_81 POWCOM5,
		assessment3.quest_82 POWCOM6,
		assessment3.quest_83 POWCOM7,
		assessment3.quest_84 POWCOM8,

		assessment3.quest_85 ATT1,
		assessment3.quest_86 ATT2,
		assessment3.quest_87 ATT3,
		assessment3.quest_88 ATT4,
		assessment3.quest_89 ATT5,
		assessment3.quest_90 ATT6,
		assessment3.quest_91 ATT7,
		assessment3.quest_92 ATT8,
		assessment3.quest_93 ATT9,
		assessment3.quest_94 ATT10,
		assessment3.quest_95 ATT11,
		assessment3.quest_96 ATT12,
		assessment3.quest_97 ATT13,
		assessment3.quest_98 ATT14,
		assessment4.quest_1 BEH1,
    	assessment4.quest_2 BEH2,
		assessment4.quest_3 BEH3,
		assessment4.quest_4 BEH4,
		assessment4.quest_5 BEH5,
		assessment4.quest_6 BEH6,
		assessment4.quest_7 BEH7,
		assessment4.quest_8 BEH8,
		assessment4.quest_9 BEH9,
		assessment4.quest_10 BEH10,
		assessment4.quest_11 BEH11,
		assessment4.quest_12 BEH12,
		assessment4.quest_13 BEH13,
		assessment4.quest_14 BEH14,
		assessment4.quest_15 BEH15,
		assessment4.quest_16 BEH16,
		assessment4.quest_17 BEH17,
		assessment4.quest_18 BEH18,
		assessment4.quest_19 BEH19,
		assessment4.quest_20 BEH20,
		assessment4.quest_21 BEH21,
		assessment4.quest_22 BEH22,
		assessment4.quest_23 BEH23
		");
		$this->db->join('assessment1 AS assessment1', "$this->my_table.id = assessment1.ref_assessment_id", 'left');
		$this->db->join('assessment2 AS assessment2', "$this->my_table.id = assessment2.ref_assessment_id", 'left');
		$this->db->join('assessment3 AS assessment3', "$this->my_table.id = assessment3.ref_assessment_id", 'left');
		$this->db->join('assessment4 AS assessment4', "$this->my_table.id = assessment4.ref_assessment_id", 'left');
		$this->db->join('provinces AS provinces', "provinces.id = assessment1.province_id", 'left');

		// echo $this->db->last_query();

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
			'assessment_code' => $post['assessment_code'], 'draf' => $post['draf']
		);

		if (!empty($data)) {
			$id = checkEncryptData($post['encrypt_id']);
			$this->set_table_name($this->my_table);
			$this->set_where("$this->my_table.id = $id");
			return $this->update_record($data);
		} else {
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


	public function set_running_number($field)
	{
		$running_number = '';
		$options = $this->running_options[$field];
		$format	= $options['format'];
		$type	= $options['type']; //Don't Trim() value from TYPE
		$digit	= $options['digit'];

		$year = substr(date('Y') + 543, -2);
		$month = date('m');
		$sql_cond = '';
		if ($format == 1) { //{PO}YYMMNNNNN
			$prefix = $type . $year . $month;
			$len = mb_strlen($prefix, 'utf-8');
			$sql_cond = "LEFT($field, $len) = '$prefix'";
		} elseif ($format == 2) { //YYMM{PO}NNNNN
			$prefix = $year . $month . $type;
			$len = mb_strlen($prefix, 'utf-8');
			$sql_cond = "LEFT($field, $len) = '$prefix'";
		} elseif ($format == 3) { //{PO}NNNNN/YY
			$len = mb_strlen($type, 'utf-8');
			$sql_cond = "LEFT($field, $len) = '$type' AND SUBSTRING_INDEX($field, '/', -1) = '$year'";
		} elseif ($format == 4) { //YY{PO}NNNNN
			$prefix = $year . $type;
			$len = mb_strlen($prefix, 'utf-8');
			$sql_cond = "LEFT($field, $len) = '$prefix'";
		} elseif ($format == 5) { //{PO}NNNNN
			$prefix = $type;
			$len = mb_strlen($prefix, 'utf-8');
			$sql_cond = "LEFT($field, $len) = '$prefix'";
		}
		$this->set_table_name($this->my_table);
		$this->set_where("$sql_cond");
		$this->set_order_by("LENGTH($field) DESC, $field DESC");
		$this->set_limit(1);
		$row = $this->load_record();
		$last_number = 0;
		if (!empty($row)) {
			$last_number = $row[$field];
		}

		$max_id = substr($last_number, -$digit);
		$max_id = (int)$max_id + 1;
		$next_id = substr('00000000' . $max_id, -$digit);

		switch ($format) {
			case 1:
				$running_number = $type . $year . $month . $next_id;
				break;
			case 2:
				$running_number = $year . $month . $type . $next_id;
				break;
			case 3:
				$running_number = $type . $next_id . '/' . $year;
				break;
			case 4:
				$running_number = $year . $type . $next_id;
				break;
			case 5:
				$running_number = $type . $next_id;
				break;
		}
		return $running_number;
	}


	public function search_table($table, $conditions)
	{
		if ($conditions['search_value'] == '') {
			return array();
		}
		$this->set_table_name($table);
		$field1 = $conditions['field_value'];
		$field2 = $conditions['field_text'];
		$field_condition = $conditions['field_condition'];

		if (is_array($field1)) {
			$all_field1 = implode(',', $field1);
			$field1 = "CONCAT_WS(' ', $all_field1) AS field_value";
		} else {
			$field1 = "$field1 AS field_value";
		}

		if (is_array($field2)) {
			$all_field2 = implode(',', $field2);
			$field2 = "CONCAT_WS(' ', $all_field2) AS field_title";
		} else {
			$field2 = "$field2 AS field_title";
		}

		if (is_array($field_condition)) {
			$all_field = implode(',', $field_condition);
			$field_condition =  "CONCAT_WS('', $all_field)";
		}
		$select = "$field1, $field2, $field_condition AS field_search";

		$search_value = $conditions['search_value'];

		$search_string = "";
		$search_method = "";
		switch ($conditions['search_method']) {
			case 'equal':
				$single_qoute = "'";
				if ($search_value[0] == "0") {
					$single_qoute = "'";
				} else {
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