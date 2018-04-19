<?php 
    class ModeleAdminOrganisation extends CI_Model {
        
        public function __construct() {
    
            $this->load->database();
        }

        public function insererUnContributeur($pDonneesAInserer) {
        
            return $this->db->insert('contributeur',$pDonneesAInserer);
        }
    }
?>