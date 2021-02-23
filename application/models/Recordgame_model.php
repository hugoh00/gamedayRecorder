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

    public function rocketLeagueTournamentInfo($date, $placement, $teamName, 
    $teamGoals, $goals, $assists, $saves) 
    {
        return $this->insertRLtournamentInfo($date, $placement, $teamName, 
        $teamGoals, $goals, $assists, $saves);
    }
    private function insertRLtournamentInfo($dateOfTournament, $placement, $teamName, 
    $teamGoals, $goals, $assists, $saves)
    {
        //setting variables to db counterparts
        $this->db->set('dateOfTournament', $dateOfTournament);
        $this->db->set('placement', $placement);
        $this->db->set('teamName', $teamName);
        $this->db->set('teamGoals', $teamGoals);
        $this->db->set('goals', $goals);
        $this->db->set('assists', $assists);
        $this->db->set('saves', $saves);

        $this->db->insert('rocketleague_tournament');

        //check whether insert statement has been executed
        if ($this->db->affected_rows() != 0) {
            return true;
        } else {
            return false;
        }
    }
}