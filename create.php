<?php
$pdo = new PDO('mysql:host=localhost;dbname=news', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$content = ' ';

    if($_POST)
    {
        echo "Titre: " . $_POST['title'] . '<br>';
        echo "Contenu: " . $_POST['matter'] . '<br>';

        foreach($_POST as $index => $value)
        {
            $_POST[$index] = addslashes($value);
        }

        if(isset($_GET['action']) && $_GET['action'] == 'modification')//modif
        {
            $pdo->query("UPDATE posts SET id = '$_POST[id]', title = '$_POST[title]', matter = '$_POST[matter]' WHERE id = '$_GET[id]' ");
        }else{
        //ajout en bdd
            $pdo->query("INSERT INTO posts (title, matter) VALUES ('$_POST[title]','$_POST[matter]') ");
        }
    
    }

?>

<?= $content ?>

<html>

<h1><?php if(isset($_GET['action']) && $_GET['action'] == 'modification') echo 'Modification'; else echo 'Ajout'; ?> d'un article</h1>

<form method="post" action="">

<label for="title">Titre</label>
<input type="text" id="title" name="title" >
<br>

<label for="matter">Contenu</label><br>
<textarea name="matter" cols="40" rows="10" ></textarea>
<br>

<input type="submit" name="inscription" value="Envoyer">

</form>

<a href="sindex.php" class="return">Retour à l'index</a>

<style>

    .return{
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