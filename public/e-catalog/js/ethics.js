$(document).ready(function () {

    var pathname = window.location.hash;
    console.log(pathname);

    $("#pin").click(function () {
        $(this).addClass('pinned');
        localStorage.setItem('last', pathname);
        $(".indi").html("account_circle");
    });

    $(".pinned").click(function () {
        // window.location = localStorage.getitem('last');
        console.log(localStorage.getItem('last'));
        // localStorage.clear();
        alert("boom");
        $(".indi").html("home");
    });

    $('#ww').click(function () {
        $(this).hide();
    });


    //initialization book
    $('#katalog').wowBook({
        height: 600,
        width: 1066.67,
        centeredWhenClosed: true,
        hardcovers: true,
        turnPageDuration: 500,
        numberedPages: [1, 0],
        flipSound: false,
        onShowPage: function (book, page, pageIndex) {},
        zoomStep: 0.2,
        zoomMax: 5,
        isOnPage: true,
        controls: {
            zoomIn: '.btn-zoomin',
            zoomOut: '.btn-zoomout',
            next: '.next',
            back: '.prev',
            first: '.cov',
            last: '.bcov',
            slideShow: '.slideshow',
            flipSound: '.flipsound',
            fullscreen: '.fullscreen'
        },
        scaleToFit: "#book-container",
        onFullscreenError: function () {
            var msg = "Fullscreen failed.";
            if (self != top) msg = "The frame is blocking full screen mode. Click on 'remove frame' button above and try to go full screen again."
            alert(msg);
        }
    }).css({
        'display': 'none',
        'margin': 'auto'
    }).fadeIn(1000);

    // maaf codingannya korat karit
    $(".search").click(function () {
        $(".search-input").focus();
    });
});

$('#so').click(function () {
    $('#ww').hide();
})

// fungsi fullscreen
function fullscreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}


// nampilkan navigasi ketika layar kecil
$('.li-icon-res').hide();

var oke = false;
$('.li-icon-res-menu').click(function () {
    if (oke == false) {
        $('.li-icon-res').show();
        oke = true;
    } else {
        $('.li-icon-res').hide();
        oke = false;
    }
})
