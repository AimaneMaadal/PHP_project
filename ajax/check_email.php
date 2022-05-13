<?php 
    require_once("../bootstrap.php");

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];

        try {
            $conn =Db::getInstance();
            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $statement->bindValue(':email', $email);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = [
                    'status' => 'Success',
                    'message' => 'Email is already in use'
                ];
            } else {
                $result = [
                    'status' => 'Success',
                    'message' => 'Email is available'
                ];
            }
        } catch (throwable $e) {
            $result = [
                'status' => 'Error',
                'message' => $e->getMessage()
            ];
        }

        echo json_encode($result);
    }