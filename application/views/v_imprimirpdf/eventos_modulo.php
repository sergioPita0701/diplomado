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
$pdf->SetTitle('TCPDF Detalle_modulo');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'Evento de '.$nombre.' - '.$eventoModulo[0]['nombreM'], PDF_HEADER_STRING);

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

 
$elget=$data.$fecha;
$pdf->WriteHTMLCell(0,0,130,'',$elget,0,1,0,true,'C',true);//averiguar esos parametros
$titulo= <<<OED
    <h3>Reporte de Acción de Modulo ACTIVAR/ DESACTIVAR</h3>
    Se realizó la siguiente acción de Modulo:
OED;
$pdf->WriteHTMLCell(0,0,'','',$titulo,0,1,0,true,'C',true);

$valorestado=($eventoModulo[0]['vigenteMo']==0)? 'Deshabilitó el Módulo':'Habilitó el Módulo';
$tabla='<table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <th align="center"><strong>ACCION</strong></th>
            <th align="center">'.$valorestado.'</th>
            
        </tr>
        <tr>
            <th align="center" class="text-danger"><strong>Fecha de Inicio del Módulo</strong></th>
            <th align="center">'.$eventoModulo[0]['fecha_inicioMo'].'</th>
        </tr>
        <tr>
            <th align="center" class="text-danger"><strong>Fecha de Culminación del Módulo</strong></th>
            <th align="center">'.$eventoModulo[0]['fecha_finalMo'].'</th>
        </tr>
        <tr>
            <th align="center" class="text-danger"><strong>Fecha de Acción u Modificación</strong></th>
            <th align="center">'.$fechayHora.'</th>
        </tr>';

$tabla.= '</table>';

$pdf->WriteHTMLCell(0,0,'','',$tabla,0,1,0,true,'C',true);

$text='Es el evento realizado en el Modulo debe ser impreso y firmado por el Director de Coordinacion del Diplomado';

$pdf->WriteHTMLCell(0,0,'','',$text,0,1,0,true,'C',true);

$firma='<h4>Dirección de Coordinacion del '.
    'Diplomado en Docencia para Educación Superior</h4>';

$pdf->WriteHTMLCell(70,0,75,200,$firma,0,1,0,true,'C',true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_clean();
//Close and output PDF document
$pdf->Output('eventos_modulo.pdf', 'I');//example_005.pdf

//============================================================+
// END OF FILE
//============================================================+
