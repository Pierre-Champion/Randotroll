<?php
    echo validation_errors();
    echo form_open('Responsable/ModifierCoureur/'.$nocoureur);
    echo form_label('Nom','txtNom');
    echo '<br>';
    echo form_input('txtNom', $txtNom);
    echo '<br>';
    echo form_label('Prénom','txtPrenom');
    echo '<br>';
    echo form_input('txtPrenom', $txtPrenom);
    echo '<br><br>';
    echo form_label('Téléphone portable','txtTel');
    echo '<br>';
    echo form_input('txtTel', $txtTel);
    echo '<br>';
    echo form_label('Mail','txtMail');
    echo '<br>';
    echo form_input('txtMail', $txtMail);
    echo '<br>';
    echo form_label('Repas sur place','rdbtnRepas');
    echo '<br>';
    if ($rdbtnRepas == 1)
{
    $O = 'checked';
    $N = '';
}
else
{
    $O = '';
    $N = 'checked';
}
    echo form_radio('rdbtnRepas', '1', $O)."Oui ";
    echo form_radio('rdbtnRepas', '0', $N)."Non";
    echo '<br><br>';
    echo form_submit('submit', 'Modifier le coureur');
    echo form_close();
?>