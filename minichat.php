<html>
    <head>
        <meta charset="UTF-8" />
        <title>minichat</title>
    </head>
        
    <body>
        <form method="POST" action="minichat_post.php">
            <input type="text" name="pseudo" placeholder="pseudo">
            <textarea type="text" name="message" placeholder="message" rows="8" cols="45"ss></textarea>
            <input type="submit" name="submit">
        </form>

        <?php
            //CONNECT TO DATABASE
            try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

    //READ FROM DATABASE
    $result = $bdd -> query("SELECT pseudo, message FROM minichat ORDER BY id DESC");
    while ($donnees = $result -> fetch())
        {
           echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
        }
    $result -> closeCursor();
        ?>
    </body>
</html>