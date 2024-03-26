(function ($) {
    "use strict";
    var QT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');

    QT.switchery = () => {
        $('.js-switch').each(function () {
            var switchery = new Switchery(this, { color: '#1AB394' });
            console.log(123123);

        })
    }
    QT.changeStatus = () => {

        $(document).on('change', '.status', function (e) {
            let _this = $(this)
            let option = {
                'value': _this.val(),
                'modelId': _this.attr('data-modelId'),
                'model': _this.attr('data-model'),
                'field': _this.attr('data-field'),
                '_token': _token
            }

            $.ajax({
                url: 'ajax/user/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('Error ' + textStatus + ' ' + errorThrown);
                }
            })

            e.preventDefault()
        })
    }
    $(document).ready(function () {
        QT.switchery();
        QT.changeStatus();
    });


})(jQuery);