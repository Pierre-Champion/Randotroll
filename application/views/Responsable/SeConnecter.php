              <?php 
              echo validation_errors();
              echo form_open('test/SeConnecter');
              echo form_label('Mail','txtMail');
              echo '<br>';
              echo form_input('txtMail', set_value('txtMail'));
              echo '<br>';
              echo form_label('Mot de passe','txtMotDePasse');
              echo '<br>';
              echo form_password('txtMotDePasse', set_value('txtMotDePasse'));
              echo '<br>';
              echo form_submit('submit', 'Se connecter');
              echo form_close();
              echo '<a href="CreerCompte">Creer un nouveau compte</a>';
              ?>