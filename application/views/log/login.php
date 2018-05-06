<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <!--link the bootstrap css file-->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <style type="text/css">
            .colbox {
                margin-left: 0px;
                margin-right: 0px;
            }
        </style>
    </head>

    <body style="background-color : #3e94ec;">


        <div class="container">

            <?= form_open('Authentification') ?>

            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>


            <h1> Authentification </h1>    

            <h2> Informations de connexion </h2>

            <h5>Nom utilisateur</h5>
            <input type="text" name="login" value="" size="25" />
            <?= form_error('login') ?>

            <h5>Mot de passe</h5>
            <input type="password" name="password" value="" size="25" />          
            <?= form_error('password') ?>



            <div><input type="submit" value="Envoyer" /></div> 

            <?= form_close() ?>
    <div>
        </a>
        <a href= "<?= base_url('index.php/Inscription/') ?>">
        <button>S'inscrire</button>
        </a>
    </div>
    </div>
    <!--load jQuery library-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--load bootstrap.js-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
