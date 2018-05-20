<?php
class ModeleEquipe extends CI_Model {
public function __construct()
{
$this->load->database();
}

public function NoEquipe($NoResponsable)
{
   $requete = $this->db->get_where('Equipe',$NoResponsable);
   $result=$requete->row();
   return $result->NOEQUIPE;
}
public function CountEquipe($noEquipe)
{
    $this->db->where(array('noequipe' => $noEquipe));
   $this->db->from('MembreDe');
   return $this->db->count_all_results();
}
public function CreerEquipe($Donnees)
{
    $insert=$this->db->insert('Equipe', $Donnees);
    return $insert;
}
public function RetournerEquipe($noEquipe)
{
    $requete = $this->db->get_where('MembreDe',array('noequipe' => $noEquipe));
    return $requete->result_array();
}
public function RetournerRandonneur($noParticipant)
{
    $requete1 = $this->db->get_where('MembreDe',$noParticipant);
    $requete2 = $this->db->get_where('MembreDe',$noParticipant);
    $requete = $requete1 + $requete2;
    return $requete->result_array();
}
public function InscrireCoureur($Randonneur)
{

}
}