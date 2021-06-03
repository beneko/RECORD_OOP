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

    public function details($id) {

        $this->loadModel('Disc');

        $disc = new Disc;

        $result = $disc->getDiscDetails($id);

        // var_dump($result);

        $this->render('details', $result);

    }

        public function add() {

        $this->loadModel('Artist');

        $artist = new Artist;

        $artists = $artist->getArtistList();

        // var_dump($result);

        $this->render('add', $artists);

        // if(isset($_POST['submit'])){

        //     // load functions class
        //     $this->loadFunctions();
        //     // 
        //     $functions = new Functions;

        //     // declare regex array
        //     $regex = [
        //         'disc_title' => '/^[A-Za-z0-9\s\-_,\.;:()]+$/',
        //         'artist_id' => '/^[0-9]+$/',
        //         'disc_year' => '/^\d{4}$/',
        //         'disc_label' => '/^[A-Za-z0-9\s\-_,\.;:()]+$/',
        //         'disc_genre' => '/^[A-Za-z0-9\s\-_,\.;:()]+$/',
        //         'disc_price' => '/\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})?/'
        //     ];

        //     $inputFiles = [
        //         'disc_picture' => array ("image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff")
        //     ];

        //     // call valiForm function
        //     $formError = $functions->validForm($regex , $_POST);
        //     $fileError = $functions->validFile($inputFiles, $_FILES);
        //     // if there is no error
        //     if(sizeof($formError) === 0 && sizeof($fileError) === 0 && isset($_POST['submit'])){
                
        //         // declare some variables to take the input values
        //         $disc_title = htmlspecialchars($_POST['disc_title']);
        //         $disc_year = htmlspecialchars($_POST['disc_year']);
        //         $disc_label = htmlspecialchars($_POST['disc_label']);
        //         $disc_genre = htmlspecialchars($_POST['disc_genre']);
        //         $disc_price = htmlspecialchars($_POST['disc_price']);
        //         $artist_id = htmlspecialchars($_POST['artist_id']);
        //         // extract the extension of the picture
        //         $extension = substr(strrchr($_FILES['disc_picture']['name'], "."), 1);
        //         // rename it and replace it to the target directory
        //         $target_dir ='../assets/img/';      
        //         $disc_picture = $disc_title.".".$extension;
        //         $new_name = $target_dir.$disc_picture;
        //         move_uploaded_file( $_FILES['disc_picture']['tmp_name'] , $new_name);

        //         // load model class
        //         $this->loadModel('Disc');
        //         // initiate model
        //         $disc = new Disc;
        //         // call addDisc method to add disc
        //         $result = $disc->addDisc($disc_title, $disc_year, $disc_picture, $disc_label, $disc_genre, $disc_price, $artist_id);
        //     }



        //     // var_dump($result);

        //     // $this->render('details', $result);
        //     // declare regex array


        // } else {
        //     $this->render('add', []);
        // }
 
    }

            // public function delete($id) {

        //     $this->loadModel('Disc');

        //     $disc = new Disc;

        //     $result = $disc->deleteDisc($id);

        //     // var_dump($result);

        //     $this->render('details', $result);

        // }

        // public function update($id) {

        //     // load model class
        //     $this->loadModel('Disc');
        //     // instaciate model
        //     $disc = new Disc;
        //     // load functions class 
        //     $this->LoadFunctions();
        //     $funcions = new Functions;
        //     if(isset($_GET['disc_id'])){
        //         $discId = $_GET['disc_id'];
        //         $details = $crud->getDiscDetails($discId);
        //         // if the form submited
        //         if(isset($_POST['submit'])){
        //             $disc_id = $_POST['disc_id'];
        //             $delete = $crud->deleteDisc($disc_id);
        //             // if the disc deleted successfully
        

        // }  


}