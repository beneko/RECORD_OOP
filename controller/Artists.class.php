<?php

class Artists extends Controller
{

    public function index() {

        $this->loadModel('Artist');

        $artist = new Artist;

        $result = $artist->getArtistList();

        return $result;

    }
    
}