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
    $novoConteudo = "";

    if (file_exists($filename)) {
        $linhas = file($filename);
        foreach ($linhas as $i => $linha) {
            if ($i == 0) {
                $novoConteudo .= $linha;
                continue;
            }
            $dados = explode(';', trim($linha));
            if ($dados[0] == "texto" && $dados[1] == $pergunta_antiga) {
                $novoConteudo .= "texto;$novaPergunta;$novaResposta;;;;\n";
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
        if ($dados[0] == "texto" && $dados[1] == $pergunta_antiga) {
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
    <title>Alterar Pergunta de Texto</title>
</head>
<body>
    <h1>Alterar Pergunta de Texto</h1>
    <?php if ($msg): ?><p><?= $msg ?></p><?php endif; ?>
    <form method="post">
        <input type="hidden" name="pergunta_antiga" value="<?= htmlspecialchars($pergunta_antiga) ?>">
        <label>Pergunta: <input type="text" name="pergunta" value="<?= $dadosAntigos[1] ?? '' ?>"></label><br>
        <label>Resposta: <input type="text" name="resposta" value="<?= $dadosAntigos[2] ?? '' ?>"></label><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="listarperguntas.php">Voltar</a>
</body>
</html>