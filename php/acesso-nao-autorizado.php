<?php
   require_once 'connection.php';   //conexão com bd
   require_once 'presets.php';      //inclusão dos presets, como header, cards e etc
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro - VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
    
</head>
<body>
    <?php
        echo htmlHeaderNoNavBar($nome, $role); //header
    ?>

    <p style="padding-left: 20px;"> <!-- Mensagem de erro -->
        Você não tem autorização para entrar nessa página, por favor, entre como administrador. 
        <a href="login2.php">Clique aqui para fazer login</a>
    </p>
    
    <?php
        echo htmlFooter();  //footer
    ?>
</body>
</html>