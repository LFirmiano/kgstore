<?php 
include "bd.php"; 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$mes_atual = date('m', time());

// QUERY PARA OS GRÁFICOS DA DIREITA (TOTAIS MENSAIS)
$query_vm = "SELECT EXTRACT(MONTH FROM mes) as mes, pedidos,valor FROM relatorio";
$vendas_mensais = $conn->prepare($query_vm);
$vendas_mensais->execute();
$mes_vm = [];$vm = [];$valm = [];
while ($venda_mensal = $vendas_mensais->fetch(PDO::FETCH_OBJ)){
    $mes_vm[] = $venda_mensal->mes;
    $vm[] = $venda_mensal->pedidos;
    $valm[] = $venda_mensal->valor;
}
$plot_mes = []; $plot_venda_ano = []; $plot_valor_ano = [];
for ($a=0;$a<count($mes_vm);$a++){
    $plot_mes[] = ucfirst(strftime('%B', strtotime('0000-'.$mes_vm[$a].'-00')));
    $plot_venda_ano[] = $vm[$a];
    $plot_valor_ano[] = $valm[$a];
}

// QUERY PARA OS GRÁFICO DE VENDAS NO MÊS (DIÁRIO)
$query_vd = "SELECT EXTRACT(DAY FROM data) as dia, count(1) as qtd, SUM(valor_final) as val FROM pedido WHERE EXTRACT(MONTH FROM data) = :mesAtual GROUP BY EXTRACT(DAY FROM data) ORDER BY EXTRACT(DAY FROM data) ASC";
$vendas_diarias = $conn->prepare($query_vd);
$vendas_diarias->bindParam(':mesAtual',$mes_atual,PDO::PARAM_STR);
$vendas_diarias->execute();
$qtd_dias = [];$dias_vd=[];$plotar_vendas=[];$graf_vendas=[];$i=1;$val_dias=[];$plotar_valores=[];$graf_vals=[];
while ($venda_diaria = $vendas_diarias->fetch(PDO::FETCH_OBJ)){
    $dias_vd[] = intval($venda_diaria->dia);
    $qtd_dias[$i] = $venda_diaria->qtd;
    $val_dias[$i] = $venda_diaria->val;
    $i++;
}
$w=0;
for ($j=0;$j<32;$j++){
    if ($dias_vd[$w] == $j){
        $plotar_vendas[$j] = $qtd_dias[$w+1];
        $plotar_valores[$j] = $val_dias[$w+1];
        if (isset($dias_vd[$w+1])){
            $w++;
        }
    } else {
        $plotar_vendas[$j] = 0;
        $plotar_valores[$j] = 0;
    }
}
$val = 0; $val2 = 0; $divisor = 5;
for ($j=0;$j<32;$j++){
    if ($j!=0 && $j%5==0){
        if ($j==30){
            $val += $plotar_vendas[$j+1];
            $val2 += $plotar_valores[$j+1];
            $divisor +=1;
        }
        $val += $plotar_vendas[$j-4] + $plotar_vendas[$j-3] + $plotar_vendas[$j-2] + $plotar_vendas[$j-1] + $plotar_vendas[$j];
        $val2 += $plotar_valores[$j-4] + $plotar_valores[$j-3] + $plotar_valores[$j-2] + $plotar_valores[$j-1] + $plotar_valores[$j];
        $val = $val/$divisor;
        $val2 = $val2/$divisor;
        $graf_vendas[] = $val;
        $graf_vals[] = $val2;
        $val = 0;
        $val2 = 0;
    }
}
?>