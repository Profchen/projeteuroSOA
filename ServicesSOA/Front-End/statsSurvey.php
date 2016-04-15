<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="start" title="Accueil" href="index.php" />
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
</head>
<body>

<?php include_once('navbar.php'); ?>


<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-centered">

            <div class="list-survey">

                <h1>Statistiques</h1>

                <br>
                        <ul class="list-group">

                        </ul>

            </div>

        </div> <!-- /col-centered -->

    </div> <!-- /row-centered -->
</div> <!-- /container -->


<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="js/surveys.js"></script>

</body>

<script>
    $( document ).ready(function() {
        // GIF de loading
        $('ul.list-group').append('<center><img src="../img/loading.gif" alt="Chargement en cours..." title="Chargement..." /></center>');

        //Recupere l'id en parametre
        var url = window.location.search;
        var idSurvey = url.substring(url.lastIndexOf("=")+1);

        $.ajax({
            method: "GET",
            url : 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=Survey&action=get&idSurvey='+idSurvey+'&action=stats',
            success: function(response) {

                $('ul.list-group').html('');
                var obj = jQuery.parseJSON(response);
                for(var i = 0; i < obj.length;i++){
                    $("ul.list-group").append(
                        "<li class='list-group-item'>N&deg;"+(i+1) + " : " + obj[i].title  +
                        " A : " + Math.round(obj[i].A*100)/100 + "%" +
                        " B : " + Math.round(obj[i].B*100)/100 + "%" +
                        " C : " + Math.round(obj[i].C*100)/100 + "%" +
                        " D : " + Math.round(obj[i].D*100)/100 + "%" +
                        "</li>");
                }
            },
            error: function(){
                alert("PROBLEME");
            }
        });
    });

</script>
</html>