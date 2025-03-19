<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

<?php

/* Menu Navbar */
require_once __DIR__ . '/menu/menu.php';

?>

	<section class="pricing-table section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Escolha seu perfil para fazer login</h2>
						<img src="/sickstem/app/public/img/section-img.png" alt="#">
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Single Table -->
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table border rounded-4">
						<!-- Table Head -->
						<div class="table-head">
							<div class="icon">
								<i class="icofont-users"></i>
							</div>
							<h4 class="title">SOU AGENTE</h4>
						</div>
						<div class="table-bottom">
							<a class="btn" href="login_agente.php">Realizar login</a>
						</div>
						<!-- Table Bottom -->
					</div>
				</div>
				<!-- End Single Table-->
				<!-- Single Table -->
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table border rounded-4">
						<!-- Table Head -->
						<div class="table-head">
							<div class="icon">
								<i class="icofont-search-user"></i>
							</div>
							<h4 class="title">SOU VISITANTE</h4>
						</div>
						<div class="table-bottom">
							<a class="btn" href="pagina_inicial_visitante.php">Acessar</a>
						</div>
						<!-- Table Bottom -->
					</div>
				</div>
				<!-- End Single Table-->
				<!-- Single Table -->
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-table border rounded-4">
						<!-- Table Head -->
						<div class="table-head">
							<div class="icon">
								<i class="icofont icofont-stethoscope"></i>
							</div>
							<h4 class="title">SOU MÉDICO</h4>
						</div>
						<div class="table-bottom">
							<a class="btn" href="login_medico.php">Realizar login</a>
						</div>
						<!-- Table Bottom -->
					</div>
				</div>
				<!-- End Single Table-->
			</div>
		</div>
	</section>
	<!--/ End Table -->

<?php

/* Rodape */
require_once __DIR__ . '/rodape/rodape.php';

?>

<?php

/* Scripts */
require_once __DIR__ . '/script/script.php';

?>