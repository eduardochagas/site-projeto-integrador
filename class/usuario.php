<?php

	require_once "sqlcmd.php";


    class Usuario {

    private $id;
    private $nome;
    private $email;
    private $login;
    private $senha;

    // delclaração de métodos de acesso (Getters and Setters)
    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($value){
        $this->login = $value;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }

    ######## não será usada ###########
    public function loadById($_id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM administrador WHERE id_administrador = :id",array(':id'=>$_id));
        if (count($results)>0) {
            $this->setData($results[0]);
        }
    }

    ######## não será usada ###########
    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM administrador order by nome");
    }

    ######## não será usada ###########
    public static function search($nome_adm){
        $sql = new Sql();
        return $sql->select("SELECT * FROM administrador WHERE nome LIKE :nome",
            array(":nome"=>"%".$nome_adm."%"));
    }

    // ########## função da Classe Usuario ##############
    public function efetuarLogin($_login, $_senha){
        $sql = new SqlCmd();
        $senha_cript = md5($_senha);
        $resultado = $sql->selectSql("SELECT * FROM funcionarios WHERE login = :login AND senha = :senha", array(
            ':login'=>$_login,
            ":senha"=>$senha_cript));
        //var_dump($resultado);
        //echo "<br/>";

        if (count($resultado)>0) {
            $this->setData($resultado[0]);
            return true;
        }

    }


    public function setData($dados){ 
        //$this->setId($dados['id']);
        $this->setNome($dados['nome']);
        $this->setEmail($dados['email']);
        $this->setLogin($dados['login']);
        $this->setSenha($dados['senha']);
    }

    public function insert(){
        $sql = new SqlCmd();
        $resultado = $sql->selectSql("INSERT INTO funcionarios (nome, email, login, senha) VALUES (0,:nome, :email, :login ,:senha)",
            array(
                ":nome"=>$this->getNome(),
                ":email"=>$this->getEmail(),
                ":login"=>$this->getLogin(),
                ":senha"=>md5($this->getSenha())
            ));
        //var_dump($results);

        if (count($resultado)>0) {
            $this->setData($resultado[0]);
        }
    }

    ######## não será usada ###########
    public function update($_id, $_nome, $_email, $_login){
        $sql = new Sql();
        $sql->query("UPDATE administrador SET nome = :nome, email = :email, login= :login 
            WHERE id = :id",
            array(
                ":id"=>$_id,
                ":nome"=> $_nome,
                ":email"=>$_email,
                ":login"=>$_login
            ));
    }

    ######## não será usada ###########
    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM administrador WHERE id = :id",array(":id"=>$this->getId()));
    }




}








?>