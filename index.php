<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- link  acima é o link do bootstrap-->

<?php
// dsn é a para localizar o banco de dados, mysql e nome do banco é a db_chamadinha, o localhost que é 127.0.0.1
$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
// o $user é o usuario root conectadp
$password = '';
// $password é a senha que o banco teria que no caso esta vazio

$banco = new PDO($dsn, $user, $password);
// a variavel $banco contém as variavel da conexão com o banco.

$select = 'SELECT * FROM tb_alunos';
// a variavel $select contém o script para selecionar todas as informações da tabela tb_alunos;

$resultado = $banco->query($select)->fetchAll();
// a variavel $resultado contém a variavel banco para retornar todas as informações

// fetchAll -> retorne todas as informações

// echo '<pre>'; //pre -> comando HTML para organizar os arquivos

// var_dump( $resultado);
// var_dump é uma função -> vai fazer um debug da variavel parece todas as informações

?>
<main class="container my-5">
<!--  -->
    <table class="table table-striped">
        <div class="my-3 d-flex justify-content-end">
            <a href="formulario.php" class="btn btn-success">Cadastrar Novo Aluno</a>
        </div>
        <tr class="text-center">
            <td>
                id
            </td>
            <td>
                nome
            </td>
            <td>
                Ações
            </td>
        </tr>
        <!-- o foreach funciona somente no array, pegar o array e fazer um laço, quando estiver rodando é como estivesse lendo cada linha da lista -->
        <!-- atribuição o sinal de igual e maior  =>  -->
        <!-- as - atribui, estou mandando para algum lugar -->

        <?php foreach ($resultado as $linha) { ?>
            <!-- a linha acima esta lendo cada linha e colocando na variavel $linha -->
            <tr class="text-center">
                <td>
                    <?php echo $linha['Id_alunos'] ?>
                    <!-- linha acima parece o id do aluno  -->
                </td>
                <td>
                    <?= $linha['nome'] ?>
                    <!-- aparece o nome  -->
                    <!-- O atalho só funciona para o ECHO -->
                </td>
                <td>
                    <a href="./ficha.php?id_aluno=<?php echo $linha['Id_alunos'] ?>" class="btn btn-primary">Abrir</a>
                    <!-- a linha acima é o botão de abrir, que vai abrir a pagina ficha.php, perante o id do aluno selecionado -->
                    <a href="./formulario-editar.php?id_aluno_alterar=<?php echo $linha['Id_alunos'] ?>" class="btn btn-warning">Editar</a>
                    <!-- a linha acima é o botão de editar que direciona para pagina formulario-editar.php  -->
                    <a href="./aluno-deletar.php?id=<?php echo $linha['Id_alunos'] ?>" class="btn btn-danger">Excluir</a>
                    <!-- a linha acima, exclui o registro do aluno que direciona para pagina aluno-deletar.php, diante ao ID do aluno -->
                     
                    <!-- da esquerda do ? é arquivo , da direita é variavel -->
                </td>
            </tr>
        <?php } ?>
    </table>
</main>