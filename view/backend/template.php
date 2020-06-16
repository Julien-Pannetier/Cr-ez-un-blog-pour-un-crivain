<!DOCTYPE html>
<html lang="fr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Nam condimentum sapien et purus convallis euismod. Praesent blandit eget ligula id placerat. Nunc quis dignissim quam. Duis quis orci erat. Nunc eros justo, placerat dapibus sollicitudin non, lacinia eu nibh.">

        <title><?= $title ?></title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles -->
        <link href="./public/css/admin.css" rel="stylesheet">

        <!-- Tiny MCE -->
        <script src="vendor/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: '#textarea',
            language: "fr_FR",
            height : "380",
            menubar: false,
            placeholder: "Saisissez votre texte ici"
        });
        </script>
    </head>

    <body class="sb-nav-fixed">
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Jean Forteroche</a>
                <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
                    <i class="fas fa-bars"></i>
                </button>
                
                <!-- Navbar-->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="index.php?action=logout">Se déconnecter</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <a class="nav-link" href="index.php?action=dashbord">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Tableau de bord
                                </a>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Chapitres
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="index.php?action=posts">Tous les chapitres</a>
                                        <a class="nav-link" href="index.php?action=displayAddPost">Ajouter un chapitre</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="index.php?action=comments">
                                    <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>Commentaires
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>

        <?= $content ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts -->
        <script src="./public/js/admin.js"></script>
    </body>
</html>