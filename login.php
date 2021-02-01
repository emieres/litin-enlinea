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
    <title>LITIN enlinea</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
    <script src="js/valida.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script>
      jQuery(function($){
        $("#fecnac").mask("99/99/9999");
        $("#fecnac2").mask("99/99/9999");
      });
    </script>
    <script>
      function valida(){
        if(document.form.fecnac.value!=document.form.fecnac2.value){
          alert("Las fechas no coinciden, verifique de nuevo");
          return false;
        }
      }
    </script>
  </head>
  <body>

    <div class="container">
    <center>
      <img src="img/logo.jpg" width="100">

      <? if ($_SESSION["fecnac"] == 0) { ?>

          <form name="form" class="form-signin" autocomplete="off" method="post" action="agregar.php" onSubmit="return valida()">
            <h3 class="form-signin-heading">LITIN en linea</h3>
            <div class="form-group has-success has-feedback">
              <label class="control-label" for="inputSuccess2">Cedula del Representante</label>
              <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<? echo $_SESSION["cedula"]; ?>" disabled>
              <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
              <span id="inputSuccess2Status" class="sr-only">(success)</span>
            </div>
            <label class="lab">Fecha de nacimiento:</label>
            <input type="text" class="form-control" placeholder="00/00/0000" name="fecnac" id="fecnac" maxlength="10" required autofocus><br>
            <label class="lab">Raifique su Fecha de nacimiento:</label>
            <input type="text" class="form-control" placeholder="00/00/0000" name="fecnac2" id="fecnac2" maxlength="10" required><br>
            <br>
            <button class="btn btn-primary" type="submit">Ingresar</button>
            <button class="btn btn-primary" type="button" onClick="salir()">Otra Cédula</button>
          </form>

      <? }else{ ?>

          <form id="form" name="form" class="form-signin" method="post" action="verificar.php" autocomplete="off" onSubmit="return valida()">
            <h3 class="form-signin-heading">LITIN en linea</h3>
            <div class="form-group has-success has-feedback">
              <label class="control-label" for="inputSuccess2">Cedula:</label>
              <input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<? echo $_SESSION["cedula"]; ?>" disabled>
              <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
              <span id="inputSuccess2Status" class="sr-only">(success)</span>
            </div>
            <label class="lab">Fecha de nacimiento:</label>
            <input type="text" class="form-control" placeholder="00/00/0000" name="fecnac" id="fecnac" maxlength="10" required autofocus><br>
                    <button class="btn btn-primary" type="submit">Ingresar</button> 
                    <button class="btn btn-primary" type="button" onClick="salir()">Salir</button>
          </form>
              <br>
        <? } ?>

      

    </center>
    </div> <!-- /container -->

  </body>
</html>
<?php 
  } else{
    header("location:index.php");
  } 
?>