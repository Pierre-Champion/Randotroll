<?php 
              echo validation_errors();
              echo form_open('Responsable/CreerCompte');
              echo form_label('Nom','txtNom');
              echo '<br>';
              echo form_input('txtNom', set_value('txtNom'));
              echo '<br>';
              echo form_label('Prénom','txtPrenom');
              echo '<br>';
              echo form_input('txtPrenom', set_value('txtPrenom'));
              echo '<br><br>';
              echo form_label('Sexe','rdbtnSexe');
              echo '<br>';
              echo form_radio('rdbtnSexe', 'H', ''.set_radio('rdbtnSexe', 'H'))."Homme ";
              echo form_radio('rdbtnSexe', 'F', ''.set_radio('rdbtnSexe', 'F'))."Femme ";
              echo '<br><br>';
              echo form_label('Date de naissance','txtDateNaiss');
              echo '<br>';
              echo form_input('txtMail', set_value('txtMail'));
              echo '<br>';
              echo form_label('Mail','txtMail');
              echo '<br>';
              echo form_input('txtMail', set_value('txtMail'));
              echo '<br>';
              echo form_label('Téléphone portable','txtTel');
              echo '<br>';
              echo form_input('txtTel', set_value('txtTel'));
              echo '<br>';
              echo form_label('Mot de passe','txtMotDePasse');
              echo '<br>';
              echo form_password('txtMotDePasse', set_value('txtMotDePasse'));
              echo '<br>';
              echo form_submit('submit', 'Créer un compte');
              echo form_close();
?>