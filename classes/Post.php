<?php

include_once(__DIR__ . "/Db.php");

class Post
{
    private $postId;
    private $title;
    private $imgPath;
    private $description;
    private $userId;
    private $tags;
    private $timePosted;

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
    //create function to upload post

    public function uploadPost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO posts (title, description, tags, imgpath, userid, time_posted) VALUES (:title, :description,:tags , :imgpath, :userid, :time_posted)");
        $statement->bindValue(":title", $this->title);
        $statement->bindValue(":imgpath", $this->imgPath);
        $statement->bindValue(":description", $this->description);
        $statement->bindValue(":userid", $this->userId);
        $statement->bindValue(":tags", $this->tags);
        $statement->bindValue(":time_posted", $this->timePosted);
        $statement->execute();
    }

    /**
     * Get the value of tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
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



    public static function getAllPostsLimit()
    {
        global $page;
        global $total_pages;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $conn = Db::getInstance();

        // pagination 
        $limit = 6;
        $offset = ($page - 1) * $limit;


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
    public static function getAllPostsLimitFiltered($filter)
    {
        global $page;
        global $total_pages;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $conn = Db::getInstance();

        // pagination 
        $limit = 6;
        $offset = ($page - 1) * $limit;


        // totaal aantal pagina's nemen
        $sql = "SELECT * FROM `posts` WHERE `title` LIKE '%$filter%' OR  `tags` LIKE '%$filter%' ;";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    // function to get all posts by user tags

    public static function getAllPostsByUserTags($postId)
    {
        $conn = Db::getInstance();
        $sql = "SELECT tags FROM `posts` WHERE `id` = $postId;";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return json_decode($result[0]['tags']);
    }
   

    public function getUserByPostId($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM users INNER JOIN posts ON users.id = posts.userid WHERE posts.id = :postId");
        $statement->bindValue(':postId', $postId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function getPostsByUserId($userId)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM posts WHERE userid = :userId");
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public static function deletePostByPostId($id)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("DELETE FROM posts WHERE id = :postId");
        $statement->bindValue(':postId', $id);
        $statement->execute();
    }
    
    public function getTimePosted()
    {
        return $this->timePosted;
    }

    /**
     * Set the value of timePosted
     *
     * @return  self
     */ 
    public function setTimePosted($timePosted)
    {
        $this->timePosted = $timePosted;

        return $this;
    }
}
