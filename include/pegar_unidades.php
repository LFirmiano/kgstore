<?php 

// ini_set('display_errors', true); error_reporting(E_ALL);

include_once("bd.php");

$id = $_REQUEST['id'];

$stmt = $conn->prepare("SELECT * FROM tamunidades WHERE subcat = :subcat");
$stmt->bindParam(':subcat',$id,PDO::PARAM_STR);
if($stmt->execute()){
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        $sub_categorias_post[] = array(
            'tamanhos'	=> $row->tamanho
        );
    }
} else {
    echo "<br> NÃO FOI POSSIVEL CADASTRAR <br>";
}
	
echo(json_encode($sub_categorias_post));