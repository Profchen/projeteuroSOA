var IP_ADDRESS = 'localhost';

// API URL
var WS_URL_GETALLSURVEY = 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=listing';
var WS_URL_GETSURVEYBYID = 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=find&idSurvey=';
var WS_URL_GETSURVEYQUESTIONSBYID = 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=questions&idSurvey=';
var WS_URL_SENDDATA = 'http://' + IP_ADDRESS + '/AGILE/php/controllerws.php?ws=survey&action=addAnswers';

// BACK
var WS_URL_CREATESURVEY = 'http://' + IP_ADDRESS + '/AGILE/php/ControllerWS.php?ws=survey&action=new&';

// Récupérer les GET de l'URL
// Utilisation : Url.get.NOMDUPARAMGET
// Ex: Url.get.id pour ?id=321563
var Url = {
    get get(){
        var vars= {};
        if(window.location.search.length!==0)
            window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value){
                key=decodeURIComponent(key);
                if(typeof vars[key]==="undefined") {vars[key]= decodeURIComponent(value);}
                else {vars[key]= [].concat(vars[key], decodeURIComponent(value));}
            });
        return vars;
    }
};
