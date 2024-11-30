<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    include 'products.php';
    $products[] = ['name' => $name, 'price' => $price];
    $content = "<?php\n\$products = " . var_export($products, true) . ";\n?>";
    file_put_contents('products.php', $content); 
    header("Location: index.php");
    exit();
}