<?php 

/**
 * 
 */
class MemberModel extends CI_model
{
	public function loginMember($username,$password)
	{
		$where = "username = '$username' AND '$password' ";
		$query = $this->db->select("memberID,username,fname,lname,email,picture")
	                 ->from("member")
	                 ->where($where)
	                 ->get();
	    $result = $query->result();
	    return $result;
	}

	public function registerMember($data)
	{
		$this->db->insert("member",$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function checkingUsername($username)
	{
		$where = "username = '$username'";
		$query = $this->db->select("username")
	                 ->from("member")
	                 ->where($where)
	                 ->get();
	    $result = $query->result();
	    return $result;
	}
}