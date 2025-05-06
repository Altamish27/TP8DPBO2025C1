<?php
require_once 'models/Model.php';

class ProdiModel extends Model {
    protected $table = 'prodi';

    public function create(array $data) {
        $query = "INSERT INTO " . $this->table . " 
                  (code, name) 
                  VALUES 
                  (:code, :name)";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $code = htmlspecialchars(strip_tags($data['code']));
        $name = htmlspecialchars(strip_tags($data['name']));
        
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        
        return false;
    }

    public function update($id, array $data) {
        $query = "UPDATE " . $this->table . " 
                  SET code = :code, name = :name 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $code = htmlspecialchars(strip_tags($data['code']));
        $name = htmlspecialchars(strip_tags($data['name']));
        
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function getStudentCount($prodi_id) {
        $query = "SELECT COUNT(*) as count FROM students WHERE prodi_id = :prodi_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':prodi_id', $prodi_id);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
}
?>