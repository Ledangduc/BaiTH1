<?php
include 'functions.php';
$flowers = getFlowers();
$id = $_GET['id'];
$flowerIndex = array_search($id, array_column($flowers, 'id'));
$flower = $flowers[$flowerIndex];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowers[$flowerIndex]['name'] = $_POST['name'];
    $flowers[$flowerIndex]['description'] = $_POST['description'];
    $flowers[$flowerIndex]['image'] = $_POST['image'];
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
    <title>Sửa thông tin hoa</title>
</head>
<body>
    <h1>Sửa thông tin hoa</h1>
    <form method="post">
        <label for="name">Tên hoa:</label><br>
        <input type="text" name="name" id="name" value="<?php echo $flower['name']; ?>" required><br><br>
        <label for="description">Mô tả:</label><br>
        <textarea name="description" id="description" required><?php echo $flower['description']; ?></textarea><br><br>
        <label for="image">Đường dẫn hình ảnh:</label><br>
        <input type="text" name="image" id="image" value="<?php echo $flower['image']; ?>" required><br><br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
