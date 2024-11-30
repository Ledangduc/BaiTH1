<?php
include 'functions.php';
$flowers = getFlowers();
$id = $_GET['id'];
$flowers = array_filter($flowers, function ($flower) use ($id) {
    return $flower['id'] != $id;
});
saveFlowers($flowers);
header('Location: admin.php');
exit;
?>
