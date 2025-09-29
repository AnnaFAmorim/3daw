<?php

$msg = "";
$filename = "perguntasRespostas.txt";
$pergunta_antiga = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["pergunta"])) {
    $pergunta_antiga = $_GET["pergunta"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta_antiga = $_POST["pergunta_antiga"];
    $novaPergunta = $_POST["pergunta"];
    $novaResposta = $_POST["resposta"];
    $op1 = $_POST["op1"];
    $op2 = $_POST["op2"];
    $op3 = $_POST["op3"];
    $op4 = $_POST["op4"];
    $novoConteudo = "";

    if (file_exists($filename)) {
        $linhas = file($filename);
        foreach ($linhas as $i => $linha) {
            if ($i == 0) {
                $novoConteudo .= $linha;
                continue;
            }
            $dados = explode(';', trim($linha));
            if ($dados[0] == "multipla" && $dados[1] == $pergunta_antiga) {
                $novoConteudo .= "multipla;$novaPergunta;$novaResposta;$op1;$op2;$op3;$op4\n";
            } else {
                $novoConteudo .= $linha;
            }
        }
        file_put_contents($filename, $novoConteudo);
        $msg = "Alteração realizada com sucesso!";
    } else {
        $msg = "Arquivo não encontrado!";
    }
}

$dadosAntigos = null;
if ($pergunta_antiga && file_exists($filename)) {
    $linhas = file($filename);
    foreach ($linhas as $i => $linha) {
        if ($i == 0) continue;
        $dados = explode(';', trim($linha));
        if ($dados[0] == "multipla" && $dados[1] == $pergunta_antiga) {
            $dadosAntigos = $dados;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alterar Pergunta Múltipla</title>
</head>
<body>
    <h1>Alterar Pergunta Multipla Escolha</h1>
    <?php if ($msg): ?><p><?= $msg ?></p><?php endif; ?>
    <form method="post">
        <input type="hidden" name="pergunta_antiga" value="<?= htmlspecialchars($pergunta_antiga) ?>">
        <label>Pergunta: <input type="text" name="pergunta" value="<?= $dadosAntigos[1] ?? '' ?>"></label><br>
        <label>Resposta: <input type="text" name="resposta" value="<?= $dadosAntigos[2] ?? '' ?>"></label><br>
        <label>Opção 1: <input type="text" name="op1" value="<?= $dadosAntigos[3] ?? '' ?>"></label><br>
        <label>Opção 2: <input type="text" name="op2" value="<?= $dadosAntigos[4] ?? '' ?>"></label><br>
        <label>Opção 3: <input type="text" name="op3" value="<?= $dadosAntigos[5] ?? '' ?>"></label><br>
        <label>Opção 4: <input type="text" name="op4" value="<?= $dadosAntigos[6] ?? '' ?>"></label><br>
        <button type="submit">Salvar Alteracao</button>
    </form>
    <a href="listarperguntas.php">Voltar a lista</a>
</body>
</html>
