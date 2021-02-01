<?php  
  // INICIA LA SESION 
  session_start();
  include("funciones.php");
  if ($_SESSION["boletin"] == 1) {
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
    <style type="text/css">
      .container{
        width: 860px;
      }
    </style>
  </head>
  <body>

    <div  id="container">
      <div class="container" style="font-family: arial">
      <!--CABECERA DEL BOLETIN-->

      <table width="800">
        <tr>
          <td><img src="img/logo.jpg" width="60"></td>
          <td>U.E LICEO DE TEC. INDUSTRIAL <br> Codigo de Plantel S4302D0814 <br> Telf: 8339564 <br> VALENCIA EDO. CARABOBO</td>
          <td align="right"><? echo date('d/m/Y  h:i a'); ?></td>
        </tr>                
      </table>

      <h4 align="center"><strong>INFORME DE NOTAS</strong></h4>
      
      <p><strong>REPRESENTANTE:</strong> <? echo $_SESSION["nombrer"] ?> &nbsp;&nbsp;&nbsp;<strong>CEDULA:</strong> <? echo $_SESSION["cedula"] ?></p>      
      
      <p><?php echo notasalumno($_SESSION["a1"]) ?></p>      
      
      <p><?php echo notasalumno($_SESSION["a2"]) ?></p>         
      
      <p><?php echo notasalumno($_SESSION["a3"]) ?></p>

      <p><?php echo notasalumno($_SESSION["a4"]) ?></p>  

      <p><?php echo notasalumno($_SESSION["a5"]) ?></p>          
      
      <div id="nota" style="font-weight: bold"></div>
      </div>
    </div> <!-- /container -->

    <center>
      <button class="btn btn-primary" type="button" onClick="imprimir()">Imprimir</button>
      <button class="btn btn-primary" type="button" onClick="window.location='perfil.php';">Regresar</button>
    </center>
    
  </body>
</html>
<?php 
  } else{
    header("location:perfil.php");
  } 
?>