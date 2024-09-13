<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('hounddd/testbatches/batches') ?>"><?= e(trans('hounddd.testbatches::lang.models.batch.label_plural')); ?></a></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <div class="batch-infos">
        <h3><?= e($this->pageTitle) ?></h3>

        <div class="scoreboard">
            <div data-control="toolbar">

                <div class="scoreboard-item title-value">
                    <h4><?= $batch->id ?></h4>
                    <p class="wn-icon-star"><?= $batch->name ?></p>
                </div>

                <div class="scoreboard-item title-value" data-control="goal-meter" data-value="<?= $batch->progress ?>">
                    <h4>Progression</h4>
                    <p><?= $batch->progress ?>%</p>
                    <p class="description"><?= $batch->statusName ?></p>
                </div>

                <div class="scoreboard-item control-chart" data-control="chart-pie">
                    <ul>
                        <li data-color="#95b753"><?= e(trans('hounddd.testbatches::lang.models.batch.total_jobs')) ?> <span><?= $batch->total_jobs ?></span></li>
                        <li data-color="#e5a91a"><?= e(trans('hounddd.testbatches::lang.models.batch.pending_jobs')) ?> <span><?= $batch->pending_jobs ?></span></li>
                        <li data-color="#cc3300"><?= e(trans('hounddd.testbatches::lang.models.batch.failed_jobs')) ?> <span><?= $batch->failed_jobs ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
    <p><a href="<?= Backend::url('hounddd/testbatches/batches') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')); ?></a></p>

<?php endif ?>
