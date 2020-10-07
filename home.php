<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <?php include "include/menu.php" ?>

    
    <div class="chart-container text-center" style="position:relative, height:20vh; width:50vw; margin-left:2%; margin-top:2% ">
        <h2 style="color:rgb(0, 89, 179)">Vendas (Outubro)</h2>
        <canvas id="vendasDia"></canvas>
        <figcaption class="figure-caption">Gráfico de vendas no mês de <!--mês conrrespondente-->  
        </figcaption>
    </div>
    
    <hr>
    <div class="chart-container text-center" style="position:right, height:20vh; width:50vw; margin-left:2%; margin-top:2%">
        <h2 style="color:rgb(230, 138, 0)">Valores (Outubro)</h2>
        <canvas id="valorDia"></canvas>
        <figcaption class="figure-caption">Gráfico de valores no mês de <!--mês conrrespondente-->  
        </figcaption>
    </div>
    
    <hr>
    <div class="chart-container text-center" style="position:right, height:20vh; width:50vw; margin-left:2%; margin-top:2%">
        <h2 style="color:rgb(0, 204, 102)">Vendas (2020)</h2>
        <canvas id="vendasMes"></canvas>
        <figcaption class="figure-caption">Gráfico de vendas do ano <!--mês conrrespondente-->  
        </figcaption>
    </div>

    

    <script>

/*Cores Messes:(
Janeiro: rgba(255, 153, 0, 0.5) - Laranja
Fevereiro: rgba(0, 255, 0, 0.5) - Verde
Março: rgba(255, 0, 0, 0.5) - Vermelho
Abril: rgba(255, 255, 0, 0.5) - Amarelo
Maio: rgba(0, 255, 204, 0.5) - Azul Ciano
Junho: rgba(204, 0, 255, 0.5) - Roxo
Julho: rgba(102, 51, 0, 0.6) - Marrom
Agosto: rgba(255, 51, 204, 0.5) - Rosa
Setembro: rgba(0, 0, 0, 0.4) - Preto
Outubro: rgba(0, 115, 230, 0.5) - Azul 
Novembro: rgba(204, 255, 51, 0.5) - Verde Limão
Dezembro: rgba(230, 230, 230, 0.7) - Cinza
)

*/

        //Vendas Mês
        var ctx = document.getElementById('vendasDia').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['1-5', '6-10', '11-15', '16-20', '21-25', '26-31'],
                datasets: [{
                    label: 'Quantidades de vendas',
                    backgroundColor: 'rgba(0, 115, 230, 0.5)',
                    borderColor: 'rgba(0, 89, 179, 0.5)',
                    data: [2, 10, 5, 2, 20, 30, 45]
                }]
            },

            // Configuration options go here
            options: {}
            
        });

//===================================================================================================================
        //Valores Mês
        var ctx = document.getElementById('valorDia').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['1-5', '6-10', '11-15', '16-20', '21-25', '26-31'],
                datasets: [{
                    label: 'Valores diários',
                    backgroundColor: 'rgba(255, 163, 26, 0.5)',
                    borderColor: 'rgba(230, 138, 0, 0.5)',
                    data: [2, 10, 5, 2, 20, 30, 45]
                }]
            },


            // Configuration options go here
            options: {}
            
        });

//===================================================================================================================
        //Vendas Anuais
        var ctx = document.getElementById('vendasMes').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                'Outubro','Novembro','Dezembro'],
                datasets: [{
                    label: 'Quantidades de vendas',
                    backgroundColor: ['rgba(255, 153, 0, 0.5)','rgba(0, 255, 0, 0.5)','rgba(255, 0, 0, 0.5)',
                    'rgba(255, 255, 0, 0.5)','rgba(0, 255, 204, 0.5)','rgba(204, 0, 255, 0.5)','rgba(102, 51, 0, 0.6)', 
                    'rgba(255, 51, 204, 0.5)', 'rgba(0, 0, 0, 0.4)', 'rgba(0, 115, 230, 0.5)', 
                    'rgba(204, 255, 51, 0.5)', 'rgba(230, 230, 230, 0.7)'],
                    data: [100, 80, 80, 120, 120, 100, 140, 180, 200, 150, 200, 90]
                }]
            },

            // Configuration options go here
            options: {}
            
        });

//===================================================================================================================
        
    </script>

</body>
</html>