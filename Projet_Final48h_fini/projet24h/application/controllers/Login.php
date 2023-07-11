<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}	
	public function error_login(){
		$data['errorl'] = 'Your Account is Invalid';  
		$this->load->view('login',$data);
	}	
	public function sign(){
		$this->load->view('sign');
	}
	public function error_sign(){
		$data['errors'] = 'Your Password is not the same';  
		$this->load->view('login',$data);
	}

	public function logout(){    
        $this->session->unset_userdata('user');  
		redirect("login");  
    }

	public function acceuil(){
		$this->load->model('model_events');
        $data['event'] = $this->model_events->getId_MAX_events();
        // var_dump($data['event']);
		$this->load->view('acceuil',$data);
	}

	public function User_Profil($si){
		$idUser['id'] = $id;
		$this->load->model('List_Events',$data);
	}

	public function process_login(){
		$nom = $this->input->post('email');
		$mdp = $this->input->post('pass');
		$this->load->model('Login_model');
		$data=$this->Login_model->getdata();		
		$d['passer_IdUser']=verify_login($nom,$mdp,$data);
		echo $d;
		if($d!=0){
			$this->session->set_userdata('iduser',$d);
			// redirect('login/List_Events/'.$d);
			$this->load->view('List_Events');
		}else{
			redirect('Login/error_login');
		}
	}
	public function process_sign_in(){
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$telephone = $this->input->post('telephone');
		$addresse = $this->input->post('addresse');
		$email = $this->input->post('email');
		$mdp1 = $this->input->post('pass1');
		$mdp = $this->input->post('pass');
		$genre = $this->input->post('genre');
		$this->load->model('Login_model');	
		$d = verify_sign($mdp,$mdp1);
		if($d==0){
			$this->Login_model->insert_person($nom,$prenom,$telephone,$genre,$email,$addresse,$mdp);
			redirect('Login');
		}else{
			redirect('Login/error_sign');
		}
	}
}
