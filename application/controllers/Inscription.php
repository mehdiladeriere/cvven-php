<?php

class Inscription extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('client_modele');
    }

    public function index() {
        
        $data["titre"] = "Un titre";
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nom', 'Nom', 'required|alpha|min_length[2]');
        $this->form_validation->set_rules('prenom', 'Prenom', 'alpha|min_length[2]');
        $this->form_validation->set_rules('datenaissance', 'Datenaissance', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse Postale', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required|alpha');
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|exact_length[10]|is_numeric');
        $this->form_validation->set_rules('codepostal', 'Code Postal', 'trim|required|exact_length[5]|is_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[client.adresseMail]');
        $this->form_validation->set_rules('login', 'Username', 'trim|required|min_length[5]|max_length[20]|is_unique[client.login]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        $this->load->helper(array('form', 'url'));

        $inscription_form_data = $this->get_inscription_form_data();
        
        if ($this->form_validation->run() == FALSE) {
            
            array_merge($data, $inscription_form_data);
            
            $this->load->view('log/inscription');
            
        } else {
            
            $this->client_modele->addClient($inscription_form_data);
            
            $this->load->view('log/login');
        }
    }
    
    public function get_inscription_form_data() {
        
        return [
            'nom'               => $this->input->post('nom'),
            'prenom'            => $this->input->post('prenom'),
            'datenaissance'     => $this->input->post('datenaissance'),
            'adresse'           => $this->input->post('adresse'),
            'ville'             => $this->input->post('ville'),
            'telephone'         => $this->input->post('telephone'),
            'codepostal'        => $this->input->post('codepostal'),
            'email'             => $this->input->post('email'),
            'login'             => $this->input->post('login'),
            'password'          => $this->input->post('password'),
        ];
        
        
    }

}
