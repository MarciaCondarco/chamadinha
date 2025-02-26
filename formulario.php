<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .formulario{
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 50px;
    }   
</style>
<section class="linha-formulario">
    <div class="formulario">
        <h1>Formulario</h1>
        <!-- metodo de envio -> GET: manda informações atraves da url E POST: manda informações atraves do corpo -->
        <!-- Action: ele é para onde deve enviar os dados -->
        <form action="./aluno-cadastrar.php" method="POST">
            <input type="text" placeholder="nome" name="nome"><br>
            <input type="number" placeholder="Telefone" name="telefone"><br>
            <input type="email" placeholder="Email" name="email"><br>
            <input type="date" placeholder="Nascimento" name="nascimento"><br>
            <div>
                <label>Frequente?</label>
                <input type="checkbox" placeholder="Frequente" name="frequente"><br>
            </div>
            <input type="file" accept="imagem/*" name="img"><br>
            <input type="submit">
        </form>
    </div>
</section>