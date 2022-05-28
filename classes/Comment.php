<?php
class Comment
{
    private $text;
    private $postId;
    private $userId;

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */
    public function setText($text)
    {
        $this->text = $text;

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

    public static function getAll($postId)
    {
        $conn = Db::getInstance();
        $statement = $conn->query("select * from comments where postid = $postId");
        $statement = $statement->fetchAll(PDO::FETCH_CLASS, "Comment");
        return $statement;
    }

    public function saveComment()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into comments (postid, userid, text) values (:postid, :userid, :text)");

        $text = $this->getText();
        $postId = $this->getPostId();
        $userId = $this->getUserId();

        $statement->bindValue(":postid", $postId);
        $statement->bindValue(":userid", $userId);
        $statement->bindValue(":text", $text);

        $result = $statement->execute();
        return $result;
    }
}
