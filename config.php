<?php

    // iniciar a sessão
  	if(!isset($_SESSION)) {
  		session_start();
  	}
    // definindo o padrão de Zona GMT (TimeZone) -3,00
  	date_default_timezone_set("America/Sao_Paulo"); 

?>