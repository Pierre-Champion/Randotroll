<?php
    class AdminOrganisation extends CI_Controller {

        public function ajouterContributeur() {

            $this->load->helper('form');

            if($this->input->post('btnAjouter')) {

                $donneesAInserer = array(
                    'cNom' => $this->input->post('txtNom'),
                    'cPrenom' => $this->input->post('txtPrenom'),
                    'cEmail' => $this->input->post('txtEmail'),
                    'cTelPortable' => $this->input->post('txtTelPortable'),
                    'cTelFixe' => $this->input->post('txtTelFixeNom'),
                    'cAdresse' => $this->input->post('txtAdresse'),
                    'cCodePostal' => $this->input->post('txtCodePostal'),
                    'cVille' => $this->input->post('txtVille')
                );

                $this->ModeleAdminOraganisation->insererUnContributeur($donneesAInserer);
                $this->load->helper('url');
                $this->load->view('AdminOraganisation/insertionReussie', $data, FALSE);
                
            } else {

                $this->load->view('Templates/Entete');
                $this->load->view('adminOrganisation/ajouterContributeur');
                $this->load->view('Templates/PiedDePage');
                
            }
                        
        }
    }
?>