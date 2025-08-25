<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão</title>
</head>
<body>
    <p>Excluido com sucesso!
    <p><a href="listar-disciplinas.php">Voltar</a></p>
    </p>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $siglaParaExcluir = trim($_POST['sigla']);

  $linhas = file("disciplinas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

  $arq = fopen("disciplinas.txt", "w") or die("Não foi possível abrir o arquivo para escrita");

  $disciplinaEncontrada = false;

  foreach ($linhas as $linha) {
    $colunaDados = explode(";", trim($linha));

    if (count($colunaDados) == 3 && trim($colunaDados[1]) != $siglaParaExcluir) {
      fwrite($arq, $linha . PHP_EOL);
    } else if (count($colunaDados) == 3 && trim($colunaDados[1]) == $siglaParaExcluir) {
      $disciplinaEncontrada = true;
    }
  }

  fclose($arq);

  if ($disciplinaEncontrada) {
    echo "Disciplina com sigla '" . htmlspecialchars($siglaParaExcluir) . " excluída com sucesso.";
  } else {
    echo "ERRO!.";
  }

  header("Location: listra-disciplinas.php");
  exit;
}

