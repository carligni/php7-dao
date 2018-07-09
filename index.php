<?php

require_once("config.php");

$root = new Usuario();

$root->loadById(3);

// Carrega o obecto através do método __toString()
echo $root;
?>