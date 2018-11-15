<?php
require_once("config.php");
/*$sql= new sql();
$usuario = $sql->select("SELECT * FROM tb_usuario");
echo json_encode($usuario) ;
*/
/* carrega um usúario
$user = new Usuario();
$user ->loadById(8);
echo $user;
*/
//$lista = Usuario::getList();
//echo json_encode($lista);

// carrega uma lista de usúario buscando pelo LOGIN
//$search = Usuario::search("i");
//echo json_encode($search);

//carregando um usúario usando login e senha
$usuario=  new Usuario();
$usuario->login("jojokcn","jojokcnb1");
echo $usuario;
 ?>
