/**
 * Created by Matas on 2017.08.08.
 */

function scoreDisplay (flash) {
    return 'Your score: ' + flash;
}

function makeButtons(ammount, fl, tp) {
    var specChal = false;
    if (json.specChal === 1) {
        specChal = true;
    }
    var buttons = '<ol class="buttons">';

    for(var i = 0; i < ammount; i++) {
        var j = i + 1;
        buttons += '<li id="no' + ('0' + j).slice(-2);
        buttons += '" class="';
        buttons += 'lvl' + Math.ceil(j / 8);
        buttons += '"><div class="input-btn">';
        if (fl) {
            buttons += '<button class="flash">Flash</button>';
        }
        if (tp) {
            buttons += '<button class="top">Top</button>';
        }
        buttons += '</div></li>';
    }
    buttons += '<button class="specChal">Special Challenge</button>';
    buttons += '</ol>';

    return buttons;
}

function getDifficulty(button) {
    var value;
    if (button.classList.contains('specChal')) {
        value = json.specChalPoints / 10;
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

function sortTable() {
    var table, rows, switching, i, topX, topY, flashX, flashY, shouldSwitch;
    table = document.getElementById("male");
    switching = true;
    /*Make a loop that will continue until
     no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByTagName("TR");
        /*Loop through all table rows (except the
         first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
             one from current row and one from the next:*/
            topX = rows[i].getElementsByTagName("TD")[7];
            topY = rows[i + 1].getElementsByTagName("TD")[7];
            flashX = rows[i].getElementsByTagName("TD")[6];
            flashY = rows[i + 1].getElementsByTagName("TD")[6];
            //check if the two rows should switch place:
            if (flashX.innerHTML <= flashY.innerHTML) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
            } else if (topX.innerHTML <= topY.innerHTML) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
            }


            // //check if the two rows should switch place:
            // if (flashX.innerHTML.toLowerCase() < flashY.innerHTML.toLowerCase()) {
            //     //if so, mark as a switch and break the loop:
            //     shouldSwitch= true;
            //     break;
            // }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
             and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
        console.log('sorted');
    }
}

// function sortTable() {
//
//     // function sortByColumn3(row1, row2) {
//     //     var v1, v2;
//     //     v1 = $(row1).find("td:eq(2)").text();
//     //     v2 = $(row2).find("td:eq(2)").text();
//     //     // for numbers you can simply return a-b instead of checking greater/smaller/equal
//     //     return v1 - v2;
//     // }
//
//     // function sortByColumn3And5(row1, row2) {
//
//
//         // var v1, v2, r;
//         // v1 = $(row1).find("td:eq(2)").text();
//         // v2 = $(row2).find("td:eq(2)").text();
//         // r = v1 - v2;
//         // if (r === 0) {
//         //     // we have a tie in column 1 values, compare column 2 instead
//         //     v1 = $(row1).find("td:eq(4)").text();
//         //     v2 = $(row2).find("td:eq(4)").text();
//         //     if (v1 < v2) {
//         //         r = -1;
//         //     } else if (v1 > v2) {
//         //         r = 1;
//         //     } else {
//         //         r = 0;
//         //     }
//         // }
//         // return r;
//
//
//     // }
//
//     // $("#button1, #button2").on("click", function() {
//     //     var rows = $("#table1 tbody tr").detach().get();
//     //     switch (this.id) {
//     //         case "button1":
//     //             rows.sort(sortByColumn3);
//     //             break;
//     //         case "button2":
//     //             rows.sort(sortByColumn3And5);
//     //             break;
//     //     }
//     //     $("#table1 tbody").append(rows);
//     // });
// }