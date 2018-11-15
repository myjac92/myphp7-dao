<?php
require_once("config.php");
//$sql= new sql();
//$usuario = $sql->select("SELECT * FROM tb_usuario");
//echo json_encode($usuario) ;

//carrega um usúario
//$user = new Usuario();
//$user ->loadById(8);
//echo $user;

//$lista = Usuario::getList();
//echo json_encode($lista);

// carrega uma lista de usúario buscando pelo LOGIN
//$search = Usuario::search("i");
//echo json_encode($search);

//carregando um usúario usando login e senha
//$usuario=  new Usuario();
//$usuario->login("jojokcn","jojokcnb1");
//echo $usuario;

//criando novo usuario
//$aluno = new Usuario("julia","@1248");
//$aluno->insert();
//echo $aluno;

//alterar um usuario
//$usuario = new Usuario();
//$usuario ->loadById(9);
//$usuario->update("jose","&44@");
//echo $usuario;

// remover um Usuario
$usuario = new Usuario();
$usuario->loadById(9);
$usuario->delete();
echo $usuario;

 ?>
