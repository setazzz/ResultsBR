/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = 35; //todo get this number from settings
var routesId = [];
var buttons = '';
var flash = true;
var top = true;
var score = 0;
var lvl1 = 10;
var lvl2 = 20;
var lvl3 = 30;
var lvl4 = 40;
var lvl5 = 50;
var difficulty = {
    lvl1: 10,
    lvl2: 20,
    lvl3: 30,
    lvl4: 40,
    lvl5: 50
};


$('.routes').html(makeButtons(numberOfRoutes, flash, top));

$('.score').html(scoreDisplay(score));
