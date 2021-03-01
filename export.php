<?php

require "netting/connect.php";
$output = [];

$products = $db->prepare("SELECT * FROM products");
$products->execute();
$data = $products->fetchAll(PDO::FETCH_OBJ);

foreach ($data as $product) {
    
    $categories = $db->prepare("SELECT category_uniqid, category_name FROM categories WHERE category_id =".$product->category_id);
    $categories->execute();
    $categoriesData = $categories->fetchAll(PDO::FETCH_OBJ);

    $output[] = [
        "uniqid" => $product->product_uniqid,
        "name" => $product->product_name,
        "price" => $product->product_price,
        "content" => $product->product_content,
        "category" => $categoriesData
    ];
}
header("Content-disposition:attachment; filename=products.json");
header("Content-type:application/json");
echo json_encode($output, JSON_PRETTY_PRINT);

?>
