<?php
    echo validation_errors();
    if (isset($Mail)&&$Mail==false)
    {
        echo "Il n'existe pas de compte avec cette adresse mail.";
    }
    if (isset($Envoi)&&$Envoi==false)
    {
        echo "L'envoi de mail semble avoir échouer. Veuillez entrer une adresse valide.";
    }
    echo form_open('Visiteur/RecupMDP');
    echo form_label('Mail','txtMail');
    echo '<br>';
    echo form_input('txtMail', set_value('txtMail'));
    echo '<br>';
    echo form_submit('submit', 'Envoyer');
    echo form_close();
?>