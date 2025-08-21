<?php

class Post {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(){
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $content){
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content, created_at) VALUES (:title, :content, NOW())");
        return $stmt->execute(["title" => $title, "content" => $content]);
    }

    public function update($id, $title, $content){
        $stmt = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
        return $stmt->execute(["title" => $title, "content" => $content, "id" => $id]);
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = :id");
        return $stmt->execute(["id" => $id]);
    }

}


?>