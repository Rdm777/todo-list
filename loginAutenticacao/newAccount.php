<?php 
include ("connectDb.php");

// Verificando se todos os campos foram definidos
if(isset($_POST['nome']) || isset($_POST['sobrenome']) || isset($_POST['email']) || isset($_POST['senha'])) {
    
    // Validando se estão todos preenchidos
    if(isset($_POST['cadastrar'])){

        // Caso não esteja, emitir a seguinte mensagem
        if(empty($dados['nome']) == 0) {
            echo "Informe o seu Nome!<br>";

        }else if(strlen($_POST['sobrenome']) == 0) {
            echo "Informe o seu Sobrenome!<br>";

        }else if(strlen($_POST['email']) == 0) {
            echo "Preencha seu email!<br>";

        }else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha!";

        }else{
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $query = mysqli_query($mysqli, "INSERT INTO cadastro.usuarios (nome, sobrenome, email, senha) VALUES('$nome', '$sobrenome', '$email', '$senha')");
    
            if($query){
                echo "<p style='color:lightgreen;'>Cadastro realizado com sucesso</p>";
            }else{
                "Falha na execução do código" . $mysqli -> error;
            }
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>

    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body  class="vh-100 gradient-custom">
<section>
        <div class="container py-5 h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                    <div class="card bg-dark text-white" style="border-radius: 1rem;">

                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Preencha as informações</p>
                                
                                <form action="" method="POST">
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="nome" class="form-control form-control-lg" name="nome" required/>
                                        <label class="form-label">Nome</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="sobrenome" class="form-control form-control-lg" name="sobrenome" required/>
                                        <label class="form-label">Sobrenome</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" required/>
                                        <label class="form-label" for="typePasswordX">E-mail</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="senha"required/>
                                        <label class="form-label" for="typePasswordX">Senha</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="cadastrar">Criar Conta</button>
                                    <br>
                                    <a href="index.php">Ir para Login</a>
                                </form>

                            <!--<div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
</body>
</html>