<?php 

// ini_set('display_errors', true); error_reporting(E_ALL);

include_once("bd.php");

$stmt = $conn->prepare("SELECT * FROM produtos");
$stmt->execute();

// var_dump($stmt->fetch(PDO::FETCH_OBJ));

// if($stmt->execute()){
//     while($row = $stmt->fetch(PDO::FETCH_OBJ)){
//         echo $row->produto;
//         // $result[] = array(
//         //     'tamanhos'	=> $row->tamanho,

//         // );
//     }
// }
// } else {
//     echo "<br> NÃO FOI POSSIVEL SELECIONAR <br>";
// }

?>