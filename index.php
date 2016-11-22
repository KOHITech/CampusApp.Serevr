<!DOCTYPE html>
<html>
 <head>
  <title>Add emploi du temps</title>
  <script src="jquery-3.1.1.min"></script>
  <script type="text/javascript">
    function salah2 () {
      $("#salah").css("color", "red");
    }
  </script>
 </head>
 <body>
<form method="post" action="">
  <div>
  Voir l'emploi du temps pour : <br>
    <select name="annee" onchange="salah2()">
      <option value="1" >Elève 1ère année</option>
      <option value="2" selected>Elève 2ème année</option>
      <option value="3">Elève 3ème année</option>
    </select>
    <br>
    Parcours : <br>
    <select id="salah" name="parcours">
      <option value="complexe" selected>Système Complèxe</option>
      <option value="africa">Doing business in africa</option>
    </select>
    <br>
    <br>
    <br>
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

<?php 
mysqli_connect("localhost","root","",'kohi_db');

if($bdd = mysqli_connect('localhost', 'root', '', 'kohi_db'))
{
  // Si la connexion a réussi, rien ne se passe.
}
else // Mais si elle rate…
{
  echo 'Erreur connexion BD'; // On affiche un message d'erreur.
}

mysqli_close($bdd);
?>


 </body>
</html>
