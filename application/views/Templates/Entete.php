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
<nav class="navbar navbar-inverse navbar-fixed">
  <div class="container-fluid">
    <div class="navbar-header dropdown">
      <a class="navbar-brand dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Randotroll</a>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">A propos de nous</a></li>
          <li><a class="dropdown-item" href="#">Nous contacter</a></li>
        </ul>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="Accueil">Home</a></li>
    <?php
    if (isset($this->session->statut) && $this->session->statut == 'Responsable')
    {
        echo '<li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Profil
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/Randotroll/index.php/Responsable/VoirProfil">Voir mon profil</a></li>
          <li><a class="dropdown-item" href="/Randotroll/index.php/Responsable/ModifierProfil">Modifier mon profil</a></li>
          <li><a class="dropdown-item" href="/Randotroll/index.php/Responsable/ModifierMDP">Modifier mot de passe</a></li>
          <li><a class="dropdown-item" href="/Randotroll/index.php/Responsable/deconnexion">Me déconnecter</a></li>
        </ul>
        </li>
        <li class="active"><a href="/Randotroll/index.php/Responsable/GererEquipe">Gérer mon équipe</a></li>';
    }
    else
    {
      echo '<li class="active"><a href="/Randotroll/index.php/Visiteur/SeConnecterResponsable">Me connecter</a></li>';
    }
    ?>
        </ul>
      </div>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 page">