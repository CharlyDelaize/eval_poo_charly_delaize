<?php

class PostManager{
    private $db;

    // Methods
    public function __construct() {
        $this->setDb(new PDO('mysql:host=localhost;dbname=news', 'root', ''));
    }

    public function setDb(PDO $db){
        $this->db = $db;
        //return $this;
    }

    public function add(Post $article){
        $q = $this->db->prepare('INSERT INTO posts(id, title, content) VALUES(:title, :content)');

        $q->bindValue(':title', $article->getTitle());
        $q->bindValue(':content', $article->getContent());

        $q->execute();
    }

    public function get(int $id){
        $id = (int) $id;

        $q = $this->db->query('SELECT id, title, content FROM posts WHERE id = '. $id);
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return new Post($data);
    }

    public function getAll(){
        $articles = [];
        $q = $this->db->query('SELECT id, title, content FROM posts ORDER BY title');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $articles[] = new Post($data);
        }
        return $articles;
    }

    public function update(Post $article){
        $q = $this->db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');

        $q->bindValue(':title', $article->getTitle(), PDO::PARAM_INT);
        $q->bindValue(':content', $article->getContent(), PDO::PARAM_INT);
        $q->bindValue(':id', $id->getId(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(Post $article){
        $this->db->exec('DELETE FROM posts WHERE id = ' . $article->getId());
    }
}

?>