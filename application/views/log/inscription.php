<html>
<head>
<title>My Form</title>
</head>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
<body>

<?php echo form_open('Inscription'); ?>
    
<?php if(isset($prenom)) { echo $prenom; } ?>

<h1> Création d'un compte utilisateur </h1>    
    
  <h2> Informations de connexion </h2>
          
<h5>Nom utilisateur</h5>
<input type="text" name="login" value="" size="25" />
<?= form_error('login') ?>

<h5>Mot de passe</h5>
<input type="text" name="password" value="" size="25" />          
<?= form_error('password') ?>
   
    
   <h2> Informations personnelles </h2>

<h5>Nom</h5>
<input type="text" name="nom" value="" size="25" />
<?= form_error('nom') ?>

<h5>Prénom</h5>
<input type="text" name="prenom" value="" size="25" />
<?= form_error('prenom') ?>

<h5>Date de naissance</h5>
<input type="text" name="datenaissance" value="" size="25" />
<?= form_error('datenaissance') ?>

<h5>Adresse</h5>
<input type="text" name="adresse" value="" size="25" />
<?= form_error('adresse') ?>

<h5>Ville</h5>
<input type="text" name="ville" value="" size="25" />
<?= form_error('ville') ?>

<h5>Code Postal</h5>
<input type="text" name="codepostal" value="" size="25" />
<?= form_error('codepostal') ?>

<h5>Téléphone</h5>
<input type="text" name="telephone" value="" size="25" />
<?= form_error('telephone') ?>

<h5>Adresse mail</h5>
<input type="text" name="email" value="" size="25" />
<?= form_error('email') ?>

<div><input type="submit" value="Envoyer" /></div> 

<?= form_close() ?>

</body>
</html>

