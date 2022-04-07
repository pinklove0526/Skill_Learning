<?php
include '../db.php';
include '../classes/Comment.php';
if (isset($_POST['comment']))
{
    $comment_id = $_POST['comment_id'];
    $body = $_POST['comment'];
    $comment = new Comment($comment_id, $conn);
    $comment->createComment($body);
    echo json_encode($comment->comment);
}
if (isset($_POST['delete-comment']))
{
    $comment_id = $_POST['comment_id'];
    $post_id = $_SESSION["query_history"];
    $comment = new Comment($post_id[3], $conn);
    $comment->deleteComment($comment_id);
}
?>