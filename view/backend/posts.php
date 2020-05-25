<?php $title = 'Jean Forteroche - Chapitres'; ?>

<?php ob_start(); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="my-4">Chapitres</h1>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-book-open mr-1"></i>Tous les chapitres</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Date de publication</th>
                                        <th>Chapitre</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars_decode($post->title()) ?></td>
                                            <td><?= $post->date() ?></td>
                                            <td class="text-justify"><?= Functions::excerpt(htmlspecialchars_decode($post->content()), 500) ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a class="btn btn-warning mx-1" href="index.php?action=displayUpdatePost&amp;id=<?= htmlspecialchars($post->id()) ?>" title="Modifier">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger mx-1" href="index.php?action=deletePost&amp;id=<?= htmlspecialchars($post->id()) ?>" title="Supprimer">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>