<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

//INSERT INTO DATABASE
    if (isset($_POST["submit"]))
    {
        if (isset($_POST["pseudo"]) AND isset($_POST["message"]))
        {
                $req = $bdd -> prepare ("INSERT INTO minichat (pseudo, message) VALUES (:pseudo, :message)");
                $req -> execute (array(
                    "pseudo" => $_POST["pseudo"],
                    "message" => $_POST["message"]
                ));
            }
        else
            {
                echo"ECRIVEZ SVP<br> !";
            }
    }

//REDIRECTION
header('Location: minichat.php');

?>