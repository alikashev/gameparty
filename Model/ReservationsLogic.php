<?php

require_once 'Model/datahandler.php';
require_once 'View/outputData.php';

class ReservationsLogic {

    public function __construct() {
        $this->datahandler = new datahandler("localhost", "mysql", "gameparty","ali", "ali1903");
        $this->outputData = new OutputData();
    }

    public function __destruct(){}
    
    public function addSong($parameters){

        try {

            $query = "INSERT INTO reservations (COLUMNS)";
            $query .= "VALUES ('$name', '$artist');";
            $result = $this->datahandler->createData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
        
    }

    public function readAllReservations(){

        try {

            $query = "SELECT reservation_id, reservation_name, reservation_date, reservation_place FROM reservations";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }

    }

    public function readOneReservation($id){

        try {

            $query = "SELECT * FROM reservations ";
            $query .= "WHERE id=$id ";
            $result = $this->datahandler->readsData($query);
            $results = $result->fetchAll();

            return $this->outputData->createTable($results);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }

    public function deleteReservation($id){

        try {

            $query = "DELETE FROM reservations ";
            $query .= "WHERE id=$id ";
            $result = $this->datahandler->deleteData($query);
            
        } catch (PDOException $e) {

            echo "Fout opgetreden";

        }
    }
    
}

?>