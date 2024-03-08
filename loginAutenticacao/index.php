<!-- Fazer o tratamento SQL Injection -->

<?php 
include ("connectDb.php");

// Verificando se os campos email e senha foram definidos
if(isset($_POST['email']) || isset($_POST['senha'])) {

    // Validando se estão todos preenchidos
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu E-mail<br>";

    }else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";

    }else{

        // Realizando consultas
        $email = $mysqli -> real_escape_string($_POST['email']);
        $senha = $mysqli -> real_escape_string($_POST['senha']);

        // Selecione tudo de -usuarios- quando o email for igual sua variavel e senha for igual sua variavel.
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli -> query($sql_code) or die("Falha na execução do código SQL: " . $mysqli -> error);

        $quantidade = $sql_query->num_rows;

        // caso o usuario seja encontrado
        if($quantidade == 1) {

            // retornar os dados da coluna
            $usuario = $sql_query -> fetch_assoc(); 

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['email'] = $usuario['email'];

            header("Location: ../listaTarefas/index.php");

        // Retorne uma mensagem de erro, caso não tenha nenhum dado igual a query acima.
        }else{
            echo "Falha ao logar! E-mail ou senha invalidos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../sweetalert.css">
    <title>Entre ou cadastre-se</title>

</head>
<body>
    <section>
        <h1 class="font-titulo">Login</h1>
        <div class="content flex-column">
            <br>
            <form action="" method="POST">
                <div class="flex-column">
                    <input type="email" id="typeEmailX" name="email" id="email" class="font-conteudo input-add-info"/>
                    <label class="form-label font-conteudo" for="typeEmailX">Email</label>
                    <input type="password" id="typePasswordX" name="senha" id="senha" class="font-conteudo input-add-info"/>
                    <label class="form-label font-conteudo" for="typePasswordX">Senha</label>
                </div>
                <p><a  href="#!">Esqueceu a senha?</a></p>
                <button class="button-login" type="submit" onclick="validacao()">Login</button>
            </form>
        </div>

        <div class="nova-conta">
            <p class="mb-0">Ainda não tem uma conta? <a href="newAccount.php" class="text-white-50 fw-bold">Criar</a>
            </p>
        </div>

    </section>

    <script src="script.js"></script>
    <script src="../jquery-3.7.1.min.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</body>
</html>