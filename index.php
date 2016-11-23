<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="img/campusapp.ico">

    <title>ECC Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
 </head>
 <body>
<form method="post" action="">
  <div>
    <p class="hide">Voir l'emploi du temps pour :</p>
    <select class="hide" name="annee" id="annee">
      <option value="" >-- Année --</option>
    </select>

    <p class="hide">Groupe : </p>
    <select class="hide" id="groupe" name="groupe">
      <option value="">--Groupe--</option>
    </select>

    <p class="hide">Parcours : </p>
    <select class="hide" id="parcours" name="parcours">
      <option value="">-- Parcours S8 --</option>
    </select>
    
    <p class="hide">Option : </p>
    <select class="hide" id="option" name="option">
      <option value="">-- Option 3A --</option>
    </select>
  </div>




<table border="3">
  <tr> <th>Lundi</th> <th>Mardi</th> <th>Mercredi</th> <th>Jeudi</th> <th>Vendredi</th> </tr>
<!-- début de la journée -->
<!-- de 8H à 10H -->
  <tr>
  <!-- Lundi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mardi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mercredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Jeudi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Vendredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  </tr>


<!-- de 10H à 12H -->
  <tr>
  <!-- Lundi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mardi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mercredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Jeudi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Vendredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  </tr>




<!-- Pause midi -->
  <tr>
  <!-- Lundi -->
    <td> Pause

  <!-- Mardi -->
    <td> Pause
  <!-- Mercredi -->
    <td> Pause
  <!-- Jeudi -->
    <td> Pause
  <!-- Vendredi -->
    <td> Pause

  </tr>


<!-- de 14H à 16H -->

  <tr>
  <!-- Lundi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mardi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mercredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Jeudi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Vendredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  </tr>
<!-- de 16H à 18H -->

  <tr>
  <!-- Lundi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mardi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Mercredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Jeudi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  <!-- Vendredi -->
    <td> 
    Matière : <br>
      <select name="matière">
        <option value="1" >matière 1</option>
        <option value="2" >matière 2</option>
        <option value="3" >matière 3</option>
        <option value="4" >matière 4</option>
        <option value="5" >matière 5</option>
      </select>
      <br> Salle : <br>
      <select name="Salle">
        <option value="boltzman" >boltzman</option>
        <option value="ibn sina" >ibn sina</option>
        <option value="poincaré" >poincaré</option>
        <option value="archimède" >archiméde</option>
        <option value="ibn rochd" >ibn rochd</option>
      </select>
    </td>
  </tr>



<!-- Fin de la journée -->

</table>

<br>
<input type="submit" value="Valider">


</form>

      <script src="js/jquery-3.1.1.min.js"></script>
      <script src="js/main.js"></script>
      <script src="dist/js/bootstrap.min.js"></script>


 </body>
</html>
