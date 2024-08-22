<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * [ Controller File name : Assessment.php ]
 */
class AssessmentV2 extends CRUD_Controller
{

	private $per_page;
	private $another_js;
	private $another_css;

	public function __construct()
	{
		parent::__construct();
		$this->per_page = 30;

		$this->import_year = 0;

		$this->num_links = 6;
		$this->uri_segment = 4;
		$this->load->model('import/Assessment_model', 'Assessment');
		$this->Assessment->session_name = 'import_assessment';

		$this->data['page_url'] = site_url('import/assessment');

		$this->data['page_title'] = 'ONCB';

		$js_url = 'assets/js_modules/import/assessment.js?ft=' . filemtime('assets/js_modules/import/assessment.js');
		$this->another_js .= '<script src="' . base_url($js_url) . '"></script>';
	}

	// ------------------------------------------------------------------------

	/**
	 * Index of controller
	 */
	public function index()
	{
		$this->list_all();
	}

	// ------------------------------------------------------------------------

	/**
	 * Render this controller page
	 * @param String path of controller
	 * @param Integer total record
	 */
	protected function render_view($path)
	{
		$this->data['top_navbar'] = $this->parser->parse('template/sb-admin-bs4/top_navbar_view', $this->top_navbar_data, TRUE);
		$this->data['left_sidebar'] = $this->parser->parse('template/sb-admin-bs4/left_sidebar_view', $this->left_sidebar_data, TRUE);
		$this->data['breadcrumb_list'] = $this->parser->parse('template/sb-admin-bs4/breadcrumb_view', $this->breadcrumb_data, TRUE);
		$this->data['page_content'] = $this->parser->parse_repeat($path, $this->data, TRUE);
		$this->data['another_css'] = $this->another_css;
		$this->data['another_js'] = $this->another_js;
		$this->data['utilities_file_time'] = filemtime('assets/js/ci_utilities.js');
		$this->parser->parse('template/sb-admin-bs4/homepage_view', $this->data);
	}

	/**
	 * Set up pagination config
	 * @param String path of controller
	 * @param Integer total record
	 */
	public function create_pagination($page_url, $total)
	{
		$this->load->library('pagination');
		$config['base_url'] = $page_url;
		$config['total_rows'] = $total;
		$config['per_page'] = $this->per_page;
		$config['num_links'] = $this->num_links;
		$config['uri_segment'] = $this->uri_segment;
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	// ------------------------------------------------------------------------

	/**
	 * List all record 
	 */
	public function list_all()
	{
		$this->session->unset_userdata($this->Assessment->session_name . '_search_field');
		$this->session->unset_userdata($this->Assessment->session_name . '_value');

		$this->search();
	}

	// ------------------------------------------------------------------------

	/**
	 * Search data
	 */
	public function search()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำเข้าไฟล์ข้อมูล', 'class' => 'active', 'url' => '#'),
		);
		if (isset($_POST['submit'])) {
			$search_field =  $this->input->post('search_field', TRUE);
			$value = $this->input->post('txtSearch', TRUE);
			$arr = array($this->Assessment->session_name . '_search_field' => $search_field, $this->Assessment->session_name . '_value' => $value);
			$this->session->set_userdata($arr);
		} else {
			$search_field = $this->session->userdata($this->Assessment->session_name . '_search_field');
			$value = $this->session->userdata($this->Assessment->session_name . '_value');
		}

		$start_row = $this->uri->segment($this->uri_segment, '0');
		if (!is_numeric($start_row)) {
			$start_row = 0;
		}
		$per_page = $this->per_page;
		$order_by =  $this->input->post('order_by', TRUE);
		if ($order_by != '') {
			$arr = explode('|', $order_by);
			$field = $arr[0];
			$sort = $arr[1];
			switch ($sort) {
				case 'asc':
					$sort = 'ASC';
					break;
				case 'desc':
					$sort = 'DESC';
					break;
				default:
					$sort = 'DESC';
					break;
			}
			$this->Assessment->order_field = $field;
			$this->Assessment->order_sort = $sort;
		}
		$results = $this->Assessment->read($start_row, $per_page);
		$total_row = $results['total_row'];
		$search_row = $results['search_row'];
		$list_data = $this->setDataListFormat($results['list_data'], $start_row);


		$page_url = site_url('import/assessment');
		$pagination = $this->create_pagination($page_url . '/search', $search_row);
		$end_row = $start_row + $per_page;
		if ($search_row < $per_page) {
			$end_row = $search_row;
		}

		if ($end_row > $search_row) {
			$end_row = $search_row;
		}

		$this->data['data_list']	= $list_data;
		$this->data['search_field']	= $search_field;
		$this->data['txt_search']	= $value;
		$this->data['current_path_uri'] = uri_string();
		$this->data['current_page_offset'] = $start_row;
		$this->data['start_row']	= $start_row + 1;
		$this->data['end_row']	= $end_row;
		$this->data['order_by']	= $order_by;
		$this->data['total_row']	= $total_row;
		$this->data['search_row']	= $search_row;
		$this->data['page_url']	= $page_url;
		$this->data['pagination_link']	= $pagination;
		$this->data['csrf_protection_field']	= insert_csrf_field(true);

		$this->render_view('import/assessment/list_view');
	}

	// ------------------------------------------------------------------------

	/**
	 * Preview Data
	 * @param String encrypt id
	 */
	public function preview($encrypt_id = "")
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment', 'url' => site_url('import/assessment')),
			array('title' => 'แสดงข้อมูลรายละเอียด', 'url' => '#', 'class' => 'active')
		);
		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแสดงข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->setPreviewFormat($results);
				$this->render_view('import/assessment/preview_view');
			}
		}
	}


	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	/**
	 * Add form
	 */
	public function add()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment', 'url' => site_url('import/assessment')),
			array('title' => 'เพิ่มข้อมูล', 'url' => '#', 'class' => 'active')
		);
		$this->data['provinces_province_id_option_list'] = $this->Assessment->returnOptionList("provinces", "id", "name_th");
		$this->render_view('import/assessment/add_view');
	}

	// ------------------------------------------------------------------------


	public function import_excel_form()
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำเข้าข้อมูลด้วย Excel', 'url' => '#', 'class' => 'active')
		);

		$this->data['start_row'] = 2;
		$this->render_view('import/assessment/addnew_import_formV2');
	}

	public function importFile()
	{

		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'นำเข้าไฟล์ข้อมูล (Import)', 'url' => site_url('import/assessment')),
			array('title' => 'นำข้อมูลด้วย Excel', 'url' => '#', 'class' => 'active')
		);

		if ($this->input->post('submit')) {

			$path = 'assets/uploads/excel_file/';
			require_once APPPATH . "/third_party/PHPExcel.php";
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls|csv';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$import_year = $this->input->post('import_year');

			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if (empty($error)) {
				if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;

				try {

					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);

					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i = 0;

					// print_r($allDataInSheet);
					foreach ($allDataInSheet as $value) {
						if ($flag) {
							$flag = false;
							continue;
						}


						$t = time();
						$data = array(
							'assessment_code' => $t . $i, 'create_date' => date('Y-m-d'), 'import_year_data' => $import_year
						);

						$this->db->insert('assessment_form', $data);
						//ดึงข้อมูลล่าสุดจากที่ insert เอามาเป็น PK เพื่อยัดลงไปใน Table อื่นๆ 
						$ref_assessment_id = $this->db->insert_id();


						$index_kay = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

						if ($ref_assessment_id != '') {

							$inserdata[$i]['ref_assessment_id'] = $ref_assessment_id;
							$inserdata2[$i]['ref_assessment_id'] = $ref_assessment_id;
							$inserdata3[$i]['ref_assessment_id'] = $ref_assessment_id;
							$inserdata4[$i]['ref_assessment_id'] = $ref_assessment_id;

							$name_th = $value['A'];
							if ($name_th != 'กทม') {
								$section_row = $this->db->query("SELECT section FROM `province_map` WHERE province_name = '$name_th' ")->row();
								if (isset($section_row)) {
									$inserdata[$i]["section"]  = $section_row->section;
								} else {
									$inserdata[$i]["section"]  = '0';
								}
							} else {
								$inserdata[$i]["section"]  = '0';
							}

							$province_row = $this->db->query("SELECT `id`, `code`, `name_th`, `name_en` FROM `provinces` WHERE name_th = '$name_th' ")->row();
							if (isset($province_row)) {
								$inserdata[$i]["province_id"]  = $province_row->id;
							} else {
								$inserdata[$i]["province_id"] = null;
							}

							$inserdata[$i]["question_1"]  = $value['C']; //1. เพศ
							$inserdata[$i]["question_2"]  = $value['D']; //2. อายุ(ปี)
							$inserdata[$i]["question_3"]  = $value['E']; // 3. สถานภาพการศึกษา
							$inserdata[$i]["question_4"]  = $value['F']; // 4. ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่	
							$inserdata[$i]["question_5"]  = $value['G']; //5. จำนวนพี่น้อง
							$inserdata[$i]["question_6"]  = 'null'; // ระบุจำนวนพี่น้อง
							$inserdata[$i]["question_7"]  = $value['H']; // 6. สถานภาพทางครอบครัว
							$inserdata[$i]["question_8"]  = $value['I']; // 7. อาชีพของบิดา
							$inserdata[$i]["question_9"]  = 'null'; // กรุณากรอก
							$inserdata[$i]["question_10"]  = $value['J']; // 8. อาชีพของมารดา
							$inserdata[$i]["question_11"]  = 'null'; // กรุณากรอก
							$inserdata[$i]["question_12"]  = $value['K']; // 9.รายได้ของครอบครัว
							$inserdata[$i]["question_13"]  = $value['L']; // 10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง	
							$inserdata[$i]["question_14"]  = 'null'; // กรุณากรอก
							$inserdata[$i]["question_15"]  = $value['M']; // 11. ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่
							$inserdata[$i]["question_16"]  = $value['N']; // 12. ท่านเคยลองใช้สารเสพติดใดบ้าง
							$inserdata[$i]["question_17"]  = $value['O']; // กรุณากรอก

							// 2 มีจำนวน 1-114		
							$inserdata2[$i]["quest_1"]  = $value['P'];
							$inserdata2[$i]["quest_2"]  = $value['Q'];
							$inserdata2[$i]["quest_3"]  = $value['R'];
							$inserdata2[$i]["quest_4"]  = $value['S'];
							$inserdata2[$i]["quest_5"]  = $value['T'];
							$inserdata2[$i]["quest_6"]  = $value['U'];
							$inserdata2[$i]["quest_7"]  = $value['V'];
							$inserdata2[$i]["quest_8"]  = $value['W'];
							$inserdata2[$i]["quest_9"]  = $value['X'];
							$inserdata2[$i]["quest_10"]  = $value['Y'];
							$inserdata2[$i]["quest_11"]  = $value['Z'];
							// loop  
							$r = 12;
							foreach ($index_kay as $cell) {
								$inserdata2[$i]["quest_$r"] = $value["A$cell"];
								$r = $r + 1;
							}

							foreach ($index_kay as $cell) {
								$inserdata2[$i]["quest_$r"] = $value["B$cell"];
								$r = $r + 1;
							}

							foreach ($index_kay as $cell) {
								$inserdata2[$i]["quest_$r"] = $value["C$cell"];
								$r = $r + 1;
							}

							foreach ($index_kay as $cell) {
								$inserdata2[$i]["quest_$r"] = $value["D$cell"];
								$r = $r + 1;
							}

							foreach ($index_kay as $cell) {
								if ($r <= 114) {
									$inserdata2[$i]["quest_$r"] = $value["E$cell"];
									$r = $r + 1;
								}
							}

							// assessment3  quest 1- 98
							$index_key_u_z = array('S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
							$index_key_a_r = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'M', 'N', 'O', 'P');
							$index_kay_a_z = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');


							$r = 0;
							foreach ($index_key_u_z as $cell) {
								$r = $r + 1;
								$inserdata3[$i]["quest_$r"] = $value["E$cell"];
							}
							// FA - AZ
							foreach ($index_kay_a_z as $cell) {
								$r = $r + 1;
								$inserdata3[$i]["quest_$r"] = $value["F$cell"];
							}
							// GA - GZ
							foreach ($index_kay_a_z as $cell) {
								$r = $r + 1;
								$inserdata3[$i]["quest_$r"] = $value["G$cell"];
							}

							// HA - HZ
							foreach ($index_kay_a_z as $cell) {
								$r = $r + 1;
								$inserdata3[$i]["quest_$r"] = $value["H$cell"];
							}
							// IA - IR
							foreach ($index_key_a_r as $cell) {
								$r = $r + 1;
								$inserdata3[$i]["quest_$r"] = $value["I$cell"];
							}

							// assessment4  quest 1- 23
							$index_kay_t_z = array('T', 'U', 'V', 'W', 'X', 'Y', 'Z');
							$index_kay_i_p = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P');
							$r  = 0;
							foreach ($index_kay_t_z as $cell) {
								$r = $r + 1;
								$inserdata4[$i]["quest_$r"] = $value["H$cell"];
							}

							foreach ($index_kay_i_p as $cell) {
								$r = $r + 1;
								$inserdata4[$i]["quest_$r"] = $value["I$cell"];
							}
						}

						$i++;
					}


					// insert data table 1 
					$result = $this->Assessment->importData('assessment1', $inserdata);
					if ($result) {
						// echo "Imported successfully";
						$result = $this->Assessment->importData('assessment2', $inserdata2);
						if ($result) {
							// echo "Imported successfully";
							$result = $this->Assessment->importData('assessment3', $inserdata3);
							if ($result) {
								$result = $this->Assessment->importData('assessment4', $inserdata4);
								if ($result) {
									$this->data["upload_status"] =  '<div class="alert alert-success">
									<a href="#" class="close" data-dismiss="alert">&times;</a>
									<strong>File Upload Successfully </strong>
									</div>';
								} else {
									echo "assessment3 ERROR !";
								}
							} else {
								echo "assessment3 ERROR !";
							}
						} else {
							echo "assessment2 ERROR !";
						}
					} else {
						echo "assessment1 ERROR !";
					}
				} catch (Exception $e) {
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
						. '": ' . $e->getMessage());
				}
			} else {
				echo $error['error'];
			}
		}
		$this->render_view('import/assessment/addnew_import_form');
	}

	public function read_excel()
	{
		// load excel library
		$this->load->library('import/Excel');
		$config['upload_path']   = './uploads/excel_file';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 100;
		$this->load->library('upload', $config);

		$table_list = '';
		$success = FALSE;
		$message = '';

		if (!$this->upload->do_upload('FileUpload')) {
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('upload_form', $error);
		} else {
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('upload_success', $data);
		}


		// 	$deniedExts = array("exe", "bat", "inf", "pif", "com", "scr", "vbs", "html", "asp", "php");
		// 	$ext = explode(".", $fileName);
		// 	$extension = end($ext);
		// 	if (!in_array($extension, $deniedExts)) {
		// 		if ($_FILES["FileUpload"]["error"] > 0) {
		// 			$filesError = array(
		// 				"There is no error, the file uploaded with success",
		// 				"The uploaded file exceeds the upload_max_filesize directive in php.ini",
		// 				"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
		// 				"The uploaded file was only partially uploaded",
		// 				"No file was uploaded",
		// 				"Missing a temporary folder"
		// 			);
		// 			$errorMsg = isset($filesError[$_FILES["FileUpload"]["error"]]) ? $filesError[$_FILES["FileUpload"]["error"]] : '';
		// 			$message = "เกิดข้อผิดพลาด : " . $errorMsg;
		// 		} else {

		// 			$inputFileType = PHPExcel_IOFactory::identify($fileTmp);
		// 			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		// 			$objPHPExcel = $objReader->load($fileTmp);

		// 			$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
		// 			$highestRow = $objWorksheet->getHighestRow();
		// 			$highestColumn = $objWorksheet->getHighestColumn();

		// 			$startRow = $this->input->post('start_row', true);

		// 			$report_year = $this->input->post('import_year', true);

		// 			// echo $report_year ;
		// 			$_SESSION['import_year'] = $report_year;

		// 			$dataRow = $objWorksheet->rangeToArray('A' . $startRow . ':' . $highestColumn . $highestRow, null, true, true, true);


		// 			// อยากเข้าใจไปดูการใช้งาน Array 
		// 			$fieldName = array();
		// 			$fieldName[0] = 'province_id';
		// 			$fieldName[1] = 'section';
		// 			//table 1
		// 			// read from cell province	section	1. Sex	2. Age	3. Edu1	4. Edu2	5. sisbro	6. family	7. Dad Job	8. Mom Job	9. earn	10. C1	11. try	12. D1	12. D12 (อื่นๆ)
		// 			$array_row = 2;
		// 			for ($i = 1; $i <= 15; $i++) {
		// 				$fieldName[$array_row] = 'question_' . ($i);
		// 				$array_row = $array_row + 1;
		// 			}

		// 			//table 2 2.1 การบริหารจัดการตน จำนวน 48 ข้อ
		// 			// for ($i = 1; $i <= 48; $i++) {
		// 			// 	$fieldName[$array_row] = 'quest_' . ($i);
		// 			// 	$array_row = $array_row + 1;
		// 			// }

		// 			// // 2.2  ทุนทางจิต  จำนวน 26 ข้อ
		// 			// for ($i = 49; $i <= 74; $i++) {
		// 			// 	$fieldName[$array_row] = 'quest_' . ($i);
		// 			// 	$array_row = $array_row + 1;
		// 			// }

		// 			// // 2.3  การเห็นคุณค่าในตนเอง  จำนวน  25 ข้อ
		// 			// for ($i = 75; $i <= 100; $i++) {
		// 			// 	$fieldName[$array_row] = 'quest_' . ($i);
		// 			// 	$array_row = $array_row + 1;
		// 			// }

		// 			// // 2.4  พลังตัวตน  จำนวน 15 ข้อ
		// 			// for ($i = 101; $i <= 115; $i++) {
		// 			// 	$fieldName[$array_row] = 'quest_' . ($i);
		// 			// 	$array_row = $array_row + 1;
		// 			// }



		// 			if (!empty($dataRow)) {
		// 				$success = TRUE;
		// 				$no = 0;
		// 				foreach ($dataRow as $row_data) {
		// 					if (empty(array_filter($row_data))) {
		// 						continue;
		// 					}
		// 					$no++;
		// 					$table_list .= '<tr>';
		// 					$table_list .= '<td>' . $no . '<input name="insert_excel[' . $no . ']" value="' . $no . '" type="hidden" /></td>';
		// 					$col = 0;
		// 					foreach ($row_data as $td_data) {
		// 						if (isset($fieldName[$col])) {
		// 							$field_name = $fieldName[$col];

		// 							$class_bg = '';
		// 							$td_data = trim($td_data);
		// 							$check_value = $td_data;
		// 							$table_list .= '<td' . $class_bg . '>' . $td_data;
		// 							$table_list .= '<input name="' . $field_name . '[' . $no . ']" value="' . $check_value . '" type="hidden" />';
		// 							$table_list .= '</td>';
		// 						}
		// 						$col++;
		// 					}
		// 					$table_list .= '</tr>';
		// 				}
		// 				$table_list = htmlspecialchars($table_list);
		// 			} else {
		// 				$message = 'ไม่พบข้อมูลในไฟล์ ' .  $fileName;
		// 			}
		// 		}
		// 	} else {
		// 		$message = 'ไม่อนุญาติให้อัพโหลดไฟล์ *.' . $extension . 'เข้าระบบครับ';
		// 	}
		// }

		// $json = json_encode(array(
		// 	'is_successful' => $success,
		// 	'message' => $message,
		// 	'table_list' => $table_list
		// ), ENT_QUOTES);

		// echo $json;


	}

	public function adding()
	{
		$data = array(
			'file' => $this->input->post('file')
		);

		$status = "";
		$msg = "";
		$file_element_name = $data['file'];
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = 1024 * 8;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($file_element_name)) {
			$status = 'error';
			$msg = $this->upload->display_errors('', '');
		} else {
			$data = $this->upload->data();
			//$data['file_name']
			$status = "success";
			$msg = "File successfully uploaded";
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));

		// //img2
		// if (!$this->upload->do_upload('p_img2')) {
		// 	$p_img2 = '';
		// } else {
		// 	$fileData2 = $this->upload->data();
		// 	$p_img2 = $data['p_img2'] = $fileData2['file_name'];
		// }

		// //insert to table
		// $datatotable = array(
		// 	'p_img1' => $p_img1,
		// 	'p_img2' => $p_img2
		// );
		// $result = $this->db->insert('products', $datatotable);

		if ($result) {
			echo 'insert ok';
		} else {
			echo 'wrong';
		}
	}


	public function save_excel_data()
	{
		$post_data = $this->input->post(NULL, TRUE);


		if (!empty($post_data['insert_excel'])) {

			$insert_data1 = array();
			$insert_data2 = array();
			$insert_data3 = array();
			$data_row = 0;

			foreach ($post_data['insert_excel'] as $index => $no) {
				// create data from
				$data_row = $data_row + 1;
				$t = time();

				$data = array(
					'assessment_code' => $t . $data_row, 'create_date' => date('Y-m-d')
					// , 'import_year_data' => $_SESSION['import_year']
				);
				$this->db->insert('assessment_form', $data);
				//ดึงข้อมูลล่าสุดจากที่ insert เอามาเป็น PK เพื่อยัดลงไปใน Table อื่นๆ 
				$ref_assessment_id = $this->db->insert_id();
				// insert data table assetment1 

				$insert_data1[] = array();
				$insert_data1["ref_assessment_id"]  = $ref_assessment_id;
				$name_th = $post_data["province_id"][$index];
				if ($name_th != 'กทม') {
					$section_row = $this->db->query("SELECT section FROM `province_map` WHERE province_name = '$name_th' ")->row();
					if (isset($section_row)) {
						$insert_data1["section"]  = $section_row->section;
					} else {
						$insert_data1["section"]  = '0';
					}
				} else {
					$insert_data1["section"]  = '0';
				}


				$province_row = $this->db->query("SELECT `id`, `code`, `name_th`, `name_en` FROM `provinces` WHERE name_th = '$name_th' ")->row();
				if (isset($province_row)) {
					$insert_data1["province_id"]  = $province_row->id;
				}

				for ($i = 1; $i <= 15; $i++) {
					$temp_data = $post_data["question_$i"][$index];
					if ($temp_data != '') {
						$insert_data1["question_$i"]  = $post_data["question_$i"][$index];
					}
				}

				$insert_data1[] = $data;


				$this->db->insert('assessment1', $data);

				// 2.2  การบริหารจัดการตน 1-48			
				$data = array();
				$data["ref_assessment_id"]  = $ref_assessment_id;
				for ($i = 1; $i <= 48; $i++) {
					$data["quest_$i"]  = $post_data["quest_$i"][$index];
				}

				//2.2  ทุนทางจิต  จำนวน 26 ข้อ
				for ($i = 49; $i <= 74; $i++) {
					$data["quest_$i"]  = $post_data["quest_$i"][$index];
				}

				// 2.3  การเห็นคุณค่าในตนเอง  จำนวน  25 ข้อ
				for ($i = 75; $i <= 100; $i++) {
					$data["quest_$i"]  = $post_data["quest_$i"][$index];
				}

				// 2.4  พลังตัวตน  จำนวน 15 ข้อ
				for ($i = 101; $i <= 114; $i++) {
					$data["quest_$i"]  = $post_data["quest_$i"][$index];
				}
				$this->db->insert('assessment2', $data);

				// 3.1  การคล้อยตาม จำนวน 8 ข้อ 
				$data = array();
				$data["ref_assessment_id"]  = $ref_assessment_id;
				$table_field_row = 0;
				for ($i = 116; $i <= 123; $i++) {
					$table_field_row = $table_field_row + 1;

					$data_temp = $post_data["quest_$table_field_row"][$index];
					if ($data_temp != '') {
						$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
					}
				}

				// 3.2  ครอบครัว  จำนวน 22  ข้อ
				// for ($i = 124; $i <= 145; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// // 3.3 การเป็นแบบอย่าง 
				// for ($i = 146; $i <= 161; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// // 3.4  การเปิดรับสื่อ  จำนวน 4  ข้อ
				// for ($i = 162; $i <= 165; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// //  3.5.1 พลังครอบครัว  จำนวน 8  ข้อ
				// for ($i = 166; $i <= 173; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// // 3.5.2 พลังสร้างปัญญา  จำนวน 11  ข้อ
				// for ($i = 174; $i <= 184; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// // 3.5.3 พลังเพื่อนและกิจกรรม  จำนวน 6  ข้อ
				// for ($i = 185; $i <= 190; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// // 3.5.4 พลังชุมชน  จำนวน 8  ข้อ*
				// for ($i = 191; $i <= 198; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// // 3.6 เจตคติและการรับรู้แหล่ง  จำนวน 15  ข้อ
				// for ($i = 199; $i <= 213; $i++) {
				// 	$table_field_row = $table_field_row + 1;
				// 	$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				// }

				// $this->db->insert('assessment3', $data);
				// ตอนที่ 4 พฤติกรรมเสี่ยง
				$data = array();
				$data["ref_assessment_id"]  = $ref_assessment_id;
				$table_field_row = 0;
				for ($i = 214; $i <= 236; $i++) {
					$table_field_row = $table_field_row + 1;
					$data["quest_$table_field_row"]  = $post_data["quest_$table_field_row"][$index];
				}

				$this->db->insert('assessment4', $data);
			}

			// $num_rows = $this->Assessment->save_excel_data('assessment1',$insert_data1);

			// $num_rows = $this->Assessment->save_excel_data($insert_data1);
			// if ($num_rows) {
			$success = TRUE;
			$message = '<strong>นำเข้าข้อมูลเรียบร้อย ' . $data_row . ' รายการ</strong>';
			// } else {
			// 	$success = FALSE;
			$message = 'Error : ' . $this->Assessment->error_message;
			// }
		} else {
			$success = FALSE;
			$message = 'ไม่พบข้อมูลในแบบฟอร์มที่บันทึก';
		}

		$json = array(
			'is_successful' => $success,
			'message' =>  $message
		);

		echo json_encode($json);
	}

	public function multiple_select($value, $name)
	{
		$arr_choice = $this->input->post($name . '[]');
		if (!empty($arr_choice)) {
			$arr_choice = array_filter($arr_choice, function ($v) {
				return $v !== '';
			});
		}
		if (empty($arr_choice)) :
			return false;
		endif;
	}


	function maparea($province_name)
	{
		$query = $this->db->query("select section from province_map where province_name = '" . $province_name . "' ");
		$row = $query->row();
		if (isset($row)) {
			return $row->section;
		} else {
			return 0;
		}
	}

	/**
	 * Default Validation
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', '1.เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('question_2', '2.อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', '3.สถานภาพการศึกษา[1=1.ศึกษาอยู่,2=2. ไม่ได้ศึกษา]', 'trim|required|is_natural');
		$frm->set_rules('question_4', '4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่', 'trim|required|is_natural');
		$frm->set_rules('question_5', '5.จำนวนพี่น้อง[1=1. เป็นลูกคนเดียว,2=2. มีพี่น้องรวมทั้งหมด]', 'trim|required|is_natural');
		$frm->set_rules('question_6', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_7', '6.สถานภาพทางครอบครัว[1=1. บิดามารดาอยู่ด้วยกัน,2=2. บิดามารดาแยกกันอยู่,3=3. บิดาเสียชีวิตแล้ว,4=4. มารดาเสียชีวิตแล้ว,5=5. บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required|is_natural');
		$frm->set_rules('question_8', '7.อาชีพของบิดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required|is_natural');
		$frm->set_rules('question_9', '8. อาชีพของมารดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required');
		$frm->set_rules('question_10', '10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[question_10]');
		$frm->set_rules('question_11', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_12', '11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required|is_natural');
		$frm->set_rules('question_13', '12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=7,8=8,9=9,10=10,11=11,12=อื่น ๆ โปรดระบุ]', 'trim|required');
		$frm->set_rules('question_14', 'กรุณากรอก', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province_id');
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			$message .= form_error('question_4');
			$message .= form_error('question_5');
			$message .= form_error('question_6');
			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_9');
			$message .= form_error('question_10');
			$message .= form_error('question_11');
			$message .= form_error('question_12');
			$message .= form_error('question_13');
			$message .= form_error('question_14');
			return $message;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Default Validation for Update
	 * see also https://www.codeigniter.com/userguide3/libraries/form_validation.html
	 */
	public function formValidateUpdate()
	{
		$this->load->library('form_validation');
		$frm = $this->form_validation;

		$frm->set_rules('province_id', 'จังหวัด', 'trim|required|is_natural');
		$frm->set_rules('question_1', '1.เพศ[1=ชาย,2=หญิง]', 'trim|required|is_natural');
		$frm->set_rules('question_2', '2.อายุ', 'trim|required|is_natural');
		$frm->set_rules('question_3', '3.สถานภาพการศึกษา[1=1.ศึกษาอยู่,2=2. ไม่ได้ศึกษา]', 'trim|required|is_natural');
		$frm->set_rules('question_4', '4.ระดับการศึกษาปัจจุบัน ชั้นมัธยมศึกษาปีที่', 'trim|required|is_natural');
		$frm->set_rules('question_5', '5.จำนวนพี่น้อง[1=1. เป็นลูกคนเดียว,2=2. มีพี่น้องรวมทั้งหมด]', 'trim|required|is_natural');
		$frm->set_rules('question_6', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_7', '6.สถานภาพทางครอบครัว[1=1. บิดามารดาอยู่ด้วยกัน,2=2. บิดามารดาแยกกันอยู่,3=3. บิดาเสียชีวิตแล้ว,4=4. มารดาเสียชีวิตแล้ว,5=5. บิดาและมารดาเสียชีวิตแล้ว]', 'trim|required|is_natural');
		$frm->set_rules('question_8', '7.อาชีพของบิดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required|is_natural');
		$frm->set_rules('question_9', '8. อาชีพของมารดา[1=1,2=2,3=3,4=4,5=5,6=6,7=อื่น ๆ]', 'trim|required');
		$frm->set_rules('question_10', '10. เมื่อท่านมีปัญหาท่านปรึกษาใครบ้าง (ตอบได้มากกว่า 1 ข้อ)', 'trim|callback_multiple_select[question_10]');
		$frm->set_rules('question_11', 'กรุณากรอก', 'trim|required');
		$frm->set_rules('question_12', '11.ท่านเคยถูกให้ลองเสพสารเสพติดหรือไม่[1=เคย,2=ไม่เคย]', 'trim|required|is_natural');
		$frm->set_rules('question_13', '12. ท่านเคยลองใช้สารเสพติดใดบ้าง (ตอบได้มากกว่า 1 ข้อ)[1=1,2=2,3=3,4=4,5=5,6=6,7=7,8=8,9=9,10=10,11=11,12=อื่น ๆ โปรดระบุ]', 'trim|required');
		$frm->set_rules('question_14', 'กรุณากรอก', 'trim|required');

		$frm->set_message('required', '- กรุณากรอก %s');
		$frm->set_message('is_natural', '- %s ต้องระบุตัวเลขจำนวนเต็ม');
		$frm->set_message('multiple_select', '- %s เลือกอย่างน้อย 1 ตัวเลือก');

		if ($frm->run() == FALSE) {
			$message  = '';
			$message .= form_error('province_id');
			$message .= form_error('question_1');
			$message .= form_error('question_2');
			$message .= form_error('question_3');
			$message .= form_error('question_4');
			$message .= form_error('question_5');
			$message .= form_error('question_6');
			$message .= form_error('question_7');
			$message .= form_error('question_8');
			$message .= form_error('question_9');
			$message .= form_error('question_10');
			$message .= form_error('question_11');
			$message .= form_error('question_12');
			$message .= form_error('question_13');
			$message .= form_error('question_14');
			return $message;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Create new record
	 */
	public function save()
	{

		$message = '';
		$message .= $this->formValidate();
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$post = $this->input->post(NULL, TRUE);

			$encrypt_id = '';
			$post['question_10'] = implode(',', $post['question_10']);
			$id = $this->Assessment->create($post);
			if ($id != '') {
				$success = TRUE;
				$encrypt_id = ci_encrypt($id);
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>';
			} else {
				$success = FALSE;
				$message = 'Error : ' . $this->Assessment->error_message;
			}

			$json = json_encode(array(
				'is_successful' => $success,
				'encrypt_id' =>  $encrypt_id,
				'message' => $message
			));
			echo $json;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Load data to form
	 * @param String encrypt id
	 */
	public function edit($encrypt_id = '')
	{
		$this->breadcrumb_data['breadcrumb'] = array(
			array('title' => 'Assessment', 'url' => site_url('import/assessment')),
			array('title' => 'แก้ไขข้อมูล', 'url' => '#', 'class' => 'active')
		);

		$encrypt_id = urldecode($encrypt_id);
		$id = ci_decrypt($encrypt_id);
		if ($id == "") {
			$this->data['message'] = "กรุณาระบุรหัสอ้างอิงที่ต้องการแก้ไขข้อมูล";
			$this->render_view('ci_message/warning');
		} else {
			$results = $this->Assessment->load($id);
			if (empty($results)) {
				$this->data['message'] = "ไม่พบข้อมูลตามรหัสอ้างอิง <b>$id</b>";
				$this->render_view('ci_message/danger');
			} else {
				$this->data['csrf_field'] = insert_csrf_field(true);


				$this->setPreviewFormat($results);

				$this->data['record_create_datetime'] = setThaiDate($results['create_datetime']);

				$this->data['provinces_province_id_option_list'] = $this->Assessment->returnOptionList("provinces", "id", "name_th");
				$this->render_view('import/assessment/edit_view');
			}
		}
	}

	// ------------------------------------------------------------------------
	public function checkRecordKey($data)
	{
		$error = '';
		$id = ci_decrypt($data['encrypt_id']);
		if ($id == '') {
			$error .= '- รหัส id';
		}
		return $error;
	}

	/**
	 * Update Record
	 */
	public function update()
	{
		$message = '';
		$message .= $this->formValidateUpdate();
		$edit_remark = $this->input->post('edit_remark', TRUE);
		if ($edit_remark == '') {
			$message .= 'ระบุเหตุผล';
		}

		$post = $this->input->post(NULL, TRUE);
		$error_pk_id = $this->checkRecordKey($post);
		if ($error_pk_id != '') {
			$message .= "รหัสอ้างอิงที่ใช้สำหรับอัพเดตข้อมูลไม่ถูกต้อง";
		}
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {

			$post['question_10'] = implode(',', $post['question_10']);
			$result = $this->Assessment->update($post);
			if ($result == false) {
				$message = $this->Assessment->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>บันทึกข้อมูลเรียบร้อย</strong>' . $this->Assessment->error_message;
				$ok = TRUE;
			}
			$json = json_encode(array(
				'is_successful' => $ok,
				'message' => $message
			));

			echo $json;
		}
	}

	/**
	 * Delete Record
	 */
	public function del()
	{
		$delete_remark = $this->input->post('delete_remark', TRUE);
		$message = '';
		if ($delete_remark == '') {
			$message .= 'ระบุเหตุผล';
		}

		$post = $this->input->post(NULL, TRUE);
		$error_pk_id = $this->checkRecordKey($post);
		if ($error_pk_id != '') {
			$message .= "รหัสอ้างอิงที่ใช้สำหรับลบข้อมูลไม่ถูกต้อง";
		}
		if ($message != '') {
			$json = json_encode(array(
				'is_successful' => FALSE,
				'message' => $message
			));
			echo $json;
		} else {
			$result = $this->Assessment->delete($post);
			if ($result == false) {
				$message = $this->Assessment->error_message;
				$ok = FALSE;
			} else {
				$message = '<strong>ลบข้อมูลเรียบร้อย</strong>';
				$ok = TRUE;
			}
			$json = json_encode(array(
				'is_successful' => $ok,
				'message' => $message
			));
			echo $json;
		}
	}


	/**
	 * SET array data list
	 */
	private function setDataListFormat($lists_data, $start_row = 0)
	{
		$data = $lists_data;
		$count = count($lists_data);
		for ($i = 0; $i < $count; $i++) {
			$start_row++;
			$data[$i]['record_number'] = $start_row;
			$pk1 = $data[$i]['id'];
			$data[$i]['url_encrypt_id'] = urlencode(encrypt($pk1));

			if ($pk1 != '') {
				$pk1 = ci_encrypt($pk1);
			}
			$data[$i]['encrypt_id'] = $pk1;
			$data[$i]['preview_question_1'] = $this->setQuestion1Subject($data[$i]['question_1']);
			$data[$i]['preview_question_3'] = $this->setQuestion3Subject($data[$i]['question_3']);
			$data[$i]['preview_question_5'] = $this->setQuestion5Subject($data[$i]['question_5']);
			$data[$i]['preview_question_6'] = $this->setQuestion6Subject($data[$i]['question_6']);
			$data[$i]['preview_question_7'] = $this->setQuestion7Subject($data[$i]['question_7']);
			$data[$i]['preview_question_8'] = $this->setQuestion8Subject($data[$i]['question_8']);
			$data[$i]['preview_question_9'] = $this->setQuestion9Subject($data[$i]['question_9']);
			$data[$i]['preview_question_10'] = $this->setQuestion10Subject($data[$i]['question_10']);
			$data[$i]['preview_question_12'] = $this->setQuestion12Subject($data[$i]['question_12']);
			$data[$i]['preview_question_13'] = $this->setQuestion13Subject($data[$i]['question_13']);
			$data[$i]['create_datetime'] = setThaiDate($data[$i]['create_datetime']);
		}
		return $data;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion1Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ชาย';
				break;
			case 2:
				$subject = 'หญิง';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion3Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'ศึกษาอยู่';
				break;
			case 2:
				$subject = 'ไม่ได้ศึกษา';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion5Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เป็นลูกคนเดียว';
				break;
			case 2:
				$subject = 'มีพี่น้องรวมทั้งหมด';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion6Subject($value)
	{

		$subject = '';
		switch ($value) {
			case '1':
				$subject = 'บิดามารดาอยู่ด้วยกัน';
				break;
			case '2':
				$subject = 'บิดามารดาแยกกันอยู่';
				break;
		}

		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion7Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'บิดามารดาอยู่ด้วยกัน';
				break;
			case 2:
				$subject = 'บิดามารดาแยกกันอยู่';
				break;
			case 3:
				$subject = 'บิดาเสียชีวิตแล้ว';
				break;
			case 4:
				$subject = ' มารดาเสียชีวิตแล้ว';
				break;
			case 5:
				$subject = 'บิดาและมารดาเสียชีวิตแล้ว';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion8Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เกษตร';
				break;
			case 2:
				$subject = 'รับราชการ / พนักงานราชการ';
				break;
			case 3:
				$subject = 'พนักงานเอกชน';
				break;
			case 4:
				$subject = 'รัฐวิสาหกิจ';
				break;
			case 5:
				$subject = 'รับจ้างทั่วไป';
				break;
			case 6:
				$subject = 'ธุรกิจส่วนตัว';
				break;
			case 7:
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion9Subject($value)
	{

		$subject = '';
		switch ($value) {
			case '1':
				$subject = 'บิดา';
				break;
			case '2':
				$subject = 'มารดา';
				break;
			case '3':
				$subject = 'ญาติ';
				break;
			case '4':
				$subject = 'เพื่อน';
				break;
			case '5':
				$subject = 'ครู';
				break;
			case '6':
				$subject = 'คนรัก';
				break;
			case '7':
				$subject = 'อื่น ๆ';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion10Subject($multi_value)
	{
		$subject = '';
		$comma = '';
		$arr = explode(',', $multi_value);
		foreach ($arr as $value) {
			switch ($value) {
				case '1':
					$subject .= $comma .  '1';
					break;
				case '2':
					$subject .= $comma .  '2';
					break;
				case '3':
					$subject .= $comma .  '3';
					break;
				case '4':
					$subject .= $comma .  '4';
					break;
				case '5':
					$subject .= $comma .  '5';
					break;
				case '6':
					$subject .= $comma .  '6';
					break;
				case '7':
					$subject .= $comma .  'อื่น ๆ';
					break;
			}
			$comma = ', ';
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion12Subject($value)
	{
		$subject = '';
		switch ($value) {
			case 1:
				$subject = 'เคย';
				break;
			case 2:
				$subject = 'ไม่เคย';
				break;
		}
		return $subject;
	}

	/**
	 * SET choice subject
	 */
	private function setQuestion13Subject($value)
	{
		$subject = '';
		switch ($value) {
			case '1':
				$subject = '1';
				break;
			case '2':
				$subject = '2';
				break;
			case '3':
				$subject = '3';
				break;
			case '4':
				$subject = '4';
				break;
			case '5':
				$subject = '5';
				break;
			case '6':
				$subject = '6';
				break;
			case '7':
				$subject = '7';
				break;
			case '8':
				$subject = '8';
				break;
			case '9':
				$subject = '9';
				break;
			case '10':
				$subject = '10';
				break;
			case '11':
				$subject = '11';
				break;
			case '12':
				$subject = 'อื่น ๆ โปรดระบุ';
				break;
		}
		return $subject;
	}

	/**
	 * SET array data list
	 */
	private function setPreviewFormat($row_data)
	{
		$data = $row_data;

		$pk1 = $data['id'];
		$this->data['recode_url_encrypt_id'] = urlencode(encrypt($pk1));

		if ($pk1 != '') {
			$pk1 = ci_encrypt($pk1);
		}
		$this->data['encrypt_id'] = $pk1;


		$provinceIdNameTh = $this->table('provinces')->get_value('name_th')->where("id = '$data[province_id]'");
		$this->data['provinceIdNameTh'] = $provinceIdNameTh;

		$this->data['record_id'] = $data['id'];
		$this->data['record_ref_assessment_id'] = $data['ref_assessment_id'];
		$this->data['record_province_id'] = $data['province_id'];
		$this->data['preview_question_1'] = $this->setQuestion1Subject($data['question_1']);
		$this->data['record_question_1'] = $data['question_1'];
		$this->data['record_question_2'] = $data['question_2'];
		$this->data['preview_question_3'] = $this->setQuestion3Subject($data['question_3']);
		$this->data['record_question_3'] = $data['question_3'];
		$this->data['record_question_4'] = $data['question_4'];
		$this->data['preview_question_5'] = $this->setQuestion5Subject($data['question_5']);
		$this->data['record_question_5'] = $data['question_5'];
		$this->data['preview_question_6'] = $this->setQuestion6Subject($data['question_6']);
		$this->data['record_question_6'] = $data['question_6'];
		$this->data['preview_question_7'] = $this->setQuestion7Subject($data['question_7']);
		$this->data['record_question_7'] = $data['question_7'];
		$this->data['preview_question_8'] = $this->setQuestion8Subject($data['question_8']);
		$this->data['record_question_8'] = $data['question_8'];
		$this->data['preview_question_9'] = $this->setQuestion9Subject($data['question_9']);
		$this->data['record_question_9'] = $data['question_9'];
		$this->data['preview_question_10'] = $this->setQuestion10Subject($data['question_10']);
		$this->data['record_question_10'] = $data['question_10'];
		$this->data['record_question_11'] = $data['question_11'];
		$this->data['preview_question_12'] = $this->setQuestion12Subject($data['question_12']);
		$this->data['record_question_12'] = $data['question_12'];
		$this->data['preview_question_13'] = $this->setQuestion13Subject($data['question_13']);
		$this->data['record_question_13'] = $data['question_13'];
		$this->data['record_question_14'] = $data['question_14'];
		$this->data['record_question_15'] = $data['question_15'];
		$this->data['record_question_16'] = $data['question_16'];
		$this->data['record_question_17'] = $data['question_17'];
		$this->data['record_create_datetime'] = $data['create_datetime'];

		$this->data['record_create_datetime'] = setThaiDate($data['create_datetime']);
	}

	public function export_excel()
	{
		// load excel library
		$this->load->library('import/Excel');

		$results = $this->Assessment->read();
		$data_lists = $this->setDataListFormat($results['list_data'], 0);

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		// set Header ***** SECTION 1 ***** 
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'จังหวัด');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', '1.เพศ');

		// END SECTION 1

		// set header bold
		$objPHPExcel->getActiveSheet()->getStyle("A1:C1")->getFont()->setBold(true);

		// set Row
		$rowCount = 2;
		foreach ($data_lists as $row) {

			// ***** SECTION 2 *****

			$sheet = $objPHPExcel->getActiveSheet();
			$sheet->SetCellValue('A' . $rowCount, $row['provinceIdNameTh']);
			$sheet->SetCellValue('B' . $rowCount, $row['preview_question_1']);


			$rowCount++;
		}

		foreach (range('A', 'C') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
		}


		$filename = "Assessment_list" . date("Y-m-d-H-i-s") . ".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		$objWriter->save('php://output');
	}
}
/*---------------------------- END Controller Class --------------------------------*/
