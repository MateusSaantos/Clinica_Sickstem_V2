<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include __DIR__ . '/../../conec/conexao.php';

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $dataNascimento = $_POST["dataNascimento"];
    $cep = $_POST["cep"];
    $sexo = $_POST["sexo"];
    $telefone = $_POST["telefone"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];

    $sql = "INSERT INTO paciente (CPF, Nome, Data_de_nascimento, CEP, Sexo, Telefone, Rua, Bairro) 
            VALUES ('$cpf', '$nome', '$dataNascimento', '$cep', '$sexo', '$telefone', '$rua', '$bairro')";

    if ($conn->query($sql) === TRUE) {
        mensagem("$nome cadastrado com sucesso!", 'success');
    } else {
        echo "Erro ao inserir cadastro: " . $conn->error;
    }

    $conn->close();
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<a href="pagina_inicial.php" class="text-white btn btn-primary">Voltar</a>
		</div>
	</div>
</div>
