<?php 

    if (isset($nbCoureurs)&&$nbCoureurs<=10)
    {
        echo anchor('Responsable/InscrireCoureur', 'Inscrire un coureur');
    }
    if (isset($nbCoureurs)&&$nbCoureurs==0)
    {
        echo "<div class=\"Equipe\">Il n'y a aucun randonneur dans l'équipe.<div>";
    }
    else
    {
        echo '<table border=1><tr><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Sexe</th><th>Mail</th><th>Numéro de téléphone</th><th>Année de participation</th><th>Repas sur place?</th></tr>';
        
        foreach ($LesCoureurs as $Donnees) {
            echo "<tr>";
            $UnCoureur=array("NOM"=>$Donnees['participant']->NOM,"PRENOM"=>$Donnees['participant']->PRENOM,"DATEDENAISSANCE"=>$Donnees['participant']->DATEDENAISSANCE,"SEXE"=>$Donnees['participant']->SEXE,"MAIL"=>$Donnees["randonneur"]->MAIL,"TELPORTABLE"=>$Donnees["randonneur"]->TELPORTABLE,"ANNEE"=>$Donnees['annee']["ANNEE"],"REPASSURPLACE"=>$Donnees['annee']["REPASSURPLACE"]);
            foreach ($UnCoureur as $key=>$value) {
                if ($key=="REPASSURPLACE")
                {
                    if($value==1)
                    {
                        echo "<td>oui</td>";
                    }
                    else
                    {
                        echo "<td>non</td>";
                    }
                }
                elseif ($key=="SEXE") 
                {
                    if($value=="H")
                    {
                        echo "<td>Homme</td>";
                    }
                    else
                    {
                        echo "<td>Femme</td>";
                    }
                }
                else
                {
                    echo "<td>".$value."</td>";
                }
            }
            echo "</tr>";
        }
    }
?>