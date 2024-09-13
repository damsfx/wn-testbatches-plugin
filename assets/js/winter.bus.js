/*
 * Scripts for batches behavior.
 */
+function ($) {
    "use strict";

    var BatchesBehavior = function () {

        this.autoRefresh = true;

        this.refreshList = function () {

            if (this.autoRefresh) {
                $.request('onRefresh', {
                    context: this,
                    success: function (data, textStatus, jqXHR) {
                        for (var partial in data) {
                            $(partial).html(data[partial]).trigger('ajaxUpdate', [this.context, data, textStatus, jqXHR])
                        }
                    },
                    complete: function () {
                        if (this.autoRefresh) {
                            var that = this;
                            setTimeout(function(){ that.refreshList() }, 1000);
                        }
                    },
                    // loading: $.wn.stripeLoadIndicator,
                })
            }
        }

        this.toggleRefresh = function () {
            this.autoRefresh = !this.autoRefresh;
            this.refreshList();
        }
    }

    $.wn.BatchesBehavior = new BatchesBehavior;

    $(document).ready(function () {
        var $autoRefreshCheckbox = $('.toolbar-widget input[type=checkbox][id=autorefresh-batches-list]');

        $autoRefreshCheckbox.on('click', function(){
            $.wn.BatchesBehavior.toggleRefresh();
        })

        if (!$autoRefreshCheckbox.is(':checked')) {
            $.wn.BatchesBehavior.autoRefresh = false;
        }

        $.wn.BatchesBehavior.refreshList();
    })

}(window.jQuery);
