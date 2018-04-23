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

                $DonneesInjectees['idContributeur'] = $this->ModeleAdminOrganisation->insererUnContributeur($donneesAInserer);
                
                if($this->input->post('rbtnType')=='Benevole') {
                    $this->load->view('Templates/Entete');
                    $this->load->view('AdminOrganisation/Contributeur/ajouterBenevole');
                    $this->load->view('Templates/PiedDePage');
                    
                } else if ($this->input->post('rbtnType')=='ApporteurSponsor') {
                    $this->load->view('Templates/Entete');
                    //$this->load->view('Responsable/seConnecter', $DonneesInjectees);
                    $this->load->view('Templates/PiedDePage');

                } else {
                    $this->load->view('Templates/Entete');
                    $this->load->view('AdminOrganisation/insertionReussie');
                    $this->load->view('Templates/PiedDePage');
                }

            } else {

                $this->load->view('Templates/Entete');
                $this->load->view('adminOrganisation/Contributeur/ajouterContributeur');
                $this->load->view('Templates/PiedDePage');
            }
        }

        public function ajouterBenevole() {

            if($this->input->post('btnAjouter')) {

                $donneesAInserer = array(
                    'NOCONTRIBUTEUR' => $this->input->post('txtNom'));

                $DonneesInjectees['idContributeur'] = $this->ModeleAdminOrganisation->insererUnContributeur($donneesAInserer);
                
                if($this->input->post('rbtnType')=='Benevole') {
                    $this->load->view('Templates/Entete');
                    $this->load->view('AdminOrganisation/Contributeur/ajouterBenevole');
                    $this->load->view('Templates/PiedDePage');
                    
                }
            }
        }
    }
?>