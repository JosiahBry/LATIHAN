<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    
    if ($id) {
        $query = "DELETE FROM siswa WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "incomplete";
    }
}
?> 