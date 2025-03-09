<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>SICKSTEM - Cadastro</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
    <title>Sickstem</title>
</head>
<body>

<!-- Header Area -->
		    <header class="header shadow-sm mb-4">
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <!-- Start Logo -->
                            <div class="logo">
                                <a href="index.php"><img src="img/logo.png" alt="#"></a>
                            </div>
                            <!-- End Logo -->
                            <!-- Mobile Nav -->
                            <div class="mobile-nav"></div>
                            <!-- End Mobile Nav -->
                        </div>
                        <div class="col-lg-7 col-md-9 col-12">
                            <!-- Main Menu -->
                            <div class="main-menu">
                                <nav class="navigation">
                                    <ul class="nav menu">
                                        <li><a href="#">Pacientes <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_paciente.php">Listar</a></li>
                                                <li><a href="cadastro_paciente.php">Cadastrar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Agentes <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_agente.php">Listar</a></li>
                                                <li><a href="cadastro_agente.php">Cadastrar</a></li>
                                                <li><a href="registrar_visita.php">Registrar Visita</a></li>
                                                <li><a href="pesquisa_visita.php">Listar Visita</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Doenças <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_doenca.php">Listar</a></li>
                                                <li><a href="cadastro_doenca.php">Cadastrar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Médicos <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_medico.php">Listar</a></li>
                                                <li><a href="cadastro_medico.php">Cadastrar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Consultas <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="pesquisa_consulta.php">Listar</a></li>
                                                <li><a href="registrar_consulta.php">Registrar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--/ End Main Menu -->
                        </div>
                        <div class="col-lg-2 col-12">
                            <div class="get-quote">
                                <a class="btn btn-danger btn-lg" href="logout.php" role="button" style='background-color: #1bd39d;'>Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
		<!-- End Header Area -->

<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclua a função conectarBancoDados do seu arquivo PHP original
    include 'conexao.php';

    // Conectar ao banco de dados
    //$conn = conectarBancoDados();

    // Obter dados do formulário
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    
    // Preparar a consulta SQL
    $sql = "INSERT INTO agente (CPF, Nome, Telefone, Senha) 
            VALUES ('$cpf', '$nome', '$telefone', md5('$senha'))";

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
			<a href="pagina_inicial.php" class="text-white btn btn-primary">Voltar</a>
		</div>
	</div>
</div>

