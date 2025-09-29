<?php
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (!file_exists("usuarios.txt")) {
        $arq = fopen("usuarios.txt", "w");
        fclose($arq);
    }
    $arq = fopen("usuarios.txt", "a");
    $linha = $usuario . ";" . $senha . "\n";
    fwrite($arq, $linha);
    fclose($arq);
    $msg = "Usuário cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <?php if ($msg): ?><p style="color:green"><?= $msg ?></p><?php endif; ?>
    <form method="post">
        <label>Usuário: <input type="text" name="usuario"></label><br>
        <label>Senha: <input type="password" name="senha"></label><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>