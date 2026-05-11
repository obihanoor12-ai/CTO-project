<?php
 error_reporting(0);

 $servername="localhost";
 $username="root";
 $password="";
 $dbname="obihacto";
 $port="3308";

 $conn = mysqli_connect($servername,$username,$password,$dbname,$port);

 if($conn)
 {
    echo "Thankyou for reaching out to CTO,";
 }
 else{
    echo "connection failed". mysqli_connect_error();
}


?>