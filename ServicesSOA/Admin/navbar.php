<?php $currentPage = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ADMINISTRATION</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php echo ($currentPage=='index.php' ) ? 'class="active"' : ''; ?>><a href="allAdmin.php">Voir tout</a></li>
                <li <?php echo ($currentPage=='addNewSurvey.php' ) ? 'class="active"' : ''; ?>><a href="addNewSurvey.php">Nouveau sondage</a></li>
                <li <?php echo ($currentPage=='listSurvey.php' ) ? 'class="active"' : ''; ?>><a href="listSurvey.php">Liste des sondages</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <input type="button" class="btn btn-default navbar-btn" value="Deconnexion" onclick="Logout()"/>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<script>
                      function Logout() { 
                                    
                                    var URL = "../php/ControllerWS.php"; // on recuperer l' adresse du lien
                                    $.ajax({// ajax
                                        url: URL, // url de la page à charger
                                        cache: false, // pas de mise en cache
                                        data : "ws=" + "user" +  "&action="+ "logout",
                                        dataType: 'text',
                                        type: 'GET',
                                        success: function (data) {// si la requête est un succès
                                            if(data == "false"){
                                                alert("deja d�connect�");
                                            }else{
                                                window.location = "../index.php";
                                            }
                                            
                                        },
                                        error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
                                        }
                                    });
                                    return false; // on desactive le lien
                                }
</script>