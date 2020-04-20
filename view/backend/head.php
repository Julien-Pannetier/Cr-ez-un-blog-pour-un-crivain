<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Espace membres</title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <!-- Custom styles -->
        <link href="../public/css/styles.css" rel="stylesheet">

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">

            <?php if(Session::getInstance()->hasFlashes()): ?>
                <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
                    <div class="alert alert-<?= $type; ?> mt-3 mx-5">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>