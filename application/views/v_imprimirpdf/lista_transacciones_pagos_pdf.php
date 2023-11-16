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
$pdf->SetAuthor('Sergio');
$pdf->SetTitle('TCPDF Lista_Transacciones');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . 'Lista de transacciones en  ' . $version->nombreV, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
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

$titulo = <<<OED
    <h3 class="text-primary"><center>{$version->tipoCursoV} en Docencia para Educación Superior</center></h3>
    <h4 class="text-primary"><center>Facultad de Pedagogía de la U.M.R.P.S.F.X.CH.</center></h4>
    </br>
OED;
$pdf->WriteHTMLCell(0, 0, '', '', $titulo, 0, 1, 0, true, 'C', true);

$tabla = '<table border="1" cellspacing="3" cellpadding="4">
        <tr style="background-color:#efefef;">
            <th align="center"><strong>No.</strong></th>
            <th align="center"><strong>Fecha De Depósito</strong></th>
            <th align="center"><strong>Num. Depósito</strong></th>
            <th align="center"><strong>Tasa Cambio</strong></th>
            <th align="center"><strong>Monto $us</strong></th>
            <th align="center"><strong>Monto Bs</strong></th>
        </tr>';
$no = 1;
foreach ($pagos as $fila) {
    $tabla .=
        '<tr>
                <td>' . $no++ . '</td>
                <td align="center">' . $fila['fechaDepositoP'] . '</td>
                <td align="center">' . $fila['numeroDepositoP'] . '</td>
                <td align="center">' . $fila['tasaCambioP'] . '  </td>';
    if ($fila['monedaP'] === 'USD') {
        $tabla .= '<td align="center">' . $fila['montoP'] . ' USD</td>';
        $tabla .= '<td align="center">' . $fila['montoTotalBsP'] . ' Bs. </td>';
    } else if ($fila['monedaP'] === 'BS') {
        $tabla .= '<td></td>';
        $tabla .= '<td align="center">' . $fila['montoTotalBsP'] . ' Bs. </td>';
    }

    $tabla .= '</tr>';
}

$tabla .= '<tr><td colspan="4"></td><td>Total :</td> <td align="center">' . $transaccion->sumaPagos . ' Bs. </td></tr>';
$tabla .= '</table>';
// $pdf->WriteHTML($tabla);
$pdf->WriteHTMLCell(0, 0, '', '', $tabla, 0, 1, 0, true, 'C', true);


$titulo = <<<OED
    <h3 class="text-primary"><center>UNIVERSIDAD SAN FRANCISCO XAVIER DE CHUQUISACA</center></h3>
    <h3 class="text-primary"><center>Unidad Facultativa de Posgrado de Humanidades y Ciencias de la Educación</center></h3>
    <h3 class="text-primary"><center>UNIDAD DE POSTGRADO</center></h3>
    <h4 class="text-primary"><center>REPORTE ECONÓMICO</center></h4>
    <h5 class="text-primary" style="text-align: center;">
        {$transaccion->nombreD} {$transaccion->apellidoPaternoD} {$transaccion->apellidoMaternoD}
    </h5> 
    </br>
OED;
$pdf->WriteHTMLCell(0, 0, '', '', $titulo, 0, 1, 0, true, 'C', true);



$tablaDetalle = '<table border="1" cellspacing="2" cellpadding="2">' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Costo Total Del programa</strong></td>' .
    '<td></td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right;"><strong>' . $version->costoV . ' BS.</strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Matricula :</strong></td>' .
    '<td></td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right;"><strong>' . $version->costoMatriculaV . ' BS</strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Módulos</strong></td>' .
    '<td>Cursado</td>' .
    '<td>Total</td>' .
    '<td style="vertical-align: top; text-align: right;"><strong></strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Colegiatura</strong></td>' .
    '<td>' . $asignacionesCount . '</td>' .
    '<td>' . $modulosCount . '</td>' .
    '<td style="vertical-align: top; text-align: right;"><strong>' . $version->costoModulosV . ' Bs. </strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Descuento</strong></td>' .
    '<td>' . $transaccion->porcentajeD . ' % </td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right;"><strong>' . ($transaccion->montoOriginalT - $transaccion->montoDescuentoT) . ' Bs.</strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Total a Cancelar</strong></td>' .
    '<td></td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right;"><strong>' . $transaccion->montoDescuentoT . ' Bs.</strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Depositado</strong></td>' .
    '<td></td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right;"><strong>' . $transaccion->sumaPagos . ' Bs.</strong></td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Saldo por pagar</strong></td>' .
    '<td></td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right; color: ' . ($transaccion->montoDescuentoT - $transaccion->sumaPagos > 0 ? '#FF5733' : 'black') . ';">' . max(0, $transaccion->montoDescuentoT - $transaccion->sumaPagos) . ' Bs.</td>' .
    '</tr>' .
    '<tr>' .
    '<td style="vertical-align: top; text-align: left;"><strong>Saldo a Favor</strong></td>' .
    '<td></td>' .
    '<td></td>' .
    '<td style="vertical-align: top; text-align: right; color: ' . ($transaccion->sumaPagos - $transaccion->montoDescuentoT > 0 ? 'green' : 'black') . ';">' . max(0, $transaccion->sumaPagos - $transaccion->montoDescuentoT) . ' Bs.</td>' .
    '</tr>' .
    '</table>';


$pdf->WriteHTMLCell(0, 0, '', '', $tablaDetalle, 0, 1, 0, true, 'C', true);




// HACER ESTA TABLA PARA QUE IMPRIMA Y TB QUE IMPTRIMA LA LISTA DE ACADEMICOS, DIPLOMANTES, CALIFICACIONES

// ------para probar que llegan los datos de la bd----
// $text=$academicoseleccionado[0]['nombreA'];
// $pdf->WriteHTMLCell(0,0,'','',$text,0,1,0,true,'C',true);

// $firma = '<h4>Dirección de Coordinacion del ' .
//     'Diplomado en Docencia para Educación Superior</h4>';

// $pdf->WriteHTMLCell(70, 0, 75, 250, $firma, 0, 1, 0, true, 'C', true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

ob_clean();
//Close and output PDF document


$pdf->Output('Lista_Transacciones.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+
