<?php include_once("conn.php");

    $id = $_REQUEST['id'];

    $num = substr($id,0,-1);
    $letra = substr($id,-1);

    if ($letra == "F"){
        $tipoSelect = 1;
    } else if ($letra == "J"){
        $tipoSelect = 2;
    }
	
	$result_sub_cat = "SELECT * FROM pastas WHERE id_responsavel= $num AND tipocliente = '$tipoSelect' ";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id_pasta'	=> $row_sub_cat['id_pasta'],
			'nome_pasta' => utf8_encode($row_sub_cat['nome_pasta']),
		);
	}
	
echo(json_encode($sub_categorias_post));


// SELECT PARA PROJETO KG

$subcat = "SELECT * FROM tabela WHERE tipo = '$tipo'";