<?php

class Signup extends CI_Controller {

    public function afficher() {
        $data["titre"] = "Créer un compte";
        $this->load->view('templates/header', $data);
        $this->load->view('log/signupview', $data);
        $this->load->view('templates/footer', $data);
    }

    public function ajouterCompte() {
        /* Règles a appliqué au formulaire */
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules("NomDeCompte", "NomDeCompte", "required");
        $this->form_validation->set_rules("MotDePasse", "MotDePasse", "required");

        /* Données à transmettre à la vue */
        $data["titre"] = "Créer un compte";

        /* Formulaire */
        if ($this->form_validation->run() === FALSE) {
            /* Chargement de la vue */
            $this->load->view('templates/header', $data);
            $this->load->view('log/signupview', $data);
            $this->load->view('templates/footer', $data);
        } else {
            /* Chargement de la vue */
            $this->reservations_modele->addReservation();
            $this->load->view('templates/header', $data);
            $this->load->view('log/succescompte', $data);
            $this->load->view('templates/footer', $data);
        }
    }

}
