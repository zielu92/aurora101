<?php require 'view/layout/header.php'?>
<div class="card card-body bg-light mt-5">
    <h2>Dodaj artykuł</h2>
    <form action="<?=APP_URL?>/article/add" method="post">
        <div class="form-group">
            <label>Tytuł:<sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?= (!empty($context['title_err'])) ? 'is-invalid' : ''; ?>" value="<?= $context['title']; ?>" placeholder="Tytuł...">
            <span class="invalid-feedback"><?= $context['title_err']; ?></span>
        </div>
        <div class="form-group">
            <label>Treść:<sup>*</sup></label>
            <textarea name="body" class="form-control form-control-lg <?= (!empty($context['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Treść..."><?= $context['body']; ?></textarea>
            <span class="invalid-feedback"><?= $context['body_err']; ?></span>
        </div>
        <div class="form-group">
            <label>Status:<sup>*</sup></label>
            <select class="form-control form-control-lg" name="status">
                <option value="0" <?=$context['status']==0 ? 'selected' : ''?>>Publiczny</option>
                <option value="1" <?=$context['status']==1 ? 'selected' : ''?>>Szkic</option>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="Dodaj">
    </form>
</div>
<?php require 'view/layout/footer.php'; ?>