<?php 

    if ($nbCoureurs<=10)
    {
        echo anchor('Responsable/InscrireCoureur', 'Inscrire un coureur');
    }
    if ($nbCoureurs==0)
    {
        echo "<div class=\"Equipe\">Il n'y a aucun randonneur dans l'équipe.<div>";
    }
    else
    {
        echo '<table class="Equipe"><tr><td>Nom</td><td>Prenom</td><td>Date de naissance</td><td>Sexe</td><td>Mail</td><td>Numéro de téléphone</td></tr>';
        
    }
?>