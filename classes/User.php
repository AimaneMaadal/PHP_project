<?php

include_once(__DIR__ . "/Db.php");

class User
{
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $backupEmail;
        private $password;
        private $profilePicture;
        private $bio;
        private $education;
        private $linkedIn;
        private $behance;
        private $dribble;
        private $userId;

        public function getFirstname()
        {
                return $this->firstname;
        }

        public function setFirstname($firstname)
        {
                if (empty($firstname)) {
                        throw new Exception("firstname cant be empty");
                }
                $this->firstname = $firstname;

                return $this;
        }

        public function getLastname()
        {
                return $this->lastname;
        }

        public function setLastname($lastname)
        {
                if (empty($lastname)) {
                        throw new Exception("lastname cant be empty");
                }
                $this->lastname = $lastname;
                return $this;
        }

        public function getEmail()
        {
                return $this->email;
        }

        public function setEmail($email)
        {
                if (!str_ends_with($email, '@student.thomasmore.be')) {
                        if (!str_ends_with($email, '@thomasmore.be')) {
                                throw new Exception("email has to end with @student.thomasmore.be or @thomasmore.be");
                        }
                } else if (empty($email)) {
                        throw new Exception("email cant be empty");
                }
                $this->email = $email;
                return $this;
        }

        public function getBackupEmail()
        {
                return $this->backupEmail;
        }

        public function setBackupEmail($backupEmail)
        {
                $this->backupEmail = $backupEmail;
                return $this->backupEmail;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password)
        {
                if (strlen($password) < 5) {
                        throw new Exception("Passwords must be longer than 5 characters.");
                }
                $this->password = $password;
                return $this;
        }

        public function getProfilePicture()
        {
                return $this->profilePicture;
        }

        public function setProfilePicture($profilePicture)
        {
                $this->profilePicture = $profilePicture;
                return $this->profilePicture;
        }

        public function getBio()
        {
                return $this->bio;
        }

        public function setBio($bio)
        {
                $this->bio = $bio;
                return $this->bio;
        }

        public function getEducation()
        {
                return $this->education;
        }

        public function setEducation($education)
        {
                $this->education = $education;
                return $this->education;
        }

        public function getLinkedIn()
        {
                return $this->linkedIn;
        }

        public function setLinkedIn($linkedIn)
        {
                $this->linkedIn = $linkedIn;
                return $this->linkedIn;
        }

        public function canLogin()
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("select * from users where email = :email;");
                $statement->bindValue(':email', $this->email);
                $statement->execute();
                $user = ($statement->fetch());

                if (!$user) {
                        throw new Exception("User does not exist");
                        return false;
                }
                $hash = $user["password"];
                if (password_verify($this->password, $hash)) {
                        return true;
                } else {
                        throw new Exception("Wrong Password");
                        return false;
                }
        }

        public function register()
        {
                $options = [
                        'cost' => 12
                ];
                $password = password_hash($this->password, PASSWORD_BCRYPT, $options);
                $conn = Db::getInstance();
                $statement = $conn->prepare("insert into users (firstname, lastname, email, password, profilepicture) values (:firstname, :lastname, :email, :password, '');");
                $statement->bindValue(':firstname', $this->firstname);
                $statement->bindValue(':lastname', $this->lastname);
                $statement->bindValue(':email', $this->email);
                $statement->bindValue(':password', $password);
                return $statement->execute();
        }



        public static function updatePassword($token, $password)
        {
                $conn = Db::getInstance();
                $sql = "SELECT * FROM `passwordreset` WHERE `token` = '$token';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
                $expDate = date("Y-m-d H:i:s", $expFormat);

                if (!$result) {
                        throw new Exception("Link is not usable");
                }

                $email = $result["email"];

                if ($result["expiry_date"] < $expDate) {
                        throw new Exception("Your link has been expired");
                }

                if (strlen($password) < 5) {
                        throw new Exception("Passwords must be longer than 5 characters.");
                }
                $options = [
                        'cost' => 12
                ];
                $password = password_hash($password, PASSWORD_BCRYPT, $options);
                $statement2 = $conn->prepare("UPDATE `users` SET `password` = '$password' WHERE `users`.`email` = '$email';");
                $statement2->execute();
                $statement3 = $conn->prepare("DELETE FROM `passwordreset` WHERE `token` = '$token';");
                $statement3->execute();
        }

        public static function getAll()
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("SELECT email FROM users");
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return $result;
        }

        public function passwordResetToken($token, $expDate, $email)
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("INSERT INTO `passwordreset` (`token`, `expiry_date`, `email`) VALUES ('$token', '$expDate', :email);");
                $statement->bindValue(":email", $this->email);
                return $statement->execute();
        }

        public function canRegister($password, $password2)
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("select * from users where email = :email");
                $statement->bindValue(":email", $this->email);
                $statement->execute();
                $user = ($statement->fetch());
                if (!$user) {
                        if ($password == $password2) {
                                return true;
                        } else {
                                throw new Exception("wachtwoorden komen niet overeen");
                                return false;
                        }
                } else {
                        throw new Exception("gebruiker bestaat al");
                        return false;
                }
        }

        public function __toString()
        {
                return $this->firstname . " " . $this->lastname . " " . $this->email . " " . $this->email;
        }


        public static function getUserFromEmail($email)
        {
                $conn = Db::getInstance();
                $sql = "SELECT * FROM `users` WHERE `email` = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
        }

        public static function getUserFromId($id)
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("SELECT * FROM users WHERE id = :id");
                $statement->bindValue(':id', $id);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
        }
 
        public static function countFollowers($id)
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT COUNT(*) FROM followers WHERE id_followed = :id");
            $statement->bindValue(':id', $id);
            $statement->execute();
            $result = $statement->fetch();
            return $result["COUNT(*)"];
        }

        
        
        public function updateUser()
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `backupemail` = :backupemail, `bio` = :bio, `education` = :education, `linkedin` = :linkedin, `behance` = :behance, `dribble` = :dribble  WHERE `users`.`id` = :id;");
                $statement->bindvalue(':firstname', $this->firstname);
                $statement->bindvalue(':lastname', $this->lastname);
                $statement->bindvalue(':backupemail', $this->backupEmail);
                $statement->bindvalue(':bio', $this->bio);
                $statement->bindvalue(':education', $this->education);
                $statement->bindvalue(':linkedin', $this->linkedIn);
                $statement->bindvalue(':behance', $this->behance);
                $statement->bindvalue(':dribble', $this->dribble);
                $statement->bindvalue(':id', $this->userId);
                return $statement->execute();
        }



        public function updateProfilePicture($profilepicture, $email)
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("UPDATE users SET profilepicture = :profilepicture WHERE email = :email");

                $statement->bindValue(":email", $email);
                $statement->bindValue(":profilepicture", $profilepicture);

                $statement->execute();

                header('location: usersettings.php');
        }

        public static function changeCurrentPassword($currentpassword, $newpassword, $newpassword2, $email)
        {


                $conn = Db::getInstance();
                $sql = "SELECT * FROM `users` WHERE `email` = '$email';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetch();

                $hash = $result["password"];
                if (password_verify($currentpassword, $hash)) {
                        if ($newpassword == $newpassword2) {
                                $options = [
                                        'cost' => 12
                                ];
                                $password = password_hash($newpassword, PASSWORD_BCRYPT, $options);
                                $statement2 = $conn->prepare("UPDATE `users` SET `password` = '$password' WHERE `users`.`email` = '$email';");
                                $statement2->execute();
                        } else {
                                throw new Exception("New passwords don't match");
                        }
                } else {
                        throw new Exception("Old password is incorrect");
                }

        }

     public static function deleteUser($sessionId, $currentpassword) { 
                $conn = Db::getInstance();
                $sql = "SELECT * FROM `users` WHERE `email` = '$sessionId';";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetch();
                $hash = $result["password"];
                if (password_verify($currentpassword, $hash)) {
                        $statement = $conn->prepare("DELETE FROM `users` WHERE `email` = :email");
                        $statement->bindValue(":email", $sessionId);
                        $statement->execute();
        }
                 else {
                        throw new Exception("Wrong Password");
                }
                
                 
     }

     public function searchData($value) {
        try {
            $conn = Db::getInstance();
            $statement = $conn->prepare("SELECT email FROM `users` WHERE `email` = :value");
            $statement->bindParam(':value', $value, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            $result = 0;
            if ($count > 0) {
                $result = "Found";
            } else {
                $result = "Not Found";
            }
            return $result;
            var_dump($result);
        }
        catch (PDOException $e) {
            echo 'Connection failed' . $e->getMessage();

        }
     }
     //function check database if i follow other user
        public static function checkFollow($id_follower, $id_followed) {
                $conn = Db::getInstance();
                $statement = $conn->prepare("SELECT * FROM `followers` WHERE `id_follower` = $id_follower AND `id_followed` = $id_followed");
                $statement->execute();
                $result = $statement->fetch();
                if ($result) {
                        return 1;
                } else {
                        return 2;
                }
        }

        public static function checkReported($id_reported, $id_reporter) {
                $conn = Db::getInstance();
                $statement = $conn->prepare("SELECT * FROM `reportusers` WHERE `id_reported` = $id_reported AND `id_reporter` = $id_reporter");
                $statement->execute();
                $result = $statement->fetch();
                if ($result) {
                        return 1;
                } else {
                        return 2;
                }
        }
        // function get

     /**
         * Get the value of behance
         */ 
        public function getBehance()
        {
                return $this->behance;
        }

        /**
         * Set the value of behance
         *
         * @return  self
         */ 
        public function setBehance($behance)
        {
                $this->behance = $behance;

                return $this;
        }

        /**
         * Get the value of dribble
         */ 
        public function getDribble()
        {
                return $this->dribble;
        }

        /**
         * Set the value of dribble
         *
         * @return  self
         */ 
        public function setDribble($dribble)
        {
                $this->dribble = $dribble;

                return $this;
        }

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }
}
