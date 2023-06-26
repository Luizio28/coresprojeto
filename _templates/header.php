<header>
    <h1>Placeholder</h1>
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