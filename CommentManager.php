<?php

class CommentManager{
    private $dbComments;

    // Methods
    public function __construct() {
        $this->setDb(new PDO('mysql:host=localhost;dbname=news', 'root', ''));
    }

    public function setDb(PDO $dbComments){
        $this->dbComments = $dbComments;
        //return $this;
    }

    public function add(Comment $comments){
        $q = $this->dbComments->prepare('INSERT INTO comments(id_comments, pseudo, comments, id) VALUES(:pseudo :comments)');

        $q->bindValue(':pseudo', $article->getPseudo());
        $q->bindValue(':comments', $article->getComments());

        $q->execute();
    }

    public function get(int $id_comments){
        $id_comments = (int) $id_comments;

        $q = $this->dbComments->query('SELECT id_comments, pseudo, comments, id FROM comments WHERE id_comments = '. $id_comments);
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return new Comment($data);
    }

    public function getAll(){
        $text = [];
        $q = $this->db->query('SELECT id_comments, pseudo, comments, id FROM comments ORDER BY pseudo');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $text[] = new Comment($data);
        }
        return $text;
    }

    public function getAllByArticleId(int $id){
        $comments = [];
        $q = $this->db->query('SELECT id_comments, pseudo, comments, id FROM comments WHERE id=' . $id . ' ORDER BY pseudo');

        while ($data = $q->fetch(PDO::FETCH_ASSOC)){
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    public function update(Comment $comments){
        $q = $this->db->prepare('UPDATE comments SET pseudo = :pseudo, comments = :comments WHERE id_comments = :id_comments');

        $q->bindValue(':pseudo', $comments->getPseudo(), PDO::PARAM_INT);
        $q->bindValue(':comments', $comments->getComments(), PDO::PARAM_INT);
        $q->bindValue(':id_comments', $id_comments->getIdComments(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(Comment $comments){
        $this->id_comments->exec('DELETE FROM posts WHERE id = ' . $comments->getIdComments());
    }
}

?>