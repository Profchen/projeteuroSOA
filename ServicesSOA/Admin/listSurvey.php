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

<?php include_once('navbar.php'); 
?>


<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-centered">

            <div class="list-survey">

                <h1>Liste des sondages modifiables</h1>

                <br>
                <ul class="list-group" id="listSurvey"><ul>

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

        $('#listSurvey').append('<center><img src="../img/loading.gif" alt="Chargement en cours..." title="Chargement..." /></center>');

        $.ajax({
            url: 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=listing',
            dataType:'json',
            type:'GET',
            success: function(data)
            {
                $('#listSurvey').html('');
                $.each(data, function(key, value){
                    var idSurvey = value.idSurvey, name = value.name, desc = value.desc;
                    $('#listSurvey').append('<a href="updateSurvey.php?id='+ idSurvey +'" class="list-group-item" title="' + desc + '">'+ name +'</a>');
                });
            },
            error: function(){
                alert('Problème rencontré dans le réseau.');
            }
        });
    });

</script>
</html>