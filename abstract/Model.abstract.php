<?php
    abstract class Model {

            // Parameteres
            private $host = '127.0.0.1';
            private $name = 'record';
            private $user = 'root';
            private $pass = '';
            private $charset='utf8';
            private $dsn;

            protected $_connect;

            public string $table;
            public string $id;
            
            // Methods

            // Method to get connection to the database
            protected function connect()
            {
                
                try {

                    $this->dsn = "mysql:host=$this->host;charset=$this->charset;dbname=$this->name";
                    $this->_connect = new PDO ($this->dsn, $this->user, $this->pass);
                    $this->_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->_connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    // echo "<p class='text-success'>Connecion to the database was successful !</p>";

                } catch (PDOException $e){

                    // echo "<p class='text-danger'>Connecion to the database was not successful!</p>";
                    echo 'Error :'. $e->getMessage();

                }

            }
            
            // Method to get all the information in a table
            public function getAll() {

                try {
            
                    $query = 'SELECT * FROM ' . $this->table;
                    $stmt = $this->_connect->query($query);
                    $result = $stmt->fetchAll();
                    return $result;
                } catch (PDOException $e) {

                    echo 'Error :'. $e->getMessage();
                    return false;
                }

            }

            // Method to get the information of an id in a table

            public function getOne(int $id) {

                try {
                    $this->id = $id;
                    $query = 'SELECT * FROM ' . $this->table . 'WHERE disc_id= :id' ;
                    $stmt = $this->_connect->prepare($query);
                    $stmt->bindvalue(':id', $this->id, PDO::PARAM_INT);
                    $stmt->execute();
                    $results = $stmt->fetch();
                    return $results;
                } catch (PDOException $e) {

                    echo 'Error :'. $e->getMessage();
                    return false;
                }

            }

    }
    