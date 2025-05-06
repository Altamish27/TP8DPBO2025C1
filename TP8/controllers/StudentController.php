<?php
require_once 'controllers/Controller.php';
require_once 'models/StudentModel.php';
require_once 'models/ProdiModel.php';

class StudentController extends Controller {
    private $studentModel;
    private $prodiModel;

    public function __construct() {
        $this->studentModel = new StudentModel();
        $this->prodiModel = new ProdiModel();
    }

    public function index() {
        $students = $this->studentModel->getAllWithProdi();
        $this->render('students/index', [
            'students' => $students,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'nim' => $_POST['nim'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date'],
                'prodi_id' => $_POST['prodi_id']
            ];

            if ($this->studentModel->create($data)) {
                $this->setFlashMessage('success', 'Student created successfully');
                $this->redirect('index.php?controller=student&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to create student');
                $this->redirect('index.php?controller=student&action=create');
            }
        } else {
            $prodis = $this->prodiModel->getAll('name ASC');
            $this->render('students/create', [
                'prodis' => $prodis,
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid student ID');
            $this->redirect('index.php?controller=student&action=index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'nim' => $_POST['nim'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date'],
                'prodi_id' => $_POST['prodi_id']
            ];

            if ($this->studentModel->update($id, $data)) {
                $this->setFlashMessage('success', 'Student updated successfully');
                $this->redirect('index.php?controller=student&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to update student');
                $this->redirect('index.php?controller=student&action=edit&id=' . $id);
            }
        } else {
            $student = $this->studentModel->getById($id);
            $prodis = $this->prodiModel->getAll('name ASC');
            
            if (!$student) {
                $this->setFlashMessage('danger', 'Student not found');
                $this->redirect('index.php?controller=student&action=index');
            }

            $this->render('students/edit', [
                'student' => $student,
                'prodis' => $prodis,
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function view() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid student ID');
            $this->redirect('index.php?controller=student&action=index');
        }

        $student = $this->studentModel->getWithProdi($id);
        
        if (!$student) {
            $this->setFlashMessage('danger', 'Student not found');
            $this->redirect('index.php?controller=student&action=index');
        }

        $this->render('students/view', [
            'student' => $student,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid student ID');
            $this->redirect('index.php?controller=student&action=index');
        }

        if ($this->studentModel->delete($id)) {
            $this->setFlashMessage('success', 'Student deleted successfully');
        } else {
            $this->setFlashMessage('danger', 'Failed to delete student');
        }

        $this->redirect('index.php?controller=student&action=index');
    }
}
?>