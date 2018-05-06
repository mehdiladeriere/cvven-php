<html>
<head>
<title>Modification mot de passe</title>
</head>
<body>

<?= form_open('password') ?>
    
<?php $message = $message ?? ""; ?>
    
<h1> Modifier le mot de passe </h1>    
    
  <h2> Informations de connexion </h2>
          
<h5>Mot de passe actuel</h5>
<input type="text" name="password" value="" size="25" />
<?= form_error('password') ?>
<?= $message ?>

<h5>Nouveau Mot de passe</h5>
<input type="text" name="new_password" value="" size="25" />          
<?= form_error('new_password') ?>

<h5>Confirmation du mot de passe</h5>
<input type="text" name="conf_password" value="" size="25" />          
<?= form_error('conf_password') ?>

<div><input type="submit" value="Envoyer" /></div> 

<?= form_close() ?>

</body>
</html>


