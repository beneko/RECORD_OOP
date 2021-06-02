<?php

class Artists extends Controller
{

    public function index() {
        $disc = $this->loadModel('Artist');
        $discs = $disc->showAll();
        $this->render('index', [
            'discs' => $discList
        ]);
    }
}