<?php


class Disc extends Model
{
    public function __construct()
    {
        $this->table = 'disc';
       $this->getConnection();
    }
}