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
                    width: 1030px;
                }

                /*------------ Right box ------------*/
                .right-box {
                    padding: 40px 30px 40px 40px;
                }
            </style>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 ">
                        <h2>Registrar Consulta</h2><br>
                        <form method="post" action="processa_cadastro_consulta.php">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="codigo">Código:</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="paciente">Paciente:</label>
                                    <select class="form-control" id="paciente" name="paciente" required>
                                        <?php
                                        include "conexao.php";

                                        $consultaPacientes = "SELECT CPF, Nome FROM paciente";
                                        $resultPacientes = mysqli_query($conn, $consultaPacientes);

                                        while ($linhaPaciente = mysqli_fetch_assoc($resultPacientes)) {
                                            $cpfPaciente = $linhaPaciente['CPF'];
                                            $nomePaciente = $linhaPaciente['Nome'];
                                            echo "<option value='$cpfPaciente'>$nomePaciente</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cpfPaciente">CPF do Paciente:</label>
                                    <input type="text" class="form-control" id="cpfPaciente" name="cpfPaciente" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="medico">Médico:</label>
                                    <select class="form-control" id="medico" name="medico" required>
                                        <?php
                                        $consultaMedicos = "SELECT CRM, Nome FROM medico";
                                        $resultMedicos = mysqli_query($conn, $consultaMedicos);

                                        while ($linhaMedico = mysqli_fetch_assoc($resultMedicos)) {
                                            $crmMedico = $linhaMedico['CRM'];
                                            $nomeMedico = $linhaMedico['Nome'];
                                            echo "<option value='$crmMedico'>$nomeMedico</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="crmMedico">CRM do Médico:</label>
                                    <input type="text" class="form-control" id="crmMedico" name="crmMedico" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="dataHora">Data e Hora:</label>
                                    <input type="datetime-local" class="form-control" id="dataHora" name="dataHora" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="doenca">Doença:</label>
                                    <select class="form-control" id="doenca" name="doenca" required>
                                        <?php
                                        $consultaDoencas = "SELECT Nome FROM doenca";
                                        $resultDoencas = mysqli_query($conn, $consultaDoencas);

                                        while ($linhaDoenca = mysqli_fetch_assoc($resultDoencas)) {
                                            $nomeDoenca = $linhaDoenca['Nome'];
                                            echo "<option value='$nomeDoenca'>$nomeDoenca</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Caixa da Direita -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4169E1;">
                <div class="featured-image mb-3">
                    <img src="img/consulta.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Registre as consultas!</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Realize o registro das consultas feitas com seus pacientes.</small>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('paciente').addEventListener('change', function() {
            var selectedPaciente = this.value;
            document.getElementById('cpfPaciente').value = selectedPaciente;
        });

        document.getElementById('medico').addEventListener('change', function() {
            var selectedMedico = this.value;
            document.getElementById('crmMedico').value = selectedMedico;
        });
    </script>
    </div>

    <!-- Rodapé, scripts, etc. aqui... -->

</body>

</html>