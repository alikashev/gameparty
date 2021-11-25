<?php

require_once 'Model/datahandler.php';
require_once 'View/outputData.php';

class SongsLogic {

    public function __construct() {
        $this->datahandler = new datahandler("localhost", "mysql", "school","root", "");
        $this->outputData = new OutputData();
    }

    public function __destruct(){}
    
    public function addSong($name, $artist){

        try {

            $query = "INSERT INTO songs (name, artist)";
            $query .= "VALUES ('$name', '$artist');";
            $result = $this->datahandler->createData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
        
    }

    public function readAllSongs(){

        try {

            $query = "SELECT id, name, file, artist FROM songs";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readOnesong($id){

        try {

            $query = "SELECT * FROM songs ";
            $query .= "WHERE id=$id ";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function deleteSong($id){

        try {

            $query = "DELETE FROM songs ";
            $query .= "WHERE id=$id ";
            $result = $this->datahandler->deleteData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }
    
}

?>