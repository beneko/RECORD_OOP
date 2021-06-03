<?php
    abstract class Controller {

        // Mthode to load Model class
        protected function LoadModel(string $model){
            require_once (ROOT . '/model/' . $model . '.class.php');
        }

        // Mthode to load functions class
        protected function LoadFunctions(){
            require_once (ROOT . '/function/functions.class.php');
        }

        // Mthode to create page view
        protected function render(string $file , array $result){

            
            ob_start();
            require(ROOT . '/views/'.strtolower(get_class($this)).'/'. $file .'.php');
            $content = ob_get_clean();
            require_once(ROOT . '/views/layout/default/default.php');

        }
        
    }