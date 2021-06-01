<?php
    abstract class Model {

            // Parameteres
            private $host = '127.0.0.1';
            private $name = 'record';
            private $user = 'root';
            private $pass = 'root';
            private $charset='utf8';
            private $dsn;

            protected $_connect;

            public $table;
            public $id;

            // Methods
            public function getConnection() 
            {
                //  get connection to database
                try {

                    $this->dsn = "mysql:host=$this->host;charset=$this->charset;dbname=$this->name";
                    $this->_connect = new PDO ($this->dsn, $this->user, $this->pass);
                    $this->_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // echo "<p class='text-success'>Connecion to the database was successful !</p>";

                } catch (PDOException $e){

                    // echo "<p class='text-danger'>Connecion to the database was not successful!</p>";
                    echo $e->getMessage();

                }

            }
            
            public function getAll() {

                try {
            
                    $query = 'SELECT * FROM ' . $this->table;
                    $result = $this->_connect->query($query);
                    $table = $result->fetchAll(PDO::FETCH_OBJ);
                    return $table;
                } catch (PDOException $e) {
                    // echo $e->getMessage();
                    return false;
                }

            }

            public function getOne(int $id) {

                try {

                    $this->id = $id;
                    $query = 'SELECT * FROM ' . $this->table . 'WHERE disc_id=:id' ;
                    $result = $this->_connect->prepare($query);
                    $this->_connect->binparam(':id' , $this->id );
                    $result->execute();
    
                } catch (PDOException $e) {

                    // echo $e->getMessage();
                    return false;
                }

            }

    }
    