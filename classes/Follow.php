<?php


include_once(__DIR__ . "/Db.php");


class Follow
{
    private $followed;
    private $follower;


    /**
     * Get the value of followed
     */ 
    public function getFollowed()
    {
        return $this->followed;
    }

    /**
     * Set the value of followed
     *
     * @return  self
     */ 
    public function setFollowed($followed)
    {
        $this->followed = $followed;

        return $this;
    }

    /**
     * Get the value of follower
     */ 
    public function getFollower()
    {
        return $this->follower;
    }

    /**
     * Set the value of follower
     *
     * @return  self
     */ 
    public function setFollower($follower)
    {
        $this->follower = $follower;

        return $this;
    }


    public function addFollow(){
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO `followers` (`id_follower`, `id_followed`) VALUES (:follower,:followed);");
            $statement->bindValue(":follower", $this->follower);
            $statement->bindValue(":followed", $this->followed);
            return $statement->execute();
    }
}
