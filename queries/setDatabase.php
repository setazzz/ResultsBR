<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2017.08.29
 * Time: 11:26
 */

include ('../inc/connection.php');
$test = ($connection->query("SHOW TABLES LIKE 'comps'")->fetch_assoc()["Tables_in_resultsbr_database (comps)"]);


if ($test !== 'comps') {
    $connection->query("CREATE TABLE comps(
                            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR (50),
                            date VARCHAR (50),
                            start_time VARCHAR (50) ,
                            end_time VARCHAR (50) ,
                            number_of_routes VARCHAR (50) ,
                            spec_chal VARCHAR (50),
                            spec_chal_points VARCHAR (50)
                      )");
    echo 'Comps table created';
} else {
    echo "Comps table already exists";
}
