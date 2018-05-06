<?php

class client_modele extends CI_model {

    public function __construct() {
        $this->load->database();
    }
    
    public function getClient() {
        
    }
    
    public function get_client_by_login_array($login) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour vérifier si le mdp correspond
        $rqt = $this->db->query("SELECT idClient, mdp FROM client WHERE login='" . $login . "'");
        $client = $rqt->row_array();
        return $client;
    }
    
    public function get_client_by_login($login) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour vérifier si le mdp correspond
        $rqt = $this->db->query("SELECT mdp FROM client WHERE login='" . $login . "'");
        $client = $rqt->row();
        return $client;
    }

    public function addClient($data) {
        //fonction pour ajouter une réservation    
        $this->load->helper('url');

        $client = [
            "login" => $data['login'],
            "mdp" => $data['password'],
            "nom" => $data['nom'],
            "prenom" => $data['prenom'],
            "dateNaissance" => $data['datenaissance'],
            "adresse" => $data['adresse'],
            "ville" => $data['ville'],
            "codepostal" => $data['codepostal'],
            "numeroTelephone" => $data['telephone'],
            "adresseMail" => $data['email'],
        ];

        return $this->db->insert('client', $client); //insert
    }

    public function is_client($data) {
        // $data correspond aux informations rempli par l'utilisateur
        //fonction pour vérifier si le login et mdp correspond
        $rqt_clients = $this->db->query("SELECT login, mdp FROM client");
        $clients = $rqt_clients->result();

        foreach ($clients as $client) {
            $login = $client->login;
            $mdp = $client->mdp;
            
            if ( $login == $data['login'] ) {
                
                if ( $mdp == $data['password'] ) {
                    
                    return true;
                }   
            }
        }
        
        return false;
    }

}
