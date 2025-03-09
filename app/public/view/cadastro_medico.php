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
							<h2>Cadastro de Medico</h2><br>

							<form method="post" action="processa_cadastro_medico.php">
								<div class="form-row">
									<div class="form-group">
										<label for="crm">CRM:</label>
										<input type="text" class="form-control" id="crm" name="crm" required>
									</div>
									<div class="form-group">
										<label for="nome">Nome:</label>
										<input type="text" class="form-control" id="nome" name="nome" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group">
										<label for="especialidade">Especialidade:</label>
										<input type="text" class="form-control" id="especialidade" name="especialidade" required>
									</div>
								</div>
								<div class="form-row mb-3">
									<div class="form-group">
										<label for="senha">Senha:</label>
										<input type="password" class="form-control" id="senha" name="senha" required>
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
						<img src="/sickstem/app/public/img/medico.png" class="img-fluid" style="width: 250px;">
					</div>
					<p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Médico</p>
					<small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Identifique as doenças da sua cidade. Saúde em primeiro lugar!</small>
				</div>
			</div>
		</div>
	</body>

</html>