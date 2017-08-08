/**
 * Created by Matas on 2017.08.08.
 */



function scoreDisplay (flash, top) {
    return 'Flash: ' + flash + ' Top: ' + top;
}

function makeButtons(ammount, fl, to, bo) {
    buttons += '<ol class="buttons">';

    for(var i = 0; i < ammount; i++) {
        var j = i + 1;
        buttons += '<li class="' + 'no' + j + '">';
        if (fl) {
            buttons += '<button class="flash">Flash</button>';
        }
        if (to) {
            buttons += '<button class="top">Top</button>';
        }
        if (bo) {
            buttons += '<button class="bonus">Bonus</button>';
        }
    }

    buttons += '</li></ol>';

    return buttons;
}