<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/menu/menu_options.php';
   
   ?>
		<div class="container d-flex justify-content-center align-items-center">
			<div class="row border rounded-5 p-3 bg-white shadow box-area mt-2">
				<style>
					/*------------ Login container ------------*/
					.box-area {
						width: 1100px;
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
							<h2>Cadastro de Paciente</h2><br>
							<form method="post" action="/sickstem/app/src/controller/paciente/create_paciente.php">
								<div class="form-row">
									<div class="form-group">
										<label for="cpf">CPF:</label>
										<input type="text" class="form-control" id="cpf" name="cpf" required>
									</div>
									<div class="form-group">
										<label for="nome">Nome:</label>
										<input type="text" class="form-control" id="nome" name="nome" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group">
										<label for="dataNascimento">Data de Nascimento:</label>
										<input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
									</div>
									<div class="form-group">
										<label for="sexo">Sexo:</label>
										<select class="form-control" id="sexo" name="sexo" required>
											<option value="Masculino">Masculino</option>
											<option value="Feminino">Feminino</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group">
										<label for="telefone">Telefone:</label>
										<input type="text" class="form-control" id="telefone" name="telefone" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group">
										<label for="cep">CEP:</label>
										<input type="text" class="form-control" id="cep" name="cep" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group">
										<label for="rua">Rua:</label>
										<input type="text" class="form-control" id="rua" name="rua" required>
									</div>
									<div class="form-group mb-3">
										<label for="bairro">Bairro:</label>
										<input type="text" class="form-control" id="bairro" name="bairro" required>
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
						<img src="/sickstem/app/public/img/paciente.png" class="img-fluid" style="width: 250px;">
					</div>
					<p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Registre seu paciente!</p>
					<small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Ajude a monitorar as doenças da sua cidade. Saúde em primeiro lugar!</small>
				</div>
			</div>
		</div>
	</body>

</html>