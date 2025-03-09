<?php
   /* Includes e Head */
   require_once __DIR__ . '/head/head.php';
   
   ?>
   
<body>


    <!-- Container principal -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!-- Login Container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
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
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="img/medicoSite.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Monitore doenças!</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Faça o monitoramento das doenças por bairro da sua cidade.</small>
            </div>
            <!-- Caixa da Direita -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 ">
                        <div class="text-center">
                            <img src="/sickstem/app/public/img/logo.png" class="img-fluid" style="width: 180px;">
                        </div>    
                        <h2>Login</h2>
                        <p>Faça login com seus dados de agente.</p>
                        <form action="pagina_inicial.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">CPF</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="CPF">
                                <small class="form-text text-muted">Entre com seus dados de acesso.</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword1">Senha</label>
                                <input type="password" class="form-control" name="Senha">
                            </div>
                            <button type="submit" class="btn btn-primary">Acessar</button>
                        </form>
                        <br>
                        <button type="submit" class="btn btn-primary"><a href="index.php">Voltar a Página Inicial</a></button>
                        <?php
                        if (isset($_POST['CPF'])) {
                            $login = $_POST['CPF'];
                            $senha = md5($_POST['Senha']);

                            include "conexao.php";
                            $sql = "SELECT * FROM `agente` WHERE CPF = '$login' AND Senha = '$senha'";

                            if ($result = mysqli_query($conn, $sql)) {
                                $num_registros = mysqli_num_rows($result);

                                if ($num_registros == 1) {
                                    $linha = mysqli_fetch_assoc($result);

                                    if (($login == $linha['CPF']) and ($senha == $linha['Senha'])) {
                                        session_start();
                                        $_SESSION['CPF'] = "Mateus";
                                        header("location: SICKSTEM");
                                    } else {
                                        echo "Login inválido!";
                                    }
                                } else {
                                    echo "Login ou senha não encontrados ou inválidos";
                                }
                            } else {
                                echo "Nenhum resultado do Banco de Dados.";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>