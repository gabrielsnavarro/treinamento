<!DOCTYPE html>
<html>

<head>
  <title>Cadastro de eventos</title>
</head>

<body>
  <h1>Cadastro de eventos</h1>

  <form method="post" action="processaform.php">
    <table>
      <tr>
        <td>
          <label>Título do evento:</label>
        </td>
        <td>
          <input name="titulo" />
        </td>
      </tr>
      <tr>
        <td>
          <label>Início das inscrições:</label>
        </td>
        <td>
          <input type="date" name="dt_inicio_inscricao" />
        </td>
      </tr>
      <tr>
        <td>
          <label>Fim das inscrições:</label>
        </td>
        <td>
          <input type="date" name="dt_fim_inscricao" />
        </td>
      </tr>
      <tr>
        <td>
          <label>Data do evento:</label>
        </td>
        <td>
          <input type="date" name="dt_evento" />
        </td>
      </tr>
      <tr>
        <td>
          <label>Texto:</label>
        </td>
        <td>
          <textarea name="texto"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label>Tem certificado?</label>
        </td>
        <td>
          <input type="checkbox" name="certificado" value="true">
        </td>
      </tr>
      <tr>
        <td>
          <label>Vagas:</label>
        </td>
        <td>
          <input name="vagas" type="number" />
        </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center">
          <button>Enviar</button>
        </td>
      </tr>
    </table>
  </form>

  <a href="relatorio.php">Relatório</a>

</body>

</html>