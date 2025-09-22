<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];
    $op1 = $_POST["op1"];
    $op2 = $_POST["op2"];
    $op3 = $_POST["op3"];
    $op4 = $_POST["op4"];
 

        if ($pergunta !== "" && $re sposta !== "" && $op1 !== "" && $op2 !== "" && $op3 !== "" && $op4 !== "") {
            $filename = "perguntasRespostas.txt";

            if (!file_exists($filename)) {
                $arqDisc = fopen($filename, "w") or die("ERRO AO CRIAR O ARQUIVO");
                $header = "pergunta;resposta;opcao1;opcao2;opcao3;opcao4\n";
                fwrite($arqDisc, $header);
                fclose($arqDisc);
            }

            $arqDisc = fopen($filename, "a") or die("ERRO AO ABRIR O ARQUIVO");
            $linha = $pergunta . ";" .  $resposta . ";" . $op1 . ";" . $op2 . ";" . $op3 . ";" . $op4 . "\n";
            fwrite($arqDisc, $linha);
            fclose($arqDisc);

            $msg = "Sucesso!";
        } else {
        $msg = "Por favor, preencha todos os campos.";
    }
} else {
    $msg = " inválido.";
}

    echo "<h1>$smg</h1>"; 
?>

