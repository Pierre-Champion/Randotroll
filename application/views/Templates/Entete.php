<html>
  <head>
    <title>Randotroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/Styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body>
    <div class="row">
      <div class="col-sm-12" style="background-color: rgb(50,0,0); height: 51px">
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Randotroll</a>
          </div>
    
          <ul class="nav navbar-nav">
          <?php
            $profil=false;
            if ($profil!=false) {
              echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Profil
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Link 1</a>
                  <a class="dropdown-item" href="#">Link 2</a>
                  <a class="dropdown-item" href="#">Link 3</a>
                </div>
              </li>';
            }
            else {
              echo '<li class="active"><a href="SeConnecter">Se connecter</a></li>';
              /*echo '<li class="nav-item active">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">
              Se connecter
              </a>
      
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
        
              <!-- Modal content-->
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
              <p>'; echo validation_errors();
              echo form_open('test/connect');
              echo form_label('Identifiant','txtIdentifiant');
              echo form_input('txtIdentifiant', set_value('txtIdentifiant'));
              echo form_label('Mot de passe','txtMotDePasse');
              echo form_password('txtMotDePasse', set_value('txtMotDePasse'));
              echo form_submit('submit', 'Se connecter');
              echo form_close();
              echo '</p>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
              </div>
              </div>
              </div>
              </li>';*/
            }
          ?>    
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </nav>
  </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="page">
    <?php  ?>