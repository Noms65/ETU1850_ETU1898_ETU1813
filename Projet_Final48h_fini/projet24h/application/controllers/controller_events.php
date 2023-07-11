<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class controller_events extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Charger le modèle "VotreModele"
		
    }
	public function index() {
        $this->load->view('List_Events');
	}

    public function Profile(){
        $data = array();
        $data['contents']='acceuil';
        $this->load->view('template',$data);
    }

    public function error_login(){
		$data['errorl'] = 'Your Account is Invalid';  
		$this->load->view('login',$data);
	}	

    public function Profil_User(){
        $this->load->model('model_events');
        if (!isset($this->session)) {
            $this->load->library('session');
        }
        $iduser = $this->session->userdata('user_id');
        $data = array();
        $data['data_User'] = $this->model_events->getProfile_ById($iduser);
		$data['contents']='profil';
		$this->load->view('template',$data);
    }

    public function getSuggestion(){
        $this->load->helper('url');
        $this->load->model('model_events');
        if (!isset($this->session)) {
            $this->load->library('session');
        }
        $iduser = $this->session->userdata('user_id');
        $poids = $this->model_events->check_poids_usersById($iduser);
        
        
        
        
        if($poids != null){
            $data = array();
            $data['proposition'] = $this->model_events->getExample_suggestion($poids);         
            $data['contents']='liste_produit';
            //echo $poids;
            $this->load->view('template',$data);
        }else{
            $data['contents']='acceuil';
            $this->load->view('template',$data);
        }
    }

    // public function getCode(){
    //     $this->load->model('model_events');
    //     $code['code'] = $this->model_events->getCode();
    //     $this->load->view('list_produit',$code);
    // }

    public function Profil_insert(){
        $poids = $this->input->post('poids');
        $age = $this->input->post('age');
        $taille = $this->input->post('taille');
        $this->load->model('model_events');
        if (!isset($this->session)) {
            $this->load->library('session');
        }
        $iduser = $this->session->userdata('user_id');
        $data=array();
        $this->model_events->insert_User_profil($idUser,$age,$poids,$taille,$condition);
		//$data['proposition'] = $this->model_events->getExample_suggestion($iduser);
         $data['proposition']="mety";
        $data['contents']='liste_produit';
        $this->load->view('template',$data);
    }

    public function getObjectif_Regime(){
        $idUsers = $this->input->post('idUsers');
        $this->load->model('model_events');
        $regime['regime'] = $this->model_events->getRegime();
        $compte['compte'] = $this->model_events->gere_Compte();
        $this->load->view('proposition',$regime);
    }

    public function Events_Recent(){
		$this->load->model('model_events');
        $data['event'] = $this->model_events->getId_MAX_events();
        // var_dump($data['event']);
		$this->load->view('acceuil',$data);
	}

    public function getProfile_session(){
        if (!isset($this->session)) {
            $this->load->library('session');
        }
        $iduser = $this->session->userdata('user_id');
        $this->load->model('model_events');
        $data=array();
        $data['data_User'] = $this->model_events->getProfile_ById($iduser);
        $data['contents']='profil';
        $this->load->view('template',$data);
    }

    public function insert_users_profil(){
        if (!isset($this->session)) {
            $this->load->library('session');
        }
        $age = $this->input->post('age');
        $condition = $this->input->post('condition');
        $poids = $this->input->post('poids');
        $taille = $this->input->post('taille');
        $this->load->model('model_events');
        $idUsers = $this->session->userdata('user_id');
        $this->model_events->insert_User_profile($idUsers,$age,$poids,$taille);
        $data = array();
        $data['proposition'] = $this->model_events->getProposition($condition,$poids);   
        $data['contents'] = 'liste_produit';
        $this->load->view('template',$data);
    }

    public function getHistorique_proposition(){
        if (!isset($this->session)) {
            $this->load->library('session');
        }
        $id = $this->session->userdata('user_id');
        $this->load->model('model_events');
        $proposition['proposition'] = $this->model_events->selectHistorique_ById($id);
        $this->load->view('liste_produit',$proposition);
    }
}
?>