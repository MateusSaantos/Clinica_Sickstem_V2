<?php

/* Includes e Head */
require_once __DIR__ . '/../../../public/view/head/head.php';

?>

<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/../../../public/view/menu/menu_options.php';
   
?>

	<div class="container mb-3"><br></br>
		<div class="row">
			<?php
			include __DIR__ . '/../../conec/conexao.php';

			$cpf = $_POST['CPF'];
			$nome = $_POST['Nome'];
			$telefone = $_POST['Telefone'];
			$senha = $_POST['Senha'];

			$sql = "UPDATE `agente` SET `Nome` = '$nome', `telefone` = '$telefone', `Senha` = md5('$senha') WHERE CPF = '$cpf'";

			if (mysqli_query($conn, $sql)) {
				mensagem("$nome alterado com sucesso!", 'success');
			} else {
				mensagem("Não foi possível alterar.", 'danger');
			}
			?>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="/sickstem/app/public/view/pesquisa_agente.php" class="text-white btn btn-primary">Voltar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Adicione os scripts do Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>