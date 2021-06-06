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

        $this->loadController('Artists');
        $artist = new Artists;
        
        $artists = $artist->index();

        if(isset($_POST['submit'])){

            // load functions class 
            $this->LoadController('Form');
            $form = new Form;
            $form->validAddForm([
                'post' => $_POST,
                'file' => $_FILES
                ]);
                
            if(sizeof($form->formError) === 0 && sizeof($form->fileError) === 0){
                // if there is no error
                // declare some variables to take the input values
                $disc_title = htmlspecialchars($_POST['disc_title']);
                $disc_year = htmlspecialchars($_POST['disc_year']);
                $disc_label = htmlspecialchars($_POST['disc_label']);
                $disc_genre = htmlspecialchars($_POST['disc_genre']);
                $disc_price = htmlspecialchars($_POST['disc_price']);
                $artist_id = htmlspecialchars($_POST['artist_id']);

                // if new picture uploaded
                // extract the extension of the picture
                $extension = substr(strrchr($_FILES['disc_picture']['name'], "."), 1);
                // rename it and replace it to the target directory
                $target_dir = ROOT.'/assets/img/';      
                $disc_picture = $disc_title.".".$extension;
                $new_name = $target_dir.$disc_picture;
                move_uploaded_file( $_FILES['disc_picture']['tmp_name'] , $new_name);
    
                // load model
                $this->loadModel('Disc');
                $disc = new Disc;
                // call updateDisc method
                $added = $disc->addDisc($disc_title, $disc_year, $disc_picture, $disc_label, $disc_genre, $disc_price, $artist_id);
                if($added === false)
                {
                    $this->render('add', [
                        'artists'  => $artists,
                        'formError' => $form->formError,
                        'fileError' => $form->fileError
                    ]);

                }
                else
                {
                    header('Location:/Discs/details/'.$added);
                    die;
                }
                
                
            }
            else
            {
                $this->render('add', [
                    'artists'  => $artists,
                    'formError' => $form->formError,
                    'fileError' => $form->fileError
                ]);
            }
        }
        else
        {

            $this->render('add', [
                'artists'  => $artists
            ]);

        }
    }


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
                $updated = $disc->updateDisc($disc_id, $disc_title, $disc_year, $disc_picture, $disc_label, $disc_genre, $disc_price, $artist_id);
                // if added successfully
                if($updated)
                {
                   
                    header('Location:/Discs/details/'.$id);
                    die;

                }
            }
            else
            {
                $this->render('update', [
                    'details' => $_POST ,
                    'artists'  => $artists,
                    'formError' => $form->formError,
                    'fileError' => $form->fileError
                ]);
            }
        } else {

            if($result)
            {

                $this->render('update', [
                    'details' => $result ,
                    'artists'  => $artists
                ]);
    
            }
            else
            {
    
                $this->render('update', []);
    
            }

        }
    }

    public function delete($id) {

        $this->loadModel('Disc');
        $disc = new Disc;
        $result = $disc->getDiscDetails($id);

        if(isset($_POST['submit'])){

            $delete = $disc->deleteDisc($id);

            if($delete)
            {   
                $picture = ROOT.'/assets/img/'.$result['disc_picture'];
                unlink($picture);
                header('Location:/Discs/index');
                die;
            }
            else
            {
                $this->render('delete', [
                    'details' => $result
                   ]);
            }
            
        }
        else
        {

            $this->render('delete', [
                'details' => $result
               ]);

        }
        
    }
 
}