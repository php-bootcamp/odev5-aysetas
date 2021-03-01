<?php

require "netting/connect.php";
$output=[];

$users=$db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
foreach($users as $user){
    $categories=$db->query("SELECT * FROM categories WHERE user_id=.$user->id")->fetchAll(PDO::FETCH_OBJ);
    $output[]=[
        "user_name"=>$user->user_name,
        "categories"=>$categories
    ];

}
header("Content-disposition:attachment; filename=users.json");
header("Content-type:application/json");
echo json_encode($output, JSON_PRETTY_PRINT);

?>