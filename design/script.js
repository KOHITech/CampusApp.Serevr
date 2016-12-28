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

    function chargement_prof(nomtable,jqvar,subject){
        $.ajax({
            url: 'query.php',
            data: "query=select&tablename="+ nomtable +"&columns=*", // on envoie $_GET['go']
            method: "GET",
            dataType: 'json', // on veut un retour JSON
            success: function(json) {
                $.each(json, function(index,value) { // pour chaque noeud JSON
                    // on ajoute l option dans la liste

                    if (value.short_name==subject.val()) {
                       jqvar.append('<option value="'+ value.short_name +'" selected>'+ value.professor +'</option>'); 
                    }
                    else{ 
                    jqvar.append('<option value="'+ value.short_name +'">'+ value.professor +'</option>');   
                    }
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

// script modal
// script modal
// script modal

    var $subject_select = $('#subject_select');
    var $professor = $('#professor');
    var $salle = $('#salle');  
    var $eleve1a = $('#eleve1A');
    var $eleve2a = $('#eleve2A');
    var $eleve3a = $('#eleve3A');
    var $eleve1aE= $('#eleve1Aentete');
    var $eleve2aE= $('#eleve2Aentete');
    var $eleve3aE= $('#eleve3Aentete');

    function chargement_checkbox(nomtable,jqvar,num){ // pour charger les checkbox du modal
        $.ajax({
            url: 'query.php',
            data: "query=select&tablename="+ nomtable +"&columns=*", // on envoie $_GET['go']
            method: "GET",
            dataType: 'json', // on veut un retour JSON
            success: function(json) {
                var json_parsed = [];

                for (var i = Object.keys(json).length - 1; i >= 0; i--) {
                    if (json[i].short_name[0]==num) {
                     json_parsed.push(json[i]);
                    }
                }
                json_parsed.reverse();
                $.each(json_parsed, function(index, value) {
                    jqvar.append('<label><input type="checkbox" name="choix"'+index+'" value="'+value.short_name+'" class="C2">'+value.full_name+'</label>');
                });
            }
        });
    }
     
    //function hide_checkbox() {  // pour cacher les listes du modal 

        //}
    //chargement("professor",$professor);
    chargement("room",$salle); 
    $annee.on('change', function() {
        var val = $(this).val(); // on récupère la valeur de l'année
        $eleve1a.addClass("hide");
        $eleve2a.addClass("hide");
        $eleve3a.addClass("hide");
        $eleve1aE.addClass("hide");
        $eleve2aE.addClass("hide");
        $eleve3aE.addClass("hide");
        if(val == '1A') {
            $subject_select.empty(); // on vide la liste des groupes
            chargement_loop("subject",$subject_select,1);
            $subject_select.on('change', function() {
                $professor.empty();
                chargement_prof("subject",$professor,$(this));

            });
            $eleve1a.empty();
            chargement_checkbox("groupe",$eleve1a,1);
            $eleve1a.toggleClass("hide"); 
            $eleve1aE.toggleClass("hide");

        };

        if(val== '2A') {
            $subject_select.empty(); // on vide la liste des groupes
            chargement_loop("subject",$subject_select,2);  
            $eleve2a.empty();
            chargement_checkbox("groupe",$eleve2a,2);
            $eleve2a.toggleClass("hide");
            $eleve2aE.toggleClass("hide");           
        }
        if(val== '3A') {
            $subject_select.empty(); // on vide la liste des groupes
            chargement_loop("subject",$subject_select,3); 
            $eleve3a.empty();
            chargement_checkbox("groupe",$eleve3a,3);
            $eleve3a.toggleClass("hide"); 
            $eleve3aE.toggleClass("hide");           
        }

    });

    // fonction pour cocher toutes les cases
    function checkAll (identete,idcheckall){
        $(identete).find( $('input:checkbox') ).not( $(idcheckall) ).each(
            function() {
                $(this).prop("checked",$(idcheckall).is(":checked"));
            }
        );
    }
    function initialize (identete,idcheckall) {
        $(idcheckall).on('change', function () {
            checkAll(identete,idcheckall);   
        });
    }

    initialize('#eleve1Aentete','#CheckAll1');
    initialize('#eleve2Aentete','#CheckAll2');
    initialize('#eleve3Aentete','#CheckAll3');

});

