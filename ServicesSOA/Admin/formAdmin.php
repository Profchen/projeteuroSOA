<!DOCTYPE html>
<html>
<head>
    <title>Authentification</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="start" title="Accueil" href="index.php" />
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
</head>
<body>

<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-xs-12 col-centered vcenter">

            <div class="us_pseudo">
                <h1 id="title">Ajouter</h1>
                    <label for="us_pseudo">Identififiant</label>
                    <input type="text" id="us_pseudo" name="us_pseudo" class="form-control" value="" placeholder="Entrez votre identifiant" />

                    <br>

                    <label for="us_pwd">Mot de passe</label>
                    <input type="us_pwd" id="us_pwd" name="us_pwd" class="form-control" value="" placeholder="Entrez votre mot de passe">

                    <br>

                    <label for="us_pwd">V&eacute;rification du mot de passe</label>
                    <input type="us_pwd" id="us_pwd2" name="us_pwd2" class="form-control" value="" placeholder="Entrez � nouveau votre mot de passe">

                    <br><br>
                    <div id="button">
                        <input type="submit" value="Valider" class="btn btn-primary">
                    </div>
            </div>

        </div>


    </div> <!--/row-centered -->
</div> <!--/container -->


<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript">
    var url = window.location.search;
    var idSurvey = url.substring(url.lastIndexOf("=")+1);

    if (idSurvey != ''){

        $('#title').html('Modifier');
        $('#button').val("Modifier")
        $('#button').html(' <input type="submit" value="Modifier" class="btn btn-primary">')
        $.ajax({
            url: "http://" + IP_ADDRESS + "/SOA//php/ControllerWS.php?ws=User&action=selectAdmin",
            type:'GET',
            async: false,
            data : { 'us_id' : idSurvey },
            success: function(data){
                $('#us_pseudo').val(jQuery.parseJSON(data)[0].us_pseudo);
                $('#us_pwd').val(jQuery.parseJSON(data)[0].us_pwd);
            },
            error: function(msg){
                console.log(msg.responseType);
                console.log('Probl�me rencontr� dans le r�seau.');
            }
        });

    }else{
            $('#us_pseudo').attr('placeholder','Votre us_pseudo');
            $('#us_pwd').attr('placeholder','us_pwd');
            $('#us_pwd2').attr('placeholder','us_pwd');


        $('#title').html('Ajouter');
        $('#button').val("Valider")
        $('#button').html(' <input type="submit" value="Valider" class="btn btn-primary">')

    }

    $('#button').click(function(){
        if($('#us_pseudo').val() === '' || $('#us_pwd').val() === '' || $('#us_pwd2').val() === ''){
            alert('Vous devez entrer tous les champs');
        }else{
            if($('#us_pwd').val() === $('#us_pwd2').val()){
                if (idSurvey != ''){
                    $.ajax({
                        url: "http://" + IP_ADDRESS + "/SOA//php/ControllerWS.php?ws=User&action=modify",
                        type:'GET',
                        async: false,
                        data : { 'us_id' : idSurvey, 'us_pseudo' : $('#us_pseudo').val(), 'us_pwd' : $('#us_pwd').val() },
                        success: function(data){
                            document.location.href = "alladmin.php"
                        },
                        error: function(msg){
                            console.log(msg.responseType);
                            console.log('Probl�me rencontr� dans le r�seau.');
                        }
                    });
                }else{
                    $.ajax({
                        url: "http://" + IP_ADDRESS + "/SOA/php/ControllerWS.php?ws=User&action=register",
                        type:'GET',
                        async: false,
                        data : { 'us_pseudo' : $('#us_pseudo').val(), 'us_pwd' : $('#us_pwd').val() },
                        success: function(data){
                            console.log("URL http://" + IP_ADDRESS + "/SOA/php/ControllerWS.php?ws=User&action=register")
                            document.location.href = "alladmin.php"
                        },
                        error: function(msg){
                            console.log(msg.responseType);
                            console.log('Probl�me rencontr� dans le r�seau.');
                        }
                    });
                }
            }else{
                alert('Les deux mots de passe ne sont pas similaires');
            }
        };
    });

</script>
</body>
</html>
