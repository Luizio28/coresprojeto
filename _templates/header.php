<header>
    <div class="spaced-between flex-row">
        <img src="../_img/logo_ifba.webp" alt="Logo do IFBA - campus Eunápolis" style="height: 6em; aspect-ratio: preserve;">

        <?php
        if (isset($_SESSION['id'])) {
            $diretorio_foto = "../foto/".$_SESSION['id'].".png";
            echo "
            <nav class='flex-row'>".

            "<a href='../_scripts/sign_out.php' class='no-deco'>
            sair
            </a>".

                "<p>" . $_SESSION['id'] . "</p>";
            if (!file_exists($diretorio_foto)){
                echo "<a href='../adicionar-foto/' class='no-deco'>adicionar foto</a>";
            }else{
                echo "<button id='change-profile-photo' class='no-deco'>".
                        "<a href='../adicionar-foto/'><img id='profile-photo' src='$diretorio_foto' alt='foto de perfil'></a>".
                     "</button>";
            }

            echo "</nav>";
        }
        ?>
    </div>
</header>
