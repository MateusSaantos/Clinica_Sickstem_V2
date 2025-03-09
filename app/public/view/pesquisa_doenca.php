<?php

/* Includes e Head */
require_once __DIR__ . '/head/head.php';

?>

<body>
    <?php

    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    $sql = "SELECT * FROM doenca WHERE Nome LIKE '%$pesquisa%'";
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
                    <h1>Pesquisar Doenças</h1><br>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-md-13 ml-auto"> <!-- Ajuste a largura conforme necessário -->
                                    <form class="d-flex" role="search" action="pesquisa_doenca.php" method="POST">
                                        <input class="form-control me-2" type="search" placeholder="Consulte" aria-label="Search" name="busca" autofocus>
                                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Gravidade</th>
                                <th scope="col">Classificação</th>
                                <th scope="col">Condição</th>
                                <th scope="col">Funções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $nome = $linha['Nome'];
                                $gravidade = $linha['Gravidade'];
                                $classificacao = $linha['Classificacao'];
                                $condicao = $linha['Condicao'];

                                echo "<tr>
                                            <th scope='row'>$nome</th>
                                            <td>$gravidade</td>
                                            <td>$classificacao</td>
                                            <td>$condicao</td>
                                            <td>
                                                <a href='editar_doenca.php?id=$nome' class='text-white btn btn-success btn-sm'>Editar</a>
                                                <a href='#' class='text-white btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' onclick=\"pegar_dados('$nome')\" style='background-color: #dc3545;'>Excluir</a>
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
                    <form action="excluir_doenca.php" method="POST">
                        <p>Deseja realmente excluir <b id="nome_pessoa"> </b>?</p>
                        <input type=hidden name="nome" id="nome_pessoa1" value="<?= $nome ?>">
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
        function pegar_dados(nome) {
            document.getElementById('nome_pessoa').innerHTML = nome;
            document.getElementById('nome_pessoa1').value = nome;
        }
    </script>


    <!-- Adicione os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>