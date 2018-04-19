<?php echo form_open('AdminOrganisation/ajouterContributeur'); ?>

<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Nom', 'lblNom').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtNom', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Prenom', 'lblPrenom').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtPrenom', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Email', 'lblEmail').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtEmail', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Tel Portable', 'lblTelPortable').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtTelPortable', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Tel Fixe', 'lblTelFixe').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtTelFixe', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Adresse', 'lblAdresse').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtAdresse', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Code Postal', 'lblCodePostal').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtCodePostal', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"> <?php echo form_label('Ville', 'lblVille').'<BR>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtVille', '', array('pattern' => '[a-zA-Z]*', 'required' => 'required', 'title' => 'Saisir des lettres.')).'<BR>'; ?> </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"> <?php echo form_submit('btnAjouter', 'Ajouter'); ?> </div>
        <div class="col-sm-5"></div>
    </div>
</div>
<?php echo form_close(); ?>