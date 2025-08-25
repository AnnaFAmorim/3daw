<?php
$v1 = $_POST["a"] ?? 0;
$v2 = $_POST["b"] ?? 0;
$op = $_POST["operacao"] ?? '+';

$result = 0;

switch ($op) {
  case '+':
    $result = $v1 + $v2;
    break;
  case '-':
    $result = $v1 - $v2;
    break;
  case '*':
    $result = $v1 * $v2;
    break;
  case '/':
    if ($v2 != 0) {
      $result = $v1 / $v2;
      break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
</head>

<body>
  <?php echo "<h3>Resultado: $result</h3>"; ?>
</body>

</html>