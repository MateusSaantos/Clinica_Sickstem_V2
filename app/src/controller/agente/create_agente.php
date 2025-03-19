<?php

/* Includes e Head */
require_once __DIR__ . '/../../../public/view/head/head.php';

?>

<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/../../../public/view/menu/menu_options.php';
   
?>

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include __DIR__ . '/../../conec/conexao.php';


    // Obter dados do formulário
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    
    // Preparar a consulta SQL
    $sql = "INSERT INTO agente (CPF, Nome, Telefone, Senha) 
            VALUES ('$cpf', '$nome', '$telefone', md5('$senha'))";

    // Executar a consulta
    if ($conn->query($sql) === TRUE) {
        mensagem("$nome cadastrado com sucesso!", 'success');
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
			<a href="/sickstem/app/public/view/pesquisa_agente.php" class="text-white btn btn-primary">Voltar</a>
		</div>
	</div>
</div>

