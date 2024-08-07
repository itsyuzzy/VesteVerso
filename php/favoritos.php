<?php
   include 'connection.php';
   include 'presets.php';
?>

<?php
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
   <?php
      echo htmlHeader($username);
   ?>
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
                              echo '<tr><td colspan="5">Não há produtos favoritos</td></tr>';
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