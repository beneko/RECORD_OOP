<?php

class Discs extends Controller
{

    public function index() {

        $this->loadModel('Disc');

        $disc = new Disc;

        $result = $disc->getDiscList();

        // var_dump($result);

        $this->render('index', [
            'discs' => $result
        ]);

    }

    public function details($id) {

        $this->loadModel('Disc');

        $disc = new Disc;

        $result = $disc->getDiscDetails($id);

        // var_dump($result);

        if($result){

            $this->render('details', [
             'details' => $result
            ]);

        } else {

            $this->render('details', []);

        }
        
    }

    public function add() {

        // $this->loadModel('Artist');

        // $artist = new Artist;

        // $artists = $artist->getArtistList();

        // // var_dump($result);

        // $this->render('add', $artists);

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

    public function update($id) {
        
        $this->loadModel('Disc');
        $disc = new Disc;

        $result = $disc->getDiscDetails($id);

        $this->loadController('Artists');
        $artist = new Artists;
        
        $artists = $artist->index();

        if(isset($_POST['submit'])){

            // load functions class 
            $this->LoadController('Form');
            $form = new Form;
            $form->validUpdateForm([
                'post' => $_POST,
                'file' => $_FILES
                ]);
                
            if(sizeof($form->formError) === 0 && sizeof($form->fileError) === 0){
                // if there is no error
                // declare some variables to take the input values
                $disc_id = htmlspecialchars($_POST['disc_id']);
                $disc_title = htmlspecialchars($_POST['disc_title']);
                $disc_year = htmlspecialchars($_POST['disc_year']);
                $disc_label = htmlspecialchars($_POST['disc_label']);
                $disc_genre = htmlspecialchars($_POST['disc_genre']);
                $disc_price = htmlspecialchars($_POST['disc_price']);
                $artist_id = htmlspecialchars($_POST['artist_id']);
                // if new picture uploaded or not
                if($_FILES['disc_picture']['error'] === 4 ){
                    $disc_picture = $_POST['disc_picture'];
                } else {
                    // extract the extension of the picture
                    $extension = substr(strrchr($_FILES['disc_picture']['name'], "."), 1);
                    // rename it and replace it to the target directory
                    $target_dir = ROOT.'/assets/img/';      
                    $disc_picture = $disc_title.".".$extension;
                    $new_name = $target_dir.$disc_picture;
                    move_uploaded_file( $_FILES['disc_picture']['tmp_name'] , $new_name);
                }
                // call updateDisc method
                $added = $disc->updateDisc($disc_id, $disc_title, $disc_year, $disc_picture, $disc_label, $disc_genre, $disc_price, $artist_id);
                // if added successfully
                if($added){
                    // get new details
                    $result = $disc->getDiscDetails($id);
                    $this->render('details', [
                        'details' => $result
                       ]);
                }
            }
            else{
                $this->render('update', [
                    'details' => $_POST ,
                    'artists'  => $artists,
                    'formError' => $form->formError,
                    'fileError' => $form->fileError
                ]);
            }
        } else {

            if($result){

                $this->render('update', [
                    'details' => $result ,
                    'artists'  => $artists
                ]);
    
            } else {
    
                $this->render('update', []);
    
            }

        }
    }
 
}