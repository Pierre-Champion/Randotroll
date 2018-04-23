<?php
    class Responsable extends CI_Controller
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
    }
    
?>