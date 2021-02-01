<?php
session_start();
/* incluimos primeramente el archivo que contiene la clase fpdf */

include ("pdf/fpdf.php");

/* tenemos que generar una instancia de la clase */

$pdf = new FPDF();

$pdf->AddPage();

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */

$pdf->SetFont("Courier", "", 10);

$pdf->SetTextColor("0","0","0");//para imprimir en rojo

$pdf->Multicell(190,4,$_SESSION["estado"]."",0,"L");

$pdf->Output("estadof.pdf","F");

echo '<script language="javascript">window.open("estadof.pdf","_self");</script>';//paral archivo pdf generado

exit;

?>