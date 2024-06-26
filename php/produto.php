<?php
$prod_html = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto XYZ - VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/produto.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div id="div-logo"><a href="#"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <div id="div-barra-pesquisa"><input type="text" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        <div id="div-direita-header">
            <div id="div-dropdown">
                <ul id="ul-dropdown">
                    <li type="none" class="dropdown"><a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user">
                    <div class="dropdown-menu">
                        <a href="Cadastro.html" class="login-drop">Cadastre-se</a>
                        <a href="login.html" class="login-drop">Entrar</a>
                    </div>
                    </li>
                </ul>
            </div>
        <div id="div-carrinho"><img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho"></div>
        <div id="div-favorito"><img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito"></div>
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
            <img src="../resources/images/roupas/0002.jpg" alt="Camisa Manga Longa Feminina" id="img-produto">
        </div>
        <div id="div-conteudo">
            <div id="nome-produto">
                <h2>Camisa Manga Longa Feminina</h2>
            </div>
            <div id="preco-produto">
                <h2>R$64,90</h2>
            </div>
            <div id="frete">
                <img src="../resources/images/frete.png" alt="Ícone de Frete Caminhão">
                <input type="text" placeholder="Digite seu CEP">

            </div>
            <div id="tamanho-produto">
                <div class="text">
                    <h3>Tamanho</h3>
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
            
            <div id="quantidade-produto">
                <div class="text"><span>Quantidade</span></div>
            </div>
                <div id="button-quantity">
                    <div class="botoes-quantidade"><button onclick="diminuir()" id="botao-quantidade-menos">-</button></div>
                    <div class="botoes-quantidade"><input type="number" id="quantidade" value="0"></div>
                    <div class="botoes-quantidade"><button onclick="aumentar()" id="botao-quantidade-mais">+</button></div>
                </div>
            <div id="favoritar">
                <img src="../resources/images/coracao-preto.png" alt="Coração Favorito" id="coracao-favoritar" onclick="trocarImagem()">
            </div>
            <div id="div-button">
                <div class="class-botoes" id="div-botao-carrinho"><button id="adicionar-carrinho">Adicionar ao Carrinho</button></div>
                <div class="class-botoes"><button id="comprar-agora">Comprar Agora</button></div>
            </div>
        </div>
    </div>


        <script>
            function trocarImagem() {
                var coracaofavoritar = document.getElementById('coracao-favoritar');
                if (coracaofavoritar.src.match("../resources/images/coracao-preto.png")) {
                    coracaofavoritar.src = "../resources/images/coracao-solido-preto.png";
                } else {
                    coracaofavoritar.src = "../resources/images/coracao-preto.png";
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
</html>';
$prod_html_2 = 
?>