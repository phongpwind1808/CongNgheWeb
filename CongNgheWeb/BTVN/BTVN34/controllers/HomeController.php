<?php
require __DIR__.'/../models/AdminModel.php';
class HomeController{
   public function index(){
    $flowers=AdminModel::getAllFlower();    
    require __DIR__.'/../views/home/header.php';
    require __DIR__.'/../views/home/home.php';
    require __DIR__.'/../views/home/footer.php';
   } 
}
?>