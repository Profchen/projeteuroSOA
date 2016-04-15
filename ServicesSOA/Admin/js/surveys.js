function createSurvey() {

    var surveyName = $('input:text#surveyName').val();
    var surveyDesc = $('textarea#surveyDesc').val();

    if (surveyName != "" && surveyDesc != "") {

        var url = 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=new&name=' + surveyName + '&description=' + surveyDesc;

        $.ajax({
            url: url,
            dataType: 'json',
            type: 'GET',
            success: function(data) {
                var surveyId = jQuery.parseJSON(data);
                window.location.href = "addQuestions.php?id=" + surveyId;
            },
            error: function() {
                alert('Problème rencontré dans le réseau.');
            }
        });

    } else {
        $('#MSG').html('<p class="danger">Vous devez remplir les champs requis !</p>');
        $('input').css('border', '1px solid red');
        $('textarea').css('border', '1px solid red');
    }


}

function createQuestions() {

    var questionsArray = [];

    for (var i = 1; i <= 20; i++) {

        // Génération des questions & réponses dans des objets JSON distincts
        // Push dans le array qui contient toutes les questions
        var newQuestionJSON = '{';

        var questionName = $('input:text#' + i + '-question').val();
        newQuestionJSON += '"title": "' + questionName + '", "order": ' + i + ',';

        for (var j = 1; j <= 4; j++) {
            var answer = $('input:text#' + i + '-answer-' + j).val();
            newQuestionJSON += '"titleResponse' + j + '" : "' + answer + '"';

            if (j != 4)
                newQuestionJSON += ',';
        }

        newQuestionJSON += '}';


        // console.log(newQuestionJSON);

        questionsArray.push(JSON.parse(newQuestionJSON));
    }

    console.log(questionsArray);

    var url = 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=question&action=add&idSurvey='+Url.get.id;

    $.ajax({
        url: url,
        data: {'questions': JSON.stringify(questionsArray)},
        dataType: 'text',
        type: 'POST',
        success: function(data) {
            // var obj = jQuery.parseJSON(data);
            if(data == "true")
                $('#MSG').html('<p class="success">Questions enregistrées !</p>');
        },
        error: function() {
            alert('Problème rencontré dans le réseau.');
        }
    });

}

// function addQuestionInputs(){
//     var questionTemplate = '<hr>
//
//                         <label for="2-question" style="font-size:20px;">Question 2</label>
//                         <input type="text" id="2-question" name="2-question" class="form-control">
//
//                         <br>
//
//                                                     <label for="2-answer-1">R1 :</label>
//                             <input type="text" id="2-answer-1" name="2-answer-1" class="form-control answer">
//                                                     <label for="2-answer-2">R2 :</label>
//                             <input type="text" id="2-answer-2" name="2-answer-2" class="form-control answer">
//                                                     <label for="2-answer-3">R3 :</label>
//                             <input type="text" id="2-answer-3" name="2-answer-3" class="form-control answer">
//                                                     <label for="2-answer-4">R4 :</label>
//                             <input type="text" id="2-answer-4" name="2-answer-4" class="form-control answer">';
// }


function getSurveyById(id) {

    $.ajax({
        url: WS_URL_GETSURVEYBYID + id,
        // data: params,
        type: 'POST',
        // async: true,
        success: function(data) {
            var obj = jQuery.parseJSON(data);
            for (var i = 0; i < obj.length; i++) {
                $('#surveyTitle').append(obj[i].name);
                $('#surveyDesc').append(obj[i].description);
            }
        },
        error: function() {
            alert('Problème rencontré dans le réseau.');
        }
    });

}
