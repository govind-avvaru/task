<?php
$connection = new  mysqli("localhost", "i95dev", "i95dev" , "govind");
if ($connection->connect_error) {
    echo("Database connection failed: ");
}
# else block will displays if the connection gets established
else {
    echo "connection  established" ;
    echo "<br>";
    $query = ' CREATE TABLE human2(
    PersonID int ,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
)' ;
    if ( $connection -> query ($query)){
        echo "table created"; }
    else{
        echo " table not created";} echo "<br>";
    #insert into the table


    $insertinto = 'insert into human2(PersonID,LastName,FirstName,Address,city) values(1,"govind","jsnaj","guug","asmklmklk")';
    if ($connection->query($insertinto)){
        echo "the valuee inserted into the table";
    }
    else { echo "values not inserted";} echo "<br>";



    #inserting the values into the table human ;
    $insertintoq = 'insert into human( PersonID ,LastName, FirstName ,Address,City ) values (2,"hello","bye","kadapa","hvjhvhjg")';



    if ($connection->query($insertintoq)){
        echo "the human valuee inserted into the table";
    }
    else { echo "human values not inserted";} echo "<br>";



}

?>
