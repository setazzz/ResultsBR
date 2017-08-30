/**
 * Created by Matas on 2017.08.23.
 */

var div = document.getElementById("settings");
var myData = div.textContent;

if (!(myData.indexOf('id') > -1)) {
    $('.title')[0].textContent = 'There is no competition at the time.';
    $('.date')[0].textContent = 'Come back later';
    $('.input-content')[0].style.display = 'none';
} else {
    var json = JSON.parse(myData);
}

