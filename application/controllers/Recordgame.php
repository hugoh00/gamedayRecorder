<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecordGame extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		//loading url helper
		$this->load->helper('url');
		//loading the model
		$this->load->model('Recordgame_model');
	}
	public function index()
	{
		$this->load->view('recordgame');
	}
    public function signIn()
	{
		//collect values from the post
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		if ($this->Recordgame_model->checkLoginDetails($username, $password)) {
			//if its true redirected to the dashboard controller/view
			$this->load->view('gameentry');
			
		} else {
			//send back into welcome with a error indicator
			$data['errorMessage'] = "Invalid Login. Please try again";
            $this->load->view('recordgame', $data);
			
		}
	
	}

    public function saveRLtournamentInfo() 
    {
        //collect values from the post
        //general tournament info
		$date = $this->input->post("tournamentDate");
        $placement = $this->input->post("tournamentPlacement");
        // team info
        $teamName = $this->input->post("teamName");
        $teamGoals = $this->input->post("teamGoals");
        $goals = $this->input->post("goals");
        $assists = $this->input->post("assists");
        $saves = $this->input->post("saves");
        if ($this->Recordgame_model->rocketLeagueTournamentInfo($date, $placement, $teamName, 
        $teamGoals, $goals, $assists, $saves)) {
			//load back in with a success display
            $data['rlInfoError'] = false;
			$this->load->view('gameentry', $data);
			
		} else {
			//send back into welcome with a error indicator
			$data['rlInfoError'] = true;
            $this->load->view('gameentry', $data);
			
		}

    }
}