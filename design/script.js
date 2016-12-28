$(document).ready(function() {
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');


    // definition des fonction
    function chargement(nomtable,jqvar){
	    $.ajax({
	        url: 'query.php',
	        data: "query=select&tablename="+ nomtable +"&columns=*", // on envoie $_GET['go']
	        method: "GET",
	        dataType: 'json', // on veut un retour JSON
	        success: function(json) {
	            $.each(json, function(index,value) { // pour chaque noeud JSON
	                // on ajoute l option dans la liste
	                jqvar.append('<option value="'+ value.short_name +'">'+ value.full_name +'</option>');
	            });
	        }
	    });
    }

    function chargement_loop(nomtable,jqvar,num){
        $.ajax({
            url: 'query.php',
            data: "query=select&tablename=" +nomtable+ "&columns=*", 
            dataType: 'json',
            success: function(json) {
                var json_parsed = [];

                for (var i = Object.keys(json).length - 1; i >= 0; i--) {
                    if (json[i].short_name[0]==num) {
                     json_parsed.push(json[i]);
                    }
                }
                json_parsed.reverse();
                $.each(json_parsed, function(index, value) {
                    jqvar.append('<option value="'+ value.short_name + '">' + value.full_name + '</option>');
                });

            }
        });
    }

    function hideAll() {
        $parcours.parent().parent().addClass("hide");
        $groupe.parent().parent().addClass("hide");
        $option.parent().parent().addClass("hide");
    }
// fin definition des fonction
//
//
    // $annee.toggleClass("hide");
    // chargement des annee
    // hideAll();
    chargement("year", $annee);
    console.log($annee);
    // à la sélection de l'année dans la liste
    $annee.on('change', function() {
        hideAll(); 
        var val = $(this).val(); // on récupère la valeur de l'année
 
        if(val == '1A') {
            $groupe.empty(); // on vide la liste des groupes

            chargement_loop("groupe", $groupe, "1");

            $groupe.parent().parent().toggleClass("hide");
        }

       if(val == '2A') {
            hideAll(); 
            $parcours.empty(); // on vide la liste des parcours

            chargement("parcours",$parcours)

            $parcours.parent().parent().toggleClass("hide");
        }

       if(val == '3A') {
            $option.empty(); // on vide la liste des options 

            chargement("branch", $option)

            $option.parent().parent().toggleClass("hide");        
        }
    });

    $parcours.on("change", function(){
        $groupe.parent().parent().addClass("hide");
        var vall = $(this).val();
        //
        if (vall) {
            $groupe.empty();
            chargement_loop("groupe", $groupe, 2)
            $groupe.parent().parent().toggleClass("hide");
        }
    });

});