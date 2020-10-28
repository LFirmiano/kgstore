<?php 
include "include/bd.php"; 

$meses31 = []

// QUERY PARA OS GRÁFICOS DA DIREITA (TOTAIS MENSAIS)
$query_vm = "SELECT EXTRACT(MONTH FROM mes) as mes, pedidos,valor FROM relatorio";
$vendas_mensais = $conn->prepare($query_vm);
$vendas_mensais->execute();
$mes_vm = [];$vm = [];$total_vm = 0;$valm = [];$total_valm = 0;
while ($venda_mensal = $vendas_mensais->fetch(PDO::FETCH_OBJ)){
    $mes_vm[] = $venda_mensal->mes;
    $vm[] = $venda_mensal->pedidos;
    $valm[] = $venda_mensal->valor;
    $total_vm += intval($venda_mensal->pedidos);
    $total_valm += $venda_mensal->valor;
}

// QUERY PARA OS GRÁFICO DE VENDAS NO MÊS (DIÁRIO)
$query_vd = "SELECT EXTRACT(DAY FROM data) as dia, count(1) as qtd FROM pedido";
$query_vd .= "GROUP BY EXTRACT(DAY FROM data) as dia ORDER BY EXTRACT(DAY FROM data) ASC";
$vendas_diarias = $conn->prepare($query_vd);
$vendas_diarias->execute();
$qtd_dias = [];$plotar_vendas=[];$i=1;
while ($venda_diaria = $vendas_diarias->fetch(PDO::FETCH_OBJ)){
    $qtd_dias[$i] = $venda_diaria->qtd;
    if ($i%5==0){
        $val = $qtd_dias[$i-4] + $qtd_dias[$i-3] + $qtd_dias[$i-2] + $qtd_dias[$-1] + $qtd_dias[$i];
        $val = $val/5;
        $plotar_vendas[] = $val;
    }
}
?>