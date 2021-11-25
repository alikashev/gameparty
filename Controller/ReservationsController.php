<?php

require 'Model/ReservationsLogic.php';

class ReservationsController {

    public function __construct(){

        $this->ReservationsLogic = new ReservationsLogic();
    }

    public function __destruct(){}

    public function handleRequest(){
        
        try {

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

            switch ($action) {
                case 'add':
                        $this->collectAddReservation($_REQUEST['songname'], $_REQUEST['artist']);
                    break;
                case 'read':
                        $this->collectReadAllReservations();
                    break;
                case 'readone':
                        $this->collectReadOneReservation($_REQUEST['id']);
                     break;
                case 'update':
                        $this->collectUpdateReservation($_REQUEST['id']);
                    break;
                case 'delete':
                        $this->collectDeleteReservation($_REQUEST['id']);
                    break;
                default:
                        $this->collectReadAllReservations();
                    break;
            }
        } catch (Exeption $e) {
            throw $e;
        }

    }

    public function collectAddReservation($name, $artist) {
        $reservations = $this->ReservationsLogic->addReservation($name, $artist);
        include 'view/addedsong.php';
    }

    public function collectReadAllReservations() {
        $reservations = $this->ReservationsLogic->readAllReservations();
        include 'view/home.php';
    }

    public function collectReadOneReservation($id) {
        $reservations = $this->ReservationsLogic->readOneReservation($id);
        include 'view/songs.php';
    }

    public function collectUpdateReservation($id) {
        $reservations = $this->ReservationsLogic->updateReservation($id);
        include 'view/song.php';
    }
    public function collectDeleteReservation($id) {
        $reservations = $this->ReservationsLogic->deleteReservation($id);
        include 'view/deleteSong.php';
    }
}

?>