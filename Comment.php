<?php

class Comment{
    // Attributes
    private $id_comments;
    private $pseudo;
    private $comments;

    // Getters
    public function getIdComments(){
        return $this->id_comments;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getComments(){
        return $this->comments;
    }

    // Setters
    public function setIdComments($id_comments)
    {
        if($id_comments > 0){
            $this->id_comments = $id_comments;
        }
        return $this;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        // return $this;
    }

    public function setComents($comments)
    {
        $this->comments = $comments;
        // return $this;
    }

    //Methods
    public function hydrateIdComments(array $data){
        foreach($data as $id_comments => $value){
            $method = 'set'.setId($id_comments);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function hydratePseudo(array $data){
        foreach($data as $pseudo => $value){
            $method = 'set'.setTitle($pseudo);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function hydrateComments(array $data){
        foreach($data as $comments => $value){
            $method = 'set'.setTitle($comments);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}

//Array to Object
/* $request = $db->query('SELECT id, title, content FROM posts');

while($data = $request->fetch(PDO::FETCH_ASSOC)){
    $article = new Post($data);
    echo "Voici l'article {$article->getTitle()} et son contenu {$article->getContent()}.";
} */


?>