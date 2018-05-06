<?php

class login_signup extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   public function ajouterCompte(){
    //fonction pour ajouter une réservation    
        $this->load->helper('url');
            
        $data = [
                "username" => $this->input->post('NomDeCompte'),
                "password" => $this->input->post('MotDePasse'),
            ];
            
        return $this->db->insert('users', $data); //insert
        }

}


?>