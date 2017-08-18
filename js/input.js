/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = 5; //todo get this number from settings
var routesId = [];
var buttons = '';
var flash = true;
var top = true;
var bonus = false;
var scoreFlash = 0;
var scoreTop = 0;

$('.routes').html(makeButtons(numberOfRoutes, flash, top));

$('.score').html(scoreDisplay(scoreFlash, scoreTop));
