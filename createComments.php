<?php
$pdo = new PDO('mysql:host=localhost;dbname=news', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$content = ' ';

    if($_POST)
    {
        echo "Pseudo: " . $_POST['pseudo'] . '<br>';
        echo "Commentaire: " . $_POST['comments'] . '<br>';

        foreach($_POST as $index => $value)
        {
            $_POST[$index] = addslashes($value);
        }

        if(isset($_GET['action']) && $_GET['action'] == 'modification')//modification
        {
            $pdo->query("UPDATE comments SET id_comments = '$_POST[id_comments]', pseudo = '$_POST[pseudo]', comments = '$_POST[comments]' WHERE id_comments = '$_GET[id_comments]' ");
        }else{
        //ajout en bdd
            $pdo->query("INSERT INTO comments (pseudo, comments, id) VALUES ('$_POST[pseudo]', '$_POST[comments]', '$_GET[id]') ");
        }

?>

<?= $content ?>

<html>
<div class="p-3 mb-2 bg-dark text-white">
    <h1><?php if(isset($_GET['action']) && $_GET['action'] == 'modification') echo 'Modification'; else echo 'Ajout'; ?> d'un commentaire</h1>
</div>

<form method="post" action="">

<label for="pseudo" class="labelPseudo">Pseudo</label>
<input type="text" id="pseudo" name="pseudo" >
<br>

<label for="comments" class="labelCommentaire">Commentaire</label><br>
<textarea name="comments" cols="40" rows="10" ></textarea>
<br>

<input type="submit" name="inscription" class="button" value="Envoyer">

</form>

<?php
        $content = ' ';
        $r = $pdo->query("SELECT * FROM posts");
        $test = $r->fetch(PDO::FETCH_ASSOC);
        echo "<a href=\"readComments.php?id=$_GET[id]\" class=\"return\">Retour aux commentaires</a>";
?>

<style>
    .labelTitle{
        margin-left: 1em;
    }

    .labelMatter{
        margin-left: 1em;
    }

    form textarea{
        margin-left: 1em;
    }

    form .button{
        margin-left: 1em;
    }

    .return{
        margin-left: 1em;
        text-decoration: none;
        color : rgb(19, 173, 232);
        transition: 0.5s;
    }

    .return:hover{
        color: blue;
    }

</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>