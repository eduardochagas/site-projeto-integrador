<?php

	include_once 'sqlcmd.php';

	// importando a classe email (arquivo que inserimos a lib PHPMailer)
	include_once 'email.php';

	// chama a classe usuario
	include_once 'class/usuario.php';
	
	include_once 'class/funcionario.php';
	

	
	// se o botão enviar do formulário html for pressionado...
	if(isset($_POST['enviar-dados'])) {
		// se os campos nome, email e telefone ESTIVEREM PREENCHIDOS...
		if (!empty($_POST['nome'] && !empty($_POST['nomeDaEmpresa']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['data'])  && !empty($_POST['horario']) && !empty($_POST['assunto']))) {


			// anula código HTML (maliciosos ou não), digitados dentro do input
			$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

			$empresa = filter_input(INPUT_POST, 'nomeDaEmpresa', FILTER_SANITIZE_SPECIAL_CHARS);
			// remove caracteres digitados dentro do input que não compõem um endereço de email, como barras (/) e espaços em branco.
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			// armazena o telefone do input do html nessa variável
			$fone = $_POST['telefone'];

			// armazena a data do formulário, definida pelo usuario 
			$dataFormulario = $_POST['data']; // a data do formulário é armazenada assim: "2020-05-22". 


			// Essa condição if verifica se o ano da data inserida no formulário é igual ao ano corrente (ano atual)
			// OBS: formata a data inserida no formulário HTML que vem no formato: "d-m-A", para o formato: "d/m/A".
			// OBS2: o método strtotime() retira todos os caracteres da data, mantendo somente os números da data. 
			if($anoDaData = date('Y', strtotime($dataFormulario)) == date('Y')) {
			    // Essa condição if verifica se o ano da data inserida no formulário é igual ao ano corrente (ano atual)
			    // OBS: formata a data inserida no formulário HTML que vem no formato: "d-m-A", para o formato: "d/m/A".
			    // OBS2: o método strtotime() retira todos os caracteres da data, mantendo somente os números da data.
			    if($anoDaData = date('Y', strtotime($dataFormulario)) == date('Y')) {

					// retorna a data completa do formulário formatada em formato: d/m/A.
					// OBS: é essa variável que vamos utilizar no loop while mai abaixo...
					$data = date('d/m', strtotime($dataFormulario));
					//echo $data;

					// lista de todas as datas de feriado do ano
					$feriados = ['01/01', '21/02', '22/02', '23/02', '24/02', '25/02', '26/02', '10/04', '12/04', '21/04', '01/05', '10/05', '11/06', '12/06', '09/08', '07/09', '12/10', '15/10', '28/10', '02/11', '15/11', '20/11', '25/12', '31/12'];

					// variável contadora do loop aninhado
					$j=0;
					// faz o loop em todas as datas do array $feriados
					while($j <= count($feriados)-1) {		
						//echo 'data:'.$data.'<br>';
						//echo 'feriado: '.$feriados[$j].'<br>';
						// se a data digitada no formulário é igual a uma das datas do array $feriado...
						if ($data == $feriados[$j]) {
							// a variável armazena o feriado 
							$feriado = $feriados[$j].date('/Y');
							//echo $feriado. "<br/>";
							//echo $data.date('/Y');
							break; // para o loop se a data do formulario for igual a do feriado...
						}
						else {
							$feriado = "00/00/0000"; // recebe esse valor se a data do formulário for diferente das datas de feriado.
							//echo $feriado;
						}

					$j++;// variável de incremento do loop feriado
					}

					// retorna o dia da semana (Em Inglês, por exemplo: Tuesday, Friday, Monday, etc...)
					// OBS: é essa variável que vamos usar na condição if, depois do loop while...
					$diaDaSemana = date('l', strtotime($dataFormulario));

					// Essa data está formatada assim: d/m/A
					$dataDoFormulario = $data.date('/Y');

					// o indice 0 dessa lista é o domingo...
					//$diasDaSemana = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
					

					// verifica se o dia Da Semana é diferente de sabado (Saturday) e diferente de domingo (Sunday) e se a data é diferente das datas do feriado

					if($diaDaSemana != 'Saturday' && $diaDaSemana != 'Sunday' && $feriado != $dataDoFormulario) {
					echo $diaDaSemana;
					echo $dataDoFormulario."<br/>";

					}	
					else{
						echo "<pre>";
						echo "Desculpe, não trabalhamos de finais de semana e feriados...";
						echo "<pre>";
					}
				}
			}//if($anoDaData = date('Y', strtotime($dataFormulario)) == date('Y'))

			// armazena o horário definido pelo usuario lá no formulário
			$hora = $_POST['horario'];

			// armazena a opção do radioButton do formulário
			$radioButton = $_POST['assunto'];
	
			// armazena o texto descrito no campo textarea do formulário
			$descricao = $_POST['mensagem'];
		
			// Estrutura do Corpo do Email que será enviado para a empresa F5 
			$corpoDoEmail = "Content-Type: text/html charset=utf-8 <br/>";
			$corpoDoEmail .= "From: $email Reply-to: $email <br/><br/>";
			$corpoDoEmail .= "<br/> <strong> Mensagem de contato: </strong><br/><br/>";
			$corpoDoEmail .= "<strong> Nome: </strong> $nome <br/>";
			$corpoDoEmail .= "<strong> Nome Da Empresa: </strong> $empresa";
			$corpoDoEmail .= "<br/> <strong> Telefone: </strong> $fone";
			$corpoDoEmail .= "<br/> <strong> Email: </strong> $email <br/><br/>";
			$corpoDoEmail .= "<br/> <strong> Mensagem: </strong> $descricao";

			// É a classe do PHPMailer que enviará o email para a F5 tecnologia...
			$enviar_email = new Email();
			$enviar_email->send($email, $radioButton, $corpoDoEmail);

			//echo var_dump($nome), var_dump($empresa), var_dump($email), var_dump($fone), var_dump($dataDoFormulario), var_dump($hora), var_dump($radioButton), var_dump($descricao);

			$query = "INSERT INTO agendaVisita ( nome, empresa, email, telefone, diaDaVisita, horarioDaVisita, assunto, descricao) VALUES (:n, :emp, :ema, :tel, :d, :h, :ass, :des)";

			$con = new SqlCmd();
			$con->querySql($query, array(':n' => $nome, ':emp' => $empresa, ':ema' => $email, ':tel' => $fone, ':d' => $dataDoFormulario, ':h' => $hora, ':ass' => $radioButton, ':des' => $descricao));

			//header('location: index.html');

			//var_dump($con);

			#array(':n' => $nome, ':emp' => $empresa, ':ema' => $email, ':tel' => $fone, ':d' => $dataDoFormulario, ':h' => $hora, ':ass' => $radioButton, ':des' => $descricao)

			#array(':n' => '$nome', ':emp' => '$empresa', ':ema' => '$email', ':tel' => '$fone', ':d' => '$dataDoFormulario', ':h' => '$hora', ':ass' => '$radioButton', ':des' => '$descricao');

			#array(':n' => 'eduardo', ':emp' => 'f5tec', ':ema' => 'contato@gmail.com', ':tel' => '(11) 97878-1905)', ':d' => '01/06/2020', ':h' => '9:00', ':ass' => 'Servidores', ':des' => 'texto qualquer');



		}
	}



	// cadastra os funcionarios da empresa...
	if (isset($_POST['cadastro-funcionario'])){
	    $funcionario = new Funcionario();
	    $funcionario->setNome($_POST['nome']);
	    $funcionario->setEmail($_POST['email']);
	    $funcionario->setLogin($_POST['login']);
	    $funcionario->setSenha($_POST['senha']);

	    // não consegue achar o id
	    //if($funcionario->getId()!=null){
	    $funcionario->insert();
	    header('location: login.php');
	    //}
        
    }
	


	// login dos funcionarios (arquivo op_usuario.php)
	if(isset($_POST['logar'])){

		$txt_login = $_POST['login'];
		$txt_senha = $_POST['senha'];

		if(empty($txt_login) || empty($txt_senha)) {
			header('Location: login.php?msg=Preencha os dados de Usuário');
        	exit;
		}

		$user = new Usuario();
	    $v = $user->efetuarLogin($txt_login,$txt_senha); 

	    //se o valor retornado de $v for false....
	    if(!$v == true) {
	   		echo 'Usuário ou Senha incorretos';
	        header('Location: login.php?msg=Usuário ou Senha incorretos');
	        exit;
	    }
	    else {

		    //registrando sessão do usuário
		    $_SESSION['logado'] = true;
		    $_SESSION['id_user'] = $user->getId();
		    $_SESSION['nome_user'] = $user->getNome();
		    $_SESSION['login_user'] = $user->getLogin();
		    //registro de log
		    header('Location: agendamentoClientes.php');

	    }


	}



?>