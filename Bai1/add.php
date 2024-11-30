<?php
include 'functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowers = getFlowers();
    $newId = end($flowers)['id'] + 1;
    $newFlower = [
        "id" => $newId,
        "name" => $_POST['name'],
        "description" => $_POST['description'],
        "image" => $_POST['image']
    ];
    $flowers[] = $newFlower;
    saveFlowers($flowers);
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hoa mới</title>
</head>
<body>
    <h1>Thêm hoa mới</h1>
    <form method="post">
        <label for="name">Tên hoa:</label><br>
        <input type="text" name="name" id="name" required><br><br>
        <label for="description">Mô tả:</label><br>
        <textarea name="description" id="description" required></textarea><br><br>
        <label for="image">Đường dẫn hình ảnh:</label><br>
        <input type="text" name="image" id="image" required><br><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
