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

                    <div class="title-survey"></div>

                    <div class="survey"></div>

                </div>
                <input type ="button" value="Envoyer" name="btnSubmit" id="sendAnswer">
            </div> <!-- /col-centered -->

        </div> <!-- /row-centered -->

    </div> <!-- /container -->


    <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/common.js"></script>
    <script type="text/javascript" src="js/surveys.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            // TODO:
            // - Vérifier la récupération du sondage courant getSurveyById
            // - Vérifier la récupération des questions getSurveyQuestionsById


            // Rechercher le sondage qui a été sélectionné par l'id (GET)
//            var survey = $.parseJSON(getSurveyById(Url.get.id));
//            $.each(survey, function(key, value){
//                var idSurvey = value.idSurvey, name = value.name, desc = value.desc;
//                $('.title-survey').append('<h1>' + name + '</h1><p>' + desc + '</p>');
//            });

            getSurveyById(Url.get.id);

            // A modifier par getSurveyQuestionsById(id);
            getSurveyQuestionsById(Url.get.id);


//            $.each(surveyQuestions, function(key, value){
//                var idQuestion = value.idQuestion, title = value.title, order = value.order;
//                var titleResponse1 = value.titleResponse1, titleResponse2 = value.titleResponse2, titleResponse3 = value.titleResponse3, titleResponse4 = value.titleResponse4;
//
//                $('.survey').append('<br><hr><br><h2>' + title + '</h2><br>');
//                $('.survey').append('<span><label><input type="radio" name="' + idQuestion + '[]" value="' + titleResponse1 +'" /> ' + titleResponse1 + '</label></span>');
//                $('.survey').append('<span><label><input type="radio" name="' + idQuestion + '[]" value="' + titleResponse2 +'" /> ' + titleResponse2 + '</label></span>');
//                $('.survey').append('<span><label><input type="radio" name="' + idQuestion + '[]" value="' + titleResponse3 +'" /> ' + titleResponse3 + '</label></span>');
//                $('.survey').append('<span><label><input type="radio" name="' + idQuestion + '[]" value="' + titleResponse4 +'" /> ' + titleResponse4 + '</label></span>');
//            });

        });

    </script>
</body>

</html>
