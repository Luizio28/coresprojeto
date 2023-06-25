<header>
    <h1>Placeholder</h1>
    <p>
        <?php
        if (isset($_COOKIE['id'])) {
            echo $_COOKIE['id'];
        }else{
            echo "você ainda não está logado";
        }
        ?>
    </p>
</header>