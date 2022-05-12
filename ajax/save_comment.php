<?php
require_once('../bootstrap.php');

if (!empty($_POST)) {
    $text = $_POST['comment'];

    try {
        //new comment
        $c = new Comment();
        $c->setText($text);

        //save comment
        $c->saveComment();

        // success
        $result = [
            "status" => "success",
            "message" => "Comment was saved.",
            "data" => [
                "comment" => htmlspecialchars($text)
            ]
        ];
    } catch (Throwable $t) {
        // error
        $result = [
            "status" => "error",
            "message" => "Something went wrong."
        ];
    }

    echo json_encode($result);
}
