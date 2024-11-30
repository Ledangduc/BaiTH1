<?php
define('DATA_FILE', 'flowers.json');
function getFlowers() {
    $data = file_get_contents(DATA_FILE);
    return json_decode($data, true);
}
function saveFlowers($flowers) {
    file_put_contents(DATA_FILE, json_encode($flowers, JSON_PRETTY_PRINT));
}
?>
