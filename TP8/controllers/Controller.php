<?php
abstract class Controller {
    protected function render($view, $data = []) {
        // Extract data to make variables available in the view
        extract($data);
        
        // Include header
        include_once 'views/layouts/header.php';
        
        // Include the view
        include_once 'views/' . $view . '.php';
        
        // Include footer
        include_once 'views/layouts/footer.php';
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }

    protected function setFlashMessage($type, $message) {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    protected function getFlashMessage() {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        return null;
    }
}
?>