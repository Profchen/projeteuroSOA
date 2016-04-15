<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="start" title="Accueil" href="../Front-End/index.php" />
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
</head>
<body>

<?php include_once('navbar.php'); ?>


<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-centered">

            <div class="list-survey">

                <h1>Liste des administrateurs</h1>

                <br>
                <table border="1" class="tableauUser" style="text-align:center">
                    <tr>
                        <th style="width:140px;text-align:center">
                            ID
                        </th>
                        <th style="width:140px;text-align:center">
                            Login
                        </th>
                        <th style="width:140px;text-align:center">
                            Password
                        </th>
                        <th style="width:140px;text-align:center">
                            Modifier
                        </th>
                        <th style="width:140px;text-align:center">
                            Supprimer
                        </th>
                    </tr>

                </table>
<br>

                <a href='formAdmin.php'> <div class='button'><input type='button' value='Ajouter un admin' class='btn btn-success'></div></a>
        </div>

        </div> <!-- /col-centered -->

    </div> <!-- /row-centered -->
</div> <!-- /container -->


<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="../Front-End/js/surveys.js"></script>

</body>

<script>
    $( document ).ready(function() {
        // GIF de loading

        $('#listSurvey').append('<center><img src="../img/loading.gif" alt="Chargement en cours..." title="Chargement..." /></center>');

        $.ajax({
            method: "GET",

            url : "http://" + IP_ADDRESS + "/SOA/php/ControllerWS.php?ws=user&action=getall",
            success: function(response) {

                $('ul.list-group').html('');
                var obj = jQuery.parseJSON(response);
                for(var i = 0; i < obj.length;i++){
                    $("table.tableauUser").append(
                        "<tr><td> " + obj[i].us_id + "</td>" +
                        "<td> " + obj[i].us_pseudo + "</td>" +
                        "<td> " + obj[i].us_pwd + "</td>" +
                        "<td> <a href='formAdmin.php?id="+ obj[i].us_id +
                        "'> <div class='button'><input type='button' value='Modifier' class='btn btn-primary'></div></a> </td>" +
                        "<td> <a href='http://" + IP_ADDRESS + "/SOA/php/ControllerWS.php?ws=User&action=remove&idAdmin="+ obj[i].us_id +"'> <div class='button'><input type='button' value='Supprimer' class='btn btn-danger'></div></a> </td>" +

                        "</tr>");
                }
            },
            error: function(){
                alert("PROBLEME");
            }
        });
    });

    function removeUser(us_id){
        alert("coucou" + ud_id);
    }
</script>
</html>