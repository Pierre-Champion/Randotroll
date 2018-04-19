<?php
    class AdminOrganisation extends CI_Controller {
        
        public function __construct() {
            
            parent::__construct();
            $this->load->helper('form');
            $this->load->model('ModeleAdminOrganisation');
        }

        public function ajouterContributeur() {

            if($this->input->post('btnAjouter')) {

                $donneesAInserer = array(
                    'NOM' => $this->input->post('txtNom'),
                    'PRENOM' => $this->input->post('txtPrenom'),
                    'EMAIL' => $this->input->post('txtEmail'),
                    'TELPORTABLE' => $this->input->post('txtTelPortable'),
                    'TELFIXE' => $this->input->post('txtTelFixe'),
                    'ADRESSE' => $this->input->post('txtAdresse'),
                    'CODEPOSTAL' => $this->input->post('txtCodePostal'),
                    'VILLE' => $this->input->post('txtVille')
                );
                
                if($this->input->post('rbtnBenevole')) {
                    $this->load->view('Templates/Entete');
                    $this->load->view('AdminOrganisation/insertionReussie');
                    $this->load->view('Templates/PiedDePage');

                } else if ($this->input->post('rbtnApporteurSponsor')) {
                    $this->load->view('Templates/Entete');
                    $this->load->view('AdminOrganisation/insertionReussie');
                    $this->load->view('Templates/PiedDePage');

                } else {
                    //$this->ModeleAdminOrganisation->insererUnContributeur($donneesAInserer);
                    //$this->load->view('Templates/Entete');
                    //$this->load->view('AdminOrganisation/insertionReussie');
                    //$this->load->view('Templates/PiedDePage');
                }

            } else {

                $this->load->view('Templates/Entete');
                $this->load->view('adminOrganisation/Contributeur/ajouterContributeur');
                $this->load->view('Templates/PiedDePage');
            }
        }







    }
?>