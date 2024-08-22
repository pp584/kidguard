<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * FileUpload_model Class
 * @date 2019-08-27
 */
class Assessment4_Model extends CI_Model
{


	public function insertAssessment($data){
		$this->db->insert('risk_behavior',$data);
	}


}
/*---------------------------- END Model Class --------------------------------*/