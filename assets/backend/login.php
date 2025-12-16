<?php
//conexao com o banco de dados
$host = "localhost";
$db = "LexKnow_DB";
$userName = "root";
$password = "";

try {
    $pdo = new PDO("mysql:dbname=$db;host=$host",$userName,$password);
} catch (PDOException $th) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro na conexão com o banco"]);
    exit();
} catch(Exception $ex) {
    echo("Erro genérico: ". $ex->getMessage());
}

//sessao
session_start();

//Recebe Json do FrontEnd
$datas = json_decode(file_get_contents("php://input"), true);
$email = $datas['email'];
$senha = $datas['senha'];

$cmd = $pdo->prepare("SELECT * FROM admin_tb WHERE email = :e");
$cmd->bindValue(":e", $email);;
$cmd->execute();

if($cmd->rowCount() != 0) {
    $usuario = $cmd->fetch(PDO::FETCH_ASSOC);
    $_SESSION['logado'] =true;
    if($senha === $usuario['senha']) {
        //Login bem sucedido
        echo json_encode(["success" => true]); 
    } else {
        //Senha incorreta
        echo json_encode([
            "success" => false, 
            "message" => "Senha incorreta. Tente novamente."
        ]);
    }
} else {
    echo json_encode([
            "success" => false, 
            "message" => "Informações nao encontradas"
        ]);
}
?>