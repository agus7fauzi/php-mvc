<?php

class Home extends Controller {

    private $errorMsg;

    public function index() {
        $data['title'] = 'Book Management';
        $data['books'] = $this->model('Books_model')->getAllBook();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id) {
        $data['title'] = 'Book Detail';
        $data['book'] = $this->model('Books_model')->getBookById($id);

        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function addAbook() {

        $image = $this->upload();
        if (!$image) {
            Flasher::setFlash('Error', $this->errorMsg, '', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        
        $_POST['image'] = $image;

        if ($this->model('Books_model')->addABook($_POST) > 0) {
            Flasher::setFlash('OK!', 'Success', 'to Added', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Error', 'Failed', 'to Added', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function deleteAbook($id) {
        
        $imgName = $this->model('Books_model')->getImgById($id)['image'];
            if ( $this->model('Books_model')->deleteAbook($id) > 0) {

                if (!unlink(PUBLIC_PATH .'/img/' . $imgName)) {
                    Flasher::setFlash('Warning!', 'Image for this book is not found in the server! so it can\'t delete', '', 'warning');
                } else {
                    Flasher::setFlash('OK!', 'Success', 'to Deleted', 'success');
                }
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                Flasher::setFlash('Error', 'Failed', 'to Deleted', 'danger');
                header('Location: ' . BASEURL . '/home');
                exit;
        }
    }

    public function upload() {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];
    
        if ($error === 4) {
            $this->errorMsg = 'Please select an image first!';
            return false;
        }
    
        $validImgExtentions = ["jpg", "jpeg", "png", "jfif"];
        $ImgExtention = explode('.', $fileName);
        $ImgExtention = strtolower(end($ImgExtention));
    
        if (!in_array($ImgExtention, $validImgExtentions)) {
            $this->errorMsg = 'The image you uploaded is invalid!';
    
            return false;
        }
    
        if ($fileSize > 1000000) {
            $this->errorMsg = 'Image size is too large!';

            return false;
        }
    
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $ImgExtention;
    
        move_uploaded_file($tmpName, 'img/' . $newFileName);
    
        return $newFileName;
    }
}