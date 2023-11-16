<div data-control="toolbar">
    <a role="button"
        class="btn btn-warning"
        data-control="popup"
        data-handler="onAskCreateFake"
        <?php /*
        data-request-data="items:5"
        data-load-indicator="<?= e(trans('hounddd.webapp4you.sync.messages.request')) ?>"
        */ ?>
        href="javascript:;"
        data-stripe-load-indicator>
        <i class="icon-plus"></i>
        <?= e(trans('hounddd.testbatches::lang.controllers.batches.create_batches')); ?>
    </a>

    <button
        class="btn btn-info"
        data-request="onRefresh"
        data-stripe-load-indicator>
        Refresh
    </button>

    <div class="btn-group">
        <div class="checkbox custom-checkbox">
            <input name="autorefresh-batches-list" value="1" type="checkbox" id="autorefresh-batches-list" checked />
            <label for="autorefresh-batches-list">Auto refresh list</label>
        </div>
    </div>
</div>
