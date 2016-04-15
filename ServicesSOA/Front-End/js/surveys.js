
// TODO
// - Compléter les URL de l'API
// - Vérifier les retours corrects de chaque fonction

function getAllSurveys(){

    // FAKE RETURN --- CODE DE DEV
    //return '[{"idSurvey": "1", "name": "Enquête sur les jeux vidéos chez les adolescents", "desc" : "Est-ce que les jeux vidéos rendent violent ?"},{"idSurvey": "2", "name": "Enquête sur la technologie chez les entreprises", "desc" : "Est-ce que les entreprises sont à jour ?"}]';

    // GIF de loading
    $('#listSurvey').append('<center><img src="../img/loading.gif" alt="Chargement en cours..." title="Chargement..." /></center>');

    $.ajax({
        url: WS_URL_GETALLSURVEY,
        // data: params,
        dataType:'json',
        type:'GET',
        success: function(data)
        {
            $('#listSurvey').html('');
            $.each(data, function(key, value){
                var idSurvey = value.idSurvey, name = value.name, desc = value.desc;
                $('#listSurvey').append('<a href="survey.php?id='+ idSurvey +'" class="list-group-item" title="' + desc + '">'+ name +'</a>');
            });
        },
        error: function(){
            alert('Problème rencontré dans le réseau.');
        }
    });

}


function getSurveyById(id){

    // FAKE RETURN --- CODE DE DEV
   /* if(id == 1)
        return '[{"idSurvey": "1", "name": "Enquête sur les jeux vidéos chez les adolescents", "desc" : "Est-ce que les jeux vidéos rendent violent ?"}]';

    if (id == 2)
        return '[{"idSurvey": "2", "name": "Enquête sur la technologie chez les entreprises", "desc" : "Est-ce que les entreprises sont à jour ?"}]';
*/
    // GIF de loading
    $('#listSurvey').append('<center><img src="../img/loading.gif" alt="Chargement en cours..." title="Chargement..." /></center>');
    $.ajax({
        url: WS_URL_GETSURVEYBYID + id,
        // data: params,
        type:'POST',
        async: false,
        success: function(data){
            $('#listSurvey').html('');

            var obj = jQuery.parseJSON(data);
            for(var i = 0; i < obj.length;i++){
                $('.title-survey').append('<h1>' + obj[i].name + '</h1><p>' + obj[i].description + '</p>');
            }
        },
        error: function(){
            alert('Problème rencontré dans le réseau.');
        }
    });

}

function getSurveyQuestionsById(id){

   // return '[{"idQuestion": "1", "title": "Jouez-vous de façon régulière aux jeux vidéos ?", "order" : "1", "titleResponse1" : "Non", "titleResponse2" : "Oui, un peu", "titleResponse3" : "Oui", "titleResponse4" : "Oui, très souvent"}, {"idQuestion": "2", "title": "Blabla question 2", "order" : "2", "titleResponse1" : "Non", "titleResponse2" : "Oui, un peu", "titleResponse3" : "Oui", "titleResponse4" : "Oui, très souvent"}]';

    console.log(WS_URL_GETSURVEYQUESTIONSBYID + id);
    $.ajax({
        url: WS_URL_GETSURVEYQUESTIONSBYID + id,
        // data: params,
        type:'POST',
        async: false,
        success: function(data){
            $('#listSurvey').html('');

            var obj = jQuery.parseJSON(data);
            for(var i = 0; i < obj.length;i++){

                $('.survey').append('<br><hr><br><h2>' +  obj[i].title + '</h2><br>');
                $('.survey').append('<span><label><input type="radio"  id="1" name="' +  obj[i].idQuestion + '" value="' +  obj[i].titleResponse1 +'" /> ' +  obj[i].titleResponse1 + '</label></span>');
                $('.survey').append('<span><label><input type="radio"  id="2" name="' +  obj[i].idQuestion + '" value="' +  obj[i].titleResponse2 +'" /> ' +  obj[i].titleResponse2 + '</label></span>');
                $('.survey').append('<span><label><input type="radio"  id="3" name="' +  obj[i].idQuestion + '" value="' +  obj[i].titleResponse3 +'" /> ' +  obj[i].titleResponse3 + '</label></span>');
                $('.survey').append('<span><label><input type="radio"  id="4" name="' +  obj[i].idQuestion + '" value="' +  obj[i].titleResponse4 +'" /> ' +  obj[i].titleResponse4 + '</label></span>');
            }
        },
        error: function(){
            alert('Problème rencontré dans le réseau.');
        }
    });

}

$("#sendAnswer").click(function()
{
    var answers = [];

    for(var i =0; i < $(".survey span input:radio:checked").length; i++) {
        //var radio = $($(".survey span input:radio:checked")[i]);

        answers.push($($(".survey span input:radio:checked")[i]).attr('name'));
        answers.push($($(".survey span input:radio:checked")[i]).attr('id'));

    }

    $.ajax({
        url: WS_URL_SENDDATA,
        type:'POST',
        async: false,
        data : { 'answers' : JSON.stringify(answers) },
        success: function(data){
           console.log("ok send");
            console.log(data);
        },
        error: function(msg){
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });

   // http://127.0.0.1/AGILE/php/controllerws.php?ws=survey&action=addAnswers     answers
});
