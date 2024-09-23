<!-- Barra de Navegação Inferior -->
<div class="bottom-nav">
    <a href="/home/" class="nav-item">
        <i class="fi fi-sr-apps"></i>
    </a>
    <a href="/challenges/" class="nav-item">
        <i class="fi fi-sr-badge"></i>
    </a>
    <a href="/cart/" class="nav-item">
        <i class="fi fi-sr-trophy-star"></i>
    </a>
    <a href="/menu/" class="nav-item">
        <i class="fi fi-sr-user"></i>
    </a>
    <a href="/notification/" class="nav-item">
        <i class="fi fi-sr-user"></i>
    </a>
    <a href="/profile/" class="nav-item">
        <i class="fi fi-sr-user"></i>
    </a>
</div>


<style>
    /* Estilo da barra de navegação inferior */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    /* Estilo dos ícones */
    .bottom-nav a {
        color: #aaa;
        font-size: 24px;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .bottom-nav a:hover {
        color: #555;
    }
</style>