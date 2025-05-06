<?php
require_once 'controllers/Controller.php';
require_once 'models/ProdiModel.php';

class ProdiController extends Controller {
    private $prodiModel;

    public function __construct() {
        $this->prodiModel = new ProdiModel();
    }

    public function index() {
        $prodis = $this->prodiModel->getAll('name ASC');
        
        // Get student count for each prodi
        foreach ($prodis as &$prodi) {
            $prodi['student_count'] = $this->prodiModel->getStudentCount($prodi['id']);
        }
        
        $this->render('prodi/index', [
            'prodis' => $prodis,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'code' => $_POST['code'],
                'name' => $_POST['name']
            ];

            if ($this->prodiModel->create($data)) {
                $this->setFlashMessage('success', 'Study Program created successfully');
                $this->redirect('index.php?controller=prodi&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to create Study Program');
                $this->redirect('index.php?controller=prodi&action=create');
            }
        } else {
            $this->render('prodi/create', [
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Study Program ID');
            $this->redirect('index.php?controller=prodi&action=index');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'code' => $_POST['code'],
                'name' => $_POST['name']
            ];

            if ($this->prodiModel->update($id, $data)) {
                $this->setFlashMessage('success', 'Study Program updated successfully');
                $this->redirect('index.php?controller=prodi&action=index');
            } else {
                $this->setFlashMessage('danger', 'Failed to update Study Program');
                $this->redirect('index.php?controller=prodi&action=edit&id=' . $id);
            }
        } else {
            $prodi = $this->prodiModel->getById($id);
            
            if (!$prodi) {
                $this->setFlashMessage('danger', 'Study Program not found');
                $this->redirect('index.php?controller=prodi&action=index');
            }

            $this->render('prodi/edit', [
                'prodi' => $prodi,
                'flash' => $this->getFlashMessage()
            ]);
        }
    }

    public function view() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Study Program ID');
            $this->redirect('index.php?controller=prodi&action=index');
        }

        $prodi = $this->prodiModel->getById($id);
        
        if (!$prodi) {
            $this->setFlashMessage('danger', 'Study Program not found');
            $this->redirect('index.php?controller=prodi&action=index');
        }

        $prodi['student_count'] = $this->prodiModel->getStudentCount($prodi['id']);

        $this->render('prodi/view', [
            'prodi' => $prodi,
            'flash' => $this->getFlashMessage()
        ]);
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if (!$id) {
            $this->setFlashMessage('danger', 'Invalid Study Program ID');
            $this->redirect('index.php?controller=prodi&action=index');
        }

        // Check if there are students in this prodi
        $student_count = $this->prodiModel->getStudentCount($id);
        if ($student_count > 0) {
            $this->setFlashMessage('danger', 'Cannot delete Study Program with associated students');
            $this->redirect('index.php?controller=prodi&action=index');
            return;
        }

        if ($this->prodiModel->delete($id)) {
            $this->setFlashMessage('success', 'Study Program deleted successfully');
        } else {
            $this->setFlashMessage('danger', 'Failed to delete Study Program');
        }

        $this->redirect('index.php?controller=prodi&action=index');
    }
}
?>