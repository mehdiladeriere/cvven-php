<?php
class reservations_modele extends CI_Model {
    public function __construct(){ //constructeur
            $this->load->database();
    }
        
    public function getReservationByClient($numClient){ //retourne la requete pour un client
        $query = $this->db->get_where('reservation', ['idClient' => $numClient]);
        return $query->result();
    }
    public function getAllReservations(){ //retourne la requete pour les réservations
        $this->db->select();
        $this->db->from('reservation');
        $query=$this->db->get();
        return $query->result();
   }
    
   public function addReservation(){
    //fonction pour ajouter une réservation    
        $this->load->helper('url');
            
        $data = [
                "dateReservation" => $this->input->post('dateReservation'),
                "dateArrivee" => $this->input->post('dateArrivee'),
                "dateDepart" => $this->input->post('dateDepart'),
                "nbPersonnes" => $this->input->post('nbPersonnes'),
                "menage" => $this->input->post('menage'),
                "pensionComplete" => $this->input->post('pensionComplete'),
                "demiPension" => $this->input->post('demiPension'),
                "etatReservation" => $this->input->post('etatReservation'),
                "idClient" => $this->input->post('idClient'),
            ];
            
        return $this->db->insert('reservation', $data); //insert
        }

}

?>