<?php

class Form extends Controller
{
    protected $regex = [
        'disc_title' => '/^[A-Za-z0-9\s\-_,\.;:()]+$/',
        'artist_id' => '/^[0-9]+$/',
        'disc_year' => '/^\d{4}$/',
        'disc_label' => '/^[A-Za-z0-9\s\-_,\.;:()]+$/',
        'disc_genre' => '/^[A-Za-z0-9\s\-_,\.;:()]+$/',
        'disc_price' => '/\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})?/'
    ];
    protected $inputFiles = [
        'disc_picture' => array ("image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff")
    ];

    public $formError = [];
    public $fileError = [];


    public function validUpdateForm(array $data) {

        extract($data);

        $this->LoadFunctions();

        $functions = new Functions;

        $this->formError = $functions->validForm($this->regex , $post);
        $this->fileError = $functions->validFileOptional($this->inputFiles ,  $file);

    }

    public function validAddForm(array $data) {

        extract($data);

        $this->LoadFunctions();

        $functions = new Functions;

        $this->formError = $functions->validForm($this->regex , $post);
        $this->fileError = $functions->validFile($this->inputFiles ,  $file);

    }
    
}