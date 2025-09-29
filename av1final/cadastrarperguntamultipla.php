<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];
    $op1 = $_POST["op1"];
    $op2 = $_POST["op2"];
    $op3 = $_POST["op3"];
    $op4 = $_POST["op4"];

    if ($pergunta && $resposta && $op1 && $op2 && $op3 && $op4) {
        $filename = "perguntasRespostas.txt";
        if (!file_exists($filename)) {
            $arq = fopen($filename, "w");
            $header = "tipo;pergunta;resposta;op1;op2;op3;op4\n";
            fwrite($arq, $header);
            fclose($arq);
        }
        $arq = fopen($filename, "a");
        $linha = "multipla;$pergunta;$resposta;$op1;$op2;$op3;$op4\n";
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
    <title>Cadastrar Pergunta de Múltipla Escolha</title>
</head>
<body>
    <h1>Pergunta Múltipla Escolha</h1>
    <?php if ($msg): ?><p><?= $msg ?></p><?php endif; ?>
    <form method="post">
        <label>Pergunta: <input type="text" name="pergunta"></label><br>
        <label>Resposta Correta: <input type="text" name="resposta"></label><br>
        <label>Opção 1: <input type="text" name="op1"></label><br>
        <label>Opção 2: <input type="text" name="op2"></label><br>
        <label>Opção 3: <input type="text" name="op3"></label><br>
        <label>Opção 4: <input type="text" name="op4"></label><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>