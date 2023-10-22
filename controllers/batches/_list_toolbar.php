<div data-control="toolbar" class="loading-indicator-container">
    <a
        role="button"
        href="javascript:;"
        data-request="onRefresh"
        data-load-indicator="<?= e(trans('backend::lang.list.updating')) ?>"
        class="btn btn-primary wn-icon-refresh">
        <?= e(trans('backend::lang.list.refresh')) ?>
    </a>

    <a
        role="button"
        href="javascript:;"
        data-control="popup"
        data-handler="onAskCreateFake"
        data-stripe-load-indicator
        class="btn btn-warning">
        <i class="icon-plus"></i>
        <?= e(trans('hounddd.testbatches::lang.controllers.batches.create_batches')); ?>
    </a>

</div>
