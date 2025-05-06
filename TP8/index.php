<?php
// Start session
session_start();

// Include controllers
require_once 'controllers/StudentController.php';
require_once 'controllers/ProdiController.php';
require_once 'controllers/CourseController.php';
require_once 'controllers/StudentCourseController.php';

// Get controller and action from URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'student';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Route the request to the appropriate controller and action
switch ($controller) {
    case 'student':
        $studentController = new StudentController();
        
        switch ($action) {
            case 'index':
                $studentController->index();
                break;
            case 'create':
                $studentController->create();
                break;
            case 'edit':
                $studentController->edit();
                break;
            case 'view':
                $studentController->view();
                break;
            case 'delete':
                $studentController->delete();
                break;
            default:
                $studentController->index();
                break;
        }
        break;
        
    case 'prodi':
        $prodiController = new ProdiController();
        
        switch ($action) {
            case 'index':
                $prodiController->index();
                break;
            case 'create':
                $prodiController->create();
                break;
            case 'edit':
                $prodiController->edit();
                break;
            case 'view':
                $prodiController->view();
                break;
            case 'delete':
                $prodiController->delete();
                break;
            default:
                $prodiController->index();
                break;
        }
        break;
        
    case 'course':
        $courseController = new CourseController();
        
        switch ($action) {
            case 'index':
                $courseController->index();
                break;
            case 'create':
                $courseController->create();
                break;
            case 'edit':
                $courseController->edit();
                break;
            case 'view':
                $courseController->view();
                break;
            case 'delete':
                $courseController->delete();
                break;
            default:
                $courseController->index();
                break;
        }
        break;
        
    case 'studentCourse':
        $studentCourseController = new StudentCourseController();
        
        switch ($action) {
            case 'index':
                $studentCourseController->index();
                break;
            case 'create':
                $studentCourseController->create();
                break;
            case 'edit':
                $studentCourseController->edit();
                break;
            case 'view':
                $studentCourseController->view();
                break;
            case 'delete':
                $studentCourseController->delete();
                break;
            case 'studentCourses':
                $studentCourseController->studentCourses();
                break;
            case 'courseStudents':
                $studentCourseController->courseStudents();
                break;
            default:
                $studentCourseController->index();
                break;
        }
        break;
        
    default:
        $studentController = new StudentController();
        $studentController->index();
        break;
}
?>