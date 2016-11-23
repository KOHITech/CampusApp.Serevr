$(document).ready(function() {
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');

     
    // chargement des régions
    $.ajax({
        url: 'query.php',
        data: {query: "select", tablename: ""}, // on envoie $_GET['go']
        dataType: 'json', // on veut un retour JSON
        success: function(json) {
            $.each(json, function(index, value) { // pour chaque noeud JSON
                // on ajoute l option dans la liste
                $annee.append('<option value="'+ index +'">'+ value +'</option>');
            });
        }
    });
 
    // à la sélection de l'année dans la liste
    $annee.on('change', function() {
        var val = $(this).val(); // on récupère la valeur de l'année
 
        if(val == '1A') {
            $groupe.empty(); // on vide la liste des départements
             
            $.ajax({
                url: 'query.php',
                data: 'id_annee='+ val, // on envoie $_GET['id_region']
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $groupe.append('<option value="'+ index +'">'+ value +'</option>');
                    });
                }
            });
        }
        if(val == '2A') {
            $groupe.empty(); // on vide la liste des départements
             
            $.ajax({
                url: 'query.php',
                data: 'id_annee='+ val, // on envoie $_GET['id_region']
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $groupe.append('<option value="'+ index +'">'+ value +'</option>');
                    });
                }
            });

            $parcours.empty();
            $.ajax({
                url: 'query.php',
                data: 'id_annee='+ val, // on envoie $_GET['id_region']
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $parcours.append('<option value="'+ index +'">'+ value +'</option>');
                    });
                }
            });
        }
        if(val == '3A') {
            $option.empty(); // on vide la liste des départements
             
            $.ajax({
                url: 'query.php',
                data: 'id_annee='+ val, // on envoie $_GET['id_region']
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $option.append('<option value="'+ index +'">'+ value +'</option>');
                    });
                }
            });
        }      
    });
});