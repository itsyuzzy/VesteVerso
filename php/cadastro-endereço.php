<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastro-endereço.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">


  </head>
  <body>

    <form>
      <div id="selecionar-titulo">
        <h2>Cadastre seu endereço:</h2>
    </div>
        <div class="form-row">
        </div>
        <div class="form-group">
          <label for="inputAddress">Endereço</label>
          <input type="text" class="form-control" id="endereco" placeholder="Rua Exemplo, nº 0 - Bairro Exemplo">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Complemento(Opcional)</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="cidade" placeholder="Exemplo: Aracati">
          </div>
          <div class="form-group col-md-4">
            <label for="inputEstado">Estado</label>
            <select id="inputEstado" class="form-control">
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputCEP">CEP</label>
            <input type="text" class="form-control" id="cep" placeholder="00000-000">
          </div>
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
      </form>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
     <script src="../js/busca-cep.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/estados.js"></script>
  </body>
</html>