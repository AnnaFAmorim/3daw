<?php

$filename = "perguntasRespostas.txt";
$perguntaExcluir = $_GET['pergunta'] ?? "";
$msg = "";

if ($perguntaExcluir && file_exists($filename)) {
    $linhas = file($filename, FILE_IGNORE_NEW_LINES);
    $novoConteudo = "";
    foreach ($linhas as $i => $linha) {
        if ($i == 0) {
            $novoConteudo .= $linha."\n";
            continue;
        }
        $dados = explode(';', $linha);
        if ($dados[1] != $perguntaExcluir) {
            $novoConteudo .= $linha."\n";
        }
    }
    file_put_contents($filename, $novoConteudo);
    header("Location: listarperguntas.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Excluir Pergunta</title>
</head>
<body>
    <h1>Pergunta excluida!</h1>
    <a href="listarperguntas.php">Voltar</a>
</body>
</html>
