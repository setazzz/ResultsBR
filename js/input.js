/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = 5;
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
}); //end button click

//json konstruktorius:

// foreach button {
//     if(text = flash) {
//         flash[i] = 1
//         top[i] = 0
//         bonus[i] = 0
//     } else if (text = top) {
//         flash[i] = 0
//         top[i] = 1
//         bonus[i] = 0
//     } else if (text = bonus) {
//         flash[i] = 0
//         top[i] = 0
//         bonus[i] = 1
//     } else {
//         flash[i] = 0
//         top[i] = 0
//         bonus[i] = 0
//     }
// }


$('.submit').click(function() {
    var output = [];
    var listItems = this.parentNode.parentNode.childNodes[3].childNodes[0];

    for (var i = 0; i < routesId.length; i++) {
        output[i] = {name: routesId[i]};
        // var route = div.childNodes[0].childNodes[i];
        var singleLi = listItems.childNodes[i];
        // console.log(singleLi);

        if (singleLi.childNodes[0].classList.contains('y')) {
            output[i].flash = 1;
            output[i].top = 0;
            output[i].bonus = 0;
        } else if (singleLi.childNodes[1].classList.contains('y')) {
            output[i].flash = 0;
            output[i].top = 1;
            output[i].bonus = 0;
        } else if (singleLi.childNodes[2]) {
            if (singleLi.childNodes[2].classList.contains('y')) {
                output[i].flash = 0;
                output[i].top = 0;
                output[i].bonus = 1;
            }
        } else {
            output[i].flash = 0;
            output[i].top = 0;
            output[i].bonus = 0;
        }

    }
    // var li = route.children;

    // console.log(listItems);

    console.log(output);


    $('.output').html();
}); //end submit click
