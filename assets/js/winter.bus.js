// Refresh list widget every second
// setInterval(function () {
//     $.request('onRefresh', {
//         success: function () {
//         },
//     })
// }, 5000);



/*
 * Scripts for reordering in the Relation controller behavior.
 */
+function ($) {
    "use strict";

    var BatchesBehavior = function () {

        this.autoRefresh = true;

        this.initRefresh = function () {

            $.request('onRefresh', {
                context: this,
                success: function () {
                },
                complete: function () {
                    if (this.autoRefresh) {
                        var that = this;
                        setTimeout(function(){ that.initRefresh() }, 2500);
                    }
                },
                loading: $.wn.stripeLoadIndicator,
            })
        }
    }

    $.wn.BatchesBehavior = new BatchesBehavior;

    $(document).ready(function () {
        $.wn.BatchesBehavior.initRefresh();
    })

}(window.jQuery);
