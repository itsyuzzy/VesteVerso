<?php
      session_start();
       
      if(!isset($_SESSION['favoritos'])){
         $_SESSION['favoritos'] = array();
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['favoritos'][$id])){
               $_SESSION['favoritos'][$id] = 1;
            }else{
               $_SESSION['favoritos'][$id] += 1;
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['favoritos'][$id])){
               unset($_SESSION['favoritos'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['favoritos'][$id] = $qtd;
                  }else{
                     unset($_SESSION['favoritos'][$id]);
                  }
               }
            }
         }
       
      }
?>

<?php
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
    <title>VesteVerso</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/presets.css">
    <link rel="stylesheet" href="../css/card.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="../css/coracao-favoritar.css">
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">

</head>
<body>
<header>
    <div id="div-logo"><a href="index.php"><img src="../resources/images/logo-branca-grande.png" alt="logo-vesteverso" id="img-logo"></a></div>
        <form action="pesquisa.php" method="GET">
          <div id="div-barra-pesquisa"><input type="text" name="query" placeholder="Digite sua pesquisa..." id="input-pesquisa"><button id="button-pesquisa" type="submit"><img src="../resources/images/lupa.png" alt="lupa-pesquisa" id="img-lupa"></button></input></div>
        </form>
        <div id="div-direita-header">
            
                <ul id="ul-dropdown">
                    <li class="dropdown" type="none">
                        <a id="menu-drop" href="#"><img src="../resources/images/user.png" alt="user" class="img-header"></a>
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
            
            
                <a href="carrinho.php"><img src="../resources/images/carrinho.png" alt="carrinho" id="carrinho" class="img-header"></a>
            
                <a href="favoritos.php"><img src="../resources/images/coracao-solido.png" alt="coracao-favorito" id="coracao-favorito" class="img-header"></a>
            
        </div>
    </header>
    <nav>
        <a href="roupa-masc.php">Roupas Masculinas</a>
        <a href="roupa-fem.php">Roupas Femininas</a>
        <a href="roupa-inf.php">Roupas Infantis</a>
        <a href="roupa-promo.php">Promoções</a>
    </nav>
   <div id="conteudo">
      <table>
         <thead>
               <tr>
                  <th width="250">Produto</th>
                  <th width="150">Pre&ccedil;o</th>
                  <th widtDh="150">Remover</th>
               </tr>
         </thead>
                  <form action="?acao=up" method="post">
         <tfoot>
                  <tr>
                  <td colspan="5"><a href="index.php" class="link-acao">Continuar Comprando</a></td>
         </tfoot>
      
         <tbody>
                     <?php
                           if(count($_SESSION['favoritos']) == 0){
                              echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                           }else{
                              require("connection.php");
                                                                     $total = 0;
                              foreach($_SESSION['favoritos'] as $id => $qtd){
                                    $sql   = "SELECT *  FROM produtos WHERE id= '$id'";
                           $query = $mysqli->query($sql)or die(mysql_error());
                                    $ln = mysqli_fetch_array($query);
      
                                    $img  = $ln['imagem'];
                                    $nome  = $ln['nome'];
                                    $preco = number_format($ln['preco'], 2, ',', '.');
                                 echo '<tr>
                                       <td><img src="'.$img.'" width="100em"> <br>'.$nome.'</td>
                                       <td>R$ '.$preco.'</td>
                                       <td><a href="?acao=del&id='.$id.'" class="link-acao">Remove</a></td>
                                    </tr>';
                              }
                           }
                     ?>
      
         </tbody>
            </form>
      </table>
   </div>
 
</body>
</html>