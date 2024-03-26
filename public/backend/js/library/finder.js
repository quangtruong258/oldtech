(function ($) {
    "use strict";
    var QT = {};
    var document = $(document)

   QT.BrowseServerInput = () => {
    console.log(123);
   }



   QT.changeStatus = () => {

    $(document).on('change', '.status', function (e) {
        console.log(123123);
        
        e.preventDefault()
    })

}
    document.ready(function () {
        QT.BrowseServerInput();
        QT.changeStatus();
    });

})(jQuery);