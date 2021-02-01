<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>LITIN en linea</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
    <center>
      <img src="img/logo.jpg" width="100">

      <form class="form-signin" method="post" action="buscar.php" autocomplete="off">
        <h3 class="form-signin-heading">LITIN en linea</h3>
        <label>Cedula del Representante</label>
        <input type="text" name="cedula" id="cedula" class="form-control" placeholder="00000000" maxlength="8" required autofocus>
        <br>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </form>

    </center>
    </div> <!-- /container -->
    
  </body>
</html>
