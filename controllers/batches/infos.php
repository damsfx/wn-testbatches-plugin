<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('hounddd/testbatches/batches') ?>">Batches</a></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <div class="batch-infos">
        <h3><?= $batch->id ?></h3>
    </div>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
    <p><a href="<?= Backend::url('hounddd/testbatches/batches') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')); ?></a></p>

<?php endif ?>
