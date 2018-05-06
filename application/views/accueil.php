<!DOCTYPE html> 
<html>
    <head> 
        <meta charset = "utf-8"> 
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    </head>

    <body>        
        <h1><center><p style="color:black;">Bienvenue sur le site CVVEN </p></center></h1>
        <div id="" style="text-align: center;">
            <a href= "<?= base_url('index.php/Authentification') ?>">
                <button>Se connecter</button>
            </a>
        </div>
    <center><img id="toureiffel" src="http://cvvenphp.22web.org/image/toureiffel.jpg" alt="toureiffel"/></center>

    <center><p style="color:#BC8F8F"><?php echo'Cliquez <a href="index.php/reservations/ajouter"> ici</a> pour ajouter une réservation.'; ?></p></center>
    <br>
    <center><p style="color:#BC8F8F"><?php echo'Cliquez <a href="index.php/reservations/affichertout"> ici</a> pour afficher toutes les réservations.'; ?></p></center>
</body>

</html>