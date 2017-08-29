/**
 * Created by Matas on 2017.08.08.
 */

function scoreDisplay (flash) {
    return 'Your score: ' + flash;
}

function makeButtons(ammount) {
    var buttons = '<ol class="buttons">';

    for(var i = 0; i < ammount; i++) {
        var j = i + 1;
        buttons += '<li id="no' + ('0' + j).slice(-2);
        buttons += '" class="';
        buttons += 'lvl' + Math.ceil(j / 8);
        buttons += '"><div class="input-btn">';
        buttons += '<button class="flash">Flash</button>';
        buttons += '<button class="top">Top</button>';
        buttons += '</div></li>';
    }
    if (json.spec_chal == 1) {
        buttons += '<button class="specChal">Special Challenge</button>';
    }
    buttons += '</ol>';

    return buttons;
}

function getDifficulty(button) {
    var value;
    if (button.classList.contains('specChal')) {
        value = json.spec_chal_points / 10;
    } else {
        value = button.parentNode.parentNode.className.charAt(3);
    }
    return value;
}

function moveScroller() {
    var $anchor = $("#scroller-anchor");
    var $scroller = $('#scroller');

    var move = function() {
        var st = $(window).scrollTop();
        var ot = $anchor.offset().top;
        if(st > ot) {
            $scroller.css({
                position: "fixed",
                top: "0px"
            });
        } else {
            $scroller.css({
                position: "relative",
                top: ""
            });
        }
    };
    $(window).scroll(move);
    move();
}
