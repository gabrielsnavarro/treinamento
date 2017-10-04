<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<h1>Relatório de eventos</h1>

<table border='1'>
  <tr>
    <td>ID</td>
    <td>titulo</td>
    <td>Início</td>
    <td>Fim</td>
    <td>Evento</td>
    <td>Texto</td>
    <td>Certificado</td>
    <td>Vagas</td>
  </tr>
<?php
  $conn = new PDO('pgsql:host=localhost;user=postgres;dbname=jfal;password=123456');

  $sql = "SELECT * FROM eventos";

  try {
    $result = $conn->query($sql, PDO::FETCH_ASSOC);

    foreach ($result as $row) {
      echo "<tr>";
      
      echo "<td>";
      echo $row['id'];
      echo "</td>";

      echo "<td>";
      echo $row['titulo'];
      echo "</td>";

      echo "<td>";
      echo $row['dt_inicio_inscricao'];
      echo "</td>";

      echo "<td>";
      echo $row['dt_fim_inscricao'];
      echo "</td>";

      echo "<td>";
      echo $row['dt_evento'];
      echo "</td>";

      echo "<td>";
      echo $row['texto'];
      echo "</td>";

      echo "<td>";
      if ($row['certificado']) {
        echo "Sim";
      } else {
        echo "Não";
      }
      echo "</td>";

      echo "<td>";
      echo $row['vagas'];
      echo "</td>";

      echo "</tr>";
    }
  } catch(PDOException $e) {
    echo $e;
  }
?>
</table>
</body>
</html>