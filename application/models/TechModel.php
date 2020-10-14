<?php 

/**
 * 
 */
class TechModel extends CI_model
{
	public function getSchoolOfMember($memberID)
	{
		$where = "schooldetail.memberID = '$memberID'";
		$query = $this->db->select("*")
	                 ->from("school_information")
	                 ->join("schooldetail","schooldetail.schoolID = school_information.schoolID")
	                 ->where($where)
	                 ->get();
	    $result = $query->result();
	    return $result;
	}
}