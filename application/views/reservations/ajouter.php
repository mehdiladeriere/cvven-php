<head>
    <meta charset = "utf-8">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
  
    <!-- scripts pour le calendrier-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#datepicker0" ).datepicker({dateFormat : "yy/mm/dd",minDate : '0', maxDate : '0'});
    $( "#datepicker" ).datepicker({dateFormat : "yy/mm/dd",minDate : '0'});
    $( "#datepicker2" ).datepicker({dateFormat : "yy/mm/dd", minDate : '0', maxDate : '+7'});
  } );
  </script>
  
</head>

<h1 align="center"><?= $titre ?></h1>
<?php $this->load->view('templates/bouttons'); ?>

<?= validation_errors() ?>

<?= form_open('reservations/ajouter') ?>
<!-- formulaire d'ajout-->

<label for="dateArrivee">Date Réservation</label>
<input type="date"  id="datepicker0" name="dateReservation" placeholder="Ex : 2017-08-01"/>

<br>

<label for="dateArrivee">Date Arrivée</label>
<input type="date"  id="datepicker" name="dateArrivee" placeholder="Ex : 2017-09-01"/>

<br>

<label for="dateDepart">Date Départ</label>
<input type="date" id="datepicker2" name="dateDepart" placeholder="Ex : 2017-09-07"/>

<br>

<label for="nbPersonnes">Nombre de Personne(s)</label>
<input type="number" name="nbPersonnes" placeholder="Ex : 2" min="1"/>

<br>

<label for="menage">Menage fin de séjour</label> 
<input type="radio" name="menage" value="1" />Oui
<input type="radio" name="menage" value="0" />Non

<br>

<label for="pensionComplete">Pension complète</label>
<input type="radio" name="pensionComplete" value="1" />Oui
<input type="radio" name="pensionComplete" value="0" />Non

    <br>

<label for="demiPension">Demi-pension</label>
<input type="radio" name="demiPension" value="1" />Oui
<input type="radio" name="demiPension" value="0" />Non

    <br> 

<label for="etatReservation">Etat Réservation : </label>
<select name="etatReservation" id="etatReservation">
    <option value="en Attente"> En attente </option>
    <option value="en Cours"> En cours </option>
    <option value="valider"> Valider </option>
</select>    

    <br>

<label for="idClient">idClient</label>
<input type="number" name="idClient" placeholder="numero de client" min="1"/>

<br> <br>

<div align="center">
<input type="submit" name="submit" value="Ajouter"/>
<input type="reset" value="Annuler">
</div>

</form>

