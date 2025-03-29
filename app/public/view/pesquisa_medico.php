<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

    <?php

    $pesquisa = $_POST['busca'] ?? '';

    include __DIR__ . '/../../src/conec/conexao.php';

    $sql = "SELECT * FROM medico WHERE Nome LIKE '%$pesquisa%' OR CRM LIKE '%$pesquisa%' OR Especialidade LIKE '%$pesquisa%'";

    $dados = mysqli_query($conn, $sql);
    ?>
	
<?php
   /* Menu de opções internas */
   require_once __DIR__ . '/menu/menu_options.php';
   
   ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border rounded-3 p-5  mt-5 shadow box-area">
                    <h1>Pesquisar Médico</h1><br>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search" action="pesquisa_medico.php" method="POST">
                                <input class="form-control me-2" type="search" placeholder="Consulte" aria-label="Search" name="busca" autofocus>
                                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                            </form>
                        </div>
                    </nav>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">CRM</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Especialidade</th>
                                <th scope="col">Funções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $crm = $linha['CRM'];
                                $nome = $linha['Nome'];
                                $especialidade = $linha['Especialidade'];

                                echo "<tr>
                                            <th scope='row'>$crm</th>
                                            <td>$nome</td>
                                            <td>$especialidade</td>
                                            <td>
                                                <a href='editarMedico.php?id=$crm' class='text-white btn btn-success btn-sm'>Editar</a>
                                                <a href='#' class='text-white btn btn-danger btn-sm ' data-toggle='modal' data-target='#confirma'
                                                onclick=" . '"' . "pegar_dados('$crm', '$nome')" . '"' . " \" style='background-color: #dc3545;'>Excluir</a>
                                            </td>
                                     </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="pagina_inicial.php" class="text-white btn btn-primary my-2">Voltar a Página Inicial</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="excluirMedico_script.php" method="POST">
                        <p>Deseja realmente excluir <b id="nome_pessoa">Nome da pessoa</b>?</p>
                        <input type="hidden" name="Nome" id="nome_pessoa_1" value="">
                        <input type="hidden" name="CRM" id="CRM" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            <input type="submit" class="btn btn-danger" value="Sim">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function pegar_dados(crm, nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa_1').value = nome;
            document.getElementById('CRM').value = crm;
        }
    </script>

    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>