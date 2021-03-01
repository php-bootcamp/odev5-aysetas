<?php

include "connect.php";


if (isset($_POST['loggin'])) {
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);
    if ($user_name && $password ){

        $login = $db -> prepare("SELECT user_name, password  FROM users WHERE user_name='$user_name' AND password='$password' ");
        $login->execute(array($user_name,$password));
        $row = $login->fetch(PDO::FETCH_BOTH);

        if ($login->rowCount() > 0) {
            $_SESSION['user_name'] = $user_name;
            header('Location:../product/product.php');
        }
        else
        {
            header('Location:../users/login.php?login=no');
        }
    }


}


if(isset($_POST['productSave'])){

    $save=$db->prepare("INSERT INTO products SET
       product_name=:product_name,
       price=:price,
       content=:content"
    );

    $products=$save->execute(array(
        'product_name' =>$_POST['product_name'],
        'price'=>$_POST['price'],
        'content'=>$_POST['content']
    ));


    if($products){
        header("Location:../product/add.php?durum=ok");
    }
    else{
        header("Location:../product/add.php?durum=no");
    }



}

//ürün düzenlenme

if(isset($_POST['ProductEdit']))
{

    $id=$_POST['id'];
    $edit= $db->prepare( "UPDATE products set
    
        product_name='".$_POST['product_name']."',
        price='".$_POST['price']."',
        content='".$_POST['content']."' where id='$id'");

    $edit->execute();

    if($edit->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
    {
        header("Location:../product/edit.php?durum=ok&id=$id");
    }
    else
    {
        header("Location:../product/edit.php?durum=no&id=$id");
    }

}
//ürün silme
if(isset($_GET['productDelete'])) {

    $delete=$db->exec("DELETE FROM  products WHERE id='".$_GET['id']."'");


    if($delete){
        header("Location:../product/product.php?durum=ok");
    }
    else{
        header("Location:../product/product.php?durum=no");
    }

}

//Kategori ekleme kısmı

if(isset($_POST['categorySave'])){

    $save=$db->prepare("INSERT INTO categories SET
       category_name=:category_name "
    );

    $categories=$save->execute(array(
        'category_name' =>$_POST['category_name'],

    ));


    if($categories){
        header("Location:../category/add.php?durum=ok");
    }
    else{
        header("Location:../category/add.php?durum=no");
    }



}

//duzenle

if(isset($_POST['edit']))
{

    $id=$_POST['id'];
    $edit= $db->prepare( "UPDATE categories set
        category_name='".$_POST['category_name']."' where id='$id'");

    $edit->execute();

    if($edit->rowCount() > 0) //Bu kısım PDO için değiştirilmiştir.
    {
        header("Location:../category/edit.php?durum=ok&id=$id");
    }
    else
    {
        header("Location:../category/edit.php?durum=no&id=$id");
    }

}
//categori silme
if(isset($_GET['delete'])) {

    $delete=$db->exec("DELETE FROM categories WHERE id='".$_GET['id']."'");


    if($delete){
        header("Location:../category/category.php?durum=ok");
    }
    else{
        header("Location:../category/category.php?durum=no");
    }

}

?>
