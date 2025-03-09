<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

<?php

/* Menu Navbar */
require_once __DIR__ . '/menu/menu.php';

?>

	<!-- Table -->
	<section class="pricing-table section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Escolha seu perfil para fazer login</h2>
						<img src="img/section-img.png" alt="#">
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


	<!-- Footer Area -->
	<footer id="footer" class="footer ">
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Sobre nós</h2>
							<p>Sickstem foi desenvolvido por alunos da Universidade Federal de Ouro Preto. Faça parte dessa família e conheça nossas redes sociais.</p>
							<!-- Social -->
							<ul class="social">
								<li><a href="#"><i class="icofont-facebook"></i></a></li>
								<li><a href="#"><i class="icofont-google-plus"></i></a></li>
								<li><a href="#"><i class="icofont-twitter"></i></a></li>
								<li><a href="#"><i class="icofont-vimeo"></i></a></li>
								<li><a href="#"><i class="icofont-pinterest"></i></a></li>
							</ul>
							<!-- End Social -->
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer f-link">
							<h2>Links Rápidos</h2>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>HomePage</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Sobre Nós</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Funcionalidades</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Sobre o Sickstem</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Outros Links</a></li>
									</ul>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Área do Visitante</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Coleta de Dados</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Detalhamento</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Financeiro</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contato</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Horário de Funcionamento</h2>
							<p>Estamos empenhados a atendê-los durante toda a semana.</p>
							<ul class="time-sidual">
								<li class="day">Segunda - Sexta <span>8.00-18.00</span></li>
								<li class="day">Sábado <span>9.00-12.00</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Mande um email.</h2>
							<p>Entre em contato conosco através do email.</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="email" placeholder="Email" class="common-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'" required="" type="email">
								<button class="button"><i class="icofont icofont-paper-plane"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Footer Top -->
		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="copyright-content">
							<p>© Sickstem 2024</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Copyright -->
	</footer>
	<!--/ End Footer Area -->

<?php

/* Scripts */
require_once __DIR__ . '/script/script.php';

?>