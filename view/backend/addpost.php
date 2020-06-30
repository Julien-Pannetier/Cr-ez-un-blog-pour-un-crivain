<?php $title = "Jean Forteroche - Ajouter un chapitre"; ?>

<?php ob_start(); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="my-4">Ajouter un nouveau chapitre</h1>
                <form action="index.php?action=addPost" method="POST">
                    <div class="form-group">
                        <label for="title"></label>
                        <input class="form-control rounded-0 py-4" id="title" type="text" name="title" placeholder="Saisissez votre titre ici" required>
                    </div>
                    <div class="form-group">
                        <label for="textarea"></label>
                        <textarea id="textarea" name="content"></textarea>
                    </div>
                    <div class="form-group text-right my-4">
                        <button type="submit" class="btn btn-primary">PUBLIER</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>