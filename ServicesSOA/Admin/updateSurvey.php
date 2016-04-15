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

            <div class="updateSurvey">

                <h1>Modification enquête</h1>

                <br><hr>

                <div id="MSG"></div>

                <br>

                <label for="surveyName">Nom de l'enquête</label>
                <input type="text" id="surveyName" name="surveyName" class="form-control" placeholder=""  required />

                <br><br>

                <label for="surveyDesc">Description de l'enquête</label>
                <textarea name="surveyDesc" id="surveyDesc" class="form-control" rows="4" cols="40" placeholder="" required></textarea>

                <br>

                <?php for ($i=1; $i <= 20; $i++) { ?>

                    <hr>

                    <label for="<?php echo $i; ?>-question" style="font-size:20px;">Question <?php echo $i; ?></label>
                    <input type="text" id="<?php echo $i; ?>-question" name="<?php echo $i; ?>-question" class="form-control">

                    <br>

                    <?php for ($j=1; $j <= 4; $j++) { ?>
                        <label for="<?php echo $i; ?>-answer-<?php echo $j; ?>">R<?php echo $j; ?> :</label>
                        <input type="text" id="<?php echo $i; ?>-answer-<?php echo $j; ?>" name="<?php echo $i; ?>-answer-<?php echo $j; ?>" class="form-control answer">
                    <?php } ?>
                <?php } ?>

                <br><br>

                <button class="btn btn-primary" onclick="createSurvey()">Modification l'enquête</button>
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
        //$('.updateSurvey').append('<center><img src="../img/loading.gif" alt="Chargement en cours..." title="Chargement..." /></center>');
        var id=Url.get.id;
        $.ajax({
            url: 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=find&idSurvey=' + id,
            // data: params,
            type:'POST',
            async: false,
            success: function(data){
                //$('.updateSurvey').html('');

                var obj = jQuery.parseJSON(data);

                for(var i = 0; i < obj.length;i++){
                    $('#surveyName').val(obj[i].name);
                    $('#surveyDesc').val(obj[i].description);
                }
            },
            error: function(){
                alert('Problème rencontré dans le réseau.');
            }
        });

        $.ajax({
            url: 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=questions&idSurvey=' + id,
            // data: params,
            type:'POST',
            async: false,
            success: function(data){
                //$('.updateSurvey').html('');

                var obj = jQuery.parseJSON(data);

                for(var i = 0; i < obj.length;i++){
                    $('#'+(i+1)+'-question').val(obj[i].title);
                    for(var j = 1 ; j < 5 ; j++) {
                        $('#'+(i+1)+'-answer-'+j).val(obj[i]['titleResponse'+j]);
                    }
                }
            },
            error: function(){
                alert('Problème rencontré dans le réseau.');
            }
        });




    });

</script>
</html>