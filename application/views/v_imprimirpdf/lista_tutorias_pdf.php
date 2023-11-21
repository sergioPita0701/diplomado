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
$pdf->SetTitle('TCPDF Lista_Tutorias');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'Lista de Tutorias/Monografias en la '.$nombre, PDF_HEADER_STRING);

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

$titulo= <<<OED
    <h3 class="text-primary"><center>Diplomado en Docencia para Educacion Superior</center></h3>
    <h4 class="text-primary"><center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center></h4>
OED;
$pdf->WriteHTMLCell(0,0,'','',$titulo,0,1,0,true,'C',true);

$tabla='<table border="1" cellspacing="3" cellpadding="4">
        <tr style="background-color:#efefef;">
            <th align="center"><strong>No.</strong></th>
            <th align="center"><strong>Tutor</strong></th>
            <th align="center"><strong>CI Tutor</strong></th>
            <th align="center"><strong>Alumno</strong></th>
            <th align="center"><strong>CI Alumno</strong></th>
            <th align="center"><strong>Monografia</strong></th>
            <th align="center"><strong>Fecha Inicio</strong></th>
        </tr>';
    $no=1;
    foreach($tutomono as $filita ) {
$tabla.=        
    '<tr>
        <td>'.$no++.'</td>
        <td>'.$filita['nombreA'].'</td>
        <td align="center">'.$filita['ciA'].'</td>
        <td align="center">'.$filita['nombreD'].' '.$filita['apellidoPaternoD'].'</td>
        <td align="center">'.$filita['ciD'].'</td>
        <td align="center">'.$filita['tituloMonografia'].'</td>
        <td align="center">'.$filita['fecha_inicioMo'].'</td>
    </tr>';
    }

$tabla.=' </table>';
// $pdf->WriteHTML($tabla);
$pdf->WriteHTMLCell(0,0,'','',$tabla,0,1,0,true,'C',true);

// HACER ESTA TABLA PARA QUE IMPRIMA Y TB QUE IMPTRIMA LA LISTA DE ACADEMICOS, DIPLOMANTES, CALIFICACIONES

// ------para probar que llegan los datos de la bd----
// $text=$academicoseleccionado[0]['nombreA'];
// $pdf->WriteHTMLCell(0,0,'','',$text,0,1,0,true,'C',true);

$firma='<h4>Dirección de Coordinacion del '.
    'Diplomado en Docencia para Educación Superior</h4>';

$pdf->WriteHTMLCell(70,0,75,250,$firma,0,1,0,true,'C',true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_clean();
//Close and output PDF document
$pdf->Output('eventos_version.pdf', 'I');//example_005.pdf

//============================================================+
// END OF FILE
//============================================================+