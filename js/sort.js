/**
 * Created by Matas on 2017.08.08.
 */
sortTable('male');
sortTable('female');
var placeCell = $('td.column-place');
var place = 0;
var femaleTable = document.getElementById('female');
var maleSorted = false;

for (var i = 0; i < placeCell.length; i++) {
    if (placeCell[i].parentNode.parentNode.parentNode === femaleTable && !maleSorted) {
        place =0;
        maleSorted = true;
    }
    if (placeCell[i].innerHTML !== '-') {
        place++;
        placeCell[i].textContent = place;
    }
}





function sortTable(sex) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById(sex);
    switching = true;
    /*Make a loop that will continue until
     no switching has been done:*/
    rows = table.getElementsByClassName("row");
    // console.log(rows);
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByClassName("row");
        // console.log(rows);
        /*Loop through all table rows (except the
         first, which contains table headers):*/
        for (i = 0; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
             one from current row and one from the next:*/
            x = rows[i].getElementsByClassName("column-score")[0];
            y = rows[i + 1].getElementsByClassName("column-score")[0];
            //check if the two rows should switch place:
            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
             and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}