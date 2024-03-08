<?php 

if(!isset($session)){
    session_start();
}

if(!isset($_SESSION['id'])){
     die("Você não pode acessar esta pagina. <p><a href=\"index.php\">Entrar</a><p/>");
}
