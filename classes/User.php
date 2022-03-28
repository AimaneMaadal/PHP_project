<?php

include_once(__DIR__ . "/Db.php");
class User
{
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $password;
        private $profilePicture;
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
        public function getProfilePicture(){
                return $this->profilePicture;
        }
        
        public function setProfilePicture($profilePicture){
                $this->profilePicture = $profilePicture;
                return $this->profilePicture;
        }

        public function canLogin()
        {
                $conn = Db::getInstance();
                $statement = $conn->prepare("select * from users where email = :email;");
                $statement->bindValue(':email', $this->email);
                $statement->execute();
                $user = ($statement->fetch());
                $hash = $user["password"];

                if (!$user) {
                        echo "user does not exist";
                        return false;
                }
                if (password_verify($this->password, $hash)) {
                        echo "you're logged in";
                        return true;
                } else {
                        echo "wrong password";
                        return false;
                }
        }

        public static function getAll()
        {
                $conn = Db::getInstance();
                $sql = "SELECT * FROM users";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                return $result;
        }

        public function register()
        {
                $options = [
                        'cost' => 12
                ];
                $password = password_hash($this->password, PASSWORD_BCRYPT, $options);
                $conn = Db::getInstance();
                $statement = $conn->prepare("insert into users (firstname, lastname, email, password) values (:firstname, :lastname, :email, :password);");
                $statement->bindValue(':firstname', $this->firstname);
                $statement->bindValue(':lastname', $this->lastname);
                $statement->bindValue(':email', $this->email);
                $statement->bindValue(':password', $password);
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


        public static function getUserFromEmail($email){
                $conn = Db::getInstance();
                $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $statement->bindValue(':email', $email);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
        }

        public static function getUserFromId($id){
                $conn = Db::getInstance();
                $statement = $conn->prepare("SELECT * FROM users WHERE id = :id");
                $statement->bindValue(':id', $id);
                $statement->execute();
                $result = $statement->fetch();
                return $result;
        }

        public function updateUser() {
                $conn = Db::getInstance();
                $statement = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, profilepicture = :profilepicture WHERE email = :email");
                

                $firstname = $this->getFirstName();
                $lastname = $this->getLastname();
                $email = $this->getEmail();
                //$profilepicture = $this->getProfilePicture();

                $statement->bindValue(":email", $email);
                $statement->bindValue(":firstname", $firstname);
                $statement->bindValue(":lastname", $lastname);
                //$statement->bindValue(":profilepicture", $profilepicture);

                $statement->execute();
        }

        public function updateProfilePicture($profilepicture, $email) {
                $conn = Db::getInstance();
                $statement = $conn->prepare("UPDATE users SET profilepicture = :profilepicture WHERE email = :email");
                
                $statement->bindValue(":email", $email);
                $statement->bindValue(":profilepicture", $profilepicture);

                $statement->execute();

                header('location: usersettings.php');
        }
    

            
}
