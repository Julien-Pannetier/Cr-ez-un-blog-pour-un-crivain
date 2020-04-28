<?php $title = "Jean Forteroche - Modifier un commentaire"; ?>

<?php ob_start(); ?>
	<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="my-4">Modifier un commentaire</h1>
                <form action="index.php?action=editComment&amp;id=<?= $comment->id ?>" method="POST">
                    <div class="form-group">
                        <label for="author">Auteur</label>
                        <input class="form-control rounded-0 py-4" id="author" type="text" name="author" placeholder="Saisissez votre titre ici" value="<?= $comment->author ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="textarea"></label>
                        <textarea id="textarea" name="comment"><?= $comment->comment ?></textarea>
                    </div>
                    <div class="form-group text-right my-4">
                        <button type="submit" class="btn btn-primary">MODIFIER</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>