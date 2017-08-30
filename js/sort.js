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
