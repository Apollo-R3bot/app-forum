<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $view = $conn->query("SELECT * FROM categories ORDER BY title ASC");
    $categories = $view->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if (isset($_POST['savePost'])) {
    //     $save = $conn->prepare("INSERT INTO posts(id,) 
    //     VALUES('','1','".$_POST['title']."','".$_POST['content']."','now()'");
    //     if ($save) {
    //         header('location: ../index.php');
    //     }
    // }
}