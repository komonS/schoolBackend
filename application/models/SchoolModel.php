<?php 

/**
 * 
 */
class SchoolModel extends CI_model
{
	public function getSchollAll()
	{
		$query = $this->db->select("*")
	                 ->from("school_information")
	                 ->get();
	    $result = $query->result();
	    return $result;
	}

	public function getSchollInformation($schoolID)
	{
		$where = "schoolID = '$schoolID'";
		$query = $this->db->select("*")
	                 ->from("school_information")
	                 ->where($where)
	                 ->get();
	    $result = $query->result();
	    return $result;
	}

	public function getMemberOfSchool($schoolID)
	{
		$where = "schooldetail.schoolID = '$schoolID'";
		$query = $this->db->select("*")
	                 ->from("school_information")
	                 ->join("schooldetail","schooldetail.schoolID = school_information.schoolID")
	                 ->join("member","schooldetail.memberID = member.memberID")
	                 ->where($where)
	                 ->get();
	    $result = $query->result();
	    return $result;
	}

	public function insertMemberOfSchool($data)
	{
		$this->db->insert('schooldetail',$data);
		return $this->db->insert_id();
	}
}