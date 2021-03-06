<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Page Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link href="bootstrap/css/1-col-portfolio.css" rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="./datatables/dataTables.css">
    <script type="text/javascript" charset="utf8" src="./datatables/dataTables.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link href="bootstrapdt/css/bootstrap.min.css" rel="stylesheet" media="screen">
   <link href="bootstrapdt/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <script>
        $(document).ready(function(){
            $('#table_rang').DataTable({
                searching: false
            });
        });

        function changeView(idView) {
            switch(idView) {
                case 'rang':
                    $('#rang').show();
                    $('#addTeam').hide();
                    $('#addMatch').hide();
                    break;
                case 'addTeam':
                    $('#rang').hide();
                    $('#addTeam').show();
                    $('#addMatch').hide();
                    break;
                case 'addMatch':
                    $('#rang').hide();
                    $('#addTeam').hide();
                    $('#addMatch').show();
                    break;
                default:
                    break;
            } 
        }
    </script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./PageUser.html">Les matchs à venir</a>
                    </li>
                    <li>
                        <a href="./PageUser.html">Mes paris</a>
                    </li>
                    <li>
                        <a href="./PageUser.html">Mon classement</a>
                    </li>
                    <li>
                        <a href="#">Administration</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="changeView('rang')">Voir le classement</button>
			<button type="button" class="btn btn-primary" onclick="changeView('addMatch')">Ajouter un match</button>
			<button type="button" class="btn btn-primary" onclick="changeView('addTeam')" >Ajouter une équipe</button>
		</div>
		
		<!-- Page classement -->
		
		<div id="rang">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Classement
                        <small>classement en fonction des points obtenus</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            
            <!-- tableau de classement -->
                    
            <div class="container">          
              <table class="table table-bordered" id="table_rang">
                <thead>
                  <tr>
                    <th>Position</th>
                    <th>Pseudo</th>
                    <th>Total de points</th>
                    <th>Match France - Allemagne</th>
                    <th>Match Espagne - Portugal</th>
                    <th>Match France - Espagne</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Lolilulz</td>
                    <td>8</td>
                    <td>3</td>
                    <td>1</td>
                    <td>4</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Profchen</td>
                    <td>6</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Benji</td>
                    <td>6</td>
                    <td>4</td>
                    <td>2</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Adrien</td>
                    <td>3</td>
                    <td>3</td>
                    <td style="text-align:center;">/</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <!-- table -->      
        </div>
		
        <div id="addTeam" style="display:none;">
            <form class="form-inline">
                <div class="form-group">
                    <label for="team_name">&Eacute;quipe</label><br><br>
                    <input type="text" class="form-control" id="team_name" placeholder="&Eacute;quipe">
                </div><br><br>
                <button type="submit" class="btn btn-default">Valider</button>
            </form>  
        </div>

        <div id="addMatch" style="display:none;">
            <!-- Page Heading -->
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">Ajouter un match
                           <small>sélectionner les 2 équipes et la date du match</small>
                       </h1>
                   </div>
               </div>
       
       
           <div class="row">
            <div class="col-md-6">                                         
                 <div class="dropdown">
                   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choisissez une équipe
                   <span class="caret"></span></button>
                   <ul class="dropdown-menu">
                     <li><a href="#">France</a></li>
                     <li><a href="#">Espagne</a></li>
                     <li><a href="#">Portugal</a></li>
                     <li><a href="#">Pays Bas</a></li>
                   </ul>
                 </div>
               </div>
               
               <div class="col-md-6">                           
                 <div class="dropdown">
                   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choisissez une équipe
                   <span class="caret"></span></button>
                   <ul class="dropdown-menu">
                     <li><a href="#">France</a></li>
                     <li><a href="#">Espagne</a></li>
                     <li><a href="#">Portugal</a></li>
                     <li><a href="#">Pays Bas</a></li>
                   </ul>
                 </div>
               </div></br></br></br>
               
               <div class="container">
                   <form action="" class="form-horizontal"  role="form">
                      <fieldset>
                           <legend>Sélectionnez la date et l'heure du match</legend>
                           <div class="form-group">
                               <label for="dtp_input1" class="col-md-2 control-label">Date :</label>
                               <div class="input-group date form_datetime col-md-5" data-date="2016-04-15T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                   <input class="form-control" size="16" type="text" value="" readonly>
                                   <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                   <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                               </div>
                               <input type="hidden" id="dtp_input1" value="" /><br/>
                           </div>
                       </fieldset>
                   </form>
               </div>
    
               <script type="text/javascript" src="jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
               <script type="text/javascript" src="bootstrapdt/js/bootstrap.min.js"></script>
              <script type="text/javascript" src="bootstrapdt/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
               <script type="text/javascript" src="bootstrapdt/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
               <script type="text/javascript">
                   $('.form_datetime').datetimepicker({
                       language:  'fr',
                       weekStart: 1,
                       todayBtn:  1,
                       autoclose: 1,
                       todayHighlight: 1,
                       startView: 2,
                       forceParse: 0,
                   });
               </script>
        </div>

        <hr>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
