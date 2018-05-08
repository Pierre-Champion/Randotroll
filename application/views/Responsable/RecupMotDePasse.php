<?php
    echo validation_errors();
    echo form_open('Visiteur/RecupMDP');
    echo form_label('Mail','txtMail');
    echo '<br>';
    echo form_input('txtMail', set_value('txtMail'));
    echo '<br>';
    echo form_submit('submit', 'Envoyer');
    echo form_close();
?>