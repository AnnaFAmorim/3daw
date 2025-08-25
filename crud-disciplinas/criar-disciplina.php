<?php
$msg = "";
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') {
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga-horaria"];
    echo "NOME: " . $nome . " | SIGLA: " . $sigla . " | CARGA: " . $carga . "<br>";
    if (!file_exists("disciplinas.txt")) {
        $arqDisc = fopen("disciplinas.txt", "w") or die("erro");
        $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
        $msg = "Primeira disciplina cadastrada com sucesso!";
    } else {
        $arqDisc = fopen("disciplinas.txt", "a") or die("erro");
        $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
        $msg = "Disciplina cadastrada com sucesso!";
    }

}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Criar Disciplinas</title>

</head>
<body>
  <h1>Olá! Insira uma disciplina abaixo</h1>
  <form action="criar-disciplina.php" method="POST" name="disciplina">
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="sigla" placeholder="Sigla">
    <input type="text" name="carga-horaria" placeholder="Carga">
    <input type="submit" name="Enviar" value="Criar">
  </form>
  <p><?php echo $msg; ?></p>

    <p><a href="listar-disciplinas.php" target="external">Lista De Disciplinas</a></p>

</body>
</html>