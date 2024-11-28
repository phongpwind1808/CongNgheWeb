<?php 

require_once '../models/GetPlayer.php';

class homeControllers{
    public function index(){
        $AllPlayer = new GetPlayer();
        $players = $AllPlayer->getAllPlayer();

        include './app/views/home/index.php';
    }
}
?>