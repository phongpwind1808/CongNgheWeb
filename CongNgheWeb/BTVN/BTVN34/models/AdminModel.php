<?php
class AdminModel{
    public static function getAllFlower(){
        $dbconnection = new dbconnection();
        $conn = $dbconnection->getConn();
        // Lấy dữ liệu hoa từ bảng dshoa
        $stmt = $conn->query("SELECT * FROM dshoa");
        $flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $flowers;
    }

    public static function Add($name, $description, $imagePath){
        $dbconnection = new dbconnection();
        $conn = $dbconnection->getConn();
        // Chèn dữ liệu hoa vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO dshoa (name, description, image) VALUES (?, ?, ?)");
        if($stmt->execute([$name, $description, $imagePath])) return true;
        else return false;
    }

    public static function Del($id){
        $dbconnection = new dbconnection();
        $conn = $dbconnection->getConn();
        
        $stmt = $conn->prepare("DELETE FROM dshoa WHERE id = ?");
        if($stmt->execute([$id])) return true;
        else return false;
    }
    
    public static function Edit($name, $description, $imagePath, $id){
        $dbconnection = new dbconnection();
        $conn = $dbconnection->getConn();
        if($imagePath){
            $stmt = $conn->prepare("UPDATE dshoa SET name = ?, description = ?, image = ? WHERE id = ?");
            $stmt->execute([$name, $description, $imagePath, $id]);
    
        }else if($imagePath === "") {
            $stmt = $conn->prepare("UPDATE dshoa SET name = ?, description = ? WHERE id = ?");
            $stmt->execute([$name, $description, $id]);
        }
        if($stmt->execute()){
            return true;
        } else{
            return false;
        }
    }
    public static function getByID($id){

        // Kết nối cơ sở dữ liệu
        $dbconnection = new dbconnection();
        $conn = $dbconnection->getConn();

        // Truy vấn thông tin bản ghi
        $stmt = $conn->prepare("SELECT * FROM dshoa WHERE id = ?");
        $stmt->execute([$id]);
        $flowers = $stmt->fetch(PDO::FETCH_ASSOC);

        return $flowers;
    }
}
?>