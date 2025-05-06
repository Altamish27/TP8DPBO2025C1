<?php
require_once 'models/Model.php';

class StudentModel extends Model {
    protected $table = 'students';

    public function create(array $data) {
        $query = "INSERT INTO " . $this->table . " 
                  (name, nim, phone, join_date, prodi_id) 
                  VALUES 
                  (:name, :nim, :phone, :join_date, :prodi_id)";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $name = htmlspecialchars(strip_tags($data['name']));
        $nim = htmlspecialchars(strip_tags($data['nim']));
        $phone = htmlspecialchars(strip_tags($data['phone']));
        $join_date = htmlspecialchars(strip_tags($data['join_date']));
        $prodi_id = htmlspecialchars(strip_tags($data['prodi_id']));
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':join_date', $join_date);
        $stmt->bindParam(':prodi_id', $prodi_id);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        
        return false;
    }

    public function update($id, array $data) {
        $query = "UPDATE " . $this->table . " 
                  SET name = :name, nim = :nim, phone = :phone, 
                      join_date = :join_date, prodi_id = :prodi_id 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $name = htmlspecialchars(strip_tags($data['name']));
        $nim = htmlspecialchars(strip_tags($data['nim']));
        $phone = htmlspecialchars(strip_tags($data['phone']));
        $join_date = htmlspecialchars(strip_tags($data['join_date']));
        $prodi_id = htmlspecialchars(strip_tags($data['prodi_id']));
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':nim', $nim);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':join_date', $join_date);
        $stmt->bindParam(':prodi_id', $prodi_id);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function getAllWithProdi() {
        $query = "SELECT s.*, p.name as prodi_name 
                  FROM " . $this->table . " s
                  LEFT JOIN prodi p ON s.prodi_id = p.id
                  ORDER BY s.id DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWithProdi($id) {
        $query = "SELECT s.*, p.name as prodi_name 
                  FROM " . $this->table . " s
                  LEFT JOIN prodi p ON s.prodi_id = p.id
                  WHERE s.id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>