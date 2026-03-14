<?php
require_once __DIR__ . '/config.php';

$sql = 'SELECT id, nom, email, telephone FROM contacts ORDER BY nom';
$result = mysqli_query($conn, $sql);
$contacts = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contacts[] = $row;
    }
}
?>
