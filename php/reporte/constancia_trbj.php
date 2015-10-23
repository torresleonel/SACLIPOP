<?php
	
	require('pdf/fpdf.php');  
  
	class PDF extends FPDF{
		//+++++++++++++++++++++++++++++++++++++++++++++++++++ DECLARACION DE FUNCIONES ++++++++++++++++++++++++++++++++++++++++++


		// Cabecera de página
		function Header(){
		    // Logo
		    $this->Image('../../imagen/alcaldia.jpg',10,8,30);
		    $this->Image('../../imagen/escudo.jpg',180,8,20);
		    // Arial bold 15
			$this->SetFont('','B');
			$this->Ln();
			    
			$this->Cell(195,5,'República Bolivariana de Venezuela',0,0,'C');
			$this->Ln();
			$this->Cell(195,5,'Alcaldía del Municipio Campo Elías',0,0,'C');
			$this->Ln();
			$this->Cell(195,5,'Ejido, Estado Bolivariano de Mérida',0,0,'C');
			$this->Ln();
			$this->Cell(195,5,'Rif G- 20005573-1',0,0,'C');
			$this->Ln(10);
				$this->SetFont('','BI',14);
			$this->Cell(195,5,'Instituto Autónomo Municipal Clínica Popular José Martí  ',0,0,'C');
			$this->Ln(25);
			
			$this->SetFont('','B',12);
			$this->Cell(195,5,'SR(es).',0,0,'L');
			$this->Ln();
			$this->Cell(195,5,$_POST['dirigida'],0,0,'L');
			$this->Ln();
			$this->Cell(195,5,'PRESENTE',0,0,'L');
			$this->Ln();
			 
		}

		// Pie de página
		function Footer(){
		    global $total_paginas;
		    // Posición: a 1,5 cm del final
		    $this->SetY(-30);
		    // Arial italic 8
			    $this->SetFont('Arial','IB',11);
			$this->Cell(0,5,'TRABAJO Y COMPROMISO',0,0,'C');
			$this->Ln();
			    $this->SetFont('Arial','',8);
			$this->Cell(0,5,'Av. 25 de Noviembre, cruce con Boulevard del Estudiante, frente a la U.P.T.M. Kleber Ramírez, ',0,0,'C');
			$this->Ln();
			$this->Cell(0,5,'parte posterior del Geriátrico Dr. Ricardo Sergent.',0,0,'C');
		}

		// Cuerpo de página
		function cuerpo($drct,$trbj){

		    list($a,$m,$d) = explode('-',$trbj -> fecha_ingreso);
		    if (date('j') == 1) $cadena = 'al dia ('.date('j').') '.nombre_fecha('dia',date('j'));
		    else $cadena = 'a los ('.date('j').') '.nombre_fecha('dia',date('j')).' dias';

			$this->Ln(10);
			// Colores, ancho de línea y fuente en negrita
		    $this->SetFillColor(180,180,180);
		    $this->SetTextColor(0);
		    $this->SetDrawColor(0,0,0);
		    $this->SetLineWidth(.3);
			$this->SetFont('','');
				$this->Ln();
		    $this->MultiCell(195,8,'Quien suscribe, DR(a). '.$drct -> nombre.' '.$drct -> apellido.', Director(a) del I.A.M CLÍNICA POPULAR JOSÉ MARTÍ ubicada en Av. 25 de noviembre, cruce con Boulevard  del Estudiante, parte posterior del CSSR Dr. Ricardo Sergent Geriátrico Parroquia Montalbán  del Municipio Campo Elías.',0,'J');
			$this->Ln(10);
			$this->SetFont('Arial','B',12);
		    $this->Cell(0,5,'HACE CONSTAR',0,0,'C');
		    $this->SetFont('Arial','',12);
		    $this->Ln(10);
		    $this->MultiCell(195,8,'Que el ciudadano(a) '.$trbj -> nombre.' '.$trbj -> apellido.' titular de la Cedula de Identidad V.- '.$trbj -> cedula.', presta sus servicios en la  Área de '.$trbj -> area_desemp.' de esta Institución, en el cargo de '.$trbj -> cargo.', desde el día ('.$d.') '.nombre_fecha('dia',intval($d)).' de '.nombre_fecha('mes',intval($m)).' de '.$a.' hasta la actualidad, devengando un sueldo mensual de Bs. '.$trbj -> sueldo_mensual.'.',0,'J');
		    $this->Ln(5);
		    $this->MultiCell(195,8,'Constancia que se expide a petición  de la parte interesada para '.$_POST['motivo'].',  en la Ciudad  de Ejido  '.$cadena.' del mes de '.nombre_fecha('mes',date('n')).' del '.date('Y').'.',0,'J');


		    $this->Ln(15);
		    $this->Cell(2);
		    $this->SetFont('','B');
		    $this->Cell(0,5,'Atentamente',0,0,'C');
		    $this->Ln(25);
		    $this->Cell(60);
		    $this->Cell(75,5,'','B',0,'C');
		    
		    $this->Ln(5);

		    $this->Cell(0,5,'Dr(a). '.$drct -> nombre.' '.$drct -> apellido,0,0,'C');
			$this->Ln();
		    $this->Cell(0,5,"Director(a) de I.A.M Clínica Popular José Martí",0,0,'C');
			
		}
		    
	}

	//++++++++++++++++++++++++++++++++++++++++++++++++++++++++ LLAMADO DE LAS FUNCIONES ++++++++++++++++++++++++++++++++++++++++++


	require("../_conexion/conexion_funcion.php");
	$cnx_bd = conexion();
	include('../_sql/conslt_trabj_sql.php');
	$trabajador = conslt_laboral_trb($cnx_bd);
	$director = conslt_director($cnx_bd);
	$cnx_bd -> close();

	$fila_t = $trabajador -> fetch_object();
	$fila_d = $director -> fetch_object();	

	$pdf = new PDF('P','mm','Letter');
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$pdf->cuerpo($fila_d,$fila_t);
	$pdf->Output("constancia_trbj_".$fila_t -> nombre."_".$fila_t -> apellido.".pdf",'i');

?>

