<?php 

// ini_set('display_errors', true); error_reporting(E_ALL);

include_once("bd.php");

$id = $_POST['visualizar'];

$stmt = $conn->prepare("SELECT * FROM estoque WHERE produto_id = :produto_id");
$stmt->bindParam(':produto_id',$id,PDO::PARAM_STR);
if($stmt->execute()){
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        $estoque_info[] = array(
            'tamanhos'	=> $row->tamanho,
            'quantidades'	=> $row->quantidade
        );
    }
} else {
    echo "<br> NÃO FOI POSSIVEL CADASTRAR <br>";
}