<!DOCTYPE html>
<html>
<head>
    <title>Créer une enquête</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="start" title="Accueil" href="index.php" />
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
</head>
<body>

    <?php include_once('navbar.php');?>

    <div class="container">
        <div class="row-centered">

            <div class="col-md-12 col-xs-12 col-centered vcenter">

                <div class="createSurvey">

                    <!-- Bouton de sauvegarde en fixed -->
                    <div class="validateBox">
                        <button class="btn btn-success" onclick="createQuestions()" style="font-weight:bold" id="save">ENREGISTRER TOUT</button>
                    </div>

                    <h1 id="surveyTitle"></h1>
                    <p id="surveyDesc"></p>

                    <div id="MSG"></div>

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

                    <div id="newQuestionInputs"></div>

                    <br><br>

                    <!-- <button class="btn btn-primary" onclick="addQuestionInputs()">Ajouter une question</button> -->

                    <br><br>

                </div>

            </div>


        </div> <!--/row-centered -->
    </div> <!--/container -->

    <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/common.js"></script>
    <script type="text/javascript" src="js/surveys.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            var paramIdSurvey = Url.get.id;

            getSurveyById(paramIdSurvey);

        });
    </script>
</body>
</html>
