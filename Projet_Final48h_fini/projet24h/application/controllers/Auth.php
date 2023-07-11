<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Auth_model');
        

    }

    public function index() {
        // Afficher le formulaire de connexion
        $this->load->helper('url');
        $this->load->view('login');
    }

    public function login() {
        // Récupérez les données du formulaire
        $username = $this->input->post('mail');
        $password = $this->input->post('password');

        // Vérifiez les informations d'identification
        $this->load->model('Auth_model');
        $user = $this->Auth_model->check_credentials2($username, $password);
        
        if ($user) {
            // Créez une session
            $this->session->set_userdata('user_id', $user['idusers']);
            $this->session->set_userdata('user', $user['prenom']);
            $this->session->set_userdata('username', $user['nom']);
          

            // Redirigez l'utilisateur vers la page protégée
           
           redirect('controller_events/Profil_User');
          
        } else {
            // Afficher une erreur
            $data['error'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
            $this->load->view('login', $data);
        }
    }

    public function inscription(){
        $this->load->helper('url');
        $this->load->view('registre');
    }

    public function insertRegistre(){
        $this->load->helper('url');
        $this->load->model('Auth_model');

		$prenom=$this->input->post('first_name');
        $nom=$this->input->post('last_name');
        $gender=$this->input->post('gender');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $address=$this->input->post('address');
        $mdp=$this->input->post('mdp');
        $cmdp=$this->input->post('cmdp');

       //echo$nom; echo$prenom; echo$phone; echo$gender; echo$email; echo$address; echo$mdp;

        if($nom!=null && $prenom!=null && $mdp==$cmdp ){
            $this->Auth_model->addUsers($nom, $prenom, $phone, $gender, $email, $address, $mdp);
           redirect('auth');
        }else{
           redirect('auth/inscription');
        }

    }

    public function logout() {
        // Détruisez la session
        $this->session->sess_destroy();
        redirect('auth');
    }
}
