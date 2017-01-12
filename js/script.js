$(document).ready(function() {
    var $emploi = $(".block3");
    var $annee = $('#annee');
    var $groupe = $('#groupe');
    var $parcours = $('#parcours');
    var $option = $('#option');
    var $room=$('#roomm');
    var $subject=$('#subjectt');
    var $prof=$('#proff');


    currentPos = 0;
    $btn = $(".btnAdd");
    $btn.on("click", function (e) {
        var ee = $(e.target).parent().attr("id")
        currentPos = ee[1] + "," + ee[2]; 
        console.log(currentPos);
    });

    // for (var i = 1; i < 6; i++) {
    //     for (var j = 1; j < 5; j++) {
    //         $btn = $((("#i" + j) + i) + " .btnAdd");
    //         console.log($btn);
    //         $btn.on("click", function () {
    //             currentPos = j + "," + i; 
    //             console.log(currentPos);
    //         });
    //     };
    // };


    var headers = {
        "year": "Année",
        "groupe": "Groupe",
        "parcours": "Parcours",
        "branch": "Option",
        "subject":"Matière",
        "room":"Salle",
        "professor":"Encadrant"
    }

    function get_code() {
        a = ($annee.parent().parent().hasClass("hide") == ($annee.val() == "" || $annee.val() == null)) == true;
        b = ($groupe.parent().parent().hasClass("hide") == ($groupe.val() == "" || $groupe.val() == null)) == true;
        c = ($parcours.parent().parent().hasClass("hide") == ($parcours.val() == "" || $parcours.val() == null)) == true;
        d = ($option.parent().parent().hasClass("hide") == ($option.val() == "" || $option.val() == null)) == true;

        s = [];
        s[0] = (a ? $annee.val() : "");
        s[3] = (d ? $option.val() : "");
        s[2] = (c ? $parcours.val() : "");
        s[1] = (b ? $groupe.val() : "");

        s = s.join("-");
        for (var i = s.length - 1; i >= 0; i--) {
            if (s[i] == "-") {
                s = s.substring(0, i);
            } else {
                break;
            }
        };
        return s
    }

    function fill_schedule(code){
        console.log(code);
        $.ajax({
            url: 'query.php',
            data: "query=select&tablename=task&columns=*&where=g_id;" + code, // on envoie $_GET['go']
            method: "GET",
            dataType: 'json', // on veut un retour JSON
            success: function(json) {
                $.each(json, function (index, value) {
                    p = value.position;
                    p = p.split(",");
                    p = ("#i" + p[0]) + p[1];
                    $p = $(p);
                    $p.data("filled", "1");
                    $p.removeClass("white");
                    $p.children("p.subject").html(value.name);
                    $p.children("p.prof").html(value.prof_id);
                    $p.children("p.salle").html(value.salle_id);
                });
                for (var i = 1; i < 6; i++) {
                    for (var j = 1; j < 5; j++) {
                        $t = $(("#i" + j) + i);
                        if ($t.data("filled") == "0") {
                            $t.children("p.subject").html("->");
                            $t.children("p.prof").html("libre");
                            $t.children("p.salle").html("<-");
                        };
                    };
                };
            }
        });
    }

    function get_g_id(){
        console.log(get_code());
        $.ajax({
            url: 'query.php',
            data: "query=select&tablename=groups&columns=*&where=code;" + get_code(), // on envoie $_GET['go']
            method: "GET",
            dataType: 'json', // on veut un retour JSON
            success: function(json) {
                a = 0
                $.each(json, function (index, value) {
                    a = value.groupe_id
                });
                fill_schedule(a);
            }
        });
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
        for (var i = 1; i < 6; i++) {
            for (var j = 1; j < 5; j++) {
                $t = $(("#i" + j) + i);
                $t.data("filled", "0");
                $t.addClass("white");
                $t.children("p.subject").html("");
                $t.children("p.prof").html("");
                $t.children("p.salle").html("");
            }
        }
        get_g_id();
    };

    $("#add").on("click", function() {
        console.log("salah");
        data_object = {};
        data_object['query'] = "create";
        data_object['tablename'] = "task";
        a = [];
        a[0] = "name~" + $("#subjectt option:selected").text();
        a[1] = "prof_id~" + $("#proff option:selected").text();
        a[2] = "salle_id~" + $("#roomm option:selected").text();
        a[3] = "position~" + currentPos;
        data_object['row'] = a.join(";");

        func = function (data) {
            $.ajax({
                url: 'query.php',
                data: data, // on envoie $_GET['go']
                method: "POST",
                dataType: 'json', // on veut un retour JSON
                success: function(json) {
                    
                }
            });
        };

        flag = false;

        tmpfunc = function() {
            $.ajax({
                url: 'query.php',
                data: "query=select&tablename=groups&columns=*&where=code;" + get_code(), // on envoie $_GET['go']
                method: "GET",
                dataType: 'json', // on veut un retour JSON
                success: function(json) {
                    console.log(json);
                    if(json == "") {
                        data = {};
                        data['query'] = "create";
                        data['tablename'] = "groups";
                        kk = [];
                        kk[0] = "code~" + get_code();
                        kk[1] = "users~1";
                        kk[2] = "groupe_name~hj";
                        console.log(kk);
                        data["row"] = kk.join(";");
                        func(data);
                        flag = true;
                        return;
                    }
                    $.each(json, function (index, value) {
                        data_object['row'] += ";g_id~" + value.groupe_id;
                        console.log(data_object);
                        func(data_object);
                    });
                }
            });
        };



        tmpfunc();
        console.log(flag);
        if(flag) {
            tmpfunc();
        }

        get_g_id();

    });



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
        $subject.empty();
        $subject.append("<option value=''>-- " + headers["subject"] + " --</option>");
        $room.empty();
        $room.append("<option value=''>-- " + headers["room"] + " --</option>");
        $prof.empty();
        $prof.append("<option value=''>-- " + headers["professor"] + " --</option>");
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
            chargement_loop("subject",$subject,"1");
            chargement("room",$room);
            // cette partie peut etre optimisée dans une fonction générique
            //
            $subject.on('change',function() {
                var valsubj=$(this).val();
                $.ajax({
                    url: 'query.php',
                    data: "query=select&tablename="+ "subject" +"&columns=*&where=short_name;"+valsubj, // on envoie $_GET['go']
                    method: "GET",
                    dataType: 'json', // on veut un retour JSON
                    success: function(json) {
                        $prof.empty();
                        //$prof.append("<option value=''>-- " + "Encadrant "+ " --</option>");
                        $.each(json, function(index,value) { // pour chaque noeud JSON
                            // on ajoute l option dans la liste
                            $prof.append('<option value="'+ value.short_name +'">'+ value.professor +'</option>');
                        });
                    }
                });

            })
        }

       if(val == '2A') {
            $parcours.append("<option value=''>-- Working --</option>");
            chargement("parcours",$parcours)

            $parcours.parent().parent().toggleClass("hide");
            chargement_loop("subject",$subject,"2");
            chargement("room",$room);
            // cette partie peut etre optimisée dans une fonction générique
            //
            $subject.on('change',function() {
                var valsubj=$(this).val();
                $.ajax({
                    url: 'query.php',
                    data: "query=select&tablename="+ "subject" +"&columns=*&where=short_name;"+valsubj, // on envoie $_GET['go']
                    method: "GET",
                    dataType: 'json', // on veut un retour JSON
                    success: function(json) {
                        $prof.empty();
                        //$prof.append("<option value=''>-- " + "Encadrant "+ " --</option>");
                        $.each(json, function(index,value) { // pour chaque noeud JSON
                            // on ajoute l option dans la liste
                            $prof.append('<option value="'+ value.short_name +'">'+ value.professor +'</option>');
                        });
                    }
                });

            })
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