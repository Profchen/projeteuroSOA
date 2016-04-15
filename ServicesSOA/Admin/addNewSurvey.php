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

                    <h1>Créer une nouvelle enquête</h1>

                    <br><hr>

                    <div id="MSG"></div>

                    <br>

                    <label for="surveyName">Nom de l'enquête</label>
                    <input type="text" id="surveyName" name="surveyName" class="form-control" placeholder="Ex: Etudes sur les adolescents et les jeux vidéos ?"  required />

                    <br><br>

                    <label for="surveyDesc">Description de l'enquête</label>
                    <textarea name="surveyDesc" id="surveyDesc" class="form-control" rows="8" cols="40" placeholder="Ex: Cette courte enquête nous aidera à décider si les adolescents de notre époque sont addicts aux jeux vidéos." required></textarea>

                    <br><br>

                    <button class="btn btn-primary" onclick="createSurvey()">Créer l'enquête</button>
                </div>

            </div>


        </div> <!--/row-centered -->
    </div> <!--/container -->

    <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/common.js"></script>
    <script type="text/javascript" src="js/surveys.js"></script>
</body>
</html>
