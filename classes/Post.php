<?php

include_once(__DIR__ . "/Db.php");

class Post
{
    private $postId;
    private $title;
    private $imgPath;
    private $description;
    private $userId;


    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        if (empty($description)) {
            throw new Exception("description cant be empty");
        }
        $this->description = $description;
        return $this;
    }

    /**
     * Get the value of imgPath
     */
    public function getImgPath()
    {
        return $this->imgPath;
    }

    /**
     * Set the value of imgPath
     *
     * @return  self
     */
    public function setImgPath($imgPath)
    {
        $this->imgPath = $imgPath;
        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        if (empty($title)) {
            throw new Exception("title cant be empty");
        }
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of postId
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set the value of postId
     *
     * @return  self
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;

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
    public function uploadPost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO posts (title, description, imgpath, userid) VALUES (:title, :description, :imgpath, :userid)");
        $statement->bindValue(":title", $this->title);
        $statement->bindValue(":imgpath", $this->imgPath);
        $statement->bindValue(":description", $this->description);
        $statement->bindValue(":userid", $this->userId);
        $statement->execute();
    }

    public static function getAllPosts()
        {
                $conn = Db::getInstance();
                $sql = "SELECT * FROM `posts`;";
                $statement = $conn->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll();
                return $result;
        }

        

    public static function getAllPostsLimit(){
        global $page;
        global $total_pages;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $conn = Db::getInstance();

        // pagination 
        $limit = 5;
        $offset = ($page-1) * $limit; 


        // totaal aantal pagina's nemen
        $stmt = $conn->query("SELECT count(*) FROM `posts`;");
        $total_results = $stmt->fetchColumn();
        $total_pages = ceil($total_results / $limit);

        
        $sql = "SELECT * FROM `posts` ORDER BY `time_posted` DESC LIMIT $offset, $limit;";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}
