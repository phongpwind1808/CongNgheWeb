<?php

require_once './playerModel.php';
require_once '../../config/dbConnec.php';


class GetPlayer{

    public function getAllPlayer(){
        $players = [];
        $dbconnection = new dbconnection();

        if($dbconnection!=null){
            $conn = $dbconnection->getConn();
            if($conn != null){
                $sql = "select * from player";
                $stmt = $conn->query($sql);
                while($row = $stmt->fetch()){
                    $player = new player($row['ID'], $row['Name'],$row['Age'],$row['Evaluate'],$row['Nationality']);
                    $players[] = $player;
                }

                return $players;
            }
        }
    }
}
?>