<?php

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('eli');
$pdf->SetTitle('TCPDF Detalle_tutoria');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'Evento de '.$nombre.' - Asignación de Tutoría', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

 
// $elget=$data.$fecha;
// setlocale(LC_ALL,"spanish");
now('Australia/Victoria'); 
$elget=strftime("%A, %d de %B del %Y");
// $elget=strftime("%A, %d de %B del %Y a Hrs.: %H:%M:%S ");
$pdf->WriteHTMLCell(0,0,130,'',$elget,0,1,0,true,'C',true);//averiguar esos parametros
$titulo= <<<OED
    <h3>Reporte de Asignación de Tutoría</h3>
    Se Asignó un Tutor para la realización de Monografía de un Diplomante, los detalles del mismo son los siguientes:
OED;
$pdf->WriteHTMLCell(0,0,'','',$titulo,0,1,0,true,'C',true);

$cancelacionTuto=($eventoTutoria[0]['cancelacionT']==0)? 'Nó Canceló la Tutoría':'Canceló Tutoría';
$tabla='<table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <th align="center"><strong>CI Diplomante</strong></th>
            <th align="center">'.$eventoTutoria[0]['ciD'].'</th>

        </tr> 
        <tr>
            <th align="center"><strong>Nombre de Diplomante</strong></th>
            <th align="center">'.$eventoTutoria[0]['nombreD'].' '.$eventoTutoria[0]['apellidoMaternoD'].' '.$eventoTutoria[0]['apellidoPaternoD'].'</th>

        </tr> 
        <tr>
            <th align="center"><strong>CI Tutor</strong></th>
            <th align="center">'.$eventoTutoria[0]['ciA'].'</th>

        </tr> 
        <tr>
            <th align="center"><strong>Nombre de Tutor</strong></th>
            <th align="center">'.$eventoTutoria[0]['nombreA'].'</th>
            
        </tr>        
        <tr>
            <th align="center" class="text-danger"><strong>Fecha de Inicio de Tutoría</strong></th>
            <th align="center">'.$eventoTutoria[0]['fecha_inicioT'].'</th>
        </tr>
        <tr>
            <th align="center" class="text-danger"><strong>Fecha de Culminación de Tutoría</strong></th>
            <th align="center">'.$eventoTutoria[0]['fecha_finalT'].'</th>
        </tr>
        <tr>
            <th align="center"><strong>Fecha de Entrega de carta de Inv.</strong></th>
            <th align="center">'.$eventoTutoria[0]['fechaemision_cartaT'].'</th>
            
        </tr>
        <tr>
            <th align="center"><strong>Cancelación de Tutoría</strong></th>
            <th align="center">'.$cancelacionTuto.'</th>
            
        </tr>
        <tr>
            <th align="center" class="text-danger"><strong>Fecha de Asignación</strong></th>
            <th align="center">'.$elget.'</th>
        </tr>';

$tabla.= '</table>';

$pdf->WriteHTMLCell(0,0,'','',$tabla,0,1,0,true,'C',true);

$text='<br><br>Es el evento realizado en la Tutoría debe ser impreso y firmado por el Coordinador quién realizo la acción';

$pdf->WriteHTMLCell(0,0,'','',$text,0,1,0,true,'C',true);

$firma='<h4>Dirección de Coordinacion del '.
    'Diplomado en Docencia para Educación Superior</h4>';

$pdf->WriteHTMLCell(70,0,75,200,$firma,0,1,0,true,'C',true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_clean();
//Close and output PDF document
$pdf->Output('eventos_tutoria.pdf', 'I');//example_005.pdf

//============================================================+
// END OF FILE
//============================================================+
