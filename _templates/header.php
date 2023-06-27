<header>
    <div class="spaced-between flex-row">
        <img src="../_img/logo_ifba.webp" alt="Logo do IFBA - campus Eunápolis" style="height: 6em; aspect-ratio: preserve;">

        <nav class="flex-row">
            <?php
            if (isset($_SESSION['id'])) {
                echo  "<span class='material-symbols-rounded'>account_circle</span>";

                echo "<p>" . $_SESSION['id'] . "</p>";
            } else {
                echo "<p>você ainda não está logado</p>";
            }
            ?>
            <a href="../_scripts/sign_out.php" class='no-deco'>
                <span class='material-symbols-rounded'>logout</span>
            </a>
        </nav>
    </div>
</header>