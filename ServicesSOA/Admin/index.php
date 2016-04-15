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

                    <div class="login">
                        <h1>Connexion</h1>
                        <!--<form action="" method="POST">-->

                            <label for="login">Identififiant</label>
                            <input type="text" id="login" name="login" class="form-control" value="" placeholder="Entrez votre identifiant" />

                            <br>

                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" value="" placeholder="Entrez votre mot de passe">

                            <br><br>

                            <input type="submit" value="Se connecter" class="btn btn-primary" onclick="Login()">
                        <!--</form>-->
                    </div>

                </div>


            </div> <!--/row-centered -->
        </div> <!--/container -->


        <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/library/bootstrap.min.js"></script> 
        <script type="text/javascript" src="../js/main.js"></script>
        <script >
                                function Login() { 
                                    
                                    //alert('oooh quelqu\'un tente de ce connecter !');
                                    var URL = "../php/ControllerWS.php"; // on recuperer l' adresse du lien
                                    $.ajax({// ajax
                                        url: URL, // url de la page Ã  charger
                                        cache: false, // pas de mise en cache
                                        data : "ws=" + "user" +  "&action="+ "login" + "&login=" + document.getElementById("login").value + "&password=" + document.getElementById("password").value,
                                        dataType: 'text',
                                        type: 'GET',
                                        success: function (data) {// si la requÃªte est un succÃ¨s
                                            if(data == "false"){
                                                alert("le mot de passe ou l'identifiant n'est pas correct");
                                            }else{
                                                window.location = "listSurvey.php";
                                            }
                                            
                                        },
                                        error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
                                        }
                                    });
                                    return false; // on desactive le lien
                                }
        </script>
    </body>

</html>
