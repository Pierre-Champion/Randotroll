<?php
class ModeleResponsable extends CI_Model {
public function __construct()
{
$this->load->database();
} // __construct
public function existe($pResponsable) // non utilisée retour 1 si connecté, 0 sinon
{
   $this->db->where($pResponsable);
   $this->db->from('Responsable');
   return $this->db->count_all_results(); // nombre de ligne retournées par la requeête
} // existe
public function retournerResponsable($pResponsable)
{
   $requete = $this->db->get_where('Responsable',$pResponsable);
   return $requete->row(); // retour d'une seule ligne !
   // retour sous forme d'objets
} // retournerUtilisateur
public function retournerPart($pResponsable)
{
   $requete = $this->db->get_where('Participant',$pResponsable);
   return $requete->row(); // retour d'une seule ligne !
   // retour sous forme d'objets
} // retournerUtilisateur
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
} // Fin Classe