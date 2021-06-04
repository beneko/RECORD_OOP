<?php
    abstract class Controller {

        // Mthode to load Model class
        protected function LoadModel(string $model){
            require_once (ROOT . '/model/' . $model . '.class.php');
        }

        // Mthode to load MoController class
        protected function LoadController(string $contr){
            require_once (ROOT . '/controller/' . $contr . '.class.php');
        }

        // Mthode to load functions class
        protected function LoadFunctions(){
            require_once (ROOT . '/function/functions.class.php');
        }

        

        // Mthode to create page view
        protected function render(string $file , array $data = []){

            extract($data);

            ob_start();
            require(ROOT . '/views/'.strtolower(get_class($this)).'/'. $file .'.php');
            $content = ob_get_clean();
            require_once(ROOT . '/views/layout/default/default.php');

        }
        
    }