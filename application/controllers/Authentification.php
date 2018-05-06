<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authentification extends CI_Controller {

    
        public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('client_modele');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        
       
    }

    public function index() {
        
        $data["titre"] = "Un titre";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $this->load->helper(array('form', 'url'));

        $auth_form_data = $this->get_auth_form_data();
        array_merge($data, $auth_form_data);
        
        if ($this->form_validation->run() == FALSE) {
            
            
            
            $this->load->view('log/login', $data);
            
        } else {
            
            // Client qui ne correspond pas à la db
            if(! $this->client_modele->is_client($auth_form_data) ) {
             
                $data['message'] = "Nom d'utilisateur ou mot de passe incorrect";
                $this->load->view('log/login', $data);
            
            // Client qui correspond à la db    
            } else {
                $login = $this->input->post('login');
                $sessiondata = array(
                    'login' => $login,
                    'loginuser' => TRUE);
                $this->session->set_userdata($sessiondata);
                //On charge le controller reservation
                 redirect('reservations/affichertout', 'refresh');
            }
        }
    }

    public function get_auth_form_data() {
        
        return [
            'login'             => $this->input->post('login'),
            'password'          => $this->input->post('password'),
        ];
        
        
    }
    
    
//    public function __construct() {
//        parent::__construct();
//        $this->load->library('session');
//        $this->load->helper('form');
//        $this->load->helper('url');
//        $this->load->helper('html');
//        $this->load->database();
//        $this->load->library('form_validation');
//        //load the login model
//        $this->load->model('login_model');
//    }
//    
//    
//
//    public function connexion() {
//        //get the posted values
//        $username = $this->input->post("txt_username");
//        $password = $this->input->post("txt_password");
//
//        //set validations
//        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
//        $this->form_validation->set_rules("txt_password", "Password", "trim|required");
//
//        if ($this->form_validation->run() == FALSE) {
//            //validation fails
//            $this->load->view('log/login_view');
//        } else {
//            //validation succeeds
//            if ($this->input->post('btn_login') == "Login") {
//                //check if username and password is correct
//                $usr_result = $this->login_model->get_user($username, $password);
//                if ($usr_result > 0) {
//                    $sessiondata = array(
//                        'username' => $username,
//                        'loginuser' => TRUE
//                    );
//                    $this->session->set_userdata($sessiondata);
//                    redirect("reservations/affichertout");
//                } else {
//                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Mauvais identifiant ou mot de passe.</div>');
//                    redirect('login/connexion');
//                }
//            } else {
//                redirect('login/connexion');
//            }
//        }
//    }
    
    public function logout() {
        $newdata = array(
            'username' => '',
            'password' => '',
            'loginuser' => FALSE,
        );

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();

        redirect('Authentification', 'refresh');
    }

}

?>