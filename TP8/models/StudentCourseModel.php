<?php
require_once 'models/Model.php';

class StudentCourseModel extends Model {
    protected $table = 'student_courses';

    public function create(array $data) {
        $query = "INSERT INTO " . $this->table . " 
                  (student_id, course_id, semester, academic_year) 
                  VALUES 
                  (:student_id, :course_id, :semester, :academic_year)";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $student_id = htmlspecialchars(strip_tags($data['student_id']));
        $course_id = htmlspecialchars(strip_tags($data['course_id']));
        $semester = htmlspecialchars(strip_tags($data['semester']));
        $academic_year = htmlspecialchars(strip_tags($data['academic_year']));
        
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':academic_year', $academic_year);
        
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        
        return false;
    }

    public function update($id, array $data) {
        $query = "UPDATE " . $this->table . " 
                  SET student_id = :student_id, course_id = :course_id, 
                      semester = :semester, academic_year = :academic_year 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize and bind data
        $student_id = htmlspecialchars(strip_tags($data['student_id']));
        $course_id = htmlspecialchars(strip_tags($data['course_id']));
        $semester = htmlspecialchars(strip_tags($data['semester']));
        $academic_year = htmlspecialchars(strip_tags($data['academic_year']));
        
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':academic_year', $academic_year);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    public function getAllWithDetails() {
        $query = "SELECT sc.*, s.name as student_name, s.nim, 
                         c.name as course_name, c.code as course_code, c.credits
                  FROM " . $this->table . " sc
                  JOIN students s ON sc.student_id = s.id
                  JOIN courses c ON sc.course_id = c.id
                  ORDER BY sc.id DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWithDetails($id) {
        $query = "SELECT sc.*, s.name as student_name, s.nim, 
                         c.name as course_name, c.code as course_code, c.credits
                  FROM " . $this->table . " sc
                  JOIN students s ON sc.student_id = s.id
                  JOIN courses c ON sc.course_id = c.id
                  WHERE sc.id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByStudent($student_id) {
        $query = "SELECT sc.*, c.name as course_name, c.code as course_code, c.credits
                  FROM " . $this->table . " sc
                  JOIN courses c ON sc.course_id = c.id
                  WHERE sc.student_id = :student_id
                  ORDER BY sc.academic_year DESC, sc.semester DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCourse($course_id) {
        $query = "SELECT sc.*, s.name as student_name, s.nim
                  FROM " . $this->table . " sc
                  JOIN students s ON sc.student_id = s.id
                  WHERE sc.course_id = :course_id
                  ORDER BY sc.academic_year DESC, sc.semester DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkDuplicate($student_id, $course_id, $semester, $academic_year) {
        $query = "SELECT COUNT(*) as count FROM " . $this->table . " 
                  WHERE student_id = :student_id AND course_id = :course_id 
                  AND semester = :semester AND academic_year = :academic_year";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':academic_year', $academic_year);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }
}
?>