<?php
require 'connection.php';

// GET REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 
    if (isset($_GET['thread'])) {
        // READ ALL POST
        $thread = $_GET['thread'];
        $view = $conn->prepare("SELECT users.name,posts.* FROM posts LEFT JOIN users ON users.id=posts.userId WHERE title=:thread");
        $view->execute([
            ':thread' => $thread
        ]);
        $posts = $view->fetch();
        $reply = $conn->prepare("SELECT users.name,replies.* FROM replies LEFT JOIN users ON users.id=replies.userId WHERE postId=:id ORDER BY created_at DESC");
        $reply->execute([ ':id' => $posts['id']]);
        $replies = $reply->fetchAll(PDO::FETCH_ASSOC);

        // Time created
        // $time = new DateTime($post['created_at']);
        // $now = new DateTime();
        // $interval = $time->diff($now,true);
        
        // if ($interval->y) echo "Posted " .$interval->y . ' years ago';
        // elseif ($interval->m) echo "Posted " .$interval->m . ' months ago';
        // elseif ($interval->d) echo "Posted " .$interval->d . ' days ago';
        // elseif ($interval->h) echo "Posted " .$interval->h . ' hours ago';
        // elseif ($interval->i) echo "Posted " .$interval->i . ' minutes ago';
        // else echo "Posted now";

    }else {
        // READ ALL POST
        $view = $conn->query("SELECT COUNT(replies.id) AS totalReplies, posts.* FROM posts LEFT JOIN replies ON replies.postId=posts.id GROUP BY posts.id ORDER BY created_at DESC");
        $posts = $view->fetchAll(PDO::FETCH_ASSOC);
    }

    // Delete Post
    if (isset($_GET['id'])){
        $del = $conn->prepare("DELETE FROM posts WHERE id=:id");
        $del->execute([':id' => $_GET['id']]);
        if ($del) {
            header('location: ../index.php');
        }
    }
    if (isset($_GET['reply'])){
        $del = $conn->prepare("DELETE FROM replies WHERE id=:id");
        $del->execute([':id' => $_GET['reply']]);
        if ($del) {
            header('location: ../discuss.php?thread='.$_GET['thread']);
        }
    }
}

// POST REQUEST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Create new Post
    $now = date('Y-m-d H:i:s');
    if (isset($_POST['savePost'])) {
        $save = $conn->prepare("INSERT INTO posts(categoryId,userId,title,content,created_at) 
        VALUES(:category,:user,:title,:body,:created)");
        $save->execute([
            ':category' => $_POST['category'],
            ':user' => '1',
            ':title' => $_POST['title'],
            ':body' => $_POST['body'],
            ':created' => $now
        ]);

        if ($save) {
            header('location: ../index.php');
        }
    }

    // Reply to a post
    if (isset($_POST['saveReply'])) {
        $save = $conn->prepare("INSERT INTO replies(userId,postId,body,created_at)
        VALUES(:user,:post,:body,:created)");
        $save->execute([
            ':user' => '1',
            ':post' => $_POST['post'],
            ':body' => $_POST['content'],
            ':created' => $now
        ]);

        if ($save) {
            $post = $_POST['post_content'];
            header('location: ../discuss.php?thread='.$post);
        }
    }

}