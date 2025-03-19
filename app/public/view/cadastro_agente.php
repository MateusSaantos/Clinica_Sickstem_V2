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
							<h2>Cadastro de Agente</h2><br>
							<form method="post" action="/sickstem/app/src/controller/agente/create_agente.php">
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
										<label for="telefone">Telefone:</label>
										<input type="text" class="form-control" id="telefone" name="telefone" required>
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
						<img src="/sickstem/app/public/img/agente.png" class="img-fluid" style="width: 250px;">
					</div>
					<p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Agente de saúde</p>
					<small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Ajude a monitorar as doenças da sua cidade. Saúde em primeiro lugar!</small>
				</div>
			</div>
		</div>

		<!-- Adicione os scripts do Bootstrap e da jQuery Mask -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function() {
				$('#cpf').mask('000.000.000-00');
				$('#telefone').mask('(00) 0000-00009'); // Adiciona a máscara de telefone, o "9" opcional indica que o nono dígito é opcional
				$('#cep').mask('00000-000');

				$('#btnBuscaCEP').click(function() {
					var cep = $('#cep').val().replace(/\D/g, ''); // Remove caracteres não numéricos

					if (cep.length === 8) {
						$.ajax({
							url: 'https://viacep.com.br/ws/' + cep + '/json/',
							dataType: 'json',
							success: function(data) {
								if (!data.erro) {
									$('#rua').val(data.logradouro);
									$('#bairro').val(data.bairro);
									// Adicione outros campos de endereço, se necessário
								} else {
									alert('CEP não encontrado.');
								}
							},
							error: function() {
								alert('Erro ao buscar o CEP.');
							}
						});
					}
				});
			});
		</script>

	</body>

</html>