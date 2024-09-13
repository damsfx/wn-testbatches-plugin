<div data-control="toolbar">
    <a role="button"
        class="btn btn-primary"
        href="javascript:;"
        data-control="popup"
        data-handler="onCreateBatchesShowPopup"
        data-stripe-load-indicator>
        <i class="icon-plus"></i>
        <?= e(trans('hounddd.testbatches::lang.controllers.batches.create_batches_title')); ?>
    </a>

    <button
        class="btn btn-warning wn-icon-ban"
        disabled="disabled"
        onclick="$(this).data('request-data', { checked: $('.control-list').listWidget('getChecked') })"
        data-request="onCancel"
        data-request-confirm="<?= e(trans('hounddd.testbatches::lang.controllers.general.cancel_selected_confirm')); ?>"
        data-trigger-action="enable"
        data-trigger=".control-list input[type=checkbox]"
        data-trigger-condition="checked"
        data-request-success="$(this).prop('disabled', 'disabled')"
        data-stripe-load-indicator>
        <?= e(trans('hounddd.testbatches::lang.controllers.general.cancel_selected')); ?>
    </button>

    <button
        class="btn btn-danger wn-icon-trash-o"
        disabled="disabled"
        onclick="$(this).data('request-data', { checked: $('.control-list').listWidget('getChecked') })"
        data-request="onDelete"
        data-request-confirm="<?= e(trans('backend::lang.list.delete_selected_confirm')); ?>"
        data-trigger-action="enable"
        data-trigger=".control-list input[type=checkbox]"
        data-trigger-condition="checked"
        data-request-success="$(this).prop('disabled', 'disabled')"
        data-stripe-load-indicator>
        <?= e(trans('backend::lang.list.delete_selected')); ?>
    </button>


    <button
        class="btn btn-info m-l-lg"
        data-request="onRefresh"
        disabled="disabled"
        data-trigger-action="enable"
        data-trigger=".toolbar-widget input[type=checkbox][id=autorefresh-batches-list]"
        data-trigger-condition="unchecked"
        data-stripe-load-indicator
    >
        <?= e(trans('hounddd.testbatches::lang.controllers.general.refresh')); ?>
    </button>

    <div class="btn-group">
        <div class="checkbox custom-checkbox m-b-0">
            <input name="autorefresh-batches-list" value="0" type="checkbox" id="autorefresh-batches-list" />
            <label for="autorefresh-batches-list">Auto refresh list</label>
        </div>
    </div>

    <button
        class="btn btn-primary m-l-md"
        data-control="popup"
        data-handler="onAskPruneDelayShowPopup"
        data-stripe-load-indicator
        disabled="disabled"
        data-trigger-action="enable"
        data-trigger=".toolbar-widget input[type=checkbox][id=autorefresh-batches-list]"
        data-trigger-condition="unchecked"
        data-stripe-load-indicator
    >
        <?= e(trans('hounddd.testbatches::lang.controllers.general.prune')); ?>
    </button>
</div>
