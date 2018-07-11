<?php

class Usuario {

    private $idusuario; 
    private $deslogin; 
    private $dessenha; 
    private $dtcadastro; 

    public function __construct($user = "", $password = "")
    {
        $this->setDeslogin($user);
        $this->setDessenha($password);
    }

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function setIdusuario($value)
    {
        $this->idusuario = $value;
    }

    public function getDeslogin()
    {
        return $this->deslogin;
    }

    public function setDeslogin($value)
    {
        $this->deslogin = $value;
    }
    public function getDessenha()
    {
        return $this->dessenha;
    }

    public function setDessenha($value)
    {
        $this->dessenha = $value;
    }
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    public function setDtcadastro($value)
    {
        $this->dtcadastro = $value;
    }

    public function loadById($id)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :id", array(":id" => $id));

        if (count($results) > 0):
            // Array que é retornado (array de arrays $results[0])
            $this->setData($results[0]);
        endif;
    }

    public static function getList()
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login)
    {
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :login ORDER BY deslogin", array(
            ":login" => "%$login%"
        ));
    }

    public function login($user, $password)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :user AND dessenha = :password", array(
            ":user" => $user, 
            ":password" => $password
        ));

        if (count($results) > 0):
            $this->setData($results[0]);
        else:
            throw new Exception("Utilizador ou password errados.");
        endif;
    }

    public function setData($data)
    {
        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    }

    public function insert()
    {
        $sql = new Sql();

        $results = $sql->select("CALL sp_usuarios_insert(:user, :password)", array(
            ":user" => $this->getDeslogin(),
            ":password" => $this->getDessenha()
        ));

        if (count($results) > 0):
            $this->setData($results[0]);
        endif;
    }

    public function update($user, $password)
    {
        $this->setDeslogin($user);
        $this->setDessenha($password);

        $sql = new Sql();

        $sql->setQuery("UPDATE tb_usuarios SET deslogin = :user, dessenha = :password WHERE idusuario = :id", array(
            ":user" => $this->getDeslogin(),
            ":password" => $this->getDessenha(),
            ":id" => $this->getIdusuario()
        ));
    }

    public function delete()
    {
        $sql = new Sql();

        $sql->setQuery("DELETE FROM tb_usuarios WHERE idusuario = :id", array(
            ":id" => $this->getIdusuario()
        ));

        $this->setIdusuario(0);
        $this->setDeslogin("");
        $this->setDessenha("");
        $this->setDtcadastro(new DateTime());

    }

    // Para um único registo
    public function __toString()
    {
        return json_encode(array(
            'idusuario' => $this->getIdusuario(),
            'deslogin' => $this->getDeslogin(),
            'dessenha' => $this->getDessenha(),
            'dtcadastro' => $this->getDtcadastro()->format("d-m-Y H:i:s")
        ));
    }

}

?>