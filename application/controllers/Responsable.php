<?php
    class Responsable extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('session');
            if (!isset($this->session) || $this->session->userdata('statut')!="Responsable")
            {
                redirect('Visiteur/Accueil');
            }
            $this->load->model('ModeleResponsable');
        }
        public function Accueil($DonneesInjectees=null)
        {
            $this->load->view('templates/Entete');
            $this->load->view('Responsable/Accueil', $DonneesInjectees);
            $this->load->view('templates/PiedDePage');
        }
        public function deconnexion()
            {
                session_destroy();
                redirect('Visiteur/Accueil');
            }
        public function ModifierProfil()
        {
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Nouveau Compte';
        $this->form_validation->set_rules('txtNom', 'Nom', 'required');
        $this->form_validation->set_rules('txtPrenom', 'Prénom', 'required');
        $this->form_validation->set_rules('rdbtnSexe', 'Sexe', 'required');
        $this->form_validation->set_rules('txtDateNaiss', 'Date de naissance', 'required|regex_match[/^\d{4}\-\d{2}\-\d{2}/]');
        $this->form_validation->set_rules('txtMail', 'Mail', 'required|regex_match[/^[[:punct:]a-z]*@[a-z]*\.\w*/]');
        $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
        $this->form_validation->set_rules('txtTel', 'Téléphone portable', array('regex_match[/^[0-9]{10}$/]','required'));
            $Responsable=array(
                "NOPARTICIPANT"=>$this->session->noRespo
            );
            $part=$this->ModeleResponsable->retournerPart($Responsable);
            $resp=$this->ModeleResponsable->retournerResponsable($Responsable);
            $DonneesInjectees=array(
                "txtNom"=>$part->NOM,
                "txtPrenom"=>$part->PRENOM,
                "txtDateNaiss"=>$part->DATEDENAISSANCE,
                "rdbtnSexe"=>$part->SEXE,
                "txtMail"=>$resp->MAIL,
                "txtTel"=>$resp->TELPORTABLE,
                "txtMotDePasse"=>$resp->MOTDEPASSE
            );
            if ($this->form_validation->run() === FALSE)
                {   // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/ModifierResponsable', $DonneesInjectees); // on renvoie le formulaire
                    $this->load->view('templates/PiedDePage');
                }
            else
                {
                    $DonneesParticipant=array
                    (
                        "NOPARTICIPANT"=>$this->session->noRespo,
                        'NOM'=> $this->input->post('txtNom'),
                        'PRENOM'=> $this->input->post('txtPrenom'),
                        'SEXE'=> $this->input->post('rdbtnSexe'),
                        'DATEDENAISSANCE'=> $this->input->post('txtDateNaiss'),
                    );
                    $update=$this->ModeleResponsable->ModifierPart($DonneesParticipant);
                    if($update)
                    {
                        $DonneesResponsable=array
                        (
                            "NOPARTICIPANT"=>$this->session->noRespo,
                            'MAIL'=> $this->input->post('txtMail'),
                            'TELPORTABLE'=> $this->input->post('txtTel'),
                            'MOTDEPASSE'=> $this->input->post('txtMotDePasse'),
                        );
                        $update=$this->ModeleResponsable->ModifierResp($DonneesResponsable);
                        if ($update)
                        {
                            $this->load->view('templates/Entete');
                            $this->load->view('Responsable/ModifCompteReussie');
                            $this->load->view('Responsable/Accueil', $DonneesInjectees);
                            $this->load->view('templates/PiedDePage');
                        }
                    }
                    else
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/ModifierResponsable', $DonneesInjectees);
                        $this->load->view('templates/PiedDePage');
                    }
                }
        }
        public function GererEquipe()
        {
            
        }
    }
    
?>