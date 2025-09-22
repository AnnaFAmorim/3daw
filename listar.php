<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar uma pergunta</title>
</head>
<body>
    <h3>Qual pergunta será listada?</h3>
    <form action="" method="POST">
        <label for="">Informe a pergunta que será listada:</label>
        <input type="text" name="perg" id="perg">
        <br><br>
        <input type="submit" value="Listar Pergunta">
    </form>

    <?php
    $filename = "perguntasRespostas.txt";
    $linhas = file_exists($filename) ? file($filename) : [];
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Listar Perguntas</title>
    </head>
    <body>
    <h1>Perguntas Cadastradas</h1>

    <?php
    if (count($linhas) <= 1) {
        echo "<p>Nenhuma pergunta cadastrada.</p>";
    } else {
        foreach ($linhas as $i => $linha) {
            if ($i === 0) continue; // pula cabeçalho
            $dados = explode(";", trim($linha));
            echo "<p>Pergunta: $dados[0]</p>";
            echo "<p>Resposta:$dados[1]</p>";
            echo "<p>Opções: $dados[2], $dados[3], $dados[4], $dados[5]</p>";
            echo "<hr>";
        }
    }
    ?>

    <p><a href="cadastro.html">Voltar</a></p>
 </body>
</html>