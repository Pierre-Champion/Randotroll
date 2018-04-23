<?php echo form_open('AdminOrganisation/ajouterBenevole'); ?>

<div class="container-fluid">
    <h2>Ajouter un Benevole</h2>
   
    <div class="row">
        <div class="col-sm-1"><?php echo form_label('Commission', 'lblNom').'<br>'; ?> </div>
        <div class="col-sm-1"> <?php echo form_input('txtNom', '', array('pattern' => '[A-Za-zÀ-ÿ](([-]?[a-zA-ZÀ-ÿ]+)*)', 'required' => 'required', 'title' => 'Saisir un nom valide.')).'<br>'; ?> </div>
        <div class="col-sm-10"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-1"> <?php echo form_submit('btnAjouter', 'Ajouter'); ?> </div>
        <div class="col-sm-10"></div>
    </div>
</div>
           
<?php echo form_close(); ?>
