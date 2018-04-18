<?php echo form_open('AdminOrganisation/ajouterContributeur'); ?>

<div class="container-fluid">
    <h2>Ajouter un Contributeur</h2>
    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Nom', 'lblNom').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtNom', '', array('pattern' => '[A-Za-zÀ-ÿ](([-]?[a-zA-ZÀ-ÿ]+)*)', 'required' => 'required', 'title' => 'Saisir un nom valide.')).'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Prenom', 'lblPrenom').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtPrenom', '', array('pattern' => '[A-Za-zÀ-ÿ](([-]?[a-zA-ZÀ-ÿ]+)*)', 'required' => 'required', 'title' => 'Saisir un prenom valide.')).'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Email', 'lblEmail').'<BR>'; ?> </div>
        <?php $data_email = array('type' => 'email', 'name' => 'txtEmail', 'title' => 'Saisir un email valide.', 'placeholder' => 'azerty@arz.xx');?>
        <div class="col-sm-1"> <?php echo form_input($data_email).'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Tel Portable', 'lblTelPortable').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtTelPortable', '', array('pattern' => '[^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$]', 'title' => 'Saisir un numero de telephone valide.', 'placeholder' => '00 00 00 00 00')).'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Tel Fixe', 'lblTelFixe').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtTelFixe', '', array('pattern' => '[^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$]', 'title' => 'Saisir un numero de telephone valide.', 'placeholder' => '00 00 00 00 00')).'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Adresse', 'lblAdresse').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtAdresse').'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Code Postal', 'lblCodePostal').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtCodePostal', '', array('pattern' => '[0-9]*', 'title' => 'Saisir un code postal valide.')).'<BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"> <?php echo form_label('Ville', 'lblVille').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtVille', '', array('pattern' => '[A-Za-zÀ-ÿ](([-]?[a-zA-ZÀ-ÿ]+)*)', 'title' => 'Saisir une ville valide.')).'<BR><BR>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-1"> <?php echo form_submit('btnAjouter', 'Ajouter'); ?> </div>
        <div class="col-sm-10"></div>
    </div>
</div>
<?php echo form_close(); ?>