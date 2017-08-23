/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = json.numberOfRoutes; //todo get this number from settings
var buttons = '';
var flash = true;
var top = true;
var score = 0;

$('.routes').html(makeButtons(numberOfRoutes, flash, top));

$('.score').html(scoreDisplay(score));
$('.title').html(json.name);
