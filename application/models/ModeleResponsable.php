<?php
class ModeleResponsable extends CI_Model {
public function __construct()
{
$this->load->database();
} // __construct
public function existe($pResponsable)
{
   $this->db->where($pResponsable);
   $this->db->from('Responsable');
   return $this->db->count_all_results();
}
public function retournerResponsable($pResponsable)
{
   $requete = $this->db->get_where('Responsable',$pResponsable);
   return $requete->row();
}
public function retournerPart($pResponsable)
{
   $requete = $this->db->get_where('Participant',$pResponsable);
   return $requete->row();
}
public function CreerComptePart($DPart)
{
    $this->db->insert('participant', $DPart);
    $InsertId=$this->db->insert_id();
    return $InsertId;
}
public function CreerCompte($Donnees)
{
    $DPart=$Donnees['DonneesParticipant'];
    $DResp=$Donnees['DonneesResponsable'];
    $NoPart= $this->CreerComptePart($DPart);
    $data = array(
        'NOPARTICIPANT'=>$NoPart,
        'MAIL'=> $DResp['MAIL'],
        'TELPORTABLE'=> $DResp['TELPORTABLE'],
        'MOTDEPASSE'=> $DResp['MOTDEPASSE'],
    );
    return $this->db->insert('responsable', $data);
}
public function ModifierResp($Donnees)
{
    $this->db->where('noparticipant', $Donnees['NOPARTICIPANT']);
    return $this->db->update('responsable', $Donnees);
}
public function ModifierPart($Donnees)
{
    $this->db->where('noparticipant', $Donnees['NOPARTICIPANT']);
    return $this->db->update('participant', $Donnees);
}
}