$(document).ready(function() {
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');
    var $metier = $('#metier');
    var $electif = $('#electif');
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

    
    // à la sélection de l'année dans la liste
    $annee.on('change', function() {
        hideAll(); 
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
        if(val == '2A') {


            $parcours.empty(); // on vide la liste des parcours
             
            $.ajax({
                url: 'query.php',
                data: "query=select&tablename=parcours&columns=*", 
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $parcours.append('<option value="'+ value.short_name + '">' + value.full_name + '</option>');
                    });
                }
            });
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
                    $.ajax({
                        url: 'query.php',
                        data: "query=select&tablename=groupe&columns=*", 
                        dataType: 'json',
                        success: function(json) {
                            var json_parsed=[];
                            for (var i = Object.keys(json).length - 1; i >= 0; i--) {
                                if (json[i].short_name[0]=="2") {
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

                    $electif.empty(); // on vide la liste des electifs
                     
                    $.ajax({
                        url: 'query.php',
                        data: "query=select&tablename=electif&columns=*", 
                        dataType: 'json',
                        success: function(json) {
                            $.each(json, function(index, value) {
                                $electif.append('<option value="'+ value.short_name + '">' + value.full_name + '</option>');
                            });
                        }
                    });
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
             
            $.ajax({
                url: 'query.php',
                data: "query=select&tablename=branch&columns=*", 
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $option.append('<option value="'+ value.short_name + '">' + value.full_name + '</option>');
                    });
                }
            });
            $option.prev().toggleClass("hide");
            $option.toggleClass("hide");

            $metier.empty(); // on vide la liste des options
             
            $.ajax({
                url: 'query.php',
                data: "query=select&tablename=job&columns=*", 
                dataType: 'json',
                success: function(json) {
                    $.each(json, function(index, value) {
                        $metier.append('<option value="'+ value.short_name + '">' + value.full_name + '</option>');
                    });
                }
            });
            $metier.prev().toggleClass("hide");
            $metier.toggleClass("hide");
        }      
    });
});