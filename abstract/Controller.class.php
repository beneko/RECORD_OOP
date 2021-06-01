<?php
    abstract class Controller {

        public function LoadModel(string $model){
            require_once (ROOT . '/model/' . $model . '.class.php');
            return new $model;
        }

        public function render(string $file , array $data= null){

            extract($data);

            ob_start();
            require(ROOT . '/views/'.strtolower(get_class($this)).'/'. $file .'.php');
            $content = ob_get_clean();
            require_once(ROOT . '/views/layout/default/default.php');

        }
        
    }