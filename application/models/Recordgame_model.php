<?php
class Recordgame_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->database;
	}
    public function checkLoginDetails($user, $psword) 
    {
        //boolean to return
        //calling function to access the database
        return $this->getMatchingUsernamePassword($user, $psword);
        
    }
    private function getMatchingUsernamePassword($user, $psword) 
    {
        //sql statement for username password
        $this->db->select('username, password');
        //where username = $user AND password = $password
        $this->db->where('username' , $user);
        //from the users table
        $query = $this->db->get('users');

        foreach($query->result() as $row) {
            if ($row->username === $user && $row->password === $psword) 
            {
                return true;
            }
        }
        return false;
    }
}