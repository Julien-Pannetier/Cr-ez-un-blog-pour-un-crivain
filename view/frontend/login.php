<?php ob_start(); ?>

<!-- Login Section -->
<section id="login" class="login-section">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Connection</h3>
                                <form action="index.php?action=login" method="POST">
                                    <div class="form-label-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                                    </div>
                                    <div class="form-label-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <label class="custom-control-label" for="checkbox">Se souvenir de moi</label>
                                        <input type="checkbox" class="custom-control-input" id="checkbox">
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">
                                        Se connecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>