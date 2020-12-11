<?php 


class SqlCmd extends PDO {
    
    //atributo da classe SqlCmd
    private $cn;
    

    public function __construct(){
        //$this->cn = new PDO("mysql:host=127.0.0.1;dbname=f5tecnologia","root","");
	$this->cn = new PDO("mysql:host=softkleen.com.br;dbname=wellington_fcinco","fcincoon","bm*5rN60");
    }
    // método atribui itens do array $parametro para o comando sql... 
    public function setParametros($comando, $parametros = array()){
        foreach($parametros as $key => $value){
            $this->setParametro($comando,$key,$value);
        }
    }
    // função usada para atribuir os valores de $key e $value ao comando sql...
    public function setParametro($cmd,$key,$value){
        $cmd->bindParam($key, $value); // atribui ao comando inserido no parametro $cmd os itens da $key e do $value
    }

    // funçao que pode receber comandos sql: insert, delete, update, etc...
    public function querySql($comandoSql, $parametros = array()){
        $cmd = $this->cn->prepare($comandoSql);
        $this->setParametros($cmd, $parametros);
        $cmd->execute();
        return $cmd;

    }

    // função usada somemte para pegar dados dentro do banco (consulta sql)
    public function selectSql($comandoSql,$params = array()){
        $cmd = $this->querySql($comandoSql,$params);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

}



?>
