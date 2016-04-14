<?php 
include_once('fpdf.php'); 
include('cnxh.php');
require('fxPreguntas.php');
$funciones=new fxpreguntas();
$conexion=new conexion();
$conexion->conectar();
$Nombre=$funciones->consultaUnica("select Nombre from Foro2015");
$Nombre=utf8_decode($Nombre);
$prueba='101010111001010101010101010101000011001011101010001';
$seWord='oye como va';
$prueba1=base64_encode($prueba.$seWord);
$prueba2=base64_decode($prueba1);
//header("Content-Type: text/html; charset=ISO-8859-1 ");

$titulo=$_POST[Titulo];
$contenido=$_POST[Contenido];
$contenidob=utf8_decode($contenido);

$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Helvetica','B',16); 
$pdf->Cell(0,10,$titulo,1,1,'C'); 
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Helvetica','B',14);  
$pdf->Cell(0,10,$Nombre,1,1,'C'); 
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Helvetica','',12);
$pdf->MultiCell(0,8,$contenidob,1,'J');
$pdf->MultiCell(0,8,'Esta es la original'.$prueba,1,'J');
$pdf->MultiCell(0,8,'Esta es la codificada'.$prueba1,1,'J');
$pdf->MultiCell(0,8,'Esta es la decodificada'.$prueba2,1,'J');
$pdf->Output(); 


?> 
