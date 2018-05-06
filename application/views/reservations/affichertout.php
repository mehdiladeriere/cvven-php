<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
</head>

<div class="table-title">
<h3>Liste des réservations</h3>
</div>
<?php $this->load->view('templates/bouttons'); ?>
<!-- affiche les résultats sous forme de tableau-->
<table class="table-fill">
<thead>
<tr> <!--1ère ligne, les titres de chaque colonne-->
        <th class="text-left">idReservation</th>
        <th class="text-left">Date reservation</th>
        <th class="text-left">Date arrivee</th>
        <th class="text-left">Date depart</th>
        <th class="text-left">Nombre de personnes</th>
        <th class="text-left">Menage fin de séjour</th>
        <th class="text-left">Pension complète</th>
        <th class="text-left">Demi-pension</th>
        <th class="text-left">Etat reservation</th>
        <th class="text-left">idClient</th>
</tr>
</thead>

<?php
foreach ($reservation as $reserv): ?>
<!-- resultats -->
        <tr>
        <td><?= $reserv->idReservation ?></td>
        <td><?= $reserv->dateReservation ?></td>
        <td><?= $reserv->dateArrivee ?></td>
        <td><?= $reserv->dateDepart ?></td>
        <td><?= $reserv->nbPersonnes ?></td>
        <td><?= $reserv->menage ?></td>
        <td><?= $reserv->pensionComplete ?></td>
        <td><?= $reserv->demiPension ?></td>
        <td><?= $reserv->etatReservation ?></td>
        <td><?= $reserv->idClient ?></td>
 </tr>
<?php endforeach; ?>
</div>
</table>