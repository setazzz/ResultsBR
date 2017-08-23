/**
 * Created by Matas on 2017.08.08.
 */

// result button click event
// marks the selected result with a className 'y'
$('ol').click(function (e) {
    if (e.target.tagName === 'BUTTON') {
        const button = e.target;
        const li = button.parentNode.parentNode;
        // const ul = li.parentNode;
        const action = button.textContent;
        const points = getDifficulty(button) * 10;
        const selected = button.classList.contains('y');
        const nameActions = {
            Flash: function () {
                if (!selected) {
                    if (button.nextElementSibling.classList.contains('y')) {
                        button.nextElementSibling.classList.remove('y');
                        score -= points;
                    }
                    button.classList.add('y');
                    score += points * 1.2;
                } else {
                    button.classList.remove('y');
                    score -= points * 1.2;
                }
            },
            Top: function () {
                if (!selected) {
                    if (button.previousElementSibling.classList.contains('y')) {
                        button.previousElementSibling.classList.remove('y');
                        score -= points * 1.2;
                    }
                    button.classList.add('y');
                    score += points;
                } else {
                    button.classList.remove('y');
                    score -= points;
                }
            },
            "Special Challenge": function () {
                if (!selected) {
                    button.classList.add('y');
                    score += points;

                } else {
                    button.classList.remove('y');
                    score -= points;
                }
            }
        }

        nameActions[action]();
        $('.score').html(scoreDisplay(score));
    }
}); //end button click

// submit button click event
// creates a json string and saves it
$('.submit').click(function() {
    // declare vars
    var output = {result: [], total: 0, specChal: 0};
    var climberName = $("#userName").val();
    var climberPro = $("#userGroup:checked").length;
    var radios = $('[name=userSex]');
    var checked = false;
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            var climberSex = radios[i].value;
            checked = true;
            break;
        }
    }

    // check if Name is entered
    if (climberName.replace(/\s/g, '') === '') {
        alert('Please enter Your name.');
    } else if(!checked) {
        alert('Please select your gender.');
    } else {
        output.sex = climberSex;
        output.pro = climberPro;
        output.name = climberName;
        output.total = score;
        var li = $('#no01');
        console.log(li.children[1]);
        for (var i = 1; i <= numberOfRoutes; i++) {
            var listButtons = document.getElementById('no' + ('0' + i).slice(-2)).firstElementChild.children;
            if (listButtons[0].classList.contains('y')) {
                output.result.push('F');
            } else if (listButtons[1].classList.contains('y')) {
                output.result.push('T');
            } else {
                output.result.push('');
            }
        }

        console.log(output);

        // Post results to saveResults.php
        $.ajax({
            type: 'POST',
            url: 'saveResults.php',
            data: {'output': output},
            success: function(msg) {
                $('.input-content')[0].classList.add('hide');
                $('form')[0].classList.add('hide');
                var successMsg = 'Your name is: ' + output.name + '</br>';
                successMsg += 'Sex: ' + output.sex + '</br>';
                successMsg += 'You are ';
                if (output.pro) {
                    successMsg += 'a pro. ';
                } else {
                    successMsg += 'an amateur. ';
                }
                successMsg += '</br>Your result is: ' + output.total;
                $('.output').html(successMsg);
                // alert('Your result was successfully saved. To see full results press the link at the bottom of a page.');
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });

    }

}); //end submit click

// clear button click event
// clears everything
$('.clear').click(function() {
    for (var i = 1; i <= numberOfRoutes; i++) {
        var listButtons = document.getElementsByClassName('no' + i)[0].firstElementChild.children;
        if (listButtons[0].classList.contains('y')) {
            listButtons[0].classList.remove('y');
        } else if (listButtons[1].classList.contains('y')) {
            listButtons[1].classList.remove('y');
        }
    }
    $('.score').html(scoreDisplay(score = 0));
}); //end clear click

// Hide button click event
// Hides column-route culumns
$('.hideBtn').click(function (e) {
    var button = e.target;
    if (!button.classList.contains('hidden')) {
        for (var i = 0; i < $('.column-route').length; i++) {
            $('.column-route')[i].classList.add('hide');
        }
        for (var i = 0; i < $('.column-chal').length; i++) {
            $('.column-chal')[i].classList.add('hide');
        }
        button.classList.add('hidden')
    } else {
        for (var i = 0; i < $('.column-route').length; i++) {
            $('.column-route')[i].classList.remove('hide');
        }
        for (var i = 0; i < $('.column-chal').length; i++) {
            $('.column-chal')[i].classList.remove('hide');
        }
        button.classList.remove('hidden')
    }
});