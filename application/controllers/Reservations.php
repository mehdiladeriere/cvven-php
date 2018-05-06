<?php

class Reservations extends CI_Controller {
        public function __construct(){ //constructeur
            parent::__construct();
            $this->load->library('session');
            $this->load->database();
            $this->load->model('reservations_modele');
            $this->load->helper('url');
            
        }
    
	public function afficher($numClient = 0){
/*             if ($this->session->userdata('loginuser') == false) {
            redirect('Authentification', 'refresh');
        } */
        /*Condition pour vérifier que le client a bien été indiqué dans l'URL*/
        $numClient = (int) $numClient;

            if ($numClient == 0) { //si numCLient=0
                show_404(); // Erreur 404
            }

            /* Données à transmettre au modèle */
            $reservationByClient = $this->reservations_modele->getReservationByClient($numClient);

            /* Données à transmettre à la vue */ 
            $data["titre"] = "Mes réservations";
            $data["num"] = $numClient;
            $data["reservation"] = $reservationByClient;
       
            /*Chargement de la vue */
            $this->load->view('templates/header', $data);
            $this->load->view('reservations/afficher', $data);
            $this->load->view('templates/footer', $data);            
        }
        
        public function affichertout(){ /*affiche toutes les réservations */
           if ($this->session->userdata('loginuser') == false) {
            redirect('Authentification', 'refresh');
        }
            $getAllReservations = $this->reservations_modele->getAllReservations();
            $data["titre"] = 'Liste des réservations';
            $data["reservation"] = $getAllReservations; 
            $this->load->view('reservations/affichertout', $data);
        }
        
        public function ajouter(){
           if ($this->session->userdata('loginuser') == false) {
            redirect('Authentification', 'refresh');
        }
            /* Règles à appliquer au formulaire */
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules("dateArrivee", "Date de réservation", "required");
            $this->form_validation->set_rules("dateArrivee", "Date d'arrivée", "required");
            $this->form_validation->set_rules("dateDepart", "Date de départ", "required");
            $this->form_validation->set_rules("nbPersonnes", "Nombre de Personnes", "required");
            $this->form_validation->set_rules("menage", "Menage", "required");
            $this->form_validation->set_rules("pensionComplete", "pension Complète", "required");
            $this->form_validation->set_rules("demiPension", "demi-Pension", "required");
            $this->form_validation->set_rules("etatReservation", "Etat de réservation", "required");
            $this->form_validation->set_rules("idClient", "idClient", "required");
        
            /* Données à transmettre à la vue */ 
            $data["titre"] = "Ajouter des réservations";
            
            /* Formulaire */
            if( $this->form_validation->run() === FALSE ) 
            {
                /*Chargement de la vue */
                $this->load->view('templates/header', $data);
                $this->load->view('reservations/ajouter', $data);
                $this->load->view('templates/footer', $data);
            }
            else 
            {
                /*Chargement de la vue */
                $this->reservations_modele->addReservation();
                $this->load->view('templates/header', $data);
                $this->load->view('reservations/success', $data);
                $this->load->view('templates/footer', $data);
            }
                     
        }    
        
}