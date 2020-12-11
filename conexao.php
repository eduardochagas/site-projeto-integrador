<?php 

/*
  $servidor = 'localhost';
  $usuario = 'root';
  $senha = '';
  $banco = 'crud2';
*/

class SqlCmd extends PDO { // CRC - Class Resp. Col. 

	// atributos
	private $conn; 

	public function __construct() {

		//$this->$conn = new PDO("mysql:host=localhost;dbname=f5tecnologia;","root","");
		$this->$conn = new PDO("mysql:host=softkleen.com.br;dbname=wellington_fcinco;","fcincoon","bm*5rN60");
		
	}

	public function inserirNoBanco($cmd) {
		$cmd->prepare($cmd);
		$cmd->execute();

	}
  	

}





?>
