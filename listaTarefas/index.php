<?php 
    include("../loginAutenticacao/pageBlock.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="sweetalert.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <title>Taks</title>

</head>
<body class="body-color-2"> 
    <h1 class="font-titulo">Tarefas Diarias</h1>

    <div class="content">
        <div class="content-add-item">
            <input type="text" placeholder="Digite sua nova task" id="input-add-item" class="font-conteudo">
            <button onclick="novaTarefa()" id="button-add-item" title="Clique aqui para adicionar uma nova task">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                </svg>
            </button>
        </div>
        <div class="content-body">
            <ol id="to-do-list" class="font-conteudo"></ol>
        </div>
    </div>
    <footer></footer>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>