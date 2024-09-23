<?php include_once '../handlers/start.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>App Home</title>
    <?php include_once '../components/head.php'; ?>
</head>

<body>
    <div class="mobile-container">
        <?php include_once '../components/nav_bot.php'; ?>
        <?php include_once '../components/nav_top.php'; ?>
        <div class="card">
            <a href="">
                <img src="https://cdn.prod.website-files.com/652421babb6bdd7f92f721b7/652421babb6bdd7f92f722c1_beneficios-da-corrida.jpg" alt="">
                <h4 class="title fs-18 ">Teste de titulo</h4>
                <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
            </a>
        </div>
        <div class="card">
            <a href="">
                <img src="https://cdn.prod.website-files.com/652421babb6bdd7f92f721b7/652421babb6bdd7f92f722c1_beneficios-da-corrida.jpg" alt="">
                <h4 class="title fs-18 ">Teste de titulo</h4>
                <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
            </a>
        </div>
        <div class="card">
            <a href="">
                <img src="https://cdn.prod.website-files.com/652421babb6bdd7f92f721b7/652421babb6bdd7f92f722c1_beneficios-da-corrida.jpg" alt="">
                <h4 class="title fs-18 ">Teste de titulo</h4>
                <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
            </a>
        </div>
        <div class="card">
            <a href="">
                <img src="https://cdn.prod.website-files.com/652421babb6bdd7f92f721b7/652421babb6bdd7f92f722c1_beneficios-da-corrida.jpg" alt="">
                <h4 class="title fs-18 ">Teste de titulo</h4>
                <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
            </a>
        </div>
        
        <?php include_once '../components/js.php'; ?>
    </div>
</body>

</html>
<style>
    .card {
        background: white;
        border-radius: 20px;
        padding: 10px;
        /*box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);*/
        text-align: center;
        width: 100%;
        margin-top: 10px;
    }

    .card img {
        width: 100%;
        border-radius: 20px;
    }
</style>