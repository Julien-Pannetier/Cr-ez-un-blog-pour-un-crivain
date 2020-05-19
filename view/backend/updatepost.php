<?php $title = "Jean Forteroche - Modifier un chapitre"; ?>

<?php ob_start(); ?>
	<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="my-4">Modifier un chapitre</h1>
                <form action="index.php?action=updatePost&amp;id=<?= htmlspecialchars($post->id()) ?>" method="POST">
                    <div class="form-group">
                        <label for="title"></label>
                        <input class="form-control rounded-0 py-4" id="title" type="text" name="title" placeholder="Saisissez votre titre ici" value="<?= htmlspecialchars_decode($post->title()) ?>" />
                    </div>
                    <div class="form-group">
                        <label for="textarea"></label>
                        <textarea id="textarea" name="content"><?= htmlspecialchars_decode($post->content()) ?></textarea>
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