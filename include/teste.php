<?php 

include "bd.php";

$i=0;$aux=0;$val_tot=0;

foreach ($_POST as $post){
    if ($post == "controle-parcelas"){
        break;
    }
    if ($post == "PARCELA-VAL"){
        $glob[$aux] = $aux;
        $parcelas[] = $aux+1;
    }
    if ($i>0 && $post != "PARCELA-VAL"){
        $array_formas[$aux] = $post;
        $aux++;
    }
    $i++;
}

for ($i=0;$i<count($array_formas);$i++){
    if ($array_formas[$i] == "Dinheiro (Espécie)"){
        $formas[] = $array_formas[$i];
        $val_formas[] = $array_formas[$i+1];
        $val_tot += $array_formas[$i+1];
        $i++;
        continue;
    } else if ($array_formas[$i] == "Débito"){
        $formas[] = $array_formas[$i];
        $val_parcial = $array_formas[$i+1]*(0.9801);
        $val_formas[] = $array_formas[$i+1];
        $val_tot += $val_parcial;
        $i++;
    } else {
        if (isset($array_formas[$i+2])){
            $formas[] = $array_formas[$i];
            if ($array_formas[$i+2]=="1"){
                $val_parcial = $array_formas[$i+1]*(0.9501);
                $val_formas[] = $array_formas[$i+1];
                $val_tot += $val_parcial;
                $i++;
            } else {
                $val_parcial = $array_formas[$i+1]*(0.9441);
                $val_parcial = $val_parcial/intval($array_formas[$i+2]);
                $val_formas[] = $array_formas[$i+1];
                $val_tot += $val_parcial;
                $i++;
            }
        }  
    }
}

if (count($formas)==1){
    $obs = "O PAGAMENTO FOI EFETUADO EM ". $formas[0] ." NO VALOR DE ". $val_formas[0] ." REAIS";
    $forma = $formas[0];
} else if (count($formas)==2){
    $obs = "O PAGAMENTO FOI EFETUADO EM DUAS FORMAS, SENDO ELAS: ". $formas[0] ." NO VALOR DE ". $val_formas[0] ." REAIS E ". $formas[1] ." NO VALOR DE ". $val_formas[1] ." REAIS";
    $forma = $formas[0]."/".$formas[1];
} else if (count($formas)==3){
    $obs = "O PAGAMENTO FOI EFETUADO EM TRêS FORMAS, SENDO ELAS: ". $formas[0] ." NO VALOR DE ". $val_formas[0] ." REAIS, ". $formas[1] ." NO VALOR DE ". $val_formas[1] ." REAIS E ". $formas[2] ." NO VALOR DE ". $val_formas[2] ." REAIS";
    $forma = $formas[0]."/".$formas[1]."/".$formas[2];
}

?>