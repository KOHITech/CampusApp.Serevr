$(document).ready(function() {
    var $emploi = $(".block3");
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');


    var headers = {
        "year": "Année",
        "groupe": "Groupe",
        "parcours": "Parcours",
        "branch": "Option"
    }
    
    check_combo = function() {
        a = ($annee.parent().parent().hasClass("hide") == ($annee.val() == "" || $annee.val() == null)) &&
            ($groupe.parent().parent().hasClass("hide") == ($groupe.val() == "" || $groupe.val() == null)) &&
            ($parcours.parent().parent().hasClass("hide") == ($parcours.val() == "" || $parcours.val() == null)) &&
            ($option.parent().parent().hasClass("hide") == ($option.val() == "" || $option.val() == null));
        console.log("executed");
        console.log(a);
        if(!a) {
            $emploi.hide();
        } else {
            $emploi.show();
        }
    };

    // $annee.on("change", check_combo);
    $groupe.on("change", check_combo);
    // $parcours.on("change", check_combo);
    $option.on("change", check_combo);

    // definition des fonction
    function chargement(nomtable,jqvar){
	    $.ajax({
	        url: 'query.php',
	        data: "query=select&tablename="+ nomtable +"&columns=*", // on envoie $_GET['go']
	        method: "GET",
	        dataType: 'json', // on veut un retour JSON
	        success: function(json) {
                jqvar.empty();
                jqvar.append("<option value=''>-- " + headers[nomtable] + " --</option>");
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
                jqvar.empty();
                jqvar.append("<option value=''>-- " + headers[nomtable] + " --</option>");
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

    function emptyAll() {
        $parcours.empty();
        $parcours.append("<option value=''>-- " + headers["parcours"] + " --</option>");
        $groupe.empty();
        $groupe.append("<option value=''>-- " + headers["groupe"] + " --</option>");
        $option.empty();
        $option.append("<option value=''>-- " + headers["branch"] + " --</option>");
    }
// fin definition des fonction
//
//
    // $annee.toggleClass("hide");
    // chargement des annee
    // hideAll();
    chargement("year", $annee);
    // à la sélection de l'année dans la liste
    $annee.on('change', function() {
        hideAll(); 
        emptyAll(); 
        var val = $(this).val(); // on récupère la valeur de l'année
 
        if(val == '1A') {
            $groupe.append("<option value=''>-- Working --</option>");
            chargement_loop("groupe", $groupe, "1");

            $groupe.parent().parent().toggleClass("hide");
        }

       if(val == '2A') {
            $parcours.append("<option value=''>-- Working --</option>");
            chargement("parcours",$parcours)

            $parcours.parent().parent().toggleClass("hide");
        }

       if(val == '3A') {
            $option.append("<option value=''>-- Working --</option>");
            chargement("branch", $option)

            $option.parent().parent().toggleClass("hide");        
        }
        check_combo();
    });

    $parcours.on("change", function(){
        $groupe.parent().parent().addClass("hide");
        $groupe.empty();
        
        var vall = $(this).val();
        //
        if (vall == "TC") {
            chargement_loop("groupe", $groupe, 2)
            $groupe.parent().parent().toggleClass("hide");
        }
        check_combo();
    });

});