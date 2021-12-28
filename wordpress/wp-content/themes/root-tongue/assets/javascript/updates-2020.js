jQuery(window).on("load", function () {
    var $ = jQuery;
    var rtLocalStorage = window.localStorage;
    // if user wants to see intro again
    var urlParams = new URLSearchParams(window.location.search);
    var resetIntro = urlParams.has('resetIntro') && urlParams.get('resetIntro');
    if (resetIntro) {
        // start fresh
        rtLocalStorage.removeItem('hasVisited');
    }

    // check if user has been here before
    var isReturnVisitor = rtLocalStorage.getItem('hasVisited');

    if (isReturnVisitor && $("body.page-home").length) {
        setTimeout(function () {
            if ($("body.show-intro").length) {
                window.location.href = "https://root-tongue.com/community-gallery/";
            }
        }, 5000);
    } else if (!isReturnVisitor && $("body.page-home").length) {
        // set hasVisited on the first visit to the home page
        rtLocalStorage.setItem('hasVisited', true);
    }

});



