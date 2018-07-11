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
// $utilizador = new Usuario();
// $utilizador->login("carl thomas", "carl");

// echo $utilizador;

/* // Inserir aluno
$aluno = new Usuario("aluno", "@lun0");

// $aluno->setDeslogin("aluno");
// $aluno->setDessenha("@lun0");

$aluno->insert();

echo $aluno; */


/* // Alterar aluno
$aluno = new Usuario();
// $aluno->setIdusuario(5);
$aluno->loadById(5);

$aluno->update("Gustavo", "gggggg");

echo $aluno;
 */

// Apagar aluno
$aluno = new Usuario();
$aluno->loadById(13);
$aluno->delete();
echo $aluno;

?>