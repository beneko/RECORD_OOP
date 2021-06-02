<?php

class Discs extends Controller
{

    public function index() {

        $this->loadModel('Disc');

        $disc = new Disc;

        $result = $disc->getDiscList();

        // var_dump($result);

        $this->render('index', $result);

    }
}