<?php
require_once 'controllers/Controller.php';
require_once 'models/StudentCourseModel.php';
require_once 'models/StudentModel.php';
require_once 'models/CourseModel.php';

class StudentCourseController extends Controller {
    private $studentCourseModel;
    private $studentModel;
    private $courseModel;

    public function __construct() {
        $this->studentCourseModel = new StudentCourseModel();
        $this->studentModel = new StudentModel();
        $this->courseModel = new CourseModel();
    }

    public function index() {
        $studentCourses = $this->studentCourseModel->getAllWithDetails();
        $this->render('student_courses/index', [
            'studentCourses' => $studentCourses,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'];
            $course_id = $_POST['course_id'];
            $semester = $_POST['semester'];
            $academic_year = $_POST['academic_year'];

            // Check for duplicate registration
            if ($this->studentCourseModel->checkDuplicate($student_id, $course_id, $semester, $academic_year)) {
                $this->setFlashMessage('danger', 'This course is already registered for this student in the selected semester and academic year');
                $this->redirect('index.php?controller=studentCourse&action=create');
                return;
            }

            $data = [
                'student_id' => $student_id,
                'course_id' => $course_id,
                'semester' => $semester,
                'academic_year' => $academic_year
            ];

            if ($this->studentCourseModel->create($data)) {
                $this->setFlashMessage('success', 'Course Registration created successfully');
                $this->redirect('index.php?controller=studentCourse&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to create Course Registration');
                $this->redirect('index.php?controller=studentCourse&action=create');
            }
        } else {
            $students = $this->studentModel->getAllWithProdi();
            $courses = $this->courseModel->getAll('name ASC');
            $this->render('student_courses/create', [
                'students' => $students,
                'courses' => $courses,
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Course Registration ID');
            $this->redirect('index.php?controller=studentCourse&action=index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'];
            $course_id = $_POST['course_id'];
            $semester = $_POST['semester'];
            $academic_year = $_POST['academic_year'];

            // Get current registration to check if it's changed
            $current = $this->studentCourseModel->getById($id);
            
            // Check for duplicate only if something changed
            if ($current['student_id'] != $student_id || 
                $current['course_id'] != $course_id || 
                $current['semester'] != $semester || 
                $current['academic_year'] != $academic_year) {
                
                if ($this->studentCourseModel->checkDuplicate($student_id, $course_id, $semester, $academic_year)) {
                    $this->setFlashMessage('danger', 'This course is already registered for this student in the selected semester and academic year');
                    $this->redirect('index.php?controller=studentCourse&action=edit&id=' . $id);
                    return;
                }
            }

            $data = [
                'student_id' => $student_id,
                'course_id' => $course_id,
                'semester' => $semester,
                'academic_year' => $academic_year
            ];

            if ($this->studentCourseModel->update($id, $data)) {
                $this->setFlashMessage('success', 'Course Registration updated successfully');
                $this->redirect('index.php?controller=studentCourse&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to update Course Registration');
                $this->redirect('index.php?controller=studentCourse&action=edit&id=' . $id);
            }
        } else {
            $studentCourse = $this->studentCourseModel->getById($id);
            
            if (!$studentCourse) {
                $this->setFlashMessage('danger', 'Course Registration not found');
                $this->redirect('index.php?controller=studentCourse&action=index');
            }

            $students = $this->studentModel->getAllWithProdi();
            $courses = $this->courseModel->getAll('name ASC');

            $this->render('student_courses/edit', [
                'studentCourse' => $studentCourse,
                'students' => $students,
                'courses' => $courses,
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function view() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Course Registration ID');
            $this->redirect('index.php?controller=studentCourse&action=index');
        }

        $studentCourse = $this->studentCourseModel->getWithDetails($id);
        
        if (!$studentCourse) {
            $this->setFlashMessage('danger', 'Course Registration not found');
            $this->redirect('index.php?controller=studentCourse&action=index');
        }

        $this->render('student_courses/view', [
            'studentCourse' => $studentCourse,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Course Registration ID');
            $this->redirect('index.php?controller=studentCourse&action=index');
        }

        if ($this->studentCourseModel->delete($id)) {
            $this->setFlashMessage('success', 'Course Registration deleted successfully');
        } else {
            $this->setFlashMessage('danger', 'Failed to delete Course Registration');
        }

        $this->redirect('index.php?controller=studentCourse&action=index');
    }

    public function studentCourses() {
        $student_id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$student_id) {
            $this->setFlashMessage('danger', 'Invalid Student ID');
            $this->redirect('index.php?controller=student&action=index');
        }

        $student = $this->studentModel->getWithProdi($student_id);
        
        if (!$student) {
            $this->setFlashMessage('danger', 'Student not found');
            $this->redirect('index.php?controller=student&action=index');
        }

        $studentCourses = $this->studentCourseModel->getByStudent($student_id);

        $this->render('student_courses/student_courses', [
            'student' => $student,
            'studentCourses' => $studentCourses,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function courseStudents() {
        $course_id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$course_id) {
            $this->setFlashMessage('danger', 'Invalid Course ID');
            $this->redirect('index.php?controller=course&action=index');
        }

        $course = $this->courseModel->getById($course_id);
        
        if (!$course) {
            $this->setFlashMessage('danger', 'Course not found');
            $this->redirect('index.php?controller=course&action=index');
        }

        $courseStudents = $this->studentCourseModel->getByCourse($course_id);

        $this->render('student_courses/course_students', [
            'course' => $course,
            'courseStudents' => $courseStudents,
            'flash' => $this->getFlashMessage()
        ]);
    }
}
?>