<?php

require_once("config.php");

$sql = new Sql();

echo json_encode($sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(":id" => 3)));

?>