<?php
session_start();
include 'connection.php';

$username = '';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $sql = "SELECT username FROM clientes WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camisa com Manga - VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/produto.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <div id="div-logo"><a href="index.php"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <form action="">
          <div id="div-barra-pesquisa"><input type="search" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        </form>
        <div id="div-direita-header">
            <div id="div-dropdown">
                <ul id="ul-dropdown">
                    <li class="dropdown" type="none">
                        <a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user"></a>
                        <div class="dropdown-menu">
                            <?php if ($username): ?>
                                <div><span class="login-drop">Bem-vindo, <?php echo htmlspecialchars($username); ?></span></div>
                                <div><a href="logout.php"><button name="logout" id="botao-logout">Sair</button></a></div>
                            <?php else: ?>
                                <a href="../html/Cadastro.html" class="login-drop">Cadastre-se</a>
                                <a href="../html/login.html" class="login-drop">Entrar</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="div-carrinho">
                <img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho">
            </div>
            <div id="div-favorito">
                <img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito">
            </div>
        </div>
    </header>
    
    <nav>
        <a href="#">Roupas Masculinas</a>
        <a href="#">Roupas Femininas</a>
        <a href="#">Roupas Infantis</a>
        <a href="#">Promoções</a>
    </nav>

    <div id="container">
        <div id="imagem-produto">
            <img src="../resources/images/roupas/0001.JPG" alt="Camisa Manga Longa Feminina" id="img-produto">
        </div>
        <div id="div-conteudo">
            <div id="nome-produto">
                <h2>Camisa de Gola Feminina</h2>
            </div>
            <div id="preco-produto">
                <h3>R$56,90</h3>
            </div>
            <div id="frete">
                <h4>Frete:</h4>
                <img src="../resources/images/frete.png" alt="Ícone de Frete Caminhão">
                <input type="text" placeholder="Digite seu CEP" id="input-cep">

            </div>
            <div id="tamanho-produto">
                <div class="text">
                    <h4>Tamanho:</h4>
                </div>
            </div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-dark active">
                      <input type="radio" name="options" id="option1" autocomplete="off"> P
                    </label>
                    <label class="btn btn-outline-dark">
                      <input type="radio" name="options" id="option2" autocomplete="off"> M
                    </label>
                    <label class="btn btn-outline-dark">
                      <input type="radio" name="options" id="option3" autocomplete="off">G
                    </label>
                    <label class="btn btn-outline-dark">
                      <input type="radio" name="options" id="option4" autocomplete="off"> GG
                    </label>
                </div>
                <div class="text"><h4>Quantidade:</h4></div>
                <div id="quantidade-produto">
                    <div class="botoes-quantidade"><button onclick="diminuir()" id="botao-quantidade-menos">-</button></div>
                    <input type="number" id="quantidade" value="0" min="0" max="9">
                    <div class="botoes-quantidade"><button onclick="aumentar()" id="botao-quantidade-mais">+</button></div>
                </div>
                <div id="div-button">
                    <div class="class-botoes" id="div-botao-carrinho"><button id="adicionar-carrinho">Adicionar ao Carrinho</button></div>
                    <div class="class-botoes"><button id="comprar-agora">Comprar Agora</button></div>
                    <div id="favoritar">
                        <img src="../resources/images/coracao-roxo-grande.png" alt="Coração Favorito" id="coracao-favoritar" onclick="trocarImagem()">
                    </div>
            </div>
        </div>
    </div>

    <footer>
        <div id="footer-content">
            <div id="sobre-footer">
              <h4>Sobre nós</h4><br>
            </div>
            <div id="atendimento-footer">
              <h4>Atendimento ao Cliente: (21) 99818-2680</h4><br>
            </div>
            <div id="social-footer">
              <h4>Redes Sociais:</h4><br>
              <div id="logos-footer">
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" style="fill: #eeeeee;transform: ;msFilter:;"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" style="fill: #eeeeee;transform: ;msFilter:;"><path d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z"></path></svg>
            </div>
          </div>
        </div>
      </footer>

        <script>
            function trocarImagem() {
                var coracaofavoritar = document.getElementById('coracao-favoritar');
                if (coracaofavoritar.src.match("../resources/images/coracao-roxo-grande.png")) {
                    coracaofavoritar.src = "../resources/images/coracao-solido-roxo-grande.png";
                } else {
                    coracaofavoritar.src = "../resources/images/coracao-roxo-grande.png";
                }
            }
        </script>
        <script>
            function diminuir() {
                var input = document.getElementById('quantidade');
                var valor = parseInt(input.value);
                if (valor > 0) {
                input.value = valor - 1;
            }
            }
    
            function aumentar() {
                var input = document.getElementById('quantidade');
                var valor = parseInt(input.value);
                input.value = valor + 1;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
</html>