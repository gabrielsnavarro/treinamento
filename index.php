<?php
require_once 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
  return new \Slim\Views\Twig('./templates');
};

$app->get('/', function ($req, $res) {
  return $this->view->render($res, 'form.html');
});

$app->post('/processaform', function ($req, $res) {
  require('./db.config.php');
  $form = $req->getParsedBody();

  if ($form['certificado'] == 'true') {
    $certificado = 'true';
  } else {
    $certificado = 'false';
  }
  $query = "INSERT INTO eventos (titulo, dt_inicio_inscricao, dt_fim_inscricao, dt_evento, texto, vagas, certificado) values("
    . "'" . $form['titulo'] . "',"
    . "'" . $form['dt_inicio_inscricao'] . "',"
    . "'" . $form['dt_fim_inscricao'] . "',"
    . "'" . $form['dt_evento'] . "',"
    . "'" . $form['texto'] . "',"
    . $form['vagas'] . ","
    . "'" . $certificado . "'"
    . ")";
    
  try {
    $st = $conn->prepare($query);
    $st->execute();
    $resposta = 'OK!';
  } catch(PDOException $e) {
    $resposta = $e;
  }
  return $res->getBody()->write($resposta);
});


$app->get('/relatorio', function ($req, $res) {
    require('./db.config.php');
    $sql = "SELECT * FROM eventos ORDER BY dt_evento DESC";
  
    try {
      $result = $conn->query($sql, PDO::FETCH_ASSOC);
      $rows = [];
      foreach($result as $row) {
        $rows[] = $row;
      }
      return $this->view->render($res, 'relatorio.html', ['eventos' => $rows]);
    } catch(PDOException $e) {
      echo $e;
    }
  return $res;
});

$app->run();