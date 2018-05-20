<?php echo anchor('Responsable/InscrireCoureur', 'Inscrire un coureur');
    if ($randonneurs=="aucun")
    {
        echo "<div class=\"Equipe\">Il n'y a aucun randonneur dans l'équipe.<div>";
    }
?>