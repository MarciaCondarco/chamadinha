<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- link do boostrap -->
<style>
    /* estilizando a class formulario */
    .formulario{
        display: flex;
        /* define a posição do elemento com o resto */
        flex-direction: column;
        /* define o elemento em direção de coluna */
        align-items: center;
        /* centraliza na vertical os elementos */
        gap: 50px;
        /* espaçamento entre os elementos de 50px */
    }   
</style>
<section class="linha-formulario">
    <!-- seção para iniciar o formulario dos alunos-->
    <div class="formulario" class="text-center">
        <h1>Formulario</h1>
        <!-- metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo -->
        <!-- Action: ele é para onde deve enviar os dados -->
        <form action="./aluno-cadastrar.php" method="POST">
            <!-- formulario com metodo POST para coletar as informações do conteúdo e direciona para a pagina aluno-cadastrar.php -->
            <input type="text" placeholder="nome" name="nome"><br>
            <!-- campo que inseri o nome do tipo text -->
            <input type="number" placeholder="Telefone" name="telefone"><br>
            <!-- campo que inseri o telefone com tipo number -->
            <input type="email" placeholder="Email" name="email"><br>
            <!-- campo que inseri o email com tipo email -->
            <input type="date" placeholder="Nascimento" name="nascimento"><br>
            <!-- campo que inseri a data de nascimento do tipo date -->
            <div>
                <label>Frequente?</label>
                <!-- label é o texto que aparece emcima do campo -->
                <input type="checkbox" placeholder="Frequente" name="frequente"><br>
                <!-- checkbox para selecionar se esta frequente ou não -->
            </div>
            <input type="file" accept="imagem/*" name="img"><br>
            <!-- campo para selecionar imagem selecionada -->
            <input type="submit">
            <!-- botão para enviar -->
        </form>
    </div>
</section>,