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
        echo '<table><tr><th></th><th>Nom</th><th>Prenom</th><th>Date de naissance</th><th>Sexe</th><th>Mail</th><th>Numéro de téléphone</th><th>Année de participation</th><th>Repas sur place?</th><th>Tarifs</th></tr>';
        $prix=0;
        foreach ($LesCoureurs as $Donnees) {
            echo "<tr><td>".anchor('Responsable/ModifierCoureur/'.$Donnees['participant']->NOPARTICIPANT, 'Modifier')."</br>".anchor('Responsable/DesinscrireCoureur/'.$Donnees['participant']->NOPARTICIPANT, 'Désinscrire')."</td>";
            $UnCoureur=array("NOM"=>$Donnees['participant']->NOM,"PRENOM"=>$Donnees['participant']->PRENOM,"DATEDENAISSANCE"=>$Donnees['participant']->DATEDENAISSANCE,"SEXE"=>$Donnees['participant']->SEXE,"MAIL"=>$Donnees["randonneur"]->MAIL,"TELPORTABLE"=>$Donnees["randonneur"]->TELPORTABLE,"ANNEE"=>$Donnees['membrede']["ANNEE"],"REPASSURPLACE"=>$Donnees['membrede']["REPASSURPLACE"],"Tarif"=>$Donnees['tarif']);
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
                elseif ($key=="DATEDENAISSANCE") 
                {
                    $date = new DateTime($value);
                    echo "<td>".$date->format('d/m/Y')."</td>";
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
                elseif($key=="Tarif")
                {
                    $prix+=(int)$value;
                    echo "<td>".$value."€</td>";
                }
                else
                {
                    echo "<td>".$value."</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "Prix total : ".$prix."€";
    }
?>