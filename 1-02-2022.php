<?php

echo "hello world";

echo "<br>";

$connection = new mysqli("localhost","i95dev","","student");

if($connection->connect_error=="true"){
   echo "connection error";
}

else {
    echo "connection established";


    echo "<br>";

//    $query = 'create table stwo ( id int autoincrement,
//    name varchar(255),
//    color varchar(255),
//    gender varchar(255))';

    $query = 'CREATE TABLE Persons (
        PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
)';

    if ($connection -> query($query) ) {
        echo "table created";
    } else
        echo "table not created";

}
?>
