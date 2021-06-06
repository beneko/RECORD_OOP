<?php


class Disc extends Model
{
    public function __construct()
    {
        $this->table = 'disc';
        $this->connect();
    }

    //Method to get All discs with artist names
    public function getDiscList(){

        try {

            $sql = "SELECT `disc_id`, `disc_title`,`disc_year`,`disc_picture`,`disc_label`, `disc_genre`, `artist_name` 
            FROM `disc`,`artist` 
            WHERE `disc`.`artist_id` = `artist`.`artist_id`
            ORDER BY `disc_id`";
            $stmt = $this->_connect->query($sql);
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e) {

            echo 'Error :'. $e->getMessage();
            return false;

        }

    }
    
    //Method to get the details of a disc with artist name
    public function getDiscDetails($discId){
        try {
            $sql = "SELECT `disc_id` , `disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `artist_name` , `disc_price` 
            FROM `disc`,`artist` 
            WHERE `disc`.`artist_id` = `artist`.`artist_id` 
            AND `disc_id`=:disc_id";
            $result=$this->_connect->prepare($sql);
            $result->bindparam(':disc_id', $discId);
            $result->execute();
            $details = $result->fetch();
            return $details;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            return false;
        }
    }

    // function to add a new disc
    public function addDisc($disc_title, $disc_year, $disc_picture, $disc_label, $disc_genre, $disc_price, $artist_id){
        try {
            $sql = "INSERT INTO `disc` (`disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) 
                    VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)";
            $result = $this->_connect->prepare($sql);
            $result->bindparam(':disc_title', $disc_title);
            $result->bindparam(':disc_year', $disc_year);
            $result->bindparam(':disc_picture', $disc_picture);
            $result->bindparam(':disc_label', $disc_label);
            $result->bindparam(':disc_genre', $disc_genre);
            $result->bindparam(':disc_price', $disc_price);
            $result->bindparam(':artist_id', $artist_id);
            $result->execute();
            $id = $this->_connect->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            return false;
        }
    }

    //Method to update a disc
    public function updateDisc($disc_id, $disc_title, $disc_year, $disc_picture, $disc_label, $disc_genre, $disc_price, $artist_id){
        try {
            $sql = "UPDATE `disc` 
                    SET `disc_title` = :disc_title,
                    `disc_year` = :disc_year ,
                    `disc_picture` = :disc_picture,
                    `disc_label` = :disc_label,
                    `disc_genre` = :disc_genre,
                    `disc_price` = :disc_price,
                    `artist_id` = :artist_id
                    WHERE `disc_id` = :disc_id";
            $result = $this->_connect->prepare($sql);
            $result->bindparam(':disc_id', $disc_id);
            $result->bindparam(':disc_title', $disc_title);
            $result->bindparam(':disc_year', $disc_year);
            $result->bindparam(':disc_picture', $disc_picture);
            $result->bindparam(':disc_label', $disc_label);
            $result->bindparam(':disc_genre', $disc_genre);
            $result->bindparam(':disc_price', $disc_price);
            $result->bindparam(':artist_id', $artist_id);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
      
    //function to delete a disc
    public function deleteDisc($discId){
        try {
            $sql = "DELETE FROM `disc`
                    WHERE `disc_id`=:disc_id";
            $result = $this->_connect->prepare($sql);
            $result->bindparam(':disc_id', $discId);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}