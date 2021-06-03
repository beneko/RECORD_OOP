<?php
include '../function/functions.php';

$inputFiles = [
    'disc_picture' => array ("image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff")
];
if(isset($_POST['submit'])){
    // call valiForm function
    $formError = validForm($regex , $_POST);
    $fileError = validFileOptional($inputFiles, $_FILES);
}