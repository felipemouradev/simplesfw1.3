<?php
 include 'config.php';
?>
<html>
<head>
  <title><?=$config['name_aplication'];?></title>
  <?=Template::header();?>
</head>
<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/<?=$config['name_aplication'];?>"><?=strtoupper($config['name_aplication']);?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li <?=Template::currentPage($page="home");?>><a href="/elabor/home">Home</a></li>
            <li <?=Template::currentPage($page="empregador");?>><a href="/elabor/empregador">Empresas</a></li>
            <li <?=Template::currentPage($page="empregado");?>><a href="/elabor/empregado">Trabalhador</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>