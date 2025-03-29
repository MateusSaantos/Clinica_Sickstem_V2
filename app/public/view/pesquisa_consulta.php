<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

	?>
	
    <?php
include __DIR__ . '/../../src/conec/conexao.php';
	
	$pesquisa = $_POST['busca'] ?? '';

	$sql = "SELECT
				P.Nome AS NomePaciente,
				M.Nome AS NomeMedico,
				D.Doenca_Nome AS DoencaDiagnostica,
				C.Data_Hora AS DataConsulta
			FROM
				controle_doencas_bairro.Consulta C
			INNER JOIN controle_doencas_bairro.faz_consulta F ON C.Codigo = F.Consulta_Codigo
			INNER JOIN controle_doencas_bairro.Medico M ON C.Medico_CRM = M.CRM
			INNER JOIN controle_doencas_bairro.Detectada D ON C.Codigo = D.Consulta_Codigo
			INNER JOIN controle_doencas_bairro.paciente P ON F.Paciente_CPF = P.CPF
			WHERE
				D.Doenca_Nome LIKE '%$pesquisa%' OR P.Nome LIKE '%$pesquisa%' OR M.Nome LIKE '%$pesquisa%';";
			
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
                                <th scope="col">Medico</th>
                                <th scope="col">Doença</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $NomePaciente = $linha['NomePaciente'];
                                $NomeMedico = $linha['NomeMedico'];
                                $DoencaDiagnostica = $linha['DoencaDiagnostica'];
                                $DataConsulta = $linha['DataConsulta'];

                                echo "<tr>
                                            <th>$NomePaciente</th>
                                            <td>$NomeMedico</td>
                                            <td>$DoencaDiagnostica</td>
                                            <td>$DataConsulta</td>
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