<?php ob_start(); ?>

<!-- Header -->
<header id="masthead" class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">Jean Forteroche</h1>
            <h2 class="text-white-50 mx-auto mt-2 mb-5">Billet simple pour l'Alaska</h2>
            <a href="#about" class="btn btn-primary js-scroll-trigger">Découvrir</a>
        </div>
    </div>
</header>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            MENU
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#masthead">ACCUEIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">A PROPOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#blog">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">CONTACT</a>
                </li>
            </ul>
            <?php if(isset($_SESSION['admin'])): ?>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="index.php?action=dashbord">Tableau de bord</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=logout">Se déconnecter</a>
                        </div>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</nav>

<!-- About Section -->
<section id="about" class="about-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-black mb-4">A PROPOS</h2>
                <hr class="d-none d-lg-block mb-5">
            </div>
        </div>
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6">
                <img class="img-fluid" src="./public/images/portrait.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 about">
                    <div class="d-flex h-100">
                        <div class="about-text w-100 my-auto text-justify">
                            <h3 class="text-white">Jean Forteroche</h3>
                            <p class="mb-0 text-white-50">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis velit. Mauris a maximus erat. Mauris facilisis tempor tincidunt. Morbi placerat nisl velit, id hendrerit mi cursus eget. Quisque tristique, mauris non efficitur pretium, urna massa tempus velit, porttitor ultrices magna nisl ut quam. Donec viverra sem feugiat, sagittis dui quis, consequat quam. Pellentesque eget fringilla augue. Nulla ut felis non metus congue commodo pellentesque quis lorem.
                            </p>
                            <p class="mb-0 text-white-50">
                                Fusce congue, arcu quis commodo commodo, purus nisi euismod felis, eget placerat massa orci at risus. Vestibulum pharetra ex tellus, ut imperdiet magna tincidunt eget. Nullam faucibus, diam quis luctus scelerisque, metus ex iaculis augue, et tristique nisi quam non odio. Mauris aliquam imperdiet lacus. In efficitur rutrum odio. Quisque vehicula interdum est, a ullamcorper sem vestibulum a.
                            </p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="blog-section text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-black mb-4">BILLETS DE BLOG</h2>
                <hr class="d-none d-lg-block mb-5">
            </div>
        </div>
        <?php
        while ($data = $posts->fetch())
        {
        ?>
            <div class="col-lg-8 mx-auto featured-text text-center">
                <h3>
                    <?= htmlspecialchars($data->title) ?>
                </h3>
                <p class="text-black-50 mb-1">
                    <em>Publié le <?= $data->date ?></em>
                </p>
                <p class="text-black-50 text-justify mb-0">
                    <?= nl2br(htmlspecialchars($data->content)) ?>
                </p>
                <a class="btn btn-primary" href="index.php?action=post&amp;id=<?= htmlspecialchars($data->id) ?>" >
                    Lire la suite
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <h2 class="text-black mb-4">CONTACT</h2>
                <hr class="d-none d-lg-block mb-5">
                <p class="mb-5">
                    Pour me contacter, veuillez utiliser le formulaire ci-dessous.
                </p>
                <form action="contact.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-5 text-left">
                            <label for="name">NOM :</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="form-group col-md-6 offset-md-1 text-left">
                            <label for="email">ADRESSE DE MESSAGERIE :</label>
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label for="message">MESSAGE :</label>
                        <textarea id="message" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ENVOYER</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>