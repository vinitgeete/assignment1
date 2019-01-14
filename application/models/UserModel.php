<?php
class UserModel extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        // load database
        $this->load->database();
    }

    public function addUser($input)
    {
        $this->db->insert('user',$input);
    }
    
    public function countUsers()
    {
    	return $this->db->count_all('user');
    }	
    
    public function getUsers($start,$noRec)
    {
    	$this->db->select('id, name, country, email, mobile, about, birthday');
      $this->db->from('user');    	
    	$this->db->limit($noRec, $start);
    	$query = $this->db->get();
    	return $query->result();
    }	
    
    public function fetchUserData($id)
    {
    	 $this->db->select('id, name, country, email, mobile, about, birthday');
       $this->db->where('id',$id);
       $this->db->from('user');
       $query = $this->db->get();
       return $query->row_array();
    }	
    
    public function editUser($id, $input)
    {
    	 $this->db->update('user', $input, array('id'=>$id));
    }	
}