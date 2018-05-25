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
            $this->load->model('ModeleEquipe');
        }
        public function Accueil($DonneesInjectees=null)
        {
            $this->load->view('templates/Entete');
            $this->load->view('Responsable/Accueil', $DonneesInjectees);
        }
        public function deconnexion()
            {
                session_destroy();
                redirect('Visiteur/Accueil');
            }
        public function ModifierProfil()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $DonneesInjectees['TitreDeLaPage'] = 'Modification Compte';
            $this->form_validation->set_rules('txtNom', 'Nom', 'required');
            $this->form_validation->set_rules('txtPrenom', 'Prénom', 'required');
            $this->form_validation->set_rules('rdbtnSexe', 'Sexe', 'required');
            $this->form_validation->set_rules('txtTel', 'Téléphone portable', array('regex_match[/^[0-9]{10}$/]','required'));
            $Responsable=array(
                "NOPARTICIPANT"=>$this->session->noRespo
            );
            $part=$this->ModeleResponsable->retournerPart($Responsable);
            $resp=$this->ModeleResponsable->retournerResponsable($Responsable);
            $DonneesInjectees=array(
                "txtNom"=>$part->NOM,
                "txtPrenom"=>$part->PRENOM,
                "rdbtnSexe"=>$part->SEXE,
                "txtTel"=>$resp->TELPORTABLE,
            );
            if ($this->form_validation->run() === FALSE)
                {   // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/ModifierResponsable', $DonneesInjectees); // on renvoie le formulaire
                }
            else
                {
                    $DonneesParticipant=array
                    (
                        "NOPARTICIPANT"=>$this->session->noRespo,
                        'NOM'=> $this->input->post('txtNom'),
                        'PRENOM'=> $this->input->post('txtPrenom'),
                        'SEXE'=> $this->input->post('rdbtnSexe'),
                    );
                    $update=$this->ModeleResponsable->ModifierPart($DonneesParticipant);
                    if($update)
                    {
                        $DonneesResponsable=array
                        (
                            "NOPARTICIPANT"=>$this->session->noRespo,
                            'TELPORTABLE'=> $this->input->post('txtTel'),
                        );
                        $update=$this->ModeleResponsable->ModifierResp($DonneesResponsable);
                        if ($update)
                        {
                            redirect('Responsable/Accueil');
                        }
                    }
                    else
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/ModifierResponsable', $DonneesInjectees);
                    }
                }
        }
        public function ModifierMDP()
        {
                $this->load->library('form_validation');
                $DonneesInjectees['TitreDeLaPage'] = 'Modification de mot de passe';
                $this->form_validation->set_rules('txtMotDePasse', 'Mot de passe', 'required');
                $this->form_validation->set_rules('txtNouvMotDePasse', 'Nouveau mot de passe', 'required');
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/ModifierMDP', $DonneesInjectees);
                }
                else
                {
                    if ($this->input->post('txtMotDePasse')!=$this->input->post('txtNouvMotDePasse'))
                    {
                        $DonneesInjectees["Egal"]=false;
                        $DonneesVerification=array
                        (
                            "NOPARTICIPANT"=>$this->session->noRespo,
                            "MOTDEPASSE"=> $this->input->post('txtMotDePasse'),
                        );
                        $Verif=$this->ModeleResponsable->Existe($DonneesVerification);
                        if($Verif)
                        {
                            $DonneesInjectees["Verif"]=true;
                            $DonneesInjectees=array
                            (
                                "NOPARTICIPANT"=>$this->session->noRespo,
                                'MOTDEPASSE'=> $this->input->post('txtNouvMotDePasse'),
                            );
                            $update=$this->ModeleResponsable->ModifierResp($DonneesInjectees);
                            if($update)
                            {
                                $this->load->view('Templates/Entete');
                                $this->load->view('Responsable/ModifMDPReussie');
                            }
                        }
                        else
                        {
                            $DonneesInjectees["Verif"]=false;
                            $this->load->view('templates/Entete');
                            $this->load->view('Responsable/ModifierMDP', $DonneesInjectees);
                        }
                    }
                    else
                    {
                        $DonneesInjectees["Egal"]=true;
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/ModifierMDP', $DonneesInjectees);
                    }
                }
        }
        public function VoirProfil()
        {
            $Responsable=array(
                "NOPARTICIPANT"=>$this->session->noRespo
            );
            $part=$this->ModeleResponsable->retournerPart($Responsable);
            $resp=$this->ModeleResponsable->retournerResponsable($Responsable);
            if ($part->SEXE=="F")
            {
                $sexe="Femme";
            }
            else if($part->SEXE=="H")
            {
                $sexe="Homme";
            }
            $dateNaiss=explode ('-', $part->DATEDENAISSANCE);
            $DonneesInjectees=array(
                "txtNom"=>$part->NOM,
                "txtPrenom"=>$part->PRENOM,
                "txtSexe"=>$sexe,
                "txtDateNaiss"=>$dateNaiss[2]."/".$dateNaiss[1]."/".$dateNaiss[0],
                "txtMail"=>$resp->MAIL,
                "txtTel"=>$resp->TELPORTABLE,
            );
            
            $this->load->view('templates/Entete');
            $this->load->view('Responsable/VoirProfil', $DonneesInjectees);
        }
        public function GererEquipe()
        {
            $Responsable=array("NOPAR_RESPONSABLE" => $this->session->noRespo);
            $this->session->NoEquipe=$this->ModeleEquipe->NoEquipe($Responsable);
            if (!isset($this->session->NoEquipe))
            {
                $this->load->library('form_validation');
                $DonneesInjectees['TitreDeLaPage'] = 'Nouveau Compte';
                $this->form_validation->set_rules('txtNomEquipe', 'Nom de l\'équipe', 'required');
                if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/CreerEquipe', $DonneesInjectees);
                }
                else
                {
                    $Equipe=array
                    (
                        'NOPAR_RESPONSABLE'=> $this->session->noRespo,
                        'NOMEQUIPE'=> $this->input->post('txtNomEquipe'),
                    );
                    $Insert=$this->ModeleEquipe->CreerEquipe($Equipe);
                    if ($Insert)
                    {
                        redirect('Responsable/GererEquipe','refresh');
                    }
                    else
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/CreerEquipe', $DonneesInjectees);
                    }
                }
            }
            else
            {
                $DonneesInjectees["nbCoureurs"]=$this->ModeleEquipe->CountEquipe($this->session->NoEquipe);
                if ($DonneesInjectees["nbCoureurs"]>0)
                {
                    $LesCoureurs=array();
                    $equipe=$this->ModeleEquipe->RetournerEquipe($this->session->NoEquipe);
                    foreach ($equipe as $Value) {
                        $Donnees['annee']=$Value;
                        $Donnees['randonneur']=$this->ModeleEquipe->RetournerRandonneur($Value);
                        $Donnees['participant']=$this->ModeleEquipe->RetournerPart($Value);
                        array_push($LesCoureurs,$Donnees);
                    }

                    $DonneesInjectees["LesCoureurs"]=$LesCoureurs;
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/GererEquipe', $DonneesInjectees);
                }
                else
                {
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/GererEquipe', $DonneesInjectees);
                }
            }
        }
        public function InscrireCoureur()
        {
            if (isset($this->session->NoEquipe))
            {
                $this->load->library('form_validation');
                $DonneesInjectees['TitreDeLaPage'] = 'Nouveau Compte';
                $this->form_validation->set_rules('txtNom', 'Nom', 'required');
                $this->form_validation->set_rules('txtPrenom', 'Prénom', 'required');
                $this->form_validation->set_rules('rdbtnSexe', 'Sexe', 'required');
                $this->form_validation->set_rules('txtAnnee', 'Année de participation', 'required');
                $this->form_validation->set_rules('rdbtnRepas', 'Repas', 'required');
                $this->form_validation->set_rules('txtJourNaiss', 'Jour de naissance', 'required|regex_match[/^[0-9]{2}$/]');
                $this->form_validation->set_rules('txtMoisNaiss', 'Mois de naissance', 'required|regex_match[/^[0-9]{2}$/]');
                $this->form_validation->set_rules('txtAnneeNaiss', 'Année de naissance', 'required|regex_match[/^[0-9]{4}$/]');
                $this->form_validation->set_rules('txtMail', 'Mail', 'regex_match[/^[[:punct:]a-z]*@[a-z]*\.\w*/]');
                $this->form_validation->set_rules('txtTel', 'Téléphone portable', 'regex_match[/^[0-9]{10}$/]');
                if ($this->form_validation->run() === FALSE)
                {  // échec de la validation
                    // cas pour le premier appel de la méthode : formulaire non encore appelé
                    $this->load->view('templates/Entete');
                    $this->load->view('Responsable/InscrireCoureur', $DonneesInjectees); // on renvoie le formulaire
                }
                else
                {
                    $DateNaiss=$this->input->post('txtAnneeNaiss')."-".$this->input->post('txtMoisNaiss')."-".$this->input->post('txtJourNaiss');
                    $DonneesParticipant=array
                    (
                        'NOM'=> $this->input->post('txtNom'),
                        'PRENOM'=> $this->input->post('txtPrenom'),
                        'SEXE'=> $this->input->post('rdbtnSexe'),
                        'DATEDENAISSANCE'=> $DateNaiss,
                    );
                    $DonneesRandonneur=array
                    (
                        'MAIL'=> $this->input->post('txtMail'),
                        'TELPORTABLE'=> $this->input->post('txtTel'),
                    );
                    $DonneeEquipe=array
                    (
                        'NOEQUIPE'=>$this->session->NoEquipe,
                        'ANNEE'=>$this->input->post('txtAnnee'),
                        'REPASSURPLACE'=>$this->input->post('rdbtnRepas'),
                    );
                    $DonneesInjectees=array(
                        'DonneesEquipe'=>$DonneeEquipe,
                        'DonneesParticipant' => $DonneesParticipant,
                        'DonneesRandonneur' => $DonneesRandonneur
                    );
                    $insert=$this->ModeleEquipe->InscrireCoureur($DonneesInjectees);
                    if ($insert)
                    {
                        
                        redirect('Responsable/GererEquipe');
                        
                    }
                    else
                    {
                        $this->load->view('templates/Entete');
                        $this->load->view('Responsable/InscrireCoureur', $DonneesInjectees);
                    }  
                }
            }
            else
            {
                $this->load->view('templates/Entete');
                $this->load->view('Responsable/CreerEquipe');
            }
        }
    }
?>