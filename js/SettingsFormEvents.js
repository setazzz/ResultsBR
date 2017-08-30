/**
 * Created by Matas on 2017.08.22.
 */

// submit button click event
// creates a json string and saves it
$('#submitBtn').click(function(e) {
    e.preventDefault();

    // declare vars
    var compName = $('#compName').val();
    var output = {name: compName};
    var compDate = $('#compDate').val();
    var startTime = $('#startTime').val();
    var endTime = $('#endTime').val();
    var numberOfRoutes = $('#numberOfRoutes').val();
    var specChal = $('#specChal:checked').length;
    var specChalPoints = $('#specChalPoints').val();
    var valid = false;

    if (compName && compDate && startTime && endTime && numberOfRoutes) {
        valid = true;
    }

    // check if Name is entered
    if(!valid) {
        alert('Please fill all fields.');
    } else {
        output.date = compDate;
        output.startTime = startTime;
        output.endTime = endTime;
        output.numberOfRoutes = numberOfRoutes;
        output.specChal = specChal;
        output.specChalPoints = specChalPoints;

        // Post results to saveResults.php
        $.ajax({
            type: 'POST',
            url: 'saveSettings.php',
            data: {'output': output},
            success: function(msg) {
                alert('New competition ' + compName + ' succesfully created.');
            },
            failure: function (errMsg) {
                alert(errMsg);
            }
        });
    }
}); //end submit click
