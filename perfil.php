<?php  
  session_start();
  if ($_SESSION["cedula"] == true) {
?>
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
    <script src="js/valida.js"></script>
    <script type="text/javascript">
      var pepe;
      function ini() {
        pepe = setTimeout('location="salir.php"',300000); // 5 segundos
      }
      function parar() {
        clearTimeout(pepe);
        pepe = setTimeout('location="salir.php"',300000); // 5 segundos
      }
    </script>
  </head>
  <body onload="ini()" onkeypress="parar()" onclick="parar()">

    <div class="container">
    <center>
      <img src="img/logo.jpg" width="100">

      <form class="form-signin" method="post" action="buscar.php" autocomplete="off">
        <h3 class="form-signin-heading">LITIN en linea</h3>
        <div class="form-group has-success has-feedback">
          <label class="control-label" for="inputSuccess2">Cedula del representante</label>
          <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<? echo $_SESSION["cedula"]; ?>" disabled>
          <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
          <span id="inputSuccess2Status" class="sr-only">(success)</span>
        </div>
        <div class="form-group has-success has-feedback">
          <label class="control-label" for="inputSuccess"><? echo $_SESSION["nombrer"]; ?></label>
        </div>
        <button class="btn btn-primary" type="button" onclick="window.location='edocuenta.php';">Estado de cuenta</button>


        <!-- SI ESTA SOLVENTE VE EL BOLETIN -->
        <? if ($_SESSION["boletin"] == 1) { ?>

            <button type="button" class="btn btn-primary" onclick="window.location='boletin.php';">Informe de Notas</button>

        <? }else{ ?> <!-- DE LO CONTRARIO NO MUESTRE-->

            <button type="button" class="btn btn-primary disabled">Informe de notas</button>

        <? } ?>
        <br><br><button class="btn btn-primary" type="button" onclick="salir()">Salir</button>
      </form>

    </center>
    </div> <!-- /container -->
    
  </body>
</html>
<?php 
  } else{
    header("location:index.php");
  } 
?>