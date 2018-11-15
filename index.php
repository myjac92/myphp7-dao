<?php
require_once("config.php");
/*$sql= new sql();
$usuario = $sql->select("SELECT * FROM tb_usuario");
echo json_encode($usuario) ;
*/
$user = new Usuario();
$user ->loadById(8);
echo $user;
 ?>
