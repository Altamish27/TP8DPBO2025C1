<?php
require_once 'models/Model.php';

class CourseModel extends Model {
    protected $table = 'courses';

    public function create(array $data) {
        $query = "INSERT INTO " . $this->table . " 
                  (code, name, credits) 
                  VALUES 
                  (:code, :name, :credits)";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $code = htmlspecialchars(strip_tags($data['code']));
        $name = htmlspecialchars(strip_tags($data['name']));
        $credits = htmlspecialchars(strip_tags($data['credits']));
        
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':credits', $credits);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        
        return false;
    }

    public function update($id, array $data) {
        $query = "UPDATE " . $this->table . " 
                  SET code = :code, name = :name, credits = :credits 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $code = htmlspecialchars(strip_tags($data['code']));
        $name = htmlspecialchars(strip_tags($data['name']));
        $credits = htmlspecialchars(strip_tags($data['credits']));
        
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':credits', $credits);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function getStudentCount($course_id) {
        $query = "SELECT COUNT(*) as count FROM student_courses WHERE course_id = :course_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
}
?>