<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <title>Jean Forteroche</title>

        <link rel="stylesheet" href="./public/css/style.css" />

    </head>
    
    <body>

        <!-- Header -->
        <header class="home" id="home">
            <div class="home__background_opacity">
                <div class="home__container">
                    <div class="home__content">
                        <h1>Jean Forteroche</h1>
                        <hr class="home__breakElement_white" />
                        <p class="home__text_white">
                            Billet simple pour l'Alaska
                        </p>
                    </div>
                    <div class="home__arrowDown"></div>
                </div>
            </div>
        </header>

        <!-- Section Post -->
        <section class="post" id="post">
            <div class="post__container">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <hr/>
                <p>
                    <em>Publié le <?= $post['date'] ?></em>
                </p>
                <p class="post__text">
                    <?= nl2br(htmlspecialchars($post['content'])) ?>
                </p>
            </div>
        </section>

        <!-- Commentaires -->
        <section class="comment" id="comment">
            <h2>Laisser un commentaire</h2>
            <hr/>
            <p class="comment__text_center">
                Votre adresse de messagerie ne sera pas publiée.
            </p>
            <div class="comment__content">
                <div class="comment__form">
                    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="POST">
                        <div class="comment__form_name">
                            <label for="name">NOM :</label><br><br>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="comment__form_email">
                            <label for="email">ADRESSE DE MESSAGERIE :</label><br><br>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="comment__form_message">
                            <label for="message">MESSAGE :</label><br><br>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div>
                            <input class="comment__form_submit submit" id="submit" name="submit" type="submit" value="ENVOYER">
                        </div>
                    </form>
                </div>
                <?php
                while ($comment = $comments->fetch())
                {
                ?>
                <div class="comment__list">
                    <p class="comment__list_author">
                        <strong><?= htmlspecialchars($comment['author']) ?></strong><em>, le <?= $comment['date'] ?></em>
                    </p>
                    <p class="comment__list_message">
                        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                    </p>
                </div>
                <?php
                }
                ?>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer" id="footer">
            <nav class="footer__nav">
                <ul class="footer__items">
                    <li class="footer__item"><a class="footer__link" href="#home">Accueil</a></li>
                    <li class="footer__item"><a class="footer__link" href="#about">A propos</a></li>
                    <li class="footer__item"><a class="footer__link" href="#blog">Blog</a></li>
                    <li class="footer__item"><a class="footer__link" href="#contact">Contact</a></li>
                    <li class="footer__item"><a class="footer__link" href="#">Admin</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>