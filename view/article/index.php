<?php require 'view/layout/header.php'?>
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Artykuły</h1>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary float-end mt-2 btn-lg" href="<?=APP_URL?>/article/add"><i class="fa fa-pencil" aria-hidden="true"></i> Dodaj artykuł</a>
        </div>
    </div>
<?php foreach($context['articles'] as $article) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?= $article->title; ?></h4>
        <div class="bg-light p-2 mb-3">
            Data dodania: <?= $article->created_at; ?>
        </div>
        <p class="card-text"><?= $article->body; ?></p>
        <a class="btn btn-dark" href="article/show/<?= $article->id; ?>">Więcej</a>
    </div>
<?php endforeach; ?>
<?php require 'view/layout/footer.php'; ?>