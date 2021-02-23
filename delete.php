<?php
$pdo = new PDO('mysql:host=localhost;dbname=news', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$content = ' ';
if(isset($_GET['action']) && $_GET['action'] == 'suppression')
        {
            $pdo->query("DELETE FROM posts WHERE id = '$_GET[id]'");
            echo "l'article a bien été supprimé";
        }

?>

<?= $content ?>