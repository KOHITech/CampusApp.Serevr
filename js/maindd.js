$(document).ready(function() {
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');
    var $metier = $('#metier');
    var $electif = $('#electif');
    alert("Welcome to Kohi Web Site")

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
        $parcours.addClass("hide");
        $parcours.prev().addClass("hide");
        $groupe.addClass("hide");
        $groupe.prev().addClass("hide");
        $option.addClass("hide");
        $option.prev().addClass("hide");
        $metier.addClass("hide");
        $metier.prev().addClass("hide");
        $electif.addClass("hide");
        $electif.prev().addClass("hide");
    }
// fin definition des fonction
//
//
    $annee.prev().toggleClass("hide");
    $annee.toggleClass("hide");
    // chargement des annee
    chargement("year",$annee);
    // à la sélection de l'année dans la liste
    $annee.on('change', function() {
        hideAll(); 
        var val = $(this).val(); // on récupère la valeur de l'année
 
        if(val == '1A') {
            $groupe.empty(); // on vide la liste des groupes

            chargement_loop("groupe",$groupe,1);

            $groupe.prev().toggleClass("hide");
            $groupe.toggleClass("hide");
        }

       if(val == '2A') {
            $parcours.empty(); // on vide la liste des parcours

            chargement("parcours",$parcours)

            $parcours.prev().toggleClass("hide");
            $parcours.toggleClass("hide");

            $parcours.on("change", function(){
                $groupe.addClass("hide");
                $groupe.prev().addClass("hide");
                $electif.addClass("hide");
                $electif.prev().addClass("hide");                
                var vall = $(this).val();
                //
                $groupe.empty();
                if (vall=='TC') {
                    $groupe.empty(); // on vide la liste des groupes

                    chargement_loop("groupe",$groupe,2)

                    $groupe.prev().toggleClass("hide");
                    $groupe.toggleClass("hide");

                    $electif.empty(); // on vide la liste des electifs

                    chargement("electif",$electif)

                    $electif.prev().toggleClass("hide");
                    $electif.toggleClass("hide");
                }

                else {
                    $groupe.addClass("hide");
                    $groupe.prev().addClass("hide");
                    $electif.addClass("hide");
                    $electif.prev().addClass("hide"); 
                    // cette ligne est un test
                    $groupe.empty();
                    $electif.empty();
                }
            })
        }

       if(val == '3A') {
            $option.empty(); // on vide la liste des options 

            chargement("branch",$option)

            $option.prev().toggleClass("hide");
            $option.toggleClass("hide");
            $metier.empty(); // on vide la liste des options

            chargement("job",$metier)

            $metier.prev().toggleClass("hide");
            $metier.toggleClass("hide");                                  
        
        }
    });

});