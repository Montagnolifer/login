<?php include_once 'handlers/start.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>App Home</title>
    <?php include_once 'components/head.php'; ?>
</head>
<body>
    <div class="mobile-container">
        <?php include_once 'components/nav_bot.php'; ?>
        <?php include_once 'components/nav_top.php'; ?>
        <div class="header center-align title">Bem-vindo ao App</div>
        <button class="button">Clique aqui</button>

        <h4 class="title fs-18 ">Teste de titulo</h4>
        <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
        <div class="grid-two-columns">
            <div class="grid-item">Item 1</div>
            <div class="grid-item">Item 2</div>
            <div class="grid-item">Item 3</div>
            <div class="grid-item">Item 4</div>
        </div>

        <h4 class="title fs-18 ">Teste de titulo</h4>
        <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
        <div class="grid-three-columns">
            <div class="grid-item">Item 1</div>
            <div class="grid-item">Item 2</div>
            <div class="grid-item">Item 3</div>
            <div class="grid-item">Item 4</div>
        </div>

        <h4 class="title fs-18 ">Teste de titulo</h4>
        <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
        <div class="grid-four-columns">
            <div class="grid-item">Item 1</div>
            <div class="grid-item">Item 2</div>
            <div class="grid-item">Item 3</div>
            <div class="grid-item">Item 4</div>
        </div>

        <h4 class="title fs-18 ">Teste de titulo</h4>
        <h6 class="description fs-14 text-grey">Grid Normal com Duas Colunas</h6>
        <div class="grid-scroll">
            <div class="grid-item">Item 1</div>
            <div class="grid-item">Item 2</div>
            <div class="grid-item">Item 3</div>
            <div class="grid-item">Item 4</div>
            <div class="grid-item">Item 5</div>
            <div class="grid-item">Item 6</div>
            <div class="grid-item">Item 7</div>
            <div class="grid-item">Item 8</div>
        </div>
    </div>

    <?php include_once 'components/js.php'; ?>
</body>

</html>
