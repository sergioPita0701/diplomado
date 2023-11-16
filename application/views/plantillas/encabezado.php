<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->
    <!-- Titulo con php hacer despues--> 
    
    <title>Diplomado</title>

    <!-- GRAFICAS MORRIS--> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/grafics/morris.css">

    <!-- Bootstrap core CSS--> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/estilo.css">
    <!-- IMPRIMIR TABLAS DATATABLES EXPORT-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dataTables-export/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dataTables-export/css/jquery.dataTables.min.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="<?=($this->session->userdata('tipo')=='Coordinador')?"background-color:#F4F6F6;":(($this->session->userdata('tipo')=='Administrador')? "background-color:#F8F6F8;":"background-color:#F7FBFB;") ?>">  <!--  #F4F6F6  -->
        
