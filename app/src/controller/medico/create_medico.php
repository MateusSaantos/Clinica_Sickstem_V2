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

    // Obter dados do formulário
    $crm = $_POST["crm"];
    $nome = $_POST["nome"];
    $especialidade = $_POST["especialidade"];
    $senha = $_POST["senha"];
    
    // Preparar a consulta SQL
    $sql = "INSERT INTO medico (CRM, Nome, Especialidade, Senha) 
            VALUES ('$crm', '$nome', '$especialidade', md5('$senha'))";

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
			<a href="/sickstem/app/public/view/pesquisa_medico.php" class="text-white btn btn-primary">Voltar</a>
		</div>
	</div>
</div>
