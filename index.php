<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<?php

$dsn = 'mysql:dbname=db_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = 'SELECT * FROM tb_alunos';

$resultado = $banco->query($select)->fetchAll();
// fetchAll -> retorne todas as informações

// echo '<pre>'; //pre -> comando HTML para organizar os arquivos

// var_dump( $resultado);
// var_dump é uma função -> vai fazer um debug da variavel parece todas as informações

?>
<main class="container my-5">
    <table class="table table-striped">
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
            <tr class="text-center">
                <td>
                    <?php echo $linha['Id_alunos'] ?>
                </td>
                <td>
                    <?= $linha['nome'] ?>
                    <!-- O atalho só funciona para o ECHO -->
                </td>
                <td>
                    <a href="./ficha.php?id_aluno=<?php echo $linha['Id_alunos'] ?>" class="btn btn-primary">Abrir</a>
                    <a href="#" class="btn btn-warning">Editar</a>
                    <a href="#" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>