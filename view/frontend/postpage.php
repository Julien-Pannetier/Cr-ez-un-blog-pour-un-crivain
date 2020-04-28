<?php ob_start(); ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-light" id="mainNav">
    <div class="container">
        <div class="text-left">
            <a href="index.php#blog" class="btn btn-primary mb-0">Retour</a>
        </div>
    </div>
</nav>

<!-- Post Section  -->
<section id="post" class="post-section text-center bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-black mb-4">
                    <?= $post->title ?>
                </h2>
                <hr class="d-none d-lg-block mb-5">
                <p class="text-black-50 text-left mb-3">
                    <em>Publié le <?= $post->date ?></em>
                </p>
                <p class="text-black-50 text-justify mb-5">
                    <?= $post->content ?>
                </p>
                <a href="index.php" class="btn btn-primary my-0">Précédent</a>
                <a href="index.php" class="btn btn-primary my-0">Suivant</a>
            </div>
        </div>
    </div>
</section>

<!-- Comment Section -->
<section id="comment" class="comment-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <h2 class="text-black mb-4">
                    COMMENTAIRES
                </h2>
                <hr class="d-none d-lg-block mb-5">
            </div>
        </div>

        <?php
        if ($comments->rowCount() == 0): ?>
            <p class="text-center mb-5">Il n’y a pas encore de commentaire à ce chapitre. Soyez le premier à réagir.</p>                
        <?php 
        endif;
        while ($comment = $comments->fetch())
        {
        ?>
        <div class="mb-5">
            <div class="col-md-10 col-lg-8 mx-auto">
                <p>
                    <strong><?= htmlspecialchars($comment->author) ?></strong><em>, le <?= $comment->date ?></em>
                    <a class="ml-3 text-danger" href="index.php?action=reportComment&amp;commentId=<?= htmlspecialchars($comment->id) ?>&amp;postId=<?= htmlspecialchars($comment->post_id) ?>" title="Signaler ce commentaire !">
                        <i class="fas fa-flag"></i>
                    </a>
                </p>
                <p class="text-justify">
                    <?= $comment->comment ?>
                </p>
            </div>
        </div>
        <?php
        }
        ?>
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <h3 class="text-black mt-4 mb-4">
                    LAISSER UN COMMENTAIRE
                </h3>
                <hr class="d-none d-lg-block mb-5">
                <p class="mb-5">
                    Votre adresse de messagerie ne sera pas publiée.
                </p>
                <form action="index.php?action=addComment&amp;id=<?= $post->id ?>" method="POST">
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