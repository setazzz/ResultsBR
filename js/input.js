/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = 50;
var routesId = [];
var buttons = '';
var flash = true;
var top = true;
var bonus = false;
var scoreFlash = 0;
var scoreTop = 0;
var scoreDisplay = '<p class="score">Flash: ' + scoreFlash + ' Top: ' + scoreTop + '</p>';

for (var i = 1; i <= numberOfRoutes; i++) {
    routesId.push('no' + i);
}

console.log(routesId);

buttons += '<ol class="buttons">';

for(var i = 0; i < routesId.length; i++) {
    buttons += '<li class="' + routesId[i] + '">';
    if (flash) {
        buttons += '<button class="flash">Flash</button>';
    }
    if (top) {
        buttons += '<button class="top">Top</button>';
    }
    if (bonus) {
        buttons += '<button class="bonus">Bonus</button>';
    }
}

buttons += '</li></ol>';

$('.routes').html(buttons);
$('.score').html(scoreDisplay);



for (var i = 1; i < numberOfRoutes; i++) {
    var button = 'no' + i;

}

$('ol').click(function (e) {
    console.log(e.target.tagName);
    if (e.target.tagName === 'BUTTON') {
        const button = e.target;
        const li = button.parentNode;
        const ul = li.parentNode;
        const action = button.textContent;
        console.log(action);
        const nameActions = {
            Flash: function () {
                if (!button.classList.contains('y')) {
                    if (button.nextElementSibling.classList.contains('y')) {
                        button.nextElementSibling.classList.remove('y')
                        scoreTop--;
                    }
                    // button.textContent = 'yra';
                    button.classList.add('y');
                    console.log();
                    scoreTop++;
                    scoreFlash++;
                } else {
                    button.classList.remove('y');
                    scoreTop--;
                    scoreFlash--;
                }
            },
            Top: function () {
                if (!button.classList.contains('y')) {
                    if (button.previousElementSibling.classList.contains('y')) {
                        button.previousElementSibling.classList.remove('y')
                        scoreFlash--;
                        scoreTop--;
                    }
                    button.classList.add('y');
                    console.log();
                    scoreTop++;
                } else {
                    button.classList.remove('y');
                    scoreTop--;
                }
            },
            Bonus: function () {
            }
        }

        nameActions[action]();
        scoreDisplay = '<p class="score">Flash: ' + scoreFlash + ' Top: ' + scoreTop + '</p>';
        $('.score').html(scoreDisplay);

    }
});
