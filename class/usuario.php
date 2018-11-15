<?php
class Usuario{
  private $id_usuario;
  private $deslogin;
  private $dessenha;
  private $dt_cadastro;

  public function getId_usuario(){
    return $this->id_usuario;
  }
  public function setId_usuario($value){
    $this->id_usuario = $value;
  }
  public function getDeslogin(){
    return $this->deslogin;
  }
  public function setDeslogin($value){
    $this->deslogin= $value;
  }
  public function getDessenha(){
    return $this->dessenha;
  }
  public function setDessenha($value){
    $this->dessenha= $value;
  }
  public function getDt_cadastro(){
    return $this->dt_cadastro;
  }
  public function setDt_cadastro($value){
    $this->dt_cadastro= $value;
  }
  public function loadById($id){
    $sql = new sql();
    $results = $sql->select("SELECT * FROM tb_usuario WHERE id_usuario = :ID",array(":ID"=>"$id"));
    if (isset($results[0])) {
        $this->setData($results[0]);
    }
  }
  public static function getList(){
    $sql = new sql();
    return $results=$sql->select("SELECT * FROM tb_usuario ORDER BY deslogin");
  }
  public static function search($login){
    $sql = new sql();
    return $sql->select("SELECT * FROM tb_usuario WHERE deslogin LIKE :SEARCH ORDER BY deslogin",array(
      ":SEARCH"=>"%".$login."%"
    ));
  }
  public function login($login,$password){
    $sql = new sql();
    $results = $sql->select("SELECT * FROM tb_usuario WHERE deslogin = :LOGIN AND dessenha = :PASSWORD",array(
      ":LOGIN"=>$login,":PASSWORD"=>$password));
    if (isset($results[0])) {
      $this->setData($results[0]);
    }else {
      throw new Exception("Login e/ou Senha invaído(s).");

    }

  }
  public function setData($data){
    $this->setId_usuario($data['id_usuario']);
    $this->setDeslogin($data['deslogin']);
    $this->setDessenha($data['dessenha']);
    $this->setDt_cadastro(new DateTime($data['dt_cadastro']));

  }
  public function insert(){
    $sql= new sql();
    $results = $sql->select("CALL sp_usuario_insert(:LOGIN,:PASSWORD)",array(
      ":LOGIN"=>$this->getDeslogin(),
      ":PASSWORD"=>$this->getDessenha()
    ));
    if (count($results) >0) {
        $this->setData($results[0]);
      // code...
    }
  }
  public function update($login,$password){
    $this->setDeslogin($login);
    $this->setDessenha($password);
    $sql = new sql();
    $sql->query("UPDATE tb_usuario SET deslogin = :LOGIN, dessenha= :PASSWORD WHERE id_usuario = :ID",array(
      ":LOGIN"=>$this->getDeslogin(),
      ":PASSWORD"=>$this->getDessenha(),
      ":ID"=>$this->getId_usuario()
    ));
  }
  public function delete(){
    $sql=  new sql();
    $sql->query("DELETE FROM tb_usuario WHERE id_usuario = :ID",array(
      ":ID"=>$this->getId_usuario()
    ));
    $this->setId_usuario(0);
    $this->setDeslogin("");
    $this->setDessenha("");
    $this->setDt_cadastro(new DateTime());
  }
  public function __construct($login="",$password=""){
    $this->setDeslogin($login);
    $this->setDessenha($password);
  }

  public function __toString(){
    return json_encode(array(
      "id_usuario"=>$this->getId_usuario(),
      "deslogin"=>$this->getDeslogin(),
      "dessenha"=>$this->getDessenha(),
      "dt_cadastro"=>$this->getDt_cadastro()->format("d/m/Y H:i:s"),
    ));

  }
}


 ?>
