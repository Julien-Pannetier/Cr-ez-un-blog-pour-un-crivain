<?php ob_start(); ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <div class="text-left">
            <a href="index.php" class="btn btn-primary mb-0">Retour</a>
        </div>
    </div>
</nav>

<!-- Login Section -->
<section id="login" class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5 mx-auto text-center">
                <h2 class="text-black mb-4">CONNEXION</h2>
                <hr class="mb-5">
                <form action="" method="POST">
                    <div class="form-group text-left">
                        <label for="inputEmail">E-MAIL :</label>
                        <input id="inputEmail" name="email" type="email" required>
                    </div>
                    <div class="form-group text-left">
                        <label for="inputPassword">MOT DE PASSE :</label>
                        <input id="inputPassword" name="password" type="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">CONNEXION</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>