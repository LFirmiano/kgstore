<?php 

function VerificarMes($mes){
    include "bd.php";

    $mes = str_pad($mes,2,"0",STR_PAD_LEFT);

    $select = $conn->prepare("SELECT * FROM relatorio WHERE EXTRACT(MONTH FROM mes) = :mesVig");
    $select->bindParam(':mesVig',$mes,PDO::PARAM_STR);
    $select->execute();
    if (empty($select->fetch(PDO::FETCH_OBJ))){
        return 0;
    } else {
        $select->execute();
        return $select->fetch(PDO::FETCH_OBJ);
    }
}

function UpdateRelMes($pedidos_tot,$valor_tot,$lucro_tot,$stat,$mes){
    include "bd.php";

    $mes = str_pad($mes,2,"0",STR_PAD_LEFT);

    $q_rel = "UPDATE relatorio SET pedidos = :pedidos, valor = :valor, lucro = :lucro,status = :status WHERE EXTRACT(MONTH FROM mes) = :mes";
    $sql = $conn->prepare($q_rel);
    $sql->bindParam(':pedidos',$pedidos_tot,PDO::PARAM_STR);
    $sql->bindParam(':valor',$valor_tot,PDO::PARAM_STR);
    $sql->bindParam(':lucro',$lucro_tot,PDO::PARAM_STR);
    $sql->bindParam(':status',$stat,PDO::PARAM_STR);
    $sql->bindParam(':mes',$mes,PDO::PARAM_STR);
    $sql->execute();
}

function AdicionarRel($valor,$lucro,$stat,$mes_ano){
    include "bd.php";

    $q_rel = "INSERT INTO relatorio (mes,pedidos,valor,lucro,status) VALUES (:mes,:pedidos,:valor,:lucro,:status)";
    $p = 1;
    $sql = $conn->prepare($q_rel);
    $sql->bindParam(':pedidos',$p,PDO::PARAM_STR);
    $sql->bindParam(':valor',$valor,PDO::PARAM_STR);
    $sql->bindParam(':lucro',$lucro,PDO::PARAM_STR);
    $sql->bindParam(':status',$stat,PDO::PARAM_STR);
    $sql->bindParam(':mes',$mes_ano,PDO::PARAM_STR);
    $sql->execute();
}

function AdicionarParcela($a,$valor,$id_pedido,$mes_ano){
    include "bd.php";

    $insert_parcelas = "INSERT INTO parcelas (n_parcelas,valor,pedido_id,ano) VALUES (:a,:val,:id,:ano)";
    $ins_parc = $conn->prepare($insert_parcelas);
    $ins_parc->bindParam(':a',$a,PDO::PARAM_STR);
    $ins_parc->bindParam(':val',$_POST['val_parcela'],PDO::PARAM_STR);
    $ins_parc->bindParam(':id',$id_pedido,PDO::PARAM_STR);
    $ins_parc->bindParam(':ano',$mes_ano,PDO::PARAM_STR);
    $ins_parc->execute();

}

?>