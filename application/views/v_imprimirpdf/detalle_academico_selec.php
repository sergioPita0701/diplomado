<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

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
$pdf->SetTitle('TCPDF Detalle_academico');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'Informacion Detallada de Academico ', PDF_HEADER_STRING);

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
    <h3 class="text-primary"><center>Diplomado de Docencia en Educacion Superior</center></h3>
    <h4 class="text-primary"><center>Facultad de Pedagogia de la U.M.R.P.S.F.X.CH.</center></h4>
OED;
$pdf->WriteHTMLCell(0,0,'','',$titulo,0,1,0,true,'C',true);

// $valorestado=($eventoVersion[0]['estadoVersion']==0)? 'Salió':'Ingresó';
// $tabla='<table border="1" cellspacing="3" cellpadding="4">
//         <tr>
//             <th align="center"><strong>Accion</strong></th>
//             <th align="center">'.$valorestado.'</th>
            
//         </tr>
//         <tr>
//             <th align="center"><strong>Realizado</strong></th>
//             <th align="center">'.$eventoVersion[0]['fecha_accionV'].' Hrs.: '.$eventoVersion[0]['hora_accionV'].'</th>
//         </tr>
//         <tr>
//             <th align="center"><strong>Razon</strong></th>
//             <th align="center">'.$eventoVersion[0]['razon_accionV'].'</th>
//         </tr>';

// $tabla.= '</table>';

// $pdf->WriteHTMLCell(0,0,'','',$tabla,0,1,0,true,'C',true);

// HACER ESTA TABLA PARA QUE IMPRIMA Y TB QUE IMPTRIMA LA LISTA DE ACADEMICOS, DIPLOMANTES, CALIFICACIONES
                    
$ciacad=empty($academico[0]['ciA']) ? 'No definido':$academico[0]['ciA'];
$nombreacad=empty($academico[0]['nombreA']) ? 'No definido':$academico[0]['nombreA'];
$ciudad=empty($academico[0]['ciudadA']) ? 'No definido':$academico[0]['ciudadA'];
$direccion=empty($academico[0]['direccionA']) ? 'No definido':$academico[0]['direccionA'];

$telefono=empty($academico[0]['telefonoA']) ? 'No definido':$academico[0]['telefonoA'];
$folio=empty($academico[0]['numFolioA']) ? 'No definido':$academico[0]['numFolioA'];
$descripcion=empty($academico[0]['descripcionA']) ? 'No definido':$academico[0]['descripcionA'];
// $profesion=foreach ($academicoProf as $filita => $value) {
//     $value['nombreP'];
// }; 
$form='<form class="form-horizontal" action="" method="post">
        <div class="row">
            <h4>Datos Personales</h4>
            <div class="col-md-4">
                <label class=" control-label">CI : </label> '.$ciacad.'<br>
                <label class=" control-label">Nombre: </label> '.$nombreacad.'<br>
                <label class=" control-label">Ciudad: </label> '.$ciudad.'<br>
                <label class=" control-label">Direccion: </label> '.$direccion.'<br>
            </div>
            <div class="col-md-5">
                <label class=" control-label">Telefono: </label> '.$telefono.'<br>
                <label class=" control-label">No. Archivo : </label> '.$folio.'<br>
                <label class=" control-label">Descripcion/Observaciones : </label>'.$descripcion.'<br>
            </div>
            
        </div>
        <h4 class="text-info"><strong>Profesion/Carrera</strong></h4>
            <div class="list-group">
                <ul>';
foreach ($academicoProf as $filita ) {
    '<p>'.$filita['nombreP'];'</p>';
}
$form.='</ul>
            </div>
            <center><h4 class="text-info"><strong>Estudios de Posgrado e Investigacion</strong></h4></center>
            <table>
                <thead>
                    <th>Profesion/Carrera</th>
                    <th>Especialidades</th>
                </thead>
                <tbody>';
foreach($academicocompleto as $fila){
    '<tr>
        <td>'.$fila['nombreP']."--".$fila['gradoAcademicoP'].'</td>
        <td>'.$fila['nombreE'].'</td>
    </tr>';
}
$form.='</tbody>
            </table>';

$form.= '</form>';

$pdf->WriteHTMLCell(0,0,'','',$form,0,1,0,true,'C',true);

$text='';

$pdf->WriteHTMLCell(0,0,'','',$text,0,1,0,true,'C',true);

$firma='<h4>Dirección de Coordinacion del '.
    'Diplomado en Docencia para Educación Superior</h4>';

$pdf->WriteHTMLCell(70,0,75,200,$firma,0,1,0,true,'C',true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_clean();
//Close and output PDF document
$pdf->Output('eventos_version.pdf', 'I');//example_005.pdf

//============================================================+
// END OF FILE
//============================================================+

