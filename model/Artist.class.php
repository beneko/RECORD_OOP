<?php


class Artist extends Model
{
    public function __construct()
    {
        $this->table = 'artist';
    }

    //Method to get the list of artists
    function getArtistList(){
        try {
            $sql = "SELECT `artist_id`, `artist_name` FROM `artist`";
            $result=$this->_connect->query($sql);
            $artists = $result->fetchAll(PDO::FETCH_OBJ);
            return $artists;
        } catch (PDOException $e) {
            // echo $e->getMessage();
            return false;
        }
    }
    
}