<?php

require_once __DIR__ ."/../Models/post.php";

class PostController {
    private $postModel;

    public function __construct($pdo)
    {
        $this->postModel = new Post($pdo);
    }

    public function index(){
        $posts = $this->postModel->getAll();
        return include __DIR__ ."/../Views/post_list.php";
    }

    public function create(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
            $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";

            if(!empty($title && !empty($content))){
                $this->postModel->create($title, $content);
                header("Location: index.php");
                exit;
            }else {
                $error = "Title and content are required! ";
            }
        }
        return include __DIR__ ."/../Views/post_create.php";
    }

    public function edit($id){

        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id){
            die("Invalid ID");
        }

        $post = $this->postModel->getById($id);

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
            $content = isset($_POST["content"]) ? trim($_POST["content"]) : "";
            if(!empty($title) && !empty($content)){
                 $this->postModel->update($id, $title, $content);
                header("Location: index.php");
                exit;
            } else {
                $error = "Title and content are required! ";
            }
           
        }
        return include __DIR__ ."/../Views/post_edit.php";
    }

    public function delete($id){
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if($id){
            $this->postModel->delete($id);
        } 
        header("Location: index.php");
        exit;
    }

}


?>