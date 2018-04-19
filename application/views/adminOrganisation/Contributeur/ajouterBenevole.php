<?php echo form_open('AdminOrganisation/ajouterContributeur'); ?>

<div class="container-fluid">
    <h2>Ajouter un Contributeur</h2>
   
    <div class="row">
        <div class="col-sm-1">
        <div class="col-sm-1"> <?php echo form_submit('btnAjouter', 'Ajouter'); ?> </div>
        <div class="col-sm-10"></div>
    </div>
</div>
           
<?php echo form_close(); ?>