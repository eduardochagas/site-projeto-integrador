
<?php


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastrar Funcionario F5</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="formulario-menor">
        <form action="op_cadastro.php" method="POST">
            <fieldset>
                <p>
                <label for="">Nome</label>
                <input type="text" name="nome" required>
                <br/>

                <label for="">Email</label>
                <input type="text" name="email" required>
                <br/>

                <label for="">Login</label>
                <input type="text" name="login" required>
                <br/>
                
                <p>
                <label for="">Senha</label>
                <input type="password" name="senha" required>
                <p>
            
                <br/>
                <input type="submit" name="cadastro-funcionario" value="Cadastrar funcionario" class="botao">

            </fieldset>
        </form>
    </div>
</body>
</html>