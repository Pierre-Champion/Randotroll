<?php 
echo validation_errors();
echo form_open('Responsable/ModifierProfil');
echo form_label('Nom','txtNom');
echo '<br>';
echo form_input('txtNom', $txtNom);
echo '<br>';
echo form_label('Prénom','txtPrenom');
echo '<br>';
echo form_input('txtPrenom', $txtPrenom);
echo '<br><br>';
echo form_label('Sexe','rdbtnSexe');
echo '<br>';
if ($rdbtnSexe =='F')
{
    $F = 'checked';
    $H = '';
}
else
{
    $F = '';
    $H = 'checked';
}
echo form_radio('rdbtnSexe', 'H', $H)."Homme ";
echo form_radio('rdbtnSexe', 'F', $F)."Femme ";
echo '<br><br>';
echo form_label('Date de naissance (yyyy-mm-dd)','txtDateNaiss');
echo '<br>';
echo form_input('txtDateNaiss', $txtDateNaiss);
echo '<br>';
echo form_label('Téléphone portable','txtTel');
echo '<br>';
echo form_input('txtTel', $txtTel);
echo '<br>';
echo form_label('Mail','txtMail');
echo '<br>';
echo form_input('txtMail', $txtMail);
echo '<br>';
echo form_label('Mot de passe','txtMotDePasse');
echo '<br>';
echo form_password('txtMotDePasse', $txtMotDePasse);
echo '<br>';
echo form_submit('submit', 'Modifier');
echo form_close();
?>