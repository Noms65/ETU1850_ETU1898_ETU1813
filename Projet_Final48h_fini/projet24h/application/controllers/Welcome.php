<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("BaseSession.php");
//class Welcome extends CI_Controller {
class Welcome extends BaseSession {
	
	

	public function accueil()
	{
		$data = array();
		$data['contents']='liste_produit';
		$this->load->view('template',$data);
	}


	public function profil()
	{
		$data = array();
		$data['contents']='profil';
		$this->load->view('template',$data);
	}
	
	
	

	public function disconnect(){
		$this->session->unset_userdata('user');
		redirect('Auth/index');
	}


	
	

	
	
}
