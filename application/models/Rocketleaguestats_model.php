<?php
class Rocketleaguestats_model extends CI_Model {
    public function __construct()
	{
		parent::__construct();
		$this->load->database;
	}

    public function tournamentDates() 
    {
        return $this->getTournamentDates();
    }
    private function getTournamentDates() 
    {
        $this->db->select('ID, dateOfTournament');

        $query = $this->db->get('rocketleague_tournament');

        return $query;
    }
}