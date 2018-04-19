<?php 
    class ModeleAdminOrganisation extends CI_Model {
        
        public function __construct() {
    
            $this->load->database();
        }

        public function insererUnContributeur($pDonneesAInserer) {
        
            $this->db->insert('contributeur',$pDonneesAInserer);
            return $this->db->insert_id();
        }
    }
?>