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
echo form_label('Téléphone portable','txtTel');
echo '<br>';
echo form_input('txtTel', $txtTel);
echo '<br>';
echo '<br>';
echo form_submit('submit', 'Modifier');
echo form_close();
?>