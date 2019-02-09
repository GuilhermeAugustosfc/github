<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html id="tabela">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url("assets/Libs/bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- links menu pushy -->
    <link rel="stylesheet" href=<?= base_url("assets/Libs/pushy-master/css/normalize.css")?>>
    <link rel="stylesheet" href=<?= base_url("assets/Libs/pushy-master/css/demo.css")?>>
    <link rel="stylesheet" href=<?= base_url("assets/Libs/pushy-master/css/pushy.css")?>>
    <link rel="stylesheet" href=<?= base_url("assets/Libs/bootstrap-table-master/src/bootstrap-table.css")?>>
    <link rel="stylesheet" href=<?= "https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">
    <link rel="stylesheet" href="<?=base_url("assets/Libs/perfect-scrollbar/css/perfect-scrollbar.css")?>">
    <link rel="stylesheet" href=<?= base_url("assets/css/generics/menu.css")?>>
    <link rel="stylesheet" href="<?=base_url("assets/css/generics/templates_grid.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/generics/templates_form.css")?>">

    <!-- end links menu pushy -->
    <?php if(!empty($css)) {
        foreach($css as $value){?>
            <link rel="stylesheet" href="<?=$value?>">
        <?php }
    } ?>
</head>
<body>
<input type="hidden" 
    id="config_pagina" 
    data-identificacao ='<?=(isset($variavel_de_identificacao)) ? $variavel_de_identificacao : "" ?>' 
    data-controler="<?=(isset($Controler) ? $Controler : "" )?>"
    data-edita = "<?=(isset($url_edita)?base_url($url_edita):"")?>"
    data-reload="<?=(isset($url_reload)) ? $url_reload : ""?>"
    data-resumo="<?=(isset($url_resumo)) ? $url_resumo : ""?>"
    data-alerta="<?=base_url("Relatorio/contaAlerta")?>"
    data-relatorio = "<?=base_url("Relatorio/Alertas")?>">
     
	