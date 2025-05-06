<?php
require_once 'controllers/Controller.php';
require_once 'models/CourseModel.php';

class CourseController extends Controller {
    private $courseModel;

    public function __construct() {
        $this->courseModel = new CourseModel();
    }

    public function index() {
        $courses = $this->courseModel->getAll('name ASC');
        
        // Get student count for each course
        foreach ($courses as &$course) {
            $course['student_count'] = $this->courseModel->getStudentCount($course['id']);
        }
        
        $this->render('courses/index', [
            'courses' => $courses,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'code' => $_POST['code'],
                'name' => $_POST['name'],
                'credits' => $_POST['credits']
            ];

            if ($this->courseModel->create($data)) {
                $this->setFlashMessage('success', 'Course created successfully');
                $this->redirect('index.php?controller=course&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to create Course');
                $this->redirect('index.php?controller=course&action=create');
            }
        } else {
            $this->render('courses/create', [
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Course ID');
            $this->redirect('index.php?controller=course&action=index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'code' => $_POST['code'],
                'name' => $_POST['name'],
                'credits' => $_POST['credits']
            ];

            if ($this->courseModel->update($id, $data)) {
                $this->setFlashMessage('success', 'Course updated successfully');
                $this->redirect('index.php?controller=course&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to update Course');
                $this->redirect('index.php?controller=course&action=edit&id=' . $id);
            }
        } else {
            $course = $this->courseModel->getById($id);
            
            if (!$course) {
                $this->setFlashMessage('danger', 'Course not found');
                $this->redirect('index.php?controller=course&action=index');
            }

            $this->render('courses/edit', [
                'course' => $course,
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function view() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Course ID');
            $this->redirect('index.php?controller=course&action=index');
        }

        $course = $this->courseModel->getById($id);
        
        if (!$course) {
            $this->setFlashMessage('danger', 'Course not found');
            $this->redirect('index.php?controller=course&action=index');
        }

        $course['student_count'] = $this->courseModel->getStudentCount($course['id']);

        $this->render('courses/view', [
            'course' => $course,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Course ID');
            $this->redirect('index.php?controller=course&action=index');
        }

        // Check if there are students enrolled in this course
        $student_count = $this->courseModel->getStudentCount($id);
        if ($student_count > 0) {
            $this->setFlashMessage('danger', 'Cannot delete Course with enrolled students');
            $this->redirect('index.php?controller=course&action=index');
            return;
        }

        if ($this->courseModel->delete($id)) {
            $this->setFlashMessage('success', 'Course deleted successfully');
        } else {
            $this->setFlashMessage('danger', 'Failed to delete Course');
        }

        $this->redirect('index.php?controller=course&action=index');
    }
}
?>