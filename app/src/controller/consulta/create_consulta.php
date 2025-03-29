<?php

/* Includes e Head */
require_once __DIR__ . '/../../../public/view/head/head.php';

?>

<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/../../../public/view/menu/menu_options.php';
   
?>

<!-- Adicione os scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclua a função conectarBancoDados do seu arquivo PHP original
    include __DIR__ . '/../../conec/conexao.php';

    // Conectar ao banco de dados
    //$conn = conectarBancoDados();


	//CONSULTA
	$codigo = $_POST["codigo"];
	$dataHora = $_POST["dataHora"];
	$crmMedico = $_POST["crmMedico"];
	
	//DETECTADA
	$doenca = $_POST["doenca"];
	
	//FAZ CONSULTA
	$cpfPaciente = $_POST["cpfPaciente"];

    // Preparar a consulta SQL
    $sqlConsulta = "INSERT INTO consulta (Codigo, Data_Hora, Medico_CRM) 
            VALUES ('$codigo', '$dataHora', '$crmMedico')";

    // Executar a consulta
    if ($conn->query($sqlConsulta) === TRUE) {
        mensagem("Consulta registrada com sucesso!", 'success');
    } else {
        echo "Erro ao inserir cadastro: " . $conn->error;
    }
	
	////////////////////////////////////////////////////////////////////////////////////////////
	// Preparar a consulta SQL
    $sqlDetectada = "INSERT INTO detectada (Doenca_Nome, Consulta_Codigo) 
            VALUES ('$doenca', '$codigo')";

    // Executar a consulta
    if ($conn->query($sqlDetectada) === TRUE) {
        
    } else {
        echo "Erro ao inserir cadastro: " . $conn->error;
    }
	
	////////////////////////////////////////////////////////////////////////////////////////////
	// Preparar a consulta SQL
    $sqlFazConsulta = "INSERT INTO faz_consulta (Paciente_CPF, Consulta_Codigo) 
            VALUES ('$cpfPaciente', '$codigo')";

    // Executar a consulta
    if ($conn->query($sqlFazConsulta) === TRUE) {
        
    } else {
        echo "Erro ao inserir cadastro: " . $conn->error;
    }
	
	////////////////////////////////////////////////////////////////////////////////////////////
	// Preparar a consulta SQL
    $sqlTemDoenca = "INSERT INTO tem_doenca (Paciente_CPF, Doenca_Nome) 
            VALUES ('$cpfPaciente', '$doenca')";

    // Executar a consulta
    if ($conn->query($sqlTemDoenca) === TRUE) {
        
    } else {
        echo "Erro ao inserir cadastro: " . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<a href="/sickstem/app/public/view/pesquisa_consulta.php" class="text-white btn btn-primary">Voltar</a>
		</div>
	</div>
</div>
