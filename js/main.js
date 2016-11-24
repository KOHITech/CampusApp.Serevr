$(document).ready(function() {
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');

    $annee.prev().toggleClass("hide");
    $annee.toggleClass("hide");
    // chargement des années
    $.ajax({
        url: 'query.php',
        data: "query=select&tablename=year&columns=*", // on envoie $_GET['go']
        method: "GET",
        dataType: 'json', // on veut un retour JSON
        success: function(json) {

            $.each(json, function(index,value) { // pour chaque noeud JSON
                // on ajoute l option dans la liste
                $annee.append('<option value="'+ value.short_name +'">'+ value.full_name +'</option>');
            });
        }
    });
 
    // à la sélection de l'année dans la liste
    $annee.on('change', function() {
        var val = $(this).val(); // on récupère la valeur de l'année
 
        if(val == '1A') {
            $groupe.empty(); // on vide la liste des groupes
             
            $.ajax({
                url: 'query.php',
                data: "query=select&tablename=groupe&columns=*", 
                dataType: 'json',
                success: function(json) {
                    var json_parsed = [];

                    for (var i = Object.keys(json).length - 1; i >= 0; i--) {
                        if (json[i].short_name[0]=="1") {
                         json_parsed.push(json[i]);
                        }
                    }
                    json_parsed.reverse();
                    $.each(json_parsed, function(index, value) {
                        $groupe.append('<option value="'+ value.short_name + '">' + value.full_name + '</option>');
                    });

                }
            });
            $groupe.prev().toggleClass("hide");
            $groupe.toggleClass("hide");
        }
     
    });
});