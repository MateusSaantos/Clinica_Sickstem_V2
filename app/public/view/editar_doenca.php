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
						<h1>Editar doença</h1><br>

						<?php
						include __DIR__ . '/../../src/conec/conexao.php';

						$nome = $_GET['id'] ?? '';
						$sql = "SELECT * FROM doenca WHERE Nome = '$nome'";
						$dados = mysqli_query($conn, $sql);
						$linha = mysqli_fetch_assoc($dados);
						?>

						<form method="POST" action="/sickstem/app/src/controller/doenca/update_doenca.php">
							<input type="hidden" name="nome" value="<?php echo $linha['Nome']; ?>">
							<div class="form-row">
								<div class="form-group">
									<label for="nome">Nome:</label>
									<input type="text" class="form-control" id="nome" name="nome" required value="<?php echo $linha['Nome']; ?>">
								</div>
								<div class="form-group">
									<label for="gravidade">Gravidade:</label>
									<input type="text" class="form-control" id="gravidade" name="Gravidade" value="<?php echo $linha['Gravidade']; ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group">
									<label for="classificacao">Classificação:</label>
									<input type="text" class="form-control" id="classificacao" name="Classificacao" value="<?php echo $linha['Classificacao']; ?>" required>
								</div>
								<div class="form-group mb-3">
									<label for="condicao">Condição:</label>
									<input type="text" class="form-control" id="condicao" name="Condicao" value="<?php echo $linha['Condicao']; ?>" required>
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

</html>