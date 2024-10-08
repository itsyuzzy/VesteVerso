<?php
include("connection.php");

$usuario = 0;
$Senha = 0;

header('Content-Type: application/json'); // Indica que a resposta será em JSON

if (isset($_POST['Email']) && isset($_POST['Password'])) {
    if (strlen($_POST['Email']) == 0) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'Email' não pode estar vazio."]);
        exit();
    } elseif (strlen($_POST['Password']) == 0) {
        http_response_code(400);
        echo json_encode(['message' => "O campo 'Senha' não pode estar vazio."]);
        exit();
    } else {
        $usuario = $mysqli->real_escape_string($_POST['Email']);
        $Senha = $mysqli->real_escape_string($_POST['Password']);
        
        //Verifica se o email e a senha correspondem aos dados inseridos no banco de dados
        $sql_code = "SELECT * FROM clientes WHERE email = '$usuario' AND senha = '$Senha'";
        $sql_query = $mysqli->query($sql_code) or die(json_encode(['message' => "Falha na execução do código SQL"]));

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            http_response_code(200);
            echo json_encode(['message' => "Login bem-sucedido!"]); // Login bem-sucedido
            exit();
        } else {
            http_response_code(401); // Unauthorized
            echo json_encode(['message' => "Nome de usuário ou senha incorretos."]);
            exit();
        }
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => "Campos de email e senha são obrigatórios."]);
    exit();
}
?>
