<?php 
echo validation_errors(); 
echo form_open('Responsable/GererEquipe');
echo form_label('Nom de l\'équipe','txtNomEquipe');
echo '<br>';
echo form_input('txtNomEquipe', set_value('txtNomEquipe'));
echo '<br>';
echo form_submit('submit', 'Créer une équipe');
echo form_close();
?>