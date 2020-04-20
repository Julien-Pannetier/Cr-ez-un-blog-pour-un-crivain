<?php $title = 'Jean Forteroche - Connexion'; ?>

<?php $navigation = ''; ?>

<?php ob_start(); ?>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Connexion à votre compte</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmail">E-mail</label>
                                            <input class="form-control py-4" id="inputEmail" name="email" type="email" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Mot de passe</label>
                                            <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Mot de passe" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberCheck" type="checkbox" name="remember" >
                                                <label class="custom-control-label" for="rememberCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                        <div class="form-group text-right mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">Connexion</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="index.php">Retour à l'accueil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>