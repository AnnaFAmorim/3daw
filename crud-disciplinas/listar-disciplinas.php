<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Listar Disciplinas</title>
  <style>
 
    table {
      width: 50%;
      margin: 10px auto;
      border-collapse: collapse;
      background-color: #93eb9dff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

  </style>
</head>

<body>
  <h1>Lista De Disciplinas</h1>
  <table>
    <tr>
      <th>NOME</th>
      <th>SIGLA</th>
      <th>CARGA</th>
    </tr>
    <?php
    $arqDisc = fopen("disciplinas.txt", "r") or die("Erro ao abrir arquivo");

    while (!feof($arqDisc)) {
      $linha = fgets($arqDisc);
      $colunaDados = explode(";", trim($linha));

      if (count($colunaDados) == 3) {
        echo "<tr><td>" . $colunaDados[0] . "</td>" .
          "<td>" . $colunaDados[1] . "</td>" .
          "<td>" . $colunaDados[2] . "</td>" .
          "<td><form method='post' action='excluir-disciplina.php'>" .
          "<input type='hidden' name='sigla' value='" . $colunaDados[1] . "'>" .
          "<input type='submit' value='Excluir'>" .
          "</form>" .
          " <a href='alterar-disciplina.php?sigla=" . $colunaDados[1] . "'>Alterar</a>" .
          "</td></tr>";
      }
    }

    fclose($arqDisc);
    ?>
  </table>

      <p><a href="criar-disciplina.php" target="external">Voltar</a></p>

</body>

</html>