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
                        <a class="home__button button" href="#about">Découvrir</a>
                    </div>
                    <div class="home__arrowDown"></div>
                </div>
            </div>
        </header>

        <!-- Menu -->
        <section class="menu" id="menu">
            <nav class="menu__nav">
                <ul class="menu__items">
                    <li class="menu__item"><a class="menu__link" href="#home">ACCUEIL</a></li>
                    <li class="menu__item"><a class="menu__link" href="#about">A PROPOS</a></li>
                    <li class="menu__item"><a class="menu__link" href="#blog">BLOG</a></li>
                    <li class="menu__item"><a class="menu__link" href="#contact">CONTACT</a></li>
                </ul>
            </nav>
        </section>

        <!-- Section A propos -->
        <section class="about" id="about">
            <div class="about__container">
                <h2>A PROPOS</h2>
                <hr/>
                <div class="about__content">
                    <div class="about__image">
                        <!-- <img class="about__image_responsive" src="./public/images/portrait.jpg" alt="Portrait de Jean Forteroche." /> -->
                    </div>
                    <div class="about__text">
                        <h3>JEAN FORTEROCHE</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed venenatis velit. Mauris a maximus erat. Mauris facilisis tempor tincidunt. Morbi placerat nisl velit, id hendrerit mi cursus eget. Quisque tristique, mauris non efficitur pretium, urna massa tempus velit, porttitor ultrices magna nisl ut quam. Donec viverra sem feugiat, sagittis dui quis, consequat quam. Pellentesque eget fringilla augue. Nulla ut felis non metus congue commodo pellentesque quis lorem. Nulla non ligula erat. Cras interdum varius nulla quis scelerisque. Quisque at cursus dui, et lobortis nunc.
                        </p>
                        <p>
                            Fusce congue, arcu quis commodo commodo, purus nisi euismod felis, eget placerat massa orci at risus. Vestibulum pharetra ex tellus, ut imperdiet magna tincidunt eget. Nullam faucibus, diam quis luctus scelerisque, metus ex iaculis augue, et tristique nisi quam non odio. Mauris aliquam imperdiet lacus. In efficitur rutrum odio. Quisque vehicula interdum est, a ullamcorper sem vestibulum a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        </p>
                        <p>
                            Nullam pharetra libero at nisl pulvinar, congue fermentum metus ullamcorper. Etiam nec nunc varius, rutrum enim ac, lobortis mi. Suspendisse at commodo est. Aliquam erat volutpat. Vestibulum vehicula quis metus rhoncus dignissim. In hac habitasse platea dictumst. Nullam eu tincidunt augue, eu congue sapien. Nulla eu metus sollicitudin, aliquet ligula nec, suscipit mi. Ut in luctus nisl, quis ullamcorper felis. Mauris eu nisl eros. Duis tristique mauris erat, non rutrum purus ultrices eget.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Blog -->
        <section class="blog" id="blog">
            <div class="blog__container">
                <h2>Derniers billets de blog</h2>
                
                <?php
                while ($data = $posts->fetch())
                {
                ?>
                    <div>
                        <hr/>
                        <h3>
                            <?= htmlspecialchars($data['title']) ?>    
                        </h3>
                        <p>
                            <em>Publié le <?= $data['date'] ?></em>
                        </p>
                        <p class="blog__text">
                            <?= nl2br(htmlspecialchars($data['content'])) ?><br>
                            <a class="blog__button button" href="index.php?action=post&amp;id=<?= htmlspecialchars($data['id']) ?>">Lire la suite</a>
                        </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </section> 

        <!-- Contact -->
        <section class="contact" id="contact">
            <h2>Contact</h2>
            <hr/>
            <p class="contact__text_center">
                Pour me contacter, veuillez utiliser le formulaire ci-dessous.
            </p>
            <div class="contact__content">
                <div class="contact__form">
                    <form action="contact.php" method="POST">
                        <div class="contact__form_name">
                            <label for="name">NOM :</label><br><br>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="contact__form_email">
                            <label for="email">ADRESSE DE MESSAGERIE :</label><br><br>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="contact__form_message">
                            <label for="message">MESSAGE :</label><br><br>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div>
                            <input class="contact__form_submit submit" id="submit" name="submit" type="submit" value="ENVOYER">
                        </div>
                    </form>
                </div>
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