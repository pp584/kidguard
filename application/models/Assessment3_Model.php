<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * FileUpload_model Class
 * @date 2019-08-27
 */
class Assessment3_Model extends CI_Model
{


	public function insertAssessment($data){
		$this->db->insert('context_factor',$data);
	}


}
/*---------------------------- END Model Class --------------------------------*/