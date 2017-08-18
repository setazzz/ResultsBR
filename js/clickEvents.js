/**
 * Created by Matas on 2017.08.08.
 */

// result button click event
// marks the selected result with a className 'Y'
// TODO !!! Bonus does not work. next/previous should be changed
$('ol').click(function (e) {
    if (e.target.tagName === 'BUTTON') {
        const button = e.target;
        const li = button.parentNode;
        const ul = li.parentNode;
        const action = button.textContent;
        const nameActions = {
            Flash: function () {
                if (!button.classList.contains('y')) {
                    if (button.nextElementSibling.classList.contains('y')) {
                        button.nextElementSibling.classList.remove('y');
                        scoreTop--;
                    }
                    button.classList.add('y');
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
                        button.previousElementSibling.classList.remove('y');
                        scoreFlash--;
                        scoreTop--;
                    }
                    button.classList.add('y');
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
        $('.score').html(scoreDisplay(scoreFlash, scoreTop));
    }
}); //end button click

// submit button click event
// creates a json string and saves it
$('.submit').click(function() {
    // declare vars
    var output = {result: [], total: [0,0,0]};
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
    if (!climberName.replace(/\s/g, '') === '') {
        alert('Please enter Your name.');
    } else if(checked) {
        alert('Please select your gender.');
    } else {
        output.sex = climberSex;
        output.pro = climberPro;
        output.name = climberName;

        for (var i = 1; i <= numberOfRoutes; i++) {
            var listButtons = $('.no' + i)[0].firstElementChild.children;
            if (listButtons[0].classList.contains('y')) {
                output.result.push('F');
                output.total[0]++;
                output.total[1]++;
                output.total[2]++;
            } else if (listButtons[1].classList.contains('y')) {
                output.result.push('T');
                output.total[1]++;
                output.total[2]++;
            } else if (listButtons[2]) {
                if (listButtons[2].classList.contains('y')) {
                    output.result.push('B');
                    output.total[2]++;
                }
            } else {
                output.result.push('');
            }
        }

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
                successMsg += '</br>Your result is: ' + output.total[0] + 'F/ ' + output.total[1] + 'T';
                if (bonus) {
                    successMsg += output.total[2];
                    successMsg += '/B';
                }
                successMsg += '.';
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
        } else if (listButtons[2]) {
            if (listButtons[2].classList.contains('y')) {
                listButtons[2].classList.remove('y');
            }
        }
    }
    $('.score').html(scoreDisplay(scoreFlash = 0, scoreTop = 0));
}); //end clear click