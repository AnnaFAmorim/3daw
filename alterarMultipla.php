<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlterarPergunta</title>
</head>
<body>

    <h1><?php echo $msg; ?></h1>
    <a href="listar.php">Ver Perguntas</a>

</body>
</html>


<?php
$filename = "perguntasRespostas.txt";
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $perguntaAntiga = $_POST["perguntaAntiga"];
    $novaPergunta   = $_POST["novaPergunta"];
    $novaResposta   = $_POST["novaResposta"];
    $op1            = $_POST["op1"];
    $op2            = $_POST["op2"];
    $op3            = $_POST["op3"];
    $op4            = $_POST["op4"];

    if (file_exists($filename)) {
        $linhas = file($filename);
        $novoConteudo = "";

     foreach ($linhas as $i => $linha) {
            if ($i == 0) { 
                $novoConteudo .= $linha; 
                continue;
            }

            $dados = explode(";", $linha);

            if ($dados[0] == $perguntaAntiga) {
                $novoConteudo .= $novaPergunta . ";" . $novaResposta . ";" . $op1 . ";" . $op2 . ";" . $op3 . ";" . $op4 . "\n";
            } else {
                $novoConteudo .= $linha;
            }
        }

          file_put_contents($filename, $novoConteudo);
        $msg = "Sucesso!";
    } else {
        $msg = "Arquivo não encontrado.";
    }
}
?>


