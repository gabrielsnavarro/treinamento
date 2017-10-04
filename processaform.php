<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php
  $conn = new PDO('pgsql:host=localhost;user=postgres;dbname=jfal;password=123456');
  if ($_POST['certificado'] == 'true') {
    $certificado = 'true';
  } else {
    $certificado = 'false';
  }
  $query = "INSERT INTO eventos (titulo, dt_inicio_inscricao, dt_fim_inscricao, dt_evento, texto, vagas, certificado) values("
    . "'" . $_POST['titulo'] . "',"
    . "'" . $_POST['dt_inicio_inscricao'] . "',"
    . "'" . $_POST['dt_fim_inscricao'] . "',"
    . "'" . $_POST['dt_evento'] . "',"
    . "'" . $_POST['texto'] . "',"
    . $_POST['vagas'] . ","
    . "'" . $certificado . "'"
    . ")";
  echo $query;
  try {
    $st = $conn->prepare($query);
    $st->execute();
  } catch(PDOException $e) {
    echo $e;
  }
?>
</body>
</html>