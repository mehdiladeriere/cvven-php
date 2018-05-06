<?php

class password extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('password_modele');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        
       
    }

    public function index() {
        
        $data["titre"] = "Un titre";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'mot de passe', 'trim|required');
        $this->form_validation->set_rules('new_password', 'nouveau mot de passe', 'trim|required|differs[password]');
        $this->form_validation->set_rules('conf_password', 'confirmation mot de passe', 'trim|required|matches[new_password]');

        $this->load->helper(array('form', 'url'));

        $password_form_data = $this->get_password_form_data();
        array_merge($data, $password_form_data);
        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('log/motdepasse', $data);

        } else {
            
            // Mot de passe provenant de la session != Mot de passe du champ du formulaire
            if ( $this->password_modele->get_password($this->session->login) != $password_form_data["password"] ) {
                
                $data["message"] = "Votre mot de passe est incorrect";
                $this->load->view('motdepasse', $data);
            
            // Succès
            } else {
                
                $this->password_modele->update_password($this->session->login, $password_form_data["new_password"]);
                redirect('reservations/affichertout', 'refresh');
                
            }
            
        }
    }

    public function get_password_form_data() {
        
        return [
            'password'             => $this->input->post('password'),
            'new_password'          => $this->input->post('new_password'),
            'conf_password'          => $this->input->post('conf_password'),
        ];
        
        
    }
    
    public function logout() {
        $newdata = array(
            'login' => '',
            'password' => '',
            'loginuser' => FALSE,
            
        );
        
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        
        redirect('authentification/index', 'refresh');
    }
    
   
}
