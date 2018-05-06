<?php
    class Visiteur extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            if (!isset($this->session))
            {
                session_start();
            }
            $this->load->model('ModeleResponsable');
        }
        public function Accueil()
        {
            if ($this->session->userdata('statut')=="Responsable")
            { 
                redirect('Responsable/Accueil');
            }
            else
            {
                $this->load->view('Templates/Entete');
                $this->load->view('Accueil');
                $this->load->view('Templates/PiedDePage');
            }
        }
        public function CreerCompteResponsable()
        {
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Nouveau Compte';
            $this->form_validation->set_rules('txtNom', 'Nom', 'required');
            $this->form_validation->set_rules('txtPrenom', 'Prénom', 'required');
            $this->form_validation->set_rules('rdbtnSexe', 'Sexe', 'required');
            $this->form_validation->set_rules('txtJourNaiss', 'Jour de naissance', 'required|regex_match[/^[0-9]{2}$/]');
            $this->form_validation->set_rules('txtMoisNaiss', 'Mois de naissance', 'required|regex_match[/^[0-9]{2}$/]');
            $this->form_validation->set_rules('txtAnneeNaiss', 'Année de naissance', 'required|regex_match[/^[0-9]{4}$/]');
            $this->form_validation->set_rules('txtMail', 'Mail', 'required|regex_match[/^[[:punct:]a-z]*@[a-z]*\.\w*/]');
            $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
            $this->form_validation->set_rules('txtTel', 'Téléphone portable', array('regex_match[/^[0-9]{10}$/]','required'));
            if ($this->form_validation->run() === FALSE)
                {  // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/NouveauCompte', $DonneesInjectees); // on renvoie le formulaire
                    $this->load->view('templates/PiedDePage');
                }
            else
                {
                    $Responsable = array
                    (
                        'MAIL' => $this->input->post('txtMail'),
                    );
                    $ResponsableRetourne = $this->ModeleResponsable->retournerResponsable($Responsable);
                    if ($ResponsableRetourne)
                    {
                        $DonneesInjectees['DejaExistant']=true;
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/NouveauCompte', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }
                    else
                    {
                        $DonneesInjectees['DejaExistant']=false;
                        $DateNaiss=$this->input->post('txtAnneeNaiss')."-".$this->input->post('txtMoisNaiss')."-".$this->input->post('txtJourNaiss');
                        $DonneesParticipant=array
                        (
                            'NOM'=> $this->input->post('txtNom'),
                            'PRENOM'=> $this->input->post('txtPrenom'),
                            'SEXE'=> $this->input->post('rdbtnSexe'),
                            'DATEDENAISSANCE'=> $DateNaiss,
                        );
                        $DonneesResponsable=array
                        (
                            'MAIL'=> $this->input->post('txtMail'),
                            'TELPORTABLE'=> $this->input->post('txtTel'),
                            'MOTDEPASSE'=> $this->input->post('txtMotDePasse'),
                        );
                        $DonneesInjectees=array(
                            'DonneesParticipant' => $DonneesParticipant,
                            'DonneesResponsable' => $DonneesResponsable
                        );
                        $insert=$this->ModeleResponsable->CreerCompte($DonneesInjectees);
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
        }
        public function SeConnecterResponsable()
            {
                $DonneesInjectees['connexion']="";
                $this->load->helper('form');
                $this->load->library('form_validation');
                $DonneesInjectees['TitreDeLaPage'] = 'Se connecter';
                $this->form_validation->set_rules('txtMail', 'Mail', 'required|regex_match[/^[[:punct:]a-z]*@[a-z]*\.\w*/]');
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
                    $ResponsableRetourne = $this->ModeleResponsable->Existe($Responsable);
                    if (!($ResponsableRetourne == null))
                    {    // on a trouvé, identifiant et statut (droit) sont stockés en session
                        $DonneesInjectees["connexion"]="réussie";
                        $this->session->Identifiant = $ResponsableRetourne->MAIL;
                        $this->session->noRespo=$ResponsableRetourne->NOPARTICIPANT;
                        $this->session->statut = 'Responsable';
                        $DonneesInjectees['Identifiant'] = $Responsable['MAIL'];
                        redirect("Responsable/Accueil", $DonneesInjectees);
                    }
                    else
                    {   // utilisateur non trouvé on renvoie le formulaire de connexion
                        $DonneesInjectees["connexion"]="échouée";
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/seConnecter', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }  
                }
            } // fin seConnecter
            public function RecupMDP()
            {
                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                {
	                $passage_ligne = "\r\n";
                }
                    else
                {
	                $passage_ligne = "\n";
                }
                $header = "From: \"Randotroll CK\"<RandotrollCK@gmail.com>".$passage_ligne;
                $header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
                $header .= "MIME-Version: 1.0".$passage_ligne;
                $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
            }
            public function deconnexion()
            {
                session_destroy();
                $this->Accueil();
            }
    }