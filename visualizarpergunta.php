<?php

$filename = "perguntasRespostas.txt";
$perguntaBuscada = $_GET["pergunta"] ?? "";
$registro = null;

if ($perguntaBuscada && file_exists($filename)) {
    $linhas = file($filename);
    foreach ($linhas as $i => $linha) {
        if ($i == 0) continue;
        $dados = explode(';', trim($linha));
        if ($dados[1] === $perguntaBuscada) {
            $registro = $dados;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Visualizar Pergunta</title>
</head>
<body>
    <h1>Pergunta</h1>
    <?php if ($registro): ?>
        <p>Tipo: <?= htmlspecialchars($registro[0]) ?></p>
        <p>Pergunta: <?= htmlspecialchars($registro[1]) ?></p>
        <p>Resposta: <?= htmlspecialchars($registro[2]) ?></p>
        <?php if ($registro[0]=="multipla"): ?>
            <ul>
                <li><?= htmlspecialchars($registro[3]) ?></li>
                <li><?= htmlspecialchars($registro[4]) ?></li>
                <li><?= htmlspecialchars($registro[5]) ?></li>
                <li><?= htmlspecialchars($registro[6]) ?></li>
            </ul>
        <?php endif; ?>
    <?php else: ?>
        <p>Pergunta nã encontrada.</p>
    <?php endif; ?>
    <a href="listarperguntas.php">Voltar à lista</a>
</body>
</html>
