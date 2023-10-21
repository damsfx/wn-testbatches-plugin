<div data-control="toolbar">
    <?php /*
    <a
        href="<?= Backend::url('hounddd/testbatches/batches/create') ?>"
        class="btn btn-primary wn-icon-plus">
        <?= e(trans('backend::lang.form.create_title', ['name' => trans('hounddd.testbatches::lang.models.batch.label')])); ?>
    </a>

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
    */ ?>

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

</div>
