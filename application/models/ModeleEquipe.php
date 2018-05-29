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
   if (isset($result))
   {
       return $result->NOEQUIPE;
   }
   else
   {
       return null;
   }

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
public function RetournerPart($noParticipant)
{
    $requete = $this->db->get_where('participant',array("NOPARTICIPANT"=>$noParticipant));
    return $requete->row();
}
public function RetournerRandonneur($noParticipant)
{
    $requete = $this->db->get_where('randonneur',array("NOPARTICIPANT"=>$noParticipant));
    return $requete->row();
}
public function InscrireCoureur($Randonneur)
{
    $DEquipe=$Randonneur['DonneesEquipe'];
    $DPart=$Randonneur['DonneesParticipant'];
    $DRand=$Randonneur['DonneesRandonneur'];
    $this->db->insert('participant', $DPart);
    $InsertId=$this->db->insert_id();
    $dataRand = array(
        'NOPARTICIPANT'=>$InsertId,
        'MAIL'=> $DRand['MAIL'],
        'TELPORTABLE'=> $DRand['TELPORTABLE'],
    );
    $dataEquipe = array(
        'NOPARTICIPANT'=>$InsertId,
        'ANNEE'=> $DEquipe['ANNEE'],
        'NOEQUIPE'=> $DEquipe['NOEQUIPE'],
        'REPASSURPLACE'=> $DEquipe['REPASSURPLACE']
    );
    return $this->db->insert('randonneur', $dataRand)&&$this->db->insert('membrede', $dataEquipe);
}
public function Desinscrire($noRandonneur)
{
    $this->db->delete('membrede', array("NOPARTICIPANT"=>$noRandonneur));
}
public function getRepas($noRandonneur)
{
    return $this->db->get_where('membrede',array("NOPARTICIPANT"=>$noRandonneur))->row(3);
}
public function ModifierPart($Participant)
{
    $this->db->where('noparticipant', $Participant['NOPARTICIPANT']);
    return $this->db->update('participant', $Participant);
}
public function ModifierRand($Randonneur)
{
    $this->db->where('noparticipant', $Randonneur['NOPARTICIPANT']);
    return $this->db->update('randonneur', $Randonneur);
}
public function ModifierRepas($DonneesRepas)
{
    $this->db->where('noparticipant', $DonneesRepas['NOPARTICIPANT']);
    return $this->db->update('membrede', $DonneesRepas);
}
public function getTarifs($annee)
{
    return $this->db->get_where('annee',array("ANNEE"=>$annee))->row();
}
}