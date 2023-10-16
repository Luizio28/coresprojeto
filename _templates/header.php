<header>
    <div class="spaced-between flex-row">
        <img src="../_img/logo_ifba.webp" alt="Logo do IFBA - campus Eunápolis" style="height: 6em; aspect-ratio: preserve;">

        <?php
        if (isset($_SESSION['id'])) {
            echo "
            <nav class='flex-row'>
                <span class='material-symbols-rounded unselectable'>account_circle</span>" .

                "<p>" . $_SESSION['id'] . "</p>" .

                "<button id='change-profile-photo' class='no-deco unselectable'>
                    <a href='../adicionar-foto/'><span class='material-symbols-rounded'>add_a_photo</span></a>
                </button>" .

                "<a href='../_scripts/sign_out.php' class='no-deco unselectable'>
                    <span class='material-symbols-rounded'>logout</span>
                </a>
            </nav>
            ";
        }
        ?>
    </div>
</header>
