<?php

include_once(__DIR__ . "/Db.php");

class Post
{
    private $postId;
    private $title;
    private $imgPath;
    private $description;


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
    public function uploadPost()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO posts (title, description, imgpath) VALUES (:title, :description, :imgpath)");
        $statement->bindValue(":title", $this->title);
        $statement->bindValue(":imgpath", $this->imgPath);
        $statement->bindValue(":description", $this->description);
        $statement->execute();
    }
}
