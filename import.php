<?php

require "netting/connect.php";

  if(isset($_POST['buttomImport'])){
      copy($_FILES['jsonFile']['tmp_name'],'jsonFiles/'.$_FILES['jsonFile']['name']);
      $data=file_get_contents('jsonFiles/'.$_FILES['jsonFile']['name']);
      $products=json_decode($data);
      foreach ($products as $product){
         $stmt=$db->query("SELECT * FROM id FROM products WHERE product_name='".$product->product_name."'");

         if(! $stmt){
          $db->prepare('INSERT INTO products(product_uniqid,product_name,price,content) values(?,?,?,?)' )->execute([
          $product->product_uniqid,
          $product->product_name,
          $product->price,
          $product->content
          
      
          ]);
          foreach($product->categories as $category){

            $categoryId=$db->prepare("INSERT INTO categories(category_uniqid,category_name,product_id) values(?,?,?)")->execute([
              $category->category_name,
              $category->category_uniqid
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
