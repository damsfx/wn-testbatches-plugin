// Refresh list widget every second
setInterval(function () {
    $.request('onRefresh', {
        success: function () {
        },
    })
}, 1500);
