<?php
    class test extends CI_Controller
    {
        public function Accueil()
        {
            $this->load->view('templates/Entete');
            $this->load->view('Accueil');
            $this->load->view('templates/PiedDePage');
        }
        public function CreerCompte()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Nouveau Compte';
            $this->form_validation->set_rules('txtNom', 'Nom', 'optional');
            $this->form_validation->set_rules('txtPrenom', 'Prénom', 'optional');
            $this->form_validation->set_rules('genre', 'genre', 'optional');
            $this->form_validation->set_rules('txtDateNaiss', 'Date de naissance', 'optional');
            $this->form_validation->set_rules('txtMail', 'Mail', 'required');
            $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
            $this->form_validation->set_rules('txtTel', 'Téléphone portable', array('required', 'min_length[10]', 'max_length[10]','[0,9]*'));
            if ($this->form_validation->run() === FALSE)
                {  // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/NouveauCompte', $DonneesInjectees); // on renvoie le formulaire
                    $this->load->view('templates/PiedDePage');
                }
        }
        public function SeConnecter()
            {
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->helper('url');
                $DonneesInjectees['TitreDeLaPage'] = 'Se connecter';
                $this->form_validation->set_rules('txtMail', 'Mail', 'required');
                $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
                // Les champs txtIdentifiant et txtMotDePasse sont requis
                // Si txtMotDePasse non renseigné envoi de la chaine 'Mot de passe' requis
                if ($this->form_validation->run() === FALSE)
                {  // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/SeConnecter', $DonneesInjectees); // on renvoie le formulaire
                    $this->load->view('templates/PiedDePage');
                }
                else
                {  // formulaire validé
                    $Utilisateur = array( // cIdentifiant, cMotDePasse : champs de la table tabutilisateur
                    'cIdentifiant' => $this->input->post('txtIdentifiant'),
                    'cMotDePasse' => $this->input->post('txtMotDePasse'),
                    ); // on récupère les données du formulaire de connexion
                    // on va chercher l'utilisateur correspondant aux Id et MdPasse saisis
                    $UtilisateurRetourne = $this->ModeleUtilisateur->retournerUtilisateur($Utilisateur);
                    if (!($UtilisateurRetourne == null))
                    {    // on a trouvé, identifiant et statut (droit) sont stockés en session
                        $this->load->library('session');
                        $this->session->identifiant = $UtilisateurRetourne->cIdentifiant;
                        $this->session->statut = $UtilisateurRetourne->cStatut;
                        $DonneesInjectees['Identifiant'] = $Utilisateur['cIdentifiant'];
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/connexionReussie', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }
                    else
                    {    // utilisateur non trouvé on renvoie le formulaire de connexion
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/seConnecter', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }  
                }
            } // fin seConnecter
    }
    
?>