<?php
    class Responsable extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            
            $this->load->model('ModeleResponsable');
        }
        public function Accueil($DonneesInjectees=null)
        {
            $this->load->view('templates/Entete');
            $this->load->view('Accueil', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
        public function CreerCompte()
        {
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Nouveau Compte';
            $this->form_validation->set_rules('txtNom', 'Nom');
            $this->form_validation->set_rules('txtPrenom', 'Prénom');
            $this->form_validation->set_rules('rdbtnSexe', 'Sexe');
            $this->form_validation->set_rules('txtDateNaiss', 'Date de naissance', array('regex_match[\d{4}]/(0[1-9]|1[0-2])-/(0[1-9]|1[0-9]|2[0-9]|3(0|1))'));
            $this->form_validation->set_rules('txtMail', 'Mail', 'required');
            $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
            $this->form_validation->set_rules('txtTel', 'Téléphone portable', array('regex_match[/^[0-9]{10}$/]', 'max_length[10]','min_length[10]','required'));
            if ($this->form_validation->run() === FALSE)
                {  // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/NouveauCompte', $DonneesInjectees); // on renvoie le formulaire
                    $this->load->view('templates/PiedDePage');
                }
            else
                {
                    $DonneesParticipant=array
                    (
                        'NOM'=> $this->input->post('txtNom'),
                        'PRENOM'=> $this->input->post('txtPrenom'),
                        'SEXE'=> $this->input->post('rdbtnSexe'),
                        'DATEDENAISSANCE'=> $this->input->post('txtDateNaiss'),
                    );
                    $DonneesResponsable=array
                    (
                        'MAIL'=> $this->input->post('txtMail'),
                        'TELPORTABLE'=> $this->input->post('txtTel'),
                        'MOTDEPASSE'=> $this->input->post('txtMotDePasse'),
                    );
                    $DonneesInjectees=array(
                        'previousData' => $DonneesInjectees,
                        'DonneesParticipant' => $DonneesParticipant,
                        'DonneesResponsable' => $DonneesResponsable
                    );
                    $insert=$this->ModeleResponsable->CreerCompte($DonneesInjectees);
                    //$insert=$this->ModeleResponsable->CreerCompte($DonneesParticipant,$DonneesResponsable);
                    if ($insert)
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/InsertionReussie');
                        $this->load->view('Responsable/SeConnecter', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }
                    else
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/NouveauCompte', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }  
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
                    $Responsable = array( // cIdentifiant, cMotDePasse : champs de la table tabutilisateur
                    'MAIL' => $this->input->post('txtMail'),
                    'MotDePasse' => $this->input->post('txtMotDePasse'),
                    ); // on récupère les données du formulaire de connexion
                    // on va chercher l'utilisateur correspondant aux Id et MdPasse saisis
                    $ResponsableRetourne = $this->ModeleResponsable->retournerResponsable($Responsable);
                    if (!($ResponsableRetourne == null))
                    {    // on a trouvé, identifiant et statut (droit) sont stockés en session
                        $this->load->library('session');
                        $this->session->Identifiant = $ResponsableRetourne->MAIL;
                        $this->session->statut = 'Responsable';
                        $DonneesInjectees['Identifiant'] = $Responsable['MAIL'];
                        $this->Accueil($DonneesInjectees);
                    }
                    else
                    {    // utilisateur non trouvé on renvoie le formulaire de connexion
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/seConnecter', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }  
                }
            } // fin seConnecter
            public function deconnexion()
            {
                session_destroy();
                $this->Accueil();
            }
    }
    
?>