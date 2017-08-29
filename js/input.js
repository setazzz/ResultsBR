/**
 * Created by Matas on 2017.08.01.
 */
var numberOfRoutes = json.number_of_routes;

var buttons = '';
var score = 0;

$('.routes').html(makeButtons(numberOfRoutes));

$('.score').html(scoreDisplay(score));
$('.title').html(json.name);
$('.date').html(json.date);
$(document).ready(function(){
    $("#score-top").sticky({topSpacing:0});
});