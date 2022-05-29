<?php
require_once('../bootstrap.php');

if (!empty($_POST)) {
    try {
        //new comment
        $c = new Comment();

        $c->setText($_POST['comment']);
        $c->setPostId($_POST['postId']);
        // $c->setUserId(user::getUserFromEmail($_SESSION['user'])['id']);

        //save comment
        $c->saveComment();

        //success
        $result = [
            "status" => "success",
            "body" => htmlspecialchars($c->getText()),
            "message" => "Comment was saved.",
        ];
    } catch (Throwable $t) {
        //error
        $result = [
            "status" => "error",
            "message" => "Something went wrong."
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($result); // json object wordt aangemaakt met result in
}
