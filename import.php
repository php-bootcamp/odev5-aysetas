<?php

require "netting/connect.php";

  if(isset($_POST['buttomImport'])){
      copy($_FILES['jsonFile']['tmp_name'],'jsonFiles/'.$_FILES['jsonFile']['name']);
      $data=file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);
      $users=json_decode($data);
      foreach ($users as $user){
         $stmt=$db->query("SELECT * FROM id FROM users WHERE user_name='".$user->user_name."'");

         if(! $stmt){
          $db->prepare('INSERT INTO users(user_name,password) values(?,?)' )->execute([
          $user->user_name,
          md5("root"),
      
          ]);
          foreach($user->categories as $category){

            $categoryId=$db->prepare("INSERT INTO categories(category_name,user_id) values(?,?)")->execute([
              $category->category_name,
              $userId
            ]);
          }
         }

     
      }

  }
?>
<<!DOCTYPE html>

<html>

<head>
    <title>import</title>

    <body>
         <form method="post" enctype="multipart/form-data">
           Json file <input type="file" name="jsonFile">
             <input type="submit" value="Import" name="buttomImport">
         </form>
    </body>
</head>
</html>
