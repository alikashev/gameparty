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
                        $this->collectAddSong($_REQUEST['songname'], $_REQUEST['artist']);
                    break;
                case 'read':
                        $this->collectReadAllSongs();
                    break;
                case 'readone':
                        $this->collectReadOneSong($_REQUEST['id']);
                     break;
                case 'update':
                        $this->collectUpdateSong($_REQUEST['id']);
                    break;
                case 'delete':
                        $this->collectDeleteSong($_REQUEST['id']);
                    break;
                default:
                        $this->collectReadAllSongs();
                    break;
            }
        } catch (Exeption $e) {
            throw $e;
        }

    }

    public function collectAddSong($name, $artist) {
        $songs = $this->songsLogic->addSong($name, $artist);
        include 'view/addedsong.php';
    }

    public function collectReadAllSongs() {
        $songs = $this->songsLogic->readAllSongs();
        include 'view/songs.php';
    }

    public function collectReadOneSong($id) {
        $songs = $this->songsLogic->readOneSong($id);
        include 'view/songs.php';
    }

    public function collectUpdateSong($id) {
        $songs = $this->songsLogic->updateSong($id);
        include 'view/song.php';
    }
    public function collectDeleteSong($id) {
        $songs = $this->songsLogic->deleteSong($id);
        include 'view/deleteSong.php';
    }
}

?>