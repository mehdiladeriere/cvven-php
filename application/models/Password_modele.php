<?php

class password_modele extends CI_model {

    public function __construct() {
        $this->load->database();
        $this->load->model('client_modele');
    }

    public function get_password($login) {
        $client = $this->client_modele->get_client_by_login($login);
        return $client->mdp;
    }
    
    public function update_password($login, $password) {
        //fonction pour ajouter un nouveau mot de passe   
        $this->load->helper('url');
        
        $client = $this->client_modele->get_client_by_login_array($login);
        
        //$id = (int) $client['idClient'];
        
        $data = $client;
        $data["mdp"] = $password;

        $this->db->where('login', $login);
        $this->db->update('client', $data);
    }

    

}

