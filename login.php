
<?php


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Login </h2>
    <div id="formulario-menor">
        <form action="op_cadastro.php" method="POST">
            <fieldset>
                <p>
                <label for="">Login</label>
                <input type="text" name="login">
                <p>
                <label for="">Senha</label>
                <input type="password" name="senha">
                <p>
            
                <br/>
                <input type="submit" name="logar" value="Logar" class="botao">

            </fieldset>
        </form>
    </div>
</body>
</html>