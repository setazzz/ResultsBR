# ResultsBR

This is an application for collecting, storing and displaying the results of bouldering
competition. In this app all routes have a certain amount of points for the top and a bit
more for the flash. All points are summed and the final table sorted by number of points. 

# Set up
So far you have to set up a new database manually. Then you should enter your database name,
username and password in inc/connection.php file. Then run the file queries/setDatabase.php.
This creates a table to store each competition data.

# Usage
To create a new competition, go to settings.php and enter all the data. When you submit it
creates a new line in comps table with data for this comp. It also creates a new table to
store this comp's results.

In index.php every climber can enter their result and then view it in the output table in
results.php.