/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = 5; //todo get this number from settings
var routesId = [];
var buttons = '';
// var climberName = document.getElementById("userName").value;
// var climberName = '';
var flash = true;
var top = true;
var bonus = false;
var scoreFlash = 0;
var scoreTop = 0;

// if (document.getElementById("userName").value === null) {
//     var climberName = document.getElementById("username").value;
// } else {
//     var climberName = '';
//
// }


$('.routes').html(makeButtons(numberOfRoutes, flash, top, bonus));

$('.score').html(scoreDisplay(scoreFlash, scoreTop));
// console.log(climberName);