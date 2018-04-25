              <?php 
              if(isset($connexion)&&$connexion=="échouée")
              {
                  echo 'Mail ou mot de passe incorrect.';
              }
              echo validation_errors();
              echo form_open('Visiteur/SeConnecterResponsable');
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
              echo '<a href="CreerCompteResponsable">Creer un nouveau compte</a>';
              ?>