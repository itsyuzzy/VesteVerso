<?php
$nome = $_POST['nome-completo'];
$username = $_POST['username'];
$Senha = $_POST['senha'];
$SenhaBBB = $_POST['SenhaB'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['tel'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$cadastrohtml = '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
    <title>Cadastro - VesteVerso</title>
</head>
<body>
    <div id="div-geral">
            <form action="../php/cadastro.php" method="POST">
                <div id="conteudo-formulario">
                    <div id="bem-vindo">
                        <h1>Bem-Vindo ao nosso site</h1>
                    </div>
                        <div id="linha-preta-div"><img src="../resources/images/pixel-linha.jpg" alt="linha preta" id="linha-preta"></div>
                    <div id="cadastre-se">
                        <h2>Cadastre-se</h2>
                    </div>
                        <div class="input-class"><input type="text" placeholder="Nome completo: " name="nome-completo"> <br></div>
                        <div class="input-class" id="username"><input type="text" placeholder="Nome de usuário:" name="username"> <br></div>
                        <div class="input-class">
                            <h4 id="email-incorreto">Já existe uma conta com esse e-mail!</h4>
                        </div>
                        <div class="input-class" id="e-mail"><input type="email" placeholder="E-mail:" name="email"> <br></div>
                        <div class="input-class" id="senha"><input type="password" placeholder="Senha:" name="senha"> <br></div>
                        <div class="input-class" id="senha"><input type="password" placeholder="Repetir Senha:" name="SenhaB"> <br></div>
                        <div class="input-class" id="cpf"><input type="text" placeholder="CPF:" name="cpf"> <br></div>
                        <div class="input-class" id="endereco"><input type="text" placeholder="Endereço:" name="endereco"> <br></div>
                        <div class="input-class" id="Telefone"><input type="text" placeholder="Telefone:" name="tel"> <br></div>
                        <div class="input-class" id="cep"><input type="text" placeholder="CEP:" name="cep"> <br></div>
                        <div id="botao"><button>Continuar</button></div>
                </div>
            </form>
    </div>
</body>
</html>';

include('connection.php');

$sql_code = "SELECT * FROM clientes WHERE email = '$email'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL" . $mysqli->error) ;

$quantidade = $sql_query->num_rows;

if($quantidade == 1){
        echo($cadastrohtml);
    }
else{

if($Senha == $SenhaBBB){

    $sql = "INSERT into clientes(nome, username, email, senha, telefone, cpf, endereco, cep) VALUES('$nome', '$username', '$email', '$Senha', '$telefone', '$cpf', '$endereco', '$cep')";

    $rs = mysqli_query($mysqli, $sql);

    header('Location:../html/login.html');
}

else{
    echo("As senhas não conferem");
}

}
?>