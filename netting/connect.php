<?php

$host="localhost";
$db_name="odev_db";
$user_name="root";
$password="";
try{
    $db=new PDO("mysql:host=$host; dbname=$db_name; charset=utf8; port=3306", "$user_name","$password");

}
catch(PDOException $mesaj){
    echo "bağlantı başarısız";


}

?>