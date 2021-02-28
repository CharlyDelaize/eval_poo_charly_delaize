<html>
<div class="p-3 mb-2 bg-dark text-white">
    <h1>Commentaires</h1>
</div>

</html>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=news', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$content = ' ';
//affichage des articles
        $r = $pdo->query('SELECT * FROM comments');
        $content .= "<h2>Tableau des commentaires</h2>";
        $content .= "<table class=\"table\"><tr>";
        for($i= 0; $i < $r->columnCount(); $i++)
        {
            $column = $r->getColumnMeta($i);
            $content .= "<td>$column[name]</td>";
        }
        $content .= "<td>Modification</td>";
        $content .= "<td>Suppression<td>";
        $content .= "</tr>";

        while($line = $r->fetch(PDO::FETCH_ASSOC))
        {
            $content .= "<tr>";
            foreach($line as $index => $value)
            {
                $content .= "<td>$value</td>";
            }

            $content .= "<td><a href=\"updateComments.php?action=modification&id_comments=$line[id_comments]\">Modifier</a></td>";

            $content .= "<td><a href=\"deleteComments.php?action=suppression&id_comments=$line[id_comments]\" onClick=\"return(confirm('En êtes vous certain ?'));\">Supprimer</a></td>";
            $content .= "</tr>";
        }
        $content .= "</table>";

?>


<html><a href="createComments.php" class="nouveeauCommentaire">Envoyer un commentaire</a></html>

<?= $content ?>

<style>
    h2{
        margin-left: 0.5em;
    }

    table{
        margin-left: 0.5em;
    }

    td a{
        text-decoration: none;
        color : rgb(19, 173, 232);
        transition: 0.5s;
    }

    td a:hover{
        color: blue;
    }

    .nouveeauCommentaire{
        float:right;
        margin-right: 1em;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color : #555555;
        transition: 0.5s;
    }

    .nouveeauCommentaire:hover{
        color: darkgrey;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>