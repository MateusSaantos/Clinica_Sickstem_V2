<?php
// Conectar ao banco de dados (substitua com suas próprias credenciais)
function conectarBancoDados()
{
    include __DIR__ . '/../../src/conec/conexao.php';

	// Obter dados do formulário
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$gravidade = mysqli_real_escape_string($conn, $_POST['gravidade']);
	$classificacao = mysqli_real_escape_string($conn, $_POST['classificacao']);
	$condicao = mysqli_real_escape_string($conn, $_POST['condicao']);

	// Inserir dados no banco de dados usando uma consulta preparada
	$sql = "INSERT INTO doenca (nome, gravidade, classificacao, condicao) VALUES (?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);

	if ($stmt) {
		$stmt->bind_param("ssss", $nome, $gravidade, $classificacao, $condicao);

		if ($stmt->execute()) {
			mensagem("Cadastro realizado com sucesso!", "success");
		} else {
			mensagem("Erro ao cadastrar: " . $stmt->error, "danger");
		}

		$stmt->close();
	} else {
		mensagem("Erro na preparação da consulta: " . $conn->error, "danger");
	}

	// Fechar a conexão
	$conn->close();
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	conectarBancoDados();
}
?>

<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/menu/menu_options.php';
   
   ?>

		<!-- Adicione os scripts do Bootstrap -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<div class="container d-flex justify-content-center align-items-center">
			<div class="row border rounded-5 p-3 bg-white shadow box-area mt-2">
				<style>
					/*------------ Login container ------------*/
					.box-area {
						width: 930px;
					}

					/*------------ Right box ------------*/
					.right-box {
						padding: 40px 30px 40px 40px;
					}
				</style>
				<!-- Caixa da Esquerda -->
				<div class="col-md-6 right-box">
					<div class="row align-items-center">
						<div class="header-text mb-4 ">
							<h2>Cadastro de doença</h2><br>
							<form method="POST" action="cadastro_doenca.php">
								<div class="form-row">
									<div class="form-group">
										<label for="nome">Nome:</label>
										<input type="text" class="form-control" id="nome" name="nome" required>
									</div>
									<div class="form-group">
										<label for="gravidade">Gravidade:</label>
										<input type="text" class="form-control" id="gravidade" name="gravidade" required>
									</div>
								</div>
								<div class="form-row">	
									<div class="form-group">
										<label for="classificacao">Classificação:</label>
										<input type="text" class="form-control" id="classificacao" name="classificacao" required>
									</div>
								</div>	
								<div class="form-row">
									<div class="form-group mb-3">
										<label for="condicao">Condição:</label>
										<input type="text" class="form-control" id="condicao" name="condicao" required>
									</div>
								</div>	
							   <button type="submit" class="btn btn-primary">Salvar</button>	
							</form>
						</div>
					</div>
				</div>
				<!-- Caixa da Direita -->
				<div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4169E1;">
					<div class="featured-image mb-3">
						<img src="/sickstem/app/public/img/doenca.png" class="img-fluid" style="width: 250px;">
					</div>
					<p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Registre as doenças!</p>
					<small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Ajude a monitorar as doenças da sua cidade. Saúde em primeiro lugar!</small>
				</div>
			</div>
		</div>


		<!-- Adicione os scripts do Bootstrap e da jQuery Mask -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	</body>
</body>

</html>