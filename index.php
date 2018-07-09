<?php

require_once("config.php");

// Careega um usuário
/* $root = new Usuario();

$root->loadById(3);

// Carrega o obecto através do método __toString()
echo $root; */

// Carrega uma lista de usuários
// $usuarios = Usuario::getList();

// echo json_encode($usuarios);

// Carrega uma lista de usuários por login
// $lista = Usuario::search("carl");
// echo json_encode($lista);

// Carregar usuario com nome e password
$utilizador = new Usuario();
$utilizador->login("carl thomas", "carl");

echo $utilizador;
?>