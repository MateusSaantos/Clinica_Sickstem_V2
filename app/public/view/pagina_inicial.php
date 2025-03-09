<?php
   /* Includes e Head */
   require_once __DIR__ . '/head/head.php';
   
   ?>
   
<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/menu/menu_options.php';
   
   ?>
   
 <?php 
	/* Conexão com banco de dados */
	include __DIR__ . '/../../src/conec/conexao.php';
  
	?>
    <!-- Gráfico de Colunas -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                <?php
                    $sqlJM = "SELECT d.Nome, COUNT(*) as Incidencias
                        FROM tem_doenca td
                        JOIN doenca d ON td.Doenca_Nome = d.Nome
                        JOIN paciente p ON td.Paciente_CPF = p.CPF
                        GROUP BY d.Nome;";

                    $buscarJM = mysqli_query($conn, $sqlJM);
                    while ($dadosJM = mysqli_fetch_array($buscarJM)) {
                        $nomeJM = $dadosJM['Nome'];
                        $incidenciasJM = (int)$dadosJM['Incidencias'];    
                ?>

                    ["<?php echo $nomeJM ?>", <?php echo $incidenciasJM ?>, "#1E90FF"],
                <?php } ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Incidência de Doenças na cidade de João Monlevade",
                width: 600,
                height: 300,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>
    <!-- Gráfico de Colunas 2 -->
    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                <?php
                    $sqlGripe = "SELECT p.Bairro, COUNT(*) as Incidencias
                        FROM tem_doenca td
                        JOIN paciente p ON td.Paciente_CPF = p.CPF
                        WHERE td.Doenca_Nome = 'Gripe'
                        GROUP BY p.Bairro;"; 

                    $buscarGripe = mysqli_query($conn, $sqlGripe);
                    while ($dadosGripe = mysqli_fetch_array($buscarGripe)) {
                        $bairro = $dadosGripe['Bairro'];
                        $incidenciasGripe = (int)$dadosGripe['Incidencias'];
                ?> 

                    ["<?php echo $bairro ?>", <?php echo $incidenciasGripe ?>, "#1bd39d"],
                <?php } ?>

            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([
                0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Incidência de Gripe nos Bairros de João Monlevade",
                width: 600,
                height: 300,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
            chart.draw(view, options);
        }
    </script>
    <!-- Gráfico de Pizza -->
    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart3);

        function drawChart3() {
            var data = google.visualization.arrayToDataTable([
                ['Nome', 'Incidências'],

                <?php
                    $sql = "SELECT d.Nome, COUNT(*) as Incidencias
                            FROM tem_doenca td
                            JOIN doenca d ON td.Doenca_Nome = d.Nome
                            JOIN paciente p ON td.Paciente_CPF = p.CPF
                            WHERE p.Bairro = 'Cruzeiro Celeste'
                            GROUP BY d.Nome;";
                    $buscar = mysqli_query($conn, $sql);

                    while ($dados = mysqli_fetch_array($buscar)) {
                        $nome = $dados['Nome'];
                        $incidencias = (int)$dados['Incidencias'];
                ?>

                    ['<?php echo $nome ?>', <?php echo $incidencias ?>],
                <?php } ?>
            ]);

            var options = {
                title: 'Incidência de Doenças no Cruzeiro Celeste',
                colors: ['#0000FF', '#4169E1', '#48D1CC', '#7FFFD4', '#1bd39d']
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
    <!-- Gráfico de Pizza 2 -->
    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart4);

        function drawChart4() {
            var data = google.visualization.arrayToDataTable([
                ['Nome', 'Incidências'],
                <?php
                    $sqlCarneirinhos = "SELECT d.Nome, COUNT(*) as Incidencias
                            FROM tem_doenca td
                            JOIN doenca d ON td.Doenca_Nome = d.Nome
                            JOIN paciente p ON td.Paciente_CPF = p.CPF
                            WHERE p.Bairro = 'Carneirinhos'
                            GROUP BY d.Nome;";

                    $buscarCarneirinhos = mysqli_query($conn, $sqlCarneirinhos);
                    while ($dadosCarneirinhos = mysqli_fetch_array($buscarCarneirinhos)) {
                        $nomeCarneirinhos = $dadosCarneirinhos['Nome'];
                        $incidenciasCarneirinhos = (int)$dadosCarneirinhos['Incidencias'];
                            
                ?>
                    ['<?php echo $nomeCarneirinhos ?>', <?php echo $incidenciasCarneirinhos ?>],
                <?php } ?>     
            ]);

            var options = {
                title: 'Incidências de Doenças em Carneirinhos',
                colors: ['#0000FF', '#4169E1', '#48D1CC', '#7FFFD4', '#1bd39d']
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
            chart.draw(data, options);
        }
    </script>
    <!-- Gráfico de Rosca -->
    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart5);

        function drawChart5() {
            var data = google.visualization.arrayToDataTable([
                ['Nome', 'Incidências'],
                <?php
                    $sqlLoanda = "SELECT d.Nome, COUNT(*) as Incidencias
                        FROM tem_doenca td
                        JOIN doenca d ON td.Doenca_Nome = d.Nome
                        JOIN paciente p ON td.Paciente_CPF = p.CPF
                        WHERE p.Bairro = 'Loanda'
                        GROUP BY d.Nome;";

                    $buscarLoanda = mysqli_query($conn, $sqlLoanda);
                    while ($dadosLoanda = mysqli_fetch_array($buscarLoanda)) {
                        $nomeLoanda = $dadosLoanda['Nome'];
                        $incidenciasLoanda = (int)$dadosLoanda['Incidencias'];    
                ?>

                    ['<?php echo $nomeLoanda ?>', <?php echo $incidenciasLoanda ?>],
                <?php } ?>
            ]);

            var options = {
                title: 'Incidências de Doenças no Loanda',
                pieHole: 0.4,
                colors: ['#0000FF', '#4169E1', '#48D1CC', '#7FFFD4', '#1bd39d']
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    <!-- Gráfico de Rosca -->
    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart6);

        function drawChart6() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php
                    $sqlRosario ="SELECT d.Nome, COUNT(*) as Incidencias
                        FROM tem_doenca td
                        JOIN doenca d ON td.Doenca_Nome = d.Nome
                        JOIN paciente p ON td.Paciente_CPF = p.CPF
                        WHERE p.Bairro = 'Rosário'
                        GROUP BY d.Nome;";

                        $buscarRosario = mysqli_query($conn, $sqlRosario);
                        while ($dadosRosario = mysqli_fetch_array($buscarRosario)) {
                            $nomeRosario = $dadosRosario['Nome'];
                            $incidenciasRosario = (int)$dadosRosario['Incidencias'];
                ?>
                    ['<?php echo $nomeRosario ?>', <?php echo $incidenciasRosario ?>],
                <?php } ?>    
            ]);

            var options = {
                title: 'Incidências de Doenças no Rosário',
                pieHole: 0.4,
                colors: ['#0000FF', '#4169E1', '#48D1CC', '#7FFFD4', '#1bd39d']
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
            chart.draw(data, options);
        }
    </script>

    <body>
        <div class="container-fluid" style="margin-bottom: 40px;">
            <div class="row">
                <div class="col-md-8">
                    <div id="columnchart_values"></div>
                    <div id="columnchart_values2"></div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="piechart" style="width: 380px; height: 370px; margin-left: -320px;"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="piechart2" style="width: 380px; height: 370px; margin-left: -100px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="donutchart" style="width: 380px; height: 370px; margin-left: -320px; margin-top: -65px;"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="donutchart2" style="width: 380px; height: 370px; margin-left: -100px; margin-top: -65px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>