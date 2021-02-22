<?php

class Post{
    // Attributes
    private $id;
    private $title;
    private $content;

    // Getters
    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
        // return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        // return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        // return $this;
    }

    //Methods
    public function hydrateId(array $data){
        foreach($data as $id => $value){
            $method = 'set'.setId($id);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function hydrateTitle(array $data){
        foreach($data as $title => $value){
            $method = 'set'.setTitle($title);
            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function hydrateContent(array $data){
        foreach($data as $content => $value){
            $method = 'set'.setTitle($content);
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