<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

    <?php
    include "conexao.php";
	
	$pesquisa = $_POST['busca'] ?? '';

	$sql = "SELECT
            P.Nome AS NomePaciente,
            A.Nome AS NomeAgente,
            V.Data_Hora AS DataVisita
        FROM
            controle_doencas_bairro.Visita V
        INNER JOIN controle_doencas_bairro.Agente A ON V.Agente_CPF = A.CPF
        INNER JOIN controle_doencas_bairro.paciente P ON V.Paciente_CPF = P.CPF
			WHERE
				A.Nome LIKE '%$pesquisa%' OR P.Nome LIKE '%$pesquisa%';";
			
    //$sql = "SELECT * FROM paciente WHERE Nome LIKE '%$pesquisa%' OR CPF LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);
    ?>
	
    <?php
   /* Menu de opções internas */
   require_once __DIR__ . '/menu/menu_options.php';
   
   ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border rounded-3 p-5  mt-5 shadow box-area">
                    <h1>Pesquisar Consultas</h1><br>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search" action="pesquisa_consulta.php" method="POST">
                                <input class="form-control me-2" type="search" placeholder="Consulte" aria-label="Search" name="busca" autofocus>
                                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                            </form>
                        </div>
                    </nav>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Paciente</th>
                                <th scope="col">Agente</th>
                                <!--<th scope="col">Doença</th>-->
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $NomePaciente = $linha['NomePaciente'];
                                $NomeAgente = $linha['NomeAgente'];
                                //$DoencaDiagnostica = $linha['DoencaDiagnostica'];
                                $DataVisita = $linha['DataVisita'];

                                echo "<tr>
                                            <th>$NomePaciente</th>
                                            <td>$NomeAgente</td>
                                            <td>$DataVisita</td>
                                     </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="pagina_inicial.php" class="text-white btn btn-primary my-2">Voltar a Página Inicial</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>