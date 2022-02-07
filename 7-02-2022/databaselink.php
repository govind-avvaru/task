<?php
$name=$_POST['uname'];
$email=$_POST['uemail'];

//echo $name;
$connection = new  mysqli("localhost", "i95dev", "i95dev" , "govind");



# if condition will displays if the connection not gets established
if ($connection->connect_error) {
    echo("Database connection failed: ");
}
# else block will displays if the connection gets established
else {
    echo "connection  established";
    echo "<br>";
    $query = ' CREATE TABLE people2(
    uname varchar(255),
    uemail varchar(255)
   
)';
    if ($connection->query($query)) {
        echo "table created";
    } else {
        echo " table not created";
    }
    echo "<br>";

    $insertinto = 'insert into people2(uname , uemail) values("'.$name.'","'.$email.'")';
    if ($connection->query($insertinto)){
        echo "the valuee inserted into the table";
    }
    else {
        echo "data not inserted";
    }



}




?>
