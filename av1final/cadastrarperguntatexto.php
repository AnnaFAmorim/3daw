<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    if ($pergunta && $resposta) {
        $filename = "perguntasRespostas.txt";
        if (!file_exists($filename)) {
            $arq = fopen($filename, "w");
            $header = "tipo;pergunta;resposta;op1;op2;op3;op4\n";
            fwrite($arq, $header);
            fclose($arq);
        }
        $arq = fopen($filename, "a");

        $linha = "texto;$pergunta;$resposta;;;;\n";
        fwrite($arq, $linha);
        fclose($arq);
        $msg = "Pergunta cadastrada!";
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pergunta de Texto</title>
</head>
<body>
    <h1>Pergunta de Texto</h1>
    <?php if ($msg): ?><p><?= $msg ?></p><?php endif; ?>
    <form method="post">
        <label>Pergunta: <input type="text" name="pergunta"></label><br>
        <label>Resposta: <input type="text" name="resposta"></label><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>