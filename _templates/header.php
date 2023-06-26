<header>
    <img src="../_img/logo_ifba.webp" alt="Logo do IFBA - campus Eunápolis"  style="width: 7em; aspect-ratio: preserve;">
    <p>
        <?php
        if (isset($_SESSION['id'])) {
            echo $_SESSION['id'];
        }else{
            echo "você ainda não está logado";
        }
        ?>
    </p>
</header>