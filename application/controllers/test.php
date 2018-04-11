<?php
    class test extends CI_Controller
    {
        function Testtest()
        {
            $this->load->view('Templates/Entete');
            $this->load->view('Accueil');
            $this->load->view('Templates/PiedDePage');
            
        }
    }
    
?>