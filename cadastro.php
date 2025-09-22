<?php
    $msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"];
        $id = $_POST["id"];
        $area = $_POST["area"];
        $senha = $_POST["senha"];    

    if (!file_exists("funcionarios.txt")) {
        $arqDisc = fopen("funcionarios.txt","w") or die("ERRO CRIAR");
        $linha = "nome;id;area;senha\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
    }
    $arqDisc = fopen("funcionarios.txt","a") or die("ERRO ABRIR");
        $linha = $nome . ";" . $id . ";" . $area . ";" . $senha ."\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
        $msg = "Feito!";
        echo "<h1>Resultado: $result</h1>";

        header("Location: menu.html");

    }
?>







    
